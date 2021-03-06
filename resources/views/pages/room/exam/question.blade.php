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
        <li class="breadcrumb-item">
            <a href="{{ route('admin.exam.show',[$room->slug,$exam->slug]) }}">Try Out {{ $exam->title }}</a>
        </li>
    </x-slot>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('admin.exam.question.create',[$room->slug,$exam->slug,$step->id]) }}"
                               class="btn btn-primary col-2" style="margin-bottom: 10px">
                                Tambah
                            </a>
                            @php($type_exam=($step->type_exam==1?'admin.upload-static':'admin.upload-dynamic'))
                            <form action="{{ route($type_exam,[$step->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    @if($errors->any())
                                        <h4>{{$errors->first()}}</h4>
                                    @endif
                                    <div class="col-7">
                                        <input type="file" name="uploaded_file" class="form-control"
                                               accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                                               required/>
                                    </div>
                                    <input type="submit" value="upload excel" class="btn btn-primary col-2 mr-3"
                                           style="margin-right: 10px">
                                </div>
                            </form>
                            <livewire:table.main name="quest" :model="$quest" :dataId="$step->id"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
