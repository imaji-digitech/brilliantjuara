<x-admin>
    <x-slot name="title">
        Data bimbel {{$room->title}}
    </x-slot>
    <x-slot name="breadcumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.room.index') }}">Data kelas</a>
        </li>
    </x-slot>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('admin.course.create',$room->slug) }}" class="btn btn-primary">
                                Tambah
                            </a>
                            <livewire:table.main name="course" :model="$course" :dataId="$room->id"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
