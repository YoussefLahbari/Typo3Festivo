<?php

namespace App\Festivo\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;

class Event extends AbstractEntity
{
    /**
     * @var string
     */
    protected $title = '';
    /**
     * @var string
     */
    protected $subtitle = '';
    protected ?\DateTime $eventDate = null;
    protected $eventPrice = '';
    /**
     * @var ObjectStorage<Tag>
     */
    protected ObjectStorage $tag;
    /**
     * @var ObjectStorage<Location>
     */
    protected ObjectStorage $location;
    /**
     * @var ObjectStorage<FileReference>
     */
    protected ObjectStorage $media;
    /**
     * @var ObjectStorage<FileReference>
     */
    protected ObjectStorage $logo;
    /**
     * @var int
     */
    protected $archived = 0;

    public function __construct()
    {
        $this->tag = new ObjectStorage();
    }

    public function getArchived(): int
    {
        return $this->archived;
    }

    public function setArchived(int $archived): void
    {
        $this->archived = $archived;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }
    public function getSubtitle(): string
    {
        return $this->subtitle;
    }
    public function setSubtitle(string $subtitle): void
    {
        $this->subtitle = $subtitle;
    }
    public function getEventDate(): ?\DateTime
    {
        return $this->eventDate;
    }
    public function setEventDate(?\DateTime $eventDate): void
    {
        $this->eventDate = $eventDate;
    }
    public function getEventPrice(): string
    {
        return $this->eventPrice;
    }
    public function setEventPrice(string $eventPrice): void
    {
        $this->eventPrice = $eventPrice;
    }
    public function getTag(): ObjectStorage
    {
        return $this->tag;
    }
    public function setTag(ObjectStorage $tag): void
    {
        $this->tag = $tag;
    }
    public function getLocation(): ObjectStorage
    {
        return $this->location;
    }
    public function setLocation(ObjectStorage $location): void
    {
        $this->location = $location;
    }
    public function getMedia(): ObjectStorage
    {
        return $this->media;
    }
    public function setMedia(ObjectStorage $media): void
    {
        $this->media = $media;
    }
}
