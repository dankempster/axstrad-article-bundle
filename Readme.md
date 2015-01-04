
# Workspace Template: Symfony 2 Bundle

## Usage

Install the template using composer

    $ composer create-project dankempster/workspace-bundle myvendor-mybundle/
    $ cd myvendor-mycomponent/

Replace distribtion files

    $ rm composer.json readme.md
    $ mv composer.json.dist composer.json
    $ touch readme.md

The template uses the example bundle name Axstrad\Bundle\ArticleBundle. Replace that with
your bundle's name by performing the following search and replace against the
project

      - acme/some-bundle - my-vendor/my-bundle
      - Acme\\\\SomeBundle\\\\ - MyVendor\\\\MyBundle\\\\
      - Acme/SomeBundle - MyVendor/MyBundle
      - AxstradArticleBundle - MyVendorMyBundle

Rename ./AxstradArticleBundle.php to ./MyVendorMyBundle.php

## CI and SaaS

This template also includes configuration files for:

 - Travis CI
 - Scrutinizr
 - Coveralls

All of which are free for Open Source projects.

__Tip__: Also check out SensionInsight - no configuration required.

### Travis CI

Travis CI is a hosted continuous integration service with Github integration.
So when the hosted repo revies pull requests or pushes, Travis CI will start
a build and run your projects tests.

### Scrutinizer

Is a code quality analysis tool, in fact it's many tools in one. Like Travis CI,
Scrutiinizer integrates with Github and so will perform an "inspection" when the
hosted repo recieves any pushes or pull requests.
This workspace doesn't include any default configuration for Scrutinizer (I like
to use global configuratoins in my account), but Travis is configured
(.travis.yml) to send code coverage reports (clover.xml) to Scrutiinizer.

### Coveralls

Coveralls is an only code coverage visualisation aid.
This repo uses the satooshi/php-coveralls as a dev-dependancy to upload cover
coverage reports to Coveralls after a Travis build.
