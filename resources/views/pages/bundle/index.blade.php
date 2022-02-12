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
                            <a href="{{ route('admin.bundle.create',$room->slug) }}">Buat Bundle</a>
                            <livewire:table.main name="bundle" :model="$bundle" :dataId="$room->id"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
