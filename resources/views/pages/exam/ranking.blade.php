<x-admin>
    <x-slot name="title">
        Ranking {{ $exam->title }}
    </x-slot>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="card col-md-12">
                    <div class="card-body">
                        <div class="row mb-4 mt-4">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <td>Rank</td>
                                        <td>Nama</td>
                                        <td>Nilai</td>
                                        <td>Lulus</td>
                                        <td>Waktu selesai</td>
                                        @if(auth()->user()->role==1)
                                            <td>Aksi</td>
                                            @endif
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($ranking as $index=>$r)
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
                                            <td>{{ $r->user->name }}</td>
                                            <td>{{ number_format($r->point/$examQuestCount*100,2) }}%</td>
                                            <td style="color: {{ $r->point/$examQuestCount*100>=52?'green':'red' }}">
                                                <b>{{ $r->point/$examQuestCount*100>=52?'Lulus':'Tidak lulus' }}</b>
                                            </td>
                                            <td>{{ $r->created_at }}</td>
                                            <td>
                                                @if(auth()->user()->role==1)
                                                    <a href="{{ route('admin.user.exam.ranking.remove',$r->id) }}"
                                                       onclick="return confirm('Are you sure you want to delete this item?');"
                                                    >Hapus</a>
                                                @endif
                                            </td>
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
    </div>
</x-admin>
