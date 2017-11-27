// JavaScript Document

$(function() {
  
  /* Mditor Tinymce */
  tinymce.init({
    selector: '.editorBasic',
    plugins: [
      "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
      "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
      "table contextmenu directionality emoticons template textcolor paste textcolor colorpicker textpattern"
    ],
    
    toolbar1: "undo redo | bold italic | styleselect | forecolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link unlink",
  
    menubar: 'false'
  });

  $("#Box_WYSIWYG, #Box_HTML").hide();
    
    $("[name='radioEditedIn']").change(function(){
      if($("#radioEditedInWYSIWYG").prop("checked")){
        $("#Box_WYSIWYG").fadeIn(300);
        $("#Box_HTML").fadeOut(300);
      }
      if($("#radioEditedInHTML").prop("checked")){
        $("#Box_WYSIWYG").fadeOut(300);
        $("#Box_HTML").fadeIn(300);
    }
  });

  /* Show Panel Add OP Services */  
  $(".btnShowAddOPServices").click(function(){
    $("#frmSelectImagePanel").hide();
    $("#frmAddOPServicesPanel").show();
    $("#frmChangeSelectedTemplatePanel").hide();
    $("#frmSelectImagePanel2").hide();
  });
  
  /* Show Panel Change Selected template */  
  $("#btnShowChangeSelectedTemplate").click(function(){
    $("#frmSelectImagePanel").hide();
    $("#frmAddOPServicesPanel").hide();
    $("#frmChangeSelectedTemplatePanel").show();
    $("#frmSelectImagePanel2").hide();
  });
  
  /* Show Panel Select Image */  
  $("#btnShowSelectImage").click(function(){
    $("#frmSelectImagePanel").show();
    $("#frmAddOPServicesPanel").hide();
    $("#frmChangeSelectedTemplatePanel").hide();
    $("#frmSelectImagePanel2").hide();
  });
  
  /* Show Panel Select Image Add Link */  
  $("#btnShowSelectImage2").click(function(){
    $("#frmSelectImagePanel").hide();
    $("#frmAddOPServicesPanel").hide();
    $("#frmChangeSelectedTemplatePanel").hide();
    $("#frmSelectImagePanel2").show();
  });
  
  $(".btnShowSelectImagePanel").click(function(){
    $("#frmSelectImagePanel").show();
    $("#frmAddOPServicesPanel").hide();
    $("#frmChangeSelectedTemplatePanel").hide();
    $("#frmSelectImagePanel2").hide();
  });

  /* Switch checkbox */
  
  $(".switch-checkbox").bootstrapSwitch();
  
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
    
    
    /* Show Panel Select Image */  
    $(".btnShowSelectImage").click(function(){
      $("#frmSelectImagePanel").show();
    });
    
    /* Orderby */
      
    $('.tableSort > tbody').sortable();
  
});<!-- end Function -->