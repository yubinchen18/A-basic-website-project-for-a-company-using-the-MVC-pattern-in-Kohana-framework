<?php
class Tool
{
	
	/**
	 * Tool::truncate()
	 * trancate text
	 * 
	 * @param string $text
	 * @param int $length
	 * @param string $append
	 * @return string
	 */
	public static function truncate($text,$length = FALSE, $append = '')
	{
		
		
		
		if($length !== FALSE){
			$truncated = substr($text,0,$length);
			if(strlen($text) > strlen($truncated)){
				$truncated = $truncated.$append;
			}
		} else {
			$truncated = $text;
		}
		return $truncated;
	}
	
	
	public static function truncate_html($text, $length = FALSE , $append = ''){
		// if the plain text is shorter than the maximum length, return the whole text
		if (strlen(preg_replace('/<.*?>/', '', $text)) <= $length || $length === FALSE) {
			return $text;
		}
		
		// splits all html-tags to scanable lines
		preg_match_all('/(<.+?>)?([^<>]*)/s', $text, $lines, PREG_SET_ORDER);
		$total_length = 0;
		$open_tags = array();
		$truncate = '';

		foreach ($lines as $line_matchings) {
			// if there is any html-tag in this line, handle it and add it (uncounted) to the output
			if (!empty($line_matchings[1])) {
				// if it's an "empty element" with or without xhtml-conform closing slash
				if (preg_match('/^<(\s*.+?\/\s*|\s*(img|br|input|hr|area|base|basefont|col|frame|isindex|link|meta|param)(\s.+?)?)>$/is', $line_matchings[1])) {
					// do nothing
				// if tag is a closing tag
				} elseif (preg_match('/^<\s*\/([^\s]+?)\s*>$/s', $line_matchings[1], $tag_matchings)) {
					// delete tag from $open_tags list
					$pos = array_search($tag_matchings[1], $open_tags);
					if ($pos !== false) {
						unset($open_tags[$pos]);
					}
				// if tag is an opening tag
				} elseif (preg_match('/^<\s*([^\s>!]+).*?>$/s', $line_matchings[1], $tag_matchings)) {
					// add tag to the beginning of $open_tags list
					array_unshift($open_tags, strtolower($tag_matchings[1]));
				}
				// add html-tag to $truncate'd text
				$truncate .= $line_matchings[1];
			}
			
			// calculate the length of the plain text part of the line; handle entities as one character
			$content_length = strlen(preg_replace('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|[0-9a-f]{1,6};/i', ' ', $line_matchings[2]));


			if ($total_length+$content_length > $length) {

				// the number of characters which are left
				$left = $length - $total_length;
				$entities_length = 0;
				
				// search for html entities
				if (preg_match_all('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|[0-9a-f]{1,6};/i', $line_matchings[2], $entities, PREG_OFFSET_CAPTURE)) {
					// calculate the real length of all entities in the legal range
					foreach ($entities[0] as $entity) {
						if ($entity[1]+1-$entities_length <= $left) {
							$left--;
							$entities_length += strlen($entity[0]);
						} else {
							// no more characters left
							break;
						}
					}
				}
				$truncate .= substr($line_matchings[2], 0, $left+$entities_length);
				// maximum lenght is reached, so get off the loop
				break;
			} else {
				$truncate .= $line_matchings[2];
				$total_length += $content_length;
			}
			// if the maximum length is reached, get off the loop
			if($total_length>= $length) {
				break;
			}
		}

		// ...search the last occurance of a space...
		$spacepos = strrpos($truncate, ' ');
		if ($spacepos>-1) {
			if(strrpos(substr($truncate, $spacepos), '>') > -1){
				// there is a tag in the part about to be cut
				// cut on that tag instead
				$truncate = substr($truncate, 0, strrpos($truncate, '>') + 1);
			} else {
				// and cut the text in this position
				$truncate = substr($truncate, 0, $spacepos);
			}
		} else {
			// search for the last occurance of a tag
			$tagpos = strrpos($truncate, '>');
			if ($tagpos>-1) {
				// ...and cut the text in this position
				$truncate = substr($truncate, 0, $tagpos + 1);
			}
		}
	
		// add the defined ending to the text
		$truncate .= $append;

		// close all unclosed html-tags
		foreach ($open_tags as $tag) {
			$truncate .= '</' . $tag . '>';
		}
		
		return $truncate;
	}
	
}