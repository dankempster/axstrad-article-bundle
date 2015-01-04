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

namespace Axstrad\Bundle\ArticleBundle\Request;

use PhpOption\Option as PhpOption;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ConfigurationInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Axstrad\Bundle\ArticleBundle\Exception\RuntimeException;
use Axstrad\Bundle\ArticleBundle\Provider\ArticleProvider;

/**
 * Axstrad\Bundle\ArticleBundle\Request\ParamConverter
 */
class ParamConverter
    implements ParamConverterInterface
{
    protected $articleProvider;

    public function __construct(ArticleProvider $articleProvider)
    {
        $this->articleProvider = $articleProvider;
    }

    /**
     *
     */
    public function apply(Request $request, ConfigurationInterface $configuration)
    {
        $options = $configuration->getOptions();

        $requestParam = isset($options['requestParam']) ? $options['requestParam'] : $configuration->getName();

        if (!$request->attributes->has($requestParam)) throw new RuntimeException(
            "Request dosn't include '{$requestParam}' attribute"
        );

        if ($request->attributes->has('articleName')) {
            $articleName = $request->attributes->get('articleName');
        }
        elseif (!empty($options['articleName'])) {
            $articleName = $options['articleName'];
        }
        else throw new RuntimeException(
            "'articleName' attribute isn't specified in the request or paramConverter options"
        );

        $requestValue = $request->attributes->get($requestParam);
        $object = $this->articleProvider->find($requestValue, $articleName);

        if (null === $object && false === $configuration->isOptional()) {
            throw new NotFoundHttpException(sprintf('Manager \'%s\' returned no object.', get_class($this->articleProvider)));
        }
        elseif ($object!==null) {
            if (method_exists($object, 'isActive') && !$object->isActive() && empty($options['allowInactive'])) {
                throw new NotFoundHttpException(sprintf('%s object is not active.', get_class($object)));
            }
        }

        $paramName = isset($options['paramName']) ? $options['paramName'] : $configuration->getName();
        $request->attributes->set($paramName, $object);
    }

    /**
     *
     */
    public function supports(ConfigurationInterface $configuration)
    {
        return true;
    }
}
