@extends('layout.master')
@section('content')
  <section id="yearselection" class="yearselection">
    <div class="container">

      <div class="section-title">
        <h2> Genarate Horoscopes </h2>        
      </div>

      <form action="{{ url('/genarate') }}" method="post" class="php-year-form">
        {{ csrf_field() }}
        <div class="form-row">
          <div class="col-md-6 offset-md-3 form-group">
            <label for="title">Enter your required year (YYYY). <span class="requiredfield">*</span></label>
            <input type="text" class="form-control" id="year"  name="year" placeholder="{{ date('Y') }}" maxlength="4" pattern="\d{4}" required="required">
          </div>
        </div>

        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
         @endif
             
        <div class="text-center">  <button type="submit" class="btn btn-primary">Generate Now</button>
          @if(Session::has('errore'))
            <p class="alert alert-danger">{{ Session::get('errore') }}</p>
          @endif
        </div>
      </form>

    </div>
  </section><!-- End  Section -->
@endsection