<x-admin>
    <x-slot name="title">
        Banner Umum
    </x-slot>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('admin.banner.create') }}">Buat Banner</a>
                            <livewire:table.main name="banner" :model="$banner"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
