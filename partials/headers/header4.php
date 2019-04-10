<style>
  #gallery{
    background-color: #ddd;
    height: 265px;
    position: relative;
  }
  #g_title{
    font-size: 100px;
    color: #fff;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
  }

  .navbar-brand img{
    height: 40px;
    margin-left: -14px;
  }

  .navbar-brand img:hover{
    opacity: 0.9;
  }
  .header4{
    padding: 0;
    margin: 5px 0;
    height: 140px !important;
  }
  .header4 .container{
    padding: 0;
  }

  .navbar-header{
    /* width: 100%; */
  }
  /*Increases the height of navbar*/
  #bs-example-navbar-collapse-1{
      margin: 0;
      padding: 0;
  }

  ul#menu-main-menu li{
    padding: 0;
    margin-right: 60px;
  }

  ul#menu-main-menu > li > a{
    font-weight: bold;
    font-size: 15px;
    padding: 0;
    color: #000;
  }

  ul#menu-main-menu > li.active > a,
  ul#menu-main-menu > li > a:hover,
  ul#menu-main-menu > li > a:focus
   {
    color:#666;
    background-color: transparent;
  }

  ul.dropdown-menu{
    width: inherit;
    border: none;
    box-shadow: none;
  }

  ul.dropdown-menu li{
    height: 22px;
    /* width: 100%; */
  }

  ul.dropdown-menu li a{
    text-align:left;
    padding-left: 0;
    font-size: 15px;
    font-weight: bold;
  }

  ul.dropdown-menu li a:hover {
    /* display: block; */
    color: #fff;
    background-color: #F58634;
  }

  /* ul.dropdown-menu .active{
    color:#666;
    background-color: transparent;
  } */

  /*Brings the menu down*/
  ul.navbar-nav{
    margin: 0;
    padding: 0;
  }



  #social-main{
    /* background-color:#333; */
    padding:0;
    height:60px;
    margin-top: 5px;
  }

  #social-main ul{
    list-style-type: none;
    margin: 0;
    padding: 0;
    /* background-color: green; */
    height:28px;
    width: 164px;
  }
  #social-main ul li {
    float:right;
  }
  #social-main ul li a{
    display: inline-block;
    background-color: #ddd;
    padding: 4px 8px;
    margin-left: 4px;
  }

  #social-main ul li a i{
    color: #F58634;
  }

  /* @media only screen and (max-width: 768px) {

  .header4{
    margin: 0;
    padding: 0;
    border-radius: 0;
    border: none;
  }
  #bs-example-navbar-collapse-1{
      margin: 0;
      padding: 0;
  }

  ul#menu-main-menu {
        background-color: #000;
  }
  ul#menu-main-menu li{
    padding: 0;
    margin: 0;
  }
} */


@media (max-width: 768px) {
  .header4 .navbar-collapse {
    background: #000;
    color: #fff; }
  .header4 {
    padding: 10px 15px; } }
.header4  .navbar-nav li.sp_search_item.active a {
  border: none; }
  /* MENU ICON THAT HANDLES THE RESPONSIVE MENU */ }
</style>

<div id="gallery" class="container">
  <div id="g_title">
    Gallery Space
  </div>
</div>

<div id="social-main" class="container">
      <?php do_action('sp_logo'); ?>
      <ul class="pull-right">
        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
        <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
        <li><a href="#"><i class="fa fa-search"></i></a></li>
      </ul>
</div>

<nav class="navbar header4">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle top-buffer" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<?php do_action('sp_nav_menu');?>

	</div>
	<!-- /.container-fluid -->
</nav>
