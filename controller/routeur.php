<?php

require_once File::build_path(array("controller", "Controller.php"));

if (isset($_GET['controller'])) {
    /*
     * On regarde si le controlleur est mentioné 
     */
    $controller = $_GET['controller'];
}
else {
    $controller = 'Controller';
}
$controller_class = ucfirst($controller);



if (class_exists($controller_class)) {
    /*
     * On controle si le controller existe
     */
    if (isset($_GET['action'])) {
        /*
         * Si il existe, on regarde si l'action demandée existe
         */
        $action = $_GET['action'];
        $tab_meth = get_class_methods($controller_class);
        if (in_array($action, $tab_meth)) {
            /*
             * Si l'action existe alors on l'effectue, sinon on est redirigé vers la page d'accueil
             */
            $controller_class::$action();
        }
        else {
			Controller::accueil();
		}
    }
    else {
        Controller::accueil();
    }
}

 