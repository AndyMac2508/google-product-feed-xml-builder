<?
namespace RapidWeb\GoogleProductFeedXml\Objects;

use DOMDocument;

class BaseProduct
{
  public $sku;
  public $name;
  public $description;
  public $url;
  public $image;
  public $condition;
  public $availability;
  public $price;

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




}





?>