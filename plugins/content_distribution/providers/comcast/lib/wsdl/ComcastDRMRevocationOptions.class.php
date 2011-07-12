<?php


class ComcastDRMRevocationOptions extends SoapObject
{				
	public function getType()
	{
		return 'urn:theplatform-com:v4/rights/value/:DRMRevocationOptions';
	}
					
	protected function getAttributeType($attributeName)
	{
		switch($attributeName)
		{	
			case 'releaseIDs':
				return 'ComcastIDSet';
			case 'parentLicenseIDs':
				return 'ComcastIDSet';
			case 'endUserIDs':
				return 'ComcastIDSet';
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
	public $challenge;
				
	/**
	 * @var ComcastIDSet
	 **/
	public $releaseIDs;
				
	/**
	 * @var ComcastIDSet
	 **/
	public $parentLicenseIDs;
				
	/**
	 * @var ComcastIDSet
	 **/
	public $endUserIDs;
				
}


