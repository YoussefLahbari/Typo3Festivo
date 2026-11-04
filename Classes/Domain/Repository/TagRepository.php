<?php

declare(strict_types=1);

namespace App\Festivo\Domain\Repository;

use App\Festivo\Domain\Model\Tag;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * @extends Repository<Tag>
 */
class TagRepository extends Repository
{
    protected $defaultOrderings = [
        'sorting' => QueryInterface::ORDER_ASCENDING,
    ];

    public function __construct(
        private readonly ConnectionPool $connectionPool
    ) {
        parent::__construct();
    }

    /**
     * @return list<Tag>
     */
    public function findUsed(): array
    {
        $queryBuilder = $this->connectionPool->getQueryBuilderForTable('tx_festivo_domain_model_tag');

        $usedTagUids = $queryBuilder
            ->select('tag.uid')
            ->from('tx_festivo_domain_model_tag', 'tag')
            ->innerJoin(
                'tag',
                'tx_festivo_domain_model_event_tag_mm',
                'mm',
                $queryBuilder->expr()->eq('mm.uid_foreign', $queryBuilder->quoteIdentifier('tag.uid'))
            )
            ->innerJoin(
                'mm',
                'tx_festivo_domain_model_event',
                'event',
                $queryBuilder->expr()->eq('mm.uid_local', $queryBuilder->quoteIdentifier('event.uid'))
            )
            ->groupBy('tag.uid')
            ->executeQuery()
            ->fetchFirstColumn();

        if ($usedTagUids === []) {
            return [];
        }

        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(false);
        $query->matching($query->in('uid', array_map('intval', $usedTagUids)));

        return $query->execute()->toArray();
    }
}
