// JavaScript Document

$(function() {

  /* Show tooltip */

  
  $('.qTip-Pax1').qtip({ 
    hide:{
      delay:250,
      fixed:true
    },
    content: {
        text: '<div class="qTip-content"><label class="mb05">SVC Date: MM/DD/YYYY</label><table class="table table-customize"><thead><tr><th rowspan="2">Age<br>Braket</th><th rowspan="2">Pax</th><th rowspan="2">OK<br>Count</th></thead><tbody><tr><td>0-6</td><td class="text-number">0</td><td class="text-number">0</td><tr><td>7-12</td><td class="text-number">1</td><td class="text-number">0</td></tr> <tr><td>13-60</td><td class="text-number">2</td><td class="text-number">2</td></tr> <tr><td>61-</td><td class="text-number">0</td><td class="text-number">0</td></tr> </tbody></table></div>'
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
        text: '<div class="qTip-content"><label class="mb05">SVC Date: MM/DD/YYYY</label><table class="table table-customize"><thead><tr><th rowspan="2">Pax<br>Type</th><th rowspan="2">Pax</th><th rowspan="2">OK<br>Count</th></thead><tbody><tr><td>ADL</td><td class="text-number">2</td><td class="text-number">2</td><tr><td>CHL</td><td class="text-number">1</td><td class="text-number">0</td></tr> <tr><td>INF</td><td class="text-number">0</td><td class="text-number">0</td></tr> <tr><td>TC</td><td class="text-number">0</td><td class="text-number">0</td></tr> </tbody></table></div>'
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
        text: '<div class="qTip-content"><label class="mb05">SVC Date: MM/DD/YYYY</label><table class="table table-customize"><thead><tr><th rowspan="2">Flat</th><th rowspan="2">Pax</th><th rowspan="2">Qty</th><th rowspan="2">OK<br>Count</th></thead><tbody> <tr> <td>ADL</td><td class="text-number">2</td><td rowspan="4" class="text-number">2</td><td rowspan="4" class="text-number">2</td><tr><td>CHL</td><td class="text-number">1</td></tr> <tr><td>INF</td><td class="text-number">0</td></tr>  <tr><td>TC</td><td class="text-number">0</td></tr> </tbody></table></div>'
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
        text: '<div class="qTip-content"><label class="mb05">SVC Date: MM/DD/YYYY</label><table class="table table-customize"><thead><tr><th rowspan="2">Age<br>Braket</th><th rowspan="2">Pax</th><th rowspan="2">OK<br>Count</th></thead><tbody><tr><td>0-6</td><td class="text-number">0</td><td class="text-number">0</td><tr><td>7-12</td><td class="text-number">1</td><td class="text-number">0</td></tr> <tr><td>13-60</td><td class="text-number">2</td><td class="text-number">2</td></tr> <tr><td>61-</td><td class="text-number">0</td><td class="text-number">0</td></tr> </tbody></table></div>'
    },

    position : {
          my: 'bottom right',
          at: 'bottom right',
          target: 'mouse',
          adjust: { x: -10, y: -10 }
        },
        style : { classes: 'qtip-bootstrap' },
  })

  $('.qTip-Sub-Name').qtip({ 
    content: {
        text: '<div>Tel:XXXXXXXXXXXXXXX</div>'
    },

    position : {
          my: 'bottom left',
          at: 'bottom left',
          target: 'mouse',
          adjust: { x: 7, y: -7 }
        },
        style : { classes: 'qtip-youtube' },
  })

  $('.qTip-Tariff-Name').qtip({ 
    content: {
        text: '<div class="qtip-long-text">XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX</div>'
    },

    position : {
          my: 'bottom left',
          at: 'bottom left',
          target: 'mouse',
          adjust: { x: 7, y: -7 }
        },
        style : { classes: 'qtip-youtube' },
  })

  $('.qTip-Last-Name').qtip({ 
    content: {
        text: '<div class="qtip-long-text"><ul><li>MR.YAMADA TARO</li><li>MR.YAMADA JIRO</li><li>MS.YAMADA HANAKO</li><li>MR.KATO SABURO</li></ul></div>'
    },

    position : {
          my: 'bottom left',
          at: 'bottom left',
          target: 'mouse',
          adjust: { x: 7, y: -7 }
        },
        style : { classes: 'qtip-youtube' },
  })

  $('.qTip-RMKS').qtip({ 
    content: {
        text: '<div class="qtip-long-text"><ul><li><label>Remarks For JHI</label><p>XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX<br>XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX</p></li><li><label>Remarks For CS</label><p>XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX<br>XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX</p></li><li><label>Remarks For Supplier</label><p>XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX<br>XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX</p></li></ul></div>'
    },

    position : {
          my: 'bottom right',
          at: 'bottom right',
          target: 'mouse',
          adjust: { x: -7, y: -7 }
        },
        style : { classes: 'qtip-bootstrap' },
  })
  
});<!-- end Function -->