<?php
/**
 * This file is part of the Axstrad library.
 *
 * (c) Dan Kempster <dev@dankempster.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright 2014-2015 Dan Kempster <dev@dankempster.co.uk>
 */

namespace Axstrad\Bundle\ArticleBundle\Tests\UseCases\AppBundle\DataFixtures\ORM;

use Axstrad\Bundle\ArticleBundle\Tests\UseCases\AppBundle\Entity\DefaultTemplateArticle;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Axstrad\Bundle\ArticleBundle\Tests\UseCases\AppBundle\DataFixtures\ORM\LoadArticleData
 *
 * @author Dan Kempster <dev@dankempster.co.uk>
 * @license MIT
 * @package Axstrad/ArticleBundle
 * @subpackage Tests
 */
class LoadArticleData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $article = new DefaultTemplateArticle();
        $article->setHeading('Service 1');
        $article->setCopy('<p>Lorem ipsum Magna dolor anim exercitation consequat dolore quis pariatur aute voluptate exercitation amet adipisicing qui et magna proident.</p>');
        $manager->persist($article);

        $manager->flush();
    }
}
