<x-admin>
    <x-slot name="title">
        Buat Event Umum
    </x-slot>
    <x-slot name="breadcumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.event.index') }}">Event Umum</a>
        </li>
    </x-slot>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <livewire:form.event  action="create"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
