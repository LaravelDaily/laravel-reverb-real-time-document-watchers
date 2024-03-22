<?php

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Storage;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int)$user->id === (int)$id;
});

Broadcast::channel('App.Modes.Document.{id}', function ($user, $id) {
    return ['id' => $user->id, 'name' => $user->name, 'avatar' => Storage::url($user->avatar)];
});