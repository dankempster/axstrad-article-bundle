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

use Axstrad\Bundle\ArticleBundle\Registry\ArticleDefinitionRegistry;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Tjs\Bundle\ArticleBundle\Manager\ConcreteArticleProvider
 */
class ConcreteArticleProvider implements
    ArticleProvider
{
    /**
     * @var ArticleDefinitionRegistry
     */
    protected $definitionRegistry;

    /**
     * @var ObjectManager
     */
    protected $om;

    /**
     * @param ArticleDefinitionRegistry $definitionRegistry
     * @param ObjectManager $om
     */
    public function __construct(
        ArticleDefinitionRegistry $definitionRegistry,
        ObjectManager $om
    ) {
        $this->definitionRegistry = $definitionRegistry;
        $this->om = $om;
    }

    /**
     */
    public function find($id = null)
    {
        return $this->getRepository($type)->find($id);
    }

    /**
     */
    public function findAll($type = null)
    {
        return $this->getRepository($type)->findAll();
    }

    /**
     */
    public function findSome($limit, $offset = 0, $type = null)
    {
        return $this->getRepository($type)->findBy(
            array(),
            array(),
            $limit,
            $offset
        );
    }

    /**
     */
    public function getRepository($name = null)
    {
        $entityName = $this->definitionRegistry->getEntityName($name);
        return $this->om->getRepository($name);
    }
}
