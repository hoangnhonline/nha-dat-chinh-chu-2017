// JavaScript Document

$(function() {

  /* Fix header table */
  $('#Booking_Queue_Table').fixedHeaderTable({ footer: false, fixedColumns: 3 });
  //$('#Pic_Assignment_Table').fixedHeaderTable({ footer: false, fixedColumns: 4 });
  //$('#Update_All_Booking_Waitlists_Table').fixedHeaderTable({ footer: false, fixedColumns: 4 });
  
  /* Tab setting */
  $(".tab-group-wrap .btn-group-tab li .btn").click(function() {
    $(".tab-group-wrap .btn-group-tab li.active").removeClass("active");
    $(this).parent().addClass("active");
    $('.tab-group-wrap .tab-content-box').hide();
    var content_show_id = $(this).attr("data-id"); 
    $("#"+content_show_id).show();
  });
  
  /* Set height table  */
  var fhtHightFix = $(".fht-hight-fix").height();
  
  if(fhtHightFix < 629) {
    $(".fht-hight-fix").css({height:auto});
  } else {
    $(".fht-hight-fix").addClass('overflow-auto');
  }
  
  $("#Panel_Update_Status_Process").hide();
  $("#Panel_Update_Status_Process_RC1").hide();
  $("#Panel_Update_Status_Process_RC2").hide();
  $("#Panel_Update_Status_Process_RC3").hide();
  $("#Panel_Remark").hide();
  $("#Panel_Call_Vendor").hide();
  $(".sidebar-option-position .sidebar-icon .icon-setting").hide();
  
  /* NB and RC 1 */
  
  $(".btn-show-update-status").click(function(){
    $("#Panel_Remark").hide();
    $("#Panel_Call_Vendor").hide();
    $("#Panel_Search_Position").hide();
    
    $("#Panel_Update_Status_Process_RC1").hide();
    $("#Panel_Update_Status_Process_RC2").hide();
    $("#Panel_Update_Status_Process_RC3").hide();
    $("#Panel_Update_Status_Process").show();
    
    $("#Panel_Update_Status_Process_XR1").hide();
    $("#Panel_Update_Status_Process_XR2").hide();
    $("#Panel_Update_Status_Process_XR3").hide();
    
    $("#Panel_Update_Status_Process_WR1").hide();
    $("#Panel_Update_Status_Process_WR2").hide();
    
  }); 
  
  /* Call Vendor */
  
  $(".btn-show-call-vendor").click(function(){
    $("#Panel_Call_Vendor").show();
    $("#Panel_Search_Position").hide();
    $("#Panel_Remark").hide();
    
    $("#Panel_Update_Status_Process_RC1").hide();
    $("#Panel_Update_Status_Process_RC2").hide();
    $("#Panel_Update_Status_Process_RC3").hide();
    $("#Panel_Update_Status_Process").hide();
    
    $("#Panel_Update_Status_Process_XR1").hide();
    $("#Panel_Update_Status_Process_XR2").hide();
    $("#Panel_Update_Status_Process_XR3").hide();
    
    $("#Panel_Update_Status_Process_WR1").hide();
    $("#Panel_Update_Status_Process_WR2").hide();
  });
  
  /* Remark */
  
  $(".btn-show-remark").click(function(){
    $("#Panel_Remark").show();
    $("#Panel_Call_Vendor").hide();
    $("#Panel_Search_Position").hide();
    
    $("#Panel_Update_Status_Process_RC1").hide();
    $("#Panel_Update_Status_Process_RC2").hide();
    $("#Panel_Update_Status_Process_RC3").hide();
    $("#Panel_Update_Status_Process").hide();
    
    $("#Panel_Update_Status_Process_XR1").hide();
    $("#Panel_Update_Status_Process_XR2").hide();
    $("#Panel_Update_Status_Process_XR3").hide();
    
    $("#Panel_Update_Status_Process_WR1").hide();
    $("#Panel_Update_Status_Process_WR2").hide();
    
  });
  
  /* RC 1 */
  
  $("#Btn_Show_Update_Status_RC1").click(function(){
    $("#Panel_Update_Status_Process_RC1").show();
    $("#Panel_Update_Status_Process_RC2").hide();
    $("#Panel_Update_Status_Process_RC3").hide();
    $("#Panel_Update_Status_Process").hide();
    
    $("#Panel_Update_Status_Process_XR1").hide();
    $("#Panel_Update_Status_Process_XR2").hide();
    $("#Panel_Update_Status_Process_XR3").hide();
    
    $("#Panel_Update_Status_Process_WR1").hide();
    $("#Panel_Update_Status_Process_WR2").hide();
    
    $("#Panel_Remark").hide();
    $("#Panel_Call_Vendor").hide();
    $("#Panel_Search_Position").hide();
  });
  
  /* RC 2 */
  
  $("#Btn_Show_Update_Status_RC2").click(function(){
    $("#Panel_Update_Status_Process_RC1").hide();
    $("#Panel_Update_Status_Process_RC2").show();
    $("#Panel_Update_Status_Process_RC3").hide();
    $("#Panel_Update_Status_Process").hide();
    
    $("#Panel_Update_Status_Process_XR1").hide();
    $("#Panel_Update_Status_Process_XR2").hide();
    $("#Panel_Update_Status_Process_XR3").hide();
    
    $("#Panel_Update_Status_Process_WR1").hide();
    $("#Panel_Update_Status_Process_WR2").hide();
    
    $("#Panel_Remark").hide();
    $("#Panel_Call_Vendor").hide();
    $("#Panel_Search_Position").hide();
  });
  
  /* RC 3 */
  
  $("#Btn_Show_Update_Status_RC3").click(function(){
    $("#Panel_Update_Status_Process_RC1").hide();
    $("#Panel_Update_Status_Process_RC3").show();
    $("#Panel_Update_Status_Process_RC2").hide();
    $("#Panel_Update_Status_Process").hide();
    
    $("#Panel_Update_Status_Process_XR1").hide();
    $("#Panel_Update_Status_Process_XR2").hide();
    $("#Panel_Update_Status_Process_XR3").hide();
    
    $("#Panel_Update_Status_Process_WR1").hide();
    $("#Panel_Update_Status_Process_WR2").hide();
    
    $("#Panel_Remark").hide();
    $("#Panel_Call_Vendor").hide();
    $("#Panel_Search_Position").hide();
  });
  
  /* XR 1 */
  
  $("#Btn_Show_Update_Status_XR1").click(function(){
    $("#Panel_Update_Status_Process_RC1").hide();
    $("#Panel_Update_Status_Process_RC3").hide();
    $("#Panel_Update_Status_Process_RC2").hide();
    $("#Panel_Update_Status_Process").hide();
    
    $("#Panel_Update_Status_Process_XR1").show();
    $("#Panel_Update_Status_Process_XR2").hide();
    $("#Panel_Update_Status_Process_XR3").hide();
    
    $("#Panel_Update_Status_Process_WR1").hide();
    $("#Panel_Update_Status_Process_WR2").hide();
    
    $("#Panel_Remark").hide();
    $("#Panel_Call_Vendor").hide();
    $("#Panel_Search_Position").hide();
  });
  
  /* XR 2 */
  
  $("#Btn_Show_Update_Status_XR2").click(function(){
    $("#Panel_Update_Status_Process_RC1").hide();
    $("#Panel_Update_Status_Process_RC3").hide();
    $("#Panel_Update_Status_Process_RC2").hide();
    $("#Panel_Update_Status_Process").hide();
    
    $("#Panel_Update_Status_Process_XR1").hide();
    $("#Panel_Update_Status_Process_XR2").show();
    $("#Panel_Update_Status_Process_XR3").hide();
    
    $("#Panel_Update_Status_Process_WR1").hide();
    $("#Panel_Update_Status_Process_WR2").hide();
    
    $("#Panel_Remark").hide();
    $("#Panel_Call_Vendor").hide();
    $("#Panel_Search_Position").hide();
  });
  
  /* XR 3 */
  
  $("#Btn_Show_Update_Status_XR3").click(function(){
    $("#Panel_Update_Status_Process_RC1").hide();
    $("#Panel_Update_Status_Process_RC3").hide();
    $("#Panel_Update_Status_Process_RC2").hide();
    $("#Panel_Update_Status_Process").hide();
    
    $("#Panel_Update_Status_Process_XR1").hide();
    $("#Panel_Update_Status_Process_XR2").hide();
    $("#Panel_Update_Status_Process_XR3").show();
    
    $("#Panel_Update_Status_Process_WR1").hide();
    $("#Panel_Update_Status_Process_WR2").hide();
    
    $("#Panel_Remark").hide();
    $("#Panel_Call_Vendor").hide();
    $("#Panel_Search_Position").hide();
  });
  
  /* WR 1 */
  
  $("#Btn_Show_Update_Status_WR1").click(function(){
    $("#Panel_Update_Status_Process_RC1").hide();
    $("#Panel_Update_Status_Process_RC3").hide();
    $("#Panel_Update_Status_Process_RC2").hide();
    $("#Panel_Update_Status_Process").hide();
    
    $("#Panel_Update_Status_Process_XR1").hide();
    $("#Panel_Update_Status_Process_XR2").hide();
    $("#Panel_Update_Status_Process_XR3").hide();
    
    $("#Panel_Update_Status_Process_WR1").show();
    $("#Panel_Update_Status_Process_WR2").hide();
    
    $("#Panel_Remark").hide();
    $("#Panel_Call_Vendor").hide();
    $("#Panel_Search_Position").hide();
  });
  
  /* WR 2 */
  
  $("#Btn_Show_Update_Status_WR2").click(function(){
    $("#Panel_Update_Status_Process_RC1").hide();
    $("#Panel_Update_Status_Process_RC3").hide();
    $("#Panel_Update_Status_Process_RC2").hide();
    $("#Panel_Update_Status_Process").hide();
    
    $("#Panel_Update_Status_Process_XR1").hide();
    $("#Panel_Update_Status_Process_XR2").hide();
    $("#Panel_Update_Status_Process_XR3").hide();
    
    $("#Panel_Update_Status_Process_WR1").hide();
    $("#Panel_Update_Status_Process_WR2").show();
    
    $("#Panel_Remark").hide();
    $("#Panel_Call_Vendor").hide();
    $("#Panel_Search_Position").hide();
  });
  
  /* Fix Safari */
  $(".fht-fixed-column .fht-thead").css("width","190px");
  $(".fht-fixed-column .fht-tbody").css("width","190px");
  
  var is_safari = navigator.userAgent.indexOf("Safari") > -1;
  var is_chrome = navigator.userAgent.indexOf('Chrome') > -1;
  
  if (is_safari) {
    $(".fht-fixed-body .fht-thead").css("margin-left","20px");
  } 
  
  if (is_chrome) {
    //alert(2);
    $(".fht-fixed-body .fht-thead").css("margin-left","0");
  }
  
  
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
  
  
  /* Change label time to input when focus */

  $(".timeInputBox .labelTime").click(function(){
    var inputTime = '<input class="form-control fs12 txtTime" id="" name="" value="12:05">';
    
    
    
    $(this).hide("fast", function(){
      $(this).parent().append(inputTime);
    });

  });
  
  
  $(".locatInputBox .labelLocat").click(function(){
    var inputLocat = '<input class="form-control fs12 w50px txtLocal" id="" name="" value="SWH">';
    
    $(this).hide("fast", function(){
      $(this).parent().append(inputLocat);
    });

  });


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
  
  $('.qTip-Pax1').qtip({ 
    hide:{
      delay:250,
      fixed:true
    },
    content: {
        text: '<div class="qTip-content"><label class="mb05">SVC Date: MM/DD/YYYY</label><table class="table table-customize"><thead><tr><th rowspan="2">Age<br>Braket</th><th rowspan="2">Pax</th><th rowspan="2">OK<br>Count</th><th colspan="2">Number Of Remaining<br>Inventory</th><th rowspan="2">OneShot</th></tr><tr><th>SS</th><th>FZK<br>(Sub)</th></tr></thead><tbody><tr><td>0-6</td><td>0</td><td>0</td><td rowspan="4"><a href="#" class="link">30/XX</a></td><td rowspan="4"><a href="#" class="link">10/XX</a></td><td rowspan="4">20</td></tr> <tr><td>7-12</td><td>1</td><td>0</td></tr> <tr><td>13-60</td><td>2</td><td>2</td></tr> <tr><td>61-</td><td>0</td><td>0</td></tr> </tbody></table></div>'
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
        text: '<div class="qTip-content"><label class="mb05">SVC Date: MM/DD/YYYY</label><table class="table table-customize"><thead><tr><th rowspan="2">Pax<br>Type</th><th rowspan="2">Pax</th><th rowspan="2">OK<br>Count</th><th colspan="3">Number Of Remaining<br>Inventory</th></tr><tr><th>SS</th><th>FZK<br>(Sub)</th></tr></thead><tbody><tr><td>ADL</td><td>2</td><td>2</td><td rowspan="4"><a href="#" class="link">30/XX</a></td><td rowspan="4"><a href="#" class="link">10/XX</a></td></tr> <tr><td>CHL</td><td>1</td><td>0</td></tr> <tr><td>INF</td><td>0</td><td>0</td></tr> <tr><td>TC</td><td>0</td><td>0</td></tr> </tbody></table></div>'
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
        text: '<div class="qTip-content"><label class="mb05">SVC Date: MM/DD/YYYY</label><table class="table table-customize"><thead><tr><th rowspan="2">Pax<br>Type</th><th rowspan="2">Pax</th><th colspan="3"></th><th colspan="3">Number Of Remaining<br>Inventory</th></tr><tr><th>Capacity</th><th>Qty</th><th>OK<br>Count</th><th>SS</th><th>FZK<br>(Sub)</th></tr></thead> <tbody><tr><td>ADL</td><td>15</td><td rowspan="4">10</td><td rowspan="4">2</td><td rowspan="4">1</td><td rowspan="4"><a href="#" class="link">30/XX</a></td><td rowspan="4"><a href="#" class="link">10/XX</a></td></tr> <tr><td>CHL</td><td>4</td></tr> <tr><td>INF</td><td>0</td></tr> <tr><td>TC</td><td>0</td></tr> </tbody></table></div>'
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
        text: '<div class="qTip-content"><label class="mb05">SVC Date: MM/DD/YYYY</label><table class="table table-customize"><thead><tr><th rowspan="2">Age<br>Braket</th><th rowspan="2">Pax</th><th rowspan="2">OK<br>Count</th><th colspan="2">Number Of Remaining<br>Inventory</th><th rowspan="2">OneShot</th></tr><tr><th>SS</th><th>FZK<br>(Sub)</th></tr></thead><tbody><tr><td>0-6</td><td>0</td><td>0</td><td rowspan="4"><a href="#" class="link">30/XX</a></td><td rowspan="4"><a href="#" class="link">10/XX</a></td><td rowspan="4">20</td></tr> <tr><td>7-12</td><td>1</td><td>0</td></tr> <tr><td>13-60</td><td>2(-2)</td><td>2</td></tr> <tr><td>61-</td><td>0</td><td>0</td></tr> </tbody></table></div>'
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
  
  
  /* qTip Pax for Panel */
  $('.qTip-Pax-Panel1').qtip({ 
    content: {
        text: '<div class="qTip-content"><table class="table table-customize"><thead><tr><th>Pax<br>Type</th><th>Pax</th><th>QTY</th></tr></thead><tbody><tr><td>ADL</td><td>15</td><td rowspan="4">2</td></tr> <tr><td>CHL</td><td>4</td></tr> <tr><td>INF</td><td>0</td></tr> <tr><td>TC</td><td>0</td></tr> </tbody></table></div>'
    },
    position : {
          my: 'top right',
          at: 'top right',
          target: 'mouse',
          adjust: { x: 5, y: 5 }
        },
        style : { classes: 'qtip-bootstrap' },
  });
  
  /* qTip Pax for Panel */
  $('.qTip-Pax-Panel2').qtip({ 
    content: {
        text: '<div class="qTip-content"><table class="table table-customize"><thead><tr><th>Pax<br>Type</th><th>Pax</th></tr></thead><tbody><tr><td>ADL</td><td>2</td></tr> <tr><td>CHL</td><td>1</td></tr> <tr><td>INF</td><td>0</td></tr> <tr><td>TC</td><td>0</td></tr> </tbody></table></div>'
    },
    position : {
          my: 'top right',
          at: 'top right',
          target: 'mouse',
          adjust: { x: 5, y: 5 }
        },
        style : { classes: 'qtip-bootstrap' },
  });
  
  /* qTip Pax for Panel */
  $('.qTip-Pax-Panel3').qtip({ 
    content: {
        text: '<div class="qTip-content"><table class="table table-customize"><thead><tr><th>Age<br>Braket</th><th>Pax</th></tr></thead><tbody><tr><td>0-6</td><td>0</td></tr> <tr><td>7-12</td><td>1</td></tr> <tr><td>13-60</td><td>2(-2)</td></tr> <tr><td>61-</td><td>0</td></tr> </tbody></table></div>'
    },
    position : {
          my: 'top right',
          at: 'top right',
          target: 'mouse',
          adjust: { x: 5, y: 5 }
        },
        style : { classes: 'qtip-bootstrap' },
  });
  
  
  
  $(".panel-booking-queue-process .btn-group-tab li > .btn.btn-inactive").on("click", function(){
    $(this).text("ACTIVE");  
  });
  
  
});<!-- end Function -->