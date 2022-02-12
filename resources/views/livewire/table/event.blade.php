<x-data-table :model="$events">
    <x-slot name="head">
        <tr>
            <th scope="col" wire:click.prevent="sortBy('id')" >
                # @include('components.sort-icon',['field'=>"id"])
            </th>
            <th scope="col" wire:click.prevent="sortBy('title')" >
                Judul pengumuman @include('components.sort-icon',['field'=>"title"])
            </th>
            <th>aksi</th>
        </tr>
    </x-slot>
    <x-slot name="body">
        @foreach ($events as $index=>$event)
            <tr>
                <td scope="row">{{ ($page-1)*$perPage+$index+1 }}</td>
                <td>{{ $event->title }}</td>
                <td>
                    <a role="button" href="{{ route('admin.event.edit',[$event->id]) }}" class="mr-3">
                        <i class="fa fa-16px fa-pen">Ubah</i></a>
                    <a role="button" wire:click="deleteItem({{$event->id}})" class="mr-3">
                        <i class="fa fa-16px fa-trash text-danger"></i></a>
                </td>
            </tr>
        @endforeach
    </x-slot>
</x-data-table>
