<x-admin>
    <x-slot name="title">
        Referral Umum
    </x-slot>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <livewire:form.referral-can-use :dataId="$id" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
