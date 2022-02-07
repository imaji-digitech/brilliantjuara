<x-admin>
    <x-slot name="title">
        Data kelas
    </x-slot>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('admin.room.create') }}" class="btn btn-primary">
                                Tambah
                            </a>
                            <livewire:table.main name="room" :model="$room"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
