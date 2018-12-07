<?php

namespace App\Http\Controllers;

use phpDocumentor\Reflection\DocBlock\Tags\Var_;
use taobao\top\TopClient;
use taobao\top\request\TbkShopGetRequest;
use taobao\top\request\TbkItemGetRequest;
use taobao\top\request\TbkItemInfoGetRequest;
use taobao\top\domain\OpenAccountSearchRequest;
use Monolog\Logger;
use taobao\top\request\TbkDgItemCouponGetRequest;
use taobao\top\request\TbkCouponGetRequest;

class IndexController extends BaseController
{
    public $AppKey;
    public $AppSecret;

    public function __construct()
    {
        $this->AppKey = config('happy.AppKey');
        $this->AppSecret = config('happy.AppSecret');
    }

    /**
     * 主页
     */
    public function index()
    {
        $c= TopClient::getInstance($this->AppKey,$this->AppSecret);
        $req = TbkItemGetRequest::getInstance();
        $req->setFields("num_iid,title,pict_url,small_images,reserve_price,zk_final_price,user_type,provcity,item_url,seller_id,volume,nick");
        $req->setQ("荣耀10手机");
        $data = $c->execute($req);
//
//        echo '<pre>';var_dump($data->results);exit;

        return view('happy.index.index',['data'=>$data]);
    }

    /**
     * 签到
     */
    public function signature()
    {
        return view('happy.index.index');
    }

    /**
     * 主页
     */
    public function index1()
    {



        $c= new TopClient($this->AppKey,$this->AppSecret);
//        $req = new TbkItemGetRequest;
//        $req->setFields("num_iid,title,pict_url,small_images,reserve_price,zk_final_price,user_type,
//        $resp = $c->execute($req);provcity,item_url,seller_id,volume,nick");
//        $req->setQ("荣耀10手机");
//        $resp = $c->execute($req);

        $req = new TbkCouponGetRequest;
//        $req = new TbkDgItemCouponGetRequest;
//        $req->setAdzoneId("123");

//        $c= new TopClient($this->AppKey,$this->AppSecret);
//        $req = new TbkItemInfoGetRequest;
//        $req->setNumIids("123,456");
//        $req->setPlatform("1");
//        $req->setIp("11.22.33.43");
        $resp = $c->execute($req);


        echo '<pre>';var_dump($resp);exit;
    }

    public function test()
    {
        $app_key = $this->AppKey;/*填写appkey */
        $secret=$this->AppSecret;/*填入Appsecret'*/
        $timestamp=time()."000";
        $message = $secret.'app_key'.$app_key.'timestamp'.$timestamp.$secret;
        $mysign=strtoupper(hash_hmac("md5",$message,$secret));
        setcookie("timestamp",$timestamp);
        setcookie("sign",$mysign);

        return view('taobao.index');
    }

    public function test1()
    {
        $c= new TopClient($this->AppKey,$this->AppSecret);
        $req = new AlibabaWholesaleCategoryGetRequest;
        $resp = $c->execute($req);
        echo '<pre>';var_dump($resp);exit;
    }

    //echo '<pre>';var_dump();exit;

}