<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;

class ProductController extends Controller {

    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function getProducts(Request $request)
    {
        // Call the service to get the products with the filters and discounts
        $products = $this->productService->getProducts(
            $request->category,
            $request->priceLessThan
        );

        return response()->json($products);
    }
}
