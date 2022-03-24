<div>
    @if($examUserCheck->count()==0 and $exam->exam_start<=\Carbon\Carbon::now())
        <button wire:click="start()" class="btn btn-primary">
            Mulai TO
        </button>
    @else
        @if($exam->status_multiple_attempt==1 or auth()->user()->role==1)
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
    @if(auth()->user()->role==1 or $exam->status_view_score==1)
        @if($exam->exam_type_id==2)
            <a href="{{ route('admin.user.exam.livescore',$exam->slug) }}" class="btn btn-primary">
                Ranking
            </a>
        @endif
        @if($exam->exam_type_id==1)
            <a href="{{ route('admin.user.exam.ranking',$exam->slug) }}" class="btn btn-primary">
                Ranking
            </a>
        @endif
    @endif
</div>
