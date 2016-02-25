<?php
namespace NanoMVC;

use stdClass;

/**
 * Prototype of presenter
 * @author Hadik <hadikcze@gmail.com>
 */
abstract class Presenter {
    
    /** @var PDO */
    protected $pdo;    
    
    /** @var string */
    public $presenterName;
    
    /** @var stdClass */
    protected $template;


    public function __construct() {
        $this->pdo = PDOConnection::getInstance();
        $this->template = new stdClass();
    }
    
    /**
     * Main render method
     * @param string $template
     * @throws RenderExpection
     */
    public function render($template){        
        $templateCall = "render" . $template;        
        if(!method_exists($this, $templateCall)){
            throw new RenderExpection('Render method ' . $template . ' not exist');            
        }
        if(!file_exists(APP_DIR . '/template/layout.phtml')){
            throw new RenderExpection('Layout file not found');               
        }        
        $templatePath = APP_DIR . 'template/' . $this->presenterName . '/'   . strtolower($template) . '.phtml';
        if(!file_exists($templatePath)){
            throw new RenderExpection('Render ' . $template . ' file not found');               
        }
        $this->$templateCall();
        $templateData = (array) $this->template;
        extract($templateData); // Prepare data fot template     
        require_once APP_DIR . '/template/layout.phtml';
    }
}