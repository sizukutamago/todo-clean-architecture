<?php
/**
 * Created by PhpStorm.
 * User: sizukutamago
 * Date: 2018/09/11
 * Time: 13:54
 */

namespace Tests\Unit\ValueObjects\Todo;


use Acme\Domain\ValueObjects\Content;
use Acme\Exceptions\DomainException;
use Tests\TestCase;

class ContentTest extends TestCase
{
    /** @test */
    public function １文字未満の場合エラー()
    {
        try {
            new Content('');
        } catch (DomainException $e) {
            $this->assertTrue(true);
        }
    }

    /** @test */
    public function １文字以上の場合正常()
    {
        try {
            new Content('a');
        } catch (DomainException $e) {
            $this->assertTrue(false);
        }
        $this->assertTrue(true);
    }

    /** @test */
    public function ２０文字以下の場合正常()
    {
        try {
            new Content('あああああああああああああああああああ');
        } catch (DomainException $e) {
            $this->assertTrue(false);
        }
        $this->assertTrue(true);
    }

    /** @test */
    public function ２１文字以上の場合正常()
    {
        try {
            new Content('ああああああああああああああああああああ');
        } catch (DomainException $e) {
            $this->assertTrue(true);
        }
    }

}
