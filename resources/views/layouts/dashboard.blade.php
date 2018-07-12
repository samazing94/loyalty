	@extends('layouts.plane')

	@section('body')
	 
	 <div id="wrapper">

			<!-- Navigation -->
			<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 1em">
				<a href=" {{url ('home')}} " class="pull-left" style="margin:1em;"><img src= "{{ asset("assets/img/sidonia1.png") }}" /></a> 
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
					
					<!-- /.dropdown -->
					<!-- /.dropdown -->
					</li>
					<!-- /.dropdown -->
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
						</a>
						<ul class="dropdown-menu dropdown-user">
							<li><a href="{{ url('/userprofile') }}"><i class="fa fa-user fa-fw"></i> User Profile</a>
							</li>
							<li class="divider"></li>
								@if (Route::has('login'))
										@auth
									<a class="dropdown-item" href="{{ url('login') }}"
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
							@role('Merchantsadministrator')
							<li {{ (Request::is('/home') ? 'class="active"' : '') }}>
								<a href="{{ url ('merchantsadministrator/home') }}"><i class="fas fa-home"></i></i> Home</a>
							</li>
					 		@endrole
					 		@role('shopmanager')
							<li {{ (Request::is('/home') ? 'class="active"' : '') }}>
								<a href="{{ url ('shopmanager/home') }}"><i class="fas fa-home"></i></i> Home</a>
							</li>
					 		@endrole
							</li>
							@role('Merchantsadministrator')
							<!-- restaurant -->
							 <li>
								<a href="#"><i class="fas fa-utensils"></i> Restaurant Management<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="{{ url('merchantsadministrator/shop') }}">Manage Restaurants</a>
									</li>
									<li>
										<a href="{{ url('merchantsadministrator/shop/register') }}">Create New Restaurant</a>
									</li>
								</ul>
							</li>
							@endrole
							<!-- Customer Management -->
							@role('Merchantsadministrator')
							<li>
								<a href="#"><i class="fas fa-user-circle"></i> Customer Managment<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="{{ url ('merchantsadministrator/customer/index') }}">Manage Customers</a>
									</li>
									<li>
										<a href="{{ url('merchantsadministrator/customer/register') }}">Create New Customer</a>
									</li>
								</ul>
								<!-- /.nav-second-level -->
							</li>
							@endrole
							@role('shopmanager')	
								<li>
								<a href="#"><i class="fas fa-user-circle"></i> Customer Managment<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="{{ url ('shopmanager/customer/index') }}">Manage Customers</a>
									</li>
									<li>
										<a href="{{ url('shopmanager/customer/register') }}">Create New Customer</a>
									</li>
								</ul>
								<!-- /.nav-second-level -->
							</li>
							@endrole
							<!-- Shop Point Management -->
							
							@role('Merchantsadministrator')
							<li>
								<a href="#"><i class="fas fa-utensils"></i>  Shop Point Management<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="{{ url('merchantsadministrator/offerlist/list')}}">Point Offers</a>		
									</li>
									<li>
										<a href="{{ url ('merchantsadministrator/offerlist/register') }}">Create Offer</a>
									</li>
									<li>
										<a href="{{ url('merchantsadministrator/offerlist')}}">Process Point Orders</a>		
									</li>	
								</ul>
								<!-- /.nav-second-level -->
							</li>
							@endrole

							@role('shopmanager')
							<li>
								<a href="#"><i class="fas fa-utensils"></i>  Shop Point Management<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="{{ url('shopmanager/offerlist/list')}}">Point Offers</a>		
									</li>
									<li>
										<a href="{{ url ('shopmanager/offerlist/register') }}">Create Offer</a>
									</li>
									<li>
										<a href="{{ url('shopmanager/offerlist')}}">Process Point Orders</a>		
									</li>	
								</ul>
								<!-- /.nav-second-level -->
							</li>
							@endrole
							@role('Merchantsadministrator')
							<li>
								<a href="#"><i class="fas fa-portrait"></i> Orders<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="{{ url('merchantsadministrator/orders/total_order')}}">Order List</a>		
									</li>
									<li>
										<a href="{{ url('merchantsadministrator/orders/new_list')}}">New Orders</a>		
									</li>
									
								</ul>
								<!-- /.nav-second-level -->
							</li>
							@endrole
							@role('shopmanager')
							<li>
								<a href="#"><i class="fas fa-portrait"></i> Orders<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="{{ url('shopmanager/orders/total_order')}}">Order List</a>		
									</li>
									<li>
										<a href="{{ url('shopmanager/orders/new_list')}}">New Orders</a>		
									</li>
									
								</ul>
								<!-- /.nav-second-level -->
							</li>
							@endrole
						   	<!-- Report Management -->
						   	@role('Merchantsadministrator')
							<li>
								<a href="#"><i class="fa fa-files-o fa-fw"></i> Report Management<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="{{ url ('merchantsadministrator/report/') }}">List of Reports</a>
									</li>
									<li>
										<a href="{{ url ('merchantsadministrator/report/customer') }}">List of Customer Reports</a>
									</li>
									<li>
										<a href="{{ url ('merchantsadministrator/report/sms') }}">List of SMS Log Reports</a>
									</li>

										@endauth
									</li>
									@endif
								</ul>
								<!-- /.nav-second-level -->
							</li>
							@endrole
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

