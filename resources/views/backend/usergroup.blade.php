@extends('backend.layouts.app')
@section('body')
<section class="container-fluid">
  @include('backend.include.header')
  <div class="row">
    @include('backend.include.leftbar')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-lg-10 col-md-offset-2 main" id="main">
    <h1 class="page-header">操作</h1>
        <ol class="breadcrumb">
          <li><a href="/admin/usergroup/create">增加用户角色</a></li>
        </ol>
        <h1 class="page-header">管理 <span class="badge">{{$count}}</span></h1>
        <div class="table-responsive">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th><span class="glyphicon glyphicon-th-large"></span> <span class="visible-lg">ID</span></th>
                <th><span class="glyphicon glyphicon-user"></span> <span class="visible-lg">角色</span></th>
                <th><span class="glyphicon glyphicon-bookmark"></span> <span class="visible-lg">权限</span></th>
                <th><span class="glyphicon glyphicon-pushpin"></span> <span class="visible-lg">排序</span></th>
                <th><span class="glyphicon glyphicon-time"></span> <span class="visible-lg">操作</span></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($roles as $role)
              <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
                <td>
                @if($role->all===1)
                超级管理员
                @else
                普通用户
                @endif
                </td>
                <td>{{ $role->sort }}</td>
                <td><a href="/admin/usergroup/edit">修改</a> <a rel="{{ $role->id }}" name="delete">删除</a> <a href="/User/checked/id/1/action/n">禁用</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </div>
  </div>
</section>
@include('backend.include.modal')
<script src="/dist/js/bootstrap.min.js"></script> 
<script src="/dist/js/admin-scripts.js"></script> 
<script>
//是否确认删除
$(function(){   
	$("#main table tbody tr td a").click(function(){
		var name = $(this);
		var id = name.attr("rel"); //对应id  
		if (event.srcElement.outerText == "删除") 
		{
			if(window.confirm("此操作不可逆，是否确认？"))
			{
				$.ajax({
					type: "get",
					url: "/admin/usergroup/delete",
					data: "id=" + id,
					cache: false, //不缓存此页面   
					success: function (data) {
                        console.log(data)
						//window.location.reload();
					}
				});
			};
		};
	});   
});
</script>
@endsection