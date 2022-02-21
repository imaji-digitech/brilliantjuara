<x-admin>
    <x-slot name="title">
        Token
    </x-slot>
    <div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('admin.bundle.export',[$room->slug,$id]) }}" class="btn btn-primary">Export</a>
                            <br>
                            <br>
                            <livewire:token-generate :room="$room->slug" :dataId="$id"/>
                            <livewire:table.main name="token" :model="$token" :dataId="$id"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
