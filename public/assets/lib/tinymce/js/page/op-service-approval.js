// JavaScript Document

$(function () {

  $(".panel-OPService").click(function(){
    $("#frmChangeStatusOpService").fadeIn(800);   
    $("#frmChangeStatusStopSellRequest").hide();  
  });

  $(".panel-StopSellRequest").click(function(){
    $("#frmChangeStatusOpService").hide();   
    $("#frmChangeStatusStopSellRequest").fadeIn(800);  
  });

  /* Tooltip show label text */
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
  });

  $('.qTip-Sub-Name').qtip({ 
    content: {
    text: '<div>XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX</div>'
  },
  position : {
    my: 'bottom right',
    at: 'bottom right',
    target: 'mouse',
  adjust: { x: -7, y: -7 }
  },
    style : { classes: 'qtip-youtube' },
  }) ;

  $('.qTip-Message').qtip({ 
    content: {
    text: '<div class="qtip-long-text">XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX</div>'
  },
    position : {
    my: 'bottom right',
    at: 'bottom right',
    target: 'mouse',
    adjust: { x: -7, y: -7 }
  },
    style : { classes: 'qtip-youtube' },
  }) ;

  $('.qTip-Stop-Sell').qtip({ 
    content: {
    text: '<div class="qtip-long-text">XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX</div>'
  },
    position : {
    my: 'bottom right',
    at: 'bottom right',
    target: 'mouse',
    adjust: { x: -7, y: -7 }
  },
    style : { classes: 'qtip-youtube' },
  }) ;

  $('.qTip-Web-Content').qtip({ 
    content: {
    text: '<div class="qtip-long-text">XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX</div>'
  },
    position : {
    my: 'bottom right',
    at: 'bottom right',
    target: 'mouse',
    adjust: { x: -7, y: -7 }
  },
    style : { classes: 'qtip-youtube' },
  }) ;
  $('.qTip-Remark').qtip({ 
    content: {
    text: '<div class="qtip-long-text">XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX</div>'
  },
    position : {
    my: 'bottom right',
    at: 'bottom right',
    target: 'mouse',
    adjust: { x: -7, y: -7 }
  },
    style : { classes: 'qtip-youtube' },
  }) ;
  
  
  $('.qTip-OP-Service-Apply-ID').qtip({ 
    content: {
    text: '<div class="qTip-content qtip-content-btn-edit"><ul><li>XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX</li><li>XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX</li></ul></div>'
  },
    position : {
    my: 'bottom right',
    at: 'bottom right',
    target: 'mouse',
    adjust: { x: -7, y: -7 }
  },
    style : { classes: 'qtip-bootstrap' },
  });

});