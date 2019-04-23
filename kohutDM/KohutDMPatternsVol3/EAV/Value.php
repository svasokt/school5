<?php


namespace school5\kohutDM\KohutDMPatternsVol3\EAV;


class Value
{
    private $attribute;
    private $name;

    public function __construct(Attribute $attribute, string $name)
    {
        $this->attribute = $attribute;
        $this->name = $name;
        $this->attribute->addValue($this);
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAttributeName()
    {
        return $this->attribute->getName();
    }

    public function isValue()
    {
        return true;
    }
}