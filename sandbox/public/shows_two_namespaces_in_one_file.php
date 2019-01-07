<?php

namespace OurApp\Entity {
    class User
    {
	// some logic
    }
}

namespace OurApp\Model {
    class User
    {
	// some logic
    }
}

namespace {
use OurApp\Entity\User as UserEntity;
use OurApp\Model\User as UserModel;

$entity = new UserEntity;
$model  = new UserModel;

var_dump($entity);
var_dump($model);

}

