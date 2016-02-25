<?php
namespace NanoMVC;

/**
 * Route to presenter
 *
 * @author Hadik <hadikcze@gmail.com>
 */
class Application {
    
    /**
     * Get route from router, and run correct presenter and template
     */
    public function run(){
        $router = new Router();
        $route = $router->getRoute();
        $presenter = new $route[0]();
        $presenter->presenterName = str_replace('Presenter', '', $route[0]);
        $presenter->templateName = ucfirst($route[1]);
        $presenter->startup();
    }
}
