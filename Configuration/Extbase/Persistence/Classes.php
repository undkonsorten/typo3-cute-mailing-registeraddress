<?php
declare(strict_types = 1);


use Undkonsorten\CuteMailing\Domain\Model\RecipientList;
use Undkonsorten\CuteMailingRegisteraddress\Domain\Model\RegisteraddressRecipient;
use Undkonsorten\CuteMailingRegisteraddress\Domain\Model\RegisteraddressRecipientList;

return [

    \AFM\Registeraddress\Domain\Model\Address::class => [
        'subclasses' => [
            RegisteraddressRecipient::class => RegisteraddressRecipient::class,

        ]
    ],
    RegisteraddressRecipient::class=> [
        'tableName' => 'tt_address',
        'recordType' => RegisteraddressRecipient::class
    ],
    RegisteraddressRecipientList::class => [
        'tableName' => 'tx_cutemailing_domain_model_recipientlist',
        'recordType' => RegisteraddressRecipientList::class
    ],
    RecipientList::class => [
        'tableName' => 'tx_cutemailing_domain_model_recipientlist',
        'subclasses' => [
            RegisteraddressRecipientList::class => RegisteraddressRecipientList::class,
        ]
    ],
];
