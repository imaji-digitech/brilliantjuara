<x-admin>
    <x-slot name="title">
        Pengumuman Umum
    </x-slot>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('admin.announcement.create') }}">Buat Pengumuman</a>
                            <livewire:table.main name="announcement" :model="$announcement"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
