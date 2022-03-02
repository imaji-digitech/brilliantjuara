<x-admin>
    <x-slot name="title">
        Ubah Data Kelas
    </x-slot>
    <x-slot name="breadcumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.room.index') }}">{{ $room->title }}</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('admin.course.index',$room->slug) }}">Bimbel {{ $room->title }}</a>
        </li>
    </x-slot>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <livewire:form.course action="update" :roomId="$room->slug" :dataId="$id"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
