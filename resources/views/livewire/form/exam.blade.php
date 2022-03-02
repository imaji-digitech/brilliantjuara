<form wire:submit.prevent="{{$action}}" xmlns:wire="http://www.w3.org/1999/xhtml">
    <x-form.input model="data.title" title="Nama TO" type="text"/>
    <x-form.input model="data.time" title="Waktu dalam menit" type="number"/>
    <x-form.input model="data.price" title="Harga satuan TO" type="number"/>
    <x-form.select model="data.status_discussion" title="Status pembahasan" :selected="$data['status_discussion']" :options="$optionStatus"/>
    <x-form.select model="data.status_multiple_attempt" title="Status pengerjaan berkali-kali" :selected="$data['status_discussion']" :options="$optionStatus"/>
    <x-form.select model="data.exam_type_id" title="Jenis ujian" :selected="$data['exam_type_id']" :options="$optionExamType"/>
{{--    <x-form.select model="data.status_view_score" title="Status pembahasan" :selected="$data['status_discussion']" :options="$optionStatus"/>--}}
    <button type="submit" class="btn btn-primary float-end">Submit</button>
</form>
