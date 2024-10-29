<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Services\KanyeService;
use App\Http\Middleware\ApiTokenAuthentication;

Route::get('/kanye/get_list', function (Request $request) {
    $kanyeService = new KanyeService();
    $limit = $request->get('limit') ?? 5;    
    return $kanyeService->getList($limit);
})->middleware([ApiTokenAuthentication::class]);
