<x-admin>
    <x-slot name="title">
        {{$id->title}}
    </x-slot>
    <x-slot name="breadcumb">
        <li class="breadcrumb-item">
{{--            <a href="{{ route('admin.room.index') }}">Data kelas</a>--}}
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
