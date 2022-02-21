<x-admin>
    <x-slot name="title">
        Program {{$room->title}}
    </x-slot>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="col-sm-12 row">
                        <div class="card-body" style="padding: 10px">
{{--                            <livewire:program-banner :Pbanners="$banners"/>--}}
                        </div>
                    </div>
                </div>
                <livewire:program :room="$room->slug"/>
            </div>
        </div>
    </div>
</x-admin>
