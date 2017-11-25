<?php

namespace App\Exceptions;

use Exception;

class TopicDoesNotBelongToUserException extends Exception
{
    public function render() {
    	//return ['errors' => 'Only the topic creater can delete the topic'];
    	return redirect()->route('topicexception');
    }
}
