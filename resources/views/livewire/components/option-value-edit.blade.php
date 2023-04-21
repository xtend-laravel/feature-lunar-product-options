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
      <!-- Color picker -->
      <div class="mt-4 h-20">
          <x-hub::input.group :label="__('Color')" for="color" :error="$errors->first('productOption.color')">
              <div class="relative">
                  <div class="absolute inset-x-0 flex items-center">
                      <div class="w-full border border-gray-300 rounded-md shadow-sm">
                        <label>
                          <input type="color" wire:model.defer="optionValue.color" class="w-full h-10 px-3 py-2 text-base placeholder-gray-500 border-transparent rounded-md appearance-none focus:outline-none focus:ring-0 focus:border-transparent focus:placeholder-gray-400 focus:text-gray-900 focus:bg-white sm:text-sm" />
                        </label>
                      </div>
                  </div>
              </div>
          </x-hub::input.group>
      </div>
    </x-hub::translatable>
  </x-hub::input.group>

  <div class="mt-6">
    <x-hub::button>
      {{ __('adminhub::components.option.value.edit.save_option.value.btn') }}
    </x-hub::button>
  </div>
</form>
