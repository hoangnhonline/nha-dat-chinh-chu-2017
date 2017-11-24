<!DOCTYPE html>
<!--[if lt IE 7 ]><html dir="ltr" lang="vi-VN" class="no-js ie ie6 lte7 lte8 lte9"><![endif]-->
<!--[if IE 7 ]><html dir="ltr" lang="vi-VN" class="no-js ie ie7 lte7 lte8 lte9"><![endif]-->
<!--[if IE 8 ]><html dir="ltr" lang="vi-VN" class="no-js ie ie8 lte8 lte9"><![endif]-->
<!--[if IE 9 ]><html dir="ltr" lang="vi-VN" class="no-js ie ie9 lte9"><![endif]-->
<!--[if IE 10 ]><html dir="ltr" lang="vi-VN" class="no-js ie ie10 lte10"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="vn">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>@yield('title')</title>
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="robots" content="index,follow" />
		<!-- <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
		<link rel="icon" href="images/favicon.ico" type="image/x-icon"> -->

		<!-- ===== Style CSS ===== -->
		<link rel="stylesheet" type="text/css" href="{!! asset('public/assets/css/style.css') !!}">
		<!-- ===== Responsive CSS ===== -->
		<link rel="stylesheet" type="text/css" href="{!! asset('public/assets/css/responsive.css') !!}">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<link href='css/animations-ie-fix.css' rel='stylesheet'>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		@yield('css')
	</head>
	<body>
		<div id="fb-root"></div>
		<script>
			(function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) return;
				js = d.createElement(s); js.id = id;
				js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>
		<header class="header">
			<div class="header-top">
				<div class="row">
					<div class="col-sm-6 hdr-top-left">
						<p class="hotline">Hotline <a href="tel:0802838118123">(+08)(028) 38-118-123</a> / <a href="tel:0802838118133">(+08)(028) 38-118-133</a></p>
					</div>
					<div class="col-sm-6 col-xs-12 hdr-top-right">
						<ul class="hdr-social">
							@if (auth('web')->check())
								<li class="login"><a href="{{ route('auth.logout') }}">Đăng xuất</a></li>
							@else
								<li class="login"><a href="{{ route('auth.login') }}">Đăng nhập</a> / <a href="{{ route('auth.register') }}">Đăng ký</a></li>
							@endif
							<li class="social-icon"><a href=""><i class="fa fa-facebook"></i></a></li>
							<li class="social-icon"><a href=""><i class="fa fa-google"></i></a></li>
							<li class="social-icon"><a href=""><i class="fa fa-youtube"></i></a></li>
							<li class="lang">
								@foreach (config('laravellocalization.supportedLocales') as $language => $data)
									<a href="{{ config('app.locale') == $language ? url()->current() : change_language(url()->current(), $language) }}" title="{{ $data['native'] }}" data-language="{!! $language !!}">{{ $data['native'] }}</a>
								@endforeach
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="block-header">
				<div class="row">
					<div class="col-sm-3 col-xs-12 block-logo">
						<a href="index.html" title="Logo">
							<img src="{!! asset('public/assets/images/logo.png') !!}" alt="Logo Housland">
						</a>
					</div><!-- /block-logo -->
					<div class="col-sm-9 col-xs-12">
						<div class="menu">
							<div class="nav-toogle">
								<i class="fa"></i>
							</div>
							<nav class="menu-top">
								<ul class="nav-menu">
									<li class="level0 active"><a href="index.html">Trang Chủ</a></li>
									<li class="level0"><a href="about.html">Đất</a></li>
									<li class="level0"><a href="">Nhà</a></li>
									<li class="level0"><a href="">Căn Hộ</a></li>
									<li class="level0"><a href="">Văn Phòng</a></li>
									<li class="level0"><a href="">Phòng</a></li>
									<li class="level0"><a href="">Xây Dựng - Sữa Chữa</a></li>
									<!-- <li class="level0 menu_more">
                                        <a href=""><span>&nbsp;</span></a>
                                    </li> -->
								</ul>
							</nav><!-- /menu-top -->
						</div><!-- /menu -->

					</div><!-- /bblock-info -->
					<div class="hdr-btn-post">
						<a href="{{ route('member.register-land') }}" class="btn">Đăng tin miễn phí</a>
					</div>
				</div>
				<div class="block-fb">
					<div class="icon">
						<i class="fa fa-facebook"></i>
					</div>
					<div class="fb-inner">
						<div class="fb-page" data-href="https://www.facebook.com/facebook" data-tabs="timeline" data-width="300px" data-height="500px" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote></div>
					</div>
				</div>
			</div><!-- /block-header-bottom -->
		</header><!-- /header -->
		<div class="wrapper">
			@yield('content')
		</div><!-- /wrapper-->
		<footer class="footer">
			<div class="footer-top">
				<div class="row">
					<div class="col-sm-3 col-xs-12 ft-info">
						<div class="ft-block">
							<h3 class="ft-block-tit">LÝ NGUYỄN</h3>
							<div class="ft-block-body">
								<div class="about-info">
									<p>Lý Nguyễn cung cấp thông tin bất động sản và cập nhật xu hường thị trường bất động sản tại Việt Nam</p>
								</div>
								<address>
									<ul>
										<li><span class="fa fa-map-marker"></span> <span>403 Nguyễn Thái Bình, P.12, Q. Tân Bình, Tp. HCM</span></li>
										<li><span class="fa fa-phone"></span> <span>(08)-(028)38118123</span></li>
										<li><span class="fa fa-envelope"></span> <span><a href="mailto:nguyenbich@lynguyen.vn">nguyenbich@lynguyen.vn</a></span></li>
									</ul>
								</address>
							</div>
						</div>
					</div>
					<div class="col-sm-3 col-xs-12 ft-time-work">
						<div class="ft-block">
							<h3 class="ft-block-tit">THỜI GIAN LÀM VIỆC</h3>
							<div class="ft-block-body">
								<ul class="ft-block-menu">
									<li>Thứ 2 - thứ 6: 8h sáng - 6h chiều</li>
									<li>Thứ 7: 9h sáng - 3h chiều</li>
									<li>Chủ nhật: Nghỉ</li>
									<li>Chúng tôi làm việc tất cả ngày lễ</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-3 col-xs-12">
						<div class="ft-block">
							<h3 class="ft-block-tit">ĐƯỜNG DẪN THÔNG TIN</h3>
							<div class="ft-block-body">
								<ul class="ft-block-menu">
									<li><a href="#">Điều kiện sử dụng</a></li>
									<li><a href="#">Về chúng tôi</a></li>
									<li><a href="#">Miễn trừ trách nhiệm</a></li>
									<li><a href="#">Thông tin liện hệ hỗ trợ</a></li>
									<li><a href="#">Tuyển dụng</a></li>
									<li><a href="#">Câu hỏi thường gặp</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-3 col-xs-12">
						<div class="ft-block">
							<h3 class="ft-block-tit">TIN TỨC BẤT ĐỘNG SẢN</h3>
							<div class="ft-block-body">
								<div class="block-recent-property">
									<ul class="list">
										<li class="item">
											<div class="box-thumb">
												<a href=""><img src="uploads/bds_001_150x150.jpg" alt=""></a>
											</div>
											<div class="box-content">
												<p class="item-date">Ngày đăng tin: <span>06/10/2017</span></p>
												<p class="item-title"><a href="">Cần bán nhà 15/2 đường Nguyễn Thái Bình</a></p>
												<p class="item-price">VNĐ <span>1,2 tỷ</span></p>
											</div>
										</li>
										<li class="item">
											<div class="box-thumb">
												<a href=""><img src="uploads/bds_002_150x150.jpg" alt=""></a>
											</div>
											<div class="box-content">
												<p class="item-date">Ngày đăng tin: <span>06/10/2017</span></p>
												<p class="item-title"><a href="">Cần bán nhà 15/2 đường Nguyễn Thái Bình</a></p>
												<p class="item-price">VNĐ <span>1,2 tỷ</span></p>
											</div>
										</li>
										<li class="item">
											<div class="box-thumb">
												<a href=""><img src="uploads/bds_003_150x150.jpg" alt=""></a>
											</div>
											<div class="box-content">
												<p class="item-date">Ngày đăng tin: <span>06/10/2017</span></p>
												<p class="item-title"><a href="">Cần bán nhà 15/2 đường Nguyễn Thái Bình</a></p>
												<p class="item-price">VNĐ <span>1,2 tỷ</span></p>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-bot">
				<div class="row">
					<div class="col-md-6">
						<p class="ft-copyright">2017 Thiết kế bởi Công Ty Cổ Phần Lý Nguyễn</p>
					</div>
					<div class="col-md-6">
						<ul class="ft-social">
							<li><a href=""><i class="fa fa-facebook"></i></a></li>
							<li><a href=""><i class="fa fa-google"></i></a></li>
							<li><a href=""><i class="fa fa-twitter"></i></a></li>
							<li><a href=""><i class="fa fa-youtube"></i></a></li>
							<li><a href=""><i class="fa fa-skype"></i></a></li>
						</ul>
					</div>
				</div>
			</div><!-- /footer-bot-->
		</footer><!-- footer -->
		<!-- ===== JS ===== -->
		<script src="{!! asset('public/assets/js/jquery.min.js') !!}"></script>
		<!-- ===== JS Jquery Ui ===== -->
		<script src="{!! asset('public/assets/lib/jquery-ui/jquery-ui.min.js') !!}"></script>
		<!-- ===== JS Bootstrap ===== -->
		<script src="{!! asset('public/assets/lib/bootstrap/bootstrap.min.js') !!}"></script>
		<!-- ===== Select2 ===== -->
		<script src="{!! asset('public/assets/lib/select2/select2.min.js') !!}"></script>
		<!-- carousel -->
		<script src="{!! asset('public/assets/lib/carousel/owl.carousel.min.js') !!}"></script>
		<!-- sticky -->
		<script src="{!! asset('public/assets/lib/sticky/jquery.sticky.js') !!}"></script>
		<!-- Js Common -->
		<script src="{!! asset('public/assets/js/common.js') !!}"></script>
		<script src="{!! asset('public/assets/js/frontend.js') !!}"></script>
		<script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });
		</script>
		@yield('javascript')
	</body>
</html>
