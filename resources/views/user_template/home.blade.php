@extends('user_template.layouts.template')
@section('main-content')

<section id="billboard">

	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<button class="prev slick-arrow">
					<i class="icon icon-arrow-left"></i>
				</button>

				<div class="main-slider pattern-overlay">
                    
					<div class="slider-item">
						<div class="banner-content">
							<h2 class="banner-title">Kürk Mantolu Madonna</h2>
							<p>Sebahattin Ali</p>
							<div class="btn-wrap">
								<a href="#" class="btn btn-outline-accent btn-accent-arrow">Read More<i class="icon icon-ns-arrow-right"></i></a>
							</div>
						</div><!--banner-content--> 
						<img src="{{ asset('home/images/main-banner1.jpg') }}" alt="banner" class="banner-image">
					</div><!--slider-item-->

					<div class="slider-item">
						<div class="banner-content">
							<h2 class="banner-title">Kuyucaklı Yusuf</h2>
							<p>Sebahattin Ali</p>
							<div class="btn-wrap">
								<a href="#" class="btn btn-outline-accent btn-accent-arrow">Read More<i class="icon icon-ns-arrow-right"></i></a>
							</div>
						</div><!--banner-content--> 
						<img src="{{ asset('home/images/main-banner2.jpg') }}" alt="banner" class="banner-image">
					</div><!--slider-item-->

				</div><!--slider-->
					
				<button class="next slick-arrow">
					<i class="icon icon-arrow-right"></i>
				</button>
				
			</div>
		</div>
	</div>
	
</section>

<section id="client-holder" data-aos="fade-up">
	<div class="container">
		<div class="row">
			<div class="inner-content">
				<div class="logo-wrap">
					<div class="grid">
						<a href="#"><img src="{{ asset('home/images/client-image1.png') }}" alt="client"></a>
						<a href="#"><img src="{{ asset('home/images/client-image2.png') }}" alt="client"></a>
						<a href="#"><img src="{{ asset('home/images/client-image3.png') }}" alt="client"></a>
						<a href="#"><img src="{{ asset('home/images/client-image4.png') }}" alt="client"></a>
						<a href="#"><img src="{{ asset('home/images/client-image5.png') }}" alt="client"></a>
					</div>
				</div><!--image-holder-->
			</div>
		</div>
	</div>
</section>

{{-- 
<section id="best-selling" class="leaf-pattern-overlay">
	<div class="corner-pattern-overlay"></div>
	<div class="container">
		<div class="row">

			<div class="col-md-8 col-md-offset-2">

				<div class="row">

					<div class="col-md-6">
						<figure class="products-thumb">
							<img src="{{ asset('home/images/single-image.jpg') }}" alt="book" class="single-image">
						</figure>	
					</div>

					<div class="col-md-6">
						<div class="product-entry">
							<h2 class="section-title divider">Best Selling Book</h2>

							<div class="products-content">
								<div class="author-name">By Timbur Hood</div>
								<h3 class="item-title">Birds gonna be happy</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero ipsum enim pharetra hac.</p>
								<div class="item-price">$ 45.00</div>
								<div class="btn-wrap">
									<a href="#" class="btn-accent-arrow">shop it now <i class="icon icon-ns-arrow-right"></i></a>
								</div>
							</div>

						</div>
					</div>

				</div>
				<!-- / row -->

			</div>

		</div>
	</div>
</section> --}}

<section id="popular-books" class="bookshelf">
	<div class="container">
	<div class="row">
		<div class="col-md-12">

			<div class="section-header align-center">
				<div class="title">
					<span>Some quality items</span>
				</div>
				<h2 class="section-title">Popular Books</h2>
			</div>
   
			<ul class="tabs">
			  <li data-tab-target="#all-genre" class="active tab">All Genre</li>
              <li data-tab-target="#roman" class="tab">Roman</li>
			  <li data-tab-target="#felsefe" class="tab">Felsefe</li>
			  <li data-tab-target="#bilim" class="tab">Bilim</li>
			  <li data-tab-target="#oyku" class="tab">Öykü</li>
			  <li data-tab-target="#kisiselgelisim" class="tab">Kişisel Gelişim</li>
			  <li data-tab-target="#cocuk" class="tab">Çocuk ve Gençlik</li>
			</ul>

			<div class="tab-content">
			  <div id="all-genre" data-tab-content class="active">
			  	<div class="row">
                    @foreach ($allproducts as $product)
                    <div class="col-md-3">
                        <figure class="product-style">
                          <img src="{{ asset($product->product_img) }}" alt="Books" class="product-item">
                          <div class="btn_main">
                            <form action="{{ route('addproducttocart', $product->id) }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $product->id }}" name="product_id">
                                <input type="hidden" value="{{ $product->price }}" name="price">
                                <input type="hidden" value="1" name="quantity">
                                <input type="submit"  class="add-to-cart" data-product-tile="add-to-cart" value="Add To Cart">
                            </form>
                          </div>
                          <figcaption>
                              <h3>{{ $product->product_name }}</h3>
                              <p>{{ $product->product_author }} <br> Quantity: {{ $product->product_quantity }}</p>
                              <p></p>
                              <div class="item-price">{{ $product->product_price }} TL</div>
                          </figcaption>
                      </figure>
                    </div>
                    @endforeach
				  	

				  	
		    	</div>

			  </div>
			  <div id="roman" data-tab-content>
			  	<div class="row">
                    @foreach ($allproducts as $product)
                    @if ($product->product_subcategory_name == 'Roman')
				  	<div class="col-md-3">
					  	<figure class="product-style">
							<img src="{{ asset($product->product_img) }}" alt="Books" class="product-item">
                            <div class="btn_main">
                                <form action="{{ route('addproducttocart', $product->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $product->id }}" name="product_id">
                                    <input type="hidden" value="{{ $product->price }}" name="price">
                                    <input type="hidden" value="1" name="quantity">
                                    <input type="submit"  class="add-to-cart" data-product-tile="add-to-cart" value="Add To Cart">
                                </form>
                              </div>
							<figcaption>
								<h3>{{ $product->product_name }}</h3>
								<p>{{ $product->product_author }}<br> Quantity: {{ $product->product_quantity }}</p>
								<div class="item-price">{{ $product->product_price }} TL</div>
							</figcaption>
						</figure>
					</div>
                    @endif
                    @endforeach
				  	

		    	 </div>
			  </div>

			  <div id="felsefe" data-tab-content>
			  	<div class="row">
                    @foreach ($allproducts as $product)
                    @if ($product->product_subcategory_name == 'Felsefe')
                    <div class="col-md-3">
                        <figure class="product-style">
                          <img src="{{ asset($product->product_img) }}" alt="Books" class="product-item">
                          <div class="btn_main">
                              <form action="{{ route('addproducttocart', $product->id) }}" method="POST">
                                  @csrf
                                  <input type="hidden" value="{{ $product->id }}" name="product_id">
                                  <input type="hidden" value="{{ $product->price }}" name="price">
                                  <input type="hidden" value="1" name="quantity">
                                  <input type="submit"  class="add-to-cart" data-product-tile="add-to-cart" value="Add To Cart">
                              </form>
                            </div>
                          <figcaption>
                              <h3>{{ $product->product_name }}</h3>
                              <p>{{ $product->product_author }}<br> Quantity: {{ $product->product_quantity }}</p>
                              <div class="item-price">{{ $product->product_price }} TL</div>
                          </figcaption>
                      </figure>
                  </div>
                    @endif
                    @endforeach

				  	
		    	 </div>
			  </div>

			  <div id="bilim" data-tab-content>
			  	<div class="row">
                    @foreach ($allproducts as $product)
                    @if ($product->product_subcategory_name == 'Bilim')
                    <div class="col-md-3">
                        <figure class="product-style">
                          <img src="{{ asset($product->product_img) }}" alt="Books" class="product-item">
                          <div class="btn_main">
                              <form action="{{ route('addproducttocart', $product->id) }}" method="POST">
                                  @csrf
                                  <input type="hidden" value="{{ $product->id }}" name="product_id">
                                  <input type="hidden" value="{{ $product->price }}" name="price">
                                  <input type="hidden" value="1" name="quantity">
                                  <input type="submit"  class="add-to-cart" data-product-tile="add-to-cart" value="Add To Cart">
                              </form>
                            </div>
                          <figcaption>
                              <h3>{{ $product->product_name }}</h3>
                              <p>{{ $product->product_author }}<br> Quantity: {{ $product->product_quantity }}</p>
                              <div class="item-price">{{ $product->product_price }} TL</div>
                          </figcaption>
                      </figure>
                  </div>
                    @endif
                    @endforeach
				  	
		    	 </div>
			  </div>

			  <div id="oyku" data-tab-content>
			  	<div class="row">
                    @foreach ($allproducts as $product)
                    @if ($product->product_subcategory_name == 'Öykü')
                    <div class="col-md-3">
                        <figure class="product-style">
                          <img src="{{ asset($product->product_img) }}" alt="Books" class="product-item">
                          <div class="btn_main">
                              <form action="{{ route('addproducttocart', $product->id) }}" method="POST">
                                  @csrf
                                  <input type="hidden" value="{{ $product->id }}" name="product_id">
                                  <input type="hidden" value="{{ $product->price }}" name="price">
                                  <input type="hidden" value="1" name="quantity">
                                  <input type="submit"  class="add-to-cart" data-product-tile="add-to-cart" value="Add To Cart">
                              </form>
                            </div>
                          <figcaption>
                              <h3>{{ $product->product_name }}</h3>
                              <p>{{ $product->product_author }}<br> Quantity: {{ $product->product_quantity }}</p>
                              <div class="item-price">{{ $product->product_price }} TL</div>
                          </figcaption>
                      </figure>
                  </div>
                    @endif
                    @endforeach

		    	 </div>
			  </div>

			  <div id="kisiselgelisim" data-tab-content>
			  	<div class="row">
                    @foreach ($allproducts as $product)
                    @if ($product->product_subcategory_name == 'Kişisel Gelişim')
                    <div class="col-md-3">
                        <figure class="product-style">
                          <img src="{{ asset($product->product_img) }}" alt="Books" class="product-item">
                          <div class="btn_main">
                              <form action="{{ route('addproducttocart', $product->id) }}" method="POST">
                                  @csrf
                                  <input type="hidden" value="{{ $product->id }}" name="product_id">
                                  <input type="hidden" value="{{ $product->price }}" name="price">
                                  <input type="hidden" value="1" name="quantity">
                                  <input type="submit"  class="add-to-cart" data-product-tile="add-to-cart" value="Add To Cart">
                              </form>
                            </div>
                          <figcaption>
                              <h3>{{ $product->product_name }}</h3>
                              <p>{{ $product->product_author }}<br> Quantity: {{ $product->product_quantity }}</p>
                              <div class="item-price">{{ $product->product_price }} TL</div>
                          </figcaption>
                      </figure>
                  </div>
                    @endif
                    @endforeach

		    	 </div>
			  </div>

              <div id="cocuk" data-tab-content>
                <div class="row">
                  @foreach ($allproducts as $product)
                  @if ($product->product_subcategory_name == 'Çocuk ve Gençlik')
                  <div class="col-md-3">
                      <figure class="product-style">
                        <img src="{{ asset($product->product_img) }}" alt="Books" class="product-item">
                        <div class="btn_main">
                            <form action="{{ route('addproducttocart', $product->id) }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $product->id }}" name="product_id">
                                <input type="hidden" value="{{ $product->price }}" name="price">
                                <input type="hidden" value="1" name="quantity">
                                <input type="submit"  class="add-to-cart" data-product-tile="add-to-cart" value="Add To Cart">
                            </form>
                          </div>
                        <figcaption>
                            <h3>{{ $product->product_name }}</h3>
                            <p>{{ $product->product_author }}<br> Quantity: {{ $product->product_quantity }}</p>
                            <div class="item-price">{{ $product->product_price }} TL</div>
                        </figcaption>
                    </figure>
                </div>
                  @endif
                  @endforeach

               </div>
            </div>

			</div>

		</div><!--inner-tabs-->
			
		</div>
	</div>
</section>

<section id="quotation" class="align-center">
	<div class="inner-content">
		<h2 class="section-title divider">Quote of the day</h2>
		<blockquote data-aos="fade-up">
			<q>“The more that you read, the more things you will know. The more that you learn, the more places you’ll go.”</q>
			<div class="author-name">Dr. Seuss</div>			
		</blockquote>
	</div>		
</section>


<section id="subscribe">
	<div class="container">
		<div class="row">

			<div class="col-md-8 col-md-offset-2">
				<div class="row">

					<div class="col-md-6">

						<div class="title-element">
							<h2 class="section-title divider">Subscribe to our newsletter</h2>
						</div>

					</div>
					<div class="col-md-6">

						<div class="subscribe-content" data-aos="fade-up">
							<p>Sed eu feugiat amet, libero ipsum enim pharetra hac dolor sit amet, consectetur. Elit adipiscing enim pharetra hac.</p>
							<form id="form">
								<input type="text" name="email" placeholder="Enter your email addresss here">
								<button class="btn-subscribe">
									<span>send</span> 
									<i class="icon icon-send"></i>
								</button>
							</form>
						</div>

					</div>
					
				</div>
			</div>
			
		</div>
	</div>
</section>

<section id="latest-blog">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<div class="section-header align-center">
					<div class="title">
						<span>Read our articles</span>
					</div>
					<h2 class="section-title">Latest Articles</h2>
				</div>

				<div class="row">

					<div class="col-md-4">

						<article class="column" data-aos="fade-up">

							<figure>
								<a href="#" class="image-hvr-effect">
									<img src="{{ asset('home/images/post-img1.jpg') }}" alt="post" class="post-image">			
								</a>
							</figure>

							<div class="post-item">	
								<div class="meta-date">Mar 30, 2021</div>			
							    <h3><a href="#">Reading books always makes the moments happy</a></h3>

							    <div class="links-element">
								    <div class="categories">inspiration</div>
								    <div class="social-links">
										<ul>
											<li>
												<a href="#"><i class="icon icon-facebook"></i></a>
											</li>
											<li>
												<a href="#"><i class="icon icon-twitter"></i></a>
											</li>
											<li>
												<a href="#"><i class="icon icon-behance-square"></i></a>
											</li>
										</ul>
									</div>
								</div><!--links-element-->

							</div>
						</article>
						
					</div>
					<div class="col-md-4">

						<article class="column" data-aos="fade-down">
							<figure>
								<a href="#" class="image-hvr-effect">
									<img src="{{ asset('home/images/post-img2.jpg') }}" alt="post" class="post-image">
								</a>
							</figure>
							<div class="post-item">	
								<div class="meta-date">Mar 29, 2021</div>			
							    <h3><a href="#">Reading books always makes the moments happy</a></h3>

							    <div class="links-element">
								    <div class="categories">inspiration</div>
								    <div class="social-links">
										<ul>
											<li>
												<a href="#"><i class="icon icon-facebook"></i></a>
											</li>
											<li>
												<a href="#"><i class="icon icon-twitter"></i></a>
											</li>
											<li>
												<a href="#"><i class="icon icon-behance-square"></i></a>
											</li>
										</ul>
									</div>
								</div><!--links-element-->

							</div>
						</article>
						
					</div>
					<div class="col-md-4">

						<article class="column" data-aos="fade-up">
							<figure>
								<a href="#" class="image-hvr-effect">
									<img src="{{ asset('home/images/post-img3.jpg') }}" alt="post" class="post-image">
								</a>
							</figure>
							<div class="post-item">		
								<div class="meta-date">Feb 27, 2021</div>			
							    <h3><a href="#">Reading books always makes the moments happy</a></h3>

							    <div class="links-element">
								    <div class="categories">inspiration</div>
								    <div class="social-links">
										<ul>
											<li>
												<a href="#"><i class="icon icon-facebook"></i></a>
											</li>
											<li>
												<a href="#"><i class="icon icon-twitter"></i></a>
											</li>
											<li>
												<a href="#"><i class="icon icon-behance-square"></i></a>
											</li>
										</ul>
									</div>
								</div><!--links-element-->

							</div>
						</article>
						
					</div>

				</div>

				<div class="row">

					<div class="btn-wrap align-center">
						<a href="#" class="btn btn-outline-accent btn-accent-arrow" tabindex="0">Read All Articles<i class="icon icon-ns-arrow-right"></i></a>
					</div>
				</div>

			</div>	
		</div>
	</div>
</section>

<section id="download-app" class="leaf-pattern-overlay">
	<div class="corner-pattern-overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="row">

						<div class="col-md-5">
							<figure>
								<img src="{{ asset('home/images/device.png') }}" alt="phone" class="single-image">
							</figure>
						</div>

						<div class="col-md-7">
							<div class="app-info">
								<h2 class="section-title divider">Download our app now !</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sagittis sed ptibus liberolectus nonet psryroin. Amet sed lorem posuere sit iaculis amet, ac urna. Adipiscing fames semper erat ac in suspendisse iaculis.</p>
								<div class="google-app">
									<img src="{{ asset('home/images/google-play.jpg') }}" alt="google play">
									<img src="{{ asset('home/images/app-store.jpg') }}" alt="app store">
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
</section>
@endsection