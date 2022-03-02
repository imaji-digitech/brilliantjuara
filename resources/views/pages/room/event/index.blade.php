<x-admin>
    <x-slot name="title">
        Event {{ $room->title }}
    </x-slot>
    <x-slot name="breadcumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.room.index') }}">{{ $room->title }}</a>
        </li>
    </x-slot>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('admin.room.event.create',$room->slug) }}">Buat Event</a>
                            <livewire:table.main name="event" :model="$event" :dataId="$room->id"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
