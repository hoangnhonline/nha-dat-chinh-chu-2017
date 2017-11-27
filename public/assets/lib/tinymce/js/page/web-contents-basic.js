// JavaScript Document

$(function() {
  
  /* Mditor Tinymce */
  // tinymce.init({
  //   selector: '.editorBasic',
  //   plugins: [
  //     "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
  //     "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
  //     "table contextmenu directionality emoticons template textcolor paste textcolor colorpicker textpattern"
  //   ],
    
  //   toolbar1: "undo redo | bold italic | styleselect | forecolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link unlink",
  
  //   menubar: 'false'
  // });

  tinymce.init({
  selector: '.editorBasic',
  height: 300,
  theme: 'modern',
  plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
  ],
  toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
 });
  
  /* Show Panel Select Area */
  
  $("#btnAddSelectArea").click(function(){
    $("#frmServicesForCustomersWithDisabilities").hide();
    $("#frmServicesForCustomersWithDisabilities-H").hide();
    $("#frmServicesForCustomersWithDisabilities-M").hide();
    // $("#frmServicesForCustomersWithDisabilities-tabEng").hide();
    $("#frmWebContentsDetailPanel").hide();  
    
    $("#frmSelectArea").fadeIn(1000);   
    $("#frmSelectCategoryMyBus").hide(); 
    $("#frmSelectCategoryHIOP").hide(); 
    
    $("#frmServicesForCustomersPanel").hide();
    $("#frmTouristSpotPanel").hide();

    $("#frmSelectTariffCode").hide();
    $("#frmUploadMovies-M").hide();
    $("#frmUploadMovies-H").hide();
    $("#frmUploadMovies-ENG").hide();

    $("#frmSelectImagePanel").hide();
    $("#frmSelectIconPanel").hide();
    $("#frmSelectQAPanel").hide();
  });
  
  $("#btnAddSelectArea2").click(function(){
    $("#frmServicesForCustomersWithDisabilities").hide();
    $("#frmServicesForCustomersWithDisabilities-H").hide();
    $("#frmServicesForCustomersWithDisabilities-M").hide();
    // $("#frmServicesForCustomersWithDisabilities-tabEng").hide();
    $("#frmWebContentsDetailPanel").hide();  
    
    $("#frmSelectArea").fadeIn(1000);   
    $("#frmSelectCategoryMyBus").hide(); 
    $("#frmSelectCategoryHIOP").hide(); 
    
    $("#frmServicesForCustomersPanel").hide();
    $("#frmTouristSpotPanel").hide();

    $("#frmSelectTariffCode").hide();
    $("#frmUploadMovies-M").hide();
    $("#frmUploadMovies-H").hide();
    $("#frmUploadMovies-ENG").hide();

    $("#frmSelectImagePanel").hide();
    $("#frmSelectIconPanel").hide();
    $("#frmSelectQAPanel").hide();
  });
  /* Show Panel Select Category My Bus */
  
  $("#btnAddSelectCategoryMyBus").click(function(){
    $("#frmServicesForCustomersWithDisabilities").hide();
    $("#frmServicesForCustomersWithDisabilities-H").hide();
    $("#frmServicesForCustomersWithDisabilities-M").hide();
    // $("#frmServicesForCustomersWithDisabilities-tabEng").hide();
    $("#frmWebContentsDetailPanel").hide();  
    
    $("#frmSelectArea").hide();   
    $("#frmSelectCategoryMyBus").fadeIn(800); 
    $("#frmSelectCategoryHIOP").hide(); 
    
    $("#frmServicesForCustomersPanel").hide();
    $("#frmTouristSpotPanel").hide();

    $("#frmSelectTariffCode").hide();
    $("#frmUploadMovies-M").hide();
    $("#frmUploadMovies-H").hide();
    $("#frmUploadMovies-ENG").hide();

    $("#frmSelectImagePanel").hide();
    $("#frmSelectIconPanel").hide();
    $("#frmSelectQAPanel").hide();
  });
  
  $("#btnAddSelectCategoryMyBus2").click(function(){
    $("#frmServicesForCustomersWithDisabilities").hide();
    $("#frmServicesForCustomersWithDisabilities-H").hide();
    $("#frmServicesForCustomersWithDisabilities-M").hide();
    // $("#frmServicesForCustomersWithDisabilities-tabEng").hide();
    $("#frmUploadJPG").hide();
    $("#frmWebContentsDetailPanel").hide();  
    
    $("#frmSelectArea").hide();   
    $("#frmSelectCategoryMyBus").fadeIn(800); 
    $("#frmSelectCategoryHIOP").hide(); 
    
    $("#frmServicesForCustomersPanel").hide();
    $("#frmTouristSpotPanel").hide();

    $("#frmSelectTariffCode").hide();
    $("#frmUploadMovies-M").hide();
    $("#frmUploadMovies-H").hide();
    $("#frmUploadMovies-ENG").hide();

    $("#frmSelectImagePanel").hide();
  });
  
  /* Show Panel Select Category HIOP */
    
  $("#btnAddSelectCategoryHIOP").click(function(){
    $("#frmServicesForCustomersWithDisabilities").hide();
    $("#frmServicesForCustomersWithDisabilities-H").hide();
    $("#frmServicesForCustomersWithDisabilities-M").hide();
    // $("#frmServicesForCustomersWithDisabilities-tabEng").hide();
    $("#frmWebContentsDetailPanel").hide();  
    
    $("#frmSelectArea").hide();   
    $("#frmSelectCategoryMyBus").hide(); 
    $("#frmSelectCategoryHIOP").fadeIn(800); 
    
    $("#frmServicesForCustomersPanel").hide();
    $("#frmTouristSpotPanel").hide();

    $("#frmSelectTariffCode").hide();
    $("#frmUploadMovies-M").hide();
    $("#frmUploadMovies-H").hide();
    $("#frmUploadMovies-ENG").hide();

    $("#frmSelectImagePanel").hide();
    $("#frmSelectIconPanel").hide();
    $("#frmSelectQAPanel").hide();
  });
  
  $("#btnAddSelectCategoryHIOP2").click(function(){
    $("#frmServicesForCustomersWithDisabilities").hide();
    $("#frmServicesForCustomersWithDisabilities-H").hide();
    $("#frmServicesForCustomersWithDisabilities-M").hide();
    // $("#frmServicesForCustomersWithDisabilities-tabEng").hide();
    $("#frmUploadJPG").hide();
    $("#frmWebContentsDetailPanel").hide();  
    
    $("#frmSelectArea").hide();   
    $("#frmSelectCategoryMyBus").hide(); 
    $("#frmSelectCategoryHIOP").fadeIn(800); 
    
    $("#frmServicesForCustomersPanel").hide();
    $("#frmTouristSpotPanel").hide();

    $("#frmSelectTariffCode").hide();
    $("#frmUploadMovies-M").hide();
    $("#frmUploadMovies-H").hide();
    $("#frmUploadMovies-ENG").hide();

    $("#frmSelectImagePanel").hide(); 
  });

    /* Show Panel Select Icon */
  
  $("#btnSelectIconPanel").click(function(){
    $("#frmServicesForCustomersWithDisabilities").hide();
    $("#frmServicesForCustomersWithDisabilities-H").hide();
    $("#frmServicesForCustomersWithDisabilities-M").hide();
    // $("#frmServicesForCustomersWithDisabilities-tabEng").hide();
    $("#frmWebContentsDetailPanel").hide();
    
    $("#frmSelectArea").hide();   
    $("#frmSelectCategoryMyBus").hide(); 
    $("#frmSelectCategoryHIOP").hide(); 
     
    $("#frmServicesForCustomersPanel").hide();   
    $("#frmTouristSpotPanel").hide();

    $("#frmSelectTariffCode").hide();
    $("#frmUploadMovies-M").hide();
    $("#frmUploadMovies-H").hide();
    $("#frmUploadMovies-ENG").hide();

    $("#frmSelectImagePanel").hide();
    $("#frmSelectIconPanel").fadeIn(800);
    $("#frmSelectQAPanel").hide();
  });
  
  $("#btnSelectIconPanel2").click(function(){
    $("#frmServicesForCustomersWithDisabilities").hide();
    $("#frmServicesForCustomersWithDisabilities-H").hide();
    $("#frmServicesForCustomersWithDisabilities-M").hide();
    // $("#frmServicesForCustomersWithDisabilities-tabEng").hide();
    $("#frmUploadJPG").hide();
    $("#frmWebContentsDetailPanel").hide();
    
    $("#frmSelectArea").hide();   
    $("#frmSelectCategoryMyBus").hide(); 
    $("#frmSelectCategoryHIOP").hide(); 
     
    $("#frmServicesForCustomersPanel").hide();   
    $("#frmTouristSpotPanel").fadeIn(800);

    $("#frmSelectTariffCode").hide();
    $("#frmUploadMovies-M").hide();
    $("#frmUploadMovies-H").hide();
    $("#frmUploadMovies-ENG").hide();

    $("#frmSelectImagePanel").hide(); 
  });
  
  /* Show Panel Add Tourist Spot */
  
  $("#btnAddTouristSpot").click(function(){
    $("#frmServicesForCustomersWithDisabilities").hide();
    $("#frmServicesForCustomersWithDisabilities-H").hide();
    $("#frmServicesForCustomersWithDisabilities-M").hide();
    // $("#frmServicesForCustomersWithDisabilities-tabEng").hide();
    $("#frmWebContentsDetailPanel").hide();
    
    $("#frmSelectArea").hide();   
    $("#frmSelectCategoryMyBus").hide(); 
    $("#frmSelectCategoryHIOP").hide(); 
     
    $("#frmServicesForCustomersPanel").hide();   
    $("#frmTouristSpotPanel").fadeIn(800);

    $("#frmSelectTariffCode").hide();
    $("#frmUploadMovies-M").hide();
    $("#frmUploadMovies-H").hide();
    $("#frmUploadMovies-ENG").hide();

    $("#frmSelectImagePanel").hide();
    $("#frmSelectIconPanel").hide();
    $("#frmSelectQAPanel").hide();
  });
  
  $("#btnAddTouristSpot2").click(function(){
    $("#frmServicesForCustomersWithDisabilities").hide();
    $("#frmServicesForCustomersWithDisabilities-H").hide();
    $("#frmServicesForCustomersWithDisabilities-M").hide();
    // $("#frmServicesForCustomersWithDisabilities-tabEng").hide();
    $("#frmUploadJPG").hide();
    $("#frmWebContentsDetailPanel").hide();
    
    $("#frmSelectArea").hide();   
    $("#frmSelectCategoryMyBus").hide(); 
    $("#frmSelectCategoryHIOP").hide(); 
     
    $("#frmServicesForCustomersPanel").hide();   
    $("#frmTouristSpotPanel").fadeIn(800);

    $("#frmSelectTariffCode").hide();
    $("#frmUploadMovies-M").hide();
    $("#frmUploadMovies-H").hide();
    $("#frmUploadMovies-ENG").hide();

    $("#frmSelectImagePanel").hide(); 
  });
  
  /* Show Panel Services For Customers */

  $("#btnShowServicesForCustomers").click(function(){
    $("#frmServicesForCustomersWithDisabilities").hide();
    $("#frmServicesForCustomersWithDisabilities-H").hide();
    $("#frmServicesForCustomersWithDisabilities-M").hide();
    // $("#frmServicesForCustomersWithDisabilities-tabEng").hide();
    $("#frmWebContentsDetailPanel").hide();
    
    $("#frmSelectArea").hide();   
    $("#frmSelectCategoryMyBus").hide(); 
    $("#frmSelectCategoryHIOP").hide(); 
      
    $("#frmServicesForCustomersPanel").fadeIn(800); 
    $("#frmTouristSpotPanel").hide();

    $("#frmSelectTariffCode").hide();
    $("#frmUploadMovies-M").hide();
    $("#frmUploadMovies-H").hide();
    $("#frmUploadMovies-ENG").hide();

    $("#frmSelectImagePanel").hide();
    $("#frmSelectIconPanel").hide();
    $("#frmSelectQAPanel").hide();
  });
  
  $("#btnShowServicesForCustomers2").click(function(){
    $("#frmServicesForCustomersWithDisabilities").hide();
    $("#frmServicesForCustomersWithDisabilities-H").hide();
    $("#frmServicesForCustomersWithDisabilities-M").hide();
    // $("#frmServicesForCustomersWithDisabilities-tabEng").hide();
    $("#frmUploadJPG").hide();
    $("#frmWebContentsDetailPanel").hide();
    
    $("#frmSelectArea").hide();   
    $("#frmSelectCategoryMyBus").hide(); 
    $("#frmSelectCategoryHIOP").hide(); 
      
    $("#frmServicesForCustomersPanel").fadeIn(800); 
    $("#frmTouristSpotPanel").hide();

    $("#frmSelectTariffCode").hide();
    $("#frmUploadMovies-M").hide();
    $("#frmUploadMovies-H").hide();
    $("#frmUploadMovies-ENG").hide();

    $("#frmSelectImagePanel").hide(); 
  });
  
  /* Show Panel Upload JPG */
  
  $(".btnShowUploadJPG").click(function(){
    $("#frmServicesForCustomersWithDisabilities").fadeIn(800);
    $("#frmServicesForCustomersWithDisabilities-H").hide();
    $("#frmServicesForCustomersWithDisabilities-M").hide();
    // $("#frmServicesForCustomersWithDisabilities-tabEng").hide();
    $("#frmWebContentsDetailPanel").hide();
    
    $("#frmSelectArea").hide();   
    $("#frmSelectCategoryMyBus").hide(); 
    $("#frmSelectCategoryHIOP").hide(); 
    
    $("#frmServicesForCustomersPanel").hide();   
    $("#frmTouristSpotPanel").hide();

    $("#frmSelectTariffCode").hide();
    $("#frmUploadMovies-M").hide();
    $("#frmUploadMovies-H").hide();
    $("#frmUploadMovies-ENG").hide();

    $("#frmSelectImagePanel").hide();
    $("#frmSelectIconPanel").hide();
    $("#frmSelectQAPanel").hide();
  });

  $(".btnShowUploadJPG-H").click(function(){
    $("#frmServicesForCustomersWithDisabilities").hide();
    $("#frmServicesForCustomersWithDisabilities-H").fadeIn(800);
    $("#frmServicesForCustomersWithDisabilities-M").hide();
    // $("#frmServicesForCustomersWithDisabilities-tabEng").hide();
    $("#frmWebContentsDetailPanel").hide();
    
    $("#frmSelectArea").hide();   
    $("#frmSelectCategoryMyBus").hide(); 
    $("#frmSelectCategoryHIOP").hide(); 
    
    $("#frmServicesForCustomersPanel").hide();   
    $("#frmTouristSpotPanel").hide();

    $("#frmSelectTariffCode").hide();
    $("#frmUploadMovies-M").hide();
    $("#frmUploadMovies-H").hide();
    $("#frmUploadMovies-ENG").hide();

    $("#frmSelectImagePanel").hide();
    $("#frmSelectIconPanel").hide();
    $("#frmSelectQAPanel").hide();
  });

  $(".btnShowUploadJPG-M").click(function(){
    $("#frmServicesForCustomersWithDisabilities").hide();
    $("#frmServicesForCustomersWithDisabilities-H").hide();
    $("#frmServicesForCustomersWithDisabilities-M").fadeIn(800);
    // $("#frmServicesForCustomersWithDisabilities-tabEng").hide();
    $("#frmWebContentsDetailPanel").hide();
    
    $("#frmSelectArea").hide();   
    $("#frmSelectCategoryMyBus").hide(); 
    $("#frmSelectCategoryHIOP").hide(); 
    
    $("#frmServicesForCustomersPanel").hide();   
    $("#frmTouristSpotPanel").hide();

    $("#frmSelectTariffCode").hide();
    $("#frmUploadMovies-M").hide();
    $("#frmUploadMovies-H").hide();
    $("#frmUploadMovies-ENG").hide();

    $("#frmSelectImagePanel").hide();
    $("#frmSelectIconPanel").hide();
    $("#frmSelectQAPanel").hide();
  });

  /* Show Panel Upload JPG Tab Eng */
  
  // $(".btnShowUploadJPG-Eng").click(function(){
  //   $("#frmServicesForCustomersWithDisabilities").hide();
    $("#frmServicesForCustomersWithDisabilities-tabEng").fadeIn(800);
  //   $("#frmWebContentsDetailPanel").hide();
    
  //   $("#frmSelectArea").hide();   
  //   $("#frmSelectCategoryMyBus").hide(); 
  //   $("#frmSelectCategoryHIOP").hide(); 
    
  //   $("#frmServicesForCustomersPanel").hide();   
  //   $("#frmTouristSpotPanel").hide();

  //   $("#frmSelectTariffCode").hide();
  //   $("#frmUploadMovies-M").hide();
  //   $("#frmUploadMovies-H").hide();
  //   $("#frmUploadMovies-ENG").hide();

  //   $("#frmSelectImagePanel").hide();
  //   $("#frmSelectIconPanel").hide();
  //   $("#frmSelectQAPanel").hide();
  // });
  
  /* Show Panel Web Contents Detail */
  
  $("#btnShowWebContentsDetail").click(function(){
    $("#frmServicesForCustomersWithDisabilities").hide();
    $("#frmServicesForCustomersWithDisabilities-H").hide();
    $("#frmServicesForCustomersWithDisabilities-M").hide();
    // $("#frmServicesForCustomersWithDisabilities-tabEng").hide();
    $("#frmWebContentsDetailPanel").fadeIn(800);
    
    $("#frmSelectArea").hide();   
    $("#frmSelectCategoryMyBus").hide(); 
    $("#frmSelectCategoryHIOP").hide();  
    
    $("#frmServicesForCustomersPanel").hide();   
    $("#frmTouristSpotPanel").hide();

    $("#frmSelectTariffCode").hide();
    $("#frmUploadMovies-M").hide();
    $("#frmUploadMovies-H").hide();
    $("#frmUploadMovies-ENG").hide();

    $("#frmSelectImagePanel").hide();
    $("#frmSelectIconPanel").hide();
    $("#frmSelectQAPanel").hide();
  });
  
  $("#btnShowWebContentsDetail2").click(function(){
    $("#frmUploadJPG").hide();
    $("#frmWebContentsDetailPanel").fadeIn(800);

    $("#frmServicesForCustomersWithDisabilities").hide();
    $("#frmServicesForCustomersWithDisabilities-H").hide();
    $("#frmServicesForCustomersWithDisabilities-M").hide();
    // $("#frmServicesForCustomersWithDisabilities-tabEng").hide();
    
    $("#frmSelectArea").hide();   
    $("#frmSelectCategoryMyBus").hide(); 
    $("#frmSelectCategoryHIOP").hide();  
    
    $("#frmServicesForCustomersPanel").hide();   
    $("#frmTouristSpotPanel").hide();

    $("#frmSelectTariffCode").hide();
    $("#frmUploadMovies-M").hide();
    $("#frmUploadMovies-H").hide();
    $("#frmUploadMovies-ENG").hide();

    $("#frmSelectImagePanel").hide(); 
  });

  /* Show Panel Copy Contents Basic */

  $("#btnCopyContentsBasic").click(function(){
    $("#frmUploadJPG").hide();
    $("#frmWebContentsDetailPanel").hide();

    $("#frmServicesForCustomersWithDisabilities").hide();
    $("#frmServicesForCustomersWithDisabilities-H").hide();
    $("#frmServicesForCustomersWithDisabilities-M").hide();
    // $("#frmServicesForCustomersWithDisabilities-tabEng").hide();
    
    $("#frmSelectArea").hide();   
    $("#frmSelectCategoryMyBus").hide(); 
    $("#frmSelectCategoryHIOP").hide();  
    
    $("#frmServicesForCustomersPanel").hide();   
    $("#frmTouristSpotPanel").hide();

    $("#frmSelectTariffCode").fadeIn(800);
    $("#frmUploadMovies-M").hide();
    $("#frmUploadMovies-H").hide();
    $("#frmUploadMovies-ENG").hide();

    $("#frmSelectImagePanel").hide();
    $("#frmSelectIconPanel").hide();
    $("#frmSelectQAPanel").hide();
  });

  /* Show Panel Upload Movies */
  
  $(".btn-UploadMovies").click(function(){
    $("#frmUploadMovies-H").fadeIn(800);
    $("#frmWebContentsDetailPanel").hide();

    $("#frmServicesForCustomersWithDisabilities").hide();
    $("#frmServicesForCustomersWithDisabilities-H").hide();
    $("#frmServicesForCustomersWithDisabilities-M").hide();
    // $("#frmServicesForCustomersWithDisabilities-tabEng").hide();
    
    $("#frmSelectArea").hide();   
    $("#frmSelectCategoryMyBus").hide(); 
    $("#frmSelectCategoryHIOP").hide();  
    
    $("#frmServicesForCustomersPanel").hide();   
    $("#frmTouristSpotPanel").hide();

    $("#frmSelectTariffCode").hide();
    $("#frmUploadJPG").hide();
    $("#frmUploadMovies-M").hide();
    $("#frmUploadMovies-ENG").hide();

    $("#frmSelectImagePanel").hide();
    $("#frmSelectIconPanel").hide();
    $("#frmSelectQAPanel").hide();
  });

  $(".btn-UploadMovies2").click(function(){
    $("#frmUploadMovies-M").fadeIn(800);
    $("#frmWebContentsDetailPanel").hide();

    $("#frmServicesForCustomersWithDisabilities").hide();
    $("#frmServicesForCustomersWithDisabilities-H").hide();
    $("#frmServicesForCustomersWithDisabilities-M").hide();
    // $("#frmServicesForCustomersWithDisabilities-tabEng").hide();
    
    $("#frmSelectArea").hide();   
    $("#frmSelectCategoryMyBus").hide(); 
    $("#frmSelectCategoryHIOP").hide();
    
    $("#frmServicesForCustomersPanel").hide();   
    $("#frmTouristSpotPanel").hide();
    $("#frmUploadMovies-H").hide();
    $("#frmUploadMovies-ENG").hide();

    $("#frmSelectTariffCode").hide();
    $("#frmUploadJPG").hide();

    $("#frmSelectImagePanel").hide();
    $("#frmSelectIconPanel").hide();
    $("#frmSelectQAPanel").hide(); 
  });

  // $(".btn-UploadMovies-ENG").click(function(){
  //   $("#frmUploadMovies-ENG").fadeIn(800);
  //   $("#frmWebContentsDetailPanel").hide();

  //   $("#frmServicesForCustomersWithDisabilities").hide();
    $("#frmServicesForCustomersWithDisabilities-tabEng").hide();
    
  //   $("#frmSelectArea").hide();   
  //   $("#frmSelectCategoryMyBus").hide(); 
  //   $("#frmSelectCategoryHIOP").hide();
    
  //   $("#frmServicesForCustomersPanel").hide();   
  //   $("#frmTouristSpotPanel").hide();
  //   $("#frmUploadMovies-H").hide();
  //   $("#frmUploadMovies-M").hide();

  //   $("#frmSelectTariffCode").hide();
  //   $("#frmUploadJPG").hide();

  //   $("#frmSelectImagePanel").hide();
  //   $("#frmSelectIconPanel").hide();
  //   $("#frmSelectQAPanel").hide(); 
  // });

  /* Show Panel Select Image */

  $(".btn-SelectImage").click(function(){
    $("#frmServicesForCustomersWithDisabilities").hide();
    $("#frmServicesForCustomersWithDisabilities-H").hide();
    $("#frmServicesForCustomersWithDisabilities-M").hide();
    // $("#frmServicesForCustomersWithDisabilities-tabEng").hide();
    $("#frmWebContentsDetailPanel").hide();  
    
    $("#frmSelectArea").hide();   
    $("#frmSelectCategoryMyBus").hide(); 
    $("#frmSelectCategoryHIOP").hide(); 
    
    $("#frmServicesForCustomersPanel").hide();
    $("#frmTouristSpotPanel").hide();
    $("#frmUploadMovies-H").hide();
    $("#frmUploadMovies-M").hide();

    $("#frmSelectTariffCode").hide();
    $("#frmUploadMovies").hide();

    $("#frmSelectImagePanel").fadeIn(1000);
    $("#frmSelectIconPanel").hide();
    $("#frmSelectQAPanel").hide();
  });

  $(".btn-SelectImage2").click(function(){
    $("#frmServicesForCustomersWithDisabilities").hide();
    $("#frmServicesForCustomersWithDisabilities-H").hide();
    $("#frmServicesForCustomersWithDisabilities-M").hide();
    // $("#frmServicesForCustomersWithDisabilities-tabEng").hide();
    $("#frmWebContentsDetailPanel").hide();  
    
    $("#frmSelectArea").hide();   
    $("#frmSelectCategoryMyBus").hide(); 
    $("#frmSelectCategoryHIOP").hide(); 
    
    $("#frmServicesForCustomersPanel").hide();
    $("#frmTouristSpotPanel").hide();
    $("#frmUploadMovies-H").hide();
    $("#frmUploadMovies-M").hide();

    $("#frmSelectTariffCode").hide();
    $("#frmUploadMovies").hide();

    $("#frmSelectImagePanel").fadeIn(1000); 
  });

    /* Show Panel Q&A */

  $("#btnAddSelectQA").click(function(){
    $("#frmServicesForCustomersWithDisabilities").hide();
    $("#frmServicesForCustomersWithDisabilities-H").hide();
    $("#frmServicesForCustomersWithDisabilities-M").hide();
    // $("#frmServicesForCustomersWithDisabilities-tabEng").hide();
    $("#frmWebContentsDetailPanel").hide();  
    
    $("#frmSelectArea").hide();   
    $("#frmSelectCategoryMyBus").hide(); 
    $("#frmSelectCategoryHIOP").hide(); 
    
    $("#frmServicesForCustomersPanel").hide();
    $("#frmTouristSpotPanel").hide();
    $("#frmUploadMovies-H").hide();
    $("#frmUploadMovies-M").hide();

    $("#frmSelectTariffCode").hide();
    $("#frmUploadMovies").hide();

    $("#frmSelectImagePanel").hide(0);
    $("#frmSelectIconPanel").hide();
    $("#frmSelectQAPanel").fadeIn(1000);
  });

  $("#btnAddSelectQA2").click(function(){
    $("#frmServicesForCustomersWithDisabilities").hide();
    $("#frmServicesForCustomersWithDisabilities-H").hide();
    $("#frmServicesForCustomersWithDisabilities-M").hide();
    // $("#frmServicesForCustomersWithDisabilities-tabEng").hide();
    $("#frmWebContentsDetailPanel").hide();  
    
    $("#frmSelectArea").hide();   
    $("#frmSelectCategoryMyBus").hide(); 
    $("#frmSelectCategoryHIOP").hide(); 
    
    $("#frmServicesForCustomersPanel").hide();
    $("#frmTouristSpotPanel").hide();
    $("#frmUploadMovies-H").hide();
    $("#frmUploadMovies-M").hide();

    $("#frmSelectTariffCode").hide();
    $("#frmUploadMovies").hide();

    $("#frmSelectImagePanel").hide(0);
    $("#frmSelectIconPanel").hide();
    $("#frmSelectQAPanel").fadeIn(1000); 
  });
  
  /* Tab Category, Icon */
  $(".tag-list .item .icon-del").on("click", function(){
    $(this).parent().remove();  
  });
 
  
  /* get and set hight for Inquiry box */
  var heightInquiry = $(".inquiry-box:first-child").height();

  $(".inquiry-box:last-child").css("height", heightInquiry);  

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
  
  
  $("[name='radioContentType']").change(function(){
    if ($('#radioContentTypeCoupon').prop("checked")) {
      $('.disabledInput').attr('disabled', true);
      $('.hideCoupon').addClass('hide');
    } else {
      $('.disabledInput').attr('disabled', false);  
      $('.hideCoupon').removeClass('hide');
    }
  });

  
});<!-- end Function -->