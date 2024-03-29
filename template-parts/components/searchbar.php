<searchbar inline-template>
	<div class="parallax" data-background="<?php echo bloginfo('template_directory');?>/images/home-parallax.jpg" data-color="#36383e" data-color-opacity="0.45" data-img-width="2500" data-img-height="1600">
		<div class="parallax-content">
			<div class="container">
				<div class="row">
					<div class="col-md-12">

						<!-- Main Search Container -->
						<div class="main-search-container">
							<h2>Find Your Dream Home</h2>
							
							<!-- Main Search -->
							<form class="main-search-form">
								
								<!-- Type -->
								<div class="search-type">
									<label class="active"><input class="first-tab" name="tab" checked="checked" type="radio">For Sale</label>
									<label><input name="tab" type="radio" v-on:change="setStatus">For Lease</label>
									<label><input name="tab" type="radio" v-on:change="setStatus">Sold</label>
									<label><input name="tab" type="radio" v-on:change="setStatus">Leased</label>
									<div class="search-type-arrow hidden lg:inline-block"></div>
								</div>

								
								<!-- Box -->
								<div class="main-search-box">
									
									<!-- Main Search Input -->
									<div class="main-search-input larger-input">
										<input type="text" class="ico-01" id="autocomplete-input" placeholder="Enter suburb or Post Code or State or Property ID or Keyword" value=""/>
										<button class="button">Search</button>
									</div>

									<!-- Row -->
									<div class="row with-forms">

										<!-- Strategy Type -->
										<div class="col-md-4">
											<select data-placeholder="Any Type" class="chosen-select-no-single" >
												<option v-for="strategy_type in strategy_types">
													{{strategy_type}}
												</option>	
											</select>
										</div>

										<!-- Property Type -->
										<div class="col-md-4">
											<select data-placeholder="Any Type" class="chosen-select-no-single" >
												<option v-for="property_type in property_types">
													{{property_type}}
												</option>	
											</select>
										</div>


										<!-- Min Price -->
										<div class="col-md-2">
											
											<!-- Select Input -->
											<div class="select-input">
												<input type="text" placeholder="Min Price" data-unit="AUD">
											</div>
											<!-- Select Input / End -->

										</div>

										


										<!-- Max Price -->
										<div class="col-md-2">
											
											<!-- Select Input -->
											<div class="select-input">
												<input type="text" placeholder="Max Price" data-unit="AUD">
											</div>
											<!-- Select Input / End -->

										</div>

									</div>
									<!-- Row / End -->


									<!-- More Search Options -->
									<a href="#" class="more-search-options-trigger" data-open-title="More Options" data-close-title="Less Options"></a>

									<div class="more-search-options">
										<div class="more-search-options-container">

											<!-- Row -->
											<div class="row with-forms">

												<!-- Min Price -->
												<div class="col-md-6">
													
													<!-- Select Input -->
													<div class="select-input">
														<input type="text" placeholder="Min Area" data-unit="Sq Ft">
													</div>
													<!-- Select Input / End -->

												</div>

												<!-- Max Price -->
												<div class="col-md-6">
													
													<!-- Select Input -->
													<div class="select-input">
														<input type="text" placeholder="Max Area" data-unit="Sq Ft">
													</div>
													<!-- Select Input / End -->

												</div>

											</div>
											<!-- Row / End -->


											<!-- Row -->
											<div class="row with-forms">

												<!-- Min Area -->
												<div class="col-md-6">
													<select data-placeholder="Beds" class="chosen-select-no-single" >
														<option label="blank"></option>	
														<option>Beds (Any)</option>	
														<option>1</option>
														<option>2</option>
														<option>3</option>
														<option>4</option>
														<option>5</option>
													</select>
												</div>

												<!-- Max Area -->
												<div class="col-md-6">
													<select data-placeholder="Baths" class="chosen-select-no-single" >
														<option label="blank"></option>	
														<option>Baths (Any)</option>	
														<option>1</option>
														<option>2</option>
														<option>3</option>
														<option>4</option>
														<option>5</option>
													</select>
												</div>

											</div>
											<!-- Row / End -->


											<!-- Checkboxes -->
											<div class="checkboxes in-row">
										
												<input id="check-2" type="checkbox" name="check">
												<label for="check-2">Air Conditioning</label>

												<input id="check-3" type="checkbox" name="check">
												<label for="check-3">Swimming Pool</label>

												<input id="check-4" type="checkbox" name="check" >
												<label for="check-4">Central Heating</label>

												<input id="check-5" type="checkbox" name="check">
												<label for="check-5">Laundry Room</label>	


												<input id="check-6" type="checkbox" name="check">
												<label for="check-6">Gym</label>

												<input id="check-7" type="checkbox" name="check">
												<label for="check-7">Alarm</label>

												<input id="check-8" type="checkbox" name="check">
												<label for="check-8">Window Covering</label>
										
											</div>
											<!-- Checkboxes / End -->

										</div>
									</div>
									<!-- More Search Options / End -->


								</div>
								<!-- Box / End -->

							</form>
							<!-- Main Search -->

						</div>
					
						
						<!-- Main Search Container / End -->

					</div>
				</div>
			</div>

		</div>
	</div>
</searchbar>
