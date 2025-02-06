<?php

namespace Tests\Unit;

use App\Services\ProductService;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_products_with_category_and_price_filter()
    {
        // Arrange
        $product1 = Product::create([
            'sku' => '000001',
            'name' => 'Product 1',
            'category' => 'boots',
            'price' => 10000,  // 100.00 EUR
        ]);
        $product2 = Product::create([
            'sku' => '000002',
            'name' => 'Product 2',
            'category' => 'boots',
            'price' => 20000,  // 200.00 EUR
        ]);

        $productService = new ProductService();

        // Act
        $result = $productService->getProducts('boots', 15000);

        // Assert
        $this->assertCount(1, $result);
        $this->assertEquals('Product 1', $result[0]['name']);
        $this->assertEquals(10000, $result[0]['price']['original']);
    }

    public function test_get_products_with_discount()
    {
        // Arrange
        $product = Product::create([
            'sku' => '000003',
            'name' => 'Product with discount',
            'category' => 'boots',
            'price' => 10000,  // 100.00 EUR
        ]);

        $productService = new ProductService();

        // Act
        $result = $productService->getProducts();

        // Assert
        $this->assertCount(1, $result);
        $this->assertEquals(7000, $result[0]['price']['final']);  // 30% discount for boots
    }
}
