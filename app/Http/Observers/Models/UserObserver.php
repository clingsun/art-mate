<?php

namespace App\Http\Observers\Models;

use App\Http\Models\User;

class UserObserver
{
    /**
     * @param  \App\Http\Models\User  $model
     * @return void
     */
    public function retrieved(User $model)
    {

    }

    /**
     * @param  \App\Http\Models\User  $model
     * @return void
     */
    public function saving(User $model)
    {

    }

    /**
     * @param  \App\Http\Models\User  $model
     * @return void
     */
    public function saved(User $model)
    {

    }

    /**
     * @param  \App\Http\Models\User  $model
     * @return void
     */
    public function creating(User $model)
    {

    }

    /**
     * @param  \App\Http\Models\User  $model
     * @return void
     */
    public function created(User $model)
    {

    }

    /**
     * @param  \App\Http\Models\User  $model
     * @return void
     */
    public function updating(User $model)
    {

    }

    /**
     * @param  \App\Http\Models\User  $model
     * @return void
     */
    public function updated(User $model)
    {

    }


    /**
     * @param  \App\Http\Models\User  $model
     * @return void
     */
    public function deleting(User $model)
    {

    }

    /**
     * @param  \App\Http\Models\User  $model
     * @return void
     */
    public function deleted(User $model)
    {

    }

    /**
     * @param  \App\Http\Models\User  $model
     * @return void
     */
    public function forceDeleted(User $model)
    {

    }

    /**
     * @param  \App\Http\Models\User  $model
     * @return void
     */
    public function restoring(User $model)
    {

    }

    /**
     * @param  \App\Http\Models\User  $model
     * @return void
     */
    public function restored(User $model)
    {

    }
}