<!DOCTYPE html>
@extends ('layouts.master')
<html>
<head>
    <title>Lakeland Computers</title>
</head>
<body>
@section('content')

    <div id="login">
	<section id="signin-form">
        <strong>I have an account</strong>
        {{ Form::open(array('url'=>'users/signin')) }}
            <p>
                {{ Html::image('img/email.gif', 'Email Address') }}
                {{ Form::text('email') }}
            </p>
            <p>
                {{ HTML::image('img/password.gif', 'Password') }}
                {{ Form::password('password') }}
            </p>
            <p>
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

            {{ Form::button('Sign In', array('type'=>'submit', 'class'=>'secondary-cart-btn')) }}
        {{ Form::close() }}
    </section><!-- end signin-form -->
    <div id="login-signup">
        <section id="signup">
            <h2>I'm a new customer</h2>
            You can create an account in just a few simple steps.
            Click below to begin.<br>

            {{ Html::link('users/newaccount', 'CREATE NEW ACCOUNT', array('class'=>'default-btn')) }}
        </section><!--- end signup -->
    </div>
</div>
@stop