<x-data-table :model="$tokens">
    <x-slot name="head">
        <tr>
            <th scope="col" wire:click.prevent="sortBy('id')">
                # @include('components.sort-icon',['field'=>"id"])
            </th>
            <th scope="col" wire:click.prevent="sortBy('token')">
                Token @include('components.sort-icon',['field'=>"token"])
            </th>
            <th scope="col" wire:click.prevent="sortBy('user_id')">
                User claim @include('components.sort-icon',['field'=>"user_id"])
            </th>
            <th scope="col" wire:click.prevent="sortBy('created_at')">
                Tanggal di buat @include('components.sort-icon',['field'=>"created_at"])
            </th>
            <th scope="col" wire:click.prevent="sortBy('updated_at')">
                Tanggal di claim @include('components.sort-icon',['field'=>"updated_at"])
            </th>
            <th>aksi</th>
        </tr>
    </x-slot>
    <x-slot name="body">
        @foreach ($tokens as $index=>$token)
            <tr>
                <td scope="row">{{ ($page-1)*$perPage+$index+1 }}</td>
                <td>{{ $token->token }}</td>
                <td>
                    @if($token->user_id!=null)
                        {{ $token->user->name }}
                    @endif
                </td>
                <td>
                    {{ $token->created_at }}
                </td>
                <td>
                    @if($token->user_id!=null)
                        {{ $token->updated_at }}
                    @endif
                </td>
                <td>
                    <a role="button" wire:click="deleteItem({{$token->id}})" class="mr-3">
                        <i class="fa fa-16px fa-trash text-danger"></i></a>
                </td>
            </tr>
        @endforeach
    </x-slot>
</x-data-table>
