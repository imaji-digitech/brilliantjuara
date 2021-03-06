<div class="row">
    <div class="col-sm-4 desktop-only">
        <div class="card" style="padding: 0;">
            <div class="card-body text-center" style="padding: 0; padding-bottom: 10px">
                @foreach($quest as $i=>$eu)
                    @if($i%8==0)
                        <br>
                    @endif
                    <button class="btn-sm btn {{($i==$number)?'btn-success':'btn-default'}}"
                            style="width: 30px;height: 30px; padding: 0;margin: 2px;
                                box-shadow: -3px 3px gray;
                                border: 1px solid gray"
                            wire:click="changeActive({{$i}})">{{$i+1}} </button>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="row">
            <div class="card">
                <div class="card-body" style="padding: 10px">
                    <div class="row">
                        <div class="col-md-6">
                            <br>
                            Total pengerjaan : {{ $totalAnalytic }} <br>
                            Total benar : {{ ($totalAnalytic!=0)?round($rightAnalytic/$totalAnalytic*100,2):0 }}% <br>
                            Total kesalahan : {{ ($totalAnalytic!=0)?round($wrongAnalytic/$totalAnalytic*100,2):0 }}%
                        </div>
                        <div class="col-md-6">
                            Kosong : {{ $answerAnalytic[0] }} <br>
                            A : {{ $answerAnalytic[1] }} <br>
                            B : {{ $answerAnalytic[2] }} <br>
                            C : {{ $answerAnalytic[3] }} <br>
                            D : {{ $answerAnalytic[4] }} <br>
                            E : {{ $answerAnalytic[5] }} <br>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="float-end btn btn-danger m-1">
                    Jumlah dilaporkan
                    : {{ \App\Models\ReportQuest::whereExamQuestId($questActive['id'])->get()->count() }}
                </div>
                <a href="{{ route('admin.exam.exam-edit-update',[$exam->room->slug,$exam->slug,$questActive['id'],$number]) }}"
                   class="float-end btn btn-warning m-1">
                    Ubah
                </a>
                <br><br>
                <br>
                @isset( $questActive['question'])
                    <table style="width: 100%">
                        <tr>
                            <td style="width: 35px; vertical-align: top">
                                {{$number+1}}.
                            </td>
                            <td style="text-align: justify !important;vertical-align: top;
                            -webkit-user-select: none;
                            -khtml-user-select: none;
                            -moz-user-select: none;
                            -ms-user-select: none;
                            -o-user-select: none;
                            user-select: none;">
                                @if($questActive['equation']!=null)
                                    <div>
                                        <div id="question">{{ $questActive['equation'] }}</div>
                                        <script>
                                            document.addEventListener('livewire:load', function () {
                                                Livewire.emit('mathQuill', 'question')
                                            });
                                        </script>
                                    </div>
                                @endif
                                {!! $questActive['question']  !!}
                            </td>
                        </tr>
                    </table>

                    <div class="col">
                        <div class="mb-3 m-t-15 custom-radio-ml">
                            @php($alphabet=['','A','B','C','D','E'])
                            @foreach(\App\Models\ExamQuestChoice::whereExamQuestId($questActive['id'])->get() as $eqc)
                                <div class="form-check radio radio-primary">
                                    <input class="form-check-input"
                                           type="radio"{{ $questActive['answer']==$eqc->choice?'checked':'' }}>
                                    <label style="width: 100%">
                                        <table>
                                            <tr>
                                                <td style="text-align: justify !important;vertical-align: top">
                                                    {{ $alphabet[$eqc->choice] }}.
                                                </td>
                                                <td>
                                                    <div>
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
                    <div>
                        <br>
                        <div class="row">
                            <div class="col-1" style="width: 1px;display: inline-block"></div>
                            <div class="col-11">
                                <span>Jawaban Benar : </span><span
                                    class="text-primary">{{$alphabet[$questActive['answer']]}}</span>
                                <br> <br>
                                <div style="text-align: justify !important;">
                                    <div>
                                        <div id="discussion">{{ $questActive['discussion_equation'] }}</div>
                                        <script>
                                            document.addEventListener('livewire:load', function () {
                                                Livewire.emit('mathQuill', 'discussion')
                                            });
                                        </script>
                                    </div>
                                    {!! $questActive['discussion']  !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <div class="float-end">

                        @if($number!=0)
                            <button class="btn btn-primary mr-3" wire:click="changeActive({{$number-1}})">Sebelumnya
                            </button>
                        @endif
                        @if($number+1!=count($quest))
                            <button class="btn btn-primary mr-3" wire:click="changeActive({{$number+1}})">Selanjutnya
                            </button>
                        @endif
                        @if($number+1==count($quest))
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
                @foreach($quest as $i=>$eu)
                    @if($i%8==0)
                        <br>
                    @endif
                    <button class="btn-sm btn {{($i==$number)?'btn-success':'btn-default'}}"
                            style="width: 30px;height: 30px; padding: 0;margin: 2px;
                                box-shadow: -3px 3px gray;
                            {{---2px 2px {{$eu->answer!=0?'green':'pink'}},--}}
                            {{---1px 1px {{$eu->answer!=0?'green':'pink'}};--}}
                                border: 1px solid gray"
                            wire:click="changeActive({{$i}})">{{$i+1}} </button>
                @endforeach
            </div>
        </div>
    </div>
</div>
