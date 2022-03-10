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
        @page { margin: 100px 25px; }
        .watermarked {
            position: relative;
        }

        .watermarked:after {
            content: "";
            display: block;
            width: 100%;
            height: 100%;
            position: absolute;
            top: 5%;
            left: 0;
            {{--background-image: url({{ public_path('uploads/br-logo.png') }});--}}
            background-size: {{ 1526/4 }}px {{ 992/4 }}px;
            background-position: 10px center;
            background-repeat: no-repeat;
            opacity: 0.2;
        }

        p {
            padding: 0;
            margin: 0;
        }

        body {
            background-image: url({{ public_path('uploads/asdaa.png') }});
            background-position: top left;
            background-repeat: no-repeat;
            background-size: 100%;
            /*position: absolute;*/
            /*width: 100%;*/
            /*height: 100%;*/
        }

        footer {
            position: fixed;
            left: 0;
            bottom: 0;
            right: 0;
            height: 40px;
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
    <div>
        @php($i=1)
        @foreach($exam->examSteps as $es)
            @foreach($es->examQuests as $q)
                <div style="border: 2px solid #36A7B3; padding: 5px" class="watermarked">
                    <table style="width: 100%">
                        <tr>
                            <td style="vertical-align: top; width: 30px">
                                <div
                                    style="background-color: #36A7B3; width: 30px;height: 25px; text-align: center; color: gold">
                                    {{ $i }}
                                </div>
                            </td>
                            <td></td>
                            <td style="text-align: justify !important;">
                                <div>
                                    <div id="question"></div>
                                    <div id="first"></div>
                                    {{--                                    {{ $questActive['equation'] }}--}}
                                    <script>
                                        window.onload = function() {
                                            var questiona = new MathEditor('first', 0, '');
                                            questiona.setLatex('{{ str_replace('\\','\\\\',$q->equation) }}')
                                        };
                                    </script>
{{--                                    @push('scripts')--}}
{{--                                        <script>--}}
{{--                                            document.addEventListener('DOMContentLoaded', () => {--}}
{{--                                                this.livewire.on('mathQuill', data => {--}}
{{--                                                    var question = new MathEditor('question', 0, '');--}}
{{--                                                    question.setLatex(data)--}}
{{--                                                })--}}
{{--                                            });--}}
{{--                                        </script>--}}
{{--                                    @endpush--}}
                                </div>
                                    <br>
{{--                    {{ public_path('uploads/discussion.jpg') }}--}}
                    @php($some=str_replace('http://127.0.0.1:8000/','',$q->question))
                                    {!! $some !!}
                                </div>
                                @php($alphabet=['','A','B','C','D','E'])
                                @foreach($q->examQuestChoices as $eqc)

                                    @if($eqc->choice==$q->answer)
                                        {{--                                    <b>{!! $alphabet[$eqc->choice].". " .$eqc->answer !!}</b>--}}
                                        <table>
                                            <tr style="font-weight: bold">
                                                <td style="width: 30px">
                                                    {{ $alphabet[$eqc->choice] }}.
                                                </td>
                                                <td>
                                                    {!! $eqc->answer  !!}
                                                </td>
                                            </tr>
                                        </table>
                                    @else
                                        <table>
                                            <tr>
                                                <td style="width: 30px">
                                                    {{ $alphabet[$eqc->choice] }}.
                                                </td>
                                                <td>
                                                    {!! $eqc->answer  !!}
                                                </td>
                                            </tr>
                                        </table>
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
    </div>
    <br>
</main>
</body>
</html>
