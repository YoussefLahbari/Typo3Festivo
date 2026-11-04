<?php

declare(strict_types=1);

return [
    'ctrl' => [
        'title' => 'LLL:EXT:festivo/Resources/Private/Language/locallang_db.xlf:tx_festivo_domain_model_tag',
        'label' => 'title',
        'typeicon_column' => 'title',
        'typeicon_classes' => [
            'music' => 'festivo-music',
            'food' => 'festivo-food',
            'art' => 'festivo-art',
            'default' => 'festivo-music',
        ],
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'versioningWS' => true,
        'origUid' => 't3_origuid',
        'delete' => 'deleted',
        'sortby' => 'sorting',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'searchFields' => 'title',
    ],
    'types' => [
        '1' => [
            'showitem' => 'title',
        ],
    ],
    'columns' => [
        'title' => [
            'exclude' => true,
            'label' => 'LLL:EXT:festivo/Resources/Private/Language/locallang_db.xlf:tx_festivo_domain_model_tag.title',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        'label' => 'Music',
                        'value' => 'music',
                        'icon' => 'festivo-music',
                    ],
                    [
                        'label' => 'Food',
                        'value' => 'food',
                        'icon' => 'festivo-food',
                    ],
                    [
                        'label' => 'Art',
                        'value' => 'art',
                        'icon' => 'festivo-art',
                    ],
                ],
                'fieldWizard' => [
                    'selectIcons' => [
                        'disabled' => false,
                    ],
                ],
            ],
        ],
    ],
];
