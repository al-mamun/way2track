<!-- header start -->
<div class="header_wrap">
    @if($isMobileVersion== 1)
     <div class="header_services">
        <ul id="menu" style="display:none">
            <li>
				<a href="#" class="active">Services</a>
			</li>
			<li>
				<a href="#">Products</a>
			</li>
			<li>
				<a href="#">Initiatives</a>
			</li>
			<li>
				<a href="#">About</a>
			</li>
        </ul>
        <a href="#" class="logo">
			<img src="{{ URL::asset( 'assets/img/logo.png') }}" alt="site logo">
		</a>
		<div class="header-right d-flex align-items-stretch">

		    <div class="social-media">
					<a href="#">
					    <svg width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.9317 2.80859C12.9408 2.93184 12.9408 3.05513 12.9408 3.17838C12.9408 6.93784 9.96857 11.2696 4.53615 11.2696C2.86252 11.2696 1.30781 10.803 0 9.99299C0.237791 10.0194 0.466404 10.0282 0.713344 10.0282C2.09429 10.0282 3.36553 9.57918 4.38068 8.8132C3.08202 8.78678 1.9937 7.96797 1.61873 6.841C1.80166 6.8674 1.98455 6.88502 2.17663 6.88502C2.44184 6.88502 2.70708 6.84979 2.95399 6.78818C1.60046 6.52403 0.585285 5.37947 0.585285 3.99719V3.96198C0.978526 4.17329 1.43584 4.30535 1.92051 4.32294C1.12485 3.81227 0.603584 2.94065 0.603584 1.95455C0.603584 1.4263 0.749884 0.942059 1.00597 0.519445C2.46011 2.2451 4.64588 3.37205 7.09684 3.49533C7.05113 3.28402 7.02368 3.06393 7.02368 2.84382C7.02368 1.27662 8.34064 0 9.97767 0C10.8282 0 11.5964 0.34337 12.136 0.898047C12.8036 0.774791 13.4438 0.537061 14.0108 0.211307C13.7913 0.87165 13.3249 1.42633 12.7122 1.77848C13.3066 1.71688 13.8828 1.55836 14.4132 1.33828C14.0109 1.90173 13.5078 2.40356 12.9317 2.80859Z" fill="#084E8D"/>
                        </svg>
						<!--<i class="bi bi-twitter"></i>-->
					</a>
					<a href="#">
						<svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.72394 3.12037C4.93354 3.12037 3.4894 4.56451 3.4894 6.35491C3.4894 8.14531 4.93354 9.58945 6.72394 9.58945C8.51434 9.58945 9.95848 8.14531 9.95848 6.35491C9.95848 4.56451 8.51434 3.12037 6.72394 3.12037ZM6.72394 8.45778C5.56694 8.45778 4.62106 7.51473 4.62106 6.35491C4.62106 5.19509 5.56412 4.25204 6.72394 4.25204C7.88376 4.25204 8.82681 5.19509 8.82681 6.35491C8.82681 7.51473 7.88094 8.45778 6.72394 8.45778ZM10.8452 2.98806C10.8452 3.40751 10.5074 3.74251 10.0908 3.74251C9.67134 3.74251 9.33634 3.4047 9.33634 2.98806C9.33634 2.57143 9.67415 2.23362 10.0908 2.23362C10.5074 2.23362 10.8452 2.57143 10.8452 2.98806ZM12.9875 3.75377C12.9397 2.74315 12.7088 1.84795 11.9685 1.1104C11.2309 0.372844 10.3357 0.142006 9.32508 0.0913347C8.2835 0.0322178 5.16156 0.0322178 4.11998 0.0913347C3.11218 0.139191 2.21698 0.370029 1.47661 1.10758C0.73624 1.84514 0.508217 2.74034 0.457546 3.75095C0.398429 4.79254 0.398429 7.91447 0.457546 8.95606C0.505402 9.96667 0.73624 10.8619 1.47661 11.5994C2.21698 12.337 3.10936 12.5678 4.11998 12.6185C5.16156 12.6776 8.2835 12.6776 9.32508 12.6185C10.3357 12.5706 11.2309 12.3398 11.9685 11.5994C12.706 10.8619 12.9368 9.96667 12.9875 8.95606C13.0466 7.91447 13.0466 4.79535 12.9875 3.75377ZM11.6419 10.0736C11.4223 10.6254 10.9972 11.0505 10.4427 11.2729C9.61222 11.6022 7.64166 11.5262 6.72394 11.5262C5.80622 11.5262 3.83284 11.5994 3.0052 11.2729C2.45344 11.0533 2.02837 10.6282 1.80597 10.0736C1.47661 9.24319 1.55262 7.27263 1.55262 6.35491C1.55262 5.43719 1.47942 3.46381 1.80597 2.63618C2.02555 2.08442 2.45063 1.65934 3.0052 1.43695C3.83565 1.10758 5.80622 1.18359 6.72394 1.18359C7.64166 1.18359 9.61504 1.1104 10.4427 1.43695C10.9944 1.65653 11.4195 2.0816 11.6419 2.63618C11.9713 3.46663 11.8953 5.43719 11.8953 6.35491C11.8953 7.27263 11.9713 9.24601 11.6419 10.0736Z" fill="#084E8D"/>
                        </svg>
					</a>
					<a href="#">
						<svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.7425 0.0469971H0.929752C0.434296 0.0469971 0.0317383 0.455185 0.0317383 0.956272V11.7493C0.0317383 12.2504 0.434296 12.6586 0.929752 12.6586H11.7425C12.238 12.6586 12.6433 12.2504 12.6433 11.7493V0.956272C12.6433 0.455185 12.238 0.0469971 11.7425 0.0469971ZM3.84337 10.8569H1.97415V4.83828H3.84619V10.8569H3.84337ZM2.90876 4.01628C2.30915 4.01628 1.82495 3.52926 1.82495 2.93247C1.82495 2.33567 2.30915 1.84866 2.90876 1.84866C3.50556 1.84866 3.99257 2.33567 3.99257 2.93247C3.99257 3.53208 3.50838 4.01628 2.90876 4.01628ZM10.8501 10.8569H8.98091V7.92925C8.98091 7.23111 8.96684 6.3331 8.00971 6.3331C7.03568 6.3331 6.88649 7.09317 6.88649 7.87858V10.8569H5.01726V4.83828H6.81048V5.66029H6.83581C7.08636 5.18735 7.69723 4.68908 8.60651 4.68908C10.4982 4.68908 10.8501 5.93617 10.8501 7.55766V10.8569Z" fill="#084E8D"/>
                        </svg>
					</a>
					<a href="#">
						<svg width="16" height="11" viewBox="0 0 16 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.7554 1.82381C14.5896 1.18467 14.1012 0.681305 13.4811 0.510481C12.3571 0.200073 7.84994 0.200073 7.84994 0.200073C7.84994 0.200073 3.34281 0.200073 2.21877 0.510481C1.59865 0.681332 1.11025 1.18467 0.94449 1.82381C0.643311 2.98228 0.643311 5.39933 0.643311 5.39933C0.643311 5.39933 0.643311 7.81638 0.94449 8.97486C1.11025 9.614 1.59865 10.0964 2.21877 10.2672C3.34281 10.5776 7.84994 10.5776 7.84994 10.5776C7.84994 10.5776 12.3571 10.5776 13.4811 10.2672C14.1012 10.0964 14.5896 9.614 14.7554 8.97486C15.0566 7.81638 15.0566 5.39933 15.0566 5.39933C15.0566 5.39933 15.0566 2.98228 14.7554 1.82381ZM6.37585 7.59384V3.20483L10.1429 5.39939L6.37585 7.59384Z" fill="#084E8D"/>
                        </svg>
					</a>
				</div>

		</div>
	</div>
    @else
	<header>
		<nav>
			<div class="container-xl">
				<div class="d-flex justify-content-between align-items-center">
					<div class="header-left d-flex align-items-stretch">
						<a href="#" class="logo">
							<img src="{{ URL::asset( 'assets/img/logo.png') }}" alt="site logo">
						</a>
						<ul>
							<li  class="active">
								<a href="#">Services</a>
							</li>
							<li>
								<a href="#">Products</a>
							</li>
							<li>
								<a href="#">Initiatives</a>
							</li>
							<li>
								<a href="#">About</a>
							</li>
						</ul>
					</div>
					<div class="header-right d-flex align-items-stretch">

					    <div class="social-media">
								<a href="#">
								    <svg width="25" height="20" viewBox="0 0 25 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M22.4302 4.87153C22.446 5.08532 22.446 5.29916 22.446 5.51295C22.446 12.0338 17.2906 19.5473 7.86802 19.5473C4.96509 19.5473 2.26841 18.7379 0 17.333C0.412451 17.3788 0.808984 17.394 1.2373 17.394C3.63257 17.394 5.83755 16.6152 7.59834 15.2866C5.3458 15.2408 3.45811 13.8206 2.80771 11.8658C3.125 11.9116 3.44224 11.9422 3.77539 11.9422C4.2354 11.9422 4.69546 11.881 5.12373 11.7742C2.77603 11.316 1.01519 9.33077 1.01519 6.93317V6.87211C1.69727 7.23862 2.49048 7.46769 3.33115 7.4982C1.95107 6.61244 1.04692 5.1006 1.04692 3.3902C1.04692 2.47394 1.30068 1.63401 1.74487 0.900985C4.26709 3.89416 8.05835 5.84886 12.3096 6.06269C12.2303 5.69618 12.1827 5.31444 12.1827 4.93264C12.1827 2.21432 14.4669 0 17.3064 0C18.7816 0 20.1141 0.59558 21.05 1.55767C22.208 1.34389 23.3184 0.93154 24.302 0.366514C23.9212 1.51189 23.1122 2.47398 22.0494 3.08479C23.0805 2.97795 24.0799 2.703 24.9999 2.32126C24.302 3.29858 23.4295 4.16901 22.4302 4.87153Z" fill="#084E8D"/>
                                        </svg>

									<!--<i class="bi bi-twitter"></i>-->
								</a>
								<a href="#">
									<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.946 5.41235C7.84058 5.41235 5.33569 7.91724 5.33569 11.0227C5.33569 14.1282 7.84058 16.6331 10.946 16.6331C14.0515 16.6331 16.5564 14.1282 16.5564 11.0227C16.5564 7.91724 14.0515 5.41235 10.946 5.41235ZM10.946 14.6702C8.93921 14.6702 7.29858 13.0344 7.29858 11.0227C7.29858 9.01099 8.93433 7.37524 10.946 7.37524C12.9578 7.37524 14.5935 9.01099 14.5935 11.0227C14.5935 13.0344 12.9529 14.6702 10.946 14.6702ZM18.0945 5.18286C18.0945 5.9104 17.5085 6.49146 16.7859 6.49146C16.0584 6.49146 15.4773 5.90552 15.4773 5.18286C15.4773 4.46021 16.0632 3.87427 16.7859 3.87427C17.5085 3.87427 18.0945 4.46021 18.0945 5.18286ZM21.8103 6.51099C21.7273 4.75806 21.3269 3.20532 20.0427 1.92603C18.7634 0.646728 17.2107 0.246338 15.4578 0.158447C13.6511 0.0559082 8.23608 0.0559082 6.42944 0.158447C4.6814 0.241455 3.12866 0.641846 1.84448 1.92114C0.560303 3.20044 0.164795 4.75317 0.0769043 6.5061C-0.0256348 8.31274 -0.0256348 13.7278 0.0769043 15.5344C0.159912 17.2874 0.560303 18.8401 1.84448 20.1194C3.12866 21.3987 4.67651 21.7991 6.42944 21.887C8.23608 21.9895 13.6511 21.9895 15.4578 21.887C17.2107 21.804 18.7634 21.4036 20.0427 20.1194C21.322 18.8401 21.7224 17.2874 21.8103 15.5344C21.9128 13.7278 21.9128 8.31763 21.8103 6.51099ZM19.4763 17.4729C19.0955 18.4299 18.3582 19.1672 17.3962 19.553C15.9558 20.1243 12.5378 19.9924 10.946 19.9924C9.35425 19.9924 5.9314 20.1194 4.49585 19.553C3.53882 19.1721 2.80151 18.4348 2.41577 17.4729C1.84448 16.0325 1.97632 12.6145 1.97632 11.0227C1.97632 9.43091 1.84937 6.00806 2.41577 4.57251C2.79663 3.61548 3.53394 2.87817 4.49585 2.49243C5.93628 1.92114 9.35425 2.05298 10.946 2.05298C12.5378 2.05298 15.9607 1.92603 17.3962 2.49243C18.3533 2.87329 19.0906 3.6106 19.4763 4.57251C20.0476 6.01294 19.9158 9.43091 19.9158 11.0227C19.9158 12.6145 20.0476 16.0374 19.4763 17.4729Z" fill="#084E8D"/>
                                    </svg>

								</a>
								<a href="#">
									<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20.3125 0.081543H1.55762C0.698242 0.081543 0 0.789551 0 1.65869V20.3794C0 21.2485 0.698242 21.9565 1.55762 21.9565H20.3125C21.1719 21.9565 21.875 21.2485 21.875 20.3794V1.65869C21.875 0.789551 21.1719 0.081543 20.3125 0.081543ZM6.61133 18.8315H3.36914V8.39209H6.61621V18.8315H6.61133ZM4.99023 6.96631C3.9502 6.96631 3.11035 6.12158 3.11035 5.08643C3.11035 4.05127 3.9502 3.20654 4.99023 3.20654C6.02539 3.20654 6.87012 4.05127 6.87012 5.08643C6.87012 6.12646 6.03027 6.96631 4.99023 6.96631ZM18.7646 18.8315H15.5225V13.7534C15.5225 12.5425 15.498 10.9849 13.8379 10.9849C12.1484 10.9849 11.8896 12.3032 11.8896 13.6655V18.8315H8.64746V8.39209H11.7578V9.81787H11.8018C12.2363 8.99756 13.2959 8.1333 14.873 8.1333C18.1543 8.1333 18.7646 10.2964 18.7646 13.1089V18.8315Z" fill="#084E8D"/>
                                    </svg>

								</a>
								<a href="#">
									<svg width="25" height="19" viewBox="0 0 25 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M24.4776 2.89793C24.1901 1.78934 23.3429 0.916246 22.2673 0.619949C20.3177 0.081543 12.5 0.081543 12.5 0.081543C12.5 0.081543 4.68232 0.081543 2.73266 0.619949C1.65706 0.916293 0.80992 1.78934 0.522399 2.89793C0 4.90732 0 9.09973 0 9.09973C0 9.09973 0 13.2921 0.522399 15.3015C0.80992 16.4101 1.65706 17.2468 2.73266 17.5431C4.68232 18.0815 12.5 18.0815 12.5 18.0815C12.5 18.0815 20.3177 18.0815 22.2673 17.5431C23.3429 17.2468 24.1901 16.4101 24.4776 15.3015C25 13.2921 25 9.09973 25 9.09973C25 9.09973 25 4.90732 24.4776 2.89793ZM9.94316 12.9061V5.29334L16.4772 9.09982L9.94316 12.9061Z" fill="#084E8D"/>
                                    </svg>

								</a>
							</div>



							<!--

						<ul>
							<li>
								<a href="#">
									<img src="{{ URL::asset( 'assets/img/nav-icons/search.svg') }}" alt="search icon">
								</a>
							</li>
							<li>
								<a href="#">
									<span class="added-items">1</span>
									<img src="{{ URL::asset( 'assets/img/nav-icons/shopping-bag.svg') }}" alt="shopping bag icon">
								</a>
							</li>
							<li>
								<a href="#">
									<img src="{{ URL::asset( 'assets/img/nav-icons/user.svg') }}" alt="user icon">
								</a>
							</li>
						</ul>

						--->
						<!--
						<div class="cta-button">
							<a href="#">Book a Visit / Call</a>
						</div>

						-->
					</div>
				</div>
			</div>
		</nav>
	</header>
	@endif
	<!-- header end -->
	<!--<div class="banner_title_area"></div>-->
</div>