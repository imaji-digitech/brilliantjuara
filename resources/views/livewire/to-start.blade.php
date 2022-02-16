<div>
    @if($examUserCheck->count()==0)
        <button wire:click="start()"  class="btn btn-primary">
{{--            href="{{ route('admin.user.exam.start',$exam->slug) }}"--}}
            Mulai TO
        </button>
    @else
        @if($exam->status_multiple_attempt==1)
{{--            <a href="{{ route('admin.user.exam.start',$exam->slug) }}" class="btn btn-primary">--}}
{{--                Mulai kembali TO--}}
{{--            </a>--}}
            <button wire:click="start()"  class="btn btn-primary">
                {{--            href="{{ route('admin.user.exam.start',$exam->slug) }}"--}}
                Mulai kembali TO
            </button>
        @endif
    @endif
</div>
