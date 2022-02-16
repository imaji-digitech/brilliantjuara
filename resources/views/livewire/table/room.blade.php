<x-data-table :model="$rooms">
    <x-slot name="head">
        <tr>
            <th scope="col" wire:click.prevent="sortBy('id')" >
                # @include('components.sort-icon',['field'=>"id"])
            </th>
            <th scope="col" wire:click.prevent="sortBy('title')" >
                title @include('components.sort-icon',['field'=>"title"])
            </th>
            <th scope="col" wire:click.prevent="sortBy('title')" >
                slug @include('components.sort-icon',['field'=>"title"])
            </th>

            <th>aksi</th>
        </tr>
    </x-slot>
    <x-slot name="body">
        @foreach ($rooms as $index=>$room)
            <tr x-data="window.__controller.dataTableController({{ $room->id }})">
                <td scope="row">{{ ($page-1)*$perPage+$index+1 }}</td>
                <td>{{ $room->title }}</td>
                <td>{{ $room->slug }}</td>
                <td>
                    <a role="button" href="{{ route('admin.room.edit',$room->id) }}" style="margin-right:15px">
                        <i class="fa fa-16px fa-pen">Ubah</i></a>
                    <a role="button" href="{{ route('admin.bundle.index',$room->slug) }}" style="margin-right:15px">
                        <i class="fa fa-16px fa-cart-plus">Bundle</i></a>
                    <a role="button" href="{{ route('admin.course.index',$room->slug) }}" style="margin-right:15px">
                        <i class="fa fa-16px fa-book">Bimbel</i></a>
                    <a role="button" href="{{ route('admin.exam.index',$room->slug) }}" style="margin-right:15px">
                        <i class="fa fa-16px fa-book-open">exam</i></a>
                    <a role="button" href="{{ route('admin.room.banner.index',$room->slug) }}" style="margin-right:15px">
                        <i class="fa fa-16px fa-image">banner</i></a>
                    <a role="button" href="{{ route('admin.room.event.index',$room->slug) }}" style="margin-right:15px">
                        <i class="fa fa-16px fa-calendar">event</i></a>
                    <a role="button" wire:click="deleteItem({{$room->id}})" class="mr-3">
                        <i class="fa fa-16px fa-trash text-danger">Hapus</i></a>
                    {{--                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>--}}
                </td>
            </tr>
        @endforeach
    </x-slot>
</x-data-table>
