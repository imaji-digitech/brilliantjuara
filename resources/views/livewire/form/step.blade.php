<form wire:submit.prevent="{{$action}}" xmlns:wire="http://www.w3.org/1999/xhtml">
    <x-form.input model="data.title" title="Nama highlight" type="text"/>
    @if($action=="create")
    <x-form.select model="data.type_exam" :selected="$data['type_exam']" title="Jenis" :options="$optionType" />
    @endif
    @if($data['type_exam']==1)
        <x-form.input model="data.score_right" type="number" title="Nilai benar"/>
        <x-form.input model="data.score_wrong" type="number" title="Nilai salah"/>
    @endif
    <button type="submit" class="btn btn-primary float-end">Submit</button>
</form>
