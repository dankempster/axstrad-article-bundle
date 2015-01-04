<?php
namespace Axstrad\Bundle\ArticleBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Axstrad\Bundle\ArticleBundle\Model\Article;
use Symfony\Component\HttpFoundation\Response;

/**
 * Axstrad\Bundle\ArticleBundle\Controller\DefaultController
 */
class DefaultController extends AbstractController
{
    /**
     * Lists all the articles on the page
     *
     * @param string $articleName The Article type to list
     */
    public function listAction($articleName)
    {
        return $this->renderArticles('list', $articleName, array(
            'articles' => $this->container->get('axstrad_article.provider')->findAll($articleName),
        ));
    }

    /**
     * @ParamConverter("article",
     *                 converter="axstrad_article_converter",
     *                 options={"requestParam": "slug"}
     * )
     * @param string $articleName
     * @param Article $article
     * @return Response
     * @uses renderArticles
     */
    public function showAction($articleName, Article $article)
    {
        return $this->renderArticles('show', $articleName, array('article' => $article));
    }

    /**
     * Renders the article(s) for $action in the article's custom template (if
     * it has one).
     *
     * @param string $action
     * @param string $articleName
     * @param array $parameters
     * @param Response|null $response
     * @return Response
     */
    protected function renderArticles($action, $articleName, array $parameters, Response $response = null)
    {
        return $this->render(
            $this->container->get('axstrad_article.registry')->getTemplate(
                $action,
                $articleName
            ),
            array_merge($parameters, ['articleName' => $articleName]),
            $response
        );
    }
}
