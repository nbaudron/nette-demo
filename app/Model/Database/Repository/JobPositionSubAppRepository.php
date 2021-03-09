<?php declare(strict_types=1);

namespace App\Model\Database\Repository;

use App\Model\Database\Entity\JobPositionSubApp;
use Doctrine\ORM\EntityRepository;

/**
 * @method JobPositionSubApp|NULL find($id, ?int $lockMode = NULL, ?int $lockVersion = NULL)
 * @method JobPositionSubApp|NULL findOneBy(array $criteria, array $orderBy = NULL)
 * @method JobPositionSubApp[] findAll()
 * @method JobPositionSubApp[] findBy(array $criteria, array $orderBy = NULL, ?int $limit = NULL, ?int $offset = NULL)
 * @extends EntityRepository<JobPositionSubApp>
 */
class JobPositionSubAppRepository extends EntityRepository
{
    public function get(string $slug): JobPositionSubApp
    {
       return $this->findOneBy(['slug' => $slug]);
    }

    public function getAll(): array
    {
        return $this->findAll();
    }
}
