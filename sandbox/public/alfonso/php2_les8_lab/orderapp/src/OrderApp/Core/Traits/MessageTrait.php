<?php
namespace OrderApp\Core\Traits;
use OrderApp\Core\Messaging\Messenger;
trait MessageTrait
{
    public function newMessage($message, $type)
    {
        return new Messenger($message, $type);
    }
}
