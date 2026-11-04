<?php

declare(strict_types=1);

namespace App\Festivo\Domain\Model;

use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class Event extends AbstractEntity
{
    protected string $title = '';

    protected string $subtitle = '';

    protected ?\DateTime $eventDate = null;

    protected string $eventPrice = '';

    /**
     * @var ObjectStorage<Tag>
     */
    protected ObjectStorage $tag;

    protected ?Location $location = null;

    /**
     * @var ObjectStorage<FileReference>
     */
    protected ObjectStorage $media;

    protected bool $archived = false;

    public function __construct()
    {
        $this->initializeObject();
    }

    public function initializeObject(): void
    {
        $this->tag = new ObjectStorage();
        $this->media = new ObjectStorage();
    }

    public function isArchived(): bool
    {
        return $this->archived;
    }

    public function getArchived(): bool
    {
        return $this->archived;
    }

    public function setArchived(bool $archived): void
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

    /**
     * @return ObjectStorage<Tag>
     */
    public function getTag(): ObjectStorage
    {
        return $this->tag;
    }

    /**
     * @param ObjectStorage<Tag> $tag
     */
    public function setTag(ObjectStorage $tag): void
    {
        $this->tag = $tag;
    }

    public function getLocation(): ?Location
    {
        return $this->location;
    }

    public function setLocation(?Location $location): void
    {
        $this->location = $location;
    }

    /**
     * @return ObjectStorage<FileReference>
     */
    public function getMedia(): ObjectStorage
    {
        return $this->media;
    }

    /**
     * @param ObjectStorage<FileReference> $media
     */
    public function setMedia(ObjectStorage $media): void
    {
        $this->media = $media;
    }
}
