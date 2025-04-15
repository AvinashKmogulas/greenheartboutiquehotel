<section class="ftco-section ftco-no-pb ftco-no-pt ftco-booking">
	<div class="container">
		<div class="row">
			<div class="bk-close-btn">X</div>
			<div class="col-md-12">
				<form class="booking-form" name="bookinghotelform">
					<div class="row g-0">
						<div class="col-md-6 col-lg form-wrap">
							<div class="form-group">
								<label for="#">Name</label>
								<div class="form-field">
									<div class="icon"><span class="fa fa-user"></span></div>
									<input type="text" name="Name" class="form-control" id="be-name" placeholder="Enter Name">
								</div>
							</div>
						</div>
						<div class="col-md-6 col-lg form-wrap">
							<div class="form-group">
								<label for="#">Phone Number</label>
								<div class="form-field">
									<div class="icon"><span class="fa fa-mobile"></span></div>
									<input type="number" name="Phone No" class="form-control" id="be-number" placeholder="Enter Number">
								</div>
							</div>
						</div>
						<div class="col-md-6 col-lg form-wrap">
							<div class="form-group">
								<label for="#">Check-In</label>
								<div class="form-field">
									<div class="icon"><span class="fa fa-calendar"></span></div>
									<input type="text" name="Check-IN" class="form-control be-checkin" id="datepicker" placeholder="Check-In Date">
								</div>
							</div>
						</div>
						<div class="col-md-6 col-lg form-wrap">
							<div class="form-group">
								<label for="#">Check-Out</label>
								<div class="form-field">
									<div class="icon"><span class="fa fa-calendar"></span></div>
									<input type="text" name="Check-Out" class="form-control be-checkout" id="datepicker2" placeholder="Check-Out Date">
								</div>
							</div>
						</div>
						<div class="col-md-6 col-lg form-wrap">
							<div class="form-group">
								<label for="#">Rooms</label>
								<div class="form-field">
									<div class="select-wrap">
										<div class="icon"><span class="fa fa-chevron-down"></span></div>
										<select name="Room" id="be-rooms" class="form-control">
											<option value="1">1 Room</option>
											<option value="2">2 Rooms</option>
											<option value="3">3 Rooms</option>
											<option value="4">4 Rooms</option>
											<option value="5">5 Rooms</option>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-lg form-wrap">
							<div class="form-group">
								<label for="#">Guests</label>
								<div class="form-field">
									<div class="select-wrap">
										<div class="icon"><span class="fa fa-chevron-down"></span></div>
										<select name="Guest" id="be-adults" class="form-control">
											<option value="1">1 Person</option>
											<option value="2" selected>2 Person</option>
											<option value="3">3 Person</option>
											<option value="4">4 Person</option>
											<option value="5">5 Person</option>
											<option value="6">6-9 Person</option>
											<option value="7">10+ Person</option>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-lg form-wrap">
							<div class="form-group">
								<label for="#">Children</label>
								<div class="form-field">
									<div class="select-wrap">
										<div class="icon"><span class="fa fa-chevron-down"></span></div>
										<select name="Children" id="be-childs" class="form-control">
											<option value="0">0 Children</option>
											<option value="1">1 Children</option>
											<option value="2">2 Children</option>
											<option value="3">3 Children</option>
											<option value="4">4 Children</option>
										</select>
									</div>
								</div>
							</div>
						</div>

						<input type="hidden" name="Bucket" id="bucket" value="">
						<input type="hidden" id="c_date" name="Query-date" value="">
						<div class="col-md-12 col-lg d-flex">
							<div class="form-group d-flex border-0">
								<div class="form-field w-100 align-items-center d-flex">
									<button type="submit" class="d-flex justify-content-center align-items-center align-self-stretch form-control btn btn-primary py-lg-4 py-xl-0">Check Availability</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>