@props(['title','model'])
<div class="col">
    <div class="mb-3">
        @if($title!=null)
            <label class="form-label">{{$title}}</label>
        @endif
        <div id="{{ str_replace(".", "", $model) }}"></div>

        <script type="text/javascript">
            document.addEventListener('livewire:load', function () {
                var {{ str_replace(".", "", $model) }} = new MathEditor('{{ str_replace(".", "", $model) }}');
            });
        </script>
    </div>
</div>
