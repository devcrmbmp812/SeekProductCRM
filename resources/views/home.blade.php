@extends('layouts.app')

@section('content')
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="search">
            <h3>Search your product</h3>
            <div class="search_form">
              <i class="fa fa-search"></i>
              <input type="text" class="form-control" name="">
              <input type="submit" value="Search" class="btn_de btn_pink" name="">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="search_bg">
      <img src="{{asset('img/serach_img.png')}}" align="">
    </div>
  </section>
  <section class="padd-30">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <div class="forums">
            <div class="title">
              <h3>Forums</h3>
              <p>Lorem ipsum dolor sit amet, consectetuer adipiscing </p>
            </div>
            <div class="forums_box">
              <div class="row justify-content-md-center">
                <div class="col-md-6 col-lg-5">
                  <div class="forums_box_inner">
                    <div class="box-icon">
                      <img src="{{asset('img/box_icon_01.png')}}" align="">
                    </div>
                    <h4>Industry</h4>
                    <ul>
                      <li>Lorem ipsum dolor</li>
                      <li>Lorem ipsum dolor</li>
                      <li>Lorem ipsum dolor</li>
                      <li>Lorem ipsum dolor</li>
                      <li>Lorem ipsum dolor</li>
                    </ul>
                  </div>
                  <a class="btn_de btn_pink" href="#">see more</a>
                </div>
                <div class="col-md-6 col-lg-5">
                  <div class="forums_box_inner bg_gray">
                    <div class="box-icon">
                      <img src="{{asset('img/box_icon_02.png')}}" align="">
                    </div>
                    <h4>Products</h4>
                    <ul>
                      <li>Lorem ipsum dolor</li>
                      <li>Lorem ipsum dolor</li>
                      <li>Lorem ipsum dolor</li>
                      <li>Lorem ipsum dolor</li>
                      <li>Lorem ipsum dolor</li>
                    </ul>
                  </div>
                  <a class="btn_de btn_blue" href="#">see more</a>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="side_banner">
            <a href="#">
              <img src="{{asset('img/side_banner.png')}}" align="">
            </a>
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

@endsection
{{-- @include('inc.footer') --}}
