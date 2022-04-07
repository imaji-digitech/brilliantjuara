<x-data-table :model="$payments">
    <x-slot name="head">
        <tr>
{{--            <th scope="col" wire:click.prevent="sortBy('payment_id')">--}}
{{--                # @include('components.sort-icon',['field'=>"payment_id"])--}}
{{--            </th>--}}
            @if(auth()->user()->role==1)
                <th>Nama</th>
                <th>
                    Dibeli pada
                </th>
            @endif
            <th scope="col" wire:click.prevent="sortBy('bundle_id')">
                Nama bundle @include('components.sort-icon',['field'=>"bundle_id"])
            </th>
            <th scope="col" wire:click.prevent="sortBy('referral_code_id')">
                Kode @include('components.sort-icon',['field'=>"referral_code_id"])
            </th>
            <th scope="col" wire:click.prevent="sortBy('status')">
                Status @include('components.sort-icon',['field'=>"status"])
            </th>
        </tr>
    </x-slot>
    <x-slot name="body">
        @foreach ($payments as $index=>$payment)
            <tr>
{{--                <td scope="row">{{ $payment->payment_id }}</td>--}}
                @if(auth()->user()->role==1)
                    <td>{{ $payment->user->name }}</td>
                    <td>{{ $payment->user->email }}</td>
                    <td> @if($payment->status==2) {{ $payment->updated_at }} @endif</td>
                @endif
                <td>{{ $payment->bundle->title }}</td>
                <td>{{ isset($payment->referralCode)?$payment->referralCode->code:'' }}</td>
                <td>
                    @if($payment->status==1)
                        Menunggu
                    @else
                        Berhasil
                    @endif
                </td>
            </tr>
        @endforeach
    </x-slot>
</x-data-table>
