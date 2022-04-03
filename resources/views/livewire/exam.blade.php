<div class="row">
    <div class="col-sm-4 desktop-only">
        <div class="card" style="padding: 0;">
            <div class="card-body text-center" style="padding: 0; padding-bottom: 10px">
                @foreach($examUser->examAnswers as $i=>$eu)
                    @if($i%8==0)
                        <br>
                    @endif
                    <button class="btn-sm btn {{$eu->answer!=0?'btn-success':'btn-danger'}}"
                            style="width: 30px;height: 30px; padding: 0;margin: 2px;
                                box-shadow: -3px 3px {{$eu->answer!=0?'green':'red'}},
                                -2px 2px {{$eu->answer!=0?'green':'pink'}},
                                -1px 1px {{$eu->answer!=0?'green':'pink'}};
                                border: 1px solid {{$eu->answer!=0?'green':'pink'}};"
                            wire:click="changeActive({{$i}})">{{$i+1}} </button>
                @endforeach

            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="card">
            <div class="card-body">
                <button class="float-end btn btn-danger" wire:click="report({{$questActive->examQuest->id}})">Laporkan
                    soal
                </button>
                <br><br>
                <br>
                @isset( $questActive->examQuest->question)
                    <table style="width: 100%">
                        <tr style="vertical-align: top">
                            <td style="width: 35px; vertical-align: top">
                                {{$number+1}}.
                            </td>
                            <td style="text-align: justify !important;vertical-align: top">
                                <div>
{{--                                    <div id="question"></div>--}}
                                    @if($this->questActive->examQuest->equation!=null)
                                        <div id="question">{{ $questActive->examQuest->equation }}</div>
{{--                                        $questActive->examQuest->question--}}
                                        <script>
                                            document.addEventListener('livewire:load', function () {
                                                Livewire.emit('mathQuill', 'question')
                                            });
                                        </script>
                                    @endif
{{--                                        <div id="first"></div>--}}
{{--                                        <script>--}}
{{--                                            document.addEventListener('livewire:load', function () {--}}
{{--                                                var questiona = new MathEditor('first', 0, '');--}}
{{--                                                questiona.setLatex('{!! str_replace('\\','\\\\',$questActive['equation']) !!}')--}}
{{--                                            });--}}
{{--                                        </script>--}}
{{--                                    @endif--}}
{{--                                    @push('scripts')--}}
{{--                                        <script>--}}
{{--                                            document.addEventListener('DOMContentLoaded', () => {--}}
{{--                                                this.livewire.on('mathQuill', data => {--}}
{{--                                                    var question = new MathEditor('question', 0, '');--}}
{{--                                                    question.setLatex(data)--}}
{{--                                                })--}}
{{--                                            });--}}
{{--                                        </script>--}}


                                </div>
                                {!! $questActive->examQuest->question  !!}
                            </td>
                        </tr>
                    </table>

                    <div class="col">
                        <div class="mb-3 m-t-15 custom-radio-ml">
                            @php($alphabet=['','A','B','C','D','E'])
                            @foreach($questActive->examQuest->examQuestChoices as $eqc)
                                <div class="form-check radio radio-primary" wire:click="changeAnswer({{$eqc->choice}})">
                                    <input class="form-check-input"
                                           type="radio"
                                           wire:click="changeAnswer({{$eqc->choice}})"
                                        {{ $questActive->answer==$eqc->choice?'checked':'' }}>
                                    <label style="width: 100%">
                                        <table>
                                            <tr>
                                                <td style="width: 30px; vertical-align: top" wire:click="changeAnswer({{$eqc->choice}})"
                                                    {{ $questActive->answer==$eqc->choice?'checked':'' }}>
                                                    {{ $alphabet[$eqc->choice] }}.
                                                </td>
                                                <td style="text-align: justify !important;vertical-align: top;-webkit-user-select: none;
                            -khtml-user-select: none;
                            -moz-user-select: none;
                            -ms-user-select: none;
                            -o-user-select: none;
                            user-select: none;"
                                                    wire:click="changeAnswer({{$eqc->choice}})"
                                                    {{ $questActive->answer==$eqc->choice?'checked':'' }}>
                                                    <div wire:click="changeAnswer({{$eqc->choice}})"
                                                        {{ $questActive->answer==$eqc->choice?'checked':'' }} >
                                                        @if($eqc->equation!=null)
                                                            <div id="eq{{$eqc->choice}}">{{$eqc->equation}}</div>
                                                            <script>
                                                                document.addEventListener('livewire:load', function () {
                                                                    Livewire.emit('mathQuill', 'eq{{$eqc->choice}}')
                                                                });
                                                            </script>
                                                        @endif
                                                    </div>
                                                    @if($eqc->answer!='<br>')
                                                        {!! $eqc->answer  !!}
                                                    @endif
                                                </td>
                                            </tr>
                                        </table>
                                    </label>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <button class="ml-3 btn btn-warning" wire:click="changeAnswer(0)">Kosongkan</button>
                    <div class="float-end">

                        @if($number!=0)
                            <button class="btn btn-primary mr-3" wire:click="changeActive({{$number-1}})">Sebelumnya
                            </button>
                        @endif
                        @if($number+1!=$examUser->examAnswers->count())
                            <button class="btn btn-primary mr-3" wire:click="changeActive({{$number+1}})">Selanjutnya
                            </button>
                        @endif
                        @if($number+1==$examUser->examAnswers->count())
                            <button class="btn btn-success mr-3" wire:click="setDone()">Selesai
                            </button>
                        @endif
                    </div>
                @endisset
            </div>
        </div>
    </div>
    <div class="col-sm-5 mobile-only">
        <div class="card" style="padding: 0;">
            <div class="card-body text-center" style="padding: 0; padding-bottom: 10px">
                @foreach($examUser->examAnswers as $i=>$eu)
                    @if($i%8==0)
                        <br>
                    @endif
                    <button class="btn-sm btn {{$eu->answer!=0?'btn-success':'btn-danger'}}"
                            style="width: 30px;height: 30px; padding: 0;margin: 2px;
                                box-shadow: -3px 3px {{$eu->answer!=0?'green':'red'}},
                                -2px 2px {{$eu->answer!=0?'green':'pink'}},
                                -1px 1px {{$eu->answer!=0?'green':'pink'}};
                                border: 1px solid {{$eu->answer!=0?'green':'pink'}};"
                            wire:click="changeActive({{$i}})">{{$i+1}} </button>
                @endforeach

            </div>
        </div>
    </div>
</div>
