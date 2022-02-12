<x-data-table :model="$bundles">
    <x-slot name="head">
        <tr>
            <th scope="col" wire:click.prevent="sortBy('id')" >
                # @include('components.sort-icon',['field'=>"id"])
            </th>
            <th scope="col" wire:click.prevent="sortBy('min')" >
                minimal @include('components.sort-icon',['field'=>"min"])
            </th>
            <th scope="col" wire:click.prevent="sortBy('price')" >
                harga @include('components.sort-icon',['field'=>"price"])
            </th>
            <th>aksi</th>
        </tr>
    </x-slot>
    <x-slot name="body">
        @foreach ($bundles as $index=>$bundle)
            <tr>
                <td scope="row">{{ ($page-1)*$perPage+$index+1 }}</td>
                <td>{{ $bundle->min }}</td>
                <td>{{ $bundle->price }}</td>
                <td>
                    <a role="button" wire:click="deleteItem({{$bundle->id}})" class="mr-3">
                        <i class="fa fa-16px fa-trash text-danger"></i></a>
                </td>
            </tr>
        @endforeach
    </x-slot>
</x-data-table>
