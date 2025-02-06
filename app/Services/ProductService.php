<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    /**
     * Get products with discount logic applied
     * 
     * @param string|null $category
     * @param int|null $priceLessThan
     * @return \Illuminate\Support\Collection
     */
    public function getProducts($category = null, $priceLessThan = null)
    {
        // Initialize the query
        $query = Product::query();

        // Apply filters if present
        if ($category) {
            $query->where('category', $category);
        }
        
        if ($priceLessThan) {
            $query->where('price', '<=', (int)$priceLessThan);
        }

        // Get the products and apply discount logic
        return $query->limit(5)->get()->map(function ($product) {
            $originalPrice = $product->price;
            $finalPrice = $originalPrice;
            $discountPercentage = null;

            // Apply category-based discounts
            if ($product->category === 'boots') {
                $discountPercentage = 30;
            }

            // Apply specific SKU discount
            if ($product->sku === '000003') {
                $discountPercentage = max($discountPercentage ?? 0, 15);
            }

            // If there is a discount, calculate the final price
            if ($discountPercentage) {
                $finalPrice = (int) round($originalPrice * (1 - $discountPercentage / 100));
            }

            // Return the product with the applied discount
            return [
                'sku' => $product->sku,
                'name' => $product->name,
                'category' => $product->category,
                'price' => [
                    'original' => $originalPrice,
                    'final' => $finalPrice,
                    'discount_percentage' => $discountPercentage ? "{$discountPercentage}%" : null,
                    'currency' => 'EUR'
                ]
            ];
        });
    }
}
