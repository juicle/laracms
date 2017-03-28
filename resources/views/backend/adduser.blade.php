@extends('backend.layouts.app')

@section('body')
<section class="container-fluid">
  @include('backend.include.header')
  <div class="row">
    @include('backend.include.leftbar')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-lg-10 col-md-offset-2 main" id="main">
      <div class="row">
        {{ Form::open(['route' => 'admin.user.store','autocomplete' => 'off','draggable'=>'false']) }}
          <div class="col-md-9">
            <h1 class="page-header">添加用户</h1>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>用户名</span></h2>
              <div class="add-article-box-content">
                <input type="text" name="title" class="form-control" required autofocus autocomplete="off">
              </div>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>邮箱</span></h2>
              <div class="add-article-box-content">
                <input type="email" name="email" class="form-control" autocomplete="off">
                <span class="prompt-text">用简洁的文字描述本站点。</span> </div>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>密码</span></h2>
              <div class="add-article-box-content">
                <input type="text" name="password" class="form-control" required autocomplete="off">
              </div>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>确认密码</span></h2>
              <div class="add-article-box-content">
                <input type="text" name="confirm_password" class="form-control" required autocomplete="off">
              </div>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>用户组</span></h2>
              <div class="add-article-box-content">
              <input type="radio" name="role" checked>管理员  <input type="radio" name="role">普通用户  
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <h1 class="page-header">操作</h1>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>发布</span></h2>
              <div class="add-article-box-content">
                <p><label>是否启用：</label><input type="radio" name="isactive" value="0" checked/>是 <input type="radio" name="isactive" value="1" />否</p>
                <p><label>发布于：</label><span class="article-time-display"><input style="border: none;" type="datetime" name="time" value="2016-01-09 17:29:37" /></span></p>
              </div>
              <div class="add-article-box-footer">
                <button class="btn btn-primary" type="submit" name="submit">保存</button>
              </div>
            </div>
          </div>
        {{ Form::close() }}
      </div>
    </div>
  </div>
</section>
@include('backend.include.modal')
@endsection