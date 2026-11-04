<?php

declare(strict_types=1);

namespace App\Festivo\Controller;

use App\Festivo\Domain\Repository\EventRepository;
use App\Festivo\Domain\Repository\TagRepository;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class EventsController extends ActionController
{
    public function __construct(
        protected readonly EventRepository $eventRepository,
        protected readonly TagRepository $tagRepository
    ) {}

    public function listAction(): ResponseInterface
    {
        $storagePids = GeneralUtility::intExplode(
            ',',
            (string)($this->settings['storagePid'] ?? ''),
            true
        );

        $this->view->assignMultiple([
            'tags' => $this->tagRepository->findUsed(),
            'events' => $this->eventRepository->findActive($storagePids),
        ]);

        return $this->htmlResponse();
    }
}
