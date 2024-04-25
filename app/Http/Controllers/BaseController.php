<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseControllerLaravel;

if (!class_exists('App\Http\Controllers\BaseController')) {
    class BaseController extends BaseControllerLaravel
    {
        /**
         * Execute an action on the controller.
         *
         * @param  string  $method
         * @param  array   $parameters
         * @return \Illuminate\Http\Response
         */
        public function callAction($method, $parameters)
        {
            if (method_exists($this, $method)) {
                return call_user_func_array([$this, $method], $parameters);
            } else {
                return response()->json(['error' => 'Método não permitido'], 405);
            }
        }
    }
}

