<?php


class ComcastPriceSort extends SoapObject
{				
	public function getType()
	{
		return 'urn:theplatform-com:v4/rights/sort/:PriceSort';
	}
					
	protected function getAttributeType($attributeName)
	{
		switch($attributeName)
		{	
			case 'field':
				return 'ComcastPriceField';
			case 'tieBreaker':
				return 'ComcastPriceSort';
			default:
				return parent::getAttributeType($attributeName);
		}
	}
					
	public function __toString()
	{
		return print_r($this, true);	
	}
				
	/**
	 * @var ComcastPriceField
	 **/
	public $field;
				
	/**
	 * @var boolean
	 **/
	public $descending;
				
	/**
	 * @var ComcastPriceSort
	 **/
	public $tieBreaker;
				
}


