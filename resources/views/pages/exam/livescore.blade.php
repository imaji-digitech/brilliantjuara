<x-admin>
    <x-slot name="title">
        Ranking {{ \App\Models\Exam::getExam($exam)->title }}
    </x-slot>
    <div>
        <div class="container-fluid">
            <div class="row">
                <livewire:livescore :exam="$exam"/>
            </div>
        </div>
    </div>
</x-admin>
