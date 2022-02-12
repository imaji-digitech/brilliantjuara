<x-admin>
    <x-slot name="title">
        Token
    </x-slot>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
{{--                            <a href="{{ route('admin.bundle.price.create',[$room->slug,$id]) }}">Buat Harga Bundle</a>--}}
                            <livewire:token-generate :room="$room->slug" :dataId="$id"/>
                            <livewire:table.main name="token" :model="$token" :dataId="$id"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
