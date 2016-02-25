<?php
use NanoMVC\Presenter;

/**
 * Base presenter, which call on every page 
 * Good for layout data
 * 
 * @author Hadik <hadikcze@gmail.com>
 */
class BasePresenter extends Presenter {
    public function __construct() {
        parent::__construct();
        $this->template->fwName = 'NanoMVC'; // Global on all page
        $this->title = "NanoMVC sceleton";
    }
}
