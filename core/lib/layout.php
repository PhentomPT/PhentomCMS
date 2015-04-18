<?php
	class layout
	{
		private $layout = '';
		private $tags = array();
		public 	$page = array();
		
		public 	$globalSettings = array();
		
		public function __construct($layout='default', $globalSettings = array())
		{
			$template = file_get_contents('../../content/styles/'.$layout.'layout.html');
			if($template)
			{
				$this->layout = $template;
			}
			else
			{
				// Do error handling sometime in the future?
				// $error->Add('Failed to load main layout');
				// $error->abort();
			}
		}
		
		function getBlocks()
		{
			preg_match_all("#{% ([^`]*?) %}#s", $this->layout, $match);
			if($match)
			{
				foreach($match as $key => $val)
				{
					$this->tags[$val] = '';
				}
			}
		}
		
		function setTag($tag, $content)
		{
			if (isset($this->tags[$tag]) || array_key_exists($tag, $this->tags))
			{
				$this->tags[$tag] = $content;
			}
		}
		
		function setGlobals()
		{
			foreach($this->globalSettings as $key => $val)
			{
				if (isset($this->tags[$key]) || array_key_exists($key, $this->tags))
				{
					$this->tags[$key] = $val;
				}
			}
		}
		
		function printBlock()
		{
			return $this->layout;
		}
	}
?>