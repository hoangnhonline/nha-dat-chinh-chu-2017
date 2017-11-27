// JavaScript Document

$(function() {

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