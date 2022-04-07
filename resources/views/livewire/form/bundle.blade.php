<form wire:submit.prevent="{{$action}}" xmlns:wire="http://www.w3.org/1999/xhtml">
    <x-form.input model="data.title" title="Judul bundle" type="text"/>
    <x-form.select model="data.bundle_status_id" :selected="$data['bundle_status_id']" title="Status" :options="$optionStatus" />
    <x-form.select model="data.referral_can_use" :selected="$data['referral_can_use']" title="Referral Status" :options="$optionCanUse" />
    <x-form.select model="data.token_can_use" :selected="$data['token_can_use']" title="Token Status" :options="$optionCanUse" />
    <x-form.input model="data.referral_discount" title="Jumlah potongan" type="text"/>
    <x-form.input model="data.referral_money" title="Uang yang diterima BA" type="text"/>
    <x-form.summernote model="data.content" title="Deskripsi"/>
    <x-form.input model="thumbnail" title="thumbnail (rasio 600px*350px)" type="file" accept="image/*"/>
    <div wire:loading wire:target="thumbnail">
        Proses upload
    </div>
    @if($action=='create')
        @if($thumbnail)
            <img src="{{$thumbnail->temporaryUrl()}}" alt="" style="max-height: 300px">
        @endif
    @else
        @if($thumbnail)
            <img src="{{$thumbnail->temporaryUrl()}}" alt="" style="max-height: 300px">
        @else
            <img src="{{asset('storage/'.$this->data['thumbnail'])}}" alt="" style="max-height: 300px">
        @endif
    @endif
    <button type="submit" class="btn btn-primary float-end">Submit</button>
</form>
