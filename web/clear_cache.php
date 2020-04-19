<?php
//        foreach (new \APCUIterator() as $item) {
//            dump($item['key'] . 'is going to be deleted!');
////            apcu_delete($item['key']);
//        }

$opcacheStatus = \opcache_get_status();
//        dump($opcacheStatus);
if (is_array($opcacheStatus['scripts'])) {
    foreach ($opcacheStatus['scripts'] as $key => $script) {
        var_dump($key);
        opcache_invalidate($key, true);
    }
}
