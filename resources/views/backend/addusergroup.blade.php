@extends('backend.layouts.app')

@section('body')
<section class="container-fluid">
  @include('backend.include.header')
  <div class="row">
    @include('backend.include.leftbar')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-lg-10 col-md-offset-2 main" id="main">
      <div class="row">
        {{ Form::open(['route' => 'admin.user.addrole','autocomplete' => 'off','draggable'=>'false']) }}
          <div class="col-md-9">
            <h1 class="page-header">添加用户角色</h1>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>角色名</span></h2>
              <div class="add-article-box-content">
                <input type="text" name="name" class="form-control" required autofocus autocomplete="off">
              </div>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>角色权限</span></h2>
              <div class="add-article-box-content">
              <select name="associated-permissions" class="form-control">
              <option value="all" selected="selected">超级管理员</option><option value="custom">普通用户</option>
              </select>
              </div>
              <div id="available-permissions" class="add-article-box-content hidden">
              @foreach ($permissions as $permission)
              <input type="checkbox" name="permissions[{{ $permission->id }}]" value="{{ $permission->id }}">{{ $permission->name }}&nbsp;&nbsp;
              @endforeach
              </div>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>排序</span></h2>
              <div class="add-article-box-content">
                <input type="text" name="sort" class="form-control" required autofocus autocomplete="off">
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <h1 class="page-header">操作</h1>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>发布</span></h2>
              
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
<script>
var associated = $("select[name='associated-permissions']");
var associated_container = $("#available-permissions");

if (associated.val() == "custom")
    associated_container.removeClass('hidden');
else
    associated_container.addClass('hidden');

associated.change(function() {
    if ($(this).val() == "custom")
        associated_container.removeClass('hidden');
    else
        associated_container.addClass('hidden');
});
</script>
@endsection
