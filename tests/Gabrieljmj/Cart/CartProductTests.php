<?php
namespace Test\Gabrieljmj\Cart;

use Gabrieljmj\Cart\CartProduct;
require_once 'Product/ProductGenerator.php';

class CartProductTests extends \PHPUnit_Framework_TestCase
{
    use \ProductGenerator;

    public function testConstructorSetTheCorrectProperty()
    {
        $product = $this->getGenericProduct();
        $cartProduct = new CartProduct($product);

        $this->assertAttributeEquals($product, 'product', $cartProduct);
    }

    public function testAddingProductsTheAmountIsCorrect()
    {
        $product = $this->getGenericProduct();
        $cartProduct = new CartProduct($product);
        $cartProduct->add();
        $cartProduct->add(2);

        $this->assertEquals(4, $cartProduct->getAmount());
    }

    public function testRemovingProductsTheAmountIsCorrect()
    {
        $product = $this->getGenericProduct();
        $cartProduct = new CartProduct($product);
        $cartProduct->add();
        $cartProduct->add(2);
        $cartProduct->remove();

        $this->assertEquals(3, $cartProduct->getAmount());
    }

    public function testSumForPricesIsCorrect()
    {
        $product = $this->getGenericProduct();
        $cartProduct = new CartProduct($product);
        $cartProduct->add();

        $this->assertEquals(35, $cartProduct->getPrice());
    }

    public function testGetterForProductReturnsTheOriginalInstance()
    {
        $product = $this->getGenericProduct();
        $cartProduct = new CartProduct($product);

        $this->assertEquals($product, $cartProduct->getProduct());
    }
}