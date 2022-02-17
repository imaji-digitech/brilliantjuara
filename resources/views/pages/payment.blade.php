<x-admin>
    <x-slot name="title">
        Riwayat Pembayaran
    </x-slot>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <livewire:table.main name="payment" :model="$payments"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
