<?php
namespace OrderApp\Core\Form\Inputs;
/**
 * Select Input Class
 */
class Select extends BaseInput implements InputInterface
{
    public $autofocus = false;
    public $disabled;
    public $form;
    public $multiple = false;
    public $size;
    protected $options = [];

    /**
     * @return string
     */
    public function getInput() : string
    {
        $select = "<select";
        $select .= $this->name ? " name=\"$this->name\"":null;
        $select .= $this->required ? " required":null;
        $select .= $this->multiple ? " multiple":null;
        $select .= ">";
        foreach($this->options as $option){
            $select .= $option->getOption();
        }
        $select .= "</select>";
        return $select;
    }

    /**
     * Sets up option objects
     * @param array $options
     * @return InputInterface
     */
    public function setOptions(array $options) : InputInterface
    {
        foreach($options as $key => $option){
            $opt = new Option();
            if(!is_numeric($key)){
                $opt->$key = $option;
            } else {
                $opt->key = $opt->label = $opt->value = $option;
            }
            $this->options[] = $opt;
        }
        return $this;
    }

    /**
     * @return bool
     */
    public function isAutoFocus() : bool
    {
        return $this->autofocus;
    }

    /**
     * @return boolean
     */
    public function isMultiple() : bool
    {
        return $this->multiple;
    }

    /**
     * @return boolean
     */
    public function isRequired() : bool
    {
        return $this->required;
    }

    /**
     * @return array
     */
    public function getOptions() : array
    {
        return $this->options;
    }
}
