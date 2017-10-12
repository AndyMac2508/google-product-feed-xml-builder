<?
namespace RapidWeb\GoogleProductFeedXml\Objects;


use RapidWeb\GoogleProductFeedXml\Interfaces\ProductInterface;
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

  public function createXmlelement($domdoc)
  {
    $item = $domdoc->createElement('item');

    $id = $domdoc->createElement('g:id',$this->sku);
    $title = $domdoc->createElement('g:title',$this->name);
    $description = $domdoc->createElement('g:description',$this->description);
    $link = $domdoc->createElement('g:link',$this->url);
    $image = $domdoc->createElement('g:image_link',$this->image);
    $condition = $domdoc->createElement('g:condition',$this->condition);
    $availability = $domdoc->createElement('g:availability',$this->availability);
    $price =  $domdoc->createElement('g:price',$this->price);
    
    if(isset($this->groupid)){
      $groupid =  $domdoc->createElement('g:item_group_id',$this->groupid);
      $item->appendChild($groupid);
    }
    if(count($this->variations) > 0 )
    {
      $groupid =  $domdoc->createElement('g:item_group_id',$this->sku);
      $item->appendChild($groupid);
    }

    $item->appendChild($id);
    $item->appendChild($title);
    $item->appendChild($description);
    $item->appendChild($link);
    $item->appendChild($image);
    $item->appendChild($condition);
    $item->appendChild($availability);
    $item->appendChild($price);

    return $item;
  }

  public function addVariation(ProductInterface $product)
  {
    $product->groupid = $this->sku;
    $this->variations[] = $product; 
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

    return $errors;
    
  }




}








?>