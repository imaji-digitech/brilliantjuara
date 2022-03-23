<div>
    <div class="row">
        <div class="card col-md-12">
            <div class="card-body">
                <div class="row mb-4 mt-4">
                    <div>
                        <h5 class="text-primary" style="float: left">{{ $last->format('d-m-Y H:i:s') }}</h5>
                        <h5 class="text-primary" style="float: right" wire:click="score()"><i class="fa fa-refresh"> Fresh</i></h5>
                    </div>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <td>Rank</td>
                                <td>Nama</td>
                                <td>Asal</td>
                                <td>Keterangan</td>
                                @foreach($exam->examSteps as $es)
                                    <td>{{ $es->title }}</td>
                                @endforeach
                                <td>Total</td>
                                <td>Keterangan</td>
                            </tr>
                            </thead>
                            <tbody wire:poll.60000ms>
                            @php
                                $index=0
                            @endphp
                            @foreach($ra as $r)
                                @if($r->examUser->user->role!=1)
                                    <tr
                                        @if($index==0)
                                        style="background-color:  #ffd700;"
                                        @elseif($index==1)
                                        style="background-color:  #c0c0c0"
                                        @elseif($index==2)
                                        style="background-color:  #cd7f32"
                                        @else
                                        style="background-color:  white"
                                        @endif>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $r->examUser->user->name }}</td>
                                        <td>{{ 'Prov. '.$r->examUser->user->provinsi.' - '.$r->examUser->user->city }}</td>
                                        <td>{{ $r->examUser->status==1?'Pengerjaan':'Selesai' }}</td>
                                        @foreach($exam->examSteps as $es)
                                            <td>{{ $r->point[$es->id] }}</td>
                                        @endforeach
                                        <td>{{ $r->total }}</td>
                                        <td>
                                            @php
                                                $graduate="Lulus";
                                                    foreach($exam->examSteps as $i=>$es){
                        if ($i==0){
                        if ($r->point[$es->id] <65){
                            $graduate="Tidak Lulus";
                        }
                        }
                        if ($i==1){
                        if ($r->point[$es->id] <80){
                            $graduate="Tidak Lulus";
                        }
                        }
                        if ($i==2){
                        if ($r->point[$es->id] <156){
                            $graduate="Tidak Lulus";
                        }
                        }

                    }
                                            @endphp
                                            @if($r->examUser->status==2)
                                                <h6 style="color: {{ ($graduate=="Lulus")?'#38a7b3':'#BC2C3D' }}">{{ $graduate }}</h6>
                                            @endif
                                        </td>
                                    </tr>
                                    @php
                                        $index+=1
                                    @endphp
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
