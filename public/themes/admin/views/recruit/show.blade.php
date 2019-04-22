<div class="main">
    <div class="layui-card fb-minNav">
        <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
            <a href="﻿{{ route('home') }}">主页</a><span lay-separator="">/</span>
            <a><cite>招聘信息详情</cite></a>
        </div>
    </div>
    <div class="main_full">
        <div class="layui-col-md12">
            <div class="fb-main-table">
                <form class="layui-form" action="{{guard_url('recruit/recruit/'.$recruit->id)}}" method="post" method="post" lay-filter="fb-form">
                    <div class="layui-form-item">
                        <label class="layui-form-label">标题</label>
                        <div class="layui-input-inline">
                            <input type="text" name="title" autocomplete="off" placeholder="请输入标题" class="layui-input" value="{{$recruit['title']}}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">招聘岗位</label>
                        <div class="layui-input-inline">
                            <input type="text" name="post" autocomplete="off" placeholder="请输入招聘岗位" class="layui-input" value="{{$recruit['post']}}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">汇报对象</label>
                        <div class="layui-input-inline">
                            <input type="text" name="reports_to" autocomplete="off" placeholder="请输入汇报对象" class="layui-input" value="{{$recruit['reports_to']}}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">岗位职责</label>
                        <div class="layui-input-block">
                            <script type="text/plain" id="duty" name="duty" style="width:1000px;height:240px;">
                                {!! $recruit['duty'] !!}
                            </script>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">任职要求</label>
                        <div class="layui-input-block">
                            <script type="text/plain" id="requirement" name="requirement" style="width:1000px;height:240px;">
                                {!! $recruit['requirement'] !!}
                            </script>
                        </div>
                    </div>


                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
                        </div>
                    </div>
                    {!!Form::token()!!}
                    <input type="hidden" name="_method" value="PUT">
                </form>
            </div>

        </div>
    </div>
</div>
{!! Theme::asset()->container('ueditor')->scripts() !!}
<script>
    var ue = getUeCopy('requirement');
    var ue_duty = getUeCopy('duty');
</script>