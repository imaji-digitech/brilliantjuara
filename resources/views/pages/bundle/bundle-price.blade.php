<x-admin>
    <x-slot name="title">
        Bundle Umum
    </x-slot>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('admin.bundle.price.create',[$room->slug,$id]) }}">Buat Harga Bundle</a>
                            <livewire:table.main name="bundle-price" :model="$bundlePrice" :dataId="$id"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
