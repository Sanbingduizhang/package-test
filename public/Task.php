<?php
/**
 * Created by PhpStorm.
 * User: Mloong
 * Date: 2019/7/13
 * Time: 22:39
 */

class Taskaa
{
    public function taskbb()
    {
        Swoole\Runtime::enableCoroutine();
        Swoole\Coroutine::set(['max_coroutine' => 10000,]);
        for ($i = 0; $i < 7000; $i++) {
            go(function () use ($i) {
                sleep(1);
                echo $i . '_time_' . microtime(true) . '_time1111_ ' . time() . "\n";
            });
        }
    }
}
$task = new Taskaa();
$task->taskbb();
