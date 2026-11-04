<?php

declare(strict_types=1);

namespace App\Festivo\Domain\Repository;

use App\Festivo\Domain\Model\Event;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * @extends Repository<Event>
 */
class EventRepository extends Repository
{
    protected $defaultOrderings = [
        'sorting' => QueryInterface::ORDER_ASCENDING,
    ];

    /**
     * @param int[] $storagePids
     * @return QueryResultInterface<int, Event>
     */
    public function findActive(array $storagePids = []): QueryResultInterface
    {
        $query = $this->createQuery();

        if ($storagePids !== []) {
            $query->getQuerySettings()->setStoragePageIds($storagePids);
        } else {
            $query->getQuerySettings()->setRespectStoragePage(false);
        }

        return $query->execute();
    }

    /**
     * @param array<string, mixed> $search
     * @return QueryResultInterface<int, Event>
     */
    public function findBySearchCriteria(array $search = []): QueryResultInterface
    {
        $query = $this->createQuery();

        if (!empty($search['storagePid'])) {
            $storagePids = GeneralUtility::intExplode(',', (string)$search['storagePid'], true);
            $query->getQuerySettings()->setStoragePageIds($storagePids);
        } else {
            $query->getQuerySettings()->setRespectStoragePage(false);
        }

        $constraints = [];

        if (!empty($search['tag'])) {
            $constraints[] = $query->contains('tag', (int)$search['tag']);
        }

        if (!empty($search['query'])) {
            $searchTerm = '%' . trim((string)$search['query']) . '%';
            $constraints[] = $query->logicalOr(
                $query->like('title', $searchTerm),
                $query->like('subtitle', $searchTerm)
            );
        }

        if ($constraints !== []) {
            $query->matching($query->logicalAnd(...$constraints));
        }

        return $query->execute();
    }
}
