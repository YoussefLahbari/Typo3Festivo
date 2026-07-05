<?php

declare(strict_types=1);

defined('TYPO3') or die();

(static function (): void {
     \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Festivo',
        'Showcase',
        [
            \App\Festivo\Controller\EventsController::class => 'list',
        ],
        [
            \App\Festivo\Controller\EventsController::class => 'list',
        ],
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
    );
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Festivo',
        'AjaxSearch',
        [
            \App\Festivo\Controller\AjaxController::class => 'liveSearch',
        ],
        [
            \App\Festivo\Controller\AjaxController::class => 'liveSearch',
        ],
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
    );

})();

