<x-admin>
    <x-slot name="title">
        {{$exam->title}}
    </x-slot>
    <x-slot name="breadcumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.room.index') }}">Data kelas</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('admin.course.index',$room->id) }}">{{ $room->title }}</a>
        </li>
    </x-slot>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
{{--                            <a href="{{ route('admin.exam.question.create',[$room->slug,$exam->slug,$step->slug]) }}" class="btn btn-primary">--}}
{{--                                Tambah--}}
{{--                            </a>--}}
                            <livewire:form.quest action="create" :examStepId="$step->id"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
