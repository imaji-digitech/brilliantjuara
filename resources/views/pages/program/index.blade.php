<x-admin>
    <x-slot name="title">
        Program {{$room->title}}
    </x-slot>
    <div>
        <div class="container-fluid">
            <div class="row">
                <livewire:program :room="$room->slug"/>
            </div>
        </div>
    </div>
</x-admin>
