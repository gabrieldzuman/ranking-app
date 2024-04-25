<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/ranking/{movement}', 'RankingController@index');
