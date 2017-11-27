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
	    adjust: { x: -7, y: -7 }
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
	    adjust: { x: -7, y: -7 }
	  },
	  style : { classes: 'qtip-youtube' },
	});
	$(".accordion-header2").each(function() {
	    $(this).on("click", function(){

	  	$(this).toggleClass('opened');
		$(this).next().next('.box-collapse2').slideToggle(200);

	    if($(this).hasClass("opened")){
	      $(this).next().find("input").attr("readonly", false);
	      $(this).next().find(".pu-status").removeAttr("disabled","disabled");
	      $(this).next().find("#label-Customer-Sales").hide(500);
	    }else{ 
	      $(this).next().find("input").attr("readonly", true);
	      $(this).next().find(".pu-status").prop("disabled","disabled");
	      $(this).next().find("#label-Customer-Sales").show(500); 
	    }
	  });
	});
	$(".accordion-header2").each(function() {

	    if($(this).hasClass("opened")){
	      $(this).next().find("input").attr("readonly", false);
	      $(this).next().find(".pu-status").removeAttr("disabled","disabled");
	    }else{ 
	      $(this).next().find("input").attr("readonly", true);
	      $(this).next().find(".pu-status").prop("disabled","disabled");
	      $(this).next().find("#label-Customer-Sales").show(500); 
	    }

	});
});