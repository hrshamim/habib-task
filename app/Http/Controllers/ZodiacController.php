<?php
namespace App\Http\Controllers;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use DB;
use \Cache;
use App\Zodiac;
use App\Horoscope;

class ZodiacController extends Controller
{
  
    public function index() {         
        return view('home');
	}

	
	public function getZodiacs() {           
        return view('horoscopeindex');

	}

	
	public function monthBest() {    
        return view('monthlyindex');
	}


	public function yearBest() {    
        return view('yearlyindex');
	}



	public function genarateHoroscope(Request $request) {
        $request->validate([
            'year' => 'required|numeric|digits:4',
          ]);

		$horoscope = array(); //Define an empty array
		$sDate= $request->year .'-01-01'; // First date in this year
		$eDate= $request->year .'-12-31';    // Last date in this year
		$existData =  Horoscope::where('years', $request->year)->first();
		  
		  if( $existData ) {
		  	 Session::flash('errore', 'Your submited year already exist');   
             return Redirect::to('/');
		  } else {
		  	
		  	$dateRange = CarbonPeriod::create($sDate, $eDate);  // All date in a given year
	        $zodiacs = Zodiac::where('status',1)->get();
	        // Get Table max id 
            $maxId = Horoscope::orderBy('id', 'desc')->first();		  	
	        if ( ! $maxId )
	            $x=1;
	        else
	            $x = $maxId->id + 1 ;

		    foreach($zodiacs as $zodiac){
		    	foreach($dateRange as $singleDate){
		    		$month = date("F Y", strtotime($singleDate));
		    		$date = date("Y-m-d", strtotime($singleDate));
		    		$score = rand(1,10);
		    		$color = getScoreColour($score); //helper method call for score color code
		    		$text = getScoreText($score);//helper method call for get score descrive text
		    		$singlecontent = array(  
		    		    'id' => $x ,	                  
	                    'zodiacId' => $zodiac->id ,					
						'years' => $request->year,
						'months' => $month,
						'date' => $date,
						'score' => $score,
						'colorCode' => $color,
						'scoretext' => $text,
						'status' => 1,
						'orderid' => $x	
		    		);  //single day score in an array
		    		array_push($horoscope, $singlecontent);
		    		$x++;
		    	}
		    }
		    
		    Db::table('horoscopes')->insert($horoscope); // insert to database
		    return Redirect::to('/horoscopes');
		}
   }

    

    public function genarateHoroscopeCalendar(Request $request) {
	    
	    $request->validate([
	        'year' => 'required|numeric|digits:4',
	    ]);	

		$year  = $request->year;
		$existData =  Horoscope::where('years', $request->year)->first();
		   
		    if( ! $existData ) {
		  	    Session::flash('errorec', 'There is no data found for '. $year);		  	    
                return Redirect::to('/horoscopes');
		    } else {
                
                $zodiacs =  Cache::remember('zodiacs', 60, function() {
                    return Zodiac::where('status',1)->get();
                });
            
                $horoscopes =  Cache::remember('horoscopes', 60, function() use ($year) {
                    return Horoscope::select('zodiacId','date','colorCode','score','scoretext')->where('years',$year)->get();
                });

		    return view('horoscope', compact(['zodiacs','year','horoscopes']));
		}
   }


    public function genarateBestByMonth(Request $request) {		   
	    
	    $request->validate([
	        'year' => 'required|numeric|digits:4',
	    ]);		
		
		$year  = $request->year;
		$existData =  Horoscope::where('years',$year)->first();
		    
		    if( ! $existData ) {
		  	    Session::flash('errorem', 'There is no data found for '. $year);		  	   
                return Redirect::to('/bestmonth');
		    } else {

		    	$bestMonthArray = array(); // define an array			
			    $zodiacs =  Cache::remember('zodiacs', 60, function() {
                    return Zodiac::where('status',1)->get();
                });      
	        
	            foreach($zodiacs as $zodiac) {
			        $topScoresMonth = getMonthByTopScore($zodiac->totalscore, $year); // Get height score month
			        $dateRange = $zodiac->startDate . ' to ' . $zodiac->endDate;
			        $itemArray = array(
			        	'title'=> $zodiac->title,
			        	'month'=> $topScoresMonth,
			        	'image'=> $zodiac->zodiacSign,
			        	'range'=> $dateRange
			        );
			       array_push($bestMonthArray, $itemArray);
			    }

	            return view('bestmonth', compact(['year','bestMonthArray']));
	       }
   }


   public function genarateBestByYear(Request $request) {        	
	    
	    $request->validate([
	        'year' => 'required|numeric|digits:4',	    
	    ]);		
		
		$year  = $request->year;
		$existData =  Horoscope::where('years',$year)->first();
		    
		    if( ! $existData ) {
		  	    Session::flash('errorey', 'There is no data found for '. $year);		  	   
                return Redirect::to('/bestyear');
		    } else {

		    	$zodiacScores = array(); // define an array
			    $zodiacs =  Cache::remember('zodiacs', 60, function() {
                    return Zodiac::where('status',1)->get();
                });
                
                $yearlyhoroscopes =  Cache::remember('yearlyhoroscopes', 60, function() use ($year)  {
                    return Horoscope::select('zodiacId','score')->where('years',$year)->get();
                });   

	                foreach($zodiacs as $zodiac) {
			           $tscore = 0;
			           $zodiachoros = $yearlyhoroscopes->where('zodiacId',$zodiac->id);
					        
					        foreach($zodiachoros as $item) {
					           $tscore += $item->score;
					        }
					      
					    $zodiacScores[$zodiac->id] = $tscore;
			        }
	     
	            arsort($zodiacScores);
		        $maxkey = key($zodiacScores);
		        $topzodiac = $zodiacs->where('id',$maxkey)->first(); // Top scored zodiac

		        return view('bestyear', compact(['year','topzodiac']));
		    }
   }
}