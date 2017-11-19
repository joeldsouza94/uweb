<?php

namespace App\Exceptions;

use Exception;

class ContentDoesNotBelongToUserException extends Exception
{
    public function render() {
    	return ['errors' => 'Only the content creater can delete the content'];
    }
}
