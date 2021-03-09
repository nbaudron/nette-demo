<?php declare(strict_types=1);

namespace App\Presenters\Front\Homepage;

use App\Modules\JobPositionsModule;
use App\Presenters\Front\BaseFrontPresenter;

/**
 * Presenter for the Homepage
 */
class HomepagePresenter extends BaseFrontPresenter
{
    /** @inject */
    public JobPositionsModule\GetModule $getJpModule;

    public function renderDefault(): void
    {
        // Get Database Job Positions
        $jobPositionRepository = $this->em->getJobPositionRepository();
        $this->template->jobPositionList = $jobPositionRepository->findBy(['is_active' => 1]);
        $this->template->jpList = $this->getJpModule->frontTemplates . '/@Layout/list.latte';
    }
}
