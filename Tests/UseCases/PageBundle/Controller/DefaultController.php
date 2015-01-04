<?php

namespace Axstrad\Bundle\ArticleBundle\Tests\UseCases\PageBundle\Controller;

use Axstrad\Bundle\ArticleBundle\Tests\UseCases\PageBundle\Entity\Page;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @ParamConverter("page")
     */
    public function indexAction(Page $page)
    {
        return $this->render(
            'AxstradArticleBundlePageBundle:Default:index.html.twig',
            array(
                'page' => $page,
            )
        );
    }
}
