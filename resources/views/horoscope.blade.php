@extends('layout.master')
@section('content')
@if($horoscopes)
  <section id="calendars" class="calendars">
    <div class="container">
      <div class="section-title">
        <h2>Horoscopes calendar {{$year }}</h2>
        <p>Please click on a Zodiac sign to view calendar for that Zodiac sign </p>
      </div>

      <div class="row">
        <div class="col-lg-3">
          <ul class="nav nav-tabs flex-column">
            @php $i=1; @endphp
            @foreach($zodiacs as $zodiac)
              <li class="nav-item">
                <a class="nav-link @if($i==1) active show @endif text-center" data-toggle="tab" href="#{{$zodiac->alias}}"> 
                <img src="{{asset('assets/img/zodiacs/'.$zodiac->zodiacSign)}}" width="110"/><br/>
                <b> {{ $zodiac->title }} </b> <br/> {{$zodiac->startDate}} to {{$zodiac->endDate}}</a>
              </li>
            @php $i++; @endphp
            @endforeach             
          </ul>
        </div>

        <div class="col-lg-9 mt-4 mt-lg-0">
          <div class="tab-content">
            @php $ix=1; @endphp
            @foreach($zodiacs as $izodiac)
              @php $horoscope = $horoscopes->where('zodiacId',$izodiac->id); @endphp
              <div class="tab-pane @if($ix==1) active show @endif " id="{{$izodiac->alias}}">
                
                <div class="row">
                  <div class="col-lg-12 details order-2 order-lg-1">
                    <div class="row">
                      <div class="col-lg-6 ">
                        <h2>{{$izodiac->title}}</h2> 
                        <h3>{{$izodiac->startDate}} to {{$izodiac->endDate}}</h3>
                      </div>
                      <div class="col-lg-4 last ">
                        <img src="{{asset('assets/img/zodiacs/'.$izodiac->zodiacSign)}}" width="150">
                      </div>
                    </div>
                    <!-- Generate calendar by calling a helper method -->
                    {!! generateCalender($horoscope,$year) !!}
                  </div>                  
                </div>

              </div>
             @php $ix++; @endphp
             @endforeach
          </div>
        </div>
      </div>

    </div>
  </section><!-- End Section -->
@endif
@endsection