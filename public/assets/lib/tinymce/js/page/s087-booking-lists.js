// JavaScript Document

$(function() {
  
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

  // frmResendToDispatch
  $("#frmResendToDispatch").hide();
  $("#btnShowResendToDispatchPanel").click(function(){
    $("#frmResendToDispatch").show();
    $(".sidebar-option-position .search-position").hide();
  });
  
  /* Tooltip show label text */  
  $('.qTip-Web-Tour-Name').qtip({ 
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
  
  /* Tooltip show label text */  
  $('.qTip-Operation-Content').qtip({ 
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
  

  // qtip Pax1  
  $('.qTip-Pax1').qtip({ 
    hide:{
      delay:250,
      fixed:true
    },
    content: {
        text: '<div class="qTip-content"><label class="mb05">SVC Date: MM/DD/YYYY</label><table class="table table-customize"><thead><tr><th rowspan="2">Age<br>Braket</th><th rowspan="2">Pax</th><th rowspan="2">OK<br>Count</th><th colspan="3">Number Of Remaining<br>Inventory</th><th rowspan="2">OneShot</th></tr><tr><th>SS</th><th>FZK<br>(Sub)</th><th>MyBus<br>(Sub)</th></tr></thead><tbody><tr><td>0-6</td><td class="text-number">0</td><td class="text-number">0</td><td rowspan="4"><a href="#" class="link">30/XX</a></td><td rowspan="4"><a href="#" class="link">10/XX</a></td><td rowspan="4"><a href="#" class="link">5/XX</a></td><td rowspan="4" class="text-number">20</td></tr><tr><td>7-12</td><td class="text-number">1</td><td class="text-number">0</td></tr><tr><td>13-60</td><td class="text-number">2</td><td class="text-number">2</td></tr><tr><td>61-</td><td class="text-number">0</td><td class="text-number">0</td></tr></tbody></table></div>'
    },
    position : {
          my: 'bottom right',
          at: 'bottom right',
          target: 'mouse',
          adjust: { x: -10, y: -10 }
        },
        style : { classes: 'qtip-bootstrap' },
  });
  // qtip Pax2
  $('.qTip-Pax2').qtip({ 
    hide:{
      delay:250,
      fixed:true
    },
    content: {
        text: '<div class="qTip-content"><label class="mb05">SVC Date: MM/DD/YYYY</label><table class="table table-customize"><thead><tr><th rowspan="2">Pax<br>Type</th><th rowspan="2">Pax</th><th rowspan="2">OK<br>Count</th><th colspan="3">Number Of Remaining<br>Inventory</th></tr><tr><th>SS</th><th>FZK<br>(Sub)</th><th>MyBus<br>(Sub)</th></tr></thead><tbody><tr><td>ADL</td><td class="text-number">2</td><td class="text-number">2</td><td rowspan="4"><a href="#" class="link">30/XX</a></td><td rowspan="4"><a href="#" class="link">10/XX</a></td><td rowspan="4"><a href="#" class="link">5/XX</a></td></tr> <tr><td>CHL</td><td class="text-number">1</td><td class="text-number">0</td></tr> <tr><td>INF</td><td class="text-number">0</td><td class="text-number">0</td></tr> <tr><td>TC</td><td class="text-number">0</td><td class="text-number">0</td></tr> </tbody></table></div>'
    },
    position : {
          my: 'bottom right',
          at: 'bottom right',
          target: 'mouse',
          adjust: { x: -10, y: -10 }
        },
        style : { classes: 'qtip-bootstrap' },
  });
  // qtip Pax3
  $('.qTip-Pax3').qtip({ 
    hide:{
      delay:250,
      fixed:true
    },
    content: {
        text: '<div class="qTip-content"><label class="mb05">SVC Date: MM/DD/YYYY</label><table class="table table-customize"><thead><tr><th rowspan="2">Pax<br>Type</th><th rowspan="2">Pax</th><th colspan="3"></th><th colspan="3">Number Of Remaining<br>Inventory</th></tr><tr><th>Capacity</th><th>Qty</th><th>OK<br>Count</th><th>SS</th><th>FZK<br>(Sub)</th><th>MyBus<br>(Sub)</th></tr></thead> <tbody><tr><td>ADL</td><td>15</td><td rowspan="4">10</td><td rowspan="4" class="text-number">2</td><td rowspan="4" class="text-number">1</td><td rowspan="4"><a href="#" class="link">30/XX</a></td><td rowspan="4"><a href="#" class="link">10/XX</a></td><td rowspan="4"><a href="#" class="link">5/XX</a></td></tr> <tr><td>CHL</td><td>4</td></tr> <tr><td>INF</td><td>0</td></tr> <tr><td>TC</td><td>0</td></tr> </tbody></table></div>'
    },

    position : {
          my: 'bottom right',
          at: 'bottom right',
          target: 'mouse',
          adjust: { x: -10, y: -10 }
        },
        style : { classes: 'qtip-bootstrap' },
  })
  
});<!-- end Function -->