/**
 * 项目main.js
 * Created by Jassy on 2018/3/18.
 */

// console.log(window.jQuery);

//避免报错：未定义，实际上并不用如此定义

//JavaScript代码区域
// window.onload = function () {
// };
var $ = window.jQuery;
var layui = window.layui;
$(document).ready(function () {
    "use strict";
    layui.use(['element', 'layer', 'form'], function () {
        var element = layui.element;
        var layer = layui.layer;
        var form = layui.form;
        var $ = layui.$;


        //公共操作方法
        layui.common = {
            //加载页面
            loadpage: function (url, config, type) {
                if (typeof type === 'undefined') {
                    type = 'get';
                }
                if (typeof config === 'undefined') {
                    config = {};
                }
                config.url = url;
                config.type = type;
                if (typeof config.success === 'undefined') {
                    //未定义成功后的回调函数，代表使用默认的succes

                    config.success = function (response) {
                        //使用默认的回调函数时，如果用layer,则代表插入自定义弹窗配置
                        if (typeof config.layer === 'undefined') {
                            config.layer = {};
                        }
                        if (typeof response === 'object') {
                            if(typeof config.successHandle === 'function'){
                                config.successHandle(response);
                            }else{
                                if (response.code === 200) {
                                    for (var i in config.layer) {
                                        response.data[i] = config.layer[i];
                                    }
                                    var index = layer.open(response.data);
                                } else {
                                    layer.alert(response.msg, config.layer);
                                }
                            }
                        } else {
                            layer.alert('返回的数据不是JSON数据！', config.layer);
                        }
                    };
                }
                if (typeof config.error === 'undefined') {
                    config.error = function (xhr) {
                        layer.alert(xhr.responseText, {title: '访问错误'});
                    };
                }
                layui.common.ajax(config);
            },
            //异步加载
            ajax: function (config) {
                config.beforeSend = function () {
                    layui.common.data.ajax.loadIndex = layer.load(2, {shade: 0.3});
                };
                config.complete = function () {
                    layer.close(layui.common.data.ajax.loadIndex);
                };
                if ((config.type) === 'post') {
                    config.data[layui.common.data.csrf.param] = layui.common.data.csrf.token;
                }
                $.ajax(config);
            },
            //post请求
            post: function (url, data, config) {
                if (typeof config === 'undefined') {
                    config = {};
                }
                if (typeof data === 'undefined') {
                    data = {};
                }
                config.url = url;
                config.data = data;
                config.type = 'post';
                layui.common.ajax(config);
            },
            get: function (url, data, config) {
                if (typeof config === 'undefined') {
                    config = {};
                }
                if (typeof data === 'undefined') {
                    data = {};
                }
                config.url = url;
                config.data = data;
                config.type = 'get';
                layui.common.ajax(config);
            },
            data: {ajax: {}, csrf: {param: '', token: ''}},
        };
        //获取csrf
        layui.common.data.csrf = {
            param: $("meta[name='csrf-param']").attr('content'),
            token: $("meta[name='csrf-token']").attr('content')
        };


        //左侧菜单
        $('.side').on('click', '.side-fold', function () {
            if ($('.side').attr('data-active') !== 'true') {
                $('.side').addClass('side-active').attr('data-active', 'true');
            } else {
                $('.side').removeClass('side-active').attr('data-active', 'false');
            }

        });
        //退出操作
        layui.signout = function () {
            $("#signoutForm").submit();
        };
    });
});