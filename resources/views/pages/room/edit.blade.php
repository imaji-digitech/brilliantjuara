<x-admin>
    <x-slot name="title">
        Ubah Data Kelas
    </x-slot>
    <x-slot name="breadcumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.room.index') }}">Room</a>
        </li>
    </x-slot>
    <div>
        <div class="container-fluid">
            <div class="row">
                <livewire:form.room action="update" :dataId="$id"/>
            </div>
        </div>
    </div>
</x-admin>
