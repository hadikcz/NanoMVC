<?php

class HomepagePresenter extends BasePresenter {
    
    public function renderDefault() {
        $this->template->homepage = 'This is homepage';
    }
    
    public function renderNews() {
        
    }
}
