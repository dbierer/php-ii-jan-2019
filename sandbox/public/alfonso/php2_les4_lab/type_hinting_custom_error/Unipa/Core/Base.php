<?php declare(strict_types=1);
namespace Unipa\Core;

use Unipa\Core\NotFoundException;

abstract class Base implements \JsonSerializable 
{
    // generic one-size-fits-all constructor
    public function __construct(array $data) {
      $existing = get_object_vars($this);
      foreach ($existing as $key => $value) {
        if (isset($data[$key])) $this->$key = $data[$key];
      }
    }

    // Direct access to properties
    public function __get(string $name)
    {
          throw new \Exception("property $name not found");
    }

    // Automatic getters and setters if a property exists
    public function __call(string $name, array $params)
    {
        if (strpos($name, 'set') === 0) {
          $key = lcfirst(substr($name, 3));
          if (isset($this->{$key})) {
              $this->{$key} = $params[0];
              return $this;
          }
          else 
            throw new NotFoundMethodException("Method $name not found.");
        } elseif (strpos($name, 'get') === 0) {
          $key = lcfirst(substr($name, 3));
          if (isset($this->{$key}))
              return $this->{$key};
          else 
              throw new NotFoundMethodException("Method $name not found.");    
        }
         
        throw new NotFoundMethodException("Method $name not found.");
    }

    public function __toString() : string {
      return $this->toJSON();
    }

    public function toJSON() : string {
      return json_encode($this);
    }

    // Returns protected and private properties
    public function jsonSerialize() : array
    {
      $out = [];
      $existing = get_object_vars($this);
      foreach ($existing as $key => $value) {
        $out[$key] = $this->{$key};
      }
      return $out;
        
    }    

}
