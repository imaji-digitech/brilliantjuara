<form wire:submit.prevent="{{$action}}" xmlns:wire="http://www.w3.org/1999/xhtml">
    <x-form.select model="type" :selected="$type" title="TO atau Bimbel" :options="$optionType" />
    <x-form.select model="data.exam_id" :selected="$data['exam_id']" title="TO" :options="$optionExam" />
    <x-form.select model="data.course_id" :selected="$data['course_id']" title="Bimbel" :options="$optionCourse" />
    <button type="submit" class="btn btn-primary float-end">Submit</button>
</form>
