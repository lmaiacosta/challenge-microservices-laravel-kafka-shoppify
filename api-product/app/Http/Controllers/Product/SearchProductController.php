<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;

class SearchProductController extends Controller
{
    public function __invoke()
    {
        $page = Product::query()->simplePaginate();
        return response()->json(compact('page'));
    }
}
