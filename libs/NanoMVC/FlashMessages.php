<?php
namespace NanoMVC;

use Exception;

/**
 * Flash messages dispatcher
 * @author Hadik <hadikcze@gmail.com>
 */

class FlashMessages {
    
    private $messages = array();
    
    
    /**
     * Add message or multiple messages in array
     * @param mixed $message
     */
    public function add($message) {
        if(is_array($message)){
            $this->messages = array_merge($this->messages, $message);
        } else if(is_string($message)){
            $this->messages[] = $message;
        } else{
            throw new FlashMessagesException('Invalid flash message type');
        }
    }
    
    public function getAll(){
        return $this->messages;
    }
    
}


class FlashMessagesException extends Exception {
    
}