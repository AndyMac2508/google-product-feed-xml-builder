<?
namespace RapidWeb\GoogleProductFeedXml\Interfaces;

interface ShippingInterface
{
    public function createXmlelement($domdoc);
    public function validate();
}
