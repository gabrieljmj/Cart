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
use \Countable;
use \IteratorAggregate;

interface CartInterface extends Countable, IteratorAggregate
{
    /**
     * Adds a product
     *
     * @param \Gabrieljmj\Cart\Product\ProductInterface $product
    */
    public function add(ProductInterface $product);

    /**
     * Removes a product by id or instance
     *
     * @param integer|\Gabrieljmj\Cart\Product\ProductInterface $productId
     * @param integer $amount
    */
    public function remove($product, $amount = 0);

    /**
     * Clear the chart
    */
    public function clear();

    /**
     * Verifies if the chart has a kind of determined product
     *
     * @param integer|\Gabrieljmj\Cart\Product\ProductInterface $product
     * @return boolean
    */
    public function has($product);

    /**
     * Returns the number of unique itens
     *
     * @return integer
    */
    public function countUniqueItems();

    /**
     * Returns the price of products on cart
     *
     * @return integer
    */
    public function getTotalPrice();
    
    /**
     * Returns total of determined product
     *
     * @return integer
    */
    public function getTotalOfAProduct($product);
}