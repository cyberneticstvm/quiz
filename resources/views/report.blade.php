<!DOCTYPE html>
<html lang="en">
<head>
    <title>Lifestyle Design quiz Report</title>
    <link rel="icon" type="image/x-icon" href="{{ public_path().'/assets/images/favicon.png' }}">
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
        background: url("./assets/images/cover-new.jpg");
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
        width: 80%;
        text-align: justify;
        font-size: 1rem;
        margin-left: 5%;
        margin-right: 5%;
    }
    .signature img{
        margin-left: 5%;
    }
    p.small, .page li{
        font-size: 12px;
    }
    .br{
        page-break-after: always;
    }
    .desc{
        height: 33%;
        margin-bottom: -6%;
    }
    .desc1{
        height: 57%;
        margin-bottom: -2%;
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
        padding: 15px 0 15px 0;
        background-color: #0070C0;
        font-family: 'text';
        width: 60%;
        margin-top: 3%;
        margin-left: 17%;
        bottom: 10;
        position: fixed;
    }
    .call a{
        text-decoration: none;
        cursor: pointer;
        color: #fff;
        letter-spacing: 1px;
    }
    .page li{
        width: 90%;
    }
    .solid{
        width: 90%;
        color: #000;
        font-weight: bold;
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
                <br>    
                <div class="head" style="background-color: {{ $strength->bg_color }}; width: 30%; margin: 0 auto; border-radius: 30px; padding: 10px; text-align: center; color: #fff;">{{ $strength->outcome }}</div>
                <br>
            </div>            
            <div class="desc"><p>{!! $strength->description !!}</p></div>
        </div>
        <div class="profile"><img src="./assets/bgs/{{ $quiz->category.'.jpg' }}" class="img-fluid"/></div>
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
            <p class="small">Get deeper clarity on what your signature strength means to you and how you can apply it to reach your goals…</p>
            <p class="small">{{ $outcome->description }}</p>
            <ul>
                @forelse($questions as $key => $question)
                <li>{!! $question->question !!}</li>
                    @if($question->type != 'radio')
                        <hr class='solid'>
                        <hr class='solid'>
                        <hr class='solid'>
                    @endif
                @empty
                @endforelse
            </ul>
            <div class="call"><a href="https://www.blueprintlifecoaching.com.au/coaching/let-s-talk" target="_blank">BOOK YOUR DISCOVERY CALL</a></div>
        </div>
    </div>
    <div class="br"></div>
    <div class="row">
        <div class="col page">
            <div class='head'>CHECKPOINT</div>
            <div class="desc1"><p>{!! $strength->description1 !!}</p></div>
        </div>
        <div class="checkpoint"><img src="./assets/images/checkpoint.jpg" class="img-fluid"/></div>
    </div>
    <div class="br"></div>
    <div class="row">
        <div class="col page">
            <div class='head'>MEET ANDREW</div>
            <p>Hey {{ $quiz->first_name }},</p>
            <p>Thanks for taking the quiz. I trust this report has helped you.</p>
            <p>The reason you’re here is because the traditional way of doing things has let you down – whether that be education, lifestyle or trying to make a positive difference – the old way hasn’t worked.</p>
            <p>That’s because you’ve been sold a lie.</p>
            <p>You were told that if you studied hard, worked hard, and followed the status quo – then everything would turn out fine. You would be happy.</p>
            <p>Trouble is, YOU weren’t born to be ordinary.</p>
            <p>You were born to play a bigger game.</p>
            <p>You cannot create happy, effective education, family life, work or business (or any worthwhile pursuit) unless you understand WHY you’re doing it. Your WHY comes from WHO you are – on the inside – the deepest part of you.</p>
            <p>This doesn’t come from following top-down, A-B-C instructions – it requires a personalised, strengths-based approach. It takes coaching.</p>
            <p>I’m a maverick educator, turned lifestyle design coach.</p>
            <p>I help people redesign their lives so they can learn, live and lead better – with passion and purpose. </p>
            <p>I want to help you too.</p>
            <div class="signature"><img src="./assets/images/signature.jpg" width="100" class="img-fluid" /></div>
            <div class="call"><a href="https://www.blueprintlifecoaching.com.au/coaching/let-s-talk" target="_blank">BOOK YOUR DISCOVERY CALL</a></div>
        </div>
    </div>
</div>
</body>
</html>