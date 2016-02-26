<?php
namespace NanoMVC;
use PDO, Configuration;

/**
 * Simple PDO connector
 * @author Hadik <hadikcze@gmail.com>
 */
class PDOConnection {
	
	private static $instance;
	
	private function __construct(){}
	
	public static function getInstance(){
		if(!self::$instance){
			self::$instance = self::createConnection();
		}
		return self::$instance;
	}
	
	private static function createConnection(){
        if(\Configuration::$connection['type'] == \Configuration::DATABASE_MYSQL){
            $db = new PDO("mysql:host=".Configuration::$connection['host'].";dbname=".Configuration::$connection['database'], Configuration::$connection['username'], Configuration::$connection['password']);
        } else if(\Configuration::$connection['type'] == \Configuration::DATABASE_SQLITE){
            $db = new PDO("sqlite:host=".Configuration::$connection['file'].";");
        }
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$db->query('SET NAMES utf8');
		return $db;
	}
}
