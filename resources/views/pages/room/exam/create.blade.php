<x-admin>
    <x-slot name="title">
        Buat Data TO {{$room->title}}
    </x-slot>
    <x-slot name="breadcumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.room.index') }}">Data kelas</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('admin.exam.index',$room->slug) }}">TO</a>
        </li>
    </x-slot>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <livewire:form.exam action="create" :roomId="$room->slug"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
