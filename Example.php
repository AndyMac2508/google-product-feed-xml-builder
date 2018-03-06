<?php
require_once 'vendor/autoload.php';


use RapidWeb\GoogleProductFeedXml\Objects\ApparelProduct;
use RapidWeb\GoogleProductFeedXml\Objects\GoogleProductFeed;
use RapidWeb\GoogleProductFeedXml\Objects\Variation;
use RapidWeb\GoogleProductFeedXml\Objects\ShippingMethod;

//$productVariation = new ApparelProduct;
//$productVariation2 = new ApparelProduct;
$product = new ApparelProduct;
$GoogleProductFeed = new GoogleProductFeed;

$product->sku = "sku123";
$product->name = "testname";
$product->description = "description";
$product->url =  "testurl";
$product->gtin = 'testgtin';

$product->condition =  "new";
$product->availability = "instock";
$product->price = "22.99";
$product->currencyCode = 'GBP';
$product->image = 'test image';

$product->googleProductCategory = "category";
$product->brand = "brand";
$product->gender = "gender";
$product->ageGroup = "agegroup";
$product->color = "Red";
$product->size = "small ";

$product->gtin = "gtin";
$product->mpn = "mpn";
$product->currencyCode = "GBP";

        $shipping = new ShippingMethod;

        $shipping->country = "UK";
        $shipping->serviceType = "Standard";
        $shipping->price = "14.95";

$product->addShippingMethod($shipping);



/*
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
*/



$GoogleProductFeed->addProduct($product);




$status = $GoogleProductFeed->getXml();
if(isset($status)){
    foreach($status as $stat)
    {
        echo "<p>".$stat."</p>";
    }
    
}



