CubicLab! project quickstart boilerplate
========================================

A very simple quickstart template for CubicLab! project initialization.

Basically a tweaked Yii2 Advanced Template: 

- The template includes three tiers: front end, back end, and console, each of 
which is a separate Yii application.
- Configured for shared hosting environment as per [https://yii2-framework.readthedocs.io/en/stable/guide/tutorial-shared-hosting/] (Yii2 Docs).
- Pretty url enabled for frontend tier.

EXTENSIONS
==========

- Yii2 Migrate Command [https://github.com/dmstr/yii2-migrate-command] (link)
- yii2-user [https://github.com/dektrium/yii2-user] (link)

Documentation is at [docs/guide/README.md](docs/guide/README.md).

DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    widgets/             contains frontend widgets
public_html/			 contains the entry script and Web resources
	/cubic-backend		 contains the backend entry script and Web resources
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```
