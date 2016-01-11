<?php defined('SYSPATH') or die('No direct script access.');


class Image extends Kohana_Image {
	
	const METHOD_CROP = 'crop';
	const METHOD_STRETCH = 'stretch';
	const METHOD_SCALE = 'scale';
	const METHOD_FIT = 'fit';
	
	const FILTER_OVERLAY = 'overlay';
	const FILTER_ROUND_CORNERS = 'round_corners';
	const FILTER_GRAYSCALE = 'grayscale';
	const FILTER_BLUR = 'blur';
	const FILTER_DROPSHADOW = 'dropshadow';
	const FILTER_REFLECTION = 'reflection';
	
	
	/**
	 * create an image size
	 *
	 * @param string $file 
	 * @param array $size size configpart
	 * @param string $path destination
	 */
	public function create_size($size,$destination)
	{		
		// size data to return
		$sizeData = array();
		
		// aspect ratios ofsource and destination
		$arSource = $this->height / $this->width;
		$arDestination = $size['height'] / $size['width'];
		
		// 0. check if we're enlarging
		if($size['enlarge'] == FALSE || isset($size['enlarge_max'])){
			
			if($size['enlarge'] == FALSE){
				// no enlarge allowed: multiply original by 1
				$factor = 1;
			} else {
				// enlarge allowed, but to a max: multiply original by enlarge_max
				$factor = $size['enlarge_max'];
			} 

			// check for image too small: stretch or crop
			if($size['method'] == Image::METHOD_CROP || $size['method'] == Image::METHOD_STRETCH){
				if($size['width'] > $this->width*$factor || $size['height'] > $this->height*$factor ){
					return false;
				}
			}
			
			// check for image too small: scale
			if($size['method'] == Image::METHOD_SCALE){
				if($arSource > $arDestination){
					// source image is higher than dest -> height is the determining factor
					if($size['height'] > $this->height * $factor ){
						return false;
					}
				} else {
					// source image is wider than dest -> width is the determining factor
					if($size['width'] > $this->width * $factor ){
						return false;
					}
				}
			}
		}

		
		// 1. resize the image
		switch($size['method']){
			case Image::METHOD_SCALE:
				$this->resize($size['width'],$size['height']);
				break;
			case Image::METHOD_FIT:
				$this->resize($size['width'],$size['height'],Image::INVERSE);
				break;
			case Image::METHOD_CROP:
				$this->resize($size['width'],$size['height'],Image::INVERSE);
				$this->crop($size['width'],$size['height']);
				break;
			case Image::METHOD_STRETCH:
				$this->resize($size['width'],$size['height'],Image::NONE);
				break;
			default:
				return false;
		}
		
		// 2. apply filter
		if(isset($size['filters']) && is_array($size['filters'])){
			foreach($size['filters'] as $name=>$filter){
				$method = 'filter_'.$name;
				if(method_exists($this,$method)){
					$this->$method($filter);
				}
			}
		}

		
		// 3. save the image
		$this->save($destination,isset($size['quality']) ? $size['quality'] : 100);
		FS::permissions($destination,0755);
		
		// 4. return the data
		$sizeData['width']=$this->width;
		$sizeData['height']=$this->height;
		return $sizeData;
	}
	
	
	
	
	protected function filter_grayscale($filter)
	{
		imagefilter($this->_image, IMG_FILTER_GRAYSCALE);
		
	}
	
	
	protected function filter_dropshadow($filter)
	{
		
	}
	
	protected function filter_round_corners($filter)
	{
		
	}
	
		
	protected function filter_blur($filter)
	{
		imagefilter($this->_image, IMG_FILTER_GAUSSIAN_BLUR);
	}
	
	
	

	/**
	 * Execute a resize.
	 *
	 * @param   integer  new width
	 * @param   integer  new height
	 * @return  void
	 */
	protected function _do_resize($width, $height){
	}

	/**
	 * Execute a crop.
	 *
	 * @param   integer  new width
	 * @param   integer  new height
	 * @param   integer  offset from the left
	 * @param   integer  offset from the top
	 * @return  void
	 */
	protected function _do_crop($width, $height, $offset_x, $offset_y){
	}

	/**
	 * Execute a rotation.
	 *
	 * @param   integer  degrees to rotate
	 * @return  void
	 */
	protected function _do_rotate($degrees){
	}

	/**
	 * Execute a flip.
	 *
	 * @param   integer  direction to flip
	 * @return  void
	 */
	protected function _do_flip($direction){
	}

	/**
	 * Execute a sharpen.
	 *
	 * @param   integer  amount to sharpen
	 * @return  void
	 */
	protected function _do_sharpen($amount){
	}

	/**
	 * Execute a reflection.
	 *
	 * @param   integer   reflection height
	 * @param   integer   reflection opacity
	 * @param   boolean   TRUE to fade out, FALSE to fade in
	 * @return  void
	 */
	protected function _do_reflection($height, $opacity, $fade_in){
	}

	/**
	 * Execute a watermarking.
	 *
	 * @param   object   watermarking Image
	 * @param   integer  offset from the left
	 * @param   integer  offset from the top
	 * @param   integer  opacity of watermark
	 * @return  void
	 */
	protected function _do_watermark(Image $image, $offset_x, $offset_y, $opacity){
	}

	/**
	 * Execute a background.
	 *
	 * @param   integer  red
	 * @param   integer  green
	 * @param   integer  blue
	 * @param   integer  opacity
	 * @return void
	 */
	protected function _do_background($r, $g, $b, $opacity){
	}

	/**
	 * Execute a save.
	 *
	 * @param   string   new image filename
	 * @param   integer  quality
	 * @return  boolean
	 */
	protected function _do_save($file, $quality){
	}

	/**
	 * Execute a render.
	 *
	 * @param   string    image type: png, jpg, gif, etc
	 * @param   integer   quality
	 * @return  string
	 */
	protected function _do_render($type, $quality){
	}
	
}