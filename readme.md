Job Positions Form with Dropbox style input
===========================================

**Author**: Nicolas BAUDRON

This is a simple pre-configured application using the Nette.
it's content is a job list with form for each of them. The form is completed with a Dropbox style input for files (DOC - PDF - JPG) with 5mb limitation and 5 files max.

The form is then saved into the database.

Debug enabled.

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
