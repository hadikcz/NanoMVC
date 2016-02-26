<?php
namespace NanoMVC;

/**
 * URL helper
 */
class URL {
    
    /**
     * URL builder for templates
     * @param string $presenter
     * @param string $template
     * @return string
     */
    public static function create($presenter, $template = "", array $params = array()){
        $url = \Configuration::$baseUrl . '/' . $presenter . '/';
        if(!empty($template) && $template != \Configuration::$templates['defaultTemplate']){
            $url .= $template . '/';
        }
        
        if(count($params) > 0){
            $counter = 0;
            foreach($params as $parameterName => $value){
                if($counter == 0){
                    $url .= '?';
                } else {
                    $url .= '&';
                }
                $url .= $parameterName . '=' . $value;                
                $counter++;
            }
        }
        return $url;
    }
}
