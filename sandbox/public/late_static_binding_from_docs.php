<?php
class A {
    public static function who() {
        echo __CLASS__;
    }
    public static function test() {
        self::who() . PHP_EOL . static::who();
    }
}

class B extends A {
    public static function who() {
        echo __CLASS__;
    }
}

B::test();
