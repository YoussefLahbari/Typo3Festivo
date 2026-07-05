<?php

namespace App\Festivo\Controller;

use Psr\Http\Message\ResponseInterface;
use App\Festivo\Domain\Repository\EventRepository;
use App\Festivo\Domain\Repository\TagRepository;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class EventsController extends ActionController
{
    public function __construct(
        protected EventRepository $eventRepository,
        protected TagRepository $tagRepository
    ) {}

    public function listAction(): ResponseInterface
    {
        $tags = $this->tagRepository->findUsed();

        $events = $this->eventRepository->findAll();

        $this->view->assignMultiple([
            'tags' => $tags,
            'events' => $events
        ]);

        return $this->htmlResponse();
    }

}
