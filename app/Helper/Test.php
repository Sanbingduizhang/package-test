<?php
namespace App\Helper;
/**
 * Created by PhpStorm.
 * User: a71
 * Date: 2019/6/25
 * Time: 13:18
 */
/**
 * 通过 PHP 数组模拟实现单链表
 */
class Test
{
    private $list = [];

    // 获取链表指定位置的元素值，从0开始
    public function get($index)
    {
        $value = NULL;
        while (current($this->list)) {
            if (key($this->list) == $index) {
                $value = current($this->list);
            }
            next($this->list);
        }
        reset($this->list);
        return $value;
    }

    // 在链表指定位置插入值，默认插到链表头部
    public function add($value, $index = 0)
    {
        array_splice($this->list, $index, 0, $value);
    }

    // 从链表指定位置删除元素
    public function remove($index)
    {
        array_splice($this->list, $index, 1);
    }

    public function isEmpty()
    {
        return !next($this->list);
    }

    public function size()
    {
        return count($this->list);
    }
}
