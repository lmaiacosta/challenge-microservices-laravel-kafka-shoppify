<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;

class UpdateProductController extends Controller
{
    public function __invoke(int $id, UpdateProductRequest $request)
    {
        $data = $request->validated();
        $item = Product::query()->findOrFail($id);
        $item->update($data);
        return response()->json(compact('item'));
    }
}
