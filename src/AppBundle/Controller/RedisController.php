<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class RedisController extends Controller
{

    /**
     * @Route("/redis"))
     */

    public function redisAction(Request $request)
    {
        $client = $this->get("snc_redis.default");
        $client->set("aa", "bbb");
        dump($client->get('aa'));
        return new Response("<html><body>hello world</body></html>");
    }
}
