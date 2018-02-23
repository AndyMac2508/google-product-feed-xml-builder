<?
namespace RapidWeb\GoogleProductFeedXml\Objects;

use DOMDocument;
use RapidWeb\GoogleProductFeedXml\Objects\BaseProduct;

class GoogleProductFeed
{
 private  $products = [];
 private $storeName;
 private $description;
 private $link;

 public function addProduct(BaseProduct $product)
 {
    $this->products[] = $product;
 }

 public function getXml()
 {
   
    if($errors = $this->validate($this->products)){
        return $errors;
    }


    $domdoc = new DOMDocument('1.0');

    $domdoc->preserveWhiteSpace = false;
    $domdoc->formatOutput = true;

    $envelope = $domdoc->appendChild($this->feedEnvelope($domdoc));

    foreach($this->products as $product){
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
     return $this->products;
 }
 private function feedEnvelope($domdoc)
 {
     $envelope = $domdoc->createElement('rss');
     $rss = $domdoc->appendChild($envelope);
     $rss->setAttribute('xmlns:g','http://base.google.com/ns/1.0');
     $rss->setAttribute('version','2.0');
     $channel = $rss->appendChild($domdoc->createElement('channel'));

     $title = $domdoc->createElement('title',$this->storeName);
     $link = $domdoc->createElement('link',$this->link);
     $description = $domdoc->createElement('description',$this->description);
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
       $errors = $item->validate();
    }

    if(count($errors) > 0 )
    {
        return $errors;
    }
    return false;
}
}
