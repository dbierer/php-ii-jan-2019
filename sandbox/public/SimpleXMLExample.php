<?php
// A simpleXML load file example
$sxe = simplexml_load_file('newproduce.xml');

// Get the vegies
$vegies = $sxe->vegetables;

// Get the first vegie using array notation
$vegie = $vegies->vegetable[0]->name;

// Output item data
foreach ($vegies as $node) {
    echo "Content: " . $node->vegetable->name . "\n";
}

// Output XML from the SimpleXMLElement object
echo $sxe->asXML();

// Output to an xml file
$sxe->asXML('newproduce.xml');

echo PHP_EOL;
var_dump($sxe);
