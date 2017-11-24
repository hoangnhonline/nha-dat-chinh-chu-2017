/* jQuery Form Plugin */
(function(b){"function"===typeof define&&define.amd?define(["jquery"],b):b("undefined"!=typeof jQuery?jQuery:window.Zepto)})(function(b){function y(a){var h=a.data;a.isDefaultPrevented()||(a.preventDefault(),b(a.target).ajaxSubmit(h))}function u(a){var h=a.target,d=b(h);if(!d.is("[type=submit],[type=image]")){h=d.closest("[type=submit]");if(0===h.length)return;h=h[0]}var c=this;c.clk=h;"image"==h.type&&(void 0!==a.offsetX?(c.clk_x=a.offsetX,c.clk_y=a.offsetY):"function"==typeof b.fn.offset?(d=d.offset(), c.clk_x=a.pageX-d.left,c.clk_y=a.pageY-d.top):(c.clk_x=a.pageX-h.offsetLeft,c.clk_y=a.pageY-h.offsetTop));setTimeout(function(){c.clk=c.clk_x=c.clk_y=null},100)}function r(){if(b.fn.ajaxSubmit.debug){var a="[jquery.form] "+Array.prototype.join.call(arguments,"");window.console&&window.console.log?window.console.log(a):window.opera&&window.opera.postError&&window.opera.postError(a)}}var z,B;z=void 0!==b("<input type='file'/>").get(0).files;B=void 0!==window.FormData;var D=!!b.fn.prop;b.fn.attr2=function(){if(!D)return this.attr.apply(this, arguments);var a=this.prop.apply(this,arguments);return a&&a.jquery||"string"===typeof a?a:this.attr.apply(this,arguments)};b.fn.ajaxSubmit=function(a){function h(c){c=b.param(c,a.traditional).split("&");var f=c.length,h=[],g,d;for(g=0;g<f;g++)c[g]=c[g].replace(/\+/g," "),d=c[g].split("="),h.push([decodeURIComponent(d[0]),decodeURIComponent(d[1])]);return h}function d(c){for(var f=new FormData,d=0;d<c.length;d++)f.append(c[d].name,c[d].value);if(a.extraData)for(c=h(a.extraData),d=0;d<c.length;d++)c[d]&& f.append(c[d][0],c[d][1]);a.data=null;d=b.extend(!0,{},b.ajaxSettings,a,{contentType:!1,processData:!1,cache:!1,type:g||"POST"});a.uploadProgress&&(d.xhr=function(){var c=b.ajaxSettings.xhr();c.upload&&c.upload.addEventListener("progress",function(b){var e=0,c=b.loaded||b.position,d=b.total;b.lengthComputable&&(e=Math.ceil(c/d*100));a.uploadProgress(b,c,d,e)},!1);return c});d.data=null;var l=d.beforeSend;d.beforeSend=function(b,c){c.data=a.formData?a.formData:f;l&&l.call(this,b,c)};return b.ajax(d)} function c(c){function d(a){var b=null;try{a.contentWindow&&(b=a.contentWindow.document)}catch(c){r("cannot get iframe.contentWindow document: "+c)}if(b)return b;try{b=a.contentDocument?a.contentDocument:a.document}catch(e){r("cannot get iframe.contentDocument: "+e),b=a.document}return b}function f(){function a(){try{var b=d(v).readyState;r("state = "+b);b&&"uninitialized"==b.toLowerCase()&&setTimeout(a,50)}catch(c){r("Server abort: ",c," (",c.name,")"),h(z),u&&clearTimeout(u),u=void 0}}var c=n.attr2("target"), k=n.attr2("action"),m=n.attr("enctype")||n.attr("encoding")||"multipart/form-data";l.setAttribute("target",s);g&&!/post/i.test(g)||l.setAttribute("method","POST");k!=e.url&&l.setAttribute("action",e.url);e.skipEncodingOverride||g&&!/post/i.test(g)||n.attr({encoding:"multipart/form-data",enctype:"multipart/form-data"});e.timeout&&(u=setTimeout(function(){y=!0;h(A)},e.timeout));var p=[];try{if(e.extraData)for(var q in e.extraData)e.extraData.hasOwnProperty(q)&&(b.isPlainObject(e.extraData[q])&&e.extraData[q].hasOwnProperty("name")&& e.extraData[q].hasOwnProperty("value")?p.push(b('<input type="hidden" name="'+e.extraData[q].name+'">').val(e.extraData[q].value).appendTo(l)[0]):p.push(b('<input type="hidden" name="'+q+'">').val(e.extraData[q]).appendTo(l)[0]));e.iframeTarget||w.appendTo("body");v.attachEvent?v.attachEvent("onload",h):v.addEventListener("load",h,!1);setTimeout(a,15);try{l.submit()}catch(t){document.createElement("form").submit.apply(l)}}finally{l.setAttribute("action",k),l.setAttribute("enctype",m),c?l.setAttribute("target", c):n.removeAttr("target"),b(p).remove()}}function h(a){if(!k.aborted&&!F)if(q=d(v),q||(r("cannot access response document"),a=z),a===A&&k)k.abort("timeout"),x.reject(k,"timeout");else if(a==z&&k)k.abort("server abort"),x.reject(k,"error","server abort");else if(q&&q.location.href!=e.iframeSrc||y){v.detachEvent?v.detachEvent("onload",h):v.removeEventListener("load",h,!1);a="success";var c;try{if(y)throw"timeout";var f="xml"==e.dataType||q.XMLDocument||b.isXMLDoc(q);r("isXml="+f);if(!f&&window.opera&& (null===q.body||!q.body.innerHTML)&&--C){r("requeing onLoad callback, DOM not available");setTimeout(h,250);return}var g=q.body?q.body:q.documentElement;k.responseText=g?g.innerHTML:null;k.responseXML=q.XMLDocument?q.XMLDocument:q;f&&(e.dataType="xml");k.getResponseHeader=function(a){return{"content-type":e.dataType}[a.toLowerCase()]};g&&(k.status=Number(g.getAttribute("status"))||k.status,k.statusText=g.getAttribute("statusText")||k.statusText);var l=(e.dataType||"").toLowerCase(),m=/(json|script|text)/.test(l); if(m||e.textarea){var n=q.getElementsByTagName("textarea")[0];if(n)k.responseText=n.value,k.status=Number(n.getAttribute("status"))||k.status,k.statusText=n.getAttribute("statusText")||k.statusText;else if(m){var p=q.getElementsByTagName("pre")[0],s=q.getElementsByTagName("body")[0];p?k.responseText=p.textContent?p.textContent:p.innerText:s&&(k.responseText=s.textContent?s.textContent:s.innerText)}}else"xml"==l&&!k.responseXML&&k.responseText&&(k.responseXML=H(k.responseText));try{B=I(k,l,e)}catch(G){a= "parsererror",k.error=c=G||a}}catch(E){r("error caught: ",E),a="error",k.error=c=E||a}k.aborted&&(r("upload aborted"),a=null);k.status&&(a=200<=k.status&&300>k.status||304===k.status?"success":"error");"success"===a?(e.success&&e.success.call(e.context,B,"success",k),x.resolve(k.responseText,"success",k),t&&b.event.trigger("ajaxSuccess",[k,e])):a&&(void 0===c&&(c=k.statusText),e.error&&e.error.call(e.context,k,a,c),x.reject(k,"error",c),t&&b.event.trigger("ajaxError",[k,e,c]));t&&b.event.trigger("ajaxComplete", [k,e]);t&&!--b.active&&b.event.trigger("ajaxStop");e.complete&&e.complete.call(e.context,k,a);F=!0;e.timeout&&clearTimeout(u);setTimeout(function(){e.iframeTarget?w.attr("src",e.iframeSrc):w.remove();k.responseXML=null},100)}}var l=n[0],m,e,t,s,w,v,k,y,u,x=b.Deferred();x.abort=function(a){k.abort(a)};if(c)for(m=0;m<p.length;m++)c=b(p[m]),D?c.prop("disabled",!1):c.removeAttr("disabled");e=b.extend(!0,{},b.ajaxSettings,a);e.context=e.context||e;s="jqFormIO"+(new Date).getTime();e.iframeTarget?(w=b(e.iframeTarget), (m=w.attr2("name"))?s=m:w.attr2("name",s)):(w=b('<iframe name="'+s+'" src="'+e.iframeSrc+'" />'),w.css({position:"absolute",top:"-1000px",left:"-1000px"}));v=w[0];k={aborted:0,responseText:null,responseXML:null,status:0,statusText:"n/a",getAllResponseHeaders:function(){},getResponseHeader:function(){},setRequestHeader:function(){},abort:function(a){var c="timeout"===a?"timeout":"aborted";r("aborting upload... "+c);this.aborted=1;try{v.contentWindow.document.execCommand&&v.contentWindow.document.execCommand("Stop")}catch(d){}w.attr("src", e.iframeSrc);k.error=c;e.error&&e.error.call(e.context,k,c,a);t&&b.event.trigger("ajaxError",[k,e,c]);e.complete&&e.complete.call(e.context,k,c)}};(t=e.global)&&0===b.active++&&b.event.trigger("ajaxStart");t&&b.event.trigger("ajaxSend",[k,e]);if(e.beforeSend&&!1===e.beforeSend.call(e.context,k,e))return e.global&&b.active--,x.reject(),x;if(k.aborted)return x.reject(),x;(c=l.clk)&&(m=c.name)&&!c.disabled&&(e.extraData=e.extraData||{},e.extraData[m]=c.value,"image"==c.type&&(e.extraData[m+".x"]=l.clk_x, e.extraData[m+".y"]=l.clk_y));var A=1,z=2;c=b("meta[name=csrf-token]").attr("content");(m=b("meta[name=csrf-param]").attr("content"))&&c&&(e.extraData=e.extraData||{},e.extraData[m]=c);e.forceSync?f():setTimeout(f,10);var B,q,C=50,F,H=b.parseXML||function(a,b){window.ActiveXObject?(b=new ActiveXObject("Microsoft.XMLDOM"),b.async="false",b.loadXML(a)):b=(new DOMParser).parseFromString(a,"text/xml");return b&&b.documentElement&&"parsererror"!=b.documentElement.nodeName?b:null},J=b.parseJSON||function(a){return window.eval("("+ a+")")},I=function(a,c,e){var d=a.getResponseHeader("content-type")||"",f="xml"===c||!c&&0<=d.indexOf("xml");a=f?a.responseXML:a.responseText;f&&"parsererror"===a.documentElement.nodeName&&b.error&&b.error("parsererror");e&&e.dataFilter&&(a=e.dataFilter(a,c));"string"===typeof a&&("json"===c||!c&&0<=d.indexOf("json")?a=J(a):("script"===c||!c&&0<=d.indexOf("javascript"))&&b.globalEval(a));return a};return x}if(!this.length)return r("ajaxSubmit: skipping submit process - no element selected"),this; var g,f,n=this;"function"==typeof a?a={success:a}:void 0===a&&(a={});g=a.type||this.attr2("method");f=a.url||this.attr2("action");(f=(f="string"===typeof f?b.trim(f):"")||window.location.href||"")&&(f=(f.match(/^([^#]+)/)||[])[1]);a=b.extend(!0,{url:f,success:b.ajaxSettings.success,type:g||b.ajaxSettings.type,iframeSrc:/^https/i.test(window.location.href||"")?"javascript:false":"about:blank"},a);f={};this.trigger("form-pre-serialize",[this,a,f]);if(f.veto)return r("ajaxSubmit: submit vetoed via form-pre-serialize trigger"), this;if(a.beforeSerialize&&!1===a.beforeSerialize(this,a))return r("ajaxSubmit: submit aborted via beforeSerialize callback"),this;var m=a.traditional;void 0===m&&(m=b.ajaxSettings.traditional);var p=[],l,t=this.formToArray(a.semantic,p);a.data&&(a.extraData=a.data,l=b.param(a.data,m));if(a.beforeSubmit&&!1===a.beforeSubmit(t,this,a))return r("ajaxSubmit: submit aborted via beforeSubmit callback"),this;this.trigger("form-submit-validate",[t,this,a,f]);if(f.veto)return r("ajaxSubmit: submit vetoed via form-submit-validate trigger"), this;f=b.param(t,m);l&&(f=f?f+"&"+l:l);"GET"==a.type.toUpperCase()?(a.url+=(0<=a.url.indexOf("?")?"&":"?")+f,a.data=null):a.data=f;var s=[];a.resetForm&&s.push(function(){n.resetForm()});a.clearForm&&s.push(function(){n.clearForm(a.includeHidden)});if(!a.dataType&&a.target){var y=a.success||function(){};s.push(function(c){var d=a.replaceTarget?"replaceWith":"html";b(a.target)[d](c).each(y,arguments)})}else a.success&&s.push(a.success);a.success=function(b,c,d){for(var f=a.context||this,g=0,h=s.length;g< h;g++)s[g].apply(f,[b,c,d||n,n])};if(a.error){var u=a.error;a.error=function(b,c,d){u.apply(a.context||this,[b,c,d,n])}}if(a.complete){var C=a.complete;a.complete=function(b,c){C.apply(a.context||this,[b,c,n])}}l=0<b("input[type=file]:enabled",this).filter(function(){return""!==b(this).val()}).length;f="multipart/form-data"==n.attr("enctype")||"multipart/form-data"==n.attr("encoding");m=z&&B;r("fileAPI :"+m);var A;!1!==a.iframe&&(a.iframe||(l||f)&&!m)?a.closeKeepAlive?b.get(a.closeKeepAlive,function(){A= c(t)}):A=c(t):A=(l||f)&&m?d(t):b.ajax(a);n.removeData("jqxhr").data("jqxhr",A);for(l=0;l<p.length;l++)p[l]=null;this.trigger("form-submit-notify",[this,a]);return this};b.fn.ajaxForm=function(a){a=a||{};a.delegation=a.delegation&&b.isFunction(b.fn.on);if(!a.delegation&&0===this.length){var h=this.selector,d=this.context;if(!b.isReady&&h)return r("DOM not ready, queuing ajaxForm"),b(function(){b(h,d).ajaxForm(a)}),this;r("terminating; zero elements found by selector"+(b.isReady?"":" (DOM not ready)")); return this}return a.delegation?(b(document).off("submit.form-plugin",this.selector,y).off("click.form-plugin",this.selector,u).on("submit.form-plugin",this.selector,a,y).on("click.form-plugin",this.selector,a,u),this):this.ajaxFormUnbind().bind("submit.form-plugin",a,y).bind("click.form-plugin",a,u)};b.fn.ajaxFormUnbind=function(){return this.unbind("submit.form-plugin click.form-plugin")};b.fn.formToArray=function(a,h){var d=[];if(0===this.length)return d;var c=this[0],g=this.attr("id"),f=a?c.getElementsByTagName("*"): c.elements;f&&(f=b(f).get());g&&(g=b(":input[form="+g+"]").get(),g.length&&(f=(f||[]).concat(g)));if(!f||!f.length)return d;var n,m,p,l,r;n=0;for(r=f.length;n<r;n++)if(l=f[n],(g=l.name)&&!l.disabled)if(a&&c.clk&&"image"==l.type)c.clk==l&&(d.push({name:g,value:b(l).val(),type:l.type}),d.push({name:g+".x",value:c.clk_x},{name:g+".y",value:c.clk_y}));else if((p=b.fieldValue(l,!0))&&p.constructor==Array)for(h&&h.push(l),m=0,l=p.length;m<l;m++)d.push({name:g,value:p[m]});else if(z&&"file"==l.type)if(h&& h.push(l),p=l.files,p.length)for(m=0;m<p.length;m++)d.push({name:g,value:p[m],type:l.type});else d.push({name:g,value:"",type:l.type});else null!==p&&"undefined"!=typeof p&&(h&&h.push(l),d.push({name:g,value:p,type:l.type,required:l.required}));!a&&c.clk&&(f=b(c.clk),n=f[0],(g=n.name)&&!n.disabled&&"image"==n.type&&(d.push({name:g,value:f.val()}),d.push({name:g+".x",value:c.clk_x},{name:g+".y",value:c.clk_y})));return d};b.fn.formSerialize=function(a){return b.param(this.formToArray(a))};b.fn.fieldSerialize= function(a){var h=[];this.each(function(){var d=this.name;if(d){var c=b.fieldValue(this,a);if(c&&c.constructor==Array)for(var g=0,f=c.length;g<f;g++)h.push({name:d,value:c[g]});else null!==c&&"undefined"!=typeof c&&h.push({name:this.name,value:c})}});return b.param(h)};b.fn.fieldValue=function(a){for(var h=[],d=0,c=this.length;d<c;d++){var g=b.fieldValue(this[d],a);null===g||"undefined"==typeof g||g.constructor==Array&&!g.length||(g.constructor==Array?b.merge(h,g):h.push(g))}return h};b.fieldValue= function(a,h){var d=a.name,c=a.type,g=a.tagName.toLowerCase();void 0===h&&(h=!0);if(h&&(!d||a.disabled||"reset"==c||"button"==c||("checkbox"==c||"radio"==c)&&!a.checked||("submit"==c||"image"==c)&&a.form&&a.form.clk!=a||"select"==g&&-1==a.selectedIndex))return null;if("select"==g){var f=a.selectedIndex;if(0>f)return null;for(var d=[],g=a.options,n=(c="select-one"==c)?f+1:g.length,f=c?f:0;f<n;f++){var m=g[f];if(m.selected){var p=m.value;p||(p=m.attributes&&m.attributes.value&&!m.attributes.value.specified? m.text:m.value);if(c)return p;d.push(p)}}return d}return b(a).val()};b.fn.clearForm=function(a){return this.each(function(){b("input,select,textarea",this).clearFields(a)})};b.fn.clearFields=b.fn.clearInputs=function(a){var h=/^(?:color|date|datetime|email|month|number|password|range|search|tel|text|time|url|week)$/i;return this.each(function(){var d=this.type,c=this.tagName.toLowerCase();h.test(d)||"textarea"==c?this.value="":"checkbox"==d||"radio"==d?this.checked=!1:"select"==c?this.selectedIndex= -1:"file"==d?/MSIE/.test(navigator.userAgent)?b(this).replaceWith(b(this).clone(!0)):b(this).val(""):a&&(!0===a&&/hidden/.test(d)||"string"==typeof a&&b(this).is(a))&&(this.value="")})};b.fn.resetForm=function(){return this.each(function(){("function"==typeof this.reset||"object"==typeof this.reset&&!this.reset.nodeType)&&this.reset()})};b.fn.enable=function(a){void 0===a&&(a=!0);return this.each(function(){this.disabled=!a})};b.fn.selected=function(a){void 0===a&&(a=!0);return this.each(function(){var h= this.type;"checkbox"==h||"radio"==h?this.checked=a:"option"==this.tagName.toLowerCase()&&(h=b(this).parent("select"),a&&h[0]&&"select-one"==h[0].type&&h.find("option").selected(!1),this.selected=a)})};b.fn.ajaxSubmit.debug=!1});

/**
 * jQuery Upload File Plugin
 * version: 2.0.7
 * @requires jQuery v1.5 or later & form plugin
 * Copyright (c) 2013 Ravishanker Kusuma
 * http://hayageek.com/
 **/
(function($) {
    var feature = {};
    feature.fileapi = $('<input type="file"/>').get(0).files !== undefined;
    feature.formdata = window.FormData !== undefined;

    $.fn.uploadFile = function(options) {
        // This is the easiest way to have default options.
        var s = $.extend({
            // These are the defaults.
            url: '',
            method: 'POST',
            enctype: 'multipart/form-data',
            formData: {},
            returnType: 'json',
            fileName: 'file',
            dynamicFormData: function() {
                return {};
            },
            maxFileSize: -1,
            maxFileAllowed: 10,
            allowedTypes: '*',
            multiple: true,
            dragDrop: true,
            autoSubmit: true,
            showAbort: true,
            showProgress: true,
            onSelect: function(files) {
                return true;
            },
            onSubmit: function(files, xhr) {
                return true;
            },
            onLoad: null,
            onSuccess: null,
            onError: null,
            onDelete: null,
            uploadClass: 'ajax-file-upload',
            uploadPanel: null,
            dragDropStr: 'Kéo &amp; thả tập tin vào đây.',
            noteStr: '',
            abortStr: 'Dừng',
            cancelStr: 'Huỷ',
            delSelector: '.delete',
            infoSelector: '.photoinfo',
            dragDropErrorStr: 'Trình duyệt của bạn không hỗ trợ kéo thả tập tin.',
            maxFileAllowedErrorStr: 'Chỉ được tải lên tối đa <b>%s</b> tập tin.',
            extErrorStr: 'Tập tin <b>%s</b> không được hỗ trợ, chỉ hỗ trợ các dạng sau: %s.',
            sizeErrorStr: 'Kích thước của tập tin <b>%s</b> vượt quá kích thước cho phép là %s.',
            uploadErrorStr: 'Không được phép upload.'
        }, options);

        var formGroup = s.uploadClass + '-' + (new Date().getTime());
        this.formGroup = formGroup;
        this.hide();
        
        if (s.uploadPanel) {
        	this.uploadPanel = $(s.uploadPanel);
        } else {
	        if (this.next('.' + s.uploadClass + '-panel').size() > 0) {
	            this.uploadPanel = this.next('.' + s.uploadClass + '-panel');
	        } else {
	            this.uploadPanel = $('<div class="' + s.uploadClass + '-panel"></div>');
	            this.after(this.uploadPanel);
	        }
        }
        this.fileCounter = this.uploadPanel.find(s.infoSelector).size();
        
        if (this.next('.' + s.uploadClass + '-log').size() > 0) {
            this.errorLog = this.next('.' + s.uploadClass + '-log');
        } else {
            this.errorLog = $('<div class="' + s.uploadClass + '-log"></div>');
            this.after(this.errorLog);
        }
        this.responses = [];
        //check drag drop enabled.
        if (!feature.formdata) {
            s.dragDrop = false;
        }
        
        var obj = this;
        var uploadLabel = $('<div>' + $(this).html() + '</div>');
        $(uploadLabel).addClass(s.uploadClass + '-button');
                
        if ($.isFunction(s.onLoad)) {
            s.onLoad(obj, obj.uploadPanel);
        }
        //bind delete
        this.uploadPanel.find(s.delSelector).click(function(evt) {
        	evt.preventDefault();
            if ($.isFunction(s.onDelete)) {
                s.onDelete(this, obj, obj.uploadPanel);
            }
        });

        //wait form ajax Form plugin and initialize		
        (function checkAjaxFormLoaded() {
            if ($.fn.ajaxForm) {
                if (s.dragDrop) {
                    var dragDrop = $('<div class="' + s.uploadClass + '-dragdrop"></div>');
                    $(obj).before(dragDrop);
                    if (!s.dragDropStr.blank()) {
                    	$(dragDrop).append($('<div class="pb10">' + s.dragDropStr + '</div>'));
                    }
                    $(dragDrop).append(uploadLabel);
                    if (!s.noteStr.blank()) {
                    	$(dragDrop).append($('<div class="pt10">' + s.noteStr + '</div>'));
                    }
                    setDragDropHandlers(obj, s, dragDrop);
                } else {
                    $(obj).before(uploadLabel);
                }

                createCustomInputFile(obj, formGroup, s, uploadLabel);
            } else {
                window.setTimeout(checkAjaxFormLoaded, 10);
            }
        })();

        this.startUpload = function() {
            $('.' + this.formGroup).each(function(i, items) {
                if ($(this).is('form'))
                    $(this).submit();
            });
        };

        this.getResponses = function() {
            return this.responses;
        };

        function setDragDropHandlers(obj, s, ddObj) {
            ddObj.on('dragenter', function(e) {
                e.stopPropagation();
                e.preventDefault();
                $(this).css('border-color', '#a5a5c7');
            });
            
            ddObj.on('dragover', function(e) {
                e.stopPropagation();
                e.preventDefault();
            });
            
            ddObj.on('drop', function(e) {
                $(this).css('border-color', '#a5a5c7');
                e.preventDefault();
                var files = e.originalEvent.dataTransfer.files;
                if (!s.multiple && files.length > 1) {
                    writeErrorLog(obj, s.dragDropErrorStr, true);
                    return;
                }
                if ($.isFunction(s.onSelect) && s.onSelect(files) == false)
                    return;
                serializeAndUploadFiles(s, obj, files);
            });

            $(document).on('dragenter', function(e) {
                e.stopPropagation();
                e.preventDefault();
            });
            
            $(document).on('dragover', function(e) {
                e.stopPropagation();
                e.preventDefault();
                obj.css('border-color', '#a5a5c7');
            });
            
            $(document).on('drop', function(e) {
                e.stopPropagation();
                e.preventDefault();
                obj.css('border-color', '#a5a5c7');
            });
        }

        function getSizeStr(size) {
            var sizeStr = '';
            var sizeKB = size / 1024;
            if (parseInt(sizeKB) > 1024) {
                var sizeMB = sizeKB / 1024;
                sizeStr = sizeMB.toFixed(2) + ' MB';
            } else {
                sizeStr = sizeKB.toFixed(2) + ' KB';
            }
            return sizeStr;
        }

        function serializeData(extraData) {
            var serialized = [];
            if (jQuery.type(extraData) == 'string') {
                serialized = extraData.split('&');
            } else {
                serialized = $.param(extraData).split('&');
            }
            var len = serialized.length;
            var result = [];
            var i, part;
            for (i = 0; i < len; i++) {
                serialized[i] = serialized[i].replace(/\+/g, ' ');
                part = serialized[i].split('=');
                result.push([decodeURIComponent(part[0]), decodeURIComponent(part[1])]);
            }
            return result;
        }

        function serializeAndUploadFiles(s, obj, files) {
            for (var i = 0; i < files.length; i++) {
                if (obj.fileCounter == s.maxFileAllowed) {
                    writeErrorLog(obj, vsprintf(s.maxFileAllowedErrorStr, [s.maxFileAllowed]), true);
                    break;
                }
                if (!isFileTypeAllowed(obj, s, files[i].name)) {
                    writeErrorLog(obj, vsprintf(s.extErrorStr, [files[i].name, s.allowedTypes]), false);
                    continue;
                }
                if (s.maxFileSize != -1 && files[i].size > s.maxFileSize) {
                    writeErrorLog(obj, vsprintf(s.sizeErrorStr, [files[i].name, getSizeStr(s.maxFileSize)]), false);
                    continue;
                }
                var ts = s;
                var fd = new FormData();
                var fileName = s.fileName.replace('[]', '');
                fd.append(fileName, files[i]);
                var extraData = s.formData;
                if (extraData) {
                    var sData = serializeData(extraData);
                    for (var j = 0; j < sData.length; j++) {
                        if (sData[j]) {
                            fd.append(sData[j][0], sData[j][1]);
                        }
                    }
                }
                ts.fileData = fd;

                var pd = new createProgressDiv(obj);
                pd.filename.html(files[i].name);
                var form = $('<form style="display: block; position: absolute; left: 150px;" class="' + obj.formGroup + '" method="' + s.method + '" action="' + s.url + '" enctype="' + s.enctype + '"></form>');
                form.appendTo('body');
                var fileArray = [];
                fileArray.push(files[i].name);
                ajaxFormSubmit(form, ts, pd, fileArray, obj);
                obj.fileCounter++;
            }
        }

        function isFileTypeAllowed(obj, s, fileName) {
            var fileExtensions = s.allowedTypes.toLowerCase().split(',');
            var ext = fileName.split('.').pop().toLowerCase();
            if (s.allowedTypes != '*' && jQuery.inArray(ext, fileExtensions) < 0) {
                return false;
            }
            return true;
        }

        function vsprintf(str, params) {
            for (var i = 0; i < params.length; i++) {
                str = str.replace(/%s/, params[i]);
            }
            return str;
        }

        function createCustomInputFile(obj, group, s, uploadLabel) {
            var fileUploadId = 'ajax-upload-id-' + (new Date().getTime());

            var form = $('<form method="' + s.method + '" action="' + s.url + '" enctype="' + s.enctype + '"></form>');
            var fileInputStr = '<input type="file" id="' + fileUploadId + '" name="' + s.fileName + '" />';
            if (s.multiple && feature.formdata) {
            	// if it does not endwith
                if (s.fileName.indexOf('[]') != s.fileName.length - 2) {
                    s.fileName += '[]';
                }
                fileInputStr = '<input type="file" id="' + fileUploadId + '" name="' + s.fileName + '" multiple />';
            }
            var fileInput = $(fileInputStr).appendTo(form);

            fileInput.change(function() {
                var fileArray = [];

                //support reading files
                if (this.files) {
                    for (i = 0; i < this.files.length; i++) {
                        fileArray.push(this.files[i].name);
                    }
                    if ($.isFunction(s.onSelect) && s.onSelect(this.files) == false) {
                        return;
                    }
                } else {
                    var filenameStr = $(this).val();
                    var flist = [];
                    fileArray.push(filenameStr);
                    if (!isFileTypeAllowed(obj, s, filenameStr)) {
                        writeErrorLog(obj, vsprintf(s.extErrorStr, [filenameStr, s.allowedTypes]), false);
                        return;
                    }
                    //fallback for browser without FileAPI
                    flist.push({name: filenameStr, size: 'NA'});
                    if ($.isFunction(s.onSelect) && s.onSelect(flist) == false) {
                        return;
                    }
                }

                uploadLabel.unbind('click');
                createCustomInputFile(obj, group, s, uploadLabel);

                form.addClass(group);
                //use HTML5 support and split file submission
                if (feature.fileapi && feature.formdata) {
                    form.removeClass(group); //Stop Submitting when.
                    var files = this.files;
                    serializeAndUploadFiles(s, obj, files);
                } else {
                    var fileList = '';
                    for (var i = 0; i < fileArray.length; i++) {
                        if (obj.fileCounter == s.maxFileAllowed) {
                            writeErrorLog(obj, vsprintf(s.maxFileAllowedErrorStr, [s.maxFileAllowed]), true);
                            break;
                        }
                        fileList += fileArray[i] + '<br />';
                        obj.fileCounter++;
                    }
                    var pd = new createProgressDiv(obj);
                    pd.filename.html(fileList);
                    ajaxFormSubmit(form, s, pd, fileArray, obj);
                }
            });
            
            var uwidth = $(uploadLabel).width() + parseInt($(uploadLabel).css('padding-left')) + parseInt($(uploadLabel).css('padding-right'));
            if (uwidth == 10) {
                uwidth = 120;
            }

            var uheight = uploadLabel.height() + parseInt($(uploadLabel).css('padding-top')) + parseInt($(uploadLabel).css('padding-bottom'));
            if (uheight == 10) {
                uheight = 35;
        	}
        	
            uploadLabel.css({ position: 'relative', cursor: 'default' });
            fileInput.css({
                position: 'absolute',
                cursor: 'default',
                top: '0px',
                width: uwidth,
                height: uheight,
                left: '0px',
                'z-index': '100',
                opacity: '0.0',
                filter: 'alpha(opacity=0)',
                '-ms-filter': 'alpha(opacity=0)',
                '-khtml-opacity': '0.0',
                '-moz-opacity': '0.0'
            });

            form.css({
                margin: 0,
                padding: 0,
                display: 'block',
                position: 'absolute',
                left: '-550px'
            });
            form.appendTo('body');

            if (navigator.appVersion.indexOf('MSIE ') != -1) {//IE Browser
                uploadLabel.attr('for', fileUploadId);
            } else {
                uploadLabel.on('click', function() {
                    fileInput.trigger('click');
                });
            }
        }

        function writeErrorLog(obj, logStr, autoClose) {
            $('<div class="' + s.uploadClass + '-error">' + logStr + '</div>').appendTo(obj.errorLog);
            if (autoClose) {
                setTimeout(function() {
                    obj.errorLog.slideDown('slow', function () {
                        $(this).html('');
                    });
                }, 1500);
            }
        }

        function createProgressDiv(obj) {
            this.statusbar = $('<div class="' + s.uploadClass + '-statusbar"></div>');
            this.header = $('<div class="' + s.uploadClass + '-header"></div>').appendTo(this.statusbar);
            this.filename = $('<div class="' + s.uploadClass + '-filename"></div>').appendTo(this.header);
            this.cancel = $('<a href="#" class="' + s.uploadClass + '-cancel">' + s.cancelStr + '</a>').appendTo(this.header).hide();
            this.abort = $('<a href="#" class="' + s.uploadClass + '-abort "' + obj.formGroup + '">' + s.abortStr + '</a>').appendTo(this.header).hide();
            this.progressDiv = $('<div class="' + s.uploadClass + '-progress">').appendTo(this.statusbar).hide();
            this.progressbar = $('<div class="' + s.uploadClass + '-bar"></div>').appendTo(this.progressDiv);
            obj.uploadPanel.append(this.statusbar);
            return this;
        }

        function ajaxFormSubmit(form, s, pd, fileArray, obj) {
            var currentXHR = null;
            var options = {
                cache: false,
                contentType: false,
                processData: false,
                forceSync: false,
                data: s.formData,
                formData: s.fileData,
                dataType: s.returnType,
                beforeSubmit: function(formData, $form, options) {
                    if ($.isFunction(s.onSubmit) && s.onSubmit(obj, fileArray) != false) {
                        var dynData = s.dynamicFormData();
                        if (dynData) {
                            var sData = serializeData(dynData);
                            if (sData) {
                                for (var j = 0; j < sData.length; j++) {
                                    if (sData[j]) {
                                        if (s.fileData != undefined)
                                            options.formData.append(sData[j][0], sData[j][1]);
                                        else
                                            options.data[sData[j][0]] = sData[j][1];
                                    }
                                }
                            }
                        }
                        return true;
                    }
                    pd.statusbar.append('<div class="' + s.uploadClass + '-error">' + s.uploadErrorStr + '</div>');
                    form.remove();
                    pd.cancel.click(function (evt) {
                    	evt.preventDefault();
                        obj.fileCounter--;
                        pd.statusbar.remove();
                    });
                    return false;
                },
                beforeSend: function(xhr, o) {
                    if ($.isFunction(s.onSubmit)) {
                        s.onSubmit(obj, fileArray, xhr);
                    }
                    pd.progressDiv.show();
                    if (s.showAbort) {
                        pd.abort.show();
                        pd.abort.click(function(evt) {
                        	evt.preventDefault();
                            obj.fileCounter--;
                            xhr.abort();
                        });
                    }
                    //For iframe based push
                    if (!feature.formdata) {
                        pd.progressbar.width('5%');
                    } else {
                        pd.progressbar.width('1%'); //Fix for small files
                    }
                },
                uploadProgress: function(event, position, total, percentComplete) {
                    //Fix for smaller file uploads in MAC
                    if (percentComplete > 98)
                        percentComplete = 100;

                    var percentVal = percentComplete + '%';
                    if (percentComplete > 1)
                        pd.progressbar.width(percentVal);
                    if (s.showProgress) {
                        pd.progressbar.html(percentVal);
                        pd.progressbar.css('text-align', 'center');
                    }
                },
                success: function(data, message, xhr) {
                    obj.responses.push(data);
                    pd.progressbar.width('100%');
                    if (s.showProgress) {
                        pd.progressbar.html('100%');
                        pd.progressbar.css('text-align', 'center');
                    }
                    
                    pd.abort.hide();
                    if (data.error == false) {
                        if ($.isFunction(s.onSuccess)) {
                            s.onSuccess(obj, obj.uploadPanel, fileArray, data, xhr);
                        }
                        pd.statusbar.hide('slow');
                        pd.statusbar.remove();
                        form.remove();
                        //bind delete
                        obj.uploadPanel.find(s.delSelector).click(function(evt) {
                        	evt.preventDefault();
                            if ($.isFunction(s.onDelete)) {
                                s.onDelete(this, obj, obj.uploadPanel);
                            }
                        });
                    } else {
                        if ($.isFunction(s.onError)) {
                            s.onError(obj, obj.uploadPanel, fileArray, 'error', data.message);
                        }
                        obj.fileCounter--;
                        pd.progressDiv.hide();
                        pd.statusbar.append('<div class="' + s.uploadClass + '-error">' + data.message + '</div>');
                        setTimeout(function() {
                            pd.statusbar.remove();
                            form.remove();
                        }, 2500);
                    }
                },
                error: function(xhr, status, errMsg) {
                    pd.abort.hide();
                    //we aborted it
                    if (xhr.statusText == 'abort') {
                        pd.statusbar.hide('slow');
                    } else {
                        if ($.isFunction(s.onError)) {
                            s.onError(obj, obj.uploadPanel, fileArray, status, errMsg);
                        }
                        pd.progressDiv.hide();
                        pd.statusbar.append('<div class="' + s.uploadClass + '-error">' + errMsg + '</div>');
                        setTimeout(function() {
                            pd.statusbar.remove();
                        }, 2500);
                    }
                    obj.fileCounter--;
                    form.remove();
                }
            };
            
            if (s.autoSubmit) {
                form.ajaxSubmit(options);
            } else {
                if (s.showCancel) {
                    pd.cancel.show();
                    pd.cancel.click(function (evt) {
                    	evt.preventDefault();
                        obj.fileCounter--;
                        form.remove();
                        pd.statusbar.remove();
                    });
                }
                form.ajaxForm(options);
            }
        }
        
        return this;
    };
}(jQuery));