<?php

namespace XtendLunar\Features\ProductOptions;

use CodeLabX\XtendLaravel\Base\XtendFeatureProvider;
use Illuminate\Foundation\Events\LocaleUpdated;
use Illuminate\Support\Facades\Event;
use Livewire\Livewire;
use Lunar\Hub\Facades\Menu;
use XtendLunar\Features\ProductOptions\Livewire\Components\ProductOptions\OptionEdit;
use XtendLunar\Features\ProductOptions\Livewire\Components\ProductOptions\OptionValueEdit;
use XtendLunar\Features\ProductOptions\Livewire\Pages\ProductOptions\ProductOptionsIndex;

class ProductOptionsProvider extends XtendFeatureProvider
{
    public function register(): void
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/hub.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'adminhub');
    }

    public function boot(): void
    {
        Livewire::component('hub.pages.product-options.product-options-index', ProductOptionsIndex::class);
        Livewire::component('hub.components.product-options.edit', OptionEdit::class);
        Livewire::component('hub.components.product-options.value-edit', OptionValueEdit::class);

        // @todo Move this to XtendFeatureProvider to check if method exists
        $this->registerWithSidebarMenu();
    }

    protected function registerWithSidebarMenu(): void
    {
        // Note: We listen to LocaleUpdated event to make sure translations are loaded and menu items are all available
        Event::listen(LocaleUpdated::class, function () {
            Menu::slot('sidebar')->section('catalogue-manager')->addItem(function ($item) {
                $item->name('Product Options')
                    ->handle('hub.product-options')
                    ->route('hub.product-options.index')
                    ->gate('settings:core')
                    ->icon('clipboard-list');
            }, 'hub.products');
        });
    }
}
