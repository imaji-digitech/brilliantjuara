<x-data-table :model="$referrals">
    <x-slot name="head">
        <tr>
            <th scope="col" wire:click.prevent="sortBy('id')" >
                # @include('components.sort-icon',['field'=>"id"])
            </th>
            <th scope="col" wire:click.prevent="sortBy('user_id')" >
                Nama orang @include('components.sort-icon',['field'=>"user_id"])
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
                <td>{{ $referral->user->name }}</td>
                <td>{{ $referral->code }}</td>
                <td>{{ $referral->referralCodeUses->count() }}</td>
                <td>
                    <a role="button" wire:click="deleteItem({{$referral->id}})" class="mr-3">
                        <i class="fa fa-16px fa-trash text-danger"></i></a>
                </td>
            </tr>
        @endforeach
    </x-slot>
</x-data-table>
