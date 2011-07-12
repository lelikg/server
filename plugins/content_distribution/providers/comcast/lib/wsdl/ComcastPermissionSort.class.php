<?php


class ComcastPermissionSort extends SoapObject
{				
	public function getType()
	{
		return 'urn:theplatform-com:v4/admin/sort/:PermissionSort';
	}
					
	protected function getAttributeType($attributeName)
	{
		switch($attributeName)
		{	
			case 'field':
				return 'ComcastPermissionField';
			case 'tieBreaker':
				return 'ComcastPermissionSort';
			default:
				return parent::getAttributeType($attributeName);
		}
	}
					
	public function __toString()
	{
		return print_r($this, true);	
	}
				
	/**
	 * @var ComcastPermissionField
	 **/
	public $field;
				
	/**
	 * @var boolean
	 **/
	public $descending;
				
	/**
	 * @var ComcastPermissionSort
	 **/
	public $tieBreaker;
				
}


