<?php

/** @noinspection PhpUndefinedVariableInspection */
$EM_CONF[$_EXTKEY] = [
    'title' => 'Cute Mailing Registeraddress',
    'description' => 'A TYPO3 extension that connects registeraddress and cute-mailing.',
    'category' => 'plugin',
    'author' => 'undkonsorten',
    'author_email' => 'kontakt@undkonsorten.com',
    'state' => 'stable',
    'version' => '2.3.0',
    'constraints' => [
        'depends' => [
            'typo3' => '11.5.0-13.9.99',
            'cute_mailing' => '4.0.0-4.99.99',
            'registeraddress' => '2.0.0-6.99.99'
        ],
    ],
];
