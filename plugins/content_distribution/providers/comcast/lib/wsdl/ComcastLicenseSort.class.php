<?php


class ComcastLicenseSort extends SoapObject
{				
	public function getType()
	{
		return 'urn:theplatform-com:v4/rights/sort/:LicenseSort';
	}
					
	protected function getAttributeType($attributeName)
	{
		switch($attributeName)
		{	
			case 'field':
				return 'ComcastLicenseField';
			case 'tieBreaker':
				return 'ComcastLicenseSort';
			default:
				return parent::getAttributeType($attributeName);
		}
	}
					
	public function __toString()
	{
		return print_r($this, true);	
	}
				
	/**
	 * @var ComcastLicenseField
	 **/
	public $field;
				
	/**
	 * @var boolean
	 **/
	public $descending;
				
	/**
	 * @var ComcastLicenseSort
	 **/
	public $tieBreaker;
				
}


