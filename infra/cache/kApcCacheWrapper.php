<?php

require_once(dirname(__FILE__) . '/kBaseCacheWrapper.php');

/**
 * @package infra
 * @subpackage cache
 */
class kApcCacheWrapper extends kBaseCacheWrapper
{
	/* (non-PHPdoc)
	 * @see kBaseCacheWrapper::init()
	 */
	public function init($config)
	{
		if (!function_exists('apc_fetch'))
			return false;
		return true;
	}

	/* (non-PHPdoc)
	 * @see kBaseCacheWrapper::get()
	 */
	public function get($key)
	{
		return apc_fetch($key);
	}
		
	/* (non-PHPdoc)
	 * @see kBaseCacheWrapper::set()
	 */
	public function set($key, $var, $expiry = 0)
	{
		return apc_store($key, $var, $expiry);
	}
	
	/* (non-PHPdoc)
	 * @see kBaseCacheWrapper::add()
	 */
	public function add($key, $var, $expiry = 0)
	{
		return apc_add($key, $var, $expiry);
	}
	
	/* (non-PHPdoc)
	 * @see kBaseCacheWrapper::multiGet()
	 */
	public function multiGet($keys)
	{
		return apc_fetch($keys);
	}


	/* (non-PHPdoc)
	 * @see kBaseCacheWrapper::delete()
	 */
	public function delete($key)
	{
		return apc_delete($key);
	}
	
	/* (non-PHPdoc)
	 * @see kBaseCacheWrapper::increment()
	 */
	public function increment($key, $delta = 1)
	{
		return apc_inc($key, $delta);
	}
	
	/* (non-PHPdoc)
	 * @see kBaseCacheWrapper::decrement()
	 */
	public function decrement($key, $delta = 1)
	{
		return apc_dec($key, $delta);
	}
}
