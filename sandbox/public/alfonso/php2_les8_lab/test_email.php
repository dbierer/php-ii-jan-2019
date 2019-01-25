<?php

ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);

function match($pattern, $subject)
{
    try {

        echo $subject . ' : ';
        $match_ok = preg_match($pattern, $subject, $matches);
        if ($match_ok) {
            echo 'MATCH' . PHP_EOL;
            echo "local-part: $matches[1], hostname: $matches[2]";
            echo isset($matches[4]) ? ", first-domain: $matches[4]" . PHP_EOL : PHP_EOL;
            
        }
        else {
            echo 'NO MATCH' . PHP_EOL;
        }
        echo PHP_EOL;
        
        //var_dump($matches);
    }
    catch(Throwable $e) {
        echo 'NO MATCH';
    }
    
}

# RFC2821 and RFC2822
# https://www.jochentopf.com/email/chars.html
# local-part@domain
$emailChars= "+\.0-9A-Za-z_";
$localpart = "([$emailChars]{1,64})";
$domainChars = "0-9A-Za-z-";
$domain = "([$domainChars]+)(\.([$domainChars]+))?";
$emailPattern = "/^$localpart\@$domain$/";

$validTestEmails = [
    "simple@example.com", 
    "very.common@example.com", 
    "disposable.style.email.with+symbol@example.com", 
    "other.email-with-hyphen@example.com",
    "fully-qualified-domain@example.com",
    "user.name+tag+sorting@example.com",
    "x@example.com",
    "example-indeed@strange-example.com",
    "admin@mailserver1",
    "example@s.example",
];

$invalidTestEmails = [
    'Abc.example.com', # (no @ character)
    'A@b@c@example.com', # (only one @ is allowed outside quotation marks)
    'a"b(c)d,e:f;g<h>i[j\k]l@example.com', # (none of the special characters in this local-part are allowed outside quotation marks)
    'just"not"right@example.com', # (quoted strings must be dot separated or the only element making up the local-part)
    'this is"not\allowed@example.com', # (spaces, quotes, and backslashes may only exist when within quoted strings and preceded by a backslash)
    'this\ still\"not\\allowed@example.com', # (even if escaped (preceded by a backslash), spaces, quotes, and backslashes must still be contained by quotes)
    '1234567890123456789012345678901234567890123456789012345678901234+x@example.com', # ocal part is longer than 64 characters
];

echo '<pre>';
foreach($validTestEmails as $index => $email) {
    match($emailPattern, $email);
}

foreach($invalidTestEmails as $index => $email) {
    match($emailPattern, $email);
}

echo '</pre>';