<?php

use Illuminate\Support\Facades\Route;
use Lunar\Features\ProductOptions\Pages\ProductOptions\ProductOptionsIndex;
use Lunar\Hub\Http\Middleware\Authenticate;

/**
 * Product options routes.
 */
Route::group([
    'prefix' => config('lunar-hub.system.path', 'hub'),
    'middleware' => ['web', Authenticate::class, 'can:settings:core'],
], function () {
    Route::get('product-options', ProductOptionsIndex::class)->name('hub.product-options.index');
});
