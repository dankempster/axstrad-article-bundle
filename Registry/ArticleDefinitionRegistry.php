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

namespace Axstrad\Bundle\ArticleBundle\Registry;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Axstrad\Bundle\ArticleBundle\Registry\ArticleDefinitionRegistry
 */
class ArticleDefinitionRegistry
{
    /**
     * @var ArrayCollection
     */
    protected $definitions;

    /**
     * @param array $definitions
     */
    public function __construct($definitions = array())
    {
        $this->definitions = new ArrayCollection($definitions);
    }

    /**
     * Returns the complete defintition for an Article.
     *
     * @param null|string $name The name of the defintition to return
     * @return array
     */
    public function getDefinition($name = null)
    {
        if ($name === null) {
            return $this->definitions->first();
        }

        $match = $this->definitions->filter(function($defintition) use ($name) {
            return $defintition['name'] == $name;
        });

        // TODO: Verify we do have a result, throw an exception otherwise

        return $match[0];
    }

    /**
     * Returns whether a definition exists
     *
     * @param null|string $name
     * @return boolean True if the definition $name exists, false otherwise.
     */
    public function definitionExists($name = null)
    {
        return ($name === null && $this->definitions->count() > 0)
            || ($name !== null && isset($this->definitions[$name]))
    }

    /**
     * Returns the entity name of an Article defintiion.
     *
     * @param null|string $name
     * @return string
     */
    public function getEntityName($name = null)
    {
        $defintition = $this->getDefinition($name);

        return $defintition['entity_name'];
    }

    /**
     * Returns the template to use for $action with $articleName
     *
     * @param string $action Either 'list' or 'show'
     * @param null|string $name
     * @return void
     * @throws \OutOfBoundsException If $action is not a valid value
     */
    public function getTemplate($action, $name = null)
    {
        if (!in_array($action, array('list', 'show'))) {
            throw new \OutOfBoundsException(sprintf(
                "'%s' is not a valid value. Expected 'list' or 'show'.",
                $action
            ));
        }

        $defintition = $this->getDefinition($name);

        return $defintition['templates'][$action];
    }

    /**
     * Returns the list template to use for an Article.
     *
     * @param null|string $name
     * @return string
     * @uses getTemplate
     */
    public function getListTemplate($name = null)
    {
        return $this->getTemplate('list', $name);
    }

    /**
     * Returns the list template to use for an Article.
     *
     * @param null|string $name
     * @return string
     * @uses getTemplate
     */
    public function getShowTemplate($name = null)
    {
        return $this->getTemplate('show', $name);
    }
}
