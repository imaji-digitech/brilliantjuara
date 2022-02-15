<x-admin>
    <x-slot name="title">
        Data exam
    </x-slot>
    <div>
        <div class="container-fluid">
            <div class="row">
                <livewire:result :exam="$exam" :examUser="$examUser"/>
            </div>
        </div>
    </div>
</x-admin>
