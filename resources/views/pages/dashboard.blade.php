<x-admin>
    <x-slot name="title">
        Dashboard
    </x-slot>
    <div>
        <div class="container-fluid">
            @if(auth()->user()->role==1)
                <livewire:admin-dashboard/>
            @endif
                <livewire:dashboard/>
        </div>
    </div>
</x-admin>
