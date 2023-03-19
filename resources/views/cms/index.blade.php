<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />

	<!-- Stylesheets & Title
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="{{ asset('cms/css/style.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('cms/css/bootstrap.css') }}" />
	<!-- <link rel="stylesheet" type="text/css" href="{{ asset('cms/css/dark.css') }}" /> -->
	<link rel="stylesheet" type="text/css" href="{{ asset('cms/css/font-icons.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('cms/css/et-line.css') }}" />
	

</head>
<body class="stretched">

	<!-- The Main Wrapper
	============================================= -->
	<div id="wrapper">

		<!-- Header
		============================================= -->
		<header id="header" class="no-sticky">
			<div id="header-wrap">
                <div class="container">
                    <div class="header-row">
                        
                        <div id="logo">
                            <a href="index.html" class="standard-logo" data-dark-logo="{{ asset('cms/images/logo-dark.png') }}">
                                <img src="{{ asset('cms/images/logo.png') }}" alt="Logo">
                            </a>
                        </div>

                        <nav class="primary-menu">
                            <ul class="menu-container">
								<li class="menu-item">
									<a class="menu-link" href=""><div>Halaman Utama</div></a>
                                </li>
								<li class="menu-item">
									<a class="menu-link" href=""><div>Kegiatan</div></a>
                                </li>
								<li class="menu-item">
									<a class="menu-link" href=""><div>Keuangan</div></a>
                                </li>
								<li class="menu-item">
									<a class="menu-link" href=""><div>Gallery</div></a>
                                    <ul class="sub-menu-container">
										<li class="menu-item">
											<a class="menu-link" href=""><div><i class="icon-picture"></i> Foto</div></a>
										</li>
										<li class="menu-item">
											<a class="menu-link" href=""><div><i class="icon-video"></i> Video</div></a>
										</li>
                                    </ul>
                                </li>
								<li class="menu-item">
									<a class="menu-link" href=""><div>Jadwal</div></a>
                                    <ul class="sub-menu-container">
										<li class="menu-item">
											<a class="menu-link" href=""><div><i class="icon-users"></i> Khotib Jum'at</div></a>
										</li>
										<li class="menu-item">
											<a class="menu-link" href=""><div><i class="icon-users"></i> Kajian Ikhwan</div></a>
										</li>
                                    </ul>
                                </li>
								<li class="menu-item">
									<a class="menu-link" href=""><div>Pengaturan</div></a>
                                    <ul class="sub-menu-container">
										<li class="menu-item">
											<a class="menu-link" href=""><div><i class="icon-users"></i> Pengguna</div></a>
										</li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>

                    </div>
                </div>
            </div>
		</header>

		<!-- Page Title
		============================================= -->
        <section id="page-title" class="page-title-mini">
			<div class="container clearfix">
				<!-- <h1>Pengguna</h1> -->
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">CMS</a></li>
					<li class="breadcrumb-item"><a href="#">Pengaturan</a></li>
					<li class="breadcrumb-item active" aria-current="page">Pengguna</li>
				</ol>
			</div>
		</section>


		<!-- Site Content
		============================================= -->
		<section id="content">
			<div class="content-wrap">
				<div class="container">

					<div class="fancy-title title-bottom-border">
						<h1>Pengguna</h1>
					</div>

					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
							<tr>
								<th>#</th>
								<th>Nama</th>
								<th>Email</th>
								<th>Status</th>
								<th></th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td>1</td>
								<td>Mark</td>
								<td>Otto@email.com</td>
								<td><span class="badge bg-success py-1 px-2">Aktif</span></td>
								<td></td>
							</tr>
							<tr>
								<td>2</td>
								<td>Jacob</td>
								<td>Thornton@email.com</td>
								<td><span class="badge bg-success py-1 px-2">Aktif</span></td>
								<td></td>
							</tr>
							<tr>
								<td>3</td>
								<td>Larry</td>
								<td>the Bird@email.com</td>
								<td><span class="badge bg-danger py-1 px-2">Non Aktif</span></td>
								<td></td>
							</tr>
							</tbody>
						</table>
					</div>

					<ul class="pagination justify-content-end">
						<li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"> <span aria-hidden="true">«</span></a></li>
						<li class="page-item active"><a class="page-link" href="#">1 <span class="visually-hidden">(current)</span></a></li>
						<li class="page-item"><a class="page-link" href="#">2</a></li>
						<li class="page-item"><a class="page-link" href="#">3</a></li>
						<li class="page-item"><a class="page-link" href="#">4</a></li>
						<li class="page-item"><a class="page-link" href="#">5</a></li>
						<li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
					</ul>

				</div>
			</div>
		</section>

		<!-- Footer
		============================================= -->
		<footer id="footer" class="dark">
			<div class="container">

				...

			</div>

			<!-- Copyrights
			============================================= -->
			<div id="copyrights">
				<div class="container">

					...

				</div>
			</div>

		</footer>

	</div>

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>



    <!-- JavaScripts
    ============================================= -->
    <script src="{{ asset('cms/js/jquery.js') }}"></script>
    <script src="{{ asset('cms/js/plugins.min.js') }}"></script>

    <!-- Footer Scripts
    ============================================= -->
    <script src="{{ asset('cms/js/functions.js') }}"></script>

</body>
</html>