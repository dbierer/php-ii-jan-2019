<?php
$json = <<<EOT
{
    "firstName": "John",
    "lastName": "Smith",
    "isAlive": true,
    "age": 25,
    "phone": ["111-222-3333","444-555-6666"],
    "address": {
        "streetAddress": "21 2nd Street",
        "city": "New York",
        "state": "NY",
        "postalCode": "10021-3100"
    }
}
EOT;
$native = json_decode($json);
var_dump($native);
echo PHP_EOL;
echo json_encode($native, JSON_PRETTY_PRINT); 
