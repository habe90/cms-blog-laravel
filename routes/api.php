<?php

use App\Http\Controllers\Api\V1\Admin\PostApiController;

Route::group(['prefix' => 'v1', 'as' => 'api.', 'middleware' => ['auth:sanctum']], function () {
    // Posts
    Route::post('posts/media', [PostApiController::class, 'storeMedia'])->name('posts.store_media');
    Route::apiResource('posts', PostApiController::class);
});
