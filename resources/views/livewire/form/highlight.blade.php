<form wire:submit.prevent="{{$action}}" xmlns:wire="http://www.w3.org/1999/xhtml">
    <x-form.input model="data.title" title="Nama highlight" type="text"/>
    <button type="submit" class="btn btn-primary float-end">Submit</button>
</form>
