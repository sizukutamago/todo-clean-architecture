<?php
/**
 * Created by PhpStorm.
 * User: sizukutamago
 * Date: 2018/09/11
 * Time: 13:34
 */
namespace Acme\Exceptions;

class DomainException extends \Exception
{
    /**
     * DomainException constructor.
     * @param string $message
     */
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}
