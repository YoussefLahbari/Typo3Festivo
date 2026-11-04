<?php

declare(strict_types=1);

defined('TYPO3') or die();

(static function (): void {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
        'Festivo',
        'Showcase',
        'Showcase',
        'festivo_showcase',
        'Festivo',
        'Events Showcase',
        'FILE:EXT:festivo/Configuration/FlexForms/flexform_showcase.xml'
    );

    $GLOBALS['TCA']['tt_content']['types']['festivo_showcase']['showitem'] = '
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
            --palette--;;general,
            pi_flexform,
    ';
})();
