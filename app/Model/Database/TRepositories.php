<?php declare(strict_types = 1);

namespace App\Model\Database;

use App\Model\Database\Entity\JobPosition;
use App\Model\Database\Entity\JobPositionSubApp;
use App\Model\Database\Repository\JobPositionRepository;
use App\Model\Database\Repository\JobPositionSubAppRepository;

/**
 * Shortcuts for type hinting
 */
trait TRepositories
{
    public function getJobPositionRepository(): JobPositionRepository
    {
        return $this->getRepository(JobPosition::class);
    }

    public function getJobPositionSubAppRepository(): JobPositionSubAppRepository
    {
        return $this->getRepository(JobPositionSubApp::class);
    }
}
