<?php
namespace OrderApp\Core\Db;
use OrderApp\Core\Service\Services;
/**
 * Db Interface
 */
interface ModelInterface
{
    public function __construct(Services $services);
}
