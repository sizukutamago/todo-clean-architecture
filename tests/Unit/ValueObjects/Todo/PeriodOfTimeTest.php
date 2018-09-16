<?php
/**
 * Created by PhpStorm.
 * User: sizukutamago
 * Date: 2018/09/11
 * Time: 15:10
 */

namespace Tests\Unit\ValueObjects\Todo;


use Acme\Domain\ValueObjects\Todo\PeriodOfTime;
use Acme\Exceptions\DomainException;
use Tests\TestCase;

class PeriodOfTimeTest extends TestCase
{
    /** @test */
    public function 開始日より終了日が前の場合エラー()
    {
        try {
            new PeriodOfTime('2000-12-12', '1999-2-2');
        } catch (DomainException $e) {
            $this->assertTrue(true);
        }
    }

    /** @test */
    public function 開始日より終了日が後の場合正常()
    {
        try {
            new PeriodOfTime('2000-12-12', '2020-2-2');
        } catch (DomainException $e) {
            $this->assertTrue(false);
        }
        $this->assertTrue(true);
    }

    /** @test */
    public function 日付以外を入力した場合エラー()
    {
        try {
            new PeriodOfTime('fdafadie', 'fadfadf');
        } catch (DomainException $e) {
            $this->assertTrue(true);
        }
    }

    /** @test */
    public function 日付の取得()
    {
        $startDate = '2000-12-12';
        $date = new PeriodOfTime($startDate, '2020-2-2');

        $this->assertEquals($date->getStartDate(), $startDate);
    }
}
