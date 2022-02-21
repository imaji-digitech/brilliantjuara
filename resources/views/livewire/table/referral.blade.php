<x-data-table :model="$referrals">
    <x-slot name="head">
        <tr>
            <th scope="col" wire:click.prevent="sortBy('id')" >
                # @include('components.sort-icon',['field'=>"id"])
            </th>
            <th scope="col" wire:click.prevent="sortBy('title')" >
                Judul referral @include('components.sort-icon',['field'=>"title"])
            </th>
            <th>
                Dapat digunakan
            </th>
            <th>
                Telah digunakan
            </th>
            <th>aksi</th>
        </tr>
    </x-slot>
    <x-slot name="body">
        @foreach ($referrals as $index=>$referral)
            <tr>
                <td scope="row">{{ ($page-1)*$perPage+$index+1 }}</td>
                <td>{{ $referral->title }}</td>
                <td>{{ $referral->referralCanUses->count() }}</td>
                <td>{{ $referral->referralCodes->count() }}</td>
                <td>
                    <a role="button" href="{{ route('admin.referral.edit',[$referral->id]) }}" class="mr-3">
                        <i class="fa fa-16px fa-pen">Ubah</i></a>
                    <a role="button" href="{{ route('admin.referral.can.use',[$referral->id]) }}" class="mr-3">
                        <i class="fa fa-16px fa-eye">Lihat</i></a>
                    <a role="button" wire:click="deleteItem({{$referral->id}})" class="mr-3">
                        <i class="fa fa-16px fa-trash text-danger"></i></a>
                </td>
            </tr>
        @endforeach
    </x-slot>
</x-data-table>
