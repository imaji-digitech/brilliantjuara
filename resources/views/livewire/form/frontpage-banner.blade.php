<form wire:submit.prevent="create" xmlns:wire="http://www.w3.org/1999/xhtml">
    <x-form.input model="thumbnail" title="thumbnail (rasio 1000pxx664px)" type="file" accept="image/*" required/>
    <div wire:loading wire:target="thumbnail">
        Proses upload
    </div>
    @if($thumbnail)
        <img src="{{$thumbnail->temporaryUrl()}}" alt="" style="max-height: 300px">
    @endif

    <button type="submit" class="btn btn-primary float-end">Submit</button>
</form>
