<?php

namespace App\Festivo\Controller;

use App\Festivo\Domain\Repository\EventRepository;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

final class AjaxController extends ActionController
{
    public function __construct(
        protected EventRepository $eventRepository
    ) {
    }

    public function liveSearchAction(): ResponseInterface
    {
        $searchCriteria = [];

        if ($this->request->hasArgument('search')) {
            $searchCriteria = (array)$this->request->getArgument('search');
        } else {
            $parsedBody = $this->request->getParsedBody();
            $searchCriteria = (array)($parsedBody['tx_festivo_showcase']['search'] ?? $parsedBody['search'] ?? []);
        }

        $events = $this->eventRepository->findBySearchCriteria($searchCriteria);

        $this->view->assignMultiple([
            'events' => $events,
            'search' => $searchCriteria,
        ]);

        return $this->htmlResponse();
    }
}
