<?php
declare(strict_types=1);



use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use Undkonsorten\CuteMailingRegisteraddress\Domain\Model\RegisteraddressRecipientList;

if (!defined('TYPO3')) {
    die('Access denied.');
}

ExtensionManagementUtility::addTcaSelectItem(
    'tx_cutemailing_domain_model_recipientlist',
    'record_type',
    [
        'LLL:EXT:cute_mailing_registeraddress/Resources/Private/Language/locallang_db.xlf:title',
        RegisteraddressRecipientList::class
    ]
);
$GLOBALS['TCA']['tx_cutemailing_domain_model_recipientlist']['types'][RegisteraddressRecipientList::class] = [
    'showitem' =>
        'sys_language_uid,l10n_parent,l10n_diffsource,hidden,--palette--;;1,name,record_type,recipient_list_page,recipient_list_type,--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access,starttime,endtime'
];
