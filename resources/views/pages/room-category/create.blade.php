<x-admin>
    <x-slot name="title">
        Buat Data Kategori Kelas
    </x-slot>
    <x-slot name="breadcumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.room-category.index') }}">Kategori Kelas</a>
        </li>
    </x-slot>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <livewire:form.room-category action="create"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
