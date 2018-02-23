<?
namespace RapidWeb\GoogleProductFeedXml\Objects;

use DOMDocument;
use RapidWeb\GoogleProductFeedXml\Objects\BaseProduct;

abstract class GoogleProductFeed
{
 private static $products = [];

 public function addProduct(BaseProduct $product)
 {
    SELF::$products[] = $product;
 }

 public function getXml()
 {
   
    if($errors = SELF::validate(SELF::$products)){
        return $errors;
    }


    $domdoc = new DOMDocument('1.0');

    $domdoc->preserveWhiteSpace = false;
    $domdoc->formatOutput = true;

    $envelope = $domdoc->appendChild(SELF::feedEnvelope($domdoc));

    foreach(SELF::$products as $product){
      $envelope->appendChild($product->createXmlelement($domdoc));
      if(count($product->variations) > 0){
          foreach($product->variations as $variation){
            $envelope->appendChild($variation->createXmlelement($domdoc));
          }
      }
    }
 

    return $domdoc->saveXML();


    
 }

public function Products()
 {
     return SELF::$products;
 }
 private function feedEnvelope($domdoc)
 {
     $envelope = $domdoc->createElement('rss');
     $rss = $domdoc->appendChild($envelope);
     $rss->setAttribute('xmlns:g','http://base.google.com/ns/1.0');
     $rss->setAttribute('version','2.0');
     $channel = $rss->appendChild($domdoc->createElement('channel'));

     $title = $domdoc->createElement('title','Example - Online Store');
     $link = $domdoc->createElement('link','http://www.example.com');
     $description = $domdoc->createElement('description','This is a sample feed containing the required and recommended attributes for a variety of different products');
     $channel->appendChild($title);
     $channel->appendChild($link);
     $channel->appendChild($description);

     return $channel;

}
private function validate($items)
{
    //validation
   $i = 0;

   $productCount = count($items);
    foreach($items as $item){
       $errors = $item->validate;
    }

    if(count($errors) > 0 )
    {
        return $errors;
    }
    return false;
}
}
