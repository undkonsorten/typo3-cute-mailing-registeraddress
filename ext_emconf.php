<?php

/** @noinspection PhpUndefinedVariableInspection */
$EM_CONF[$_EXTKEY] = [
    'title' => 'Cute Mailing Registeraddress',
    'description' => 'A TYPO3 extension that connects registeraddress and cute-mailing.',
    'category' => 'plugin',
    'author' => 'undkonsorten',
    'author_email' => 'kontakt@undkonsorten.com',
    'state' => 'stable',
    'internal' => '',
    'uploadfolder' => '0',
    'createDirs' => '',
    'clearCacheOnLoad' => 0,
    'version' => '2.1.0',
    'constraints' => [
        'depends' => [
            'typo3' => '11.5.0-12.9.99',
            'cute_mailing' => '3.0.0-3.99.99',
            'registeraddress' => '2.0.0-5.99.99'
        ],
    ],
];
