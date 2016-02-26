<?php
use NanoMVC\BaseConfigurator;
/**
 * Base configuration
 * @author Hadik <hadikcze@gmail.com>
 */
class Configuration extends BaseConfigurator {
    
    public static $baseUrl = '/NanoMVC';
        
    public static $connection = array(
        'type' => self::DATABASE_MYSQL,
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