<div>
    @if($examUserCheck->count()==0)
        <button wire:click="start()" class="btn btn-primary">
            Mulai TO
        </button>
    @else
        @if($exam->status_multiple_attempt==1)
            <button wire:click="start()" class="btn btn-primary">
                Mulai kembali TO
            </button>
        @endif
        @if($examUserCheck[0]->status==2)
            @if($exam->status_discussion==1 and \App\Models\UserHasDownload::hasDownload($exam->id))
                <a href="{{ route('admin.user.exam.download',$exam->slug) }}" class="btn btn-primary" target="_blank">
                    Download Pembahasan
                </a>
            @endif
        @endif
    @endif
    @if(auth()->user()->role==1)
            <a href="{{ route('admin.user.exam.livescore',$exam->slug) }}" class="btn btn-primary">
                Livescore
            </a>
    @endif
    <a href="{{ route('admin.user.exam.ranking',$exam->slug) }}" class="btn btn-primary">
        Ranking
    </a>
</div>
