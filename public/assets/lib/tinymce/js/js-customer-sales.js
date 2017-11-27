$('document').ready(function(){
	$("#btnSpotPrice").click(function(){
	  $("#frmTravelWithPanel").hide();
	  $("#frmSearchOpServicePanel").hide();
	  $("#frmCallVendorPanel").hide();
	  $("#frmSelectPaxPanel").hide();
	  $("#frmCancelPanel").hide();
	  $("#frmSpotPricePanel").show();
	});
	$("#btnTralWith").click(function(){
	  $("#frmSpotPricePanel").hide();
	  $("#frmSearchOpServicePanel").hide();
	  $("#frmCallVendorPanel").hide();
	  $("#frmSelectPaxPanel").hide();
	  $("#frmCancelPanel").hide();
	  $("#frmTravelWithPanel").show();
	});
	$("#btnSearchOPServices").click(function(){
	  $("#frmSpotPricePanel").hide();
	  $("#frmTravelWithPanel").hide();
	  $("#frmCallVendorPanel").hide();
	  $("#frmSelectPaxPanel").hide();
	  $("#frmCancelPanel").hide();
	  $("#frmSearchOpServicePanel").show();
	});
	$("#btnCallVendor").click(function(){
	  $("#frmSpotPricePanel").hide();
	  $("#frmTravelWithPanel").hide();
	  $("#frmSearchOpServicePanel").hide();
	  $("#frmSelectPaxPanel").hide();
	  $("#frmCancelPanel").hide();
	  $("#frmCallVendorPanel").show();
	});
	$("#btnSelectPax").click(function(){
	  $("#frmSpotPricePanel").hide();
	  $("#frmTravelWithPanel").hide();
	  $("#frmSearchOpServicePanel").hide();
	  $("#frmCallVendorPanel").hide();
	  $("#frmCancelPanel").hide();
	  $("#frmSelectPaxPanel").show();
	});
	$("#btnCancel").click(function(){
	  $("#frmSpotPricePanel").hide();
	  $("#frmTravelWithPanel").hide();
	  $("#frmSearchOpServicePanel").hide();
	  $("#frmCallVendorPanel").hide();
	  $("#frmSelectPaxPanel").hide();
	  $("#frmCancelPanel").show();
	});

	/* Booking CONFIRMED by Call Vendor MM/DD/YYYY HH:MM */
	$('.qTip-Call-Service-Booking').qtip({ 
	  content: {
	      text: '<div><p>OK By XXXXXXXXXX</p><p>Confirmation# XXXXXXXXXXXXX</p><p class="pull-right">MM/DD/YYYY HH:MM</p></div>'
	  },
	  position : {
	    my: 'bottom right',
	    at: 'bottom right',
	    target: 'mouse',
	    adjust: { x: 5, y: 5 }
	  },
	  style : { classes: 'qtip-youtube' },
	});
	/* RMKS Sup */
	$('.qTip-RMKS-Sup').qtip({ 
	  content: {
	      text: '<div>□□□□□□□□□□□□□□□□□<br>□□□□□□□□□□□□□□□□□<br>□□□□□□□□□□□□□□□□<br>□□□□□□□□□□□□□□□□<br>□□□□□□□□□□□□□□□□</div>'
	  },
	  position : {
	    my: 'bottom right',
	    at: 'bottom right',
	    target: 'mouse',
	    adjust: { x: 5, y: 5 }
	  },
	  style : { classes: 'qtip-youtube' },
	});
	// Accordion2 has icon arrow
	$('.box-accordion2 > .accordion-header2').on("click",function(){
	  $(this).toggleClass('opened');
	  $(this).next().next('.box-collapse2').slideToggle(200);
	});
});

$(document).ready(function(){

   $('.accordion-header2').click(function(){

     if($( ".accordion-header2" ).hasClass( "opened" )){
         $(this).next().find("#no_of_staff").attr("readonly", false);
         $(this).next().find("#label-Customer-Sales").hide(500);
     }
     else{ 
         $(this).next().find("#no_of_staff").attr("readonly", true);
         $(this).next().find("#label-Customer-Sales").show(500); 
     }
   });
});