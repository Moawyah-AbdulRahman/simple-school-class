<?php

namespace App\Exceptions;

use DomainException;
use InvalidArgumentException;

class BusinessException extends DomainException {
    
    private int $httpResponse;

    public function __construct(string $message, int $httpResponse=400) {
        parent::__construct($message);
        
        if ( $httpResponse!=null && $httpResponse >= 400 ) {
            $this->httpResponse = $httpResponse;
        } else {
            throw new InvalidArgumentException('BusinessException must accept http response of the 400 range indicating the business logic error that is voilated.');
        }

    }
    public function getHttpResponse(): int {
        return $this->httpResponse;
    }
}