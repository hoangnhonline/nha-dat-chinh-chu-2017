// JavaScript Document

$(function() {
  
  /* Show Side Panel */
  
  $("#frmNewBooking").hide();
  $("#frmSVC_Cancel").hide();
  $("#frmPre-BookEntry").hide();

  $(".btnNewBooking").click(function(){
    $("#frmNewBooking").show();
    $("#frmSearchBookingLists").hide();
    $("#frmPre-BookEntry").hide();
    $("#frmSVC_Cancel").hide();
    $("#frmRefund").hide();
    $("#Panel_Remark").hide();
  });
  
  $(".btnSVC_CXL").click(function(){
    $("#frmSVC_Cancel").show();
    $("#frmSearchBookingLists").hide();
    $("#frmNewBooking").hide();
    $("#frmPre-BookEntry").hide();
    $("#frmRefund").hide();
    $("#Panel_Remark").hide();
  });

  $(".btnPre-BookEntry").click(function(){
    $("#frmSVC_Cancel").hide();
    $("#frmSearchBookingLists").hide();
    $("#frmNewBooking").hide();
    $("#frmPre-BookEntry").show();
    $("#frmRefund").hide();
    $("#Panel_Remark").hide();
  });

  $(".btnRefund").click(function(){
    $("#frmSVC_Cancel").hide();
    $("#frmSearchBookingLists").hide();
    $("#frmNewBooking").hide();
    $("#frmPre-BookEntry").hide();
    $("#frmRefund").show();
    $("#Panel_Remark").hide();
  });

  $(".btnCall-Remarks").click(function(){
    $("#frmSVC_Cancel").hide();
    $("#frmSearchBookingLists").hide();
    $("#frmNewBooking").hide();
    $("#frmPre-BookEntry").hide();
    $("#frmRefund").hide();
    $("#Panel_Remark").show();
  });
  
  $(".sidebar-option-position .sidebar-icon .icon-person").click(function(){
    alert(1);
    $(this).parents('sidebar-option-position').css('right', -450);
  });

  $("#Tab_Active li").click(function() {
    if($(this).hasClass("active")) {}
      $("#StatusHide").show();
  });

  $("#Tab_Active li#TabActive").click(function() {
    if($(this).hasClass("active")) {}
      $("#StatusHide").hide();
  });

  
  /* Show tooltip */
  
  $('.qTip').qtip({ 
    hide:{
      delay:250,
      fixed:true
    },
    content: {
        text: '<div class="qTip-content qtip-content-btn-edit"><ul><li>1. Content Content Content Content<br>Content Content Content Content</li><li>2. Content Content Content Content<br>Content Content Content Content</li></ul></div>'
    },
    position : {
          my: 'bottom left',
          at: 'bottom left',
          target: 'mouse',
          adjust: { x: -10, y: -10 }
        },
        style : { classes: 'qtip-bootstrap' },
  });
  
  $('.qTip2').qtip({ 
    hide:{
      delay:250,
      fixed:true
    },
    content: {
        text: '<div class="qTip-content qtip-content-btn-edit"><ul><li>1. Content Content Content Content<br>Content Content Content Content</li><li>2. Content Content Content Content<br>Content Content Content Content</li><li>3. Content Content Content Content<br>Content Content Content Content</li></ul></div>'
    },
    position : {
          my: 'bottom left',
          at: 'bottom left',
          target: 'mouse',
          adjust: { x: -10, y: -10 }
        },
        style : { classes: 'qtip-bootstrap' },
  });
  
  $('.qTip-Pax1').qtip({ 
    hide:{
      delay:250,
      fixed:true
    },
    content: {
        text: '<div class="qTip-content"><label class="mb05">SVC Date: MM/DD/YYYY</label><table class="table table-customize"><thead><tr><th rowspan="2">Age<br>Braket</th><th rowspan="2">Pax</th><th rowspan="2">OK<br>Count</th><th colspan="3">Number Of Remaining<br>Inventory</th><th rowspan="2">OneShot</th></tr><tr><th>SS</th><th>FZK<br>(Sub)</th><th>MyBus<br>(Sub)</th></tr></thead><tbody><tr><td>0-6</td><td class="text-number">0</td><td class="text-number">0</td><td rowspan="4"><a href="#" class="link">30/XX</a></td><td rowspan="4"><a href="#" class="link">10/XX</a></td><td rowspan="4"><a href="#" class="link">5/XX</a></td><td class="text-number" rowspan="4">20</td></tr> <tr><td>7-12</td><td class="text-number">1</td><td class="text-number">0</td></tr> <tr><td>13-60</td><td class="text-number">2</td><td class="text-number">2</td></tr> <tr><td>61-</td><td class="text-number">0</td><td class="text-number">0</td></tr> </tbody></table></div>'
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
        text: '<div class="qTip-content"><label class="mb05">SVC Date: MM/DD/YYYY</label><table class="table table-customize"><thead><tr><th rowspan="2">Pax<br>Type</th><th rowspan="2">Pax</th><th rowspan="2">OK<br>Count</th><th colspan="3">Number Of Remaining<br>Inventory</th></tr><tr><th>SS</th><th>FZK<br>(Sub)</th><th>MyBus<br>(Sub)</th></tr></thead><tbody><tr><td>ADL</td><td class="text-number">2</td><td class="text-number">2</td><td class="text-number" rowspan="4"><a href="#" class="link">30/XX</a></td><td class="text-number" rowspan="4"><a href="#" class="link">10/XX</a></td><td rowspan="4"><a href="#" class="link">5/XX</a></td></tr> <tr><td>CHL</td><td class="text-number">1</td><td class="text-number">0</td></tr> <tr><td>INF</td><td class="text-number">0</td><td class="text-number">0</td></tr> <tr><td>TC</td><td class="text-number">0</td><td class="text-number">0</td></tr> </tbody></table></div>'
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
        text: '<div class="qTip-content"><label class="mb05">SVC Date: MM/DD/YYYY</label><table class="table table-customize"><thead><tr><th rowspan="2">Pax<br>Type</th><th rowspan="2">Pax</th><th colspan="3"></th><th colspan="3">Number Of Remaining<br>Inventory</th></tr><tr><th>Capacity</th><th>Qty</th><th>OK<br>Count</th><th>SS</th><th>FZK<br>(Sub)</th><th>MyBus<br>(Sub)</th></tr></thead> <tbody><tr><td>ADL</td><td class="text-number">15</td><td class="text-number" rowspan="4">10</td><td class="text-number" rowspan="4">2</td><td class="text-number" rowspan="4">1</td><td rowspan="4"><a href="#" class="link">30/XX</a></td><td rowspan="4"><a href="#" class="link">10/XX</a></td><td rowspan="4"><a href="#" class="link">5/XX</a></td></tr> <tr><td>CHL</td><td class="text-number">4</td></tr> <tr><td>INF</td><td class="text-number">0</td></tr> <tr><td>TC</td><td class="text-number">0</td></tr> </tbody></table></div>'
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
        text: '<div class="qTip-content"><label class="mb05">SVC Date: MM/DD/YYYY</label><table class="table table-customize"><thead><tr><th rowspan="2">Age<br>Braket</th><th rowspan="2">Pax</th><th rowspan="2">OK<br>Count</th><th colspan="3">Number Of Remaining<br>Inventory</th><th rowspan="2">OneShot</th></tr><tr><th>SS</th><th>FZK<br>(Sub)</th><th>MyBus<br>(Sub)</th></tr></thead><tbody><tr><td>0-6</td><td class="text-number">0</td><td class="text-number">0</td><td rowspan="4"><a href="#" class="link">30/XX</a></td><td rowspan="4"><a href="#" class="link">10/XX</a></td><td rowspan="4"><a href="#" class="link">5/XX</a></td><td class="text-number" rowspan="4">20</td></tr> <tr><td>7-12</td><td class="text-number">1</td><td class="text-number">0</td></tr> <tr><td>13-60</td><td class="text-number">2(-2)</td><td class="text-number">2</td></tr> <tr><td>61-</td><td class="text-number">0</td><td class="text-number">0</td></tr> </tbody></table></div>'
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
  
    
  /* Checkbox All */
  $("input#checkAll").change(function(){
    $("input.item_check").prop("checked", this.checked)  
  });
  
});<!-- end Function -->