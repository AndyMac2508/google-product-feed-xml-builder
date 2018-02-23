<?
namespace RapidWeb\GoogleProductFeedXml\Objects;

use RapidWeb\GoogleProductFeedXml\Objects\BaseProduct;
use RapidWeb\GoogleProductFeedXml\Interfaces\ProductInterface;

class ApparelProduct extends BaseProduct implements ProductInterface
{
    public $googleProductCategory;
    public $brand;
    public $gender;
    public $ageGroup;
    public $color;
    public $size;
  


    public function createXmlelement($domdoc)
    {
        $baseProduct = parent::createXmlelement($domdoc);
        
        $category = $domdoc->createElement('g:google_product_category',$this->googleProductCategory);
        $brand = $domdoc->createElement('g:brand',$this->brand);
        $gender = $domdoc->createElement('g:gender',$this->gender);
        $agegroup = $domdoc->createElement('g:age_group',$this->ageGroup);
        $colour = $domdoc->createElement('g:color',$this->color);
        $size = $domdoc->createElement('g:size',$this->size);

        $baseProduct->appendChild($category);
        $baseProduct->appendChild($brand);
        $baseProduct->appendChild($gender);
        $baseProduct->appendChild($agegroup);
        $baseProduct->appendChild($colour);
        $baseProduct->appendChild($size);

        return $baseProduct;

    }

    public function validate()
    {
      
      $errors = parent::validate();
      if(!isset($this->googleProductCategory))
      {
      $errors[] = "missing a category";
      }
      if(!isset($this->brand))
      {
          $errors[] = "missing a brand";
      }
      if(!isset($this->gender))
      {
          $errors[] = "missing a gender";
      }
      if(!isset($this->ageGroup))
      {
          $errors[] = "missing a ageGroup";
      }
      if(!isset($this->color))
      {
          $errors[] = "is missing a color";
      }
 

      return $errors;
      
    }


}


?>