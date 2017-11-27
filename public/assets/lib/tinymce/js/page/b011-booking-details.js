// JavaScript Document
$(function () {

  $(".btn-manifest-client").click(function () {
      $("#frmSelectPax").show();
      $("#frmSearchTravelWith").hide();
      $("#frmCancelOneShot").hide();
      $("#frmOPService").hide();
     $("#frmPriceDetails").hide();
  });
  
   $(".btn-search-travel-with").click(function () {
      $("#frmSearchTravelWith").show();
      $("#frmCancelOneShot").hide();
      $("#frmSelectPax").hide();
      $("#frmOPService").hide();
     $("#frmPriceDetails").hide();
  });
  
  $(".btn-cancel").click(function () {
     $("#frmCancelOneShot").show();
     $("#frmSearchTravelWith").hide();
     $("#frmSelectPax").hide();
     $("#frmOPService").hide();
     $("#frmPriceDetails").hide();
  });
  $(".btn-warning").click(function () {
    $("#frmOPService").show();
    $("#frmCancelOneShot").hide();
    $("#frmSearchTravelWith").hide();
    $("#frmSelectPax").hide();
     $("#frmPriceDetails").hide();
  });
  
    $(".btn-price-details").click(function () {
    $("#frmPriceDetails").show();
    $("#frmCancelOneShot").hide();
    $("#frmSearchTravelWith").hide();
    $("#frmSelectPax").hide();
    $("#frmOPService").hide();
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
   $('.qTip-Tour-Name').qtip({ 
    content: {
        text: '<div class="qtip-long-text">TQOAHU6WKK4D9BATQOAHU6WKK4D9BATQOAHU6WKK4D9BA</div>'
    },
    position : {
      my: 'bottom left',
      at: 'bottom left',
      target: 'mouse',
      adjust: { x: -7, y: -7 }
    },
    style : { classes: 'qtip-youtube' },
  }) ;
  
   $('.qTip-Tour-Name-left').qtip({ 
    content: {
        text: '<div class="qtip-long-text">TQOAHU6WKK4D9BATQOAHU6WKK4D9BATQOAHU6WKK4D9BA</div>'
    },
    position : {
      my: 'bottom right',
      at: 'bottom lright',
      target: 'mouse',
      adjust: { x: -7, y: -7 }
    },
    style : { classes: 'qtip-youtube' },
  }) ;
  
     $('[data-toggle="popover"]').popover({
       html: true,
       placement: 'auto right',
       content: '<table class="table table-customize"><thead><tr><th rowspan="2">Age<br>Braket</th><th rowspan="2">Pax</th><th rowspan="2">OK<br>Count</th></tr></thead><tbody><tr><td>12-999</td><td>3</td><td>3</td></tr> <tr><td>2-11</td><td>1</td><td>1</td></tr> <tr><td>0-1</td><td></td><td></td></tr> </tbody></table>'
       });
       
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

});