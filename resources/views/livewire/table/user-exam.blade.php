<x-data-table :model="$exams">
    <x-slot name="head">
        <tr>
            <th scope="col" wire:click.prevent="sortBy('id')" >
                # @include('components.sort-icon',['field'=>"id"])
            </th>
            <th scope="col" wire:click.prevent="sortBy('title')" >
                Waktu mulai @include('components.sort-icon',['field'=>"title"])
            </th>
            <th scope="col" wire:click.prevent="sortBy('title')" >
                Waktu selesai @include('components.sort-icon',['field'=>"title"])
            </th>
            <th>
                Status
            </th>
{{--            <th>Hasil</th>--}}
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
                    @if (\Carbon\Carbon::now()>$exam->created_at->addMinutes($exam->exam->time))
                    Selesai
                    @else
                        Berlangsung
                    @endif
                </td>
                <td>
                    <a role="button" href="{{ route('admin.user.exam.exam',[$exam->exam->slug,$exam->id]) }}" class="mr-3">
                        <i class="fa fa-16px fa-book">Start</i></a>
                </td>
            </tr>
        @endforeach
    </x-slot>
</x-data-table>
