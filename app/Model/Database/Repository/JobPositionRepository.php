<?php declare(strict_types=1);

namespace App\Model\Database\Repository;

use App\Model\Database\Entity\JobPosition;
use Doctrine\ORM\EntityRepository;

/**
 * @method JobPosition find($id, ?int $lockMode = NULL, ?int $lockVersion = NULL)
 * @method JobPosition findOneBy(array $criteria, array $orderBy = NULL)
 * @method JobPosition[] findAll()
 * @method JobPosition[] findBy(array $criteria, array $orderBy = NULL, ?int $limit = NULL, ?int $offset = NULL)
 * @extends EntityRepository<JobPosition>
 */
class JobPositionRepository extends EntityRepository
{
    public function getBySlug(string $slug): jobPosition
    {
        return $this->findOneBy(['slug' => $slug]);
    }

    public function getAllSlugs(): array
    {
        $rows = $this->findAll();
        $slug = [];
        foreach ($rows as $row) {
            $slug[] = $row->getSlug();
        }
        return $slug;
    }
}
