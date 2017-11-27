// JavaScript Document

$(function() {
  
  /* Panel for Category */
  $("#btnShowUploadCsvPanel, #btnShowUploadCsvPanel2").click(function(){
    $("#frmUploadCsvCategory").show();   
    $("#frmUploadCsvArea").hide();
    $("#frmUploadCsvIcon").hide();  
     
    $("#frmEditCategory").hide();  
    $("#frmEditArea").hide();  
    $("#frmEditIcon").hide();  
    $("#frmDisplayOrderSort").hide();  
    
    $("#frmEditCategory2").hide(); 
    $("#frmEditArea2").hide(); 
    $("#frmEditIcon2").hide(); 
    
    $("#frmCreateCategory").hide(); 
    $("#frmCreateArea").hide(); 
    $("#frmCreateIcon").hide(); 

    $("#frmCreateCategory2").hide(); 
    $("#frmCreateArea2").hide(); 
    $("#frmCreateIcon2").hide(); 
  });
  
  // Edit button
  $(".btnShowEditCategoryPanel").click(function(){
    $("#frmEditCategory").show();   
    $("#frmUploadCsvIcon").hide();   
    $("#frmUploadCsvCategory").hide();
    $("#frmUploadCsvArea").hide();
    
    $("#frmEditArea").hide();    
    $("#frmEditIcon").hide();  
    $("#frmDisplayOrderSort").hide(); 
    
    $("#frmEditCategory2").hide(); 
    $("#frmEditArea2").hide(); 
    $("#frmEditIcon2").hide();
    
     $("#frmCreateCategory").hide(); 
    $("#frmCreateArea").hide(); 
    $("#frmCreateIcon").hide();  

    $("#frmCreateCategory2").hide(); 
    $("#frmCreateArea2").hide(); 
    $("#frmCreateIcon2").hide(); 
  });
  
  // New button
  $("#btnShowNewCategoryPanel").on("click",function(){
    //$(document).on('click','#btnShowNewCategoryPanel',function(){
    $("#frmUploadCsvCategory").hide();   
    $("#frmUploadCsvArea").hide();
    $("#frmUploadCsvIcon").hide();  
     
    $("#frmEditCategory").hide();  
    $("#frmEditArea").hide();
    $("#frmEditIcon").hide();
    
    $("#frmDisplayOrderSort").hide();
    
    $("#frmEditCategory2").hide(); 
    $("#frmEditArea2").hide(); 
    $("#frmEditIcon2").hide();   
    
    $("#frmCreateCategory").show(function(){
      
      $("#slMainCategory").hide();
      $("[name='radioMainSub']").change(function(){
        if($("#radioSubPanel").prop("checked")) {
          $("#slMainCategory").show();
        }
        if($("#radioMainPanel").prop("checked")) {
          $("#slMainCategory").hide();
        }
      });  
    }); 
    $("#frmCreateArea").hide(); 
    $("#frmCreateIcon").hide(); 

    $("#frmCreateCategory2").hide(); 
    $("#frmCreateArea2").hide(); 
    $("#frmCreateIcon2").hide(); 
  });
  
  // ENG
  $(".btnShowEditCategoryPanel2").click(function(){
    $("#frmUploadCsvCategory").hide();   
    $("#frmUploadCsvArea").hide();
    $("#frmUploadCsvIcon").hide();  
     
    $("#frmEditCategory").hide();  
    $("#frmEditArea").hide();
    $("#frmEditIcon").hide();
    
    $("#frmDisplayOrderSort").hide(); 
    
    $("#frmEditCategory2").show();  
    $("#frmEditArea2").hide(); 
    $("#frmEditIcon2").hide(); 
    
     $("#frmCreateCategory").hide(); 
    $("#frmCreateArea").hide(); 
    $("#frmCreateIcon").hide(); 

    $("#frmCreateCategory2").hide(); 
    $("#frmCreateArea2").hide(); 
    $("#frmCreateIcon2").hide(); 
  });

  // ENG
  $("#btnShowNewCategoryPanel2").click(function(){
    $("#frmUploadCsvCategory").hide();   
    $("#frmUploadCsvArea").hide();
    $("#frmUploadCsvIcon").hide();  
     
    $("#frmEditCategory").hide();  
    $("#frmEditArea").hide();
    $("#frmEditIcon").hide();
    
    $("#frmDisplayOrderSort").hide(); 
    
    $("#frmEditCategory2").hide();  
    $("#frmEditArea2").hide(); 
    $("#frmEditIcon2").hide(); 
    
     $("#frmCreateCategory").hide(); 
    $("#frmCreateArea").hide(); 
    $("#frmCreateIcon").hide(); 

    $("#frmCreateCategory2").show(function(){
      $("#slMainCategory2").hide();
      $("[name='radioMainSub2']").change(function(){
        if($("#radioSubPanel2").prop("checked")) {
          $("#slMainCategory2").show();
        }
        if($("#radioMainPanel2").prop("checked")) {
          $("#slMainCategory2").hide();
        }
      });  
    });
     
    $("#frmCreateArea2").hide(); 
    $("#frmCreateIcon2").hide(); 
  });
  
  // Order button
  $("#btnShowDisplayOrderSort, #btnShowDisplayOrderSort2").click(function(){
    $("#frmDisplayOrderSort").show();  
    
    $("#frmUploadCsvCategory").hide();   
    $("#frmUploadCsvArea").hide();
    $("#frmUploadCsvIcon").hide(); 
    
    $("#frmEditCategory").hide();   
    $("#frmEditArea").hide();
    $("#frmEditIcon").hide();      
    
    $("#frmEditCategory2").hide(); 
    $("#frmEditArea2").hide(); 
    $("#frmEditIcon2").hide();  
  
   $("#frmCreateCategory").hide(); 
    $("#frmCreateArea").hide(); 
    $("#frmCreateIcon").hide(); 

    $("#frmCreateCategory2").hide(); 
    $("#frmCreateArea2").hide(); 
    $("#frmCreateIcon2").hide(); 
  });
  
  
  
  /* Panel for Area */
  $("#btnShowUploadCsvArea, #btnShowUploadCsvArea2").click(function(){
    
    $("#frmUploadCsvCategory").hide();   
    $("#frmUploadCsvArea").show();
    $("#frmUploadCsvIcon").hide();  
     
    $("#frmEditCategory").hide();  
    $("#frmEditArea").hide();
    $("#frmEditIcon").hide();
    
    $("#frmDisplayOrderSort").hide(); 
    
    $("#frmEditCategory2").hide();
    $("#frmEditArea2").hide(); 
    $("#frmEditIcon2").hide();
    
     $("#frmCreateCategory").hide(); 
    $("#frmCreateArea").hide(); 
    $("#frmCreateIcon").hide(); 

    $("#frmCreateCategory2").hide(); 
    $("#frmCreateArea2").hide(); 
    $("#frmCreateIcon2").hide(); 
    
      });

  $(".btnShowEditIslandAreaPanel").click(function(){
    $("#frmUploadCsvCategory").hide();   
    $("#frmUploadCsvArea").hide();
    $("#frmUploadCsvIcon").hide();  
     
    $("#frmEditCategory").hide();  
    
    $("#frmEditArea").show();
    
    $("#frmEditIcon").hide();
    
    $("#frmDisplayOrderSort").hide(); 
    
    $("#frmEditCategory2").hide();
    $("#frmEditArea2").hide(); 
    $("#frmEditIcon2").hide(); 
    
    $("#frmCreateCategory").hide(); 
    $("#frmCreateArea").hide(); 
    $("#frmCreateIcon").hide(); 

    $("#frmCreateCategory2").hide(); 
    $("#frmCreateArea2").hide(); 
    $("#frmCreateIcon2").hide(); 
  });
  
  $("#btnShowNewAreaPanel").click(function(){

    $("#frmUploadCsvCategory").hide();   
    $("#frmUploadCsvArea").hide();
    $("#frmUploadCsvIcon").hide();  
     
    $("#frmEditCategory").hide();  
    $("#frmEditArea").hide();
    $("#frmEditIcon").hide();
    
    $("#frmDisplayOrderSort").hide(); 
    
    $("#frmEditCategory2").hide();
    $("#frmEditArea2").hide(); 
    $("#frmEditIcon2").hide(); 
    
    $("#frmCreateCategory").hide(); 
    
    $("#frmCreateArea").show(function(){
      $("#slIslandArea").hide();
      $("[name='radioIslandArea']").change(function(){
        if($("#radioAreaPanel").prop("checked")) {
          $("#slIslandArea").show();
        }
        if($("#radioIslandPanel").prop("checked")) {
          $("#slIslandArea").hide();
        }
      });    
    }); 
    
    $("#frmCreateIcon").hide(); 

    $("#frmCreateCategory2").hide(); 
    $("#frmCreateArea2").hide(); 
    $("#frmCreateIcon2").hide(); 
    
  });
  
  // ENG
  $(".btnShowEditIslandAreaPanel2").click(function(){
    $("#frmUploadCsvCategory").hide();   
    $("#frmUploadCsvArea").hide();
    $("#frmUploadCsvIcon").hide();  
     
    $("#frmEditCategory").hide();  
    $("#frmEditArea").hide();
    $("#frmEditIcon").hide();
    
    $("#frmDisplayOrderSort").hide(); 
    
    $("#frmEditCategory2").hide();
    $("#frmEditArea2").show(); 
    $("#frmEditIcon2").hide(); 

    $("#frmCreateCategory").hide(); 
    $("#frmCreateArea").hide(); 
    $("#frmCreateIcon").hide(); 

    $("#frmCreateCategory2").hide(); 
    $("#frmCreateArea2").hide(); 
    $("#frmCreateIcon2").hide(); 
  });

  $("#btnShowNewAreaPanel2").click(function(){
    $("#frmUploadCsvCategory").hide();   
    $("#frmUploadCsvArea").hide();
    $("#frmUploadCsvIcon").hide();  
     
    $("#frmEditCategory").hide();  
    $("#frmEditArea").hide();
    $("#frmEditIcon").hide();
    
    $("#frmDisplayOrderSort").hide(); 
    
    $("#frmEditCategory2").hide();
    $("#frmEditArea2").hide(); 
    $("#frmEditIcon2").hide(); 

    $("#frmCreateCategory").hide(); 
    $("#frmCreateArea").hide(); 
    $("#frmCreateIcon").hide(); 

    $("#frmCreateCategory2").hide(); 
    
    $("#frmCreateArea2").show(function(){
      $("#slIslandArea2").hide();
      $("[name='radioIslandArea2']").change(function(){
        if($("#radioAreaPanel2").prop("checked")) {
          $("#slIslandArea2").show();
        }
        if($("#radioIslandPanel2").prop("checked")) {
          $("#slIslandArea2").hide();
        }
      });
    });
     
    $("#frmCreateIcon2").hide(); 
  });
  
  /* Panel for Icon */
  $("#btnShowUploadCsvIcon, #btnShowUploadCsvIcon2").click(function(){
    
    $("#frmUploadCsvCategory").hide();   
    $("#frmUploadCsvArea").hide();
    $("#frmUploadCsvIcon").show();  
     
    $("#frmEditCategory").hide();  
    $("#frmEditArea").hide();
    $("#frmEditIcon").hide();
    
    $("#frmDisplayOrderSort").hide();  
    
    $("#frmEditCategory2").hide();
    $("#frmEditArea2").hide(); 
    $("#frmEditIcon2").hide(); 
   
   $("#frmCreateCategory").hide(); 
    $("#frmCreateArea").hide(); 
    $("#frmCreateIcon").hide(); 
  });

    /* Panel for Icon */
  $("#btnShowUploadCsvIcon2").click(function(){
    
    $("#frmUploadCsvCategory").hide();   
    $("#frmUploadCsvArea").hide();
    $("#frmUploadCsvIcon").show();  
     
    $("#frmEditCategory").hide();  
    $("#frmEditArea").hide();
    $("#frmEditIcon").hide();
    
    $("#frmDisplayOrderSort").hide();  
    
    $("#frmEditCategory2").hide();
    $("#frmEditArea2").hide(); 
    $("#frmEditIcon2").hide(); 
   
    $("#frmCreateCategory").hide(); 
    $("#frmCreateArea").hide(); 
    $("#frmCreateIcon").hide(); 

    $("#frmCreateCategory2").hide(); 
    $("#frmCreateArea2").hide(); 
    $("#frmCreateIcon2").hide();
  });
  
  $(".btnShowEditIconPanel").click(function(){
    $("#frmEditCategory").hide();
    $("#frmEditArea").hide();
    $("#frmEditIcon").show();
    
    $("#frmUploadCsvCategory").hide();   
    $("#frmUploadCsvArea").hide();
    $("#frmUploadCsvIcon").hide(); 
    
    $("#frmDisplayOrderSort").hide(); 
    
    $("#frmEditCategory2").hide();
    $("#frmEditArea2").hide(); 
    $("#frmEditIcon2").hide(); 
   
    $("#frmCreateCategory").hide(); 
    $("#frmCreateArea").hide(); 
    $("#frmCreateIcon").hide();

    $("#frmCreateCategory2").hide(); 
    $("#frmCreateArea2").hide(); 
    $("#frmCreateIcon2").hide();
  });
  
  $("#btnShowNewIconPanel").click(function(){
    
    $("#frmEditCategory").hide();
    $("#frmEditArea").hide();
    $("#frmEditIcon").show();
    
    $("#frmUploadCsvCategory").hide();   
    $("#frmUploadCsvArea").hide();
    $("#frmUploadCsvIcon").hide(); 
    
    $("#frmDisplayOrderSort").hide(); 
    
    $("#frmEditCategory2").hide();
    $("#frmEditArea2").hide(); 
    $("#frmEditIcon2").hide(); 
   
    $("#frmCreateCategory").hide(); 
    $("#frmCreateArea").hide(); 
    $("#frmCreateIcon").hide();

    $("#frmCreateCategory2").hide(); 
    $("#frmCreateArea2").hide(); 
    $("#frmCreateIcon2").hide();

  });  
  
  // ENG
  $(".btnShowEditIconPanel2, #btnShowNewIconPanel2").click(function(){
    
    $("#frmUploadCsvCategory").hide();   
    $("#frmUploadCsvArea").hide();
    $("#frmUploadCsvIcon").hide();  
     
    $("#frmEditCategory").hide();  
    $("#frmEditArea").hide();
    $("#frmEditIcon").hide();
    
    $("#frmDisplayOrderSort").hide();  
    
    $("#frmEditCategory2").hide();
    $("#frmEditArea2").hide(); 
    $("#frmEditIcon2").show(); 
    
    $("#frmCreateCategory").hide(); 
    $("#frmCreateArea").hide(); 
    $("#frmCreateIcon").hide(); 

    $("#frmCreateCategory2").hide(); 
    $("#frmCreateArea2").hide(); 
    $("#frmCreateIcon2").hide();
    
  });
  
  
  /* Sort */
  
  $(function(){
    $('.sort-website-category > ul').sortable();
    $('.sort-website-category > ul > li > ul').sortable();
  });
  
  
  /* Color Picker */
  $(".colorpicker").colorpicker();
  
  /* Select Miltiple */
  $('.select2-multiple').select2(); 
  
  /* TAB CATEGORY */
  
  /* Show Tooltip for Text */
  $('.qTip-Category-Param').qtip({ 
    content: {
        text: '<div class="qtip-long-text">XXXXXXXXXXXXXXXXXXXX</div>'
    },
    position : {
      my: 'bottom left',
      at: 'bottom left',
      target: 'mouse',
      adjust: { x: -7, y: -7 }
    },
    style : { classes: 'qtip-youtube' },
  }) ; 
  
  /* Show Tooltip for Text */
  $('.qTip-Main-Category-Name').qtip({ 
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
  }) ; 
  
  /* Show Tooltip for Text */
  $('.qTip-Sub-Category-Name').qtip({ 
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
  }) ; 
  
  /* Show Tooltip for Text */
  $('.qTip-Category-Description').qtip({ 
    content: {
        text: '<div class="qtip-long-text">XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX</div>'
    },
    position : {
      my: 'bottom right',
      at: 'bottom right',
      target: 'mouse',
      adjust: { x: -7, y: -7 }
    },
    style : { classes: 'qtip-youtube' },
  }) ; 
    
  
  $('.qTip-show-img').qtip({ 
    content: {
        text: '<div class="qTip-content"><img src="uploads/photo-1.jpg" alt="" height="150"></div>'
    },
    position : {
        my: 'bottom left',
        at: 'top left',
        target: 'mouse',
        adjust: { x: 5, y: 5 }
      },
      style : { classes: 'qtip-bootstrap' },
  });

  $('.qTip-Number-Of-Fixed-Tariff').qtip({ 
    hide:{
      delay:250,
      fixed:true
    },
    content: {
        text: '<div class="qTip-content"><table class="table table-customize"><thead><tr><th>Tariff Code</th></tr></thead><tbody><tr><td><a href="#" class="link">HNLO12345678</a></td></tr> <tr><td><a href="#" class="link">HNLO12345678</a></td></tr> <tr><td><a href="#" class="link">HNLO12345678</a></td></tr> <tr><td><a href="#" class="link">HNLO12345678</a></td></tr> <tr><td><a href="#" class="link">HNLO12345678</a></td></tr> <tr><td><a href="#" class="link">HNLO12345678</a></td></tr> <tr><td><a href="#" class="link">HNLO12345678</a></td></tr>  </tbody></table></div>'
    },
    position : {
        my: 'top right',
        at: 'top right',
        target: 'mouse',
        adjust: { x: -10, y: -10 }
      },
      style : { classes: 'qtip-bootstrap' },
  });
  
  /* TAB AREA */
  
  /* Show Tooltip for Text */
  $('.qTip-Island-Area-Param').qtip({ 
    content: {
        text: '<div class="qtip-long-text">XXXXXXXXXXXXXXXXXXXX</div>'
    },
    position : {
      my: 'bottom left',
      at: 'bottom left',
      target: 'mouse',
      adjust: { x: -7, y: -7 }
    },
    style : { classes: 'qtip-youtube' },
  }) ; 
  
  /* Show Tooltip for Text */
  $('.qTip-Area-Description').qtip({ 
    content: {
        text: '<div class="qtip-long-text">XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX</div>'
    },
    position : {
      my: 'bottom left',
      at: 'bottom left',
      target: 'mouse',
      adjust: { x: -7, y: -7 }
    },
    style : { classes: 'qtip-youtube' },
  }) ; 
  
  $('.qTip-Island-Area-Number-Of-Fixed-Tariff').qtip({ 
    hide:{
      delay:250,
      fixed:true
    },
    content: {
        text: '<div class="qTip-content"><table class="table table-customize"><thead><tr><th>Tariff Code</th></tr></thead><tbody><tr><td><a href="#" class="link">HNLO12345678</a></td></tr> <tr><td><a href="#" class="link">HNLO12345678</a></td></tr> <tr><td><a href="#" class="link">HNLO12345678</a></td></tr> <tr><td><a href="#" class="link">HNLO12345678</a></td></tr> <tr><td><a href="#" class="link">HNLO12345678</a></td></tr> <tr><td><a href="#" class="link">HNLO12345678</a></td></tr> <tr><td><a href="#" class="link">HNLO12345678</a></td></tr>  </tbody></table></div>'
    },
    position : {
        my: 'top right',
        at: 'top right',
        target: 'mouse',
        adjust: { x: -10, y: -10 }
      },
      style : { classes: 'qtip-bootstrap' },
  });
  
  /* TAB ICON */
  
  /* Show Tooltip for Text */
  $('.qTip-Icon-Description').qtip({ 
    content: {
        text: '<div class="qtip-long-text">XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX</div>'
    },
    position : {
      my: 'bottom left',
      at: 'bottom left',
      target: 'mouse',
      adjust: { x: -7, y: -7 }
    },
    style : { classes: 'qtip-youtube' },
  }) ; 
  
});<!-- end Function -->