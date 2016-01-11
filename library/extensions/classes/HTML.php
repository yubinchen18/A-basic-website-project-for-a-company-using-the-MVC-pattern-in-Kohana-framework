<?php defined('SYSPATH') or die('No direct script access.');

class HTML extends Kohana_HTML 
{
	/**
	 * Convert special characters to HTML entities. All untrusted content
	 * should be passed through this method to prevent XSS injections.
	 *
	 *     echo HTML::chars($username);
	 *
	 * @param   string  $value          string to convert
	 * @param   boolean $double_encode  encode existing entities
	 * @return  string
	 */
	public static function chars($value, $double_encode = TRUE)
	{
		return htmlspecialchars( (string) $value, ENT_QUOTES, null, $double_encode);
		//return htmlspecialchars( (string) $value, ENT_QUOTES, Kohana::$charset, $double_encode);
	}
}