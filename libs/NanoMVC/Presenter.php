<?php
namespace NanoMVC;

use stdClass;

/**
 * Prototype of presenter
 * @author Hadik <hadikcze@gmail.com>
 */
abstract class Presenter {
    
    const REQUEST_TYPE_RENDER = 'render';
    const REQUEST_TYPE_ACTION = 'action';
    
    
    /** SERVICES **/
    
    /** @var PDO */
    protected $pdo; 
    
    /** @var FlashMessages */
    protected $flashMessages; 
    
    /** END SEVICES **/
    
    
    
    /** @var string */
    protected $requestType;
    
    /** @var string */
    public $presenterName;    
    
    /** @var string */
    protected $targetMethod;
    
    /** @var string */
    public $templateName;
    
    /** @var stdClass */
    protected $template;
    
    /** @var string */
    protected $templatePath;
    
    
    
    
    
    /**
     * Webpage title
     * @var string
     */
    protected $title = "";


    public function __construct() {
        $this->pdo = PDOConnection::getInstance();
        $this->flashMessages = new FlashMessages();
        $this->template = new stdClass();
    }
    
    public function startup(){
        $this->detectTarget();
        $this->render();
    }
    
    /**
     * Main render method
     * @param string $template
     * @throws RenderExpection
     */
    public function render(){   
        $targetMethod = $this->targetMethod;
        $this->$targetMethod();
        
        if($this->requestType === self::REQUEST_TYPE_RENDER){
            
            $this->template->title = $this->title;
            $this->template->flashMessages = $this->flashMessages->getAll();
            $this->template->templatePath = $this->templatePath;

            $templateData = (array) $this->template;
            extract($templateData); // Prepare data fot template, array to variables by keys
            require_once APP_DIR . '/template/layout.phtml';
        }
    }
    
    public function redirect($presenter, $template = "", $params = array()){
        $url = URL::create($presenter, $template, $params);
        header('Location: ' . $url);
    }
    
    public function redirectUrl($url){
        header('Location: ' . $url);
    }
    
    private function detectTarget(){
         if(method_exists($this, 'render' . $this->templateName)){
            $this->targetMethod = 'render' . $this->templateName;
            $this->requestType = self::REQUEST_TYPE_RENDER;
        } else if(method_exists($this, 'action' . $this->templateName)){            
            $this->targetMethod = 'action' . $this->templateName;
            $this->requestType = self::REQUEST_TYPE_ACTION;
        } else {
            throw new RenderException('Render or action method ' . $this->templateName . ' not exist');  
        }
        if(!file_exists(APP_DIR . '/template/layout.phtml')){
            throw new RenderException('Layout file not found');               
        }        
        $this->templatePath = APP_DIR . 'template/' . $this->presenterName . '/'   . strtolower($this->templateName) . '.phtml';
        if(!file_exists($this->templatePath) && $this->requestType === self::REQUEST_TYPE_RENDER){
            throw new RenderException('Render ' . $this->templateName . ' file not found');               
        }
    }
}