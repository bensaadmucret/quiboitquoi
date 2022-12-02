<?php declare(strict_types=1);

namespace Ben\Quiboitquoi\exception;
use Exception;
class NoDataJson extends \Exception {

    public function __construct($message, $code = 0, Throwable $previous = null) {
        parent::__construct($message, $code, $previous);
    }

    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message} ";
    }

}