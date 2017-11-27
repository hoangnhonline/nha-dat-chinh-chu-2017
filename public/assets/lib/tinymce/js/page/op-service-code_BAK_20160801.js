// JavaScript Document

$(function() {
  
  
  if ($("#Tariff_TOGO_Upload_No").attr("checked")) {
      $("#Tariff_TOGO_Upload_Box").hide();
    }
    if ($("#Tariff_FZK_Upload_No").attr("checked")) {
      $("#Tariff_FZK_Upload_Box").hide();
    }
    
    $("[name='tariff-togo-upload']").change(function() {   
      if ($('#Tariff_TOGO_Upload_Yes').prop("checked")) {
        $("#Tariff_TOGO_Upload_Box").show();
      } else {
        $("#Tariff_TOGO_Upload_Box").hide();
      }
    });
    
    $("[name='tariff-fzk-upload']").change(function() {   
      if ($('#Tariff_FZK_Upload_Yes').prop("checked")) {
        $("#Tariff_FZK_Upload_Box").show();
      } else {
        $("#Tariff_FZK_Upload_Box").hide();
      }
    });
    
    /* Process Panel */
    $(".sidebar-option-position").hide();

    
    $("#Btn_Setting_Supplier_Code").click(function(){
      $("#frmSettingSupplierCode").show();
      $("#frmSettingShareInventory").hide();
      $("#frmSettingRelatedTariffCode").hide();
      $("#frmSelectCancellationPolicy").hide();
      $("#frmWebContentsCreateRequest").hide();
    });
    
    $("#Btn_Share_Inventory").click(function(){
      $("#frmSettingSupplierCode").hide();
      $("#frmSettingShareInventory").show();
      $("#frmSettingRelatedTariffCode").hide();
      $("#frmSelectCancellationPolicy").hide();
      $("#frmWebContentsCreateRequest").hide();
    });
    
    $("#Btn_Setting_Related_Tariff_Code").click(function(){
      $("#frmSettingSupplierCode").hide();
      $("#frmSettingShareInventory").hide();
      $("#frmSettingRelatedTariffCode").show();
      $("#frmSelectCancellationPolicy").hide();
      $("#frmWebContentsCreateRequest").hide();
    });
    
     $("#btnSelectCancellationPolicy").click(function(){
      $("#frmSettingSupplierCode").hide();
      $("#frmSettingShareInventory").hide();
      $("#frmSettingRelatedTariffCode").hide();
      $("#frmSelectCancellationPolicy").show();
      $("#frmWebContentsCreateRequest").hide();
    });
    
    $("#btnWebContentsCreateRequest").click(function(){
      $("#frmSettingSupplierCode").hide();
      $("#frmSettingShareInventory").hide();
      $("#frmSettingRelatedTariffCode").hide();
      $("#frmSelectCancellationPolicy").hide();
      $("#frmWebContentsCreateRequest").show();
    });
    

    /* Process checkbox Note Set */
    
    $("#inventoryNotSetCheck").change(function(){
      if ($(this).is(":checked")){
        $("#inventoryType").prop("disabled", true); 
        $("#inventoryCode").prop("disabled", true); 
        $("#Btn_Share_Inventory").prop("disabled", true); 
        $("#inventoryName").prop("disabled", true); 
      } else {
        $("#inventoryType").prop("disabled", false); 
        $("#inventoryCode").prop("disabled", false); 
        $("#Btn_Share_Inventory").prop("disabled", false); 
        $("#inventoryName").prop("disabled", false); 
      }
    });
    
    /* Process PickUp Location/Time ON */
    
    $("#PickupLocationTimeBox .box-collapse").hide();  
     
    $("#chkPickupLocationTime").on("change",function(){
      if ($(this).is(":checked")){
        $("#PickupLocationTimeBox .box-collapse").slideDown(500);
      } else {
        $("#PickupLocationTimeBox .box-collapse").slideUp(500);
      }
    });
    
    
    /* Show Tooltip */
    
    $('.qTip').qtip({ 
      content: {
          text: '<div class="qTip-content select-cancellation-policy-panel"><h3 class="text-bold fs15">登録済みキャンセルポリシー表示例</h3><ul><li><span>MMDDYYYY ~ MMDDYYYY</span><div class="box-style2 bdr-c5">XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX</div></li><li><span>MMDDYYYY ~ MMDDYYYY</span><div class="box-style2 bdr-c5">XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX</div></li><li><span>MMDDYYYY ~ MMDDYYYY</span><div class="box-style2 bdr-c5">XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX</div></li><li><span>MMDDYYYY ~ MMDDYYYY</span><div class="box-style2 bdr-c5">XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX</div></li><li><span>MMDDYYYY ~ MMDDYYYY</span><div class="box-style2 bdr-c5">XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX</div></li></ul></div>'
      },
      position : {
          my: 'top right',
          at: 'top right',
          target: 'mouse',
          adjust: { x: 5, y: 5 }
        },
        style : { classes: 'qtip-bootstrap' },
    });
    
    $('.qTip2').qtip({ 
      content: {
          text: '<div class="qTip-content select-cancellation-policy-panel"><h3 class="text-bold fs15">登録済みキャンセルポリシー表示例</h3><ul><li><span>MMDDYYYY ~ MMDDYYYY</span><div class="box-style2 bdr-c5">XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX</div></li><li><span>MMDDYYYY ~ MMDDYYYY</span><div class="box-style2 bdr-c5">XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX</div></li></ul></div>'
      },
      position : {
          my: 'top right',
          at: 'top right',
          target: 'mouse',
          adjust: { x: 5, y: 5 }
        },
        style : { classes: 'qtip-bootstrap' },
    });
    
    $('.qTip-Tariff-Name-Panel1').qtip({ 
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
    
    $('.qTip-Tariff-Name-Panel2').qtip({ 
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
    
    /* Select 2 */
    $(".select2-multiple").select2();   
    
  
});<!-- end Function -->

function changeCustomerCancellationPolicy() {
  var text = $("#selectCustomerCancellationPolicy option:selected").text();
  $("#getCustomerCancellationPolicy").text(text);
}
