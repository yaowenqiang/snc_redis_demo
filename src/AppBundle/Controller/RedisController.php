<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class RedisController extends Controller
{

    /**
     * @Route("/redis"))
     */

    public function redisAction() 
    {
        $client = $this->get("snc_redis.default");
        $client->get("aa");
        echo "aaa";
        exit;
    }
}
