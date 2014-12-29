<?php
namespace Test\Gabrieljmj\Chart\Product;

use Gabrieljmj\Cart\Product\Product;

require_once 'ProductGenerator.php';

class ProductTests extends \PHPUnit_Framework_TestCase
{
    use \ProductGenerator;

    public function testConstructorSetTheCorrectProperties()
    {
        $id = 1;
        $name = 'foo';
        $price = 17.5;
        $categories = ['category1'];
        $product = new Product($id, $name, $price, $categories);

        $this->assertAttributeEquals($id, 'id', $product);
        $this->assertAttributeEquals($name, 'name', $product);
        $this->assertAttributeEquals($price, 'price', $product);
        $this->assertAttributeEquals($categories, 'categories', $product);
    }

    public function testGetterForIdReturnsTheCorrectValue()
    {
        $this->getter('getId', $this->getGenericProduct(), 1);
    }

    public function testGetterForNameReturnsTheCorrectValue()
    {
        $this->getter('getName', $this->getGenericProduct(), 'foo');
    }

    public function testGetterForPriceReturnsTheCorrectValue()
    {
        $this->getter('getPrice', $this->getGenericProduct(), 17.5);
    }

    public function testGetterForCategoriesReturnsTheCorrectValue()
    {
        $this->getter('getCategories', $this->getGenericProduct(), ['category1']);
    }

    protected function getter($method, Product $product, $value)
    {
        $this->assertEquals(call_user_func_array([$product, $method], [$value]), $value);
    }
}