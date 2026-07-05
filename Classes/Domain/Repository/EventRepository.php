<?php

namespace App\Festivo\Domain\Repository;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\Generic\QuerySettingsInterface;
use TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings;
use TYPO3\CMS\Extbase\Persistence\Repository;
use TYPO3\CMS\Core\Database\ConnectionPool;

class EventRepository extends Repository
{
    public function initializeObject(): void
    {
        $querySettings = GeneralUtility::makeInstance(Typo3QuerySettings::class);
        $querySettings->setRespectStoragePage(false);
        $this->setDefaultQuerySettings($querySettings);
        
        // Set default ordering by sorting field
        $this->setDefaultOrderings(['sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING]);
    }

    /**
     * Find events by search criteria with fallback
     *
     * @param array $search Search criteria
     * @return array|\TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     */
    public function findBySearchCriteria(array $search = [])
    {
        $query = $this->createQuery();
        $constraints = [];

        // Build constraints based on search criteria
        if (!empty($search['tag'])) {
            $tagConstraint = $query->contains('tag', $search['tag']);
            $constraints[] = $tagConstraint;
        }

        if (!empty($search['query'])) {
            $queryConstraint = $query->like('title', '%' . $search['query'] . '%');
            $constraints[] = $queryConstraint;
        }

        // If we have constraints, try AND first, then OR if no results
        if (!empty($constraints)) {
            // First try with AND logic (strict search)
            $query->matching($query->logicalAnd(...$constraints));
            $strictResults = $query->execute();

            // If no results found, try again with OR logic 
            if ($strictResults->count() === 0) {
                $query = $this->createQuery(); 
                $query->matching($query->logicalOr(...$constraints));
                return $query->execute();
            }

            return $strictResults;
        }

        // If no search criteria, return all
        return $query->execute();
    }

}
