<x-data-table :model="$reportQuests">
    <x-slot name="head">
        <tr>
            <th scope="col" wire:click.prevent="sortBy('id')" >
                # @include('components.sort-icon',['field'=>"id"])
            </th>
            <th scope="col" wire:click.prevent="sortBy('user_id')" >
                Nama @include('components.sort-icon',['field'=>"user_id"])
            </th>
            <th scope="col" wire:click.prevent="sortBy('exam_quest_id')" >
                Soal @include('components.sort-icon',['field'=>"exam_quest_id"])
            </th>
            <th>
                Kelas
            </th>
            <th>aksi</th>
        </tr>
    </x-slot>
    <x-slot name="body">
        @foreach ($reportQuests as $index=>$reportQuest)
            <tr>
                <td scope="row">{{ ($page-1)*$perPage+$index+1 }}</td>
                <td>{{ $reportQuest->user->name }}</td>
                <td>{{ \Illuminate\Support\Str::limit(strip_tags($reportQuest->examQuest->question), 150, $end='...') }}</td>
                <td>{{ $reportQuest->examQuest->examStep->exam->title }}</td>
                <td>
                    <a role="button" href="{{ route('admin.exam.question.edit',[$reportQuest->examQuest->examStep->exam->room->slug,$reportQuest->examQuest->examStep->exam->slug,$reportQuest->examQuest->exam_step_id,$reportQuest->examQuest->id]) }}" class="mr-3">
                        <i class="fa fa-16px fa-pen">Perbaiki soal</i></a>
{{--                    <a role="button" wire:click="deleteItem({{$reportQuest->id}})" class="mr-3">--}}
{{--                        <i class="fa fa-16px fa-trash text-danger"></i></a>--}}
                </td>
            </tr>
        @endforeach
    </x-slot>
</x-data-table>
