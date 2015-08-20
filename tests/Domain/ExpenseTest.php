<?php

namespace tests\Ctraq\Domain;

use Money\Money;
use Ctraq\Domain\User;
use Ctraq\Domain\Expense;
use Ctraq\Domain\Account;

class ExpenseTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    public function itSetsId()
    {
        $expense = new Expense;
        $expense->setId(1);
        $this->assertEquals(1, $expense->getId());
    }

    /**
     * @test
     */
    public function itSetsMoney()
    {
        $expense = new Expense;
        $expense->setMoney($money = Money::USD(1000));
        $this->assertEquals($money, $expense->getMoney());
    }

    /**
     * @test
     * @dataProvider itSetsCreatedAtAsImmutableProvider
     */
    public function itSetsCreatedAtAsImmutable($date, $expectedTimestamp)
    {
        $expense = new Expense;
        $expense->setCreatedAt($date);

        $createdAt = $expense->getCreatedAt();
        $this->assertInstanceOf('DateTimeImmutable', $createdAt);
        $this->assertNotSame($date, $createdAt);
        $this->assertEquals($expectedTimestamp, $createdAt->getTimestamp());
    }

    public function itSetsCreatedAtAsImmutableProvider()
    {
        return [
            [date_create('2015-08-20 10:00'), strtotime('2015-08-20 10:00')],
            ['2015-08-20 10:00', strtotime('2015-08-20 10:00')],
            [strtotime('2015-08-20 10:00'), strtotime('2015-08-20 10:00')],
            [new \DateTimeImmutable('2015-08-20 10:00'), strtotime('2015-08-20 10:00')],
        ];
    }

    /**
     * @test
     */
    public function itSetsUser()
    {
        $expense = new Expense;
        $expense->setUser($user = new User);
        $this->assertEquals($user, $expense->getUser());
    }

    /**
     * @test
     */
    public function itSetsAccount()
    {
        $expense = new Expense;
        $expense->setAccount($account = new Account);
        $this->assertEquals($account, $expense->getAccount());
    }
}
