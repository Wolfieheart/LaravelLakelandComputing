<div id="header">
	<div id="header-left">
		<a href="/">Home</a> 
		<br><br>
	</div>
	<div id="header-bottom">
		<div id="search-form">
			{{ Form::open(array('url'=>'store/search', 'method'=>'get')) }}
			{{ Form::text('keyword', null, array('placeholder'=>'Search by keyword', 'class'=>'search')) }}
			{{ Form::submit('Search', array('class'=>'search submit')) }}
			{{ Form::close() }}
		</div><!-- end search-form -->
	</div>
	<div id="header-middle">
		Lakeland Computers
	</div>
<div id="header-right">
	<div id="user-menu">
		@if(Auth::check())
						<a href="#">{{ Html::image('img/user-icon.gif', Auth::user()->FirstName) }} {{ 'Hello' }} {{ Auth::user()->FirstName }} </a>

							@if(Auth::user()->Admin == 1)
								<li>{{ Html::link('admin/categories', 'Manage Categories') }}</li>
								<li>{{ Html::link('admin/products', 'Manage Products') }}</li>
							@endif
								<li>{{ Html::link('users/signout', 'Sign Out') }}</li>
								<li>{{ Html::link('store/cart', 'View Cart') }} </li>

			</div><!-- end view-cart -->
		@else
			{{ Html::link('users/signin', 'Log In') }}&nbsp
			{{ Html::link('users/newaccount', 'Register') }}
		@endif


	</div><!-- end user-menu -->

</div>

</div>