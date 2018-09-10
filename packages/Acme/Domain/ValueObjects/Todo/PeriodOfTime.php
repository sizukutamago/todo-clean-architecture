<?php
/**
 * Created by PhpStorm.
 * User: sizukutamago
 * Date: 2018/09/11
 * Time: 13:39
 */

namespace Acme\Domain\ValueObjects\Todo;


use Acme\Exceptions\DomainException;

final class PeriodOfTime
{
    /**
     * @var \DateTimeImmutable
     */
    private $startDate;

    /**
     * @var \DateTimeImmutable
     */
    private $endDate;

    /**
     * ExpirationDate constructor.
     * 日付はyyyy-mm-dd形式 年月日までで時間は入れない
     *
     * @param string $startDate
     * @param string $endDate
     * @throws DomainException
     */
    public function __construct(string $startDate, string $endDate)
    {
        $this->startDate = $this->createDate($startDate);
        $this->endDate = $this->createDate($endDate);
        $this->validate();
    }

    /**
     * @throws DomainException
     */
    private function validate()
    {
        $sub = (int)$this->startDate->diff($this->endDate)->format('%R%a');

        if ($sub < 0) {
            throw new DomainException('終了日は開始日よりも後の日付にしてください');
        }
    }

    /**
     * @param string $date
     * @return \DateTimeImmutable
     * @throws DomainException
     */
    private function createDate(string $date): \DateTimeImmutable
    {
        $date = \DateTimeImmutable::createFromFormat('Y-m-d', $date);
        if (!$date) {
            throw new DomainException('日付形式で入力してください');
        }

        return $date;
    }
}
