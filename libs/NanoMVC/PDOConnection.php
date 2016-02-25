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
		$db = new PDO("mysql:host=".Configuration::$connection['host'].";dbname=".Configuration::$connection['database'], Configuration::$connection['username'], Configuration::$connection['password']);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$db->query('SET NAMES utf8');
		return $db;
	}
}
