<?php declare(strict_types=1);

namespace App\Modules\JobPositionsModule\Model\ApplicationForm;

use Nette;
use Nette\Application\UI\Form;
use App\UI\Form\FormFactory;
use Storage\FilesStorage;
use App\Model\Database\Entity\JobPosition;
use App\Model\Database\Entity\JobPositionSubApp;
use App\Model\Database\EntityManagerDecorator;

/**
 * Handle Form for Job Position
 */
class ApplicationFormFactory
{
    use Nette\SmartObject;

    public FormFactory $formFactory;

    public EntityManagerDecorator $em;

    public JobPosition $jobPosition;

    public function __construct(
        FormFactory $formFactory,
        EntityManagerDecorator $em
    ) {
        $this->formFactory = $formFactory;
        $this->em = $em;
    }

    public function create(string $slug, callable $onSuccess): Form
    {
        $jobPositionRepository = $this->em->getJobPositionRepository();
        $this->jobPosition = $jobPositionRepository->findOneBy(['slug' => $slug]);

        $locationSelect = [];

        foreach (explode(',', $this->jobPosition->getLocation()) as $location) {
            $locationSelect[$location] = $location;
        }

        // Start form
        $form = $this->formFactory->create();

        $form->addGroup();
        $form->addText('firstName', 'First Name*:')
            ->setRequired('Please fill your name.');
        $form->addText('lastName', 'Last Name*:')
            ->setRequired('Please fill your last name.');
        $form->addEmail('email', 'Email*:')
            ->setRequired('Please fill your email.');
        $form->addText('phoneNumber', 'Phone Number*:')
            ->setHtmlType('tel')->setEmptyValue('+420')->setRequired('Please fill your phone number.');
         $form->addText('linkedin', 'LinkedIn:');
        $form->addTextArea('whyYou', 'Why You*:')
            ->setRequired('Please tell us more about you.');
        $form->addSelect('location', 'Location*:', $locationSelect);

        $form->addGroup();
        $form->addMultiUpload('filesDropbox', 'Files (PDF, DOC or JPEG),5 max., Max. 5MB:')
            ->addRule($form::MAX_LENGTH, 'A maximum of %d files can be uploaded', 5)
            ->addRule(
                $form::MIME_TYPE,
                "Wrong format, files must be PDF, DOC or JPEG",
                ['application/pdf',
                    'application/msword',
                    'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                    'image/jpeg'
                ]
            )
            ->addRule($form::MAX_FILE_SIZE, 'Maximum size is 5 MB', 1024 * (1024 * 5))
            ->setHtmlAttribute('id', 'dropzoneExt');

        $form->addGroup();
        $form->addSubmit('send', 'Submit Application');

        $form->onSuccess[] = [$this, 'processSubmitApplicationForm'];
        $form->onSuccess[] = $onSuccess;

        return $form;
    }

    public function processSubmitApplicationForm(Form $form): void
    {
        $values = $form->getValues();

        // Save Files and Get Names
        $filesName = [];
        foreach ($values->filesDropbox as $file) {
            FilesStorage::save($file, 'JobPosition');
            $filesName[] = $file->getSanitizedName();
        }

        // Inject Data
        $appForm = new JobPositionSubApp();

        $appForm->setJobPosition($this->jobPosition);
        $appForm->setFirstName($values->firstName);
        $appForm->setLastName($values->lastName);
        $appForm->setEmail($values->email);
        $appForm->setPhoneNumber($values->phoneNumber);
        $appForm->setlinkedin($values->linkedin);
        $appForm->setWhyYou($values->whyYou);
        $appForm->setLocation($values->location);
        $appForm->setFiles($filesName);

        // Prepare Database
        $this->em->beginTransaction();
        $this->em->persist($appForm);
        $this->em->flush();

        // Send Data to Database
        $this->em->commit();
    }
}
