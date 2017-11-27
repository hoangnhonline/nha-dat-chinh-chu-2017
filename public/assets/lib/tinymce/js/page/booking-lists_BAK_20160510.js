// JavaScript Document

$(function() {
  
  $("#checkAll").change(function(){
    $(".item_check").prop("checked", this.checked)  
  });

  /* Fix header table */
  $('#Table_Booking_Lists').fixedHeaderTable({ footer: false, fixedColumns: 4 });
  
  /* Change label time to input when focus */

  $(".timeInputBox .labelTime").click(function(){
    var inputTime = '<input class="form-control fs12 txtTime" id="" name="" value="12:05">';
    
    
    
    $(this).hide("fast", function(){
      $(this).parent().append(inputTime);
    });

  });
  
  /* Fix Safari */
  $(".fht-fixed-column .fht-thead").css("width","157px");
  $(".fht-fixed-column .fht-tbody").css("width","157px");
  
  var is_safari = navigator.userAgent.indexOf("Safari") > -1;
  var is_chrome = navigator.userAgent.indexOf('Chrome') > -1;
  
  if (is_safari) {
    $(".fht-fixed-body .fht-thead").css("margin-left","21px");
    $(".fht-fixed-column .fht-tbody").css("width","157px");
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
 
  
  
  $(".locatInputBox .labelLocat").click(function(){
    var inputLocat = '<input class="form-control fs12 w50px txtLocal" id="" name="" value="SWH">';
    
    $(this).hide("fast", function(){
      $(this).parent().append(inputLocat);
    });

  });


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
  
  $('.qTip-Pax1').qtip({ 
    hide:{
      delay:250,
      fixed:true
    },
    content: {
        text: '<div class="qTip-content"><label class="mb05">SVC Date: MM/DD/YYYY</label><table class="table table-customize"><thead><tr><th rowspan="2">Age<br>Braket</th><th rowspan="2">Pax</th><th rowspan="2">OK<br>Count</th><th colspan="3">Number Of Remaining<br>Inventory</th><th rowspan="2">OneShot</th></tr><tr><th>SS</th><th>FZK<br>(Sub)</th><th>MyBus<br>(Sub)</th></tr></thead><tbody><tr><td>0-6</td><td>0</td><td>0</td><td rowspan="4"><a href="#" class="link">30/XX</a></td><td rowspan="4"><a href="#" class="link">10/XX</a></td><td rowspan="4"><a href="#" class="link">5/XX</a></td><td rowspan="4">20</td></tr> <tr><td>7-12</td><td>1</td><td>0</td></tr> <tr><td>13-60</td><td>2</td><td>2</td></tr> <tr><td>61-</td><td>0</td><td>0</td></tr> </tbody></table></div>'
    },
    position : {
          my: 'bottom right',
          at: 'bottom right',
          target: 'mouse',
          adjust: { x: -10, y: -10 }
        },
        style : { classes: 'qtip-bootstrap' },
  });
  
  $('.qTip-Pax2').qtip({ 
    hide:{
      delay:250,
      fixed:true
    },
    content: {
        text: '<div class="qTip-content"><label class="mb05">SVC Date: MM/DD/YYYY</label><table class="table table-customize"><thead><tr><th rowspan="2">Pax<br>Type</th><th rowspan="2">Pax</th><th rowspan="2">OK<br>Count</th><th colspan="3">Number Of Remaining<br>Inventory</th></tr><tr><th>SS</th><th>FZK<br>(Sub)</th><th>MyBus<br>(Sub)</th></tr></thead><tbody><tr><td>ADL</td><td>2</td><td>2</td><td rowspan="4"><a href="#" class="link">30/XX</a></td><td rowspan="4"><a href="#" class="link">10/XX</a></td><td rowspan="4"><a href="#" class="link">5/XX</a></td></tr> <tr><td>CHL</td><td>1</td><td>0</td></tr> <tr><td>INF</td><td>0</td><td>0</td></tr> <tr><td>TC</td><td>0</td><td>0</td></tr> </tbody></table></div>'
    },
    position : {
          my: 'bottom right',
          at: 'bottom right',
          target: 'mouse',
          adjust: { x: -10, y: -10 }
        },
        style : { classes: 'qtip-bootstrap' },
  });
  
  $('.qTip-Pax3').qtip({ 
    hide:{
      delay:250,
      fixed:true
    },
    content: {
        text: '<div class="qTip-content"><label class="mb05">SVC Date: MM/DD/YYYY</label><table class="table table-customize"><thead><tr><th rowspan="2">Pax<br>Type</th><th rowspan="2">Pax</th><th colspan="3"></th><th colspan="3">Number Of Remaining<br>Inventory</th></tr><tr><th>Capacity</th><th>Qty</th><th>OK<br>Count</th><th>SS</th><th>FZK<br>(Sub)</th><th>MyBus<br>(Sub)</th></tr></thead> <tbody><tr><td>ADL</td><td>15</td><td rowspan="4">10</td><td rowspan="4">2</td><td rowspan="4">1</td><td rowspan="4"><a href="#" class="link">30/XX</a></td><td rowspan="4"><a href="#" class="link">10/XX</a></td><td rowspan="4"><a href="#" class="link">5/XX</a></td></tr> <tr><td>CHL</td><td>4</td></tr> <tr><td>INF</td><td>0</td></tr> <tr><td>TC</td><td>0</td></tr> </tbody></table></div>'
    },

    position : {
          my: 'bottom right',
          at: 'bottom right',
          target: 'mouse',
          adjust: { x: -10, y: -10 }
        },
        style : { classes: 'qtip-bootstrap' },
  })
  
  $('.qTip-Pax4-2').qtip({ 
    hide:{
      delay:250,
      fixed:true
    },
    content: {
        text: '<div class="qTip-content"><label class="mb05">SVC Date: MM/DD/YYYY</label><table class="table table-customize"><thead><tr><th rowspan="2">Age<br>Braket</th><th rowspan="2">Pax</th><th rowspan="2">OK<br>Count</th><th colspan="3">Number Of Remaining<br>Inventory</th><th rowspan="2">OneShot</th></tr><tr><th>SS</th><th>FZK<br>(Sub)</th><th>MyBus<br>(Sub)</th></tr></thead><tbody><tr><td>0-6</td><td>0</td><td>0</td><td rowspan="4"><a href="#" class="link">30/XX</a></td><td rowspan="4"><a href="#" class="link">10/XX</a></td><td rowspan="4"><a href="#" class="link">5/XX</a></td><td rowspan="4">20</td></tr> <tr><td>7-12</td><td>1</td><td>0</td></tr> <tr><td>13-60</td><td>2(-2)</td><td>2</td></tr> <tr><td>61-</td><td>0</td><td>0</td></tr> </tbody></table></div>'
    },

    position : {
          my: 'bottom right',
          at: 'bottom right',
          target: 'mouse',
          adjust: { x: -10, y: -10 }
        },
        style : { classes: 'qtip-bootstrap' },
  })
  
  
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
  })
  
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
  })
  $('.qTip-Title-Manifest').qtip({ 
    content: {
        text: '<div>ABCDEFG HIGKLMN ABCDEFG HIGKLMN ABCDEFG HIGKLMN</div>'
    },
    position : {
      my: 'bottom right',
      at: 'bottom right',
      target: 'mouse',
      adjust: { x: -7, y: -7 }
    },
    style : { classes: 'qtip-youtube' },
  })
  
  
  
});<!-- end Function -->