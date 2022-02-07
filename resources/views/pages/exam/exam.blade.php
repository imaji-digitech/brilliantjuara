<x-admin>
    <x-slot name="title">
        Data exam
    </x-slot>
    <div>
        <div class="container-fluid">
            <div class="row">
                <livewire:exam :exam="$exam" :examUser="$examUser"/>
            </div>
        </div>
    </div>
</x-admin>
