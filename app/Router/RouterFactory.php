<?php declare(strict_types=1);

namespace App\Router;

use App\Model\Database\EntityManagerDecorator;
use Nette\Application\Routers\RouteList;
use Nette\Application\UI\Presenter;

/**
 * Router Factory
 */
final class RouterFactory
{
    private EntityManagerDecorator $em;

    public function __construct(EntityManagerDecorator $em)
    {
        $this->em = $em;
    }

    public function create(): RouteList
    {
        $router = new RouteList;

        $router->add($this->createFrontRouter());

        // Admin Ready
        //$router->add($this->createAdminRouter());

        return $router;
    }

    private function createFrontRouter(): RouteList
    {
        // Set router
        $frontRouter = new RouteList;

        // Custom Router for Job Positions Based on Database
        $jobPositionRepository = $this->em->getJobPositionRepository();
        foreach ($jobPositionRepository->getAllSlugs() as $jobPositionSlug) {
            $frontRouter->withModule('Modules')
                ->withModule('JobPositions')
                ->addRoute($jobPositionSlug, [
                    Presenter::PRESENTER_KEY => 'Form',
                    Presenter::ACTION_KEY => 'default',
                    'slug' => $jobPositionSlug
                ]);
        }

        //Homepage Router
        $frontRouter->addRoute('[<presenter=Front:Homepage>][/<action=default>][/<id>]');

        return $frontRouter;
    }
}
