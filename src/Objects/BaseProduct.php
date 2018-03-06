<?
namespace RapidWeb\GoogleProductFeedXml\Objects;


use RapidWeb\GoogleProductFeedXml\Interfaces\ProductInterface;
use RapidWeb\GoogleProductFeedXml\Objects\ShippingMethod;
use DOMDocument;


class BaseProduct implements ProductInterface
{
  public $sku;
  public $name;
  public $description;
  public $url;
  public $image;
  public $condition;
  public $availability;
  public $price;
  public $groupid;
  public $variations = [];
  public $gtin;
  public $mpn;
  public $currencyCode;
  public $shippingMethod;

  public function createXmlelement($domdoc)
  {
    $item = $domdoc->createElement('item');

    $id = $domdoc->createElement('g:id',$this->sku);
    $title = $domdoc->createElement('g:title',htmlspecialchars($this->name));
    $description = $domdoc->createElement('g:description',htmlspecialchars($this->description));
    $link = $domdoc->createElement('g:link',$this->url);
    $image = $domdoc->createElement('g:image_link',$this->image);
    $condition = $domdoc->createElement('g:condition',$this->condition);
    $availability = $domdoc->createElement('g:availability',$this->availability);
    $price =  $domdoc->createElement('g:price',$this->price." ".$this->currencyCode);
    $gtin =  $domdoc->createElement('g:gtin',$this->gtin);
    $mpn =  $domdoc->createElement('g:mpn',$this->mpn);
    
    if(isset($this->groupid)){
      $groupid =  $domdoc->createElement('g:item_group_id',$this->groupid);
      $item->appendChild($groupid);
    }
    if(count($this->variations) > 0 )
    {
      $groupid =  $domdoc->createElement('g:item_group_id',$this->sku);
      $item->appendChild($groupid);
    }

    $shippingMethod = $this->shippingMethod->createXmlelement($domdoc);

    $item->appendChild($id);
    $item->appendChild($title);
    $item->appendChild($description);
    $item->appendChild($link);
    $item->appendChild($image);
    $item->appendChild($condition);
    $item->appendChild($availability);
    $item->appendChild($price);
    $item->appendChild($gtin);
    $item->appendChild($mpn);
    $item->appendChild($shippingMethod);

    return $item;
  }

  public function addVariation(ProductInterface $product)
  {
    $product->groupid = $this->sku;
    $this->variations[] = $product; 
  }

  public function addShippingMethod(ShippingMethod $shippingMethod)
  {
   $this->shippingMethod = $shippingMethod;
  }

  public function validate()
  {
    $errors = [];
    if(!isset($this->sku))
    {
    $errors[] = "missing a sku";
    }
    if(!isset($this->name))
    {
        $errors[] = "missing a name";
    }
    if(!isset($this->description))
    {
        $errors[] = "missing a description";
    }
    if(!isset($this->url))
    {
        $errors[] = "missing a url";
    }
    if(!isset($this->image))
    {
        $errors[] = "is missing a image";
    }
    if(!isset($this->condition))
    {
        $errors[] = "is missing a condition";
    }
    if(!isset($this->availability))
    {
        $errors[] = "is missing a availability";
    }
    if(!isset($this->price))
    {
        $errors[] = "is missing a price";
    }
    if(!isset($this->gtin))
    { 
        $errors[] = "is missing a GTIN identifier";  
    }
    if(!isset($this->currencyCode))
    {
        $errors[] = "is missing a currency code";  
    }
    if(!isset($this->shippingMethod))
    {
        $errors[] = "No Shipping method has been set for this product";  
    }

    return $errors;
    
  }




}








?>