<?php

declare(strict_types=1);

namespace App\Festivo\Controller;

use App\Festivo\Domain\Repository\EventRepository;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

final class AjaxController extends ActionController
{
    public function __construct(
        protected readonly EventRepository $eventRepository
    ) {}

    /**
     * @param array<string, mixed> $search
     */
    public function liveSearchAction(array $search = []): ResponseInterface
    {
        $this->view->assignMultiple([
            'events' => $this->eventRepository->findBySearchCriteria($search),
            'search' => $search,
        ]);

        return $this->htmlResponse();
    }
}
