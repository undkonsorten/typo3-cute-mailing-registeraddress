<?php

use TYPO3\CMS\Core\Imaging\IconRegistry;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

if (!defined('TYPO3')) {
    die('Access denied.');
}
call_user_func(
    function ($extKey = 'cute_mailing_registeraddress') {
        $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update']['cuteMailing_registerAddressConvertWizard']
            = \Undkonsorten\CuteMailingRegisteraddress\Updates\ConvertRecipientListToRegisterAddressUpdateWizard::class;
    }

);

