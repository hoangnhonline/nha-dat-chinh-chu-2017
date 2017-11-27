
$(function() {

  $('div.box-header #btn-memo').click(function(){
    $('.pull-right span#span2').toggleClass('hide');
    $('.pull-right span#span1').toggleClass('hide');
  });
  
  // Accordion has icon arrow
  $(document).on('click','#btn-memo',function(event){
    $(this).toggleClass('opened');
    $('.box-collapsee').slideToggle(200);
  });

  // Add form Flight No
  $("#lastedflight-hotel").click(function(){
    
    

    var html='<tr>';
        html+='<td class="text-center"><input type="checkbox" name="" value="" disabled></td>';
        html+='<td><input type="text" name="" value="" id="" class="form-control w60px" placeholder=""</td>';
        html+='<td><input type="text" name="" value="" id="" class="form-control w60px" placeholder=""></td>';
        //html+='<td><input type="text" name="" value="" id="" class="form-control" placeholder="MM/DD/YYYY" data-mask="99/99/9999"></td>';
        
        html+='<td><div class="input-group date datetimepicker"><input type="text" class="form-control date-inputmask datetimepickerAppend2" id="" name="" value="" data-mask="99/99/9999" placeholder="MM/DD/YYYY">';
        html+='<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span></div></td>';
        
        html+='<td><select class="selectpicker show-tick" data-width="100%" data-container="body" id="" name=""><option value="">O</option></select></td>';
        html+='<td><input type="text" name="" value="" id="" class="form-control w60px" placeholder=""></td>';
        html+='<td><input type="text" name="" value-"" id="" class="form-control w80px" placeholder="HH:MM" data-mask="99:99"></td>';
        html+='<td><input type="text" name="" value-"" id="" class="form-control w60px" placeholder=""></td>';
        html+='<td><input type="text" name="" value-"" id="" class="form-control w80px" placeholder="HH:MM" data-mask="99:99"></td>';
        html+='<td class="text-center"><a href="javascript:void(0)" class="btn btn-danger btn-xs btn-del-row-lastedflight"><i class="fa fa-times"></i></a></td>';
        html+='</tr>';

      //$('.lastedflight-hotel').append(html);
      
      $(html).insertBefore('.lastedflight-hotel .groupActionRow');
      
      $('.selectpicker').selectpicker('render');
      $(".datetimepicker").datetimepicker({
          format: 'MM/DD/YYYY'
      });

      $('.btn-del-row-lastedflight').click(function(){
        $(this).parent().parent().remove();
      });
    });
    // Delete an existing line
    $('.btn-del-row-lastedflight').click(function(){
      $(this).parent().parent().hide();
    });
    
    
    $(document).on('click', '#btnAddItemClientInfomation', function(){
      var sHTML='<tr>';
          sHTML+='<td class="text-center"><input type="checkbox" name="" value="" disabled></td>';
          sHTML+='<td><input type="text" name="" value="XXX" id="" class="form-control w60px" placeholder=""></td>';
          sHTML+='<td><input type="text" name="" value="" id="" class="form-control" placeholder=""></td>';
          sHTML+='<td><input type="text" name="" value="HNL" id="" class="form-control w60px" placeholder=""></td>';
          sHTML+='<td><input type="text" name="" value="XXXXXX" id="" class="form-control w100px" placeholder=""></td>';
          sHTML+='<td><input type="text" name="" value="" id="" class="form-control w80px" placeholder=""></td>';

          
          //sHTML+='<td><input type="text" name="" value="" id="" class="form-control w130px" placeholder="MM/DD/YYYY" data-mask="99/99/9999"></td>';
          //sHTML+='<td><input type="text" name="" value="" id="" class="form-control w130px" placeholder="MM/DD/YYYY" data-mask="99/99/9999"></td>';
          
          sHTML+='<td><div class="input-group date datetimepicker w130px"><input type="text" class="form-control date-inputmask datetimepickerAppend1" id="" name="" value="" data-mask="99/99/9999" placeholder="MM/DD/YYYY">';
          sHTML+='<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span></div></td>';
          
          sHTML+='<td><div class="input-group date datetimepicker w130px"><input type="text" class="form-control date-inputmask datetimepickerAppend1" id="" name="" value="" data-mask="99/99/9999" placeholder="MM/DD/YYYY">';
          sHTML+='<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span></div></td>';
          
          
          sHTML+='<td class="text-center"><a href="javascript:void(0)" class="btn btn-danger btn-xs btnRemoveItemClientInfomation"><i class="fa fa-times"></i></a></td>';
          sHTML+='</tr>';
          
      $("#tblClientInfomation > tbody").append(sHTML);
      $('.selectpicker').selectpicker('render');
      $(".datetimepicker").datetimepicker({
          format: 'MM/DD/YYYY'
      });

    });
    $(document).on('click', '.btnRemoveItemClientInfomation', function(){
        $(this).parent().parent('tr').remove();  
      });

    /* Tooltip show label text */
    $('.qTip-Title-Tour-Name').qtip({ 
      content: {
          text: '<div>XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX</div>'
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
    /* Tooltip show label text */
    $('.qTip-Hotel-Name').qtip({ 
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

  
});




