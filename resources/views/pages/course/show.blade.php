<x-admin>
    <x-slot name="title">
        {{$course->title}}
    </x-slot>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    @foreach($course->courseHighlights as $ch)
                        <div class="card">
                            <div class="card-body">
                                <h2>
                                    {{ $ch->title }}
                                </h2>
                                <ul class="crm-activity">
                                    @foreach($ch->courseDetails as $cd)
                                        <li class="media">
                                            <a href="@if($cd->course_type_id==1){{ route('admin.course.detail',[$room->slug,$course->slug,$cd->id]) }}@elseif($cd->course_type_id==2){{$cd->content}}@else{{ route('admin.download.course',[$cd->id]) }}@endif"
                                               @if($cd->course_type_id==2) target="_blank" @endif
                                               class="me-3 font-primary">
                                                @if($cd->course_type_id==1)
                                                    <i class="fa fa-book"></i>
                                                @elseif($cd->course_type_id==2)
                                                    <i class="fa fa-link"></i>
                                                @elseif($cd->course_type_id==3)
                                                    <i class="fa fa-file"></i>
                                                @else
                                                    <i class="fa fa-link"></i>
                                                @endif
                                            </a>

                                            <a href="@if($cd->course_type_id==1){{ route('admin.course.detail',[$room->slug,$course->slug,$cd->id]) }}@elseif($cd->course_type_id==2){{$cd->content}}@elseif($cd->course_type_id==3){{ route('admin.download.course',[$cd->id]) }}@elseif($cd->course_type_id==4){{ route('admin.user.exam',$cd->content) }}@endif"
                                               @if($cd->course_type_id==2)target="_blank" @endif
                                               class="align-self-center media-body">
                                                <h6 class="mt-0">
                                                    {{ $cd->title }}
                                                </h6>
                                                <ul class="dates">
                                                    <li>{{ $cd->created_at->format('d F Y') }}</li>
                                                    <li>{{ $cd->created_at->diffForHumans() }}</li>
                                                </ul>
                                            </a>
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
