<?php defined('SYSPATH') or die('No direct script access.');

class Cache_Memcache extends Kohana_Cache_Memcache{
	
	public function get($id, $default = NULL)
	{
		// dont get values when caching is disabled
		if(Arr::get($this->_config, 'disabled', FALSE)){
			return $default;
		}
		return parent::get($id,$default);
	}
}
