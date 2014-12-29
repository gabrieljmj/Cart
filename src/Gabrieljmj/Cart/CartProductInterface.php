<?php
/**
 * Gabrieljmj\Cart
 *
 * @author  Gabriel Jacinto <gamjj74@hotmail.com>
 * @license MIT License
 * @link    https://github.com/GabrielJMJ/Cart
*/

namespace Gabrieljmj\Cart;

interface CartProductInterface
{
    /**
     * Add products
     *
     * @param integer $n
    */
    public function add($n = 1);
    
    /**
     * Remove products
     *
     * @param integer $n
    */
    public function remove($n = 1);
    
    /**
     * Returns the amount of this product
     *
     * @return integer
    */
    public function getAmount();

    /**
     * Returns the product
     *
     * @return \Gabrieljmj\Cart\Product\ProductInterface
    */
    public function getProduct();

    /**
     * Returns the price of all products summed
     *
     * @return integer
    */
    public function getPrice();
}