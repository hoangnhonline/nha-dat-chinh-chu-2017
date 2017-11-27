// JavaScript Document

$(function() {
  $(".btn-show-remark").click(function(){
    $("#Panel_Remark").show();
    $("#Unable_Confirm").hide();
    });
  $(".btn-Unable-Cfm").click(function(){
    $("#Panel_Remark").hide();
    $("#Unable_Confirm").show();
    });
  
 
  /* Qtip */
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
        text: '<div class="qTip-content qtip-content-btn-edit"><ul><li>Message From JHI:<br>Content Content Content Content</li><li>Message From JHI:<br>Content Content Content Content</li></ul></div>'
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
        text: '<div class="qTip-content"><label class="mb05">SVC Date: MM/DD/YYYY</label><table class="table table-customize"><thead><tr><th rowspan="2">Age<br>Braket</th><th rowspan="2">Pax</th><th rowspan="2">OK<br>Count</th><th colspan="2">Number Of Remaining<br>Inventory</th><th rowspan="2">OneShot</th></tr><tr><th>SS</th><th>FZK<br>(Sub)</th></tr></thead><tbody><tr><td>0-6</td><td class="text-number">0</td><td class="text-number">0</td><td rowspan="4"><a href="#" class="link">30/XX</a></td><td rowspan="4"><a href="#" class="link">10/XX</a></td><td rowspan="4" class="text-number">20</td></tr> <tr><td>7-12</td><td class="text-number">1</td><td class="text-number">0</td></tr> <tr><td>13-60</td><td class="text-number">2</td><td class="text-number">2</td></tr> <tr><td>61-</td><td class="text-number">0</td><td class="text-number">0</td></tr> </tbody></table></div>'
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