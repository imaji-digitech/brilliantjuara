
<form wire:submit.prevent="{{$action}}" xmlns:wire="http://www.w3.org/1999/xhtml">
    <x-form.input model="data.price" title="Harga" type="number"/>
    <x-form.input model="data.min" title="Minimal pembelian" type="number"/>
    <button type="submit" class="btn btn-primary float-end">Submit</button>
</form>
