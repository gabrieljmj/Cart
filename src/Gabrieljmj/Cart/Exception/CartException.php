<?php
namespace Gabrieljmj\Cart\Exception;

use Gabrieljmj\Cart\Product\ProductInterface;

class CartException extends \Exception
{
    public function productNotFoundOnCart(ProductInterface $product)
    {
        throw new CartException('Product not found in this cart: ' . $product->getName());
    }
}