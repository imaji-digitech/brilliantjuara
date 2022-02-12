<x-admin>
    <x-slot name="title">
        Event Umum
    </x-slot>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('admin.event.create') }}">Buat Event</a>
                            <livewire:table.main name="event" :model="$event"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
