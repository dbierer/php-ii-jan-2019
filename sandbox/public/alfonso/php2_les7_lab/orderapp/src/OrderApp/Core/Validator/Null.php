<?php
namespace OrderApp\Core\Validator;
/**
 * Null Validator
 */
class IsNull implements ValidatorInterface
{
    /**
     * @param null $value
     * @return bool
     */
    public function validate($value = null)
    {
        if (empty($value)) return true;
        return false;
    }
}
