// JavaScript Document

$(function() {
  
  $(".btnShowCopySeasonPanel").click(function(){
    $("#frmCopySeason").fadeIn(1000);
    $("#frmPaxBracketPtn").hide();  
  });
    
  $("#btnPaxBracketPattern").click(function(){
    $("#frmCopySeason").hide();
    $("#frmPaxBracketPtn").fadeIn(1000);  
  });
  
 $(".copy-from-other-tf.btn-show-panel").click(function(){
    $("#copy-ttb, #copy-version").hide();
    $("#copy-from-other-tariff-code").show();
  });
  $(".btnShowCopyVersion").click(function(){
    $("#copy-ttb, #copy-from-other-tariff-code").hide();
    $("#copy-version").show();
  });
  
  $(".btnShowCopyTTB").click(function(){
    $("#copy-version, #copy-from-other-tariff-code").hide();
    $("#copy-ttb").show();
  });

  
  $(document).on('click','#btnAddAgeBracket',function(e) {

    /* Act on the event */
    var html = '<tr>';
        html+= '<td class="text-center"><input type="checkbox" id="" name="" value="" disabled></td>';
        html+= '<td><input type="text" class="form-control text-number w120px" id="" name="" value="" placeholder=""></td>';
        html+= '<td><label>~</label></td>';          
        html+= '<td><input type="text" class="form-control text-number w120px" id="" name="" value="" placeholder=""></td>';            
        html+= '<td class="text-center"><input type="checkbox" id="" name="" value=""></td>';
        html+= '<td class="text-center"><button type="button" class="btn btn-danger btn-xs btnRemoveAgeBracket"><i class="fa fa-remove"></i></button></td>';
      html+= '</tr>';
      $(html).insertBefore('#tableAgeBracket .groupActionRow');

      // Call again datetimepicker, selectpicker
      $(".datetimepicker").datetimepicker({
          format: 'MM/DD/YYYY'
      });
      $('.selectpicker').selectpicker('render');

      // Remove row
      $(document).on('click','.btnRemoveAgeBracket',function(e) {            
          $(this).parent().parent().remove();
      });
  });
  
  $(document).on('click','#btnAddTariffTourBrand',function(e) {

    /* Act on the event */
    var html = '<tr>';
      html+= '<td class="text-center"><input type="checkbox" id="" name="" value="" disabled></td>';
      html+= '<td class="text-center"><input type="radio" name="name_radio" value="" id=""></td>';
      html+= '<td class="text-center"><button type="button" class="btn btn-primary btn-sm btn-show-panel btnShowCopySeasonPanel">Copy</button></td>';
      
      html+= '<td><select class="selectpicker show-tick" data-width="60px" data-live-search="true" data-container="body" id="" name=""><option value="" selected>GP</option><option value="">L1</option><option value="">NF</option><option value="">IC</option></select></td>';
      html+= '<td><select class="selectpicker show-tick" data-width="50px" data-live-search="true" data-container="body" id="" name=""><option value="">--</option><option value="">Y</option><option value="">N</option></select></td>';
      
      html+= '<td><input type="text" class="form-control" id="" name="" value="XXXXXXXXXXXX"></td>';            
      html+= '<td><select class="selectpicker show-tick" data-width="60px" data-live-search="true" data-container="body" id="" name=""><option value="">L1</option></select></td>';
      html+= '<td><select class="selectpicker show-tick" data-width="60px" data-live-search="true" data-container="body" id="" name=""><option value="">B2B</option><option value="">B2C</option><option value="">N/A</option></select></td>';
      html+= '<td class="text-center"><input type="checkbox" id="" name="" value=""></td>';
      html+= '<td class="text-center"><input type="checkbox" id="" name="" value=""></td>';
      html+= '<td class="text-center"><input type="checkbox" id="" name="" value=""></td>';
      
      html+= '<td class="text-center"><input type="checkbox" id="" name="" value=""></td>';
      html+= '<td class="text-center"><button type="button" class="btn btn-danger btn-xs btnRemoveTariffTourBrand"><i class="fa fa-remove"></i></button></td>';
    html+= '</tr>';
    $(html).insertBefore('#tableTariffTourBrand .groupActionRow');

    // Call again datetimepicker, selectpicker
    $(".datetimepicker").datetimepicker({
        format: 'MM/DD/YYYY'
    });
    $('.selectpicker').selectpicker('render');

    // Remove row
    $(document).on('click','.btnRemoveTariffTourBrand',function(e) {            
        $(this).parent().parent().remove();
    });
  });
  
  $(document).on('click','#btnAddVersion',function(e) {

    /* Act on the event */
    var html = '<tr>';
        html+= '<td class="text-center"><input type="checkbox" id="" name="" value="" disabled></td>';
        html+= '<td class="text-center"><input type="radio" name="name_radio" value="" id=""></td>';
        html+= '<td class="text-center"><button type="button" class="btn btn-primary btn-sm btn-show-panel btnShowCopySeasonPanel">Copy</button></td>';
        
        html+= '<td><select class="selectpicker show-tick" data-width="120px" data-live-search="true" data-container="body" id="" name=""><option value="" selected>XXXXXXXXXX</option></select></td>';
        html+= '<td><select class="selectpicker show-tick" data-width="70px" data-live-search="true" data-container="body" id="" name=""><option value="">XXXX</option></select></td>';
        
        html+= '<td><input type="text" name="" value="" class="form-control"></td>';            
        html+= '<td><input type="text" name="" value="1" class="form-control w60px text-number"></td>';
        html+= '<td><input type="text" name="" value="" class="form-control w150px"></td>';
        html+= '<td><select class="selectpicker show-tick" data-width="70px" data-live-search="true" data-container="body" id="" name=""><option value="">B2B</option><option value="">B2C</option><option value="">N/A</option></select></td>';
        html+= '<td class="text-center"><button type="button" class="btn btn-danger btn-xs btnRemoveVersion"><i class="fa fa-remove"></i></button></td>';
      html+= '</tr>';
      $(html).insertBefore('#tableVersion .groupActionRow');

      // Call again datetimepicker, selectpicker
      $(".datetimepicker").datetimepicker({
          format: 'MM/DD/YYYY'
      });
      $('.selectpicker').selectpicker('render');

      // Remove row
      $(document).on('click','.btnRemoveVersion',function(e) {            
          $(this).parent().parent().remove();
      });
  });

  /* Tooltip show label text */
  
  $('.qTip-TTB-Name').qtip({ 
    content: {
        text: '<div class="qtip-long-text">XXXXXXXXXXXXXXXXXXXXXXXXXXXXXX</div>'
    },
    position : {
      my: 'bottom left',
      at: 'bottom left',
      target: 'mouse',
      adjust: { x: -7, y: -7 }
    },
    style : { classes: 'qtip-youtube' },
  })
  
  $('.qTip-Version-Name').qtip({ 
    content: {
        text: '<div class="qtip-long-text">XXXXXXXXXXXXXXXXXXXXXXXXXXXXXX</div>'
    },
    position : {
      my: 'bottom left',
      at: 'bottom left',
      target: 'mouse',
      adjust: { x: -7, y: -7 }
    },
    style : { classes: 'qtip-youtube' },
  })
  
});<!-- end Function -->