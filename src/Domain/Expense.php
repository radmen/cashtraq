<?php

namespace Ctraq\Domain;

use Money\Money;

class Expense
{

    /**
     * @var string
     */
    protected $id;

    /**
     * @var \Money\Money
     */
    protected $money;

    /**
     * @var \DateTimeImmutable
     */
    protected $createdAt;

    /**
     * @var \Ctraq\Domain\User
     */
    protected $user;

    /**
     * @var \Ctraq\Domain\Account
     */
    protected $account;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return \Money\Money
     */
    public function getMoney()
    {
        return $this->money;
    }

    /**
     * @param \Money\Money $money
     */
    public function setMoney(Money $money)
    {
        $this->money = $money;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $date
     */
    public function setCreatedAt($createdAt)
    {

        if ($createdAt instanceof \DateTimeInterface) {
            $timestamp = $createdAt->getTimestamp();
        } else {
            $timestamp = is_int($createdAt) ? $createdAt : strtotime($createdAt);
        }

        $this->createdAt = (new \DateTimeImmutable)->setTimestamp($timestamp);
    }

    /**
     * @return \Ctraq\Domain\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param \Ctraq\Domain\User $user
     */
    public function setUser(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return \Ctraq\Domain\Account
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @param \Ctraq\Domain\Account $account
     */
    public function setAccount(Account $account)
    {
        $this->account = $account;
    }
}
