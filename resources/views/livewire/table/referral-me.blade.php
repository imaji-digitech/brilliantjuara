<x-data-table :model="$referrals">
    <x-slot name="head">
        <tr>
            <th scope="col" wire:click.prevent="sortBy('id')" >
                # @include('components.sort-icon',['field'=>"id"])
            </th>
            <th>
                Judul promo
            </th>
            <th scope="col" wire:click.prevent="sortBy('code')" >
                code @include('components.sort-icon',['field'=>"code"])
            </th>
            <th>
                Jumlah digunakan
            </th>
            <th>aksi</th>
        </tr>
    </x-slot>
    <x-slot name="body">
        @foreach ($referrals as $index=>$referral)
            <tr>
                <td scope="row">{{ ($page-1)*$perPage+$index+1 }}</td>
                <td>{{ ($referral->baseReferral->title) }}</td>
                <td>{{ ($referral->code)?$referral->code:'Belum digunakan' }}</td>
                @php
                $c=0;
                    foreach ($referral->payments as $p){
                    if ($p->status==2){
                        $c++;
                    }
                }
                @endphp
                <td>{{ $c }}</td>
                <td>
                    <a role="button" href="{{ route('admin.referral.me.edit',[$referral->id]) }}" class="mr-3">
                        <i class="fa fa-16px fa-pen">Ubah</i></a>
                    <a role="button" wire:click="deleteItem({{$referral->id}})" class="mr-3">
                        <i class="fa fa-16px fa-trash text-danger"></i></a>
                </td>
            </tr>
        @endforeach
    </x-slot>
</x-data-table>
