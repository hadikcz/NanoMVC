<?php
namespace NanoMVC;

/**
 * Router for URL requests
 * @author Hadik <hadikcze@gmail.com>
 */
class Router {
    
    public function run(){        
        $url = $this->getUrlParts();       
        if(isset($url[0]) && class_exists(ucfirst($url[0]) . 'Presenter')){
            $class = ucfirst($url[0]) . 'Presenter';
            if(isset($url[1]) && file_exists(APP_DIR . 'template/' . $url[0] . '/' . $url[1] . '.phtml')){
                $template = $url[1];
            } else {
                $template = 'default';
            }
        } else {
            $class = ucfirst(Configuration::$templates['defaultPresenter']) . 'Presenter';
            $template = Configuration::$templates['defaultTemplate'];
        }
        $presenter = new $class();
        $presenter->presenterName = str_replace('Presenter', '', $class);
        $presenter->render(ucfirst($template));
        
    }
    
    private function getUrlParts(){
        $url = array_values(array_filter(explode('/', $_SERVER['REQUEST_URI'])));
        if($url[0] == 'NanoMVC'){
            unset($url[0]);
        }
        return array_values($url);
    }
}
