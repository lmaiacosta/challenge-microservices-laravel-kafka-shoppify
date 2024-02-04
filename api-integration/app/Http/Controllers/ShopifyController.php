<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\Http;

class ShopifyController extends Controller
{

    public static function updateProductShopify($product): array
    {
        try {
            $response = Http::shopify()->post("/products/".$product['id_shopify'], [
                'product' => [
                    'id' => $product['id_shopify'],
                    'title' => $product['name'],
                    'body_html' => $product['description'],
                    'vendor' => $product['vendor'],
                    'product_type' => $product['product_type'],
                    'status' => $product['status']
                ]
            ]);
            return [
                'statusCode' => $response->status(),
                'body' => json_decode($response->body(), true)
            ];
        } catch (Exception $e) {
            return [
                'statusCode' => $e->getCode(),
                'message' => $e->getMessage(),
                'body' => null
            ];
        }
    }

    public static function createProductShopify($product): array
    {
        try {
            $response = Http::shopify()->post('/products.json', [
                'product' => [
                    'title' => $product['name'],
                    'body_html' => $product['description'],
                    'vendor' => $product['vendor'],
                    'product_type' => $product['product_type'],
                    'status' => $product['status'],
                    'images' => [['src' => $product['image']]],
                    'variants' => [
                        [
                            'price' => $product['price'],
                            'inventory_quantity' => $product['quantity'],
                            'inventory_management' => 'shopify'
                        ]
                    ]
                ]
            ]);
            return [
                'statusCode' => $response->status(),
                'body' => json_decode($response->body(), true)
            ];
        } catch (Exception $e) {
            return [
                'statusCode' => $e->getCode(),
                'message' => $e->getMessage(),
                'body' => null
            ];
        }
    }
}
