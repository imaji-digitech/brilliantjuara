<x-data-table :model="$exams">
    <x-slot name="head">
        <tr>
            <th scope="col" wire:click.prevent="sortBy('id')">
                # @include('components.sort-icon',['field'=>"id"])
            </th>
            <th scope="col" wire:click.prevent="sortBy('title')">
                Waktu mulai @include('components.sort-icon',['field'=>"title"])
            </th>
            <th scope="col" wire:click.prevent="sortBy('title')">
                Waktu selesai @include('components.sort-icon',['field'=>"title"])
            </th>
            <th>
                Status
            </th>
            <th>
                Hasil TWK
            </th>
            <th>
                Hasil TIU
            </th>
            <th>
                Hasil TKP
            </th>
            <th>
                Total
            </th>
            <th>aksi</th>
        </tr>
    </x-slot>
    <x-slot name="body">
        @foreach ($exams as $index=>$exam)
            <tr x-data="window.__controller.dataTableController({{ $exam->id }})">
                <td scope="row">{{ ($page-1)*$perPage+$index+1 }}</td>
                <td>{{ $exam->created_at }}</td>
                <td>{{ $exam->created_at->addMinutes($exam->exam->time) }}</td>
                <td>
                    @if (\Carbon\Carbon::now()>$exam->created_at->addMinutes($exam->exam->time) and $exam->status==1 )
                        {{ $exam->setDone($exam->id) }}
                        Selesai
                    @else
                        {{ $exam->status==1?'Pengerjaan':'Selesai' }}
                    @endif
                </td>
                @php
                    $totalPoint=[];
                    //foreach ($exam->examAnswers as $i => $eu) {
                      //  $answer = $eu->examQuest->answer == $eu->answer;
                        //if ($answer) {
                          //  $totalPoint+=$eu->examQuest->examStep->score_right;
                        //}
                    //}
                    $sekdinPoint=[];
                foreach ($exam->examAnswers as $i => $eu) {
                $answer = $eu->examQuest->answer == $eu->answer;
                if (!isset($sekdinPoint[$eu->examQuest->exam_step_id])) {
                    $sekdinPoint[$eu->examQuest->exam_step_id] = 0;
                }
                if ($eu->examQuest->examStep->type_exam == 2) {
                        if (isset($sekdinPoint[$eu->examQuest->exam_step_id]) and $eu->answer!=0) {
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
                @foreach($exam->exam->examSteps as $a)
                    <td>{{ $sekdinPoint[$a->id] }}</td>
                @endforeach
                <td>{{ array_sum($sekdinPoint) }}</td>
                <td>
                    @if (\Carbon\Carbon::now()<$exam->created_at->addMinutes($exam->exam->time) and $exam->status==1 )
                        {{--                    @if($exam->status==1)--}}
                        <a role="button" href="{{ route('admin.user.exam.exam',[$exam->exam->slug,$exam->id]) }}"
                           class="mr-3">
                            <i class="fa fa-16px fa-forward">Start</i>
                        </a>
                    @else
                        @if($exam->exam->status_discussion==1)
                            <a role="button"
                               href="{{ route('admin.user.exam.discussion',[$exam->exam->slug,$exam->id]) }}"
                               class="mr-3">
                                <i class="fa fa-16px fa-book">Hasil&Pembahasan</i>
                            </a>
                        @endif
                        {{--                        @if($exam->exam->status_view_score==1)--}}
                        {{--                            <a role="button" href="{{ route('admin.user.exam.result',[$exam->exam->slug,$exam->id]) }}"--}}
                        {{--                               class="mr-3">--}}
                        {{--                                <i class="fa fa-16px fa-file">Hasil</i>--}}
                        {{--                            </a>--}}
                        {{--                        @endif--}}
                    @endif

                </td>
            </tr>
        @endforeach
    </x-slot>
</x-data-table>
