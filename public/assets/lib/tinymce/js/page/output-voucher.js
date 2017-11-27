// JavaScript Document

$(function() {
  
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
  
  $('.qTip-Pax').qtip({ 
    content: {
        text: '<div class="qTip-content"><table class="table table-customize"><thead><tr><th>Age<br>Bracket</th><th>Pax</th></tr></thead><tbody><tr><td>0-6</td><td>0</td></tr><tr><td>7-12</td><td>4</td></tr><tr><td>13-60</td><td>5</td></tr><tr><td>61</td><td>0</td></tr></tbody></table></div>'
    },
    position : {
          my: 'bottom right',
          at: 'bottom right',
          target: 'mouse',
          adjust: { x: -10, y: -10 }
        },
        style : { classes: 'qtip-bootstrap' },
  });
  
  
});<!-- end Function -->