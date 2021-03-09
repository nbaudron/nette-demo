<?php

declare(strict_types=1);

namespace App\Modules\Includes\Interfaces;

/**
 * Interface aModuleInterface
 */
interface getModuleInterface
{
    /**
     * Register Module
     *
     * @return void
     */
    public function registerModule();

    /**
     * Prepare Directories
     *
     * @return void
     */
    public function prepareDir();
}
