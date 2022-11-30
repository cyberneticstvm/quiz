<!--$quiz = DB::table('quizzes')->find(1);
  $strength = DB::table('strength')->where('category', $quiz->category)->first();-->
@php
  $quiz = Session::get('quiz');
  $strength = Session::get('strength');
  //$quiz = DB::table('quizzes')->find(1);
  //$strength = DB::table('strength')->where('category', $quiz->category)->first();
@endphp
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Life Style Design quiz</title>
    <link rel="icon" type="image/x-icon" href="{{ public_path().'/assets/images/favicon.png' }}">
    <!-- Bootstrap 5 CSS -->  
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css'>
    <!-- Font Awesome 5 -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css'>
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

  <style>
    .bg{
      background: linear-gradient(0deg, rgba(20, 22, 25, 0.7), rgba(13, 110, 253, 25%)), url("{{ public_path().'/assets/bgs/'.$strength->img_name }}");
      background-size: cover;
      background-repeat: no-repeat;
      font-family: 'Raleway', sans-serif;
    }
    h3{
      color: #fff;
      line-height: 40px;
    }
    .fb img{
      width: 15%;
    }
    .logo img{
      width: 30%;
    }
    h1{
      color: #fff;
      padding: 2%;
    }
    .desc p{
      font-size: 1.5rem;
      color: #fff;
      width:80%;
      margin: 0 auto;
    }
    .cbtn{
      background-color: #7FCCF7;
      border: solid transparent 2px;
      cursor: pointer !important;
      transition: 0.5s;
      padding: 5px;
      border-radius: 25px;
    }
    .cbtn a{
      text-decoration: none;
      color: #fff;
      font-size: 1.5rem;
    }
    .cbtn:hover{
      border: 1px solid #fff;
      background-color: rgba(0,0,0,.5);
    }
  </style>
  </head>
  <body class="bg">


<div class="container">
  <div class="row">
    <div class="col-12 text-center logo">
      <img src="{{ public_path().'/assets/images/andrewlord-full-blue.png' }}" class="img-fluid" />
    </div>
    <div class="col-12 text-center">
        <h3>Congratulations, you have completed the Lifestyle Design Quiz!<br/>
				and your personalised report has been sent to your inbox.</h3>
    </div>    
  </div>
  <div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6 text-center">
        <h3>Your Key Strength is:</h3>
        <h1 style="background-color: {{ $strength->bg_color }}">{{ $strength->outcome }}<h1>
    </div>
    <div class="col-lg-3"></div>
  </div>
  <div class="row">
    <div class="col-lg-12 text-center fb">
        <a href="https://www.facebook.com/sharer/sharer.php?u={{ 'https://lifestyledesignquiz.com/projects/quiz/public/assets/bgs/'.$strength->img_name1 }}&t=LifestyleDesignQuiz" target="_blank"><img src="{{ public_path().'/assets/images/facebook-share-icon.png' }}" class="img-fluid" /></a>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12 text-center desc">
        {!! $strength->description !!}
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12 text-center desc">
        <p>The people around you need your strength.</p>
				<p>Live life at your best.</p>
				<p>Share your strength of: <span style="color: {{ $strength->bg_color }}">{{ $strength->outcome }}</span></p>
				<p>Want to learn more about using your strength of <span style="color: {{ $strength->bg_color }}">{{ $strength->outcome }}</span> to improve your happiness, productivity and reach your goals?</p>
    </div>
  </div>
  <div class="row mt-5 mb-5">
    <div class="col-lg-3"></div>
    <div class="col-lg-6 text-center cbtn">
      <a href="https://www.blueprintlifecoaching.com.au/coaching/let-s-talk" target="_blank">BOOK A FREE CALL</a>
    </div>
    <div class="col-lg-3"></div>
  </div>
</div>
<!-- partial -->
  
<!-- jQuery JS -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
<!-- Bootstrap 5 JS -->
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js'></script>
  </body>
</html>