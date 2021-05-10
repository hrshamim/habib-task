<?php

function getMonthByTopScore($resource, $year) {
    $montharray = array();

    foreach($resource as $items) {
        $realmonthA = explode(' ', $items->months);
        if(trim($realmonthA[1]) == $year) {
			$mnum = date('n', strtotime($items->months));
			$d=cal_days_in_month(CAL_GREGORIAN,$mnum,$year);
			$average = intdiv($items->totalscore, $d);				
		    $montharray[$realmonthA[0]] = $average;
        }
   }
	arsort($montharray);
	$key_of_max = key($montharray);
	return $key_of_max;
}

function getScoreColour($score) {
    switch ($score) {
	    case 1:
	        return "#ff0000";
	        break;
	    case 2:
	        return "#f33805";
	        break;
	    case 3:
	        return "#e65707";
	        break;
	    case 4:
	        return "#d27509";
	        break;
	    case 5:
	        return "#a99a0d";
	        break;
	    case 6:
	        return "#88b00f";
	        break;
	    case 7:
	        return "#6dc212";
	        break;
	    case 8:
	        return "#4cd514";
	        break;
	    case 9:
	        return "#31e816";
	        break;
	    case 10:
	        return "#00ff00";
	        break;
	}
}

function getScoreText($score) {
	switch ($score) {
	    case 1:
	        return "This day is very worst day for you. A parent may discourage you from doing something you are eager on. ";
	        break;
	    case 2:
	        return "Legal developments over a property in dispute can worry you. Some favorable developments on the social front are foreseen. ";
	        break;
	    case 3:
	        return "You are likely to catch up on the gossip by participating in a gathering or an event. Following instructions regarding fitness in letter and spirit is likely to find you nearing total health.";
	        break;
	    case 4:
	        return "Someone is likely to upset you and put you off mood today. Don’t push your luck too far, as far as health is concerned. ";
	        break;
	    case 5:
	        return "A financial venture may get you totally involved. It may be difficult to resist having a showdown with a senior at work.";
	        break;
	    case 6:
	        return "Don’t trust anyone in a property matter. You will be appreciated for making things exciting on the social front.";
	        break;
	    case 7:
	        return "Those trying to achieve something personal may get lucky. Health remains satisfactory. Some efforts will be required to remain in shape.";
	        break;
	    case 8:
	        return "A professional advice will help in choosing the right course of action in business. A family member will be more than willing to take your guidance in an important domestic issue.";
	        break;
	    case 9:
	        return "A new business can become a turning point in your search for prosperity.";
	        break;
	    case 10:
	        return "This day is lucky for you. A property you had booked may finally be handed over to you. An excellent day is foreseen for those pursuing academics.";
	        break;
	}
}
function generateCalender($horoscope,$year) {
	$row=2;  //to set the number of rows and columns in yearly calendar ( 1 to 12 )
    ///// No Edit below //////
    $row_no=0; // 
    echo "<table class='main'>"; // Outer table 
    ////// Starting of for loop/// 
    ///  Creating calendars for each month by looping 12 times ///
    for($m=1;$m<=12;$m++){
	    $month =date($m);  // Month 
	    $dateObject = DateTime::createFromFormat('!m', $m);
	    $monthName = $dateObject->format('F'); // Month name to display at top

	    $d= 2; // To Finds today's date
	    
	    $no_of_days = cal_days_in_month(CAL_GREGORIAN, $month, $year);//calculate number of days in a month

	    $j= date('w',mktime(0,0,0,$month,1,$year)); // This will calculate the week day of the first day of the month
	    //echo $j;// Sunday=0 , Saturday =6
	    //// if starting day of the week is Monday then add following two lines ///
	    $j=$j-1;  
	    if($j<0){$j=6;}  // if it is Sunday //
	    //// end of if starting day of the week is Monday ////


	    $adj=str_repeat("<td bgcolor='#c5c5c4'>*&nbsp;</td>",$j);  // Blank starting cells of the calendar 
	    $blank_at_end=42-$j-$no_of_days; // Days left after the last day of the month
	    if($blank_at_end >= 7){$blank_at_end = $blank_at_end - 7 ;} 
	    $adj2=str_repeat("<td bgcolor='#c5c5c4'>*&nbsp;</td>",$blank_at_end); // Blank ending cells of the calendar

	    /// Starting of top line showing year and month to select ///////////////
	    if(($row_no % $row)== 0){
	    	echo "</tr><tr>";
	    }

	    echo "<td><table class='main' ><td colspan=6 align=center> $monthName $year


	     </td><td align='center'></td></tr>";
	    
	    echo "<tr><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th><th>Sun</th></tr><tr>";
	    ////// End of the top line showing name of the days of the week//////////

	    //////// Starting of the days//////////
	    for($i=1;$i<=$no_of_days;$i++){ 
	   
		    $cdate = $year .'-'.$month.'-'.$i ;
		    $scoreDate = $horoscope->where('date', date('Y-m-d', strtotime($cdate)))->first();                
		   
		    echo $adj."<td style='background-color:".$scoreDate->colorCode. ";'><a title='Score: ".$scoreDate->score."' href='#'>$i</a>"; // This will display the date inside the calendar cell
		    echo " </td>";  

		    $adj='';
		    $j ++;
		    if($j==7){echo "</tr><tr>"; // start a new row
		    $j=0;}

	    }
	    echo $adj2;   // Blank the balance cell of calendar at the end 
	    echo "</tr></table></td>";
	    $row_no=$row_no+1;
    } // end of for loop for 12 months
    echo "</table>";
}