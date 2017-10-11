<?
namespace RapidWeb\GoogleProductFeedXml\Objects;

use Rapidweb\GoogleProductFeedXml\Objects\BaseProduct;

class ApparelProduct extends BaseProduct
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
}


?>