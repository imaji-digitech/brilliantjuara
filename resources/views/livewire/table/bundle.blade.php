<x-data-table :model="$bundles">
    {{--    ['room_id', 'bundle_status_id', 'title', 'content', 'thumbnail', 'created_at', 'updated_at'];--}}
    <x-slot name="head">
        <tr>
            <th scope="col" wire:click.prevent="sortBy('id')">
                # @include('components.sort-icon',['field'=>"id"])
            </th>
            <th scope="col" wire:click.prevent="sortBy('title')">
                judul @include('components.sort-icon',['field'=>"title"])
            </th>
            <th>
                Harga paket
            </th>
            <th>
                Isi paket
            </th>
            <th>
                Status paket
            </th>
            <th>
                thumbnail
            </th>
            <th>aksi</th>
        </tr>
    </x-slot>
    <x-slot name="body">
        @foreach ($bundles as $index=>$bundle)
            <tr>
                <td scope="row">{{ ($page-1)*$perPage+$index+1 }}</td>
                <td>{{ $bundle->title }}</td>
                <td>
                    @foreach($bundle->bundlePrices as $bp)
                        {{ $bp->price }} dengan minimal {{ $bp->min }}
                    @endforeach
                </td>
                <td>
                    @foreach($bundle->bundleDetails as $bd)
                        @isset($bd->exam->title)
                            {{$bd->exam->title}}
                        @else
                            {{$bd->course->title}}
                        @endisset
                    @endforeach
                </td>
                <td>{{ $bundle->bundleStatus->title }}</td>
                <td>
                    <img src="{{ asset('storage/'.$bundle->thumbnail) }}" alt="" style="height: 200px">
                </td>
                <td>
                    <a role="button" href="{{ route('admin.bundle.price.index',[$bundle->room->slug,$bundle->id]) }}" class="mr-3">
                        <i class="fa fa-16px fa-money">Harga</i></a>
                    <a role="button" href="{{ route('admin.bundle.detail.index',[$bundle->room->slug,$bundle->id]) }}" class="mr-3">
                        <i class="fa fa-16px fa-money">Detail</i></a>
                    <a role="button" href="{{ route('admin.bundle.token.index',[$bundle->room->slug,$bundle->id]) }}" class="mr-3">
                        <i class="fa fa-16px fa-code">token</i></a>
                    <a role="button" href="{{ route('admin.bundle.edit',[$bundle->room->slug,$bundle->id]) }}" class="mr-3">
                        <i class="fa fa-16px fa-pen">Ubah</i></a>
                    <a role="button" wire:click="deleteItem({{$bundle->id}})" class="mr-3">
                        <i class="fa fa-16px fa-trash text-danger"></i></a>
                </td>
            </tr>
        @endforeach
    </x-slot>
</x-data-table>
