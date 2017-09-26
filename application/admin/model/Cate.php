<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/20 0020
 * Time: 19:59
 */
namespace app\admin\model;

use think\Model;

class Cate extends Model{
    //检索分类名带入主页
    static public function allCate(){
        $data= db('cate')->order('path asc')->paginate(8);
        //拿出数据,返回二位数组
        $page=$data->render();
        $data=$data->all();
        foreach ($data as $k=>$v){
            $data[$k]['name']=str_repeat('--',$v['level']).$v['name'];
        }
//        dump($data);exit;
        return [
            'data'=>$data,
            'page'=>$page
        ];
    }
    //添加顶级分类
    static public function addTopCate($data){
        if(empty($data)){
            return false;
        }
        //添加数据库  --  返回自己的主键 id
        $id=db('cate')->insertGetId($data);
        if(!$id){
            return false;
        }
        //修改path这个字段
        $arr=[
            'cate_id'=>$id,//修改条件
            'path'=>$id//顶级分类的path就是自己的主见id
        ];
        $res = db('cate')->update($arr);
        if($res!==false){
            return true;
        }else{
            return false;
        }
    }
    //添加分类 获取子分类id
    static public function getCateByid($id){
        if(!$id){
            return false;
        }
        $data=db('cate')->find($id);
//        return $data?$data:false;
        return $data??false;
    }
    //添加子分类
    static public function addCate($data){
        if(empty($data)){
            return false;
        }
        //查出父类的path和父类的level
        $parent=db('cate')->find($data['parentId']);
        if(empty($parent)){
            return false;
        }
        //定义子类的level
        $level=$parent['level']+1;
        $arr=[
            'name'=>$data['name'],
            'pid'=>$data['pid'],
            'level'=>$level
        ];
        $k=db('cate')->insertGetId($arr);
//        dump($k);exit;
        if(!$k){
            return false;
        }
        $where=[
            'path'=>$parent['path'].','.$k,//子类的path 就是父亲的path 拼上自己的主键id 中间用英文逗号隔开
            'cate_id'=>$k
        ];
//        dump($where);exit;
        //修改数据
        $res=db('cate')->update($where);
        return $res??false;
    }
    //修改类名
    static public function editCate($data){
        if(empty($data)){
            return false;
        }
        $res=db('cate')->update($data);
//        dump($res);exit;
        return $res!==false?true:false;
    }
    //删除分类名
    static public function delCate($id){
        $response=[
            'status'=>'error',
            'msg'>''
        ];
        if(!$id){
            $response['msg']='参数错误';
            return $response;
        }
        //判断有没有子分类  有子分类就不能删
        $data=db('cate')->where(['pid'=>$id])->find();
        if(!empty($data)){
            $response['msg']='该分类下有子分类，不能删除!';
            return $response;
        }

        //删除分类
        $res=db('cate')->delete($id);
        if($res){
            $response['status']= 'success';
            $response['msg']='删除成功';
        }else{
            $response['msg']='删除失败';
        }

        return $response;
    }
    //左侧添加子分类
    static public function addSecc(){

    }

}
?>