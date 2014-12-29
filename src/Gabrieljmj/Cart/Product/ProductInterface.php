<?php
namespace Gabrieljmj\Cart\Product;

interface ProductInterface
{
    /**
     * Returns product id
     *
     * @return integer
    */
    public function getId();

    /**
     * Returns product name
     *
     * @return string
    */
    public function getName();

    /**
     * Returns product price
     *
     * @return integer
    */
    public function getPrice();

    /**
     * Returns product categories
     *
     * @return array
    */
    public function getCategories();
}