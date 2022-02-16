<x-admin>
    <x-slot name="title">
        Buat Referral Umum
    </x-slot>
    <x-slot name="breadcumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.referral.index') }}">Referral Umum</a>
        </li>
    </x-slot>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <livewire:form.referral action="create"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
