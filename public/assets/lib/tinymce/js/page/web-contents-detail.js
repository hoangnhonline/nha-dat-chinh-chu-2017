// JavaScript Document

$(function() {
  
  /* Mditor Tinymce */
  tinymce.init({
    selector: '.editorBasic',
    plugins: [
      "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
      "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
      "table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern"
    ],
    
    toolbar1: "undo redo | bold italic | styleselect | forecolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link unlink",
  
    menubar: 'false'
  });
 /* Show Panel Select Tariff Code */
  
  $("#btnShowSelectTariffCodePanel, #btnShowSelectTariffCodePanel2").click(function(){
    $("#frmTariffCodePanel").show();  
    $("#frmCopyContentsDetailPanel").hide();
	 $("#frmSearchOpService").hide(); 
  });
  
 /* Show Panel Select Web Contents Basic - Sidebar Common */
  $("#btnCopyContentsDetailPanel").click(function(){
   $("#frmTariffCodePanel").hide(); 
    $("#frmCopyContentsDetailPanel").show();
	 $("#frmSearchOpService").hide();
  });
  
 
  //Search
  $("#btn-search-op").click(function(){
  $("#frmTariffCodePanel").hide();  
    $("#frmCopyContentsDetailPanel").hide();
	 $("#frmSearchOpService").show();
	 
  });
  
  /* Tooltip show label text */  
  $('.qTip-Hiop-Title').qtip({ 
    content: {
        text: '<div class="qtip-long-text">XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX</div>'
    },
    position : {
      my: 'bottom left',
      at: 'bottom left',
      target: 'mouse',
      adjust: { x: -7, y: -7 }
    },
    style : { classes: 'qtip-youtube' },
  }) ;
  
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
  
  /* Tooltip show label text */  
  $('.qTip-Web-Contents-Basic-Title').qtip({ 
    content: {
        text: '<div class="qtip-long-text">XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX</div>'
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
  $('.qTip-Qa-Contents').qtip({ 
    content: {
        text: '<div class="qtip-long-text">XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX</div>'
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
  $('.qTip-Tariff-Name-Panel').qtip({ 
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
  $('.qTip-Plan-Title-Panel').qtip({ 
    content: {
        text: '<div class="qtip-long-text">XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX</div>'
    },
    position : {
      my: 'bottom right',
      at: 'bottom right',
      target: 'mouse',
      adjust: { x: -7, y: -7 }
    },
    style : { classes: 'qtip-youtube' },
  }) 

  
  /* Tab Category, Icon */
  
  $(".tag-list .item .icon-del").on("click", function(){
    $(this).parent().remove();  
  });

  /* Sort */
  
  $('#tableItinerary tbody').sortable();
  

  /* Switch checkbox */
  
  $(".switch-checkbox").bootstrapSwitch();
  
});<!-- end Function -->