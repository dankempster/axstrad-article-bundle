<?php
/**
 * @var ClassLoader $loader
 */
$loader = require __DIR__.'/../vendor/autoload.php';

// - Annotations not working? Uncomment the following lines.
use Doctrine\Common\Annotations\AnnotationRegistry;
use Composer\Autoload\ClassLoader;

AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

return $loader;
