<!DOCTYPE html>
<html lang="en">
<head>
    <title>Lifestyle Design Quiz Report</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    @font-face {
        font-family: 'text';
        src: url("{{ storage_path('/fonts/Raleway-Light.ttf') }}") format("truetype");
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
        font-family: 'text';
    }
    .page p{
        width: 90%;
        text-align: justify;
        font-size: 1.2rem;
    }
    .head{
        font-family: 'text';
    }
    .br{
        page-break-after: always;
    }
  </style>
</head>
<body>
<div class="cover"></div>
<img src="./assets/images/thankyou.jpg" class="img-fluid"/> 
<div class="container-fluid">
    <div class="row">
        <div class="col page">
            <h5 class='head'>YOUR STRENGTH PROFILE</h5>
            <div class="mb-3">Based on your responses in the quiz, your Strength Profile is:</div>
            <div class="text-center">
                <h1 style="background-color: {{ $strength->bg_color }}; width: 30%; margin: 0 auto; border-radius: 25px; padding: 10px;">{{ $strength->outcome }}</h1>
            </div>
            <p class="desc">{!! $strength->description !!}</p>
        </div>
    </div>
    <div class="br"></div>
    <div class="row">
        <div class="col page">
            <h5 class='head'>YOUR PROFILE BREAKDOWN</h5>
            <img src="https://quickchart.io/chart?width=350&height=150&c={{ urlencode($chart) }}"/>
        </div>
    </div>
</div>
</body>
</html>