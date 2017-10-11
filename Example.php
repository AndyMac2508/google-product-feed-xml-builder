<?php
require_once 'vendor/autoload.php';


use Rapidweb\GoogleProductFeedXml\Objects\apparelProduct;

$product = new apparelProduct;

$product->sku = "sku123";
$product->name = "testname";
$product->description = "description";
$product->url =  "testurl";
$product->image = "testimage";
$product->condition =  "new";
$product->availability = "instock";
$product->price = "22.99";

$product->googleProductCategory = "category";
$product->brand = "brand";
$product->gender = "gender";
$product->ageGroup = "agegroup";
$product->color = "Red";
$product->size = "small ";


var_dump($product);



