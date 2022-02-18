<form wire:submit.prevent="withdraw" xmlns:wire="http://www.w3.org/1999/xhtml">
    <x-form.input model="data.money" title="Jumlah uang ditarik" type="number"/>
    <x-form.input model="data.bank_name" title="Nama bank" type="text"/>
    <x-form.input model="data.no_rek" title="No rekening" type="text"/>
    <button type="submit" class="btn btn-primary float-end">Submit</button>
</form>
