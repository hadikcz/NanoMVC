<?php

class HomepagePresenter extends BasePresenter {
    
    public function renderDefault() {
        
    }
    
    public function actionSaveUser(){
        echo 'This is action SaveUser (no rendering) - Good for save user, ajax, etc';
        $this->redirect('Homepage');
    }
    
    public function actionUrlRedir(){
        $this->redirectUrl('http://www.google.com');
    }
}
