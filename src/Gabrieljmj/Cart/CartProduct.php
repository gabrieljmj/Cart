<?php
/**
 * Gabrieljmj\Cart
 *
 * @author  Gabriel Jacinto <gamjj74@hotmail.com>
 * @license MIT License
 * @link    https://github.com/GabrielJMJ/Cart
*/

namespace Gabrieljmj\Cart;

use Gabrieljmj\Cart\Product\ProductInterface;

class CartProduct implements CartProductInterface
{
    /**
     * Product
     *
     * @var \Gabrieljmj\Cart\Product\ProductInterface
    */
    private $product;

    /**
     * Amount of this product
     *
     * @var integer
    */
    private $amount = 1;

    /**
     * @param \Gabrieljmj\Cart\Product\ProductInterface $product
    */
    public function __construct(ProductInterface $product)
    {
        $this->product = $product;
    }

    /**
     * Add products
     *
     * @param integer $n
    */
    public function add($n = 1)
    {
        $this->amount = $n + $this->amount;
    }

    /**
     * Remove products
     *
     * @param integer $n
    */
    public function remove($n = 1)
    {
        $this->amount = $this->amount - $n;
    }

    /**
     * Returns the amount of this product
     *
     * @return integer
    */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Returns the product
     *
     * @return \Gabrieljmj\Cart\Product\ProductInterface
    */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Returns the price of all products summed
     *
     * @return integer
    */
    public function getPrice()
    {
        return $this->product->getPrice() * $this->amount;
    }
}