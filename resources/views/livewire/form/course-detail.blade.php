<form wire:submit.prevent="{{$action}}" xmlns:wire="http://www.w3.org/1999/xhtml">
    <x-form.select model="data.course_highlight_id" :selected="$data['course_highlight_id']" title="Nama highlight" :options="$optionHighlight" />
    @if($data['course_type_id']==1)
        <x-form.summernote model="data.content" title="Materi"/>
    @elseif($data['course_type_id']==2)
        <x-form.input model="data.content" title="Link" type="text"/>
    @elseif($data['course_type_id']=3)
        <x-form.input model="file" title="Link" type="file"/>
        <div wire:loading wire:target="file">
            Proses upload
        </div>
    @endif
    <x-form.input model="data.title" title="Nama materi" type="text"/>
    <button type="submit" class="btn btn-primary float-end">Submit</button>
</form>
