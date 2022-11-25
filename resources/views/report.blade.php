<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
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
        font-family: text;
    }
    .head p{
        font-family: text;
        font-size: 1.5rem;
        font-weight: bold;
    }
    .page p{
        width: 90%;
        text-align: justify;
        font-size: 1.2rem;
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
        <div class='col-md-12 head'><p>YOUR STRENGTH PROFILE</p></div>
        <div class="col page">
            <div class="mb-3">Based on your responses in the quiz, your Strength Profile is:</div>
            <div class="text-center">
                <p style="background-color: {{ $strength->bg_color }}; width: 30%; margin: 0 auto; border-radius: 25px; padding: 10px; text-align: center;">{{ $strength->outcome }}</p>
            </div>
            <p class="desc">{!! $strength->description !!}</p>
        </div>
    </div>
    <div class="br"></div>
    <div class="row">
        <div class="col page">
        <div class='head'><p>YOUR PROFILE BREAKDOWN</p></div>
            <img src="https://quickchart.io/chart?width=350&height=150&c={{ urlencode($chart) }}"/>
        </div>
    </div>
</div>
</body>
</html>