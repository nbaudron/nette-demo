<?php declare(strict_types=1);

namespace App\Model\Database\Entity;

use Doctrine\Common\Collections\Collection;
use Parsedown;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Table(name="job_positions")
 * @ORM\Entity(repositoryClass="App\Model\Database\Repository\JobPositionRepository")
 */
class JobPosition
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private string $title;

    /**
     * @Gedmo\Slug(fields={"title"})
     * @ORM\Column(length=128, unique=true)
     */
    private string $slug;

    /**
     * @ORM\Column(type="smallint", length=1)
     */
    private int $is_active;

    /**
     * @ORM\Column(name="content", type="text")
     */
    private string $content;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private string $location;

    /**
     * @var Collection&iterable<JobPositionSubApp>
     * @ORM\OneToMany(targetEntity="JobPositionSubApp", mappedBy="job_position_id")
     */
    private Collection $jobPositionSubApp;

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function getIsActive(): int
    {
        return $this->is_active;
    }

    public function setIsActive(int $isActive): void
    {
        $this->is_active = $isActive;
    }

    public function getContent(): string
    {
        return (new Parsedown())->parse($this->content);
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function setLocation(string $location): void
    {
        $this->location = $location;
    }

    /** @return Collection&iterable<JobPositionSubApp> */
    public function getJobPositionSubApp(): Collection
    {
        return $this->jobPositionSubApp;
    }
}
