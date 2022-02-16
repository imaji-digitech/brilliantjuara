{{--@props(['title'=>'no title','options'=>[],'selected'=>[],'defer'=>false,'model'])--}}
<form wire:submit.prevent="add" xmlns:wire="http://www.w3.org/1999/xhtml">
    <x-form.select2 title="nama orang" :options="$optionUsers" model="canUse"/>
    <button type="submit" class="btn btn-primary float-end">Submit</button>
</form>
