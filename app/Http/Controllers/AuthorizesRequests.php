<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Auth\Access\Gate;

trait AuthorizesRequests
{
    /**
     * Authorize a given action for the user.
     *
     * @param  string  $ability
     * @param  mixed|array  $arguments
     * @return \Illuminate\Auth\Access\Response
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException|\Illuminate\Contracts\Container\BindingResolutionException
     */
    public function authorize($ability, $arguments = [])
    {
        if (! app(Gate::class)->check($ability, $arguments)) {
            throw new AuthorizationException('This action is unauthorized.');
        }

        return app(Gate::class)->authorize($ability, $arguments);
    }
}
