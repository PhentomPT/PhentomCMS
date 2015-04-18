<?php
	class page
	{
		public $page = array();
		
		public $pageLayout = 'default';
		
		private $layout;
		
		private $content='';
		
		private $accesslevel = 0;
		
		
		public function __construct($layout, $accountLevel=0, $template=null, $accesslevel=0)
		{
			
			$this->accesslevel = $accesslevel;
			$this->layout = $layout;
			$this->layout->page = $this;
			
			$this->content = ($template!=null) ? $this->loadTemplate($template) : $this->content;
			if($accountLevel<$this->accesslevel)
			{
				$this->accessDenied();
			}
			$this->onStart();
		}
		private function loadTemplate($template)
		{
			$template = file_get_contents(ROOT.'/content/styles/'.$this->layout->theme.'/'.$template.'.html');
			if($template)
			{
				$this->content = $template;
			}
		}
		public function accessDenied()
		{
			//header('Location: ./404/');
		}
		
		public function onStart()
		{
		}
		
		public function onEnd()
		{
		}
		
		public function onPost()
		{
		}
		
		public function complete()
		{
			$this->layout->setTag('page', $this->content);
			$this->onEnd();
		}
		
	}
?>