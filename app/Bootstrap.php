<?php

declare(strict_types=1);

namespace App;

use Nette\Configurator;

class Bootstrap
{
    public static function boot(): Configurator
    {
        $configurator = new Configurator;

        $appDir = dirname(__DIR__);
        $configurator->setTempDirectory(__DIR__ . '/../temp');

        $configurator->setDebugMode(true);
        $configurator->enableTracy($appDir . '/log');

        $configurator->setTimeZone('Europe/Prague');

        // Provide some parameters
        $configurator->addParameters([
            'rootDir' => realpath(__DIR__ . '/..'),
            'appDir' => __DIR__,
            'wwwDir' => realpath(__DIR__ . '/../www'),
        ]);

        $configurator->createRobotLoader()
            ->addDirectory(__DIR__)
            ->register();

        $configurator->addConfig(__DIR__ . '/config/common.neon');
        $configurator->addConfig(__DIR__ . '/config/config.local.neon');

        return $configurator;
    }
}
