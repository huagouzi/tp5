<?php
namespace app\admin\controller;

use think\view;
use think\Controller;
use think\Request;
use think\Session;
class Index extends  Controller
{
    public function show()
    {
        return $this->fetch('index');
    }

    public  function login()
    {
        if (Request::instance()->isPost()){
          $name = config('setting.name');
          $pass = config('setting.pass');
          $post =  Request::instance()->post();
        if($post['name'] == $name && $post['pass'] == $pass){
            Session::set('name',$name);
            $this->success('SUCCESS', 'index/admin');
        }else{
            $this->redirect('../../show');
        }

        }else{
            $this->redirect('../../show');
        }
    }

    public  function admin()
    {

        if(Session::has('name')){
            return $this->fetch('admin');
        }else{
            $this->redirect('../../show');
        }

      //  return '123';
    }









}
