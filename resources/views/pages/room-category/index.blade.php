<x-admin>
    <x-slot name="title">
        Data Kategori Kelas
    </x-slot>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('admin.room-category.create') }}" class="btn btn-primary">
                                Tambah
                            </a>
                            <livewire:table.main name="room-category" :model="$room"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
