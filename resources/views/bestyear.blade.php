@extends('layout.master')
@section('content')
@if($topzodiac)
  <section id="calendars" class="calendars">
    <div class="container">
      <div class="section-title">
        <h2> {{$year }} best zodiac sign (by score) </h2>        
      </div>

      <div class="row">
        <div class="col-lg-12 text-center">
          <img src="{{asset('assets/img/zodiacs/'.$topzodiac->zodiacSign )}}" width="200"/><br/>
          <h2>{{ $topzodiac->title }} </h2> 
          <p>{!!  $topzodiac->startDate . ' to ' . $topzodiac->endDate !!}</p>   
        </div>
      </div>

    </div>
  </section><!-- End Section -->
@endif
@endsection