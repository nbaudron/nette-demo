<?php declare(strict_types=1);

namespace App\Modules\JobPositionsModule\Front\Form;

use Nette\Application\UI\Form;
use App\Modules\JobPositionsModule;
use App\Presenters\Front\BaseFrontPresenter;
use App\Modules\JobPositionsModule\Model\ApplicationForm\ApplicationFormFactory;
use App\UI\Form\Dropzone;

/**
 * Presenter for the Job Position Form
 */
class FormPresenter extends BaseFrontPresenter
{
    protected string $templateDir ;

    /** @inject */
    public JobPositionsModule\GetModule $getJpModule;

    /** @inject */
    public ApplicationFormFactory $applicationFormFactory;

    /** @inject */
    public Dropzone\DropzoneExt $dropzone;

    private string $slug;

    public function actionDefault(string $slug): void
    {
        // Transmit Module Infos
        $this->templateDir = $this->getJpModule->frontTemplates;
        $this->slug = $slug;
    }

    protected function createComponentSubmitApplicationForm(): Form
    {
        // Form Creation with success return
        return $this->applicationFormFactory->create($this->slug, function (): void {
            $this->flashMessage('Application successfully send. Thank you!');
            $this->redirect(':Front:Homepage:');
        });
    }

    public function renderDefault(string $slug): void
    {
        //DropZone Restrictions
        $this->template->dropzoneTemplate = $this->dropzone->getDropzoneTemplate();
        $this->template->maxFiles = 5;
        $this->template->maxFilesSize = 5;
        $this->template->filesType = [
            'application/pdf',
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'image/jpeg'
        ];

        // job Position Repository
        $jobPositionRepository = $this->em->getJobPositionRepository();

        $this->template->jobPosition = $jobPositionRepository->getBySlug($slug);
    }
}
