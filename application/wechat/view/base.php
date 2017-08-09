<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>Wechat management</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="stylesheet" href="__JS__/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="__CSS__/font-awesome.min.css">
    <!--CSS引用-->
    {block name="css"}{/block}
    <link rel="stylesheet" href="__CSS__/admin.css">
    <!--[if lt IE 9]>
    <script src="__CSS__/html5shiv.min.js"></script>
    <script src="__CSS__/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="layui-layout layui-layout-admin">
    <!--头部-->
    <div class="layui-header header">
        <a href=""><img class="logo" src="__STATIC__/images/admin_logo.png" alt=""></a>
        <ul class="layui-nav" style="position: absolute;top: 0;right: 20px;background: none;">
            <li class="layui-nav-item"><a href="<?= url('wechat/config/index')?>" target="_blank">微信管理</a></li>
            <li class="layui-nav-item"><a href="" data-url="{:url('admin/system/clear')}" id="clear-cache">清除缓存</a></li>
            <li class="layui-nav-item">
                <a href="javascript:;">{:session('admin_name')}</a>
                <dl class="layui-nav-child"> <!-- 二级菜单 -->
                    <dd><a href="{:url('admin/change_password/index')}">修改密码</a></dd>
                    <dd><a href="{:url('admin/login/logout')}">退出登录</a></dd>
                </dl>
            </li>
        </ul>
    </div>

    <!--侧边栏-->
    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <ul class="layui-nav layui-nav-tree">
                <li class="layui-nav-item layui-nav-title"><a>管理菜单</a></li>
                {foreach name="menu" item="vo"}
                {if condition="isset($vo['children'])"}
                <li class="layui-nav-item">
                    <a href="javascript:;"><i class="{$vo.icon}"></i> {$vo.title}</a>
                    <dl class="layui-nav-child">
                        {foreach name="vo['children']" item="v"}
                        <dd><a href="{:url($v.name)}"> {$v.title}</a></dd>
                        {/foreach}
                    </dl>
                </li>
                {else /}
                <li class="layui-nav-item">
                    <a href="{:url($vo.name)}"><i class="{$vo.icon}"></i> {$vo.title}</a>
                </li>
                {/if}
                {/foreach}

                <li class="layui-nav-item" style="height: 0px; text-align: center"></li>
            </ul>
        </div>
    </div>

    <!--主体-->
    {block name="body"}{/block}

    <!--底部-->
    <div class="layui-footer footer">
        <div class="layui-main">
            <p>2016-2017 &copy; <a href="https://github.com/xiayulei/open_source_bms" target="_blank">Open Source BMS</a></p>
        </div>
    </div>
</div>

<script>
    // 定义全局JS变量
    var GV = {
        current_controller: "{$module}/{$controller|default=''}/",
        base_url: "__STATIC__",
        upload: '<?= url('api/upload/upload')?>'
    };
</script>
<!--JS引用-->
<script src="__JS__/jquery.min.js"></script>
<script src="__JS__/layui/lay/dest/layui.all.js"></script>
<script src="__JS__/admin.js"></script>
{block name="js"}{/block}
<!--页面JS脚本-->
{block name="script"}{/block}
</body>
</html>