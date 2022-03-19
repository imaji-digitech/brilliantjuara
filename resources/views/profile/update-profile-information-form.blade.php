<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                       wire:model="photo"
                       x-ref="photo"
                       x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            "/>

                <x-jet-label for="photo" value="{{ __('Photo') }}"/>

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}"
                         class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2"/>
            </div>
    @endif

    <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Nama') }}"/>
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name"
                         autocomplete="name"/>
            <x-jet-input-error for="name" class="mt-2"/>
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}"/>
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email"/>
            <x-jet-input-error for="email" class="mt-2"/>
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="phone_number" value="{{ __('Nomer telfon') }}"/>
            <x-jet-input id="phone_number" type="text" class="mt-1 block w-full" wire:model.defer="state.phone_number"/>
            <x-jet-input-error for="phone_number" class="mt-2"/>
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="city" value="{{ __('Nama Provinsi') }}"/>
            <select class="mt-1 block w-full form-control" id="provinsi" name="provinsi" wire:model.defer="state.provinsi">
                <option value=""></option>
            </select>
            <x-jet-input-error for="provinsi" class="mt-2" name="provinsi"/>
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="city" value="{{ __('Nama Kota') }}"/>
            <select class="mt-1 block w-full form-control" id="city" name="city" wire:model.defer="state.city"></select>
            <x-jet-input-error for="city" class="mt-2" name="city"/>
        </div>
        <script>
            window.addEventListener('livewire:load', function () {
                var prov;
                var data;
                $.getJSON('/indonesian.json', function (d) {
                    data = d;
                    $.each(data, function (i, option) {
                        $('#provinsi').append($('<option/>').attr("value", option.provinsi).text(option.provinsi));
                    });
                    $('#provinsi').val(@this.get('state.provinsi')).change()

                });
                $("#provinsi").change(function () {
                    $("#city").empty();
                    prov = $('#provinsi').val();
                    $.each(data, function (i, option) {
                        if (option.provinsi === prov) {
                            $.each(option.kota, function (j, option2) {
                                $('#city').append($('<option/>').attr("value", option2).text(option2));
                            });
                        }
                    });
                    $('#city').val(@this.get('state.city'))
                });


            })
        </script>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="save">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
