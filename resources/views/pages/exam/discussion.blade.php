<x-admin>
    <x-slot name="title">
        Hasil & Pembahasan
    </x-slot>
    <div>
        <div class="container-fluid">
            <div class="row">
                <livewire:discussion :exam="$exam" :examUser="$examUser"/>
            </div>
        </div>
    </div>
</x-admin>
