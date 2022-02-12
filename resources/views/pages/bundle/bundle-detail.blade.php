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
                            <a href="{{ route('admin.bundle.detail.create',[$room->slug,$id]) }}">Tambah isi bundle</a>
                            <livewire:table.main name="bundle-detail" :model="$bundleDetail" :dataId="$id"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
