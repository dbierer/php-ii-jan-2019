<?php
/**
 * DomainService.php
 * Developer: daryl@datashuttle.net
 * Date: 8/31/18
 */
namespace OrderApp\Service;
class DomainService
{
    /**
     * Format a number as currency. Note the use of a reference.
     * @param $amount
     * @param string $currency
     */
    public function formatCurrency(&$amount, $currency = '$')
    {
        $amount = $currency . number_format($amount, 0, '.', ',');
    }
}