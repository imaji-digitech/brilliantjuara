<form wire:submit.prevent="{{$action}}" xmlns:wire="http://www.w3.org/1999/xhtml">
    <x-form.input model="data.title" title="Judul event" type="text"/>
    <x-form.input model="data.created_at" title="Tanggal event" type="date"/>
    <button type="submit" class="btn btn-primary float-end">Submit</button>
</form>
