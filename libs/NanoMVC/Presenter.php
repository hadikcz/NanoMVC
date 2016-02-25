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
    
    /** @var string */
    public $templateName;
    
    /** @var stdClass */
    protected $template;
    
    /**
     * Webpage title
     * @var string
     */
    protected $title = "";


    public function __construct() {
        $this->pdo = PDOConnection::getInstance();
        $this->template = new stdClass();
    }
    
    public function startup(){
        $this->render();
    }
    
    /**
     * Main render method
     * @param string $template
     * @throws RenderExpection
     */
    public function render(){   
        $templateCall = "render" . $this->templateName;        
        if(!method_exists($this, $templateCall)){
            throw new RenderExpection('Render method ' . $this->templateName . ' not exist');            
        }
        if(!file_exists(APP_DIR . '/template/layout.phtml')){
            throw new RenderExpection('Layout file not found');               
        }        
        $templatePath = APP_DIR . 'template/' . $this->presenterName . '/'   . strtolower($this->templateName) . '.phtml';
        if(!file_exists($templatePath)){
            throw new RenderExpection('Render ' . $this->templateName . ' file not found');               
        }
        $this->$templateCall();
        
        $this->template->title = $this->title;
        $templateData = (array) $this->template;
        extract($templateData); // Prepare data fot template, array to variables by keys
        require_once APP_DIR . '/template/layout.phtml';
    }
}