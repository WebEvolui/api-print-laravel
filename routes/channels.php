<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::routes(['middleware' => 'auth:sanctum']);

Broadcast::channel('stores.{id}', function ($user, $id) {
    return (int) $user->store->id === (int) $id;
});
