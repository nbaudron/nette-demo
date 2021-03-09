<?php declare(strict_types=1);

namespace App\Presenters\Front;

use App\Model\Database\EntityManagerDecorator;
use Nette\Application\Helpers;
use Nette\Application\UI\Presenter;

/**
 * Custom Presenter
 */
abstract class BaseFrontPresenter extends Presenter
{

    protected string $templateDir = '';

    /** @inject */
    public EntityManagerDecorator $em;

    public function __construct()
    {
        parent::__construct();
    }

    public function beforeRender(): void
    {
        // Set Layout
        $this->setLayout(__DIR__ . '/Templates/Layout/layout.latte');

        // Get Template
        $this->templateDir = $this->templateDir == ''? __DIR__ . '/Templates' : $this->templateDir;
        $file = $this->templateDir . '/' . Helpers::splitName($this->getName())[1] . '/' . $this->getAction() .'.latte';
        $this->getTemplate()->setFile($file);
    }
}
