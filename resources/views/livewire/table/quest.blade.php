<x-data-table :model="$quests">
    <x-slot name="head">
        <tr>
            <th scope="col" wire:click.prevent="sortBy('id')" >
                # @include('components.sort-icon',['field'=>"id"])
            </th>
            <th scope="col" wire:click.prevent="sortBy('question')" >
                Soal
            </th>
            <th>Benar</th>
            <th>Salah</th>
            <th>aksi</th>
        </tr>
    </x-slot>
    <x-slot name="body">
        @foreach ($quests as $index=>$quest)
            <tr x-data="window.__controller.dataTableController({{ $quest->id }})">
                <td scope="row">{{ ($page-1)*$perPage+$index+1 }}</td>
                <td>{{ \Illuminate\Support\Str::limit(strip_tags($quest->question), 150, $end='...') }}</td>
                @php
                $id=$quest->id;
$totalAnalytic = \Illuminate\Support\Facades\DB::select(\Illuminate\Support\Facades\DB::raw("
    SELECT COUNT(*) as answer FROM `exam_answers`
        JOIN exam_quests ON exam_quests.id=exam_answers.exam_quest_id
    WHERE exam_quest_id = $id"));
if ($totalAnalytic!=null){
                $totalAnalytic=$totalAnalytic[0]->answer;
                $wrongAnalytic = \Illuminate\Support\Facades\DB::select(\Illuminate\Support\Facades\DB::raw("
    SELECT COUNT(*) as answer FROM `exam_answers`
        JOIN exam_quests ON exam_quests.id=exam_answers.exam_quest_id
    WHERE exam_quest_id = $id AND exam_answers.answer!=exam_quests.answer"));
            $rightAnalytic = \Illuminate\Support\Facades\DB::select(\Illuminate\Support\Facades\DB::raw("
    SELECT COUNT(*) as answer FROM `exam_answers`
        JOIN exam_quests ON exam_quests.id=exam_answers.exam_quest_id
    WHERE exam_quest_id = $id AND exam_answers.answer=exam_quests.answer"));

            if ($wrongAnalytic!=null){
                $wrongAnalytic=$wrongAnalytic[0]->answer;
            }
            if ($rightAnalytic!=null){
                $rightAnalytic=$rightAnalytic[0]->answer;
            }
            }else{
    $rightAnalytic=0;
    $wrongAnalytic=0;
    $totalAnalytic=0;
            }
                @endphp
                <td>{{ ($totalAnalytic!=0)?round($rightAnalytic/$totalAnalytic*100,2):0 }}%</td>
                <td>{{ ($totalAnalytic!=0)?round($wrongAnalytic/$totalAnalytic*100,2):0 }}%</td>
                <td>
                    <a role="button" href="{{ route('admin.exam.question.edit',[$quest->examStep->exam->room->slug,$quest->examStep->exam->slug,$quest->exam_step_id,$quest->id]) }}" class="mr-3">
                        <i class="fa fa-16px fa-pen">Ubah</i></a>
                    <a role="button" wire:click="deleteItem({{$quest->id}})" class="mr-3">
                        <i class="fa fa-16px fa-trash text-danger"></i></a>
{{--                    <a role="button" href="{{ route('admin.quest.show',[$quest->room->slug,$quest->slug]) }}" class="mr-3">--}}
{{--                        <i class="fa fa-16px fa-eye">Lihat</i></a>--}}
{{--                    <a role="button" href="{{ route('quest.index',$quest->slug) }}" class="mr-3">--}}
{{--                        <i class="fa fa-16px fa-book">Bimbel</i></a>--}}
                </td>
            </tr>
        @endforeach
    </x-slot>
</x-data-table>
