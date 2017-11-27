// JavaScript Document

$(function() {

  
  $('.qTip-Pax-Type').qtip({ 
      content: {
          text: '<div class="qTip-content"><label class="mb05">Campaign Rate Season From: XXXX To : XXXX</label><div class="table table-responsive mb0"><table class="table table-customize mb0"><thead><tr><th>Age</th><th>Selling Price</th><th>A/Net</th><th>N/Net</th></tr></thead><tbody><tr><td>0-1</td><td>0</td><td>0</td><td>0</td></tr><tr><td>2-12</td><td>$50</td><td>$40</td><td>$30</td></tr><tr><td>13-60</td><td>$90</td><td>$80</td><td>$60</td></tr><tr><td>61-</td><td>$90</td><td>$80</td><td>$60</td></tr></tbody></table></div></div>'
      },

      position : {
            my: 'bottom left',
            at: 'bottom left',
            target: 'mouse',
            adjust: { x: -10, y: -10 }
          },
          style : { classes: 'qtip-bootstrap' },
    });
    
    $('.qTip-Pax-Flat').qtip({ 
      content: {
          text: '<div class="qTip-content"><label class="mb05">Campaign Rate Season From: XXXX To : XXXX</label><div class="table table-responsive mb0"><table class="table table-customize mb0"><thead><tr><th>QTY</th><th>Age</th><th>Selling Price</th><th>A/Net</th><th>N/Net</th></tr></thead><tbody><tr><td>1</td><td>9999</td><td>$90</td><td>$80</td><td>$60</td></tr></tbody></table></div></div>'
      },

      position : {
            my: 'bottom left',
            at: 'bottom left',
            target: 'mouse',
            adjust: { x: -10, y: -10 }
          },
          style : { classes: 'qtip-bootstrap' },
    });
    
    /* Tooltip show label text */
    $('.qTip-Campaign-Title').qtip({ 
      content: {
          text: '<p>XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX</p>'
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
        my: 'bottom left',
        at: 'bottom left',
        target: 'mouse',
        adjust: { x: -7, y: -7 }
      },
      style : { classes: 'qtip-youtube' },
    });
    


	$("#btnAddItem").click(function(){
      
      var sHTML = '<tr class="text-center rowAdd"><td><input type="checkbox" id="" name="" class="" disabled></td>';
          sHTML += '<td class="text-center"><input type="radio" id="" name="" value="" checked></td>';
          sHTML += '<td class="text-left"><label class="checkbox-inline"><input type="checkbox" id="" name="" value="" checked> B2B</label>';
          sHTML += '<label class="checkbox-inline"><input type="checkbox" id="" name="" value=""> JGTS</label>';
          sHTML += '<label class="checkbox-inline"><input type="checkbox" id="" name="" value="" checked> HIOP</label>';
          sHTML += '<label class="checkbox-inline"><input type="checkbox" id="" name="" value="" checked> MyBus</label>';
          sHTML += '<label class="checkbox-inline"><input type="checkbox" id="" name="" value="" checked> LOOK</label>';
          sHTML += '<label class="checkbox-inline"><input type="checkbox" id="" name="" value=""> TOGO</label>';
          sHTML += '<label class="checkbox-inline"><input type="checkbox" id="" name="" value=""> LocalSales</label>';
          sHTML += '<label class="checkbox-inline"><input type="checkbox" id="" name="" value=""> LocalSales(TP)</label>';
          sHTML += '<label class="checkbox-inline"><input type="checkbox" id="" name="" value=""> ALL</label></td>';
          sHTML += '<td class="text-center"><button class="btn btn-danger btn-xs btnRemoveItem" type="button"><i class="fa fa-remove"></i></button></td></tr>';

	   $(sHTML).insertBefore('#tblContainerBox .groupActionRow');
	   
	   $('.rowAdd .checkbox-inline').css('margin-right', '4px');
	   
	   $(".btnRemoveItem").click(function(){
		  $(this).parent().parent().remove();  
		});

	});

	// Radio Tariff Tour Brand
    $("[name='RadioTariffTourBrand']").change(function () {
      $(".RadioTariffTourBrand").each(function() {
        if ($(this).prop('checked')) {
           $("#OPServiceCampaignRateSettingVersion").removeClass('hide');
        }
      })
    })
    // Radio Tariff Tour Brand
    $("[name='RadioVersion']").change(function () {
      $(".RadioVersion").each(function() {
        if ($(this).prop('checked')) {
           $("#SeasonFromTo").removeClass('hide');
        }
      })
    })
    // button submit
    $("#btnAddCampaignSetting").click(function() {
      $("#tableCampaignSetting").removeClass('hide');
    })

 });<!-- end Function -->