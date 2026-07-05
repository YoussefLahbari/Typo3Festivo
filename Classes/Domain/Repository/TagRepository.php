<?php

namespace App\Festivo\Domain\Repository;


use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\Generic\QuerySettingsInterface;
use TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings;
use TYPO3\CMS\Extbase\Persistence\Repository;
use TYPO3\CMS\Core\Database\ConnectionPool;


class TagRepository extends Repository
{
    public function initializeObject(): void
    {
        /** @var QuerySettingsInterface $querySettings */
        $querySettings = GeneralUtility::makeInstance(Typo3QuerySettings::class);
        $querySettings->setRespectStoragePage(false);

        $this->setDefaultQuerySettings($querySettings);
    }

    /**
     * Find only tags that are used in at least one event
     *
     * @return array
     */
    public function findUsed()
    {
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)
            ->getQueryBuilderForTable('tx_festivo_domain_model_tag');

        $result = $queryBuilder
            ->select('tag.title', 'tag.uid')
            ->from('tx_festivo_domain_model_tag', 'tag')
            ->join(
                'tag',
                'tx_festivo_domain_model_event_tag_mm',
                'mm',
                $queryBuilder->expr()->eq('mm.uid_foreign', 'tag.uid')
            )
            ->join(
                'mm',
                'tx_festivo_domain_model_event',
                'event',
                $queryBuilder->expr()->eq('mm.uid_local', 'event.uid')
            )
            ->where(
                $queryBuilder->expr()->eq('event.deleted', 0)
)
            ->groupBy('tag.uid')
            ->orderBy('tag.sorting')
            ->executeQuery()
            ->fetchAllAssociative();

        $tags = [];
        foreach ($result as $row) {
            $tags[] = $this->findByUid($row['uid']);
        }

        return $tags;
    }
}
