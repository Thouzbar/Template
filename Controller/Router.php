<?php
require_once 'controller/ControllerHome.php';
require_once 'view/View.php';

class Router {
	
	private $ctrlHome;
	
    public function __construct() {
        $this->ctrlHome = new ControllerHome();
    }
    
    public function routerRequest() {
        try {
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
						
					default:
                        throw new Exception('Page inexistante');
                        break;
                }
            }
            else {
                $this->ctrlHome->home('home');
            }
        }
        catch (Exception $e) {
            $this->error($e->getMessage());
        }
    } 
   
    private function error($msgError) {
        $view = new View("error");
        $view->generate(array('msgError' => $msgError));
    }
    
    private function alert($msg) {
        echo "<script type='text/javascript'>alert('$msg');</script>)";
    }
    
    private function getParameters($tab, $name) {
        if(isset($tab[$name])){
            return $tab[$name];
        } else {
            throw new Exception ("Paramètre '$name' absent");
        }
    } 
}
