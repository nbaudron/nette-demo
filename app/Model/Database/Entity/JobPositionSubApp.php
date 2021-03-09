<?php declare(strict_types=1);

namespace App\Model\Database\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Table(name="job_positions_sub_app")
 * @ORM\Entity(repositoryClass="App\Model\Database\Repository\JobPositionSubAppRepository")
 */
class JobPositionSubApp
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\ManyToOne(targetEntity="JobPosition", inversedBy="JobPositionSubApp")
     * @ORM\JoinColumn(nullable=FALSE)
     */
    private JobPosition $job_position;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private string $first_name;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private string $last_name;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private string $email;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private string $phone_number;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private string $linkedin;

    /**
     * @ORM\Column(type="text", name="why_you")
     */
    private string $why_you;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private string $location;

    /**
     * @ORM\Column(type="array", length=256)
     */
    private array $attached_files;

    /**
     * @var DateTime $created_at
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private DateTime $created_at;

    public function getId(): int
    {
        return $this->id;
    }

    public function getJobPosition(): JobPosition
    {
        return $this->job_position;
    }

    public function setJobPosition(JobPosition $job_position): void
    {
        $this->job_position = $job_position;
    }

    public function getFirstName(): string
    {
        return $this->first_name;
    }

    public function setFirstName(string $firstName): void
    {
        $this->first_name = $firstName;
    }

    public function getLastName(): string
    {
        return $this->last_name;
    }

    public function setLastName(string $lastName): void
    {
        $this->last_name = $lastName;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPhoneNumber(): string
    {
        return $this->phone_number;
    }

    public function setPhoneNumber(string $phoneNumber): void
    {
        $this->phone_number = $phoneNumber;
    }

    public function getLinkedin(): string
    {
        return $this->linkedin;
    }

    public function setlinkedin(string $linkedin): void
    {
        $this->linkedin = $linkedin;
    }

    public function getWhyYou(): string
    {
        return $this->why_you;
    }

    public function setWhyYou(string $whyYou): void
    {
        $this->why_you = $whyYou;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function setLocation(string $location): void
    {
        $this->location = $location;
    }

    public function getCreated(): DateTime
    {
        return $this->created_at;
    }

    public function setFiles(array $attachedFiles): void
    {
        $this->attached_files = $attachedFiles;
    }

    public function getFiles(): array
    {
        return $this->attached_files;
    }
}
