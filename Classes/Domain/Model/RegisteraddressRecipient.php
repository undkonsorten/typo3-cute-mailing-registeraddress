<?php

namespace Undkonsorten\CuteMailingRegisteraddress\Domain\Model;



use AFM\Registeraddress\Domain\Model\Address;
use Undkonsorten\CuteMailing\Domain\Model\RecipientInterface;

class RegisteraddressRecipient extends Address implements RecipientInterface
{

    public function getUid(): int
    {
        return parent::getUid();
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return parent::getEmail();
    }


    /**
     * @param string $email
     */
    public function setEmail($email): void
    {
        parent::setEmail($email);
    }


    /**
     * @return string
     */
    public function getFirstName(): string{
        return parent::getFirstName();
    }


    /**
     * @param string $firstName
     */
    public function setFirstName($firstName): void
    {
        parent::setFirstName($firstName);
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return parent::getLastName();
    }


    /**
     * @param string $lastName
     */
    public function setLastName($lastName): void
    {
        parent::setLastName($lastName);
    }


}
