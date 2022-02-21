<x-admin>
    <x-slot name="title">
        Buat Data Materi {{$course->title}}
    </x-slot>
    <x-slot name="breadcumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.room.index') }}">Data kelas</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('admin.course.index',$room->slug) }}">Bimbel</a>
        </li>
    </x-slot>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <livewire:form.course-detail action="update" :courseId="$course->slug" :type="$id" :dataId="$dataId"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
