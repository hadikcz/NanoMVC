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
    public static function create($presenter, $template = ""){
        $url = \Configuration::$baseUrl . '/' . $presenter . '/';
        if(!empty($template)){
            $url .= $template . '/';
        }
        return $url;
    }
}
