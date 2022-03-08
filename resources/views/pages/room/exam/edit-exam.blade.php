<x-admin>
    <x-slot name="title">
        Soal {{$exam->title}}
    </x-slot>
    <x-slot name="breadcumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.room.index') }}">{{ $room->title }}</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('admin.exam.index',$room->slug) }}">Try Out {{ $room->title }}</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('admin.exam.show',[$room->slug,$exam->slug]) }}">{{ $exam->title }}</a>
        </li>
    </x-slot>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
{{--                    <div class="card">--}}
{{--                        <div class="card-body">--}}
{{--                            <livewire:form.exam action="create" :roomId="$room->slug"/>--}}
{{--                            <livewire:form.exam action="update" :roomId="$room->slug" :dataId="$id"/>--}}
                            <livewire:edit-exam :exam="$exam" :start="$id"/>
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
</x-admin>
