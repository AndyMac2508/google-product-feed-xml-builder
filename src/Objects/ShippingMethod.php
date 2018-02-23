<?
namespace RapidWeb\GoogleProductFeedXml\Objects;


use RapidWeb\GoogleProductFeedXml\Interfaces\ShippingInterface;
use DOMDocument;


class ShippingMethod implements ShippingInterface
{
  public $country;
  public $serviceType;
  public $price;

  public function createXmlelement($domdoc)
  {
    $shipping = $domdoc->createElement('g:shipping');

    $shippingCountry = $domdoc->createElement('g:country',$this->sku);
    $serviceType = $domdoc->createElement('g:service',$this->serviceType);
    $price = $domdoc->createElement('g:price',$this->price);

    $shipping->appendChild($shippingCountry);
    $shipping->appendChild($serviceType);
    $shipping->appendChild($price);

    if(empty($this->validate))
    {
        return $shipping;
    }
    else
    {
        return $this->validate;
    }

}

    public function validate()
    {
      
      $errors = parent::validate();
      if(!isset($this->country))
      {
      $errors[] = "No shipping country set";
      }
      if(!isset($this->serviceType))
      {
          $errors[] = "No shipping service type set";
      }
      if(!isset($this->price))
      {
          $errors[] = "no shipping price set";
      }


      return $errors;
      
    }
    




}








?>