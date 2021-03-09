Ataccama Job Positions
=================

**Author**: Nicolas BAUDRON

Requirements
------------

Focused on:

- latest PHP 7.4 & 8.0
- `nette/*` packages
- Doctrine ORM via `nettrine/*`
- Symfony components via `contributte/*`
- codestyle checking via **CodeSniffer** and `ninjify/*`
- static analysing via **phpstan**


Installation
------------

Use command:

	composer install

Fill DB host, DB name, DB user, DB password and run commands:

    php bin/console migrations:migrate
    php bin/console doctrine:fixtures:load

Make directories `temp/`, `storage/` and `log/` writable.

That's it!
