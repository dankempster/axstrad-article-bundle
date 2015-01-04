<?php

return array(
    new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
    new Symfony\Bundle\TwigBundle\TwigBundle(),

    // Doctrine bundles
    new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
    new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle(),

    // Helper bundles - help write test code quicker
    new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),

    // LiipFunctionalTestBundle
    new Liip\FunctionalTestBundle\LiipFunctionalTestBundle(),

    // Bundle being developed
    new Axstrad\Bundle\ArticleBundle\AxstradArticleBundle,
);
