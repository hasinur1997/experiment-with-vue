<?php

use Illuminate\Support\Facades\Broadcast;
use App\Project;
/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('tasks.{project}', function ($user, Project $project) {
    if ($project->users->contains($user)) {
        return [
            'name'  =>  $user->name
        ];
    }
});
