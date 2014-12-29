<?php
namespace Gabrieljmj\Cart;

use Gabrieljmj\Cart\Product\ProductInterface;
use Gabrieljmj\Cart\CartInterface;
use Gabrieljmj\Cart\Exception\CartException;

use \ArrayIterator;

class Cart implements CartInterface
{
    /**
     * Registred products
     *
     * @var array
    */
    private $products = [];

    /**
     * Adds a product
     *
     * @param \Gabrieljmj\Cart\Product\ProductInterface $product
    */
    public function add(ProductInterface $product)
    {
        if ($this->has($product)) {
            $this->products[$product->getId()]->add();
        } else {
            $this->products[$product->getId()] = new CartProduct($product);
        }
    }

    /**
     * Removes a product by id or instance
     *
     * @param integer $product
     * @param integer $amount
    */
    public function remove($product, $amount = 0)
    {
        if ($this->has($product)) {
            if ($amount === 0 || $amount > count($this->products[$product])) {
                unset($this->products[$product]);
            } else {
                $id = $product instanceof ProductInterface ? $product->getId(): $product;
                $cartProduct = $this->products[$id];
                $cartProduct->remove($amount);
            }
        } else {
            CartException::productNotFoundOnCart($product);
        }
    }

    /**
     * Clear the chart
    */
    public function clear()
    {
        $this->products = [];
    }
    
    /**
     * Verifies if the chart has a kind of determined product
     *
     * @param integer|\Gabrieljmj\Cart\Product\ProductInterface $product
     * @return boolean
    */
    public function has($product)
    {
        return $product instanceof ProductInterface ? isset($this->products[$product->getId()])
            : isset($this->products[$product]);
    }

    /**
     * Products total on chart
     *
     * @return integer
    */
    public function count()
    {
        return $this->countable('getAmount');
    }

    /**
     * Returns the number of unique itens
     *
     * @return integer
    */
    public function countUniqueItems()
    {
        return count($this->products);
    }

    /**
     * Returns the price of products on cart
     *
     * @return integer
    */
    public function getTotalPrice()
    {
        return $this->countable('getPrice');
    }

    /**
     * Returns an iterator for cart products
     *
     * @return \IteratorInterface
    */
    public function getIterator()
    {
        $arr = [];

        foreach ($this->products as $product) {
            $arr[] = $product->getProduct();
        }

        return new ArrayIterator($arr);
    }

    /**
     * Returns total of determined product
     *
     * @return integer
    */
    public function getTotalOfAProduct($product)
    {
        if (!$this->has($product)) {
            return 0;
        }

        $id = $product instanceof ProductInterface ? $product->getId(): $product;
        $cartProduct = $this->products[$id];

        return $cartProduct->getAmount();
    }

    /**
     * @param string $method
     * @param array  $args
     * @return integer
    */
    private function countable($method, array $args = [])
    {
        $total = 0;

        foreach ($this->products as $product) {
            $total = $total + call_user_func_array([$product, $method], $args);
        }

        return $total;
    }
}