@extends('backend.layouts.app')

@section('body')
<div class="container">
@include('backend.include.loginmsg')
  <div class="siteIcon"><img src="/dist/images/icon/icon.png" alt="" data-toggle="tooltip" data-placement="top" draggable="false" /></div>
  {{ Form::open(['route' => 'admin.login', 'class' => 'form-signin','autocomplete' => 'off']) }}
    <h2 class="form-signin-heading">管理员登录</h2>
    {{ Form::label('emuserNameail', '用户名', ['class' => 'sr-only']) }}
    {{ Form::input('text', 'username', null, ['class' => 'form-control', 'placeholder' => '请输入用户名', 'autocomplete'=>'off', 'maxlength'=>'10', 'id'=>'userName']) }}
    {{ Form::label('userPwd', '密码', ['class' => 'sr-only']) }}
    {{ Form::input('password', 'userpwd', null, ['class' => 'form-control', 'placeholder' => '请输入密码', 'autocomplete'=>'off', 'maxlength'=>'18', 'id'=>'userPwd']) }}
    {{ Form::submit(null, ['class' => 'btn btn-lg btn-primary btn-block','id'=>'signinSubmit']) }}
  {{ Form::close() }}
  <div class="footer">
    <p><a href="#" data-toggle="tooltip" data-placement="left" title="不知道自己在哪?">回到首页 →</a></p>
  </div>
</div>

<script>
$('.siteIcon img').click(function(){
	window.location.reload();
});
</script>
@endsection