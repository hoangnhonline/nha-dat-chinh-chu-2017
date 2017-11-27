// JavaScript Document
$(function() {    
/* Tab setting */
  $(".tab-group-wrap .btn-group-tab li .btn").click(function() {
    $(".tab-group-wrap .btn-group-tab li.active").removeClass("active");
    $(this).parent().addClass("active");
    $('.tab-group-wrap .tab-content-box').hide();
    var content_show_id = $(this).attr("data-id"); 
    $("#"+content_show_id).show();
  });
    $(document).on('click','.sidebar-option-position .sidebar-icon .icon',function(event){
    
      if($(this).hasClass('active')){
        
        $(this).parent().find(".icon-selectbook").removeClass('active');  
        $(this).parent().find(".icon-warning").removeClass('active');

        if($(this).hasClass('icon-selectbook')){ 
           $(this).parent().find(".icon-selectbook > i").removeClass('fa-times').addClass('fa-book');   
           $(this).parent().find(".icon-warning").removeClass('active');   
        }
        if($(this).hasClass('icon-warning')){ 
          $(this).parent().find(".icon-warning > i").removeClass('fa-times').addClass('fa-exclamation');   
        }
        
      }else{
        if($(this).hasClass('icon-selectbook')){

          $(this).parent().find(".icon-selectbook").addClass('active');    
          //$(this).parent().find(".icon-selectbook > i").removeClass('fa-book').addClass('fa-times');    

        }
                
        if($(this).hasClass('icon-warning')){

          $(this).parent().find(".icon-warning").addClass('active');    
          //$(this).parent().find(".icon-warning > i").removeClass('fa-exclamation').addClass('fa-times');    
        }
      }
    
    });
    
    $(".sidebar-option-position .sidebar-icon").on('click','.icon-selectbook',function(event){
      $(this).parent().find(".icon-warning").removeClass("active");
      $(this).parent().find(".icon-warning > i").removeClass('fa-times').addClass('fa-exclamation');   
    });
    $(".sidebar-option-position .sidebar-icon").on('click','.icon-warning',function(event){
      $(this).parent().find(".icon-selectbook").removeClass("active");
      $(this).parent().find(".icon-selectbook > i").removeClass('fa-times').addClass('fa-book');    
    });
    
    
    $(document).on('click','.sidebar-option-position .sidebar-icon .icon-setting-more',function(event){
      /*$(this).parent().append('<span class="icon icon-close active"><i class="fa fa-times"></i></span>');
      
      $(this).parent().find(".icon-close").click(function(){
        $(this).fadeOut(500).remove();       
       });
      */
    });
    
    
    $(".show-alert1").on("click", function(e) {
      bootbox.alert("Content dialog one!", function() {
        console.log("Alert Callback");
      });
    });
    $(".show-alert2").on("click", function(e) {
      bootbox.alert("Content dialog two!", function() {
        console.log("Alert Callback");
      });
    });

  
    $(".btn-SpotPrice").click(function() {
        $("#frmShowSpotPrice").show();
        $("#frmTourNoTransfer").hide();
        $("#fmCallVendor").hide();
        $("#frmUpdateStatus").hide();
        $("#frmSearchOPService").hide();
        $("#frmCancelOneShot").hide();
        $("#frmSelectReferringBooking").hide();
        $("#frmSearchTravelWith").hide();
        $("#frmManifestClient").hide();
        $("#frmWarning").hide();
         $("#frmPriceDetails").hide();
          $("#frmSpotPrice").hide();
    });

    $(".btn-CallVendor").click(function() {
        $("#fmCallVendor").show();
        $("#frmShowSpotPrice").hide();
        $("#frmTourNoTransfer").hide();
        $("#frmUpdateStatus").hide();
        $("#frmSearchOPService").hide();
        $("#frmCancelOneShot").hide();
        $("#frmSelectReferringBooking").hide();
        $("#frmSearchTravelWith").hide();
        $("#frmManifestClient").hide();
        $("#frmWarning").hide();
         $("#frmPriceDetails").hide();
          $("#frmSpotPrice").hide();
    });
    $(".btn-UpdateStatus").click(function() {
        $("#frmUpdateStatus").show();
        $("#fmCallVendor").hide();
        $("#frmShowSpotPrice").hide();
        $("#frmTourNoTransfer").hide();
        $("#frmSearchOPService").hide();
        $("#frmCancelOneShot").hide();
        $("#frmSelectReferringBooking").hide();
        $("#frmSearchTravelWith").hide();
        $("#frmManifestClient").hide();
        $("#frmWarning").hide();
         $("#frmPriceDetails").hide();
          $("#frmSpotPrice").hide();
    });
    $(".btn-SearchOPService").click(function() {
        $("#frmSearchOPService").show();
        $("#frmUpdateStatus").hide();
        $("#fmCallVendor").hide();
        $("#frmShowSpotPrice").hide();
        $("#frmTourNoTransfer").hide();
        $("#frmCancelOneShot").hide();
        $("#frmSelectReferringBooking").hide();
        $("#frmSearchTravelWith").hide();
        $("#frmManifestClient").hide();
        $("#frmWarning").hide();
         $("#frmPriceDetails").hide();
          $("#frmSpotPrice").hide();
    });
    $(".btn-CancelOneShot").click(function() {
        $("#frmCancelOneShot").show();
        $("#frmUpdateStatus").hide();
        $("#fmCallVendor").hide();
        $("#frmShowSpotPrice").hide();
        $("#frmTourNoTransfer").hide();
        $("#frmSearchOPService").hide();
        $("#frmSelectReferringBooking").hide();
        $("#frmSearchTravelWith").hide();
        $("#frmManifestClient").hide();
        $("#frmWarning").hide();
         $("#frmPriceDetails").hide();
          $("#frmSpotPrice").hide();
    });
    $(".btn-select-book").click(function() {
        $("#frmSelectReferringBooking").show();
        $("#frmUpdateStatus").hide();
        $("#frmCancelOneShot").hide();
        $("#fmCallVendor").hide();
        $("#frmShowSpotPrice").hide();
        $("#frmTourNoTransfer").hide();
        $("#frmSearchOPService").hide();
        $("#frmSearchTravelWith").hide();
        $("#frmManifestClient").hide();
        $("#frmWarning").hide();
        $("#frmWarning").hide();
         $("#frmPriceDetails").hide();
         $("#frmSpotPrice").hide();
    });
    $(".btn-search-travel-with").click(function() {
        $("#frmSearchTravelWith").show();
        $("#frmUpdateStatus").hide();
        $("#frmCancelOneShot").hide();
        $("#fmCallVendor").hide();
        $("#frmShowSpotPrice").hide();
        $("#frmSearchOPService").hide();
        $("#frmSelectReferringBooking").hide();
        $("#frmManifestClient").hide();
        $("#frmWarning").hide();
         $("#frmPriceDetails").hide();
          $("#frmSpotPrice").hide();
    });
    $(".btn-manifest-client").click(function() {
        $("#frmManifestClient").show();
        $("#frmSearchTravelWith").hide();
        $("#frmUpdateStatus").hide();
        $("#frmCancelOneShot").hide();
        $("#fmCallVendor").hide();
        $("#frmShowSpotPrice").hide();
        $("#frmSearchOPService").hide();
        $("#frmSelectReferringBooking").hide();
        $("#frmWarning").hide();
         $("#frmPriceDetails").hide();
          $("#frmSpotPrice").hide();
    });
    
    $(".btn-warning").click(function() {
        $("#frmManifestClient").hide();
        $("#frmSearchTravelWith").hide();
        $("#frmUpdateStatus").hide();
        $("#frmCancelOneShot").hide();
        $("#fmCallVendor").hide();
        $("#frmShowSpotPrice").hide();
        $("#frmSearchOPService").hide();
        $("#frmSelectReferringBooking").hide();
        $("#frmWarning").show();
        $("#frmPriceDetails").hide();
         $("#frmSpotPrice").hide();
    });
     $(".btn-price-details").click(function() {
        $("#frmPriceDetails").show();
        $("#frmSearchTravelWith").hide();
        $("#frmUpdateStatus").hide();
        $("#frmCancelOneShot").hide();
        $("#fmCallVendor").hide();
        $("#frmShowSpotPrice").hide();
        $("#frmSearchOPService").hide();
        $("#frmSelectReferringBooking").hide();
        $("#frmWarning").hide();
        $("#frmManifestClient").hide();
         $("#frmSpotPrice").hide();
    });
     $(".btn-spot-price").click(function() {
        $("#frmSpotPrice").show();
        $("#frmSearchTravelWith").hide();
        $("#frmUpdateStatus").hide();
        $("#frmCancelOneShot").hide();
        $("#fmCallVendor").hide();
        $("#frmShowSpotPrice").hide();
        $("#frmSearchOPService").hide();
        $("#frmSelectReferringBooking").hide();
        $("#frmWarning").hide();
        $("#frmManifestClient").hide();
        $("#frmPriceDetails").hide();
    });
    
    $('[data-toggle="popover"]').popover({
     html: true,
     placement: 'auto right',
     content: '<label class="mb05">SVC Date: MM/DD/YYYY</label><table class="table table-customize"><thead><tr><th rowspan="2">Age<br>Braket</th><th rowspan="2">Pax</th><th rowspan="2">OK<br>Count</th><th colspan="3">Number Of Remaining<br>Inventory</th><th rowspan="2">OneShot</th></tr><tr><th>SS</th><th>FZK<br>(Sub)</th><th>MyBus<br>(Sub)</th></tr></thead><tbody><tr><td>12-999</td><td>3</td><td>3</td><td rowspan="3"><a href="#" class="link">30/XX</a></td><td rowspan="3"><a href="#" class="link">10/XX</a></td><td rowspan="3"><a href="#" class="link">5/XX</a></td><td rowspan="3"></td></tr> <tr><td>2-11</td><td>1</td><td>1</td></tr> <tr><td>0-1</td><td></td><td></td></tr> </tbody></table>'
     });
    
    
    $('.qTip-BookingDetails').qtip({
        hide: {
            delay: 250,
            fixed: true
        },
        content: {
            text: '<div class="qTip-content"><label class="mb05">SVC Date: MM/DD/YYYY</label><table class="table table-customize"><thead><tr><th rowspan="2">Age<br>Braket</th><th rowspan="2">Pax</th><th rowspan="2">OK<br>Count</th><th colspan="3">Number Of Remaining<br>Inventory</th><th rowspan="2">OneShot</th></tr><tr><th>SS</th><th>FZK<br>(Sub)</th><th>MyBus<br>(Sub)</th></tr></thead><tbody><tr><td>12-999</td><td>3</td><td>3</td><td rowspan="3"><a href="#" class="link">30/XX</a></td><td rowspan="3"><a href="#" class="link">10/XX</a></td><td rowspan="3"><a href="#" class="link">5/XX</a></td><td rowspan="3"></td></tr> <tr><td>2-11</td><td>1</td><td>1</td></tr> <tr><td>0-1</td><td></td><td></td></tr> </tbody></table></div>'
        },

        position: {
            my: 'bottom right',
            at: 'bottom right',
            target: 'mouse',
            adjust: {
                x: -10,
                y: -10
            }
        },
        style: {
            classes: 'qtip-bootstrap'
        },
    });

    $('.qTip2').qtip({
        content: {
            text: '<div class="qTip-content qtip-content-btn-edit"><ul><li>1. Content Content Content Content<br>Content Content Content Content</li><li>2. Content Content Content Content<br>Content Content Content Content</li></ul></div>'
        },
        position: {
            my: 'bottom left',
            at: 'top left',
            target: 'mouse',
            adjust: {
                x: 5,
                y: 5
            }
        },
        style: {
            classes: 'qtip-bootstrap'
        },
    });
     $('.qTip-Tariff-Name').qtip({ 
    content: {
        text: '<div class="qtip-long-text">XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX</div>'
    },
    position : {
      my: 'bottom right',
      at: 'bottom right',
      target: 'mouse',
      adjust: { x: -7, y: -7 }
    },
    style : { classes: 'qtip-youtube' },
  }) ;
  
   $('.qTip-Title-Tour-Name').qtip({ 
    content: {
        text: '<div class="qtip-long-text">T Q OAHU6 WKK4 D9BA6NH1BY T Q OAHU6 WKK4 D9BA6NH1BY T Q OAHU6 WKK4 D9BA6NH1BY</div>'
    },
    position : {
      my: 'bottom right',
      at: 'bottom right',
      target: 'mouse',
      adjust: { x: -7, y: -7 }
    },
    style : { classes: 'qtip-youtube' },
  }) ;
  
   
   $('.qTip-Tour-Name').qtip({ 
    content: {
        text: '<div class="qtip-long-text">XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX</div>'
    },
    position : {
      my: 'bottom right',
      at: 'bottom right',
      target: 'mouse',
      adjust: { x: -7, y: -7 }
    },
    style : { classes: 'qtip-youtube' },
  }) ;
   $('.qTip-Sub-Name').qtip({ 
    content: {
        text: '<div class="qtip-long-text">XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX</div>'
    },
    position : {
      my: 'bottom right',
      at: 'bottom right',
      target: 'mouse',
      adjust: { x: -7, y: -7 }
    },
    style : { classes: 'qtip-youtube' },
  }) ;
   $('.qTip-Name').qtip({ 
    content: {
        text: '<div class="qtip-long-text">STAR OF HONOLULU 3STAR SUNSET CRUISE OHOHOHOHOHOH OHOHOHOHOHOH OHOHOHOHOHOH OHOHOHOHOHOH OHOHOHOHOHOH(80表示)</div>'
    },
    position : {
      my: 'bottom right',
      at: 'bottom right',
      target: 'mouse',
      adjust: { x: -7, y: -7 }
    },
    style : { classes: 'qtip-youtube' },
  }) ;
});