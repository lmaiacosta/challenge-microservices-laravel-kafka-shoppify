<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Models\Product;

class CreateProductController extends Controller
{
    public function __invoke(CreateProductRequest $request)
    {
        $data = $request->validated();
        $item = new Product($data);
        $item->save();
        $item->refresh();
        return response()->json(compact('item'));
    }
}
