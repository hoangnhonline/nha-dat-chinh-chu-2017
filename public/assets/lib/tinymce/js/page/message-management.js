
$(function() {
 
  /* Accordion */
  $('.acco_box .acco_title').on("click",function(){
    $(this).toggleClass('active');
    $(this).next('.acco_dv').slideToggle(350);
  });
  
  // Accordion has icon arrow
  $(document).on('click','.box-accordions .accordion-headers > #id-btn-opened',function(event){
    $('.accordion-headers').toggleClass('active');
    $('.accordion-headers').toggleClass('opened');
  });

  // Accordion has icon arrow
  $(document).on('click','.box-accordions .accordion-headers > #id-btn-opened',function(event){
    $(this).toggleClass('active');
    $(this).toggleClass('opened');
    $(this).parent().next('.box-collapses').slideToggle(200);
  });

  $(".btnShowSelectMailToAddress").click(function(){
      $("#frmTravelWithPanel").show();
      $("#frmRemark").hide();
    });  
   $(".btn-remark").click(function(){
      $("#frmTravelWithPanel").hide();
      $("#frmRemark").show();
    });  
  /* Tooltip show label text */
  $('.qTip-B2B-Name').qtip({ 
    content: {
        text: '<div class="qtip-long-text">XXXXXXXXXXXXXXXXXXXXXXXXXXXXX</div>'
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
      my: 'bottom left',
      at: 'bottom left',
      target: 'mouse',
      adjust: { x: -7, y: -7 }
    },
    style : { classes: 'qtip-youtube' },
  });
  /* Tooltip show label text */
  $('.qTip-Tour-Name').qtip({ 
    content: {
        text: '<div class="qtip-long-text">XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX</div>'
    },
    position : {
      my: 'bottom left',
      at: 'bottom left',
      target: 'mouse',
      adjust: { x: -7, y: -7 }
    },
    style : { classes: 'qtip-youtube' },
  });
   $('.qTip-Sub-Name').qtip({ 
    content: {
        text: '<div>XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX</div>'
    },
    position : {
      my: 'bottom left',
      at: 'bottom left',
      target: 'mouse',
      adjust: { x: -7, y: -7 }
    },
    style : { classes: 'qtip-youtube' },
  });
  
});




