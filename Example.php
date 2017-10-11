<?php
require_once 'vendor/autoload.php';


use Rapidweb\GoogleProductFeedXml\Objects\ApparelProduct;
use Rapidweb\GoogleProductFeedXml\Objects\GoogleProductFeed;

$product = new ApparelProduct;
$product2 = new ApparelProduct;

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

$product2->sku = "sku321";
$product2->name = "testname2";
$product2->description = "description32";
$product2->url =  "testurl23";
$product2->image = "testimage123";
$product2->condition =  "new412";
$product2->availability = "instock123";
$product2->price = "22.99";

$product2->googleProductCategory = "category213";
$product2->brand = "brand214";
$product2->gender = "gender125";
$product2->ageGroup = "agegroup1256";
$product2->color = "Red1255";
$product2->size = "small1256";



GoogleProductFeed::addProduct($product);
GoogleProductFeed::addProduct($product2);




GoogleProductFeed::getXml();



