<?php

namespace app\admin\controller;
use think\Controller;
use think\Db;

use app\admin\controller\Base;

class Manager extends Base {
    //管理员列表
    public function lis(){
        $data=Db::name("manager")->paginate(10);
        //分配到模板
         $this->assign("data",$data);

        return $this->fetch("list");
    }



    //添加管理列表
    public function add(){
        //判断传输方式
        if(request()->isPost()){
            $data=[
                "username"=>input("username"),
                "password"=>input("password"),
                "create_time"=>time(),
                "login_time"=>time()
            ];

            $data["password"]=md5($data["password"]);

            $validate = \think\Loader::validate('Manager');
            if(!$validate->check($data)){
                return $this->error($validate->getError());
            }
            //验正管理员是否唯一且不为空
//            $validate=new Validate([
//                "username"=>"require|max:50|min:2",
//                "password"=>"require|min:2",
//            ]);
//            if(!$validate->check($data)){
//                //dump($validate->getError());exit;
//               return $this->error($validate->getError());
//            }


            //保存数据
            $res = Db::name("manager")->insert($data);
            if ($res) {
                return $this->success("添加成功", url("Manager/lis"));
            } else {
                return $this->error("添加失败");
            }
        }
        return $this->fetch();
    }



    //修改管理员信息
    public function edit(){


        $id = input("id");
//        dump($id);exit;
        $data = Db::name("manager")->find($id);
        //dump($id);exit;
        $this->assign("data", $data);
        return $this->fetch();
    }

    //保存修改
    public function saveEdit()
    {
        $data = [
            "manager_id" => input("manager_id"),
            "username" => input("username"),
            "create_time" => time(),
        ];
        //判断是否冻结
        if (input("lock") == "0") {
            $data["lock"] = "1";
        } else {
            $data["lock"] = "0";
        }

        //dump($data);exit;
        $password=input("password");
        if($password !==""){
            $data["password"]=md5($password);

        }
        $validate = \think\Loader::validate('Manager');
        if(!$validate->check($data)){
            return $this->error($validate->getError());
        }
        //保存修改数据

        $res=Db::name("manager")->update($data);

        if($res !== false){
            return $this->success("修改成功",url("Manager/lis"));
        }else{

            return $this->error("修改失败");
        }
    }

    //删除管理员
    public function del(){
        $id=input("id");
        $res=Db::name("manager")->delete($id);
        if($res){
            return $this->success("删除成功",url("Manager/lis"));
        }else{
            return $this->error("删除失败");
        }
    }



}