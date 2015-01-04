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

namespace Axstrad\Bundle\ArticleBundle\Tests\UseCases\PageBundle\Entity;

use Axstrad\Component\Content\Orm\Article;
use Axstrad\DoctrineExtensions\Sluggable\SluggableTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Axstrad\Bundle\ArticleBundle\Tests\UseCases\PageBundle\Entity\Page
 *
 * @author Dan Kempster <dev@dankempster.co.uk>
 * @license MIT
 * @package Axstrad/PageBundle
 * @subpackage ORM
 * @ORM\Entity
 */
class Page extends Article
{

}

