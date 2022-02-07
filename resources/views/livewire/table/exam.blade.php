<x-data-table :model="$exams">
    <x-slot name="head">
        <tr>
            <th scope="col" wire:click.prevent="sortBy('id')" >
                # @include('components.sort-icon',['field'=>"id"])
            </th>
            <th scope="col" wire:click.prevent="sortBy('title')" >
                TO @include('components.sort-icon',['field'=>"title"])
            </th>
            <th scope="col" wire:click.prevent="sortBy('price')" >
                Harga satuan @include('components.sort-icon',['field'=>"price"])
            </th>
            <th scope="col" wire:click.prevent="sortBy('title')" >
                Slug @include('components.sort-icon',['field'=>"title"])
            </th>
            <th>aksi</th>
        </tr>
    </x-slot>
    <x-slot name="body">
        @foreach ($exams as $index=>$exam)
            <tr x-data="window.__controller.dataTableController({{ $exam->id }})">
                <td scope="row">{{ ($page-1)*$perPage+$index+1 }}</td>
                <td>{{ $exam->title }}</td>
                <td>Rp. {{ number_format($exam->price) }}</td>
                <td>{{ $exam->slug }}</td>
                <td>
                    <a role="button" href="{{ route('admin.exam.edit',[$exam->room->slug,$exam->id]) }}" class="mr-3">
                        <i class="fa fa-16px fa-pen">Ubah</i></a>
                    <a role="button" href="{{ route('admin.exam.show',[$exam->room->slug,$exam->slug]) }}" class="mr-3">
                        <i class="fa fa-16px fa-eye">Lihat</i></a>
{{--                    <a role="button" href="{{ route('admin.exam.index',$exam->slug) }}" class="mr-3">--}}
{{--                        <i class="fa fa-16px fa-book">Bimbel</i></a>--}}
                </td>
            </tr>
        @endforeach
    </x-slot>
</x-data-table>
