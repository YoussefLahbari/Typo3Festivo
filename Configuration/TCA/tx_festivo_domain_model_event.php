<?php

declare(strict_types=1);

return [
    'ctrl' => [
        'title' => 'LLL:EXT:festivo/Resources/Private/Language/locallang_db.xlf:tx_festivo_domain_model_event',
        'label' => 'title',
        'iconfile' => 'EXT:festivo/Resources/Public/Icons/Circus.ico',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'versioningWS' => true,
        'origUid' => 't3_origuid',
        'delete' => 'deleted',
        'sortby' => 'sorting',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'searchFields' => 'title,subtitle',
    ],
    'types' => [
        '1' => [
            'showitem' => 'hidden, archived, title, subtitle, event_date, location, event_price, tag, media',
        ],
    ],
    'columns' => [
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'default' => 0,
            ],
        ],
        'archived' => [
            'exclude' => false,
            'label' => 'LLL:EXT:festivo/Resources/Private/Language/locallang_db.xlf:tx_festivo_domain_model_event.archived',
            'config' => [
                'type' => 'check',
                'default' => 0,
            ],
        ],
        'title' => [
            'exclude' => false,
            'label' => 'LLL:EXT:festivo/Resources/Private/Language/locallang_db.xlf:tx_festivo_domain_model_event.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'required' => true,
            ],
        ],
        'subtitle' => [
            'exclude' => false,
            'label' => 'LLL:EXT:festivo/Resources/Private/Language/locallang_db.xlf:tx_festivo_domain_model_event.subtitle',
            'config' => [
                'type' => 'text',
            ],
        ],
        'event_date' => [
            'exclude' => false,
            'label' => 'LLL:EXT:festivo/Resources/Private/Language/locallang_db.xlf:tx_festivo_domain_model_event.event_date',
            'config' => [
                'type' => 'datetime',
                'format' => 'date',
                'dbType' => 'datetime',
            ],
        ],
        'location' => [
            'exclude' => false,
            'label' => 'LLL:EXT:festivo/Resources/Private/Language/locallang_db.xlf:tx_festivo_domain_model_event.location',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_festivo_domain_model_location',
                'foreign_table_where' => 'ORDER BY tx_festivo_domain_model_location.title ASC',
                'size' => 1,
                'minitems' => 1,
                'maxitems' => 1,
            ],
        ],
        'event_price' => [
            'exclude' => false,
            'label' => 'LLL:EXT:festivo/Resources/Private/Language/locallang_db.xlf:tx_festivo_domain_model_event.event_price',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'tag' => [
            'exclude' => false,
            'label' => 'LLL:EXT:festivo/Resources/Private/Language/locallang_db.xlf:tx_festivo_domain_model_event.tag',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_festivo_domain_model_tag',
                'MM' => 'tx_festivo_domain_model_event_tag_mm',
                'foreign_table_where' => 'ORDER BY tx_festivo_domain_model_tag.sorting ASC',
                'size' => 10,
                'autoSizeMax' => 30,
                'maxitems' => 99,
            ],
        ],
        'media' => [
            'exclude' => true,
            'label' => 'LLL:EXT:festivo/Resources/Private/Language/locallang_db.xlf:tx_festivo_domain_model_event.media',
            'config' => [
                'type' => 'file',
                'allowed' => 'common-image-types',
                'minitems' => 1,
                'maxitems' => 1,
                'appearance' => [
                    'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/Database.xlf:tt_content.asset_references.addFileReference',
                ],
                'overrideChildTca' => [
                    'types' => [
                        '0' => [
                            'showitem' => '--palette--;;filePalette',
                        ],
                        \TYPO3\CMS\Core\Resource\FileType::IMAGE->value => [
                            'showitem' => '--palette--;;filePalette',
                        ],
                    ],
                ],
            ],
        ],
    ],
];
