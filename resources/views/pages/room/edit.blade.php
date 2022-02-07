<x-admin>
    <x-slot name="title">
        Ubah Data Kelas
    </x-slot>
    <div>
        <div class="container-fluid">
            <div class="row">
                <livewire:form.room action="update" :dataId="$id"/>
            </div>
        </div>
    </div>
</x-admin>
