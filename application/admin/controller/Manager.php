<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/21
 * Time: 14:34
 */
namespace app\admin\controller;

use think\Controller;
use think\Db;
class Manager extends Controller
{
    //管理员列表
    public function lis()
    {

        $data = Db::name("manager")->paginate(10);
        //分配到模板
        $this->assign("data", $data);


        return $this->fetch("list");
    }


    //添加列表
    public function add()
    {
        //判断传输方式
        if (request()->isPost()) {
            $data = [
                "username" => input("username"),
                "password" => input("password"),
                "create_time" => time(),
            ];
            $data["password"] = md5($data["password"]);
//            dump($data);exit;
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


    //修改
    public function edit()
    {

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
        //dump($data);exit;
        //判断是否冻结
        if (input("lock") == "0") {
            $data["lock"] = "1";
        } else {
            $data["lock"] = "0";
        }
        $password = input("password");
        if ($password !== "") {
            $data["password"] = md5($password);
        }

        //保存修改数据
        $res = Db::name("manager")->update($data);
        if ($res !== false) {
            return $this->success("修改成功", url("Manager/lis"));
        } else {
            return $this->error("修改失败");
        }


    }



}