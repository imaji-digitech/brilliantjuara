@props(['title','model','method'])
<div class="col" wire:ignore>
    <div class="mb-3">
        @if($title!=null)
            <label class="form-label">{{$title}}</label>
        @endif
        <div id="{{ str_replace(".", "", $model) }}"></div>
        <script type="text/javascript">
            document.addEventListener('livewire:load', function () {
                var config{{ str_replace(".", "", $model) }} = {
                    handlers: {
                        edit: function () {
                            var data = {{ str_replace(".", "", $model) }}.getLatex();
                        @this.set('{{$model}}', data);
                        },
                        enter: function () {

                        },
                    }
                };
                var {{ str_replace(".", "", $model) }} = new MathEditor('{{ str_replace(".", "", $model) }}', 1, config{{ str_replace(".", "", $model) }});
                {{ str_replace(".", "", $model) }}.setLatex(@this.get('{{$model}}'))
                {{--if(@this.get('{{$model}}')!=null) {--}}

                // }
            });
        </script>
    </div>
</div>
