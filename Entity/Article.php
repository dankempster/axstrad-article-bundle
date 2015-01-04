<?php
/**
 * This file is part of the Axstrad Library.
 *
 * Copyright (c) 2015 Dan Kempster
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Feel free to edit as you please, and have fun.
 *
 * @author Dan Kempster <dev@dankempster.co.uk>
 */

namespace Axstrad\Bundle\ArticleBundle\Entity;

use Axstrad\Component\Content\Orm\Article as BaseArticle;
use Doctrine\ORM\Mapping as ORM;

/**
 * Axstrad\Bundle\ArticleBundle\Entity
 *
 * @ORM\MappedSuperclass
 */
abstract class Article extends BaseArticle
{

}
