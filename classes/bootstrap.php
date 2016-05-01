<?php 
	class Bootstrap{
		private $controller;
		private $action;
		private $request;

		public function __construct($request){
			$this->request = $request;
			if($this->request['controller'] == ""){
				$this->controller = 'home';
			}
			else{
				$this->controller = $this->request['controller'];
			}
			if($this->request['action'] == ""){
				$this->action = 'index';
			}
			else{
				$this->action = $this->request['action'];
			}
			echo $this->controller;
			echo "<br />" . $this->action;
		}

		public function createController(){
			//Check if its a class
			if(class_exists($this->controller)){
				$parents = class_parents($this->controller);
				//Check if it is extended
				if(in_array("controller", $parents)){
					if(method_exists($this->controller, $this->action)){
						return new $this->controller($this->action, $this->request);
					}
					else{
						//Method doesn't exist
						echo "<h2>Method doesn't exist </h2>";
						return;
					}
				}
				else{
					//Base controller doesn't exist
					echo "<h2> Base controller not found! </h2>";
					return;
				}
			}
			else{
				//Controller class doesn't exists
				echo "<h1> Controller class doesn't exists! </h2>";
				return; 
			}
		}
	}
 ?>
