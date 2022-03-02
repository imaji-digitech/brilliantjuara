<x-admin>
    <x-slot name="title">
        {{$id->title}}
    </x-slot>
    <x-slot name="breadcumb">
        @if(auth()->user()->role==1)
        <li class="breadcrumb-item">
            <a href="{{ route('admin.room.index') }}">{{ $room->title }}</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('admin.course.index',$room->slug) }}">Bimbel {{ $room->title }}</a>
        </li>
        @endif
        <li class="breadcrumb-item">
            <a href="{{ route('admin.user.course',[$course->slug]) }}">{{ $course->title }}</a>
        </li>
    </x-slot>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            {!! $id->content !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
