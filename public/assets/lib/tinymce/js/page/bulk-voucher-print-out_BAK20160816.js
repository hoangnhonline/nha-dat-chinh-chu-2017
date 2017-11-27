// JavaScript Document

$(function() {
  
  var fhtHightFix = $(".fht-hight-fix").height();
  
  if(fhtHightFix < 629) {
    $(".fht-hight-fix").css({height:auto});
  } else {
    $(".fht-hight-fix").addClass('overflow-auto');
  }

  /* Fix header table */
  $('#Table_Fix_Header').fixedHeaderTable({ footer: false, fixedColumns: 4 });
  
  /* Fix Safari */
  $(".fht-fixed-column .fht-thead").css("width","203px");
  $(".fht-fixed-column .fht-tbody").css("width","203px");
  
  var is_safari = navigator.userAgent.indexOf("Safari") > -1;
  var is_chrome = navigator.userAgent.indexOf('Chrome') > -1;
  
  if (is_safari) {
    $(".fht-fixed-body .fht-thead").css("margin-left","0");
    $(".fht-fixed-column .fht-tbody").css("width","203px");
  } 
  
  if (is_chrome) {
    //alert(2);
    $(".fht-fixed-body .fht-thead").css("margin-left","0");
  }
  
  var widthWin = $(window).width();
  
  if(widthWin > 760) {
    $(".fht-fixed-body").css("width","100%");  
    $(".table-customize").css("width","100%");  
  } 


  $('.qTip').qtip({ 
    content: {
        text: '<div class="qTip-content qtip-content-btn-edit"><ul><li>1. Content Content Content Content<br>Content Content Content Content</li><li>2. Content Content Content Content<br>Content Content Content Content</li></ul></div>'
    },
    position : {
          my: 'bottom left',
          at: 'top left',
          target: 'mouse',
          adjust: { x: 5, y: 5 }
        },
        style : { classes: 'qtip-bootstrap' },
  });
  
  $('.qTip2').qtip({ 
    content: {
        text: '<div class="qTip-content qtip-content-btn-edit"><ul><li>1. Content Content Content Content<br>Content Content Content Content</li><li>2. Content Content Content Content<br>Content Content Content Content</li><li>3. Content Content Content Content<br>Content Content Content Content</li></ul></div>'
    },
    position : {
          my: 'bottom left',
          at: 'top left',
          target: 'mouse',
          adjust: { x: 5, y: 5 }
        },
        style : { classes: 'qtip-bootstrap' },
  });
  
  
  /* Tooltip show label text */
    $('.qTip-Title-Tour-Name').qtip({ 
      content: {
          text: '<div class="qtip-long-text">T Q OAHU6 WKK4 D9BA6NH1BY T Q OAHU6 WKK4 D9BA6NH1BY T Q OAHU6 WKK4 D9BA6NH1BY T Q OAHU6 WKK4 D9BA6NH1BY T Q OAHU6 WKK4 D9BA6NH1BY</div>'
      },
      position : {
        my: 'bottom right',
        at: 'bottom right',
        target: 'mouse',
        adjust: { x: -7, y: -7 }
      },
      style : { classes: 'qtip-youtube' },
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
  
});<!-- end Function -->