<form wire:submit.prevent="{{$action}}" xmlns:wire="http://www.w3.org/1999/xhtml">
    <x-form.summernote model="data.question" title="Pertanyaan"/>
    <x-form.summernote model="choice1" title="A"/>
    <x-form.summernote model="choice2" title="B"/>
    <x-form.summernote model="choice3" title="C"/>
    <x-form.summernote model="choice4" title="D"/>
    <x-form.summernote model="choice5" title="E"/>
    @if($exam->type_exam==2)
        <x-form.input model="score1" title="nilai A" type="number"/>
        <x-form.input model="score2" title="nilai B" type="number"/>
        <x-form.input model="score3" title="nilai C" type="number"/>
        <x-form.input model="score4" title="nilai D" type="number"/>
        <x-form.input model="score5" title="nilai E" type="number"/>
    @endif
    <x-form.select :options="$optionAnswer" :selected="$data['answer']" model="data.answer" title="Jawaban" type="number"/>
    <x-form.summernote model="data.discussion" title="Pembahasan"/>
    <button type="submit" class="btn btn-primary float-end">Submit</button>
</form>
