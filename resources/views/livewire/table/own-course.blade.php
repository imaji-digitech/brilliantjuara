<x-data-table :model="$owns">
    <x-slot name="head">
        <tr>
            <th scope="col" wire:click.prevent="sortBy('id')" >
                # @include('components.sort-icon',['field'=>"id"])
            </th>
            <th scope="col" wire:click.prevent="sortBy('user_id')" >
                user @include('components.sort-icon',['field'=>"user_id"])
            </th>
            <th scope="col" wire:click.prevent="sortBy('own_id')" >
                Bimbel @include('components.sort-icon',['field'=>"own_id"])
            </th>
            <th scope="col" wire:click.prevent="sortBy('created_at')" >
                Tanggal Aktifasi @include('components.sort-icon',['field'=>"created_at"])
            </th>
{{--            <th>aksi</th>--}}
        </tr>
    </x-slot>
    <x-slot name="body">
        @foreach ($owns as $index=>$own)
            <tr x-data="window.__controller.dataTableController({{ $own->id }})">
                <td scope="row">{{ ($page-1)*$perPage+$index+1 }}</td>
                <td>{{ $own->user->name }}</td>
                <td>{{ $own->course->title }}</td>
                <td>{{ $own->created_at }}</td>
            </tr>
        @endforeach
    </x-slot>
</x-data-table>
