<?php
namespace OrderApp\Core\Form\Inputs;
/**
 * Select Input Class
 * Options expect a key = 'values' which is an associative array
 * where the array key == the return value
 */
class SelectAssoc extends Select
{
    const ASSOC_KEY = __CLASS__;
    /**
     * Sets up option objects
     * @param array $options
     * @return InputInterface
     */
    public function setOptions(array $options) : InputInterface
    {
        foreach($options as $key => $option){
            $opt = new Option();
            if($key === self::ASSOC_KEY){
                foreach ($option as $x => $y) {
                    $opt = new Option();
                    $opt->key = $x;
                    $opt->label = $opt->value = $y;
                    $this->options[] = $opt;
                }
            } elseif(!is_numeric($key)){
                $opt->$key = $option;
                $this->options[] = $opt;
            } else {
                $opt->label = $opt->value = $option;
                $this->options[] = $opt;
            }
        }
        return $this;
    }

}
