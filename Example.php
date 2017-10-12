<?php
require_once 'vendor/autoload.php';


use RapidWeb\GoogleProductFeedXml\Objects\ApparelProduct;
use RapidWeb\GoogleProductFeedXml\Objects\GoogleProductFeed;
use RapidWeb\GoogleProductFeedXml\Objects\Variation;

$product = new ApparelProduct;
$productVariation = new ApparelProduct;


$product->sku = "sku123";
$product->name = "testname";
$product->description = "description";
$product->url =  "testurl";

$product->condition =  "new";
$product->availability = "instock";
$product->price = "22.99";

$product->googleProductCategory = "category";
$product->brand = "brand";
$product->gender = "gender";
$product->ageGroup = "agegroup";
$product->color = "Red";
$product->size = "small ";



$productVariation->sku = "variation";
$productVariation->description = "variationdesc";
$productVariation->url =  "variationurl";
$productVariation->image = "variationimage";
$productVariation->condition =  "variationcondition";
$productVariation->availability = "variationconditionstock";
$productVariation->price = "1333";

$productVariation->googleProductCategory = "variationcat";
$productVariation->brand = "variationbrand";
$productVariation->gender = "variationgender";
$productVariation->ageGroup = "variationage";
$productVariation->color = "variationcol";
$productVariation->size = "variationsize";

$product->addVariation($productVariation);




GoogleProductFeed::addProduct($product);




$status = GoogleProductFeed::getXml();

foreach($status as $stat)
{
    echo "<p>".$stat."</p>";
}



