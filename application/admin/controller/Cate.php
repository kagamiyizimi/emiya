<?php
namespace app\admin\controller;

use think\Controller;
use app\admin\model\Cate as CateModel;

class Cate extends Base
{
    public function index()
    {
        $data=CateModel::allCate();
        $this->assign('data',$data);
        return $this->fetch('cate/list');
    }

    //加载顶级分类模版
    public function add(){
        return $this->fetch();
    }
    //添加顶级分类
    public function addTop(){
        $data=[
            'name'=>input('name'),
        ];
        $data['pid']=0;
//        $data['path']=
        $data['level']=0;
        $validate=validate('Cate');
        if(!$validate->scene('add')->check($data)){
            return $this->error($validate->getError());
        }
        $res=CateModel::addTopCate($data);
        if($res){
            return $this->success('添加成功',url('cate/index'));
        }else{
            return $this->error('添加失败');
        }
    }
    //添加子分类
    public function addChild(){
        if(request()->isPost()){
            $data=[
                'name'=>input('name'),
            ];
            $parentId=input('id');
//            dump($parentId);exit;
            $data['parentId']=$parentId;
            //子类的pid就是父类的id
            $data['pid']=$parentId;
            //pid path level
            //添加子分类到$data中
            $res=CateModel::addCate($data);
            if($res){
                return $this->success('添加成功',url('cate/index'));
            }else{
                return $this->error('添加失败');
            }
        }

        $id=input('id');
        $data=CateModel::getCateByid($id);
        $this->assign('data',$data);
        return $this->fetch();
    }
    //修改子分类
    public function edit()
    {
        $id=input('id');
        if(request()->isPost()){
            $data=[
                'cate_id'=>$id,
                'name'=>input('name')
            ];
            $validate=validate('Cate');
            //验证数据
            if(!$validate->scene('edit')->check($data)){
                return $this->error($validate->getError());
            }
            //链接数据库
            $res=CateModel::editCate($data);
            if($res){
                return $this->success('修改成功',url('cate/index'));
            }else{
                return $this->error('修改失败');
            }
        }
        $data=CateModel::getCateByid($id);
        $this->assign('data',$data);
        return $this->fetch('cate/edit');
    }
    //删除子分类
    public function del(){
        $id=input('id');
        $res=CateModel::delCate($id);
        if($res['status']=='success'){
            return $this->success($res['msg'],url('Cate/index'));
        }else{
            return $this->error($res['msg']);
        }
    }

}
