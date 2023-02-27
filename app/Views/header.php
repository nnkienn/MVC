<header class="header-v4">
		<!-- Header desktop -->
		<div class="container-menu-desktop trans-03">
			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop p-l-45">
					
					<!-- Logo desktop -->		
					<a href="#" class="logo">
						<img src="<?=$_ENV['BASE_URL']?>/template/images/logo1.png" alt="">
					</a>


					<?php $menusTop = \App\Helpers\ViewComposer::getDataMenuIsActive(); ?>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li><a href="/">Trang Chủ</a></li>

							<?=\App\Helpers\ViewComposer::loadViewMenuTop($menusTop)?>

							<li><a href="/">Dịch Vụ</a></li>
							<li><a href="/">Tin Tức</a></li>
							<li><a href="/">Liên Hệ</a></li>
						</ul>
					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m h-full">							
						<div class="flex-c-m h-full p-r-25 bor6">
							<div class="icon-header-item hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart" data-notify="2">
								<i class="fas fa-shopping-cart"></i>
							</div>
						</div>
							
						<div class="flex-c-m h-full p-lr-19">
							<div class="icon-header-item cl0 hov-cl1 trans-04 p-lr-11 js-show-sidebar">
								<i class="zmdi zmdi-menu"></i>
							</div>
						</div>
					</div>
				</nav>
			</div>	
		</div>



		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="/"><img src="<?=$_ENV['BASE_URL']?>/template/images/logo.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m h-full m-r-15">
				<div class="flex-c-m h-full p-r-5">
					<div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart" data-notify="2">
						<i class="zmdi zmdi-shopping-cart"></i>
					</div>
				</div>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="main-menu-m">

				<li><a href="/">Trang Chủ</a></li>

				<?=\App\Helpers\ViewComposer::loadViewMenuTop($menusTop, 0, 'sub-menu-m')?>

				<li><a href="/">Dịch Vụ</a></li>
				<li><a href="/">Tin Tức</a></li>
				<li><a href="/">Liên Hệ</a></li>
			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<button class="flex-c-m btn-hide-modal-search trans-04">
				<i class="zmdi zmdi-close"></i>
			</button>

			<form class="container-search-header">
				<div class="wrap-search-header">
					<input class="plh0" type="text" name="search" placeholder="Search...">

					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
				</div>
			</form>
		</div>
	</header>

		