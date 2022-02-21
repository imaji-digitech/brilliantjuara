<!-- Page Sidebar Start-->
<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper">
            <a href="#">
                <img class="img-fluid for-light" src="{{asset('assets/images/logo/logo.png')}}" alt="">
                <img class="img-fluid for-dark" src="{{asset('assets/images/logo/logo_dark.png')}}" alt="">
            </a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"></i></div>
        </div>
        <div class="logo-icon-wrapper">
            <a href="#">
                <img class="img-fluid" src="{{asset('assets/images/logo/logo-icon.png')}}" alt="">
            </a>
        </div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn">
                        <a href="#">
                            <img class="img-fluid" src="{{asset('assets/images/logo/logo-icon.png')}}" alt="">
                        </a>
                        <div class="mobile-back text-end"><span>Back</span>
                            <i class="fa fa-angle-right ps-2" aria-hidden="true"></i>
                        </div>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>General</h6>
                        </div>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-home"></i><span> Dashboard</span>
                        </a>
                    </li>
{{--                    <li class="sidebar-list">--}}
{{--                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.referral.me.use') }}">--}}
{{--                            <i class="fas fa-home"></i><span> Referralku</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Program</h6>
                        </div>
                    </li>
                    @foreach(\App\Models\RoomCategory::get() as $rooms)
                        @if($rooms->rooms->count()!=0)
                            <li class="sidebar-list">
                                {{--                            <label class="badge badge-light-primary">{{ $rooms->count() }}</label>--}}
                                <a class="sidebar-link sidebar-title active" href="#">
                                    <i class="fa fa-book"></i>
                                    <span>{{$rooms->title}}</span>
                                    <div class="according-menu"><i class="fa fa-angle-down"></i></div>
                                </a>
                                <ul class="sidebar-submenu" style="display: block;">
                                    @foreach($rooms->rooms as $room)
                                        <li><a class="active"
                                               href="{{ route('admin.program.index',$room->slug) }}">{{ $room->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                            @endforeach
                            <li class="sidebar-main-title">
                                <div>
                                    <h6>Riwayat Pembelian</h6>
                                </div>
                            </li>
                            <li class="sidebar-list">
                                <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.payment') }}">
                                    <i class="fas fa-home"></i><span> Riwayat</span>
                                </a>
                            </li>
                            <li class="sidebar-main-title">
                                <div>
                                    <h6>Refferal</h6>
                                </div>
                            </li>
                            <li class="sidebar-list">
                                <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.referral.me.use') }}">
                                    <i class="fas fa-home"></i><span> Referralku</span>
                                </a>
                            </li>

                            {{--                    @foreach(\App\Models\Room::get() as $room)--}}
                            {{--                        <li class="sidebar-list">--}}
                            {{--                            <a class="sidebar-link sidebar-title link-nav" href="">--}}
                            {{--                                <i class="fas fa-home"></i><span> {{ $room->title }}</span>--}}
                            {{--                            </a>--}}
                            {{--                        </li>--}}
                            {{--                    @endforeach--}}
                            @if(auth()->user()->role==1)
                                <li class="sidebar-main-title">
                                    <div>
                                        <h6>Admin Site</h6>
                                    </div>
                                </li>
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav"
                                       href="{{ route('admin.referral.index') }}">
                                        <i class="fas fa-home"></i><span> Referral Menu</span>
                                    </a>
                                </li>
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav"
                                       href="{{ route('admin.quest-report') }}">
                                        <i class="fas fa-home"></i><span> Soal Bermasalah</span>
                                    </a>
                                </li>
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav"
                                       href="{{ route('admin.exam.user.log') }}">
                                        <i class="fas fa-home"></i><span> Riwayat Ujian</span>
                                    </a>
                                </li>
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav"
                                       href="{{ route('admin.room.index') }}">
                                        <i class="fas fa-home"></i><span> Kelas</span>
                                    </a>
                                </li>
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav"
                                       href="{{ route('admin.announcement.index') }}">
                                        <i class="fas fa-home"></i><span> Pengumuman</span>
                                    </a>
                                </li>
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav"
                                       href="{{ route('admin.event.index') }}">
                                        <i class="fas fa-home"></i><span> Event</span>
                                    </a>
                                </li>
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav"
                                       href="{{ route('admin.banner.index') }}">
                                        <i class="fas fa-home"></i><span> Banner Dashboard</span>
                                    </a>
                                </li>
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav"
                                       href="{{ route('admin.frontpage-banner.index') }}">
                                        <i class="fas fa-home"></i><span> Banner Depan</span>
                                    </a>
                                </li>
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav"
                                       href="{{ route('admin.access.exam') }}">
                                        <i class="fas fa-home"></i><span> Akses TO</span>
                                    </a>
                                </li>

                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav"
                                       href="{{ route('admin.access.course') }}">
                                        <i class="fas fa-home"></i><span> Akses Bimbel</span>
                                    </a>
                                </li>
                            @endif

                            {{--                    @php--}}
                            {{--                        $ownExam = auth()->user()->userOwnExams;--}}
                            {{--                        $ownCourse = auth()->user()->userOwnCourses;--}}
                            {{--                        $myClass = [];--}}
                            {{--                        foreach ($ownExam as $oe) {--}}
                            {{--                            $myClass[$oe->exam->room->title]['exam'][$oe->exam_id]=$oe;--}}
                            {{--                        }--}}
                            {{--                        foreach ($ownCourse as $oe){--}}
                            {{--                            $myClass[$oe->course->room->title]['course'][$oe->exam_id]=$oe;--}}
                            {{--                        }--}}
                            {{--                    @endphp--}}
                            {{--                    @foreach($myClass as $key=>$mc)--}}
                            {{--                        <li class="sidebar-list">--}}
                            {{--                            <a class="sidebar-link sidebar-title" href="#">--}}
                            {{--                                <i class="fas fa-home"></i> <span>{{$key}}</span>--}}
                            {{--                            </a>--}}
                            {{--                            <ul class="sidebar-submenu">--}}
                            {{--                                @isset($mc['exam'])--}}
                            {{--                                    @foreach($mc['exam'] as $exam)--}}
                            {{--                                        <li><a href="{{ route('admin.user.exam',$exam->exam->slug) }}">{{ $exam->exam->title }}</a></li>--}}
                            {{--                                    @endforeach--}}
                            {{--                                @endisset--}}
                            {{--                                @isset($mc['course'])--}}
                            {{--                                    @foreach($mc['course'] as $course)--}}
                            {{--                                        <li><a href="{{ route('admin.user.course',$course->course->slug) }}">{{ $course->course->title }}</a></li>--}}
                            {{--                                    @endforeach--}}
                            {{--                                @endisset--}}
                            {{--                            </ul>--}}
                            {{--                        </li>--}}
                            {{--                    @endforeach--}}
                            {{--                    @foreach( auth()->user()->userOwnExams as $own )--}}
                            {{--                        <li class="sidebar-list">--}}
                            {{--                            <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.room.index') }}">--}}
                            {{--                                <i class="fas fa-home"></i><span> {{ $own->exam->title }}</span>--}}
                            {{--                            </a>--}}
                            {{--                        </li>--}}
                            {{--                    @endforeach--}}

                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
