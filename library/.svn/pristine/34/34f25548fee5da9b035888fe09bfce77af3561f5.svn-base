<?php defined('SYSPATH') or die('No direct script access.');



class Valid extends Kohana_Valid {
	

	
	/**
	 * Checks whether a string or int is in a given array
	 *
	 * @param   mixed  input value
	 * @param   array  array with possible values
	 * @return  boolean
	 */
	public static function in($value, $stack = array())
	{
		return (in_array($value,$stack));
		
	}
	
	/* Checks whether a string or int is in a given value 
	 *
	 * @param   mixed  input value
	 * @param   array  array with possible values
	 * @return  boolean
	 */
	public static function is($value, $compare)
	{
		return ($value == $compare);
	}
	
	
	/* Checks whether a string or int is not in a given value
	 *
	 * @param   mixed  input value
	 * @param   array  array with possible values
	 * @return  boolean
	 */
	public static function is_not($value, $compare)
	{
		return ($value != $compare);
		
	}
}