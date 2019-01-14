<?php

class Superclass {
    public static function getClassName() { return __CLASS__; }
    public static function getClass() {
        $output = self::getClassName();   // bound to the current class
        $output .= ' : ';
        $output .= static::getClassName(); // bound to calling class
        $output .= PHP_EOL;
        return $output;
    }
}

class Subclass extends Superclass {
    public static function getClassName() { return __CLASS__; }
}

echo Superclass::getClass();
echo Subclass::getClass();
// echos: "Superclass : Superclass \n Superclass : Subclass"
