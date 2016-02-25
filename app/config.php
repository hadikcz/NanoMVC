<?php
/**
 * Base configuration
 * @author Hadik <hadikcze@gmail.com>
 */
class Configuration {
    
    public static $baseUrl = '/NanoMVC';
    
    public static $connection = array(
        'host' => 'localhost',
        'username' => 'root',
        'password' => '',
        'database' => 'test',
    );
    
    public static $templates = array(
        'defaultPresenter' => 'homepage',
        'defaultTemplate' => 'default',
    );
}