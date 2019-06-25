<?php

namespace App\Http\Controllers;

use App\Helper\Mqtt;
use App\Helper\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    protected $ftp;

    public function __construct()
    {
        $this->ftp = ftpClient();
    }

    public function test(Request $request)
    {
//        dd($this->ding());
        // 发送给订阅号信息,创建socket,无sam队列
        $server = "127.0.0.1";     // 服务代理地址(mqtt服务端地址)
        $port = 1883;                     // 通信端口
        $username = "";                   // 用户名(如果需要)
        $password = "";                   // 密码(如果需要
        $client_id = "clientx9293670xxctr"; // 设置你的连接客户端id
        $mqtt = new Mqtt($server, $port, $client_id); //实例化MQTT类

        if ($mqtt->connect(true, NULL, $username, $password)) {
            //如果创建链接成功
            $mqtt->publish("SN69143809293670state", '{ "msg": "Hello, World!" }', 0);
            // 发送到 xxx3809293670ctr 的主题 一个信息 内容为 setr=3xxxxxxxxx Qos 为 0
            $mqtt->close();    //发送后关闭链接
        } else {
            echo "Time out!\n";
        }

        dd(trans('messages.test'));
    }

    public function ding()
    {
        $server = "127.0.0.1";     // 服务代理地址(mqtt服务端地址)
        $port = 1883;                     // 通信端口
        $username = "";                   // 用户名(如果需要)
        $password = "";                   // 密码(如果需要
        $client_id = "clientx9293671xxctr"; // 设置你的连接客户端id

        $mqtt = new Mqtt($server, $port, $client_id);

        if(!$mqtt->connect(true, NULL, $username, $password)) { //链接不成功再重复执行监听连接
            exit(1);
        }

        $topics['SN69143809293670state'] = array("qos" => 0, "function" => "procmsg");
// 订阅主题为 SN69143809293670state qos为0
        $mqtt->subscribe($topics, 0);

        while($mqtt->proc()){

        }
//死循环监听


        $mqtt->close();

        function procmsg($topic, $msg){ //信息回调函数 打印信息
            echo "Msg Recieved: " . date("r") . "\n";
            echo "Topic: {$topic}\n\n";
            echo "\t$msg\n\n";
            $xxx = json_decode($msg);
            var_dump($xxx->aa);
            die;
        }
    }
}
