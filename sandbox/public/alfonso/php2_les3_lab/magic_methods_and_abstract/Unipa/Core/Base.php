<?php
namespace Unipa\Core;

abstract class Base implements \JsonSerializable 
{
    // generic one-size-fits-all constructor
    public function __construct(array $data) {
      $existing = get_object_vars($this);
      foreach ($existing as $key => $value) {
        if (isset($data[$key])) $this->$key = $data[$key];
      }
    }

    // Direct access to properties (dangerous)
    /*public function __set($name, $value)
    {
      if (isset($this->{$name})) 
        $this->{$name} = $value;
      else
        throw new \Exception("property not found");
    }
    */

    // Direct access to properties
    public function __get($name)
    {
      if (isset($this->{$name}))
          return $this->{$name};
      else 
          throw new \Exception("property $name not found");
    }

    // Automatic getters and setters if a property exists
    public function __call($name, $params)
    {
        if (strpos($name, 'set') === 0) {
          $key = lcfirst(substr($name, 3));
          if (isset($this->{$key})) {
              $this->{$key} = $params[0];
              return;
          }
        } elseif (strpos($name, 'get') === 0) {
          $key = lcfirst(substr($name, 3));
          if (isset($this->{$key}))
              return $this->{$key};
        }
         
        throw new \Exception("Method $name not found.");
    }

    public function __toString() {
      return $this->toJSON();
    }

    public function toJSON() {
      return json_encode($this);
    }

    // Returns protected and private properties
    public function jsonSerialize()
    {
      $out = [];
      $existing = get_object_vars($this);
      foreach ($existing as $key => $value) {
        $out[$key] = $this->{$key};
      }
      return $out;
        
    }    

}
