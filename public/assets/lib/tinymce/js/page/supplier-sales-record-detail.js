// JavaScript Document
$(function() {    

  
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
  
   $('.qTip-Sub-Name').qtip({ 
    content: {
        text: '<div>XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX</div>'
    },
    position : {
      my: 'bottom left',
      at: 'bottom left',
      target: 'mouse',
      adjust: { x: -7, y: -7 }
    },
    style : { classes: 'qtip-youtube' },
  }) ;

  
    $('.qTip-Pax1-2').qtip({ 
    hide:{
      delay:250,
      fixed:true
    },
    content: {
        text: '<div class="qTip-content"><table class="table table-customize"><thead><tr><th>Age<br>Bracket</th><th>Pax</th></tr></thead><tbody><tr><td>0-6</td><td>0</td> <tr><td>7-12</td><td>4</td></tr><td>13-60</td><td>5</td></tr> <tr><td>61-</td><td>0</td> </tbody></table></div>'
    },

    position : {
          my: 'bottom right',
          at: 'bottom right',
          target: 'mouse',
          adjust: { x: -10, y: -10 }
        },
        style : { classes: 'qtip-bootstrap' },
  });
    $('.qTip-Number').qtip({ 
    hide:{
      delay:250,
      fixed:true
    },
    content: {
        text: '<div class="qTip-content"><table class="table table-customize"><thead><tr><th>Age<br>Bracket</th><th>Pax</th></tr></thead><tbody><tr><td>0-6</td><td>0</td> <tr><td>7-12</td><td class="text-red">1</td></tr><td>13-60</td><td class="text-red">2</td></tr> <tr><td>61-</td><td>0</td> </tbody></table></div>'
    },

    position : {
          my: 'bottom right',
          at: 'bottom right',
          target: 'mouse',
          adjust: { x: -10, y: -10 }
        },
        style : { classes: 'qtip-bootstrap' },
  });
});

