<x-data-table :model="$rooms">
    <x-slot name="head">
        <tr>
            <th scope="col" wire:click.prevent="sortBy('id')" >
                # @include('components.sort-icon',['field'=>"id"])
            </th>
            <th scope="col" wire:click.prevent="sortBy('title')" >
                title @include('components.sort-icon',['field'=>"title"])
            </th>
            <th scope="col" wire:click.prevent="sortBy('order')" >
                order @include('components.sort-icon',['field'=>"order"])
            </th>
            <th>aksi</th>
        </tr>
    </x-slot>
    <x-slot name="body">
        @foreach ($rooms as $index=>$room)
            <tr x-data="window.__controller.dataTableController({{ $room->id }})">
                <td scope="row">{{ ($page-1)*$perPage+$index+1 }}</td>
                <td>{{ $room->title }}</td>
                <td>{{ $room->order }}</td>
                <td>
                    <a role="button" href="{{ route('admin.room-category.edit',$room->id) }}" style="margin-right:15px">
                        <i class="fa fa-16px fa-pen">Ubah</i></a>
                    <a role="button" href="{{ route('admin.room-category.show',$room->id) }}" style="margin-right:15px">
                        <i class="fa fa-16px fa-eye">Lihat</i></a>
                </td>
            </tr>
        @endforeach
    </x-slot>
</x-data-table>
