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
                            <a href="{{ route('admin.referral.can.use.add',$id) }}">Tambah orang yang dapat memakai referral ini</a>
                            <livewire:table.main name="referralCanUse" :model="$referral" :dataId="$id"/>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
