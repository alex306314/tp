<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller {
    public function index(){
        echo "<pre>";
        $node = M("Node");
        //$n = $node-select();
//        var_dump($node->
//        where('nid=8')
//        ->find());
        $a = C("mytest1")?10:2;
        var_dump($a);
        $this->assign('a',3);
        $this->display('test');
    }


    public function test()
    {
        var_dump($_POST);
    }
}