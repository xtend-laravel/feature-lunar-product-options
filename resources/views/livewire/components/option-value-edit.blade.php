<form wire:submit.prevent="save">
  <x-hub::input.group :label="__('adminhub::inputs.name')" for="name" :error="$errors->first('optionValue.name.' . $this->defaultLanguage->code)">
    <x-hub::translatable>
      <x-hub::input.text
              wire:model="optionValue.name.{{ $this->defaultLanguage->code }}"
              :error="$errors->first('optionValue.name.' . $this->defaultLanguage->code)"
              :placeholder="__('adminhub::components.option.value.edit.name.placeholder')"
      />
      @foreach($this->languages->filter(fn ($lang) => !$lang->default) as $language)
        <x-slot :name="$language['code']">
          <x-hub::input.text
                  wire:model="optionValue.name.{{ $language->code }}"
                  :placeholder="__('adminhub::components.attribute-group-edit.name.placeholder')"
          />
        </x-slot>
      @endforeach
    </x-hub::translatable>
  </x-hub::input.group>

  <!-- Color picker -->
  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div class="mt-4 h-20">
      <x-hub::input.group :label="__('Primary Color')" for="primary_color" :error="$errors->first('productOption.primary_color')">
          <div class="relative">
              <div class="absolute inset-x-0 flex items-center">
                  <div class="w-full border border-gray-300 rounded-md shadow-sm">
                    <label>
                      <input type="color" wire:model.defer="optionValue.primary_color" class="w-full h-10 px-3 py-2 text-base placeholder-gray-500 border-transparent rounded-md appearance-none focus:outline-none focus:ring-0 focus:border-transparent focus:placeholder-gray-400 focus:text-gray-900 focus:bg-white sm:text-sm" />
                    </label>
                  </div>
              </div>
          </div>
      </x-hub::input.group>
    </div>
    <div class="mt-4 h-20">
      <x-hub::input.group :label="__('Secondary Color')" for="secondary_color" :error="$errors->first('productOption.secondary_color')">
        <div class="relative">
            <div class="absolute inset-x-0 flex items-center">
                <div class="w-full border border-gray-300 rounded-md shadow-sm">
                  <label>
                    <input type="color" wire:model.defer="optionValue.secondary_color" class="w-full h-10 px-3 py-2 text-base placeholder-gray-500 border-transparent rounded-md appearance-none focus:outline-none focus:ring-0 focus:border-transparent focus:placeholder-gray-400 focus:text-gray-900 focus:bg-white sm:text-sm" />
                  </label>
                </div>
            </div>
        </div>
      </x-hub::input.group>
    </div>
    <div class="mt-4 h-20">
      <x-hub::input.group :label="__('Tertiary Color')" for="tertiary_color" :error="$errors->first('productOption.tertiary_color')">
        <div class="relative">
            <div class="absolute inset-x-0 flex items-center">
                <div class="w-full border border-gray-300 rounded-md shadow-sm">
                  <label>
                    <input type="color" wire:model.defer="optionValue.tertiary_color" class="w-full h-10 px-3 py-2 text-base placeholder-gray-500 border-transparent rounded-md appearance-none focus:outline-none focus:ring-0 focus:border-transparent focus:placeholder-gray-400 focus:text-gray-900 focus:bg-white sm:text-sm" />
                  </label>
                </div>
            </div>
        </div>
      </x-hub::input.group>
    </div>
  </div>

  <div class="mt-6">
    <x-hub::button>
      {{ __('adminhub::components.option.value.edit.save_option.value.btn') }}
    </x-hub::button>
  </div>
</form>
