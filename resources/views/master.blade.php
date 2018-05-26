<!DOCTYPE html>
<html>
<head>
	<title>doctors first aid</title>
	<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="{{asset('public/font_end_assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('public/font_end_assets/css/style.css')}}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<script type="text/javascript" src="{{asset('public/font_end_assets/js/bootstrap.min.js')}}"></script>
<style type="text/css">
	.vertical-menu {
    width: 100%px;
    height: 350px;
    overflow-y: auto;
}

.vertical-menu a {
    background-color: #eee;
    color: black;
    display: block;
    padding: 12px;
    text-decoration: none;
}

.vertical-menu a:hover {
    background-color: #ccc;
}

.vertical-menu a.active {
    background-color: #4CAF50;
    color: white;
}


.menu{
	background-color: #333;
}

 ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
   
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px  ;
    text-decoration: none;
}

li a:hover:not(.active) {
    color: red;
    text-decoration: none;
}
.menu a.active {
    background-color: #220;
    color: white;
}



.dropbtn {
    background-color: #333;
    color: white;
    padding: 16px;
    font-size: 18px;
    border: none;
    width: 250px;
    margin-top:10px;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    width: 250px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    

}

.dropdown-content a:hover {
	background-color: #fdf;
	font-size: 16px;
	font-weight: bold;
	color:black;
	width: 250px;
	text-align: left;
	
}

.dropdown:hover .dropdown-content {
    display: block;
    color:red;
}

.dropdown:hover .dropbtn {
    background-color: skyblue;
    color: white;
    font-weight: bold;
    font-size: 18px;
}
</style>
</head>
<body>















</style>
</head>
<body>
	<!--Header Start-->

		<header style="background-color: #333">
			<div class="row">
				<div class="col-md-12">
					<div class="menu" >
						
						<ul>
							
							<div class="container"><li style="list-style: none;" class=""><a href="{{URL::to('/')}}" class="active" style="margin-right: 20px"><h4 style="color: gray">Doctors First Aid</h4></a></li>
							
								<li><a href="{{URL::to('/')}}">Home</a></li>
								<li><a href="{{URL::to('/about')}}">About-Us</a></li>
								<li><a href="">Service</a></li>
								<li><a href="">Contact</a></li>
								<?php 
									if(Auth::user()==NULL){	
								?>
								<div style="float: right;">
									<li><a style="color: #2196F3;" href="{{URL::to('/login')}}">Login</a></li>
								<li><a style="color: #2196F3; " href="{{URL::to('/register')}}">Register</a></li>
									
								</div>

								
								<?php }
								else { ?>
							 class="dropdown-menu">
                                    <li style="float: right">
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <p style="color: #92B558; font-weight: bold;"><i class="fas fa-sign-out-alt"></i> Logout</p>


                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                               
                       
                        
                    

								<?php } ?>

							</div>
						</ul>
						
					</div>
				</div>
			</div>
		</header>

	<!--Header End-->

	<!--Banner Start-->

		
		<div class="slider" style="height: 250px; width: 100%">
			<div class="row">
				<img src="{{asset('public/font_end_assets/images/slider.jpg')}}" width="100%" height="250px">
			</div>
		</div>
		



	<!--Banner End-->

	<!--Content Start-->

		<div class="content">
			<div class="container">
				<div class="row">
					<!--Sidebar Start-->
					<div class="col-md-3" style="border-right: 1px solid">
						<div class="dropdown">
							  <button class="dropbtn">Prescription</button>
							  <div class="dropdown-content">
						<?php 
							 	$all_published_category=DB::table('tbl_category')
							 				->select('*')
							 				->where('publication_status',1)
							 				->orderBy('category_name')
							 				->get();
							 	
							 	foreach ($all_published_category as $v_category) 
							 	{	?>
							 		 
							 		 	<a href="{{URL::to('/sub-category/'.$v_category->category_id)}}">{{$v_category->category_name}}</a>
							 		 
							 			 		

							 	<?php }?>	
			
								</div>
							</div>





					</div>
					<!--Sidebar End-->

					<!--Main Content Start-->
					<div class="col-md-9">
						<div class="main-content">
							<div class="search" style="height: 65px">
								<input type="text" name="search" class="input" placeholder="Search Medicine...">
								
							</div>
							<div class="">
								@yield('main_content')

								
							</div>

					
						</div>
					</div>
					<!--Main Content End-->
				</div>
				
			</div>
			
		</div>

	<!-- Content Start-->


	<!--Main Content Start-->
			<footer style="background-color: gray">
			<div class="container">
				<div class="row" style="color: white">
					<div class="col-md-6">

						<div class="footer-left" >
							<p style="padding-top: 10px">Copyright&copy; Sumon-2018</p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="footer-right">
							<p>Follow Us <a href="">facebook</a></p>
						</div>
					</div>
				</div>
			</div>
		</footer>

	<!--Main Content Start-->
	<!--Main Content Start-->
	<!--Main Content Start-->
	<!--Main Content End-->
	



</body>
</html>