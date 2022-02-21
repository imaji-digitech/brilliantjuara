<x-data-table :model="$exams">
    <x-slot name="head">
        <tr>
            <th scope="col" wire:click.prevent="sortBy('id')">
                # @include('components.sort-icon',['field'=>"id"])
            </th>
            <th scope="col" wire:click.prevent="sortBy('user_id')">
                Nama @include('components.sort-icon',['field'=>"user_id"])
            </th>
            <th scope="col" wire:click.prevent="sortBy('exam_id')">
                Ujian @include('components.sort-icon',['field'=>"exam_id"])
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
                Hasil
            </th>

            {{--            <th>Hasil</th>--}}
            <th>aksi</th>
        </tr>
    </x-slot>
    <x-slot name="body">
        @foreach ($exams as $index=>$exam)
            <tr x-data="window.__controller.dataTableController({{ $exam->id }})">
                <td scope="row">{{ ($page-1)*$perPage+$index+1 }}</td>
                <td>{{ $exam->user->name }}</td>
                <td>{{ $exam->exam->title }}</td>
                <td>{{ $exam->created_at }}</td>
                <td>{{ $exam->created_at->addMinutes($exam->exam->time) }}</td>
                <td>
                    @if (\Carbon\Carbon::now()>$exam->created_at->addMinutes($exam->exam->time))
                        {{ $exam->setDone($exam->id) }}
                        Selesai
                    @else
                        {{ $exam->status==1?'Pengerjaan':'Selesai' }}
                    @endif
                </td>
                @php
                    $totalPoint=0;
                    $totalHigh=0;
                    foreach ($exam->examAnswers as $i => $eu) {
                        $totalHigh+=$eu->examQuest->examStep->score_right;
                        $answer = $eu->examQuest->answer == $eu->answer;
                        if ($answer) {
                            $totalPoint+=$eu->examQuest->examStep->score_right;
                        }
                    }
                @endphp
                <td>{{ $exam->status==1?'-':number_format((float)($totalPoint/$totalHigh*100), 2, '.', '').'%' }}</td>
                <td>
                    <a role="button"
                       href="{{ route('admin.user.exam.discussion',[$exam->exam->slug,$exam->id]) }}"
                       class="mr-3">
                        <i class="fa fa-16px fa-book">Hasil&Pembahasan</i>
                    </a>
                </td>
            </tr>
        @endforeach
    </x-slot>
</x-data-table>
