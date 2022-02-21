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
    @endif
    <a href="{{ route('admin.user.exam.ranking',$exam->slug) }}" class="btn btn-primary">
        Ranking
    </a>
</div>
