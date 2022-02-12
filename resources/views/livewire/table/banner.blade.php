<x-data-table :model="$banners">
    <x-slot name="head">
        <tr>
            <th scope="col" wire:click.prevent="sortBy('id')">
                # @include('components.sort-icon',['field'=>"id"])
            </th>
            <th scope="col" wire:click.prevent="sortBy('title')">
                Judul banner @include('components.sort-icon',['field'=>"title"])
            </th>
            <th>Thumbnail</th>
            <th>aksi</th>
        </tr>
    </x-slot>
    <x-slot name="body">
        @foreach ($banners as $index=>$banner)
            <tr>
                <td scope="row">{{ ($page-1)*$perPage+$index+1 }}</td>
                <td>{{ $banner->title }}</td>
                <td><img src="{{ asset('storage/'.$banner->thumbnail) }}" style="height: 100px" alt=""></td>
                <td>
                    <a role="button" href="{{ route('admin.announcement.edit',[$banner->id]) }}" class="mr-3">
                        <i class="fa fa-16px fa-pen">Ubah</i></a>
                    <a role="button" wire:click="deleteItem({{$banner->id}})" class="mr-3">
                        <i class="fa fa-16px fa-trash text-danger"></i></a>
                </td>
            </tr>
        @endforeach
    </x-slot>
</x-data-table>
