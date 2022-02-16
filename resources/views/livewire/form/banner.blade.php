<form wire:submit.prevent="{{$action}}" xmlns:wire="http://www.w3.org/1999/xhtml">
    <x-form.input model="data.title" title="Judul banner" type="text"/>
    <x-form.input model="data.link" title="Link" type="text"/>
    <x-form.input model="thumbnail" title="thumbnail (rasio 1000pxx664px)" type="file" accept="image/*" required/>
    <div wire:loading wire:target="thumbnail">
        Proses upload
    </div>
    @if($action=='create')
        @if($thumbnail)
            <img src="{{$thumbnail->temporaryUrl()}}" alt="" style="max-height: 300px">
        @endif
    @else
        @if($thumbnail)
            <img src="{{$thumbnail->temporaryUrl()}}" alt="" style="max-height: 300px">
        @else
            <img src="{{asset('storage/'.$this->data['thumbnail'])}}" alt="" style="max-height: 300px">
        @endif
    @endif
    <button type="submit" class="btn btn-primary float-end">Submit</button>
</form>
