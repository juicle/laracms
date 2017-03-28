@extends('backend.layouts.app')

@section('body')
<section class="container-fluid">
  @include('backend.include.header')
  <div class="row">
    @include('backend.include.leftbar')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-lg-10 col-md-offset-2 main" id="main">
    <h1 class="page-header">操作</h1>
        <ol class="breadcrumb">
          <li><a href="/admin/user/create">增加用户</a></li>
        </ol>
        <h1 class="page-header">管理 <span class="badge">2</span></h1>
        <div class="table-responsive">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th><span class="glyphicon glyphicon-th-large"></span> <span class="visible-lg">ID</span></th>
                <th><span class="glyphicon glyphicon-user"></span> <span class="visible-lg">用户名</span></th>
                <th><span class="glyphicon glyphicon-bookmark"></span> <span class="visible-lg">邮箱</span></th>
                <th><span class="glyphicon glyphicon-pushpin"></span> <span class="visible-lg">角色</span></th>
                <th><span class="glyphicon glyphicon-time"></span> <span class="visible-lg">上次登录时间</span></th>
                <th><span class="glyphicon glyphicon-pencil"></span> <span class="visible-lg">操作</span></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
              <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>管理员</td>
                <td>2016</td>
                <td><a rel="1" name="see">修改</a> <a rel="1" name="delete">删除</a> <a href="/User/checked/id/1/action/n">禁用</a></td>
              </tr>
              @endforeach
              
              
            </tbody>
          </table>
        </div>
    </div>
  </div>
</section>
@include('backend.include.modal')
@endsection