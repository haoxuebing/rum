<?php

namespace Rum;

/**
 * 路由组
 * @author rum
 * @Date 00点22分
 */
class RouterGroup{

    public $handlers;
    public $basePath;
    public $app;
    public function __construct($path,&$rum){
        $this->basePath=$path;
        $this->app=$rum;
    }

    /**
     * 获取路由组的根路径
     * @author huanjiesm
     */
    public function basePath(){
        return $this->basePath;
    }

    /**
     * 挂载插件
     */
    public function use(...$middleware){
        array_push($this->handlers,...$middleware);
        return $this;
    }
    /**
     * 处理路由
     */
    public function handle($method,$relativePath,$handle){
        $absolutePath  = Util::path_join($this->basePath,$relativePath);
        $this->app->addRoute($method,$absolutePath,$handle);
        return $this;
    }
    /**
     * 一次添加全部方法的路由
     */
    public function any($relativePath,$handle){
        foreach(Method::S as $method){
            $this->handle($method,$relativePath,$handle); 
        }
        return $this;
    }

    /**
     * GET请求
     */
    public function get($relativePath,$handle){
        return $this->handle(Method::GET,$relativePath,$handle);
    }
    /**
     * POST请求
     */
    public function post($relativePath,$handle){
        return $this->handle(Method::POST,$relativePath,$handle);
    }
    /**
     * HEAD请求
     */
    public function head($relativePath,$handle){
        return $this->handle(Method::HEAD,$relativePath,$handle);
    }
    /**
     * DELETE请求
     */
    public function delete($relativePath,$handle){
        return $this->handle(Method::DELETE,$relativePath,$handle);
    }
    /**
     * PATCH请求
     */
    public function patch($relativePath,$handle){
        return $this->handle(Method::PATCH,$relativePath,$handle);
    }
    /**
     * PUT请求
     */
    public function put($relativePath,$handle){
        return $this->handle(Method::PUT,$relativePath,$handle);
    }
    /**
     * OPTIONS请求
     */
    public function options($relativePath,$handle){
        return $this->handle(Method::OPTIONS,$relativePath,$handle);
    }

    /**
     * CONNECT请求
     */
    public function connect($relativePath,$handle){
        return $this->handle(Method::CONNECT,$relativePath,$handle);
    }
    /**
     * TRACE请求
     */
    public function trace($relativePath,$handle){
        return $this->handle(Method::TRACE,$relativePath,$handle);
    }
}