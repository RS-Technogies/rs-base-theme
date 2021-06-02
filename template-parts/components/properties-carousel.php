<!-- Content ================================================== -->
<properties-carousel v-if="properties.length>0" v-bind:properties="properties" class="container" inline-template>
	<div class="row">
	
		<div class="col-md-12">
			<h3 class="headline margin-bottom-25 margin-top-65">Newly Added</h3>
		</div>
		
		<!-- Carousel -->
		<div class="col-md-12">
			<div class="carousel">
				
				<!-- Listing Item -->
				<div class="carousel-item" v-for="property in properties">
					<div>
						<a href="single-property-page-1.html" class="listing-img-container">
							<div class="listing-badges">
								<span class="featured">Featured</span>
								<span>{{property.status}}</span>
							</div>
							<div class="listing-img-content">
								<span class="listing-price">{{property.price}}</span>
								<span class="like-icon with-tip" data-tip-content="Add to Bookmarks"></span>
								<span class="compare-button with-tip" data-tip-content="Add to Compare"></span>
							</div>
							<div class="listing-carousel">
								<div v-for="image in property.attachments.photo">
									<img v-bind:src="image" alt="">
								</div>
							</div>
						</a>
						<div class="listing-content">
							<div class="listing-title">
								<h4><a href="single-property-page-1.html">{{property.title}}</a></h4>
								<div>
									<i class="fa fa-map-marker"></i>
									<span>{{property.address}}</span>
								</div>
							</div>
							<ul class="listing-features">
								<li>Property Id <span>{{property.property_id}}</span></li>
								<li>Strategy Type <span>{{property.strategy_type}}</span></li>
							</ul>
						</div>
					</div>
				</div>
				<!-- Listing Item / End -->
			</div>
		</div>
		<!-- Carousel / End -->

	</div>
</properties-carousel>