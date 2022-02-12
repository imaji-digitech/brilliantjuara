<x-admin>
    <x-slot name="title">
        Buat Bundle Umum
    </x-slot>
    <x-slot name="breadcumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.bundle.index',$room->slug) }}">Bundle Umum</a>
        </li>
    </x-slot>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <livewire:form.bundle action="create" :room="$room->slug"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
