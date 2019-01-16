<?php

namespace Unipa\Core;

class FreelanceNotFoundMethodException extends NotFoundMethodException {

    use ToStringTrait;

    // if uncommented overrides ToStringTrait
    /*public function __toString() {
        return __CLASS__ . ": I'm a FreelanceNotFoundMethodException method";
    }
    */
}

