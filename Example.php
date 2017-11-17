<?php
require_once 'vendor/autoload.php';


use RapidWeb\GoogleProductFeedXml\Objects\ApparelProduct;
use RapidWeb\GoogleProductFeedXml\Objects\GoogleProductFeed;
use RapidWeb\GoogleProductFeedXml\Objects\Variation;

$product = new ApparelProduct;
$productVariation = new ApparelProduct;
$productVariation2 = new ApparelProduct;


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

$productVariation2->sku = "variation2";
$productVariation2->description = "variationdesc2";
$productVariation2->url =  "variationurl2";
$productVariation2->image = "variationimage2";
$productVariation2->condition =  "variationcondition2";
$productVariation2->availability = "variationconditionstock2";
$productVariation2->price = "13332222";

$productVariation2->googleProductCategory = "variationcat2";
$productVariation2->brand = "variationbrand2";
$productVariation2->gender = "variationgender2";
$productVariation2->ageGroup = "variationage2";
$productVariation2->color = "variationcol2";
$productVariation2->size = "variationsize2";


$product->addVariation($productVariation);
$product->addVariation($productVariation2);




GoogleProductFeed::addProduct($product);




$status = GoogleProductFeed::getXml();

foreach($status as $stat)
{
    echo "<p>".$stat."</p>";
}



