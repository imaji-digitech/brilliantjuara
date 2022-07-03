<x-data-table :model="$withdraws">
    <x-slot name="head">
        <tr>
            <th scope="col" wire:click.prevent="sortBy('id')">
                # @include('components.sort-icon',['field'=>"id"])
            </th>
            <th scope="col" wire:click.prevent="sortBy('created_at')">
                Ditarik pada @include('components.sort-icon',['field'=>"created_at"])
            </th>
            <th scope="col" wire:click.prevent="sortBy('money')">
                Jumlah uang @include('components.sort-icon',['field'=>"money"])
            </th>
            <th>
                No rekening
            </th>
            <th>
                Nama bank
            </th>
            <th>
                Status penarikan
            </th>
            @if(auth()->user()->role==1)
                @if($withdraw->status==1)
                    Aksi
                @endif
            @endif
        </tr>
    </x-slot>
    <x-slot name="body">
        @foreach ($withdraws as $index=>$withdraw)
            <tr>
                <td scope="row">{{ ($page-1)*$perPage+$index+1 }}</td>
                <td>{{ $withdraw->created_at }}</td>
                <td>{{ $withdraw->money }}</td>
                <td>{{ $withdraw->no_rek }}</td>
                <td>{{ $withdraw->bank_name }}</td>
                <td>{{ $withdraw->status==1?'Dalam proses admin':'Selesai' }}</td>
                @if(auth()->user()->role==1)
                    @if($withdraw->status==1)
                        <td>
                            <a href="{{ route('admin.withdraw.edit',$withdraw->id) }}">
                                <i class="fa fa-check">Selesai</i>
                            </a>
                        </td>
                    @endif
                @endif
            </tr>
        @endforeach
    </x-slot>
</x-data-table>
