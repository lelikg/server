<?php


class ComcastBitrateMode extends SoapObject
{				
	const _CONSTANT = 'Constant';
					
	const _VARIABLEWITHMAXIMUM = 'VariableWithMaximum';
					
	const _VARIABLEWITHOUTMAXIMUM = 'VariableWithoutMaximum';
					
	public function getType()
	{
		return 'urn:theplatform-com:v4/content/enum/:BitrateMode';
	}
					
	protected function getAttributeType($attributeName)
	{
		switch($attributeName)
		{	
			default:
				return parent::getAttributeType($attributeName);
		}
	}
					
	public function __toString()
	{
		return print_r($this, true);	
	}
				
}


