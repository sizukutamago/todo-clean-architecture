<?php
/**
 * Created by PhpStorm.
 * User: sizukutamago
 * Date: 2018/09/11
 * Time: 13:27
 */

namespace Acme\Domain\Entities;

use Acme\Domain\ValueObjects\Content;
use Acme\Domain\ValueObjects\Todo\PeriodOfTime;

class Todo
{
    /**
     * @var Content
     */
    private $content;

    /**
     * @var PeriodOfTime
     */
    private $periodOfTime;

    /**
     * @var boolean
     */
    private $isDone;

    public function __construct(Content $content, PeriodOfTime $periodOfTime, bool $isDone = false)
    {
        $this->content = $content;
        $this->periodOfTime = $periodOfTime;
        $this->isDone = $isDone;
    }


}
