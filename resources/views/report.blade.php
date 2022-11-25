<!DOCTYPE html>
<html lang="en">
<head>
    <title>Lifestyle Design quiz Report</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    @font-face {
        font-family: 'text';
        src: url("{{ storage_path('/fonts/Raleway-Light.ttf') }}") format("truetype");
    }
    @font-face {
        font-family: 'text-bold';
        src: url("{{ storage_path('/fonts/Raleway-Bold.ttf') }}") format("truetype");
    }
    @page {
        margin:0px;
    }
    .cover{
        background: url("./assets/images/cover.jpg");
        background-size: cover;
        background-repeat: no-repeat;
        height: 100%;
    }
    .page{
        margin: 5%;
        font-family: text;
    }
    .head{
        font-family: 'text-bold';
        font-size: 1.5rem;
    }
    .page p{
        width: 90%;
        text-align: justify;
        font-size: 1.2rem;
    }
    .br{
        page-break-after: always;
    }
    .desc{
        height: 36%;
        margin-bottom: -3%;
    }
  </style>
</head>
<body>
<div class="cover"></div>
<img src="./assets/images/thankyou.jpg" class="img-fluid"/> 
<div class="container-fluid">
    <div class="row">
        <div class="col page">
            <div class='head'>YOUR STRENGTH PROFILE</div>
            <div class="mb-3">Based on your responses in the quiz, your Strength Profile is:</div>
            <div class="text-center">
                <div class="head" style="background-color: {{ $strength->bg_color }}; width: 30%; margin: 0 auto; border-radius: 25px; padding: 10px; text-align: center; color: #fff;">{{ $strength->outcome }}</div>
            </div>
            <div class="desc"><p>{!! $strength->description !!}</p></div>
        </div>
        <div class="profile"><img src="./assets/images/profile.jpg" class="img-fluid"/></div>
    </div>
    <div class="br"></div>
    <div class="row">
        <div class="col page">
            <div class='head'>YOUR PROFILE BREAKDOWN</div>
            <img src="https://quickchart.io/chart?width=350&height=150&c={{ urlencode($chart) }}"/>
            <div class='head mt-3'>YOUR FOCUS FOR GROWTH</div>
            <p>Based on your quiz responses, the area that matters most to you right now is…</p>
            <div class="row">
                <div class="head col-md-6" style="background-color: {{ $strength->bg_color }}; border-radius: 25px; text-align: center; color: #fff;">{{ $strength->outcome }}</div>
                <div class="head col-md-6" style="background-color: {{ $strength->bg_color }}; border-radius: 25px; text-align: center; color: #fff;">{{ $strength->outcome }}</div>
            </div>
            <div class="row">
                <div class="head col-md-6" style="background-color: {{ $strength->bg_color }}; border-radius: 25px; text-align: center; color: #fff;">{{ $strength->outcome }}</div>
                <div class="head col-md-6" style="background-color: {{ $strength->bg_color }}; border-radius: 25px; text-align: center; color: #fff;">{{ $strength->outcome }}</div>
            </div>
            <p>Does that sound right? Or is there something else?</p>
            <p>Perhaps it is a combination of more than one?</p>
        </div>
    </div>
</div>
</body>
</html>