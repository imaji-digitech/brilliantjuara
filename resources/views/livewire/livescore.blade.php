<div>
    <div class="row">
        <div class="card col-md-12">
            <div class="card-body">
                <div class="row mb-4 mt-4">
                    <h5>{{ $last->format('Y m d H:i:s') }}</h5>
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
                            </tr>
                            </thead>
                            <tbody wire:poll.7000ms>
                            @foreach($ra as $index=>$r)
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
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
