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
    .table{
        margin: 0 5%;
        width: 90%;
    }
    .td{
        border-radius: 10%;
        text-align: center;
        color: #000;
        padding: 20px 0 20px 0;
        background-color: #D3D3D3;
        font-family: 'text';
    }
    .call{
        border-radius: 10%;
        text-align: center;
        color: #fff;
        padding: 20px 0 20px 0;
        background-color: #0070C0;
        font-family: 'text';
        width: 60%;
        margin-top: 7%;
        margin-left: 17%;
    }
    .call a{
        text-decoration: none;
        cursor: pointer;
        color: #fff;
        letter-spacing: 1px;
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
        </div>
    </div>
    <div class="row page">
        <div class='head mt-5'>YOUR FOCUS FOR GROWTH</div>
        <p>Based on your quiz responses, the area that matters most to you right now is…</p>
    </div>
    <div class="row">
        <div class="col tbl">
            <table class="table">
                <tr>
                    <td class="td" style="background-color: {{ ($outcome->outcome == 'EDU') ? $strength->bg_color : '' }}">EDUCATIONAL DESIGN</td><td>&nbsp;</td>
                    <td class="td" style="background-color: {{ ($outcome->outcome == 'LSD') ? $strength->bg_color : '' }}">LIFESTYLE DESIGN</td>
                </tr>
                <tr><td colspan="3"><br><br></td></tr>
                <tr>
                    <td class="td" style="background-color: {{ ($outcome->outcome == 'LAC') ? $strength->bg_color : '' }}">LEADERSHIP + CULTURE</td><td>&nbsp;</td>
                    <td class="td" style="background-color: {{ ($outcome->outcome == 'MPD') ? $strength->bg_color : '' }}">MINDSET & GROWTH</td>
                </tr>
            </table>
        </div>
        <div class="page">
            <p>Does that sound right? Or is there something else?</p>
            <p>Perhaps it is a combination of more than one?</p>
            <div class="call"><a href="https://www.blueprintlifecoaching.com.au/coaching/let-s-talk" target="_blank">BOOK YOUR DISCOVERY CALL</a></div>
        </div>
    </div>
    <div class="br"></div>
    <div class="row">
        <div class="col page">
            <div class='head'>CLARITY QUESTIONS</div>
            <p>Get deeper clarity on what your signature strength means to you and how you can apply it to reach your goals…</p>
            <ul>
                @forelse($questions as $key => $question)
                {!! $question->question !!}
                @empty
                @endforelse
            </ul>
        </div>
    </div>
</div>
</body>
</html>