<?
namespace RapidWeb\GoogleProductFeedXml\Interfaces;

interface ProductInterface
{
    public function createXmlelement($domdoc);
    public function validate();
}
