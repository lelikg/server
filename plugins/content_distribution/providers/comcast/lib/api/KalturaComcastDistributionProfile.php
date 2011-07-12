<?php
/**
 * @package plugins.comcastDistribution
 * @subpackage api.objects
 */
class KalturaComcastDistributionProfile extends KalturaDistributionProfile
{
	/**
	 * @var string
	 */
	public $email;
	
	/**
	 * @var string
	 */
	public $password;
	
	/**
	 * @var string
	 */
	public $account;
	
	/**
	 * @var int
	 */
	public $metadataProfileId;
	
	/**
	 * @var string
	 */
	public $keywords;
	
	/**
	 * @var string
	 */
	public $category;
	
	/**
	 * @var string
	 */
	public $author;
	
	/**
	 * @var string
	 */
	public $album;
	
	/**
	 * @var string
	 */
	public $copyright;
	
	/**
	 * @var string
	 */
	public $linkHref;
	
	/**
	 * @var string
	 */
	public $linkText;
	
	/**
	 * @var string
	 */
	public $notesToComcast;
		
			
	/*
	 * mapping between the field on this object (on the left) and the setter/getter on the object (on the right)  
	 */
	private static $map_between_objects = array 
	(
		'email',
		'password',
		'account',
		'metadataProfileId',
		'keywords',
		'category',
		'author',
		'album',
		'copyright',
		'linkHref',
		'linkText',
		'notesToComcast',
	 );
		 
	public function getMapBetweenObjects()
	{
		return array_merge(parent::getMapBetweenObjects(), self::$map_between_objects);
	}
}