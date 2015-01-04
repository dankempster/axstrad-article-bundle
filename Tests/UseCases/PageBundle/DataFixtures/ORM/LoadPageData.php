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

namespace Axstrad\Bundle\ArticleBundle\Tests\UseCases\PageBundle\DataFixtures\ORM;

use Axstrad\Bundle\ArticleBundle\Tests\UseCases\PageBundle\Entity\Page;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Cmf\Bundle\SeoBundle\Model\SeoMetadata;

/**
 * Axstrad\Bundle\ArticleBundle\Tests\UseCases\PageBundle\DataFixtures\ORM\LoadPageData
 *
 * @author Dan Kempster <dev@dankempster.co.uk>
 * @license MIT
 * @package Axstrad/PageBundle
 * @subpackage Tests
 */
class LoadPageData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $aboutUs = new Page();
        $aboutUs->setHeading('About Us');
        $aboutUs->setCopy('<p>A page about us.</p>');
        $manager->persist($aboutUs);

        $manager->flush();
    }
}
