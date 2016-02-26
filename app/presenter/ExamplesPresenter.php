<?php

class ExamplesPresenter extends BasePresenter {
    
    protected function renderDefault(){
        $this->flashMessages->add('This is the first flash message');
        $this->flashMessages->add(array('These', 'lines', 'are', 'mutiple', 'added', 'FlashMessages'));
    }
    
    protected function actionRedirectWithParameters(){
        $this->redirect('Examples', 'Default', array('firstParameter' => 1, 'secondParameter' => 2, 'warnUser' => true)); 
    }
    
    protected function renderCredits(){
        
    }
}
