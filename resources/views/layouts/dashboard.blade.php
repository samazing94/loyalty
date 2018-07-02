	@extends('layouts.plane')

	@section('body')
	 
	 <div id="wrapper">

			<!-- Navigation -->
			<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
				<a href=" url ('/home') " class="pull-left" style="margin:1em;"><img src= "{{ asset("assets/img/sidonia.png") }}"></a> 
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!-- /.navbar-header -->

				<ul class="nav navbar-top-links navbar-right">
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
						</a>
						<ul class="dropdown-menu dropdown-messages">
							<li>
								<a href="#">
									<div>
										<strong>John Smith</strong>
										<span class="pull-right text-muted">
											<em>Yesterday</em>
										</span>
									</div>
									<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
								</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="#">
									<div>
										<strong>John Smith</strong>
										<span class="pull-right text-muted">
											<em>Yesterday</em>
										</span>
									</div>
									<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
								</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="#">
									<div>
										<strong>John Smith</strong>
										<span class="pull-right text-muted">
											<em>Yesterday</em>
										</span>
									</div>
									<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
								</a>
							</li>
							<li class="divider"></li>
							<li>
								<a class="text-center" href="#">
									<strong>Read All Messages</strong>
									<i class="fa fa-angle-right"></i>
								</a>
							</li>
						</ul>
						<!-- /.dropdown-messages -->
					</li>
					<!-- /.dropdown -->
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
						</a>
						<ul class="dropdown-menu dropdown-tasks">
							<li>
								<a href="#">
									<div>
										<p>
											<strong>Task 1</strong>
											<span class="pull-right text-muted">40% Complete</span>
										</p>
									   
											<div>
											@include('widgets.progress', array('animated'=> true, 'class'=>'success', 'value'=>'40'))
												<span class="sr-only">40% Complete (success)</span>
											</div>
									   
									</div>
								</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="#">
									<div>
										<p>
											<strong>Task 2</strong>
											<span class="pull-right text-muted">20% Complete</span>
										</p>
									   
											<div>
											@include('widgets.progress', array('animated'=> true, 'class'=>'info', 'value'=>'20'))
												<span class="sr-only">20% Complete</span>
											</div>
									   
									</div>
								</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="#">
									<div>
										<p>
											<strong>Task 3</strong>
											<span class="pull-right text-muted">60% Complete</span>
										</p>
										
											<div>
											@include('widgets.progress', array('animated'=> true, 'class'=>'warning', 'value'=>'60'))
												<span class="sr-only">60% Complete (warning)</span>
											</div>
									   
									</div>
								</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="#">
									<div>
										<p>
											<strong>Task 4</strong>
											<span class="pull-right text-muted">80% Complete</span>
										</p>
										
											<div>
											@include('widgets.progress', array('animated'=> true,'class'=>'danger', 'value'=>'80'))
												<span class="sr-only">80% Complete (danger)</span>
											</div>
										
									</div>
								</a>
							</li>
							<li class="divider"></li>
							<li>
								<a class="text-center" href="#">
									<strong>See All Tasks</strong>
									<i class="fa fa-angle-right"></i>
								</a>
							</li>
						</ul>
						<!-- /.dropdown-tasks -->
					</li>
					<!-- /.dropdown -->
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
						</a>
						<ul class="dropdown-menu dropdown-alerts">
							<li>
								<a href="#">
									<div>
										<i class="fa fa-comment fa-fw"></i> New Comment
										<span class="pull-right text-muted small">4 minutes ago</span>
									</div>
								</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="#">
									<div>
										<i class="fa fa-twitter fa-fw"></i> 3 New Followers
										<span class="pull-right text-muted small">12 minutes ago</span>
									</div>
								</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="#">
									<div>
										<i class="fa fa-envelope fa-fw"></i> Message Sent
										<span class="pull-right text-muted small">4 minutes ago</span>
									</div>
								</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="#">
									<div>
										<i class="fa fa-tasks fa-fw"></i> New Task
										<span class="pull-right text-muted small">4 minutes ago</span>
									</div>
								</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="#">
									<div>
										<i class="fa fa-upload fa-fw"></i> Server Rebooted
										<span class="pull-right text-muted small">4 minutes ago</span>
									</div>
								</a>
							</li>
						
							<li class="divider"></li>
							<li>
								<a class="text-center" href="#">
									<strong>See All Alerts</strong>
									<i class="fa fa-angle-right"></i>
								</a>
							</li>
						</ul>
						<!-- /.dropdown-alerts -->
					</li>
					<!-- /.dropdown -->
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
						</a>
						<ul class="dropdown-menu dropdown-user">
							<li><a href="{{ url('/userprofile') }}"><i class="fa fa-user fa-fw"></i> User Profile</a>
							</li>
							<li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
							</li>
							<li class="divider"></li>
								@if (Route::has('login'))
										@auth
									<a class="dropdown-item" href="{{ route('logout') }}"
									   onclick="event.preventDefault();
													 document.getElementById('logout-form').submit();">
										{{ __('Logout') }}
									</a>

									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										{{ csrf_field() }}
									</form>
							</li>
						</ul>
						<!-- /.dropdown-user -->
					</li>
					<!-- /.dropdown -->
				</ul>
				<!-- /.navbar-top-links -->

				<div class="navbar-default sidebar" role="navigation">
					<div class="sidebar-nav navbar-collapse">
						<ul class="nav" id="side-menu">
							<li {{ (Request::is('/home') ? 'class="active"' : '') }}>
								<a href="{{ url ('/home') }}"><i class="fas fa-home"></i></i> Home</a>
							</li>
					 
							</li>
							<!-- restaurant -->
							 <li>
								<a href="#"><i class="fas fa-utensils"></i> Restaurant Management<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="{{ url('/shop') }}">Manage Restaurants</a>
									</li>
									<li>
										<a href="{{ url('/shop/register') }}">Create New Restaurant</a>
									</li>
								</ul>
							</li>
							<!-- SMS Management -->
							<li>
								<a href="/loyalty/pushpull.php?msisdn=&sms="><i class="fas fa-envelope"></i> SMS Management<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="#">SMS List</a>
									</li>
									<li>
										<a href="#">SMS Pending</a>
									</li>
								</ul>
							</li>

							<!-- Customer Management -->

							<li>
								<a href="#"><i class="fas fa-user-circle"></i> Customer Managment<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="{{ url ('/customer/index') }}">Manage Customers</a>
									</li>
									<li>
										<a href="{{ url('/customer/register') }}">Create New Customer</a>
									</li>
								</ul>
								<!-- /.nav-second-level -->
							</li>

								<!-- Shop Point Management -->

							<li>
								<a href="#"><i class="fas fa-user-circle"></i> Shop Point Management<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="{{ url('/offerlist/list')}}">Point Offers</a>		
									</li>
									<li>
										<a href="{{ url('/offerlist')}}">Process Point Orders</a>		
									</li>
									<li>
										<a href="{{ url ('/offerlist/register') }}">Create Offer</a>
									</li>
								</ul>
								<!-- /.nav-second-level -->
							</li>
									
						   	<!-- Report Management -->
							<li>
								<a href="#"><i class="fa fa-files-o fa-fw"></i> Report Management<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="{{ url ('report/') }}">List of Reports</a>
									</li>
									<li>
										<a href="{{ url ('report/customer') }}">List of Customer Reports</a>
									</li>
									<li>
										<a href="{{ url ('report/sms') }}">List of SMS Log Reports</a>
									</li>
						<!-- 			<li>
										 @else
										<a href="{{ route('login') }}">Login Page</a>
										@endauth
									</li>
									@endif -->
								</ul>
								<!-- /.nav-second-level -->
							</li>
						</ul>
					</div>
					<!-- /.sidebar-collapse -->
				</div>
				<!-- /.navbar-static-side -->
			</nav>

			<div id="page-wrapper">
				 <div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">@yield('page_heading')</h1>
					</div>
					<!-- /.col-lg-12 -->
			   </div>
				<div class="row">  
					@yield('section')

				</div>
				<!-- /#page-wrapper -->
			</div>
		</div>

	  	<script>
	  	(function($, window, document, undefined) {

	    var pluginName = "metisMenu",
	        defaults = {
	            toggle: true,
	            doubleTapToGo: false
	        };

	    function Plugin(element, options) {
	        this.element = $(element);
	        this.settings = $.extend({}, defaults, options);
	        this._defaults = defaults;
	        this._name = pluginName;
	        this.init();
	    }

	    Plugin.prototype = {
	        init: function() {

	            var $this = this.element,
	                $toggle = this.settings.toggle,
	                obj = this;

	            if (this.isIE() <= 9) {
	                $this.find("li.active").has("ul").children("ul").collapse("show");
	                $this.find("li").not(".active").has("ul").children("ul").collapse("hide");
	            } else {
	                $this.find("li.active").has("ul").children("ul").addClass("collapse in");
	                $this.find("li").not(".active").has("ul").children("ul").addClass("collapse");
	            }

	            //add the "doubleTapToGo" class to active items if needed
	            if (obj.settings.doubleTapToGo) {
	                $this.find("li.active").has("ul").children("a").addClass("doubleTapToGo");
	            }

	            $this.find("li").has("ul").children("a").on("click" + "." + pluginName, function(e) {
	                e.preventDefault();

	                //Do we need to enable the double tap
	                if (obj.settings.doubleTapToGo) {

	                    //if we hit a second time on the link and the href is valid, navigate to that url
	                    if (obj.doubleTapToGo($(this)) && $(this).attr("href") !== "#" && $(this).attr("href") !== "") {
	                        e.stopPropagation();
	                        document.location = $(this).attr("href");
	                        return;
	                    }
	                }

	                $(this).parent("li").toggleClass("active").children("ul").collapse("toggle");

	                if ($toggle) {
	                    $(this).parent("li").siblings().removeClass("active").children("ul.in").collapse("hide");
	                }

	            });
	        },

	        isIE: function() { //https://gist.github.com/padolsey/527683
	            var undef,
	                v = 3,
	                div = document.createElement("div"),
	                all = div.getElementsByTagName("i");

	            while (
	                div.innerHTML = "<!--[if gt IE " + (++v) + "]><i></i><![endif]-->",
	                all[0]
	            ) {
	                return v > 4 ? v : undef;
	            }
	        },

	        //Enable the link on the second click.
	        doubleTapToGo: function(elem) {
	            var $this = this.element;

	            //if the class "doubleTapToGo" exists, remove it and return
	            if (elem.hasClass("doubleTapToGo")) {
	                elem.removeClass("doubleTapToGo");
	                return true;
	            }

	            //does not exists, add a new class and return false
	            if (elem.parent().children("ul").length) {
	                 //first remove all other class
	                $this.find(".doubleTapToGo").removeClass("doubleTapToGo");
	                //add the class on the current element
	                elem.addClass("doubleTapToGo");
	                return false;
	            }
	        },

	        remove: function() {
	            this.element.off("." + pluginName);
	            this.element.removeData(pluginName);
	        }

	    };

	    $.fn[pluginName] = function(options) {
	        this.each(function () {
	            var el = $(this);
	            if (el.data(pluginName)) {
	                el.data(pluginName).remove();
	            }
	            el.data(pluginName, new Plugin(this, options));
	        });
	        return this;
	    };

	})(jQuery, window, document);
	$(function() {

	    $('#side-menu').metisMenu();

	});

	//Loads the correct sidebar on window load,
	//collapses the sidebar on window resize.
	// Sets the min-height of #page-wrapper to window size
	$(function() {
	    $(window).bind("load resize", function() {
	        topOffset = 50;
	        width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
	        if (width < 768) {
	            $('div.navbar-collapse').addClass('collapse');
	            topOffset = 100; // 2-row-menu
	        } else {
	            $('div.navbar-collapse').removeClass('collapse');
	        }

	        height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
	        height = height - topOffset;
	        if (height < 1) height = 1;
	        if (height > topOffset) {
	            $("#page-wrapper").css("min-height", (height) + "px");
	        }
	    });

	    var url = window.location;
	    var element = $('ul.nav a').filter(function() {
	        return this.href == url || url.href.indexOf(this.href) == 0;
	    }).addClass('active').parent().parent().addClass('in').parent();
	    if (element.is('li')) {
	        element.addClass('active');
	    }
	});
		  	</script>
			   @yield('scripts')
		 
	@stop

