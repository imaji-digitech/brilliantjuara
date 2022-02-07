<div class="row">
    <div class="col-sm-7">
        <div class="card">
            <div class="card-body">
                @isset( $questActive->examQuest->question)
                    {{ $questActive->examQuest->question }}

                    <div class="col">
                        <div class="mb-3 m-t-15 custom-radio-ml">
                            @php($alphabet=['','A','B','C','D','E'])
                            @foreach($questActive->examQuest->examQuestChoices as $eqc)
                                <div class="form-check radio radio-primary">
                                    <input class="form-check-input" type="radio"
                                           wire:click="changeAnswer({{$eqc->choice}})" {{ $questActive->answer==$eqc->choice?'checked':'' }}>
                                    <label class="form-check-label"
                                           wire:click="changeAnswer({{$eqc->choice}})">{{ $alphabet[$eqc->choice] }}
                                        . {{ $eqc->answer }}</label>
                                </div>
                            @endforeach

                        </div>
                    </div>
                @endisset
            </div>
        </div>
    </div>
    <div class="col-sm-5">
        <div class="card" style="padding: 0;">
            <div class="card-body text-center" style="padding: 0; padding-bottom: 10px">
                @foreach($examUser->examAnswers as $i=>$eu)
                    @if($i%10==0)
                        <br>
                    @endif
                    <button class="col-sm-1 btn-sm btn {{$eu->answer!=0?'btn-primary':'btn-danger'}}"
                            style="padding: 0"
                            wire:click="changeActive({{$eu->id}})">{{$i+1}} </button>
                @endforeach

            </div>
        </div>
    </div>
</div>
