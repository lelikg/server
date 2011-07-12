<?php


class ComcastEndUserPermissionTemplate extends SoapObject
{				
	public function getType()
	{
		return 'urn:theplatform-com:v4/rights/template/:EndUserPermissionTemplate';
	}
					
	protected function getAttributeType($attributeName)
	{
		switch($attributeName)
		{	
			case 'fields':
				return 'ComcastArrayOfEndUserPermissionField';
			case 'customFields':
				return 'ComcastArrayOfstring';
			default:
				return parent::getAttributeType($attributeName);
		}
	}
					
	public function __toString()
	{
		return print_r($this, true);	
	}
				
	/**
	 * @var ComcastArrayOfEndUserPermissionField
	 **/
	public $fields;
				
	/**
	 * @var ComcastArrayOfstring
	 **/
	public $customFields;
				
}


