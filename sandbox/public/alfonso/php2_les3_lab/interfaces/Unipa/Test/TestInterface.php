<?php 

namespace Unipa\Test;

interface TestInterface {


    /**
     * Return a variable type.
     * Is NULL allowed (? in return type)
     * 
     * @param string $variable
     * @return string type
     */
    // or public or omitted (public too) (protected and private modifiers not allowed here)
    static function getVarType($variable) : ?string;

    static function getTestReturn($variable) : ?int;
}