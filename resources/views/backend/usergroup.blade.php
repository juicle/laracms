@extends('backend.layouts.app')

@section('body')
<section class="container-fluid">
  @include('backend.include.header')
  <div class="row">
    @include('backend.include.leftbar')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-lg-10 col-md-offset-2 main" id="main">
    <h1 class="page-header">操作</h1>
        <ol class="breadcrumb">
          <li><a data-toggle="modal" data-target="#addUser">增加用户角色</a></li>
        </ol>
        <h1 class="page-header">管理 <span class="badge">2</span></h1>
        <div class="table-responsive">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th><span class="glyphicon glyphicon-th-large"></span> <span class="visible-lg">ID</span></th>
                <th><span class="glyphicon glyphicon-user"></span> <span class="visible-lg">权限</span></th>
                <th><span class="glyphicon glyphicon-bookmark"></span> <span class="visible-lg">角色</span></th>
                <th><span class="glyphicon glyphicon-pushpin"></span> <span class="visible-lg">排序</span></th>
                <th><span class="glyphicon glyphicon-time"></span> <span class="visible-lg">操作</span></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>edit</td>
                <td>编辑</td>
                <td>4</td>
                <td><a rel="1" name="see">修改</a> <a rel="1" name="delete">删除</a> <a href="/User/checked/id/1/action/n">禁用</a></td>
              </tr>
              <tr>
                <td>2</td>
                <td>test</td>
                <td>测试</td>
                <td>3</td>
                <td><a rel="2" name="see">修改</a> <a rel="2" name="delete">删除</a> <a href="/User/checked/id/2/action/y">启用</a></td>
              </tr>
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
$(function () {
    $("#main table tbody tr td a").click(function () {
        var name = $(this);
        var id = name.attr("rel"); //对应id   
        if (name.attr("name") === "see") {
            $.ajax({
                type: "POST",
                url: "/User/see",
                data: "id=" + id,
                cache: false, //不缓存此页面   
                success: function (data) {
                    var data = JSON.parse(data);
					$('#truename').val(data.truename);
					$('#username').val(data.username);
					$('#usertel').val(data.usertel);
					$('#userid').val(data.userid);
                    $('#seeUser').modal('show');
                }
            });
        } else if (name.attr("name") === "delete") {
            if (window.confirm("此操作不可逆，是否确认？")) {
                $.ajax({
                    type: "POST",
                    url: "/User/delete",
                    data: "id=" + id,
                    cache: false, //不缓存此页面   
                    success: function (data) {
                        window.location.reload();
                    }
                });
            };
        };
    });
});
</script>
@endsection