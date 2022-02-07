<x-data-table :model="$courses">
    <x-slot name="head">
        <tr>
            <th scope="col" wire:click.prevent="sortBy('id')" >
                # @include('components.sort-icon',['field'=>"id"])
            </th>
            <th scope="col" wire:click.prevent="sortBy('title')" >
                Bimbel @include('components.sort-icon',['field'=>"title"])
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
        @foreach ($courses as $index=>$course)
            <tr x-data="window.__controller.dataTableController({{ $course->id }})">
                <td scope="row">{{ ($page-1)*$perPage+$index+1 }}</td>
                <td>{{ $course->title }}</td>
                <td>Rp. {{ number_format($course->price) }}</td>
                <td>{{ $course->slug }}</td>
                <td>
                    <a role="button" href="{{ route('admin.course.edit',[$course->room->slug,$course->id]) }}" class="mr-3">
                        <i class="fa fa-16px fa-pen">Ubah</i></a>
                    <a role="button" href="{{ route('admin.course.show',[$course->room->slug,$course->slug]) }}" class="mr-3">
                        <i class="fa fa-16px fa-eye">Lihat</i></a>
{{--                    <a role="button" href="{{ route('admin.course.index',$course->slug) }}" class="mr-3">--}}
{{--                        <i class="fa fa-16px fa-book">Bimbel</i></a>--}}
                </td>
            </tr>
        @endforeach
    </x-slot>
</x-data-table>
