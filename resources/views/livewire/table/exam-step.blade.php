<x-data-table :model="$exams">
    <x-slot name="head">
        <tr>
            <th scope="col" wire:click.prevent="sortBy('id')" >
                # @include('components.sort-icon',['field'=>"id"])
            </th>
            <th scope="col" wire:click.prevent="sortBy('title')" >
                Jenjang @include('components.sort-icon',['field'=>"title"])
            </th>
            <th>
                Jumlah soal
            </th>
            <th scope="col" wire:click.prevent="sortBy('title')" >
                Slug @include('components.sort-icon',['field'=>"title"])
            </th>
            <th scope="col" wire:click.prevent="sortBy('type_exam')" >
                Jenis @include('components.sort-icon',['field'=>"type_exam"])
            </th>
            <th>
                nilai benar
            </th>
            <th>
                nilai salah
            </th>
            <th>aksi</th>
        </tr>
    </x-slot>
    <x-slot name="body">
        @foreach ($exams as $index=>$exam)
            <tr x-data="window.__controller.dataTableController({{ $exam->id }})">
                <td scope="row">{{ ($page-1)*$perPage+$index+1 }}</td>
                <td>{{ $exam->title }}</td>
                <td>{{ $exam->examQuests->count() }}</td>
                <td>{{ $exam->slug }}</td>
                <td>{{ $exam->type_exam==1?'static':'dynamic' }}</td>
                <td>{{ $exam->type_exam==1?$exam->score_right:'dynamic' }}</td>
                <td>{{ $exam->type_exam==1?$exam->score_wrong:'dynamic' }}</td>
                <td>
                    <a role="button" href="{{ route('admin.exam.step.edit',[$exam->exam->room->slug,$exam->exam->slug,$exam->id]) }}" class="mr-3">
                        <i class="fa fa-16px fa-pen">Ubah</i></a>
                    <a role="button" href="{{ route('admin.exam.question',[$exam->exam->room->slug,$exam->exam->slug,$exam->id]) }}" class="mr-3">
                        <i class="fa fa-16px fa-eye">Soal</i></a>
                    <a role="button" wire:click="deleteItem({{$exam->id}})" class="mr-3">
                        <i class="fa fa-16px fa-trash text-danger"></i></a>
                </td>
            </tr>
        @endforeach
    </x-slot>
</x-data-table>
