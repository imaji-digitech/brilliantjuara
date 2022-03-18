<div>
    <div class="row">
        <div class="card col-md-12">
            <div class="card-body">
                <div class="row mb-4 mt-4">
                    <h5>{{ $last->format('Y m d H:i:s') }}</h5>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <td>Rank</td>
                                <td>Nama</td>
                                @foreach($exam->examSteps as $es)
                                    <td>{{ $es->title }}</td>
                                @endforeach
                            </tr>
                            </thead>
                            <tbody wire:poll.7000ms>
                            @foreach($rankings as $index=>$r)
                                <tr
                                    @if($index==0)
                                    style="background-color:  #ffd700;"
                                    @elseif($index==1)
                                    style="background-color:  #c0c0c0"
                                    @elseif($index==2)
                                    style="background-color:  #cd7f32"
                                    @else
                                    style="background-color:  white"
                                    @endif>
                                    <td>{{ $index+1 }}</td>
                                    <td>{{ $r->examUser->user->name }}</td>
                                    @php
                                        $sekdinPoint=[];
                    foreach ($r->examUser->examAnswers as $i => $eu) {
                    $answer = $eu->examQuest->answer == $eu->answer;
                    if (!isset($sekdinPoint[$eu->examQuest->exam_step_id])) {
                        $sekdinPoint[$eu->examQuest->exam_step_id] = 0;
                    }
                    if ($eu->examQuest->examStep->type_exam == 2) {
                        if (isset($sekdinPoint[$eu->examQuest->exam_step_id])) {
                            dd(App\Models\ExamQuestChoice::whereChoice($eu->answer)->whereExamQuestId($eu->exam_quest_id)->first());
                            $sekdinPoint[$eu->examQuest->exam_step_id] += App\Models\ExamQuestChoice::whereChoice($eu->answer)->whereExamQuestId($eu->exam_quest_id)->first()->score;
                        }
                    } else {
                        if ($answer) {
                            if (isset($sekdinPoint[$eu->examQuest->exam_step_id])) {
                                $sekdinPoint[$eu->examQuest->exam_step_id] += $eu->examQuest->examStep->score_right;
                            }
                        }
                    }
                    }
                                    @endphp
                                    @foreach($exam->examSteps as $es)
                                        <td>{{ $sekdinPoint[$es->id] }}</td>
                                    @endforeach
{{--                                        <td>--}}
{{--                                            @if(auth()->user()->role==1)--}}
{{--                                                <a href="{{ route('admin.user.exam.ranking.remove',$r->id) }}"--}}
{{--                                                   onclick="return confirm('Are you sure you want to delete this item?');"--}}
{{--                                                >Hapus</a>--}}
{{--                                            @endif--}}
{{--                                        </td>--}}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
