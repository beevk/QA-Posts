<?php 
	abstract class Controller{
		protected $requst;
		protected $action;

		public function __construct($action, $request){
			$this->action = $action;
			$this->request = $request;
		}

		public function executeAction(){
			return $this->{$this->action}();
		}
	}
	protected function returnView($viewModel, FullView){

	}
 ?>