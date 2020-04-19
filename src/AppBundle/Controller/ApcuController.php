<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class ApcuController extends Controller
{
    /**
     * @Route("/clear", name="clear_apcu")
     */
    public function clearAction()
    {
//        foreach (new \APCUIterator() as $item) {
//            dump($item['key'] . 'is going to be deleted!');
////            apcu_delete($item['key']);
//        }

        $opcacheStatus = \opcache_get_status();
//        dump($opcacheStatus);
        if (is_array($opcacheStatus['scripts'])) {
            foreach ($opcacheStatus['scripts'] as $key => $script) {
                dump($key);
                opcache_invalidate($key);
            }
        }

        return new Response("<html><body>apcu</body></html>");
    }
}
