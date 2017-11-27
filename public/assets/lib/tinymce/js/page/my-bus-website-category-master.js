// JavaScript Document

$(function() {

  
  $("#Panel_Edit_Category").hide();
  
  $(".Btn_Show_Edit_Category").click(function(){
    $("#Panel_Edit_Category").show();
    $("#Panel_Update_Csv").hide();
  });
  
  $("#Btn_Show_Upload_Csv").click(function(){
    $("#Panel_Update_Csv").show();
    $("#Panel_Edit_Category").hide();
  });
  
  $('.qTip-Tariff-Code').qtip({ 
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
  
});<!-- end Function -->