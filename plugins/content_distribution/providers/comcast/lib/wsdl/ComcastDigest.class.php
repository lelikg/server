<?php


class ComcastDigest extends SoapObject
{				
	public function getType()
	{
		return 'urn:theplatform-com:v4/base/:Digest';
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
				
	/**
	 * @var string
	 **/
	public $userName;
				
	/**
	 * @var string
	 **/
	public $realm;
				
	/**
	 * @var string
	 **/
	public $nonce;
				
	/**
	 * @var string
	 **/
	public $nc;
				
	/**
	 * @var string
	 **/
	public $cnonce;
				
	/**
	 * @var string
	 **/
	public $qop;
				
	/**
	 * @var string
	 **/
	public $method;
				
	/**
	 * @var string
	 **/
	public $uri;
				
	/**
	 * @var string
	 **/
	public $response;
				
	/**
	 * @var string
	 **/
	public $digestAlgorithm;
				
}


