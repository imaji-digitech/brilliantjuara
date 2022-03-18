<x-admin>
    <x-slot name="title">
        Hasil & Pembahasan
    </x-slot>
    <div>
        <div class="container-fluid">
            <div class="row">
                <livewire:livescore :exam="$exam"/>
            </div>
        </div>
    </div>
</x-admin>
