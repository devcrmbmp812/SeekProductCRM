@extends('layouts.app')

@section('content')
	<style type="text/css">
		.modal-open .modal {
		    overflow-x: hidden;
		    /* overflow-y: auto; */
		}
		.modal-dialog{
			max-width: 800px;
		}
		.modal-dialog input{
			border-radius: 5px;
			border-color: gray;
			font-size: 24px;
			margin-bottom: 15px;
		}
		.modal-dialog textarea{
			border-radius: 10px;
			border-color: gray;
			font-size: 18px;
			margin-bottom: 15px !important;
		}
		.modal-dialog section{
			margin-bottom: 50px;
			padding: 30px;
			height: 130px;
		}
		.modal-content{
			border-radius: 15px;
			max-height: 800px;
    		overflow-y: auto;
		}
		section *{
			color: white;
		}
		.user_img i{
			color: white;
			position: absolute;
			left: 120px;
			top: 100px;
		}
		.user_info i{
			right: 5px !important;
    		top: 0px !important;
		}
		#cover_image_show, #cover_image_show_t{
			background-repeat: no-repeat !important;
    		background-size: 100% 100% !important;
		}
		#overallModal *{
			font-size: 15px !important;
		}
	</style>
	<!-- introducation modal -->
	<div id="introModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="top: 5%;" class="container modal fade">
	  	<div class="modal-dialog" role="document">
		    <div class="modal-content">
			    <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Edit intro</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			        	<span aria-hidden="true">&times;</span>
			        </button>
			    </div>
			    <form id="intro_form">
			    	<div class="modal-body">
			    		@if ($profile->cover_image)
						    <section id="cover_image_show" style="background:url({{asset('').$profile->cover_image }})">
						@else
						    <section id="cover_image_show" style="background: #5f5f9a">
						@endif
							<div class="container">
								<div class="row">
									<div class="col-md-12">
										<div class="user_img">
											@if ($profile->profile_image)
											    <img id="profile_image_show" class="img-circle" src="{{ 
												asset('').$profile->profile_image }}">
											@else
											    <img id="profile_image_show" class="img-circle" src="{{ 
												asset('img/user_img.png') }}">
											@endif
											<a id="profile_image_btn">
												<i class="fa fa-edit"></i>
											</a>
											<input type="file" id="profile_image" name="profile_image_t" style="display: none"  accept=".jpg,.png,.bmp" >
										</div>
										<div class="user_info">
											<a id="cover_image_btn">
												<i class="fa fa-edit"></i>
											</a>
											<input type="file" id="cover_image" name="cover_image" style="display: none"  accept=".jpg,.png,.bmp">
										</div>
									</div>
								</div>
							</div>
						</section>
			    		<div class="row" style="margin: auto;">
			    			<div class="col-md-6">
			    				<p>first name:</p><br>
			    				<input type="text" class="col-md-12" id="surname" name="surname" placeholder="first name" value="{{$user->surname}}" required autofocus>
			    			</div>
			    			<div class="col-md-6">
			    				<p>last name:</p><br>
			    				<input type="text" class="col-md-12" id="lasname" name="lasname" placeholder="last name" value="{{$user->lasname}}" required autofocus>
			    			</div>
			    		</div>
			    		<div class="row" style="margin: auto;">
			    			<div class="col-md-12">
			    				<p>your headline:</p><br>
			    				<input type="text" class="col-md-12" id="headline" name="headline" placeholder="headline" value="{{$profile->headline}}" required autofocus>
			    			</div>
			    		</div>
			    		<div class="row" style="margin: auto;">
			    			<div class="col-md-12">
			    				<p>overview:</p><br>
			    				<textarea class="col-md-12" id="overview" name="overview" style="margin: auto;" rows="3">{{$profile->overview}}</textarea>
			    			</div>
			    		</div>
				    </div>
			      	<div class="modal-footer">
				        <button id="intro_btn" type="button" class="btn btn-primary">Continue</button>
			      	</div>
			    </form>
		    </div>
	  	</div>
	</div>
	<!-- company modal -->
	<div id="companyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="top: 5%;" class="container modal fade">
	  	<div class="modal-dialog" role="document">
		    <div class="modal-content">
			    <form id="company_form">
			    	<div class="modal-body">
			    		<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="width: 30px;height: 30px;">
				        	<span aria-hidden="true">&times;</span>
				        </button>
			    		<section style="background: #17a2b8">
							<div class="container">
								<div class="row">
									<div class="col-md-12">
										<h3>Let's get your work experience</h3>
										<br>
										<h5>Your current position helps recuriters and coworkers find you</h5>
									</div>
								</div>
							</div>
						</section>
						<div style="padding-left: 45px">
							<h4>Where do you currently work?</h4>
							<br>
							<h5>Company name</h5>
							<br>
							@if ($profile->company=="self-employed")
							    <input type="text" id="company" name="company" placeholder="company" style="width: 50%" value="{{$profile->company}}" disabled="true">
								<br>
								<div class="form-check">
								    <input type="checkbox" class="form-check-input" id="self-employed" checked>
								    <label class="form-check-label" for="self-employed">I'm self-employed</label>
								</div>
							@else
							    <input type="text" id="company" name="company" placeholder="company" style="width: 50%" value="{{$profile->company}}">
								<br>
								<div class="form-check">
								    <input type="checkbox" class="form-check-input" id="self-employed">
								    <label class="form-check-label" for="self-employed">I'm self-employed</label>
								 </div>
							@endif
						</div>
				    </div>
			      	<div class="modal-footer">
				        <button id="company_btn" type="button" class="btn btn-primary">Continue</button>
			      	</div>
			    </form>
		    </div>
	  	</div>
	</div>
	<!-- role modal -->
	<div id="roleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="top: 5%;" class="container modal fade">
	  	<div class="modal-dialog" role="document">
		    <div class="modal-content">
			    <form id="role_form">
			    	<div class="modal-body">
			    		<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="width: 30px;height: 30px;">
				        	<span aria-hidden="true">&times;</span>
				        </button>
			    		<section style="background: #17a2b8">
							<div class="container">
								<div class="row">
									<div class="col-md-12">
										<h3>Are you your own boss?</h3>
										<br>
										<h5>Tell us more about the work you do</h5>
									</div>
								</div>
							</div>
						</section>
						<div style="padding-left: 45px">
							<h4><b>Technical</b></h4>
							<br>
							<h5 id="company_of_role"></h5>
							<br>
							<h4>What's your current title?</h4>
							<br>
							<h5>Title</h5>
							<br>
							<select class="form-control" id="role" name="role">
								<option value="0" disabled selected>---select your role---</option>
								@foreach ($roles as $role)
								    <option value="{{$role->id}}">{{$role->role_text}}</option>
								@endforeach
						    </select>
						</div>
				    </div>
			      	<div class="modal-footer">
				        <button id="role_btn" type="button" class="btn btn-primary">Continue</button>
			      	</div>
			    </form>
		    </div>
	  	</div>
	</div>
	<!-- date modal -->
	<div id="dateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="top: 5%;" class="container modal fade">
	  	<div class="modal-dialog" role="document">
		    <div class="modal-content">
			    <form id="date_form">
			    	<div class="modal-body">
			    		<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="width: 30px;height: 30px;">
				        	<span aria-hidden="true">&times;</span>
				        </button>
			    		<section style="background: #17a2b8">
							<div class="container">
								<div class="row">
									<div class="col-md-12">
										<h3>OK, let's add your work dates</h3>
									</div>
								</div>
							</div>
						</section>
						<div style="padding-left: 45px">
							<h4><b>{{$profile->role['role_text']}}</b></h4>
							<br>
							<h4>When did you start working at <span id="company_of_date"></span>?</h4>
							<br>
							<div class="row">
								<div class="col-md-5">
									<h5>Start Date</h5>
									<br>	
									<input type="text" name="start_date" id="start_date" value="{{$profile->start_date}}" required>
								</div>
								<div class="col-md-5">
									<h5>End Date</h5>
									<br>	
									<input type="text" name="end_date" id="end_date" value="{{$profile->end_date}}" required>
								</div>
							</div>
							<div class="form-check">
							    <input type="checkbox" class="form-check-input" id="work_here">
							    <label class="form-check-label" for="work_here">I currently work here</label>
							</div>
							<br>
							<h5>Industry *</h5>
							<br>
							<select class="form-control" id="industry" name="industry">
								<option value="0" disabled selected>---select your industry---</option>
						      	@foreach ($industries as $industry)
								    <option value="{{$industry->id}}">{{$industry->industry_text}}</option>
								@endforeach
						    </select>
						</div>
				    </div>
			      	<div class="modal-footer">
				        <button id="date_btn" type="button" class="btn btn-primary">Add to profile</button>
			      	</div>
			    </form>
		    </div>
	  	</div>
	</div>
	<!-- info modal -->
	<div id="infoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="top: 5%;" class="container modal fade">
	  	<div class="modal-dialog" role="document">
		    <div class="modal-content">
			    <form id="info_form">
			    	<div class="modal-body">
			    		<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="width: 30px;height: 30px;">
				        	<span aria-hidden="true">&times;</span>
				        </button>
			    		<section style="background: #17a2b8">
							<div class="container">
								<div class="row">
									<div class="col-md-12">
										<h3>Looking good, <span id="surname_of_info"></span>! We've added your current position</h3>
									</div>
								</div>
							</div>
						</section>
						<div style="padding-left: 45px">
							<h4><b id="role_of_info"></b></h4>
							<br>
							<h5 id="company_of_info"></h5>
							<br>
							<h4>From <span id="start_date_of_info"></span> ~ To <span id="end_date_of_info"></span></h4>
							<br>
						</div>
				    </div>
			      	<div class="modal-footer">
				        <a id="info_btn" href="" type="button" class="btn btn-primary">Done</a>
			      	</div>
			    </form>
		    </div>
	  	</div>
	</div>
	<!-- contact modal -->
	<div id="contactModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="top: 5%;" class="container modal fade">
	  	<div class="modal-dialog" role="document">
		    <div class="modal-content">
			    <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Edit contact info</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			        	<span aria-hidden="true">&times;</span>
			        </button>
			    </div>
			    <form id="contact_form">
			    	<div class="modal-body">
			    		<div class="row" style="margin: auto;">
			    			<div class="col-md-6">
			    				<p>Phone number:</p><br>
			    				<input type="text" class="col-md-12" id="phone" name="phone" required placeholder="phone number" value="{{$profile->phone}}" style="font-size: 15px">
			    			</div>
			    			<div class="col-md-6">
			    				<p>number type:</p><br>
			    				<select class="col-md-12" id="phone_type" name="phone_type">
									<option value="0" disabled selected>---select your phone type---</option>
									@foreach ($phone_types as $phone_type)
									    <option value="{{$phone_type->id}}">{{$phone_type->phone_type_text}}</option>
									@endforeach
							    </select>
			    			</div>
			    		</div>
						<div class="row" style="margin: auto;">
			    			<div class="col-md-12">
			    				<p>Address:</p><br>
			    				<textarea class="col-md-12" id="address" name="address" rows="3">{{$profile->address}}</textarea>
			    			</div>
			    		</div>
			    		<div class="row" style="margin: auto;">
			    			<div class="col-md-12">
			    				<p>Email:</p><br>
			    				<input id="email" name="email" type="email" class="col-md-12" style="font-size: 15px" placeholder="email" value="{{$user->email}}">
			    			</div>
			    		</div>
				    </div>
			      	<div class="modal-footer">
				        <button id="contact_btn" type="button" class="btn btn-primary">Save</button>
			      	</div>
			    </form>
		    </div>
	  	</div>
	</div>
	<!-- overall modal -->
	<div id="overallModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="top: 2%;" class="container modal fade">
	  	<div class="modal-dialog" role="document">
		    <div class="modal-content">
			    <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Edit personal info</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			        	<span aria-hidden="true">&times;</span>
			        </button>
			    </div>
			    <form id="overall_form">
			    	<div class="modal-body">
			    		@if ($profile->cover_image)
						    <section id="cover_image_show_t" style="background:url({{asset('').$profile->cover_image }})">
						@else
						    <section id="cover_image_show_t" style="background: #5f5f9a">
						@endif
							<div class="container">
								<div class="row">
									<div class="col-md-12">
										<div class="user_img">
											@if ($profile->profile_image)
											    <img id="profile_image_show_t" class="img-circle" src="{{ 
												asset('').$profile->profile_image }}">
											@else
											    <img id="profile_image_show_t" class="img-circle" src="{{ 
												asset('img/user_img.png') }}">
											@endif
											<a id="profile_image_btn_t">
												<i class="fa fa-edit"></i>
											</a>
											<input type="file" id="profile_image_t" name="profile_image_t" style="display: none"  accept=".jpg,.png,.bmp" >
										</div>
										<div class="user_info">
											<a id="cover_image_btn_t">
												<i class="fa fa-edit"></i>
											</a>
											<input type="file" id="cover_image_t" name="cover_image_t" style="display: none"  accept=".jpg,.png,.bmp">
										</div>
									</div>
								</div>
							</div>
						</section>
			    		<div class="row" style="margin: auto;">
			    			<div class="col-md-6">
			    				<p>first name:</p><br>
			    				<input type="text" class="col-md-12" id="surname_t" name="surname_t" placeholder="first name" value="{{$user->surname}}" required autofocus>
			    			</div>
			    			<div class="col-md-6">
			    				<p>last name:</p><br>
			    				<input type="text" class="col-md-12" id="lasname_t" name="lasname_t" placeholder="last name" value="{{$user->lasname}}" required autofocus>
			    			</div>
			    		</div>
			    		<div class="row" style="margin: auto;">
			    			<div class="col-md-12">
			    				<p>your headline:</p><br>
			    				<input type="text" class="col-md-12" id="headline_t" name="headline_t" placeholder="headline" value="{{$profile->headline}}" required autofocus>
			    			</div>
			    		</div>
			    		<div class="row" style="margin: auto;">
			    			<div class="col-md-12">
			    				<p>overview:</p><br>
			    				<textarea class="col-md-12" id="overview_t" name="overview_t" style="margin: auto;" rows="3">{{$profile->overview}}</textarea>
			    			</div>
			    		</div>
			    		<div class="row" style="margin: auto;">
			    			<div class="col-md-12">
			    				<p>company:</p><br>
			    				<input type="text" class="col-md-12" id="company_t" name="company_t" placeholder="headline" value="{{$profile->company}}">
			    			</div>
			    		</div>
			    		<div class="row" style="margin: auto;">
			    			<div class="col-md-6">
			    				<p>role:</p><br>
			    				<select class="col-md-12" id="role_t" name="role_t">
									<option value="0" disabled selected>---select your role---</option>
									@foreach ($roles as $role)
									    <option value="{{$role->id}}">{{$role->role_text}}</option>
									@endforeach
							    </select>
			    			</div>
			    			<div class="col-md-6">
			    				<p>industry:</p><br>
			    				<select class="col-md-12" id="industry_t" name="industry_t">
									<option value="0" disabled selected>---select your industry---</option>
							      	@foreach ($industries as $industry)
									    <option value="{{$industry->id}}">{{$industry->industry_text}}</option>
									@endforeach
							    </select>
			    			</div>
			    		</div>
			    		<br>
						<div class="row" style="margin: auto;">
			    			<div class="col-md-6">
			    				<p>start date:</p><br>
			    				<input type="text" class="col-md-12" id="start_date_t" name="start_date_t" value="{{$profile->start_date}}" required>
			    			</div>
			    			<div class="col-md-6">
			    				<p>end date:</p><br>
			    				<input type="text" class="col-md-12" id="end_date_t" name="end_date_t" value="{{$profile->end_date}}" required>
			    			</div>
			    		</div>
						<div class="row" style="margin: auto;">
			    			<div class="col-md-6">
			    				<p>Phone number:</p><br>
			    				<input type="text" class="col-md-12" id="phone_t" name="phone_t" required placeholder="phone number" value="{{$profile->phone}}">
			    			</div>
			    			<div class="col-md-6">
			    				<p>number type:</p><br>
			    				<select class="col-md-12" id="phone_type_t" name="phone_type_t">
									<option value="0" disabled selected>---select your phone type---</option>
									@foreach ($phone_types as $phone_type)
									    <option value="{{$phone_type->id}}">{{$phone_type->phone_type_text}}</option>
									@endforeach
							    </select>
			    			</div>
			    		</div>
						<div class="row" style="margin: auto;">
			    			<div class="col-md-12">
			    				<p>Address:</p><br>
			    				<textarea class="col-md-12" id="address_t" name="address_t" rows="3">{{$profile->address}}</textarea>
			    			</div>
			    		</div>
			    		<div class="row" style="margin: auto;">
			    			<div class="col-md-12">
			    				<p>Email:</p><br>
			    				<input type="email" class="col-md-12" id="email_t" name="email_t" placeholder="email" value="{{$user->email}}">
			    			</div>
			    		</div>
				    </div>
			      	<div class="modal-footer">
				        <button id="overall_btn" type="button" class="btn btn-primary">Save</button>
			      	</div>
			    </form>
		    </div>
	  	</div>
	</div>
	<section class="add_profile">
		<div class="container">
			<div class="row">
				<div class="col-md-5" style="margin-bottom: 25px">
			   		<a type="button" class="btn btn-info btn-sm" style="height: 35px;border-radius: 15px" data-toggle="modal" data-target="#introModal">
			   			Create your profile
			   		</a>
				</div>
			</div>
		</div>
	</section>
	@if ($profile->cover_image)
	    <section class="user_profile" style="background:url({{asset('').$profile->cover_image }});background-size: 100% 100%;background-repeat: no-repeat;">
	@else
	    <section class="user_profile">
	@endif
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="user_img">
						@if ($profile->profile_image)
						    <img id="profile_image_show" class="img-circle" src="{{ 
							asset('').$profile->profile_image }}">
						@else
						    <img id="profile_image_show" class="img-circle" src="{{ 
							asset('img/user_img.png') }}">
						@endif
					</div>
					<div class="user_info">
						<h4>{{$user->surname}}&nbsp&nbsp&nbsp{{$user->lasname}}</h4>
						<p>{{$profile->headline}}</p>
						<span>{{$profile->address}}</span>
						<a href="" data-toggle="modal" data-target="#overallModal">
							<i class="fa fa-edit"></i>
						</a>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</section>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="user_extra">
						<div class="user_more_details">
							 <div class="dropdown">
							 	<button class="btn_de btn_pink">Add profile section <i class="fa fa-caret-down"></i></button>
							 	<div class="dropdown_inner">
							 		<ul>
							 			<li><a href="#">Link 1</a></li>
							 			<li><a href="#">Link 2</a></li>
							 			<li><a href="#">Link 3</a></li>
							 		</ul>
							 	</div>
							 </div>
							 <a class="btn_de btn_defult" href="#">More</a>
							 <p>{{$profile->overview}}</p>
						</div>
						<div class="gallery">
							<h4>GaLLery Media</h4>
							<div class="gallery_list">
								<div class="row">
									<div class="col-md-6 col-lg-4">
										<div class="gallery_img">
											<img src="{{ asset('img/gallery_img.png') }}" alt="">
										</div>
									</div>
									<div class="col-md-6 col-lg-8">
										<div class="gallery_img">
											<img src="{{ asset('img/product_img_01.png') }}" alt="">
											<div class="video_icon" data-id="{{ asset('img/welcome.mp4') }}"  data-toggle="modal" data-target="#popup_video">
												<img src="{{ asset('img/play_icon.png') }}" alt="">
											</div>
										</div>
									</div>
									<div class="showless">
										<a href="#">Show less <i class="fa fa-angle-up"></i></a>
									</div>
								</div>
								<div class="modal" id="popup_video">
									<div class="modal-dialog">
									    <div class="modal-content">
											<div class="modal-header">
									        	<button type="button" class="close" data-dismiss="modal">&times;</button>
									      	</div>
											<div class="modal-body">
									        	<video class="video" controls>
													<source src="" type="video/mp4">
												</video>
									      	</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="dashboard">
							<h4>Dashboard</h4>
							<p class="sub">Private to you</p>
							<div class="dashboard_list">
								<div class="row">
									<div class="col-md-6">
										<div class="dashboard_info">
											<h3>230</h3>
											<p>WHO VIEWED YOUR PROFILE</p>
										</div>
									</div>
									<div class="col-md-6">
										<div class="dashboard_info">
											<h3>3,129</h3>
											<p>SEARCH APPERANCES</p>
										</div>
									</div>
								</div>
							</div>
							<ul class="da_more_info">
								<li>
									<i class="fa fa-user"></i>
									<div class="da_list">
										<h5>{{$profile->company}}</h5>
										<p>{{$profile->role['role_text']}}</p>
										<br>
										<b style="color: gray">												{{$profile->start_date}}&nbsp-&nbsp{{$profile->end_date}}
										</b>
									</div>
									<div class="clearfix"></div>
								</li>
							</ul>
							
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="user_right">
						<ul class="socail">
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-instagram"></i></a></li>
							<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
							<li><a href="#"><i class="fa fa-youtube"></i></a></li>	
						</ul>
						<div class="contact">
							<ul>
								<li>
									<img src="{{ asset('img/gallery_img.png') }}" alt=""><br> 
									<a href="" data-toggle="modal" data-target="#contactModal">
									See contact info</a>
									<div class="clearfix"></div>
								</li>
								<li>
									<img src="{{ asset('img/gallery_img.png') }}" alt=""> 
									<span>See connections (500+)</span>
									<div class="clearfix"></div>
								</li>
							</ul>
						</div>
						<div class="stren">
							<h4>Strengthen your <br>Profile</h4>
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud </p>
							<a href="#" class="btn_de btn_pink">update education</a>
						</div>
						<div class="people">
							<h4>People Also <br>Viewed</h4>
							<ul class="people_list">
								<li>
									<a href="#">
										<div class="people_img">
											<img src="{{ asset('img/employee_img.png') }}" alt="">
										</div>
										<div class="people_info">
											<h5>Anthony Pridham</h5>
											<p>Sales and Operations Manager at Protec FRP and Hoze Hydraulics</p>
										</div>
										<div class="clearfix"></div>
									</a>
								</li>
								<li>
									<a href="#">
										<div class="people_img">
											<img src="{{ asset('img/employee_img.png') }}" alt="">
										</div>
										<div class="people_info">
											<h5>Anthony Pridham</h5>
											<p>Sales and Operations Manager at Protec FRP and Hoze Hydraulics</p>
										</div>
										<div class="clearfix"></div>
									</a>
								</li>
								<li>
									<a href="#">
										<div class="people_img">
											<img src="{{ asset('img/employee_img.png') }}" alt="">
										</div>
										<div class="people_info">
											<h5>Anthony Pridham</h5>
											<p>Sales and Operations Manager at Protec FRP and Hoze Hydraulics</p>
										</div>
										<div class="clearfix"></div>
									</a>
								</li>
								<li>
									<a href="#">
										<div class="people_img">
											<img src="{{ asset('img/employee_img.png') }}" alt="">
										</div>
										<div class="people_info">
											<h5>Anthony Pridham</h5>
											<p>Sales and Operations Manager at Protec FRP and Hoze Hydraulics</p>
										</div>
										<div class="clearfix"></div>
									</a>
								</li>
								<li>
									<a href="#">
										<div class="people_img">
											<img src="{{ asset('img/employee_img.png') }}" alt="">
										</div>
										<div class="people_info">
											<h5>Anthony Pridham</h5>
											<p>Sales and Operations Manager at Protec FRP and Hoze Hydraulics</p>
										</div>
										<div class="clearfix"></div>
									</a>
								</li>
								<li>
									<a href="#">
										<div class="people_img">
											<img src="{{ asset('img/employee_img.png') }}" alt="">
										</div>
										<div class="people_info">
											<h5>Anthony Pridham</h5>
											<p>Sales and Operations Manager at Protec FRP and Hoze Hydraulics</p>
										</div>
										<div class="clearfix"></div>
									</a>
								</li>
								<li>
									<a href="#">
										<div class="people_img">
											<img src="{{ asset('img/employee_img.png') }}" alt="">
										</div>
										<div class="people_info">
											<h5>Anthony Pridham</h5>
											<p>Sales and Operations Manager at Protec FRP and Hoze Hydraulics</p>
										</div>
										<div class="clearfix"></div>
									</a>
								</li>
								<li>
									<a href="#">
										<div class="people_img">
											<img src="{{ asset('img/employee_img.png') }}" alt="">
										</div>
										<div class="people_info">
											<h5>Anthony Pridham</h5>
											<p>Sales and Operations Manager at Protec FRP and Hoze Hydraulics</p>
										</div>
										<div class="clearfix"></div>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</section>
	<section class="signup">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h4>Sign up to receive <b>free updates</b> <i>as soon as they hit!</i></h4>
				</div>
				<div class="col-md-6 col-lg-3">
					<div class="signup_fileld">
						<i class="fa fa-user"></i>
						<input type="text" class="form-control" placeholder="Your name" name="">
					</div>
				</div>
				<div class="col-md-6 col-lg-3">
					<div class="signup_fileld">
						<i class="fa fa-paper-plane"></i>
						<input type="email" class="form-control" placeholder="Email Address" name="">
					</div>
				</div>
				<div class="col-md-6 col-lg-3">
					<div class="signup_fileld">
						<i class="fa fa-unlock-alt"></i>
						<input type="password" class="form-control" placeholder="Email Password" name="">
					</div>
				</div>
				<div class="term_condition">
					<div class="form-group form-check">
					    <label class="form-check-label">
					      <input class="form-check-input" type="checkbox"> I agree to Seekproducts.com’s <a href="#">terms of service</a>
					    </label>
					</div>
				</div>
				<div class="col-md-6 col-lg-3">
					<div class="signup_fileld">
						<input type="submit" class="btn_blue btn_de" value="Sign up for free" name="">
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</section>
	<script type="text/javascript">
		$(document).ready(function(){
		    $("#start_date").datepicker( {
			    format: "mm-yyyy",
			    startView: "months", 
			    minViewMode: "months",
			    endDate: '0d'
			});
			$("#end_date").datepicker( {
			    format: "mm-yyyy",
			    startView: "months", 
			    minViewMode: "months",
    			endDate: '0d'
			});
			$("#start_date_t").datepicker( {
			    format: "mm-yyyy",
			    startView: "months", 
			    minViewMode: "months",
			    endDate: '0d'
			});
			$("#end_date_t").datepicker( {
			    format: "mm-yyyy",
			    startView: "months", 
			    minViewMode: "months",
			    endDate: '0d'
			});
			$("#profile_image_btn").click(function(e){
				e.preventDefault();
				$("#profile_image").trigger("click");
			});
			$("#cover_image_btn").click(function(e){
				e.preventDefault();
				$("#cover_image").trigger("click");
			});
			$("#profile_image_btn_t").click(function(e){
				e.preventDefault();
				$("#profile_image_t").trigger("click");
			});
			$("#cover_image_btn_t").click(function(e){
				e.preventDefault();
				$("#cover_image_t").trigger("click");
			});
			//intro modal
			$("#intro_btn").click(function(e){
				e.preventDefault();
				var form = new FormData();
				form.append('_token', "{{ csrf_token()}}");
				form.append('surname', $('#surname').val());
				form.append('lasname', $('#lasname').val());
				form.append('headline', $('#headline').val());
				form.append('overview', $('#overview').val());
				form.append('profile_image', $('#profile_image')[0].files[0]);
				form.append('cover_image', $('#cover_image')[0].files[0]);
				$.ajax({
				    url: "{{route('add_intro_info')}}",
				    data: form,
				    cache: false,
				    contentType: false,
				    processData: false,
				    type: 'POST',
				    success:function(pageinfo) {
				        if(pageinfo.progress=="success"){
				        	setTimeout(function() {
							    $('#introModal').modal('toggle');
							}, 500);
							setTimeout(function() {
							    $('#companyModal').modal('toggle');
							}, 500);
				        }
				    }
				});
			});

			//company modal
			$('#self-employed').change(function() {
		        if($(this).is(":checked")) {
		            $("#company").prop('disabled', true);
		            $("#company").val("self-employed");
		        }else{
		        	$("#company").prop('disabled', false);
		        	$("#company").val("");
		        }
		    });
			$("#company_btn").click(function(e){
				e.preventDefault();
				$("#company_of_role").html($("#company").val());
				var form = new FormData();
				form.append('_token', "{{ csrf_token()}}");
				form.append('company', $('#company').val());
				$.ajax({
				    url: "{{route('add_company_info')}}",
				    data: form,
				    cache: false,
				    contentType: false,
				    processData: false,
				    type: 'POST',
				    success:function(pageinfo) {
				        if(pageinfo.progress=="success"){
				        	setTimeout(function() {
							    $('#companyModal').modal('toggle');
							}, 500);
							setTimeout(function() {
							    $('#roleModal').modal('toggle');
							}, 500);
				        }
				    }
				});
			});

			//role modal
			$("#role").val("{{$profile->role}}");
			$("#role_btn").click(function(e){
				e.preventDefault();
				$("#company_of_date").html($("#company").val());
				var form = new FormData();
				form.append('_token', "{{ csrf_token()}}");
				form.append('role', $('#role').val());
				$.ajax({
				    url: "{{route('add_role_info')}}",
				    data: form,
				    cache: false,
				    contentType: false,
				    processData: false,
				    type: 'POST',
				    success:function(pageinfo) {
				        if(pageinfo.progress=="success"){
				        	setTimeout(function() {
							    $('#roleModal').modal('toggle');
							}, 500);
							setTimeout(function() {
							    $('#dateModal').modal('toggle');
							}, 500);
				        }
				    }
				});
			});

			//date modal
			$("#industry").val("{{$profile->industry}}");
			$('#work_here').change(function() {
				var d = new Date();
				var end_date = d.getMonth()+1+"-"+d.getFullYear()
		        if($(this).is(":checked")) {
		        	if(end_date.length==6){
		        		$("#end_date").val("0"+end_date);
		        	}else{
		        		$("#end_date").val(end_date);
		        	}
		        }else{
		        	$("#end_date").val('');
		        }
		    });
			$("#date_btn").click(function(e){
				e.preventDefault();
				$("#company_of_info").html($("#company").val());
				$("#role_of_info").html($("#role option:selected").text());
				$("#start_date_of_info").html($("#start_date").val());
				$("#end_date_of_info").html($("#end_date").val());
				$("#surname_of_info").html($("#surname").val());
				var form = new FormData();
				form.append('_token', "{{ csrf_token()}}");
				form.append('start_date', $('#start_date').val());
				form.append('end_date', $('#end_date').val());
				form.append('industry', $('#industry').val());
				$.ajax({
				    url: "{{route('add_date_info')}}",
				    data: form,
				    cache: false,
				    contentType: false,
				    processData: false,
				    type: 'POST',
				    success:function(pageinfo) {
				        if(pageinfo.progress=="success"){
				        	setTimeout(function() {
							    $('#dateModal').modal('toggle');
							}, 500);
							setTimeout(function() {
							    $('#infoModal').modal('toggle');
							}, 500);
				        }
				    }
				});
			});

			//contact modal
			$("#phone_type").val("{{$profile->phone_type}}");
			$("#contact_btn").click(function(e){
				e.preventDefault();
				var form = new FormData();
				form.append('_token', "{{ csrf_token()}}");
				form.append('phone', $('#phone').val());
				form.append('phone_type', $('#phone_type').val());
				form.append('address', $('#address').val());
				form.append('email', $('#email').val());
				$.ajax({
				    url: "{{route('add_contact_info')}}",
				    data: form,
				    cache: false,
				    contentType: false,
				    processData: false,
				    type: 'POST',
				    success:function(pageinfo) {
				        if(pageinfo.progress=="success"){
				        	location.reload();
				        }
				    }
				});
			});

			function readURL(input,type, s=null) {
		        if (input.files && input.files[0]) {
		            var reader = new FileReader();
		            
		            reader.onload = function (e) {
		            	if(s=="t"){
		            		if(type=="p"){
			            		$('#profile_image_show_t').attr('src', e.target.result);
			            	}
			            	if(type=="c"){
			            		$('#cover_image_show_t').css("background", 'url('+e.target.result+')');
			            	}
		            	}else{
		            		if(type=="p"){
			            		$('#profile_image_show').attr('src', e.target.result);
			            	}
			            	if(type=="c"){
			            		$('#cover_image_show').css("background", 'url('+e.target.result+')');
			            	}
		            	}
		            }
		            reader.readAsDataURL(input.files[0]);
		        }
		    }
		    $("#profile_image").change(function(){
		        readURL(this,"p");
		    });
		    $("#cover_image").change(function(){
		        readURL(this,"c");
		    });
		    $("#profile_image_t").change(function(){
		        readURL(this,"p","t");
		    });
		    $("#cover_image_t").change(function(){
		        readURL(this,"c","t");
		    });
		    //overall modal
		    $("#role_t").val("{{$profile->role}}");
		    $("#industry_t").val("{{$profile->industry}}");
		    $("#phone_type_t").val("{{$profile->phone_type}}");
		    $("#overall_btn").click(function(e){
		    	e.preventDefault();
		    	var form = new FormData();
				form.append('_token', "{{ csrf_token()}}");
				form.append('surname_t', $('#surname_t').val());
				form.append('lasname_t', $('#lasname_t').val());
				form.append('headline_t', $('#headline_t').val());
				form.append('overview_t', $('#overview_t').val());
				form.append('profile_image_t', $('#profile_image_t')[0].files[0]);
				form.append('cover_image_t', $('#cover_image_t')[0].files[0]);
				form.append('company_t', $('#company_t').val());
				form.append('role_t', $('#role_t').val());
				form.append('start_date_t', $('#start_date_t').val());
				form.append('end_date_t', $('#end_date_t').val());
				form.append('industry_t', $('#industry_t').val());
				form.append('phone_t', $('#phone_t').val());
				form.append('phone_type_t', $('#phone_type_t').val());
				form.append('address_t', $('#address_t').val());
				form.append('email_t', $('#email_t').val());
				$.ajax({
				    url: "{{route('add_overall_info')}}",
				    data: form,
				    cache: false,
				    contentType: false,
				    processData: false,
				    type: 'POST',
				    success:function(pageinfo) {
				        if(pageinfo.progress=="success"){
							location.reload();
				        }
				    }
				});
		    });
		});
	</script>
@endsection