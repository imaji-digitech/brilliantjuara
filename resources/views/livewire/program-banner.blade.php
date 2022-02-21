<div class="owl-carousel owl-theme owl-loaded owl-drag" id="owl-carousel-14">
    <div class="owl-stage-outer owl-height">
        <div class="owl-stage"
             style="transform: translate3d(0px, 0px, 0px); transition: 0s; width: 11396px;">
            @foreach($Pbanners as $index=>$banner)
                <a href="{{ $banner->link }}" class="owl-item {{$index==0?'active':''}}" style="width: 100%; margin-right: 10px;">
                    <div class="item"><img style="width: 100%" src="{{asset('storage/'.$banner->thumbnail)}}" alt="1"></div>
                </a>
            @endforeach
        </div>
    </div>
    <div class="owl-nav disabled">
        <button type="button" role="presentation" class="owl-prev" data-bs-original-title=""
                title=""><span aria-label="Previous">‹</span></button>
        <button type="button" role="presentation" class="owl-next" data-bs-original-title=""
                title=""><span aria-label="Next">›</span></button>
    </div>

</div>
