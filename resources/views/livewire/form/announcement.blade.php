<form wire:submit.prevent="{{$action}}" xmlns:wire="http://www.w3.org/1999/xhtml">
    <x-form.input model="data.title" title="Judul pengumuman" type="text"/>
    <x-form.input model="data.content" title="Link pengumuman" type="text"/>
    <button type="submit" class="btn btn-primary float-end">Submit</button>
</form>
