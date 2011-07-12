<?php


class ComcastCustomDataElement extends SoapObject
{				
	public function getType()
	{
		return 'urn:theplatform-com:v4/base/:CustomDataElement';
	}
					
	protected function getAttributeType($attributeName)
	{
		switch($attributeName)
		{	
			case 'value':
				return 'ComcastFieldValue';
			default:
				return parent::getAttributeType($attributeName);
		}
	}
					
	public function __toString()
	{
		return print_r($this, true);	
	}
				
	/**
	 * @var string
	 **/
	public $title;
				
	/**
	 * @var ComcastFieldValue
	 **/
	public $value;
				
}


