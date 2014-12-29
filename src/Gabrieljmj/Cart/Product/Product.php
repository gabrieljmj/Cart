<?php
namespace Gabrieljmj\Cart\Product;

use Gabrieljmj\Cart\Product\ProductInterface;

class Product implements ProductInterface
{
    /**
     * Product id
     *
     * @var integer
    */
    protected $id;

    /**
     * Product name
     *
     * @var string
    */
    protected $name;

    /**
     * Product price
     *
     * @var integer
    */
    protected $price;

    /**
     * Product categories
     *
     * @var array
    */
    protected $categories;

    /**
     * @param integer $id
    */
    public function __construct($id, $name, $price, array $categories)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->categories = $categories;
    }

    /**
     * Returns product id
     *
     * @return integer
    */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns product name
     *
     * @return string
    */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns product price
     *
     * @return integer
    */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Returns product categories
     *
     * @return array
    */
    public function getCategories()
    {
        return $this->categories;
    }
}