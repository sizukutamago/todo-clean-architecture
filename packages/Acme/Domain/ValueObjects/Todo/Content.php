<?php
/**
 * Created by PhpStorm.
 * User: sizukutamago
 * Date: 2018/09/11
 * Time: 13:29
 */
namespace Acme\Domain\ValueObjects;

use Acme\Exceptions\DomainException;

final class Content
{
    const MIN_LENGTH = 1;
    const MAX_LENGTH = 20;

    /**
     * @var string
     */
    private $content;

    /**
     * Content constructor.
     * @param string $content
     * @throws DomainException
     */
    public function __construct(string $content)
    {
        $this->validate($content);
        $this->content = $content;
    }

    /**
     * @param string $content
     * @throws DomainException
     */
    private function validate(string $content): void
    {
        $length = mb_strlen($content, 'utf-8');
        if (($length >= self::MIN_LENGTH && $length >= self::MAX_LENGTH) || $content === '') {
            throw new DomainException('Todoの内容が不正です, 1文字以上20文字以内で入力してください');
        }
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }
}
