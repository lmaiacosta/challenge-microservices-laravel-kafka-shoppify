<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ReadProductController extends Controller
{
    public function __invoke(int $id)
    {
        $item = Product::query()->findOrFail($id);
        return response()->json(compact('item'));
    }
}
