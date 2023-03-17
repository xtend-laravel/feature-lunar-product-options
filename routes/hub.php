<?php

use Illuminate\Support\Facades\Route;
use Lunar\Hub\Http\Middleware\Authenticate;
use XtendLunar\Features\ProductOptions\Livewire\Pages\ProductOptions\ProductOptionsIndex;

/**
 * Product options routes.
 */
Route::group([
    'prefix' => config('lunar-hub.system.path', 'hub'),
    'middleware' => ['web', Authenticate::class, 'can:settings:core'],
], function () {
    Route::get('product-options', ProductOptionsIndex::class)->name('hub.product-options.index');
});
