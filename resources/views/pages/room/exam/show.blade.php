<x-admin>
    <x-slot name="title">
        {{$exam->title}}
    </x-slot>
    <x-slot name="breadcumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.room.index') }}">{{ $room->title }}</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('admin.exam.index',$room->slug) }}">Try Out {{ $room->title }}</a>
        </li>
    </x-slot>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('admin.exam.step.create',[$room->slug,$exam->slug]) }}" class="btn btn-primary">
                                Tambah
                            </a>
                            <a href="{{ route('admin.exam.exam-edit',[$room->slug,$exam->slug,0]) }}" class="btn btn-primary">
                                Tampilkan seluruh soal
                            </a>
                            <livewire:table.main name="exam-step" :model="$step" :dataId="$exam->id"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
