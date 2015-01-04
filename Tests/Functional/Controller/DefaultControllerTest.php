<?php

namespace Axstrad\Bundle\ArticleBundle\Tests\Functional\Controller;

use Axstrad\Bundle\UseCaseTestBundle\Test\UseCaseTestTrait;
use Liip\FunctionalTestBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    use UseCaseTestTrait;

    protected static $useCase = 'default';

    public function setUp()
    {
        $kernel = self::createClient()->getKernel();

        $this->loadFixtures(array(
            'Axstrad\Bundle\ArticleBundle\Tests\UseCases\PageBundle\DataFixtures\ORM\LoadPageData',
            // 'Axstrad\Bundle\ArticleBundle\Tests\UseCases\AppBundle\DataFixtures\ORM\LoadArticleData'
        ));
    }

    public function testKernel()
    {

    }

    /**
     * @dataProvider listUrlProvider
     */
    public function testListAction($url)
    {
        $client = static::createClient();
        $crawler = $client->request('GET', $url);
    }

    public function listUrlProvider()
    {
        return array(
            ['/default-template-article'],
        );
    }

    /**
     * @dataProvider showUrlProvider
     */
    public function testShowAction($url)
    {
        $client = static::createClient();
        $crawler = $client->request('GET', $url);
    }

    public function showUrlProvider()
    {
        return array(
            ['/default-template-article/1'],
        );
    }
}
