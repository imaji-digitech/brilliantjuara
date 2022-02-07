<x-admin>
    <x-slot name="title">
        {{$exam->title}}
    </x-slot>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('admin.user.exam.start',$exam->slug) }}" class="btn btn-primary">
                                Mulai TO
                            </a>
                            <livewire:table.main name="user-exam" :model="$examUser" :dataId="$exam->id"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
