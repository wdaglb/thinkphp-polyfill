<?php
// +----------------------------------------------------------------------
// | thinkphp-polyfill.
// +----------------------------------------------------------------------
// | FileName: Polyfill.php
// +----------------------------------------------------------------------
// | Author: King east <1207877378@qq.com>
// +----------------------------------------------------------------------

namespace ke;

if (defined('THINK_VERSION')) {
    define('KE_TP_VERSION', '5.0');
} else {
    define('KE_TP_VERSION', '5.1');
}

class Polyfill
{
    /**
     * 项目是否在调试
     * @return bool
     */
    public static function isDebug()
    {
        if (KE_TP_VERSION === '5.0') {
            return \think\App::$debug;
        } else {
            return \think\facade\App::isDebug();
        }
    }

    /**
     * 获取路由文件
     * @return string
     */
    public static function getRouteFile()
    {
        if (KE_TP_VERSION === '5.0') {
            return APP_PATH . 'build_route.php';
        } else {
            return static::getRootPath() . 'route/build_route.php';
        }
    }

    /**
     * 获取项目根目录
     * @return string
     */
    public static function getRootPath()
    {
        if (KE_TP_VERSION === '5.0') {
            return ROOT_PATH;
        } else {
            return \think\facade\App::getRootPath();
        }
    }


    /**
     * 执行钩子
     * @param string $class
     * @return mixed
     */
    public static function hooks_exec($class)
    {
        if (KE_TP_VERSION === '5.0') {
            return \think\Hook::exec($class);
        } else {
            return \think\facade\Hook::exec($class);
        }
    }

    /**
     * 添加命令行
     * @param array $option
     */
    public static function command_add($option)
    {
        \think\Console::addDefaultCommands($option);
    }
}
