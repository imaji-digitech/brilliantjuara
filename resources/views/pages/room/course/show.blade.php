<x-admin>
    <x-slot name="title">
        {{$course->title}}
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
                    <a href="{{ route('admin.course.highlight.create',[$room->slug,$course->slug]) }}"
                       class="btn btn-primary">
                        Tambah Highlight
                    </a>
                    <br>
                    <br>
                    @if(!empty($course->courseHighlights))
                        <a href="{{ route('admin.course.detail.create',[$room->slug,$course->slug,1]) }}"
                           class="btn btn-primary">
                            Tambah Materi
                        </a>
                        <a href="{{ route('admin.course.detail.create',[$room->slug,$course->slug,2]) }}"
                           class="btn btn-primary">
                            Tambah Link
                        </a>
                        <a href="{{ route('admin.course.detail.create',[$room->slug,$course->slug,3]) }}"
                           class="btn btn-primary">
                            Tambah File
                        </a>
                    @endif
                    <br>
                    <br>
                    @foreach($course->courseHighlights as $ch)
                        <div class="card">
                            <div class="card-body">
                                <h2>
                                    {{ $ch->title }}
                                </h2>
                                <a href="{{ route('admin.course.highlight.edit',[$room->slug,$course->slug,$ch->id]) }}"> <i class="fa fa-edit">Edit</i></a>
                                <ul class="crm-activity">
                                @foreach($ch->courseDetails as $cd)
                                        <li class="media">
                                            <div>

                                                <a href="@if($cd->course_type_id==1){{ route('admin.course.detail',[$room->slug,$course->slug,$cd->id]) }}@elseif($cd->course_type_id==2){{$cd->content}}@else{{ route('admin.download.course',[$cd->id]) }}@endif"
                                                   @if($cd->course_type_id==2) target="_blank" @endif
                                                   class="me-3 font-primary">

                                                </a>
                                                <a href="@if($cd->course_type_id==1){{ route('admin.course.detail',[$room->slug,$course->slug,$cd->id]) }}@elseif($cd->course_type_id==2){{$cd->content}}@else{{ route('admin.download.course',[$cd->id]) }}@endif"
                                                   @if($cd->course_type_id==2) target="_blank" @endif
                                                   class="">
                                                    <h6 class="mt-0">
                                                        @if($cd->course_type_id==1)
                                                            <i class="fa fa-book"></i>
                                                        @elseif($cd->course_type_id==2)
                                                            <i class="fa fa-link"></i>
                                                        @else
                                                            <i class="fa fa-file"></i>
                                                        @endif
                                                        {{ $cd->title }} <a href="{{ route('admin.course.detail.edit',[$room->slug,$course->slug,$cd->course_type_id,$cd->id]) }}"> <i class="fa fa-edit">Edit</i></a>
                                                    </h6>
                                                    <ul class="dates">
                                                        <li>{{ $cd->created_at->format('d F Y') }}</li>
                                                        <li>{{ $cd->created_at->diffForHumans() }}</li>
                                                    </ul>
                                                </a>
                                            </div>
                                        </li>
                                @endforeach
                                </ul>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</x-admin>
