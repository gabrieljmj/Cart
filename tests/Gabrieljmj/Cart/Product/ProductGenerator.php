<?php
use Gabrieljmj\Cart\Product\Product;

trait ProductGenerator
{
    protected function getGenericProduct($id = 1, $name = 'foo', $price = 17.5, $categories = ['category1'])
    {
        return new Product($id, $name, $price, $categories);
    }
}