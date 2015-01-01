Gabrieljmj\Cart
===============
[![Total Downloads](https://img.shields.io/packagist/dt/gabrieljmj/cart.svg?style=flat)](https://packagist.org/packages/gabrieljmj/cart) [![Latest Unstable Version](https://img.shields.io/badge/unstable-dev--master-orange.svg?style=flat)](https://packagist.org/packages/gabrieljmj/cart) [![License](https://img.shields.io/badge/license-MIT-lightgrey.svg?style=flat)](https://packagist.org/packages/gabrieljmj/cart) [![Build Status](https://travis-ci.org/GabrielJMJ/Cart.svg?branch=master)](https://travis-ci.org/GabrielJMJ/Cart) [![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/g/gabrieljmj/cart.svg?style=flat)](https://scrutinizer-ci.com/g/GabrielJMJ/Cart/?branch=master)

Simple shopping cart system.

##Usage
####Adding product to cart
Use the method ```\Gabrieljmj\Cart\Cart::add(ProductInterface $product)``` to add a product. If previously the same product was added, will be add one more to cart.
```php
use Gabrieljmj\Cart\Product\Product;
use Gabrieljmj\Cart\Cart;

$product = new Product(1, 'TV', 499.90, ['tv', 'led']);
$cart = new Cart();
$cart->add($product);
```
####Removing product of a cart
Using ```\Gabrieljmj\Cart\Cart::remove($product[, $amount = 0])``` you can remove products of a cart. If ```$amount``` be ```0```, all products of that products will be removed. The argument ```$product``` can be an instance of ```\Gabrieljmj\Cart\Product\ProductInterface``` or product id.
```php
$cart->remove(1);
```

####Clearing the cart
To this use the method ```\Gabrieljmj\Cart\Cart::clear```.
```php
$cart->clear();
```

####Verifying if the cart has a product
The ```$product``` argument can be the product id or an instance of ```\Gabrieljmj\Cart\Product\ProductInterface```. The return will be boolean.
```php
$cart->has($product);
```

####Counting how many products has in the cart
The method ```\Gabrieljmj\Cart\Cart::count()``` will return how many items has in the cart.
```php
$cart->count();
```

####Counting how many products of a type has in the cart
Use the method ```\Gabrieljmj\Cart\Cart::getTotalOfAProduct($product)``` and like others, ```$product``` can be an instance of ```\Gabrieljmj\Cart\Product\ProductInterface``` or product id.
```php
$cart->getTotalOfAProduct($product);
```

####Counting how many types of products has in the cart
And this method (```\Gabrieljmj\Cart\Cart::countUniqueItems()```) counts how many types of products has in the cart.
```php
$cart->countUniqueItems();
```

####Calculating total price of the cart
The method ```\Gabrieljmj\Cart\Cart::getTotalPrice()``` returns how much costs the cart.
```php
$cart->getTotalPrice();
```

####Iterating with all products
Each product will return an instance of ```\Gabrieljmj\Cart\Product\ProductInterface```:
```php
$iterator = $cart->getIterator();

while ($iterator->valid()) {
    $curr = $iterator->current();
    echo '<li><b>Product:</b>' . $curr->getProduct()->getName() . ' / <b>Total:</b> ' . $cart->getTotalOfAProduct($curr) . '</li>';
    $iterator->next();
}
```
####Storaging
The instance of the cart usually is save on a session or a cookie.
```php
$_SESSION['cart'] = $cart;
//or
setcookie('cart', $cart);
```