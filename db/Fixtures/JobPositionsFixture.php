<?php declare(strict_types = 1);

namespace Database\Fixtures;

use App\Model\Database\Entity\JobPosition;
use Nette\Utils\FileSystem;
use Nette\Utils\Json;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

/**
 * Insert Job Positions Dummy in Database
 */
class JobPositionsFixture implements FixtureInterface, OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed ObjectManager
     */
    public function load(ObjectManager $manager): void
    {
        $jsonFile = FileSystem::read(__DIR__ . '/jsonSamples/job_positions.json');

        $jobPositionsSamples =  Json::decode($jsonFile);

        foreach ($jobPositionsSamples[1]->data as $jobPositionData) {
            $jobPosition = new JobPosition();

            $jobPosition->setTitle($jobPositionData->title);
            $jobPosition->setIsActive((int) $jobPositionData->is_active);
            $jobPosition->setContent($jobPositionData->content);
            $jobPosition->setlocation($jobPositionData->location);

            $manager->persist($jobPosition);
            $manager->flush();
        }
    }

    /**
     * Get the order of this fixture
     */
    public function getOrder(): int
    {
        return 1;
    }
}
