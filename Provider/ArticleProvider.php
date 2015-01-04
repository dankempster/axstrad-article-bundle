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

namespace Tjs\Bundle\ArticleBundle\Manager;

/**
 * Tjs\Bundle\ArticleBundle\Manager\ArticleManager
 */
interface ArticleProvider
{
    /**
     * Returns an article by ID
     *
     * @param mixed $id The article's ID
     * @param string $name The article's definition name
     * @return Axstrad\Bundle\ArticleBundle\Model\Article
     */
    public function find($id, $name = null);

    /**
     * Returns all Articles
     *
     * @return Axstrad\Bundle\ArticleBundle\Model\Article[]
     */
    public function findAll($name = null);

    /**
     * Returns a set number of Articles
     *
     * @param integer $limit Maximum number of Article to return
     * @param integer $offset Limit offset
     * @param null|string $name The article's definition name
     * @return Axstrad\Bundle\ArticleBundle\Model\Article[]
     */
    public function findSome($limit, $offset = 0, $name = null);

    /**
     * Returns the ObjectRepository for an Article
     * @return Doctrine\Common\Persistence\ObjectRepository
     */
    public function getRepository($name = null)
}
