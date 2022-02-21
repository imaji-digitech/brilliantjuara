<x-admin>
    <x-slot name="title">
        Hasil & Pembahasan
    </x-slot>
    <div>
        <div class="container-fluid">
            <div class="row">

                @if(auth()->user()->role==1)
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="card">
                                    <div class="card-body" style="padding: 10px">
                                        Nama : {{ $examUser->user->name }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <livewire:discussion :exam="$exam" :examUser="$examUser"/>
            </div>
        </div>
    </div>
</x-admin>
