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
                            <a href="{{ route('admin.referral.create') }}">Buat Referral</a>
                            <livewire:table.main name="referral" :model="$referral"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
