<?php
	class layout
	{
		private $layout = '';
		public 	$theme = '';
		private $tags = array();
		public 	$page;
		
		public 	$globalSettings = array();
		
		// $layout name of the theme
		// $globalSettings should be included 
		// Using globalsettings for language is possible
		
		// Template tags/blocks syntax {% tagname %}
		
		public function __construct($layout='default', $globalSettings = array())
		{
			$this->globalSettings = $globalSettings;
			$template = file_get_contents(ROOT.'/content/styles/'.$layout.'/layout.html');
			if($template)
			{
				$this->theme = $layout;
				$this->layout = $template;
				$this->getBlocks();
			}
			else
			{
				// Do error handling sometime in the future?
				// $error->Add('Failed to load main layout');
				// $error->abort();
			}
		}
		
		// Find all the basic blocks in the template 
		private function getBlocks()
		{
			preg_match_all("#{% ([^`]*?) %}#s", $this->layout, $match);
			if($match)
			{
				foreach($match[1] as $key => $val)
				{
					$this->tags[$val] = '';
				}
			}
		}
		
		// Pages, modules and any other extension can have access to layout tags
		public function setTag($tag, $content)
		{
			if (isset($this->tags[$tag]) || array_key_exists($tag, $this->tags))
			{
				$this->tags[$tag] = $content;
			}
		}
		
		// Global information that should allways be avalible
		private function setGlobals()
		{
			foreach($this->globalSettings as $key => $val)
			{
				if (isset($this->tags[$key]) || array_key_exists($key, $this->tags))
				{
					$this->tags[$key] = $val;
				}
			}
		}
		
		private function replaceBlock()
		{
			foreach($this->tags as $key => $val)
			{
				$this->layout = preg_replace("#{% ".$key." %}#s",$val, $this->layout);
			}
			
		}
		
		//When everything is done return the layout and print it to the user
		public function printBlock()
		{
			$this->page->complete();
			$this->setGlobals();
			$this->replaceBlock();
			return $this->layout;
		}
	}
?>