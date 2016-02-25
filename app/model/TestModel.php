<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TestModel
 *
 * @author Hadik
 */
class TestModel {
    
    public function foo(){
        echo Configuration::$connection['host'];
    }
}
