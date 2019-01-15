<?php

namespace Unipa\Core;

trait ToStringTrait {

    // custom string representation of object
    public function __toString() {
        return __CLASS__ . ": I'm a ToStringTrait method";
    }

}