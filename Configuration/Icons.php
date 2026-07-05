<?php

declare(strict_types=1);

use TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider;
use TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider;
return [
    'festivo-music' => [
        'provider' => BitmapIconProvider::class,
        'source' => 'EXT:festivo/Resources/Public/Icons/Tags/music.png',
    ],
    'festivo-food'=> [
        'provider' => BitmapIconProvider::class,
        'source' => 'EXT:festivo/Resources/Public/Icons/Tags/food.png',
    ],
    'festivo-art'=> [
        'provider' => BitmapIconProvider::class,
        'source' => 'EXT:festivo/Resources/Public/Icons/Tags/art.png',
    ],
]; 