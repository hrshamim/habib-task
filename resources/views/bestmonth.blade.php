@extends('layout.master')
@section('content')
@if($bestMonthArray)
  <section id="calendars" class="calendars">
    <div class="container">
      <div class="section-title">
        <h2>Best month on average (by score) for a Zodiac sign in {{$year }}</h2>          
      </div>

      <div class="row">
        <div class="col-lg-12">
          <ul class="zodiclist">             
            @foreach($bestMonthArray as $bestMonth)
              <li>  
                <img src="{{asset('assets/img/zodiacs/'.$bestMonth['image'])}}" width="120"/><br/>
                <h5>{{ $bestMonth['title']}} </h5> 
                <small>{{ $bestMonth['range']}}</small>
                <h4 class="bestmonth" >{{ $bestMonth['month']}}</h4>
              </li>               
            @endforeach             
          </ul>
        </div>
      </div>

    </div>
  </section><!-- End Section -->
@endif
@endsection