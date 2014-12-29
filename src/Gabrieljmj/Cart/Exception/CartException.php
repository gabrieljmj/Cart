<?php
/**
 * Gabrieljmj\Cart
 *
 * @author  Gabriel Jacinto <gamjj74@hotmail.com>
 * @license MIT License
 * @link    https://github.com/GabrielJMJ/Cart
*/

namespace Gabrieljmj\Cart\Exception;

use Gabrieljmj\Cart\Product\ProductInterface;

class CartException extends \Exception
{
    public static function productNotFoundOnCart($product)
    {
        $product = $product instanceof ProductInterface ? $product->getId() : $product;
        throw new CartException('Product not found in this cart: ' . $product);
    }
}