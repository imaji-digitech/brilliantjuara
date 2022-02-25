<!DOCTYPE html>
<html lang="en" style="margin: 0;padding: 0">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{public_path('vendor/bootstrap.min.css')}}">
    <title>Pembahasan - {{ $exam->title }}</title>
    <style>
        header {
            position: fixed;
            left: 0;
            top: 0;
            height: 150px;
            text-align: center;
        }

        body {
            background-image: url({{ public_path('uploads/discussion.jpg') }});
            background-position: top left;
            background-repeat: no-repeat;
            background-size: 100%;
            /*width: 100%;*/
            /*height: 100%;*/
        }

        footer {
            position: fixed;
            left: 0;
            bottom: 0;
            right: 0;
            height: 30px;
        }

        #footer .page:after {
            content: counter(page, upper-roman);
        }

    </style>
</head>
<body style="padding: 150px 40px 30px 40px;margin: 0;">
<header style="width: 100%" id="header">
    {{--    <img style="width: 100%" src="{{public_path('images/kop_atas.jpg')}}" alt="">--}}
    <div style="text-align: left; margin: 10px;color: #36A7B3">
        <h3>{{ $exam->title }}</h3>
    </div>
</header>
<footer id="footer">
    {{--    <img style="width: 100%" src="{{public_path('images/kop_bawah.jpg')}}" alt="">--}}
</footer>

<main style="width:100%;" id="content">
    @php($i=1)
    @foreach($exam->examSteps as $es)
        @foreach($es->examQuests as $q)
            <div style="border: 2px solid #36A7B3; padding: 5px">
                <table style="width: 100%">
                    <tr>
                        <td style="vertical-align: top">
                            <div
                                style="background-color: #36A7B3; width: 20px;height: 20px; text-align: center; color: gold">
                                {{ $i }}
                            </div>
                        </td>
                        <td></td>
                        <td style="text-align: justify !important;">
                            {!! $q->question !!}
                            @php($alphabet=['','A','B','C','D','E'])
                            @foreach($q->examQuestChoices as $eqc)
                                <br>
                                @if($eqc->choice==$q->answer)
                                    <b>{!! $alphabet[$eqc->choice].". " .$eqc->answer !!}</b>
                                @else
                                    {!! $alphabet[$eqc->choice].". " .$eqc->answer !!}
                                @endif
                            @endforeach
                            <br>
                            <b>PEMBAHASAN : </b> <br>
                            {!! $q->discussion !!}
                        </td>
                    </tr>
                </table>
            </div>
            <br>
            @php($i++)
        @endforeach
    @endforeach
</main>


</body>
</html>
