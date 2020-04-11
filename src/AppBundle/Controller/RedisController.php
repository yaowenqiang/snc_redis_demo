<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
class RedisController extends Controller
{

    /**
     * @Route("/redis"))
     */

    public function redisAction()
    {
        try {
            $client = $this->get("snc_redis.default");
            dump($client->get("aa"));
        } catch (\Throwable $exception) {
            $message = $exception->getMessage();
            $encoding = mb_detect_encoding($message, array("ASCII", 'UTF-8', "GB2312", "GBK", 'BIG5'));
            if ($encoding != 'UTF-8') {
                $message = mb_convert_encoding($message, 'UTF-8', $encoding);
            }
            dump($message);
            $this->get('logger')->error($message, (array)$exception->getConnection());

        }
        return new Response( "<html><body>hello world</body></html>");
    }



}
