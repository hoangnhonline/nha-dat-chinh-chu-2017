
$(function() {
  
  /* scrollTo */
  
	$('.page-top > a').bind('click',function(){
		$('body,html').animate({ scrollTop: 0 }, 500);
	});
  $(".page-top").hide();
  $(window).scroll(function(){
    if ($(this).scrollTop() > 30) {
      $(".page-top").show();
    } else {
      $(".page-top").hide();
    }
    
    /* Box right fixed */
    if ($(this).scrollTop() > 90) {
      $(".box-right-fixed").addClass('fixed');
      $(".box-right-fixed.fixed").css({
        position : 'fixed',
        width : '231px',
        margin: '-55px 0  0 0'
      });
    } else {
      $(".box-right-fixed").removeClass('fixed');
      $(".box-right-fixed").css({
        position : 'relative',
        width : '100%',
        margin: '0 0 0 0'
      });
    }
    
  });

  $("input, select, textarea").attr("autocomplete", "off");
  
  /* Accordion */
  $('.acco_box .acco_title').on("click",function(){
    $(this).toggleClass('active');
    $(this).next('.acco_dv').slideToggle(350);
  });  
  
  // Accordion has icon arrow
  $(document).on('click','.box-accordion > .accordion-header',function(event){
    $(this).toggleClass('active');
    $(this).toggleClass('opened');
    $(this).next('.box-collapse').slideToggle(200);
  });
  
  // Accordion has icon arrow
  $(document).on('click','.box-accordion-more > .accordion-header .header-title, .box-accordion-more > .accordion-header .btn-opened',function(event){
    $(this).parent().toggleClass('opened');
    $(this).parent().next('.box-collapse').slideToggle(200);
  });  
  
  /* Checkbox All */
  $("#checkAll").change(function(){
    $(".item_check").prop("checked", this.checked) ;
  }); 
  
  $("#checkAll2").change(function(){
    $(".item_check2").prop("checked", this.checked)  
  });
  
  $("#checkAll3").change(function(){
    $(".item_check3").prop("checked", this.checked)  
  });  
  
  /*
  $(".item_check, .item_check2, .item_check3").change(function(){
    if($(this).prop( "checked", false)) {
      $("#checkAll, #checkAll2, #checkAll3").attr('checked', false);
    }
  });  */
  
  var noteCheckBox = $('.item_check');
  var noteAllCheckBox = $('#checkAll');

  noteAllCheckBox.on('change', function(e){
      if(noteAllCheckBox.is(':checked')){
          noteCheckBox.prop('checked',true);
      } else {
          noteCheckBox.prop('checked',false);
      }
  })

  noteCheckBox.on('change', function(){
      checkSelectAll(noteCheckBox, noteAllCheckBox);
  });

  function checkSelectAll(checkBoxElement, mainCheckBoxElement){
      var state = true;
      if(typeof checkBoxElement == 'undefined' || typeof mainCheckBoxElement == 'undefined'){
          return false;
      }
      checkBoxElement.each(function(index,element){
          if($(element).is(':checked')){
              state = true;
          }else{
              state = false;
              return false;
          }
      });
      if(state == true){
          mainCheckBoxElement.prop('checked',true);
      } else {
          mainCheckBoxElement.prop('checked', false);
      }
  }

  // Button center Table when windows > 1280
  var groupActionRowTable = $(".groupActionRowTable").width();
  
  if ($(window).width() > 1280) {
    $(".groupActionRow2").css("width", groupActionRowTable);
  }
  if ($(window).width() < 1024 && $(window).width() < groupActionRowTable) {
    $(".groupActionRow2").css("width", $('.content-main').width() - 20);
  }

  /* start sidebar-option-position */
  //$(".sidebar-option-position .setting-position").hide();

  $(".sidebar-option-position .sidebar-icon .icon-setting").hide();
  
  $(".sidebar-option-position").append('<a href="javascript:void(0);" class="icon-close"><i class="fa fa-angle-double-right"></i></a>');
  
  // Button have class common
  $(document).on('click','.btn-show-panel',function(event){
    $(".sidebar-option-position").show().animate(
      { 
        right: "0",
      }, "200", "linear");
      
      // Hide icon
      $(".sidebar-option-position .sidebar-icon .icon-search").hide();
      $(".sidebar-option-position .sidebar-icon .icon-setting").hide();
    //$(".sidebar-option-position .sidebar-icon .icon-setting").show().addClass('active').css("top", 14);
    //$(".sidebar-option-position .sidebar-icon .icon-setting > i").removeClass('fa-cog').addClass('fa-times');
  });

  // When click icon close
  $(document).on('click','.sidebar-option-position .icon-close',function(event){
    $(this).parent().show().animate({
      right: "-450px",
    }, "200", "linear");
    $(".sidebar-option-position .sidebar-icon .icon-setting").removeClass('active');  
    $(".sidebar-option-position .sidebar-icon .icon-search").removeClass('active');
    $(".sidebar-option-position .sidebar-icon .icon-setting > i").removeClass('fa-times').addClass('fa-cog');      
    $(".sidebar-option-position .sidebar-icon .icon-search > i").removeClass('fa-times').addClass('fa-search');
    $(".sidebar-option-position .sidebar-icon .icon-setting").fadeOut(700);     
    
    // Show icon search
    $(".sidebar-option-position .sidebar-icon .icon-search").show();   
  });
  
  
  //var iconSearchHtml='<i class="fa fa-search"></i>';
  //$(".sidebar-option-position .sidebar-icon .icon-search").text(iconSearchHtml);
  
  $(".sidebar-option-position .sidebar-icon .icon-search > i").addClass("fa fa-search");
  $(".sidebar-option-position .sidebar-icon .icon-setting > i").addClass("fa fa-cog");
  
  $(document).on('click','.sidebar-option-position .sidebar-icon .icon-person',function(){ 
    exit();
  });

  $(document).on('click','.sidebar-option-position .sidebar-icon .icon',function(){
    
    if($(this).hasClass('active')){
      
       $(".sidebar-option-position .sidebar-icon .icon-setting").removeClass('active');  
       $(".sidebar-option-position .sidebar-icon .icon-search").removeClass('active');
       $(".sidebar-option-position").show().animate(
      { 
        right: "-450px",
      }, "200", "linear");

      if($(this).hasClass('icon-search')){ 
         $(".sidebar-option-position .sidebar-icon .icon-search > i").removeClass('fa-times').addClass('fa-search');   
         $(".sidebar-option-position .sidebar-icon .icon-setting").removeClass('active');   
      }
      if($(this).hasClass('icon-setting')){ 
        $(".sidebar-option-position .sidebar-icon .icon-setting > i").removeClass('fa-times').addClass('fa-cog'); 
        $(this).fadeOut(700);     
      }
      // Show icon search
      $(".sidebar-option-position .sidebar-icon .icon-search").show();   
       
    } else {
    
      $(".sidebar-option-position").show().animate(
      { 
        right: "0px",
      }, "200", "linear");
  
      if($(this).hasClass('icon-search')){
        
        // Hide icon search
        $(".sidebar-option-position .sidebar-icon .icon-search").hide();
        
        $(".sidebar-option-position .search-position").show(function(){
          $(this).parent().addClass('opened');
          $(".sidebar-option-position .sidebar-icon .icon-search").addClass('active');    
          //$(".sidebar-option-position .sidebar-icon .icon-search > i").removeClass('fa-search').addClass('fa-times');    
        });
        
        $(".sidebar-option-position .setting-position").hide();
        $(".sidebar-option-position .sidebar-icon .icon-setting").removeClass('active');    
      }
      
      if($(this).hasClass('icon-setting')){
        $(".sidebar-option-position .setting-position").show(function(){
          $(this).parent().addClass('opened');
          $(".sidebar-option-position .sidebar-icon .icon-setting").addClass('active');   
          //$(".sidebar-option-position .sidebar-icon .icon-setting > i").removeClass('fa-cog').addClass('fa-times');     
        });
        
        $(".sidebar-option-position .setting-more").hide();

        $(".sidebar-option-position .search-position").hide();
        $(".sidebar-option-position .sidebar-icon .icon-search").removeClass('active');
      
      } 

    }
  
  });
  
  
  /* start sidebar menu */
  $('body').addClass('sidebar-mini sidebar-collapse');  

  $('.main-header .logo > .logo-mini > a').click(function(){

    $('body').removeClass('sidebar-mini sidebar-collapse');
    $('.main-header .sidebar-toggle').css({
      display: "block", 
      transform: "rotate(180deg)"
      });
  });
  
  $('.content-wrapper, .navbar-static-top').mouseup(function(e) {
			$('body').addClass('sidebar-mini sidebar-collapse'); 
      $('.main-header .sidebar-toggle').css('display','none');
		 });
  
  $('.sidebar-toggle').on("click",function(){
    
    $('body').addClass('sidebar-mini sidebar-collapse'); 
    
    $('.main-header .sidebar-toggle').css('display','none');
    $('.fht-table-wrapper .fht-fixed-body').css('width','100%');

  });
  
  /*
   * Menu-mobi 
   */
  /*$('.sidebar-toggle-mobi').on("click",function(){
    $('body').toggleClass('sidebar-open');  
  });*/
    
    
  $('.sidebar-menu .treeview-menu').hide();
  $('.sidebar-menu .treeview-menu li .treeview-menu').hide();
  
  /* 
  $('.sidebar-menu .treeview a').on("click",function(){
    $(this).next('.treeview-menu').slideToggle(250);
    $(this).parent().toggleClass('active');
  }); */
  

  $(document).on('click','.sidebar-menu .treeview > a',function(){
      
      if($(this).hasClass('active')){
          $(this).removeClass('active');
          $(this).parent('.treeview').children('.treeview-menu').slideUp(200);
      }else{
        
        $(this).parent('.treeview').parent('.sidebar-menu').find('.treeview a').removeClass('active');
        $(this).addClass('active');

        $(this).parent('.treeview').parent('.sidebar-menu').find('.treeview-menu').slideUp(200);
        
        $(this).parent('.treeview').children('.treeview-menu').slideDown(200);
      }
      
    });
    

    $(document).on('click','.treeview-menu li a',function(){
      
      if($(this).hasClass('active')){
          $(this).removeClass('active');
          $(this).parent('li').find('.treeview-menu').slideUp(200);
      }else{

        $(this).parent('li').parent('.sidebar-menu').find('li a').removeClass('active');
        $(this).addClass('active');
        
        $(this).parent('li').parent('.sidebar-menu').find('.treeview-menu').slideUp(200);
        
        $(this).parent('li').find('.treeview-menu').slideDown(200);
      }
      
    });
  
  
  /* Tab content */
    
  $(document).on('click','.tab-common-wrap .btn-group-tab li .btn',function(){
    
    // remove all class name active for li
    $(this).parent().parent().children().removeClass("active");
    
    // add class name active for me
    $(this).parent().addClass("active");
    
    $(this).parent().parent().parent().children(".tab-content-box").hide();
    
    var content_show_box = $(this).attr("data-id"); 
    
    $(".tab-common-wrap #"+content_show_box).fadeIn(550);
  });
  
  $('.selectpicker').selectpicker('render');
  
  $(".bootstrap-select .dropdown-menu li > a").hover(function(){
    $(this).parents().find(".selected").removeClass("selected");
    $(this).parent().addClass("selected");
  });
  
  $(".bootstrap-select .dropdown-menu li > a").focus(function(){
    $(this).parents().find(".selected").removeClass("selected");
    $(this).parent().addClass("selected");
  });  
  
  /*
   * Sort website category
   */
  $('.sort-website-category > ul > li ul').hide();
  
  $('.sort-website-category > ul > li a').click(function(){
    $(this).parent().toggleClass('active');
    $(this).next().slideToggle();
  });

  
  $('.date-inputmask').inputmask({
    mask: '99/99/9999'
  });
  
  $('.time-inputmask').inputmask({
    mask: '99:99'
  });
  
  
  /* Bootstrap tooltip */ 
  $('[data-toggle="tooltip"]').tooltip(); 
  
  
  $('.bootstrap-datetimepicker-widget').css("z-index","9999");


  /* Plugin Jquery */
  $(".datetimepicker").datetimepicker({
      format: 'MM/DD/YYYY',
      useCurrent: false
  });
  
  /* Linked Pickers */
  $('.startDate').datetimepicker();
  $('.endDate').datetimepicker({
      useCurrent: false //Important! See issue #1075
  });
  $(".startDate").on("dp.change", function (e) {
      $('.endDate').data("DateTimePicker").minDate(e.date);
  });
  $(".endDate").on("dp.change", function (e) {
      $('.startDate').data("DateTimePicker").maxDate(e.date);
  });
  
  /* Linked Pickers */
  $('.startDate2').datetimepicker();
  $('.endDate2').datetimepicker({
      useCurrent: false //Important! See issue #1075
  });
  $(".startDate2").on("dp.change", function (e) {
      $('.endDate2').data("DateTimePicker").minDate(e.date);
  });
  $(".endDate2").on("dp.change", function (e) {
      $('.startDate2').data("DateTimePicker").maxDate(e.date);
  });
  
  /* Linked Pickers */
  $('.startDate3').datetimepicker();
  $('.endDate3').datetimepicker({
      useCurrent: false //Important! See issue #1075
  });
  $(".startDate3").on("dp.change", function (e) {
      $('.endDate3').data("DateTimePicker").minDate(e.date);
  });
  $(".endDate3").on("dp.change", function (e) {
      $('.startDate3').data("DateTimePicker").maxDate(e.date);
  });
  
  /* Switch checkbox */
  $(".switch-checkbox").bootstrapSwitch();

  $('.date').on('dp.show', function (e) {
    var datepicker = $('body').find('.bootstrap-datetimepicker-widget:last'),
        position = datepicker.offset(),
        parent = datepicker.parent(),
        parentPos = parent.offset(),
        width = datepicker.width(),
        parentWid = parent.width();

    // move datepicker to the exact same place it was but attached to body
    datepicker.appendTo('body');
    datepicker.css({
        position: 'absolute',
        top: position.top,
        bottom: 'auto',
        left: position.left,
        right: 'auto'
    });

    // if datepicker is wider than the thing it is attached to then move it so the centers line up
    if (parentPos.left + parentWid < position.left + width) {
        var newLeft = parentPos.left;
        newLeft += parentWid / 2;
        newLeft -= width / 4;
        datepicker.css({left: newLeft});
    }
  });
  
});

function fixWidthHelper(e, ui) {
    ui.children().each(function() {
      $(this).width($(this).width());
    });
    return ui;
}




