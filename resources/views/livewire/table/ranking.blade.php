<x-data-table :model="$rangkings">
    <x-slot name="head">
        <tr>
            <th>
                #
            </th>
            <th>
                Nama
            </th>
            <th>
                Nilai
            </th>
            <th>
                Waktu mengerjakan
            </th>
            <th>Lulus</th>
        </tr>
    </x-slot>
    <x-slot name="body">
        @foreach ($rangkings as $index=>$rangking)
            <tr>
                <td scope="row">{{ ($page-1)*$perPage+$index+1 }}</td>
                <td>{{ $rangking->title }}</td>
                <td>
                    <a role="button" href="{{ route('admin.rangking.edit',[$rangking->id]) }}" class="mr-3">
                        <i class="fa fa-16px fa-pen">Ubah</i></a>
                    <a role="button" wire:click="deleteItem({{$rangking->id}})" class="mr-3">
                        <i class="fa fa-16px fa-trash text-danger"></i></a>
                </td>
            </tr>
        @endforeach
    </x-slot>
</x-data-table>
