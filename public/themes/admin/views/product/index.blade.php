<div class="main">
    <div class="layui-card fb-minNav">
        <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
            <a href="﻿{{ route('home') }}">主页</a><span lay-separator="">/</span>
            <a><cite>产品管理</cite></a>
        </div>
    </div>
    <div class="main_full">
        <div class="layui-col-md12">
            <div class="tabel-message layui-form">
                <div class="layui-inline tabel-btn">
                    <button class="layui-btn layui-btn-warm "><a href="{{guard_url('product/product/create')}}">添加产品</a></button>

                    <button class="layui-btn layui-btn-primary " data-type="del" data-events="del">删除</button>
                </div>
                <div class="layui-inline">
                    <select name="category_id" class="select layui-select search_key" lay-verify="">
                        <option name="category_id" value="0">全部</option>
                        @foreach($categories as $key => $category)
                            <option name="category_id" value="{{ $category['id'] }}" @if($category_id == $category['id']) selected @endif>{{ $category['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="layui-btn" data-type="reload">搜索</button>
            </div>

            <table id="fb-table" class="layui-table"  lay-filter="fb-table">

            </table>
        </div>
    </div>
</div>

<script type="text/html" id="barDemo">
    <a class="layui-btn layui-btn-sm" lay-event="edit">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-sm" lay-event="del">删除</a>
</script>
<script type="text/html" id="imageTEM">
    <img src="/image/sm/@{{d.image}}" alt="" height="28">
</script>

<script>
    var main_url = "{{guard_url('product/product')}}";
    var delete_all_url = "{{guard_url('product/product/destroyAll')}}";
    layui.use(['jquery','element','table'], function(){
        var table = layui.table;
        var form = layui.form;
        var $ = layui.$;
        table.render({
            elem: '#fb-table'
            ,url: main_url
            ,cols: [[
                {checkbox: true, fixed: true}
                ,{field:'id',title:'ID', width:80, sort: true}
                ,{field:'name',title:'产品名称', width:200,edit:'text'}
                ,{field:'category_name',title:'产品分类', width:200}
                ,{field:'price',title:'价格',edit:'text'}
                ,{field:'company',title:'公司',edit:'text'}
                ,{field:'image',title:'图片', toolbar:'#imageTEM'}
                ,{field:'score',title:'操作', width:200, align: 'right',toolbar:'#barDemo'}
            ]]
            ,id: 'fb-table'
            ,page: true
            ,limit: 10
            ,height: 'full-200'
        });


    });
</script>
{!! Theme::partial('common_handle_js') !!}