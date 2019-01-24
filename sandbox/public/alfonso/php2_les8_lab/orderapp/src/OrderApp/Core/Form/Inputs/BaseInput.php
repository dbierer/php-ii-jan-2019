<?php
namespace OrderApp\Core\Form\Inputs;
use OrderApp\Core\Html\GlobalHtmlAtt;
/**
 * Abstract BaseInput Class
 */
abstract class BaseInput extends GlobalHtmlAtt
{
    const VALIDATOR = 'OrderApp\\Core\\Validator\\';
    public $type;
    public $name;
    protected $label;
    public $value;
    public $required;
    protected $isValid = false;
    protected $validators;

    /**
     * @return (usually) an HTML string
     */
    public abstract function getInput();

    /**
     * @return mixed
     */
    public function getValidators()
    {
        return $this->validators;
    }

    /**
     * @param mixed $param
     * @return $this
     */
    public function setValidators($param)
    {
        if(is_array($param)){
            foreach($param as $key => $value){
                if(is_string($key)){
                    $class = static::VALIDATOR . ucfirst($key);
                    $validator = new $class();
                    if(is_array($value)){
                        $validator->value = $value;
                    }
                    $this->validators[] = $validator;
                } elseif (is_numeric($key)){
                    $class = static::VALIDATOR  . ucfirst($value);
                    $this->validators[] = new $class();
                }
            }
        } else {
            $class = static::VALIDATOR . ucfirst($param);
            $this->validators[] = new $class();
        }
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLabelTag()
    {
        return "<label for=\"" . strtolower($this->label) . "\">" . ucwords($this->label) . "</label>";
    }

    /**
     * @param mixed $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @return boolean
     */
    public function isValid()
    {
        return $this->isValid;
    }

    /**
     *
     */
    public function setIsValid()
    {
        $this->isValid = true;
    }
}
