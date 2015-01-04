<?php

$bundles = include __DIR__.'/../base-bundles.php';

$appBundle = new Axstrad\Bundle\ArticleBundle\Tests\UseCases\AppBundle\AxstradArticleBundleAppBundle;
$bundles[] = new Axstrad\Bundle\ArticleBundle\Tests\UseCases\PageBundle\AxstradArticleBundlePageBundle;
$bundles[] = $appBundle;

return $bundles;
