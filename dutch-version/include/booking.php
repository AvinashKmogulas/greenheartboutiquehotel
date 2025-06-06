<section class="ftco-section ftco-no-pb ftco-no-pt ftco-booking">
	<div class="container">
		<div class="row">
			<div class="bk-close-btn">X</div>
			<div class="col-md-12">
				<form class="booking-form" name="bookinghotelform1" id="bookinghotelform1">
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



<script>

// });

// 	var scriptURL = 'https://script.google.com/macros/s/AKfycbyOBL-zow4_B3HeJphtJ7GYwffttKL_99O2b39sWCWcJ9KI5ay5MVcwj4xLrhj3RwakiA/exec';
//   var form = document.forms['bookinghotelform'];

//   form.addEventListener('submit', e => {
//     e.preventDefault();

//       var name = jQuery("#be-name").val();
//       var number = jQuery("#be-number").val();
//       var arrive = jQuery(".be-checkin").val();
//       var depart = jQuery(".be-checkout").val();
//       var rooms = jQuery("#be-rooms").val();
//       var adults = jQuery("#be-adults").val();
//       var child = jQuery("#be-childs").val();
//       var r_triggerSearch = jQuery("#r_triggerSearch").val();
//       var bucket = jQuery("#bucket").attr("value",sla);
//       var r_triggerSearch = jQuery("#r_triggerSearch").val();

//       var arr = arrive.split("-");
//       var checkin1 = new Date(arr[0] + '/' + arr[1] + '/' + arr[2]);
//       var d1 = new Date();
//       var d2 = new Date(checkin1);
//       var timeDiff = d2.getTime() - d1.getTime();
//       var DaysDiff = timeDiff / (1000 * 3600 * 24);
//       var sla;

//       if (DaysDiff <= 3) {
//         sla = 'B3';
//       }
//       else if (DaysDiff > 3 && DaysDiff <= 7) {
//        sla = 'B7';
//       }
//       else if (DaysDiff > 7 && DaysDiff <= 15) {
//        sla = 'B15';
//       }
//       else if (DaysDiff > 15) {
//        sla = 'B25';
//       }
	
//       var bucket = jQuery("#bucket").attr("value",sla);


//         if ($("#be-name").val().trim() == '') {
//           alert('Please enter name');
//           $("#be-name").focus();
//           return false;
//         }
//         var iChars = "~`!@#$%^&*()+=-\_[]1234567890\\\';,./{}|\":<>?";
//         for (var i = 0; i < $("#be-name").val().length; i++) {
//           if (iChars.indexOf($("#be-name").val().charAt(1)) != -1) {
//             alert("Please enter name without special characters or numeric values.");
//             $("#be-name").focus();
//             return false;
//           }
//         }
//         if ($("#be-number").val().trim() == '') {
//           alert('Please enter phone');
//           $("#be-number").focus();
//           return false;
//         }

//         if ($("#be-number").val().length < '10' && $("#be-number").val().length > '10') {
//           alert('Please enter 10 digit Phone Number');
//           $("#be-number").focus();
//           return false;
//         }

// 		var fullDate = new Date()
//     var twoDigitMonth = ((fullDate.getMonth().length+1) === 1)? (fullDate.getMonth()+1) : '0' + (fullDate.getMonth()+1);
//     var currentDate = fullDate.getDate() + "-" + twoDigitMonth + "-" + fullDate.getFullYear();

//     $("#c_date").attr("value",currentDate);


// 	fetch(scriptURL, { method: "POST", body: new FormData(form) });
//         //  var loc='https://asiatech.in/booking_engine/index3?token=NjExMA==&arrive='+arrive+'&depart='+depart+'&rooms='+rooms+'&adults='+adults+'&child='+child+'&triggerSearch='+r_triggerSearch;
// 		 var loc = 'https://hotels.cloudbeds.com/en/reservation/NC3rR2/?currency=usd&checkin=' + arrive + "&checkout=" + depart;
//         window.open(loc);
// 	})



// booking engine
// $("document").ready(function(){
    // var scriptURL = 'https://script.google.com/macros/s/AKfycbwVhaqvFO4ZSPDGIVYbtJSXrkzttGV2QYvcl4QcWiAjilYckvSjpy2uD7_pXBN2DnPrVw/exec';
  //var scriptURL = 'https://script.google.com/macros/s/AKfycbzfpqFbQrlb4mmsG9UymdyaDmgp95UeOQeQVP_8QTkGqMQA1PnGr-uqR2-dy2J7PrTkCQ/exec';
//   var form = document.forms['bookinghotelform'];

//   form.addEventListener('submit', e => {
//     e.preventDefault();

//       var name = jQuery("#be-name").val();
//       var number = jQuery("#be-number").val();
//       var arrive = jQuery(".be-checkin").val();
//       var depart = jQuery(".be-checkout").val();
//       var rooms = jQuery("#be-rooms").val();
//       var adults = jQuery("#be-adults").val();
//       var child = jQuery("#be-childs").val();
//       var r_triggerSearch = jQuery("#r_triggerSearch").val();
//       var bucket = jQuery("#bucket").attr("value",sla);
//       var r_triggerSearch = jQuery("#r_triggerSearch").val();

//       var arr = arrive.split("-");
//       var checkin1 = new Date(arr[0] + '/' + arr[1] + '/' + arr[2]);
//       var d1 = new Date();
//       var d2 = new Date(checkin1);
//       var timeDiff = d2.getTime() - d1.getTime();
//       var DaysDiff = timeDiff / (1000 * 3600 * 24);
//       var sla;

//       if (DaysDiff <= 3) {
//         sla = 'B3';
//       }
//       else if (DaysDiff > 3 && DaysDiff <= 7) {
//        sla = 'B7';
//       }
//       else if (DaysDiff > 7 && DaysDiff <= 15) {
//        sla = 'B15';
//       }
//       else if (DaysDiff > 15) {
//        sla = 'B25';
//       }
	
//       var bucket = jQuery("#bucket").attr("value",sla);

//         if ($("#be-name").val().trim() == '') {
//           alert('Please enter name');
//           $("#be-name").focus();
//           return false;
//         }
//         var iChars = "~`!@#$%^&*()+=-\_[]1234567890\\\';,./{}|\":<>?";
//         for (var i = 0; i < $("#be-name").val().length; i++) {
//           if (iChars.indexOf($("#be-name").val().charAt(1)) != -1) {
//             alert("Please enter name without special characters or numeric values.");
//             $("#be-name").focus();
//             return false;
//           }
//         }
//         if ($("#be-number").val().trim() == '') {
//           alert('Please enter phone');
//           $("#be-number").focus();
//           return false;
//         }

//         if ($("#be-number").val().length < '10' && $("#be-number").val().length > '10') {
//           alert('Please enter 10 digit Phone Number');
//           $("#be-number").focus();
//           return false;
//         }
//         var fullDate = new Date()
//     var twoDigitMonth = ((fullDate.getMonth().length+1) === 1)? (fullDate.getMonth()+1) : '0' + (fullDate.getMonth()+1);
//     var currentDate = fullDate.getDate() + "-" + twoDigitMonth + "-" + fullDate.getFullYear();

//     $("#c_date").attr("value",currentDate);
//         // fetch(scriptURL, { method: 'POST', body: new FormData(form)});
// 	    fetch(scriptURL, { method: "POST", body: new FormData(form) });
		
// 		 var loc = 'https://hotels.cloudbeds.com/en/reservation/NC3rR2/?currency=usd&checkin=' + arrive + "&checkout=" + depart;
//         window.open(loc);
// 	});
// });



   // booking engine
 
   var scriptURL = 'https://script.google.com/macros/s/AKfycbyPQbSVUgdx9HkBtuHXHk9UD5AXQcShYJMB_VoRk4M0wpYBRD-VN9u0fI7-4Iz4LnaLwA/exec';
  //var scriptURL = 'https://script.google.com/macros/s/AKfycbzfpqFbQrlb4mmsG9UymdyaDmgp95UeOQeQVP_8QTkGqMQA1PnGr-uqR2-dy2J7PrTkCQ/exec';
  var form = document.forms['bookinghotelform1'];

  form.addEventListener('submit', e => {
    e.preventDefault();

      var name = jQuery("#be-name").val();
      var number = jQuery("#be-number").val();
      var arrive = jQuery(".be-checkin").val();
      var depart = jQuery(".be-checkout").val();
      var rooms = jQuery("#be-rooms").val();
      var adults = jQuery("#be-adults").val();
      var child = jQuery("#be-childs").val();
      var r_triggerSearch = jQuery("#r_triggerSearch").val();
      var bucket = jQuery("#bucket").attr("value",sla);
      var r_triggerSearch = jQuery("#r_triggerSearch").val();

      var arr = arrive.split("-");
      var checkin1 = new Date(arr[0] + '/' + arr[1] + '/' + arr[2]);
      var d1 = new Date();
      var d2 = new Date(checkin1);
      var timeDiff = d2.getTime() - d1.getTime();
      var DaysDiff = timeDiff / (1000 * 3600 * 24);
      var sla;

      if (DaysDiff <= 3) {
        sla = 'B3';
      }
      else if (DaysDiff > 3 && DaysDiff <= 7) {
       sla = 'B7';
      }
      else if (DaysDiff > 7 && DaysDiff <= 15) {
       sla = 'B15';
      }
      else if (DaysDiff > 15) {
       sla = 'B25';
      }
	
      var bucket = jQuery("#bucket").attr("value",sla);

        if ($("#be-name").val().trim() == '') {
          alert('Please enter name');
          $("#be-name").focus();
          return false;
        }
        var iChars = "~`!@#$%^&*()+=-\_[]1234567890\\\';,./{}|\":<>?";
        for (var i = 0; i < $("#be-name").val().length; i++) {
          if (iChars.indexOf($("#be-name").val().charAt(1)) != -1) {
            alert("Please enter name without special characters or numeric values.");
            $("#be-name").focus();
            return false;
          }
        }
        if ($("#be-number").val().trim() == '') {
          alert('Please enter phone');
          $("#be-number").focus();
          return false;
        }

        if ($("#be-number").val().length < '10' && $("#be-number").val().length > '10') {
          alert('Please enter 10 digit Phone Number');
          $("#be-number").focus();
          return false;
        }
        var fullDate = new Date()
    var twoDigitMonth = ((fullDate.getMonth().length+1) === 1)? (fullDate.getMonth()+1) : '0' + (fullDate.getMonth()+1);
    var currentDate = fullDate.getDate() + "-" + twoDigitMonth + "-" + fullDate.getFullYear();

    $("#c_date").attr("value",currentDate);
        // fetch(scriptURL, { method: 'POST', body: new FormData(form)});
	    // fetch(scriptURL, { method: "POST", body: new FormData(form) });
		fetch(scriptURL, { method: "POST", body: new FormData(form) });
		
		 var loc = 'https://hotels.cloudbeds.com/en/reservation/NC3rR2/?currency=usd&checkin=' + arrive + "&checkout=" + depart;
        window.open(loc);
	});
// });


</script>
