<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;

class DeleteProductController extends Controller
{
    public function __invoke(int $id)
    {
        $item = Post::query()->findOrFail($id);
//        $item->delete();
        return response()->json('Error', 400);
    }
}
