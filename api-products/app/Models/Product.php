<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



/**
 * @OA\Schema(
 *     schema="Product",
 *     title="Product",
 *     description="Product model",
 *     @OA\Property(property="id", type="integer", format="int64", description="Product ID"),
 *     @OA\Property(property="name", type="string", description="Product name"),
 *     @OA\Property(property="price", type="float", description="Product Price"),
 *     @OA\Property(property="desc", type="string", description="Product description"),
 *     @OA\Property(property="status", type="string", enum={"Publish", "Draft"}, description="Product status"),
 *     @OA\Property(property="date", type="string", format="date-time", description="Product date"),
 *     @OA\Property(property="category", type="string", description="Product category"),
 * )
 *
 * @OA\Schema(
 *     schema="ProductRequest",
 *     title="ProductRequest",
 *     description="Product request model",
 *     @OA\Property(property="title", type="string", description="Product title"),
 *     @OA\Property(property="desc", type="string", description="Product description"),
 *     @OA\Property(property="status", type="string", enum={"Publish", "Draft"}, description="Product status"),
 *     @OA\Property(property="date", type="string", format="date-time", description="Product date"),
 *     @OA\Property(property="category", type="string", description="Product category"),
 * )
 */
class Product extends Model
{

    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'vendor',
        'image',
        'product_type',
        'status',
        'image',
        'quantity',
    ];



    public function setDateAttribute($value)
    {
        $this->attributes['date'] = date('Y-m-d H:i:s', strtotime($value));
    }

    public function getDateAttribute($value)
    {
        return $value ? date('Y-m-d H:i:s', strtotime($value)) : null;
    }

    // Accessor to retrieve the 'created_at' field in the desired format
    public function getCreatedAtAttribute($value)
    {
        return $value ? date('Y-m-d H:i:s', strtotime($value)) : null;
    }

    // Accessor to retrieve the 'updated_at' field in the desired format
    public function getUpdatedAtAttribute($value)
    {
        return $value ? date('Y-m-d H:i:s', strtotime($value)) : null;
    }
}
