<form wire:submit.prevent="{{$action}}" xmlns:wire="http://www.w3.org/1999/xhtml">
    <x-form.input model="data.title" title="Nama kategori" type="text"/>
    @if($action="update")
        <x-form.select model="data.order" :selected="$data['order']" title="order" :options="$optionNumber"/>
    @endif
    <button type="submit" class="btn btn-primary float-end">Submit</button>
</form>
