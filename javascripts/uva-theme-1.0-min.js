/*
	--------------------------------
	Infinite Scroll
	--------------------------------
	+ https://github.com/paulirish/infinite-scroll
	+ version 2.0b2.120311
	+ Copyright 2011 Paul Irish & Luke Shumard
	+ Licensed under the MIT license
	
	+ Documentation: http://infinite-scroll.com/
	
*/(function(window,$,undefined){$.infinitescroll=function(options,callback,element){this.element=$(element),this._create(options,callback)||(this.failed=!0)},$.infinitescroll.defaults={loading:{finished:undefined,finishedMsg:"<em>Congratulations, you've reached the end of the internet.</em>",img:"http://www.infinite-scroll.com/loading.gif",msg:null,msgText:"<em>Loading the next set of posts...</em>",selector:null,speed:"fast",start:undefined},state:{isDuringAjax:!1,isInvalidPage:!1,isDestroyed:!1,isDone:!1,isPaused:!1,currPage:1},callback:undefined,debug:!1,behavior:undefined,binder:$(window),nextSelector:"div.navigation a:first",navSelector:"div.navigation",contentSelector:null,extraScrollPx:150,itemSelector:"div.post",animate:!1,pathParse:undefined,dataType:"html",appendCallback:!0,bufferPx:40,errorCallback:function(){},infid:0,pixelsFromNavToBottom:undefined,path:undefined},$.infinitescroll.prototype={_binding:function(binding){var instance=this,opts=instance.options;opts.v="2.0b2.111027";if(!!opts.behavior&&this["_binding_"+opts.behavior]!==undefined){this["_binding_"+opts.behavior].call(this);return}if(binding!=="bind"&&binding!=="unbind")return this._debug("Binding value  "+binding+" not valid"),!1;binding=="unbind"?this.options.binder.unbind("smartscroll.infscr."+instance.options.infid):this.options.binder[binding]("smartscroll.infscr."+instance.options.infid,function(){instance.scroll()}),this._debug("Binding",binding)},_create:function(options,callback){var opts=$.extend(!0,{},$.infinitescroll.defaults,options);if(!this._validate(options))return!1;this.options=opts;var path=$(opts.nextSelector).attr("href");return path?(opts.path=this._determinepath(path),opts.contentSelector=opts.contentSelector||this.element,opts.loading.selector=opts.loading.selector||opts.contentSelector,opts.loading.msg=$('<div id="infscr-loading"><img alt="Loading..." src="'+opts.loading.img+'" /><div>'+opts.loading.msgText+"</div></div>"),(new Image).src=opts.loading.img,opts.pixelsFromNavToBottom=$(document).height()-$(opts.navSelector).offset().top,opts.loading.start=opts.loading.start||function(){$(opts.navSelector).hide(),opts.loading.msg.appendTo(opts.loading.selector).show(opts.loading.speed,function(){beginAjax(opts)})},opts.loading.finished=opts.loading.finished||function(){opts.loading.msg.fadeOut("normal")},opts.callback=function(instance,data){!!opts.behavior&&instance["_callback_"+opts.behavior]!==undefined&&instance["_callback_"+opts.behavior].call($(opts.contentSelector)[0],data),callback&&callback.call($(opts.contentSelector)[0],data,opts)},this._setup(),!0):(this._debug("Navigation selector not found"),!1)},_debug:function(){if(this.options&&this.options.debug)return window.console&&console.log.call(console,arguments)},_determinepath:function(path){var opts=this.options;if(!opts.behavior||this["_determinepath_"+opts.behavior]===undefined){if(!opts.pathParse){if(path.match(/^(.*?)\b2\b(.*?$)/))path=path.match(/^(.*?)\b2\b(.*?$)/).slice(1);else if(path.match(/^(.*?)2(.*?$)/)){if(path.match(/^(.*?page=)2(\/.*|$)/))return path=path.match(/^(.*?page=)2(\/.*|$)/).slice(1),path;path=path.match(/^(.*?)2(.*?$)/).slice(1)}else{if(path.match(/^(.*?page=)1(\/.*|$)/))return path=path.match(/^(.*?page=)1(\/.*|$)/).slice(1),path;this._debug("Sorry, we couldn't parse your Next (Previous Posts) URL. Verify your the css selector points to the correct A tag. If you still get this error: yell, scream, and kindly ask for help at infinite-scroll.com."),opts.state.isInvalidPage=!0}return this._debug("determinePath",path),path}return this._debug("pathParse manual"),opts.pathParse(path,this.options.state.currPage+1)}this["_determinepath_"+opts.behavior].call(this,path);return},_error:function(xhr){var opts=this.options;if(!!opts.behavior&&this["_error_"+opts.behavior]!==undefined){this["_error_"+opts.behavior].call(this,xhr);return}xhr!=="destroy"&&xhr!=="end"&&(xhr="unknown"),this._debug("Error",xhr),xhr=="end"&&this._showdonemsg(),opts.state.isDone=!0,opts.state.currPage=1,opts.state.isPaused=!1,this._binding("unbind")},_loadcallback:function(box,data){var opts=this.options,callback=this.options.callback,result=opts.state.isDone?"done":opts.appendCallback?"append":"no-append",frag;if(!!opts.behavior&&this["_loadcallback_"+opts.behavior]!==undefined){this["_loadcallback_"+opts.behavior].call(this,box,data);return}switch(result){case"done":return this._showdonemsg(),!1;case"no-append":opts.dataType=="html"&&(data="<div>"+data+"</div>",data=$(data).find(opts.itemSelector));break;case"append":var children=box.children();if(children.length==0)return this._error("end");frag=document.createDocumentFragment();while(box[0].firstChild)frag.appendChild(box[0].firstChild);this._debug("contentSelector",$(opts.contentSelector)[0]),$(opts.contentSelector)[0].appendChild(frag),data=children.get()}opts.loading.finished.call($(opts.contentSelector)[0],opts);if(opts.animate){var scrollTo=$(window).scrollTop()+$("#infscr-loading").height()+opts.extraScrollPx+"px";$("html,body").animate({scrollTop:scrollTo},800,function(){opts.state.isDuringAjax=!1})}opts.animate||(opts.state.isDuringAjax=!1),callback(this,data)},_nearbottom:function(){var opts=this.options,pixelsFromWindowBottomToBottom=0+$(document).height()-opts.binder.scrollTop()-$(window).height();return!opts.behavior||this["_nearbottom_"+opts.behavior]===undefined?(this._debug("math:",pixelsFromWindowBottomToBottom,opts.pixelsFromNavToBottom),pixelsFromWindowBottomToBottom-opts.bufferPx<opts.pixelsFromNavToBottom):this["_nearbottom_"+opts.behavior].call(this)},_pausing:function(pause){var opts=this.options;if(!opts.behavior||this["_pausing_"+opts.behavior]===undefined){pause!=="pause"&&pause!=="resume"&&pause!==null&&this._debug("Invalid argument. Toggling pause value instead"),pause=!pause||pause!="pause"&&pause!="resume"?"toggle":pause;switch(pause){case"pause":opts.state.isPaused=!0;break;case"resume":opts.state.isPaused=!1;break;case"toggle":opts.state.isPaused=!opts.state.isPaused}return this._debug("Paused",opts.state.isPaused),!1}this["_pausing_"+opts.behavior].call(this,pause);return},_setup:function(){var opts=this.options;if(!opts.behavior||this["_setup_"+opts.behavior]===undefined)return this._binding("bind"),!1;this["_setup_"+opts.behavior].call(this);return},_showdonemsg:function(){var opts=this.options;if(!!opts.behavior&&this["_showdonemsg_"+opts.behavior]!==undefined){this["_showdonemsg_"+opts.behavior].call(this);return}opts.loading.msg.find("img").hide().parent().find("div").html(opts.loading.finishedMsg).animate({opacity:1},2e3,function(){$(this).parent().fadeOut("normal")}),opts.errorCallback.call($(opts.contentSelector)[0],"done")},_validate:function(opts){for(var key in opts)if(key.indexOf&&key.indexOf("Selector")>-1&&$(opts[key]).length===0)return this._debug("Your "+key+" found no elements."),!1;return!0},bind:function(){this._binding("bind")},destroy:function(){return this.options.state.isDestroyed=!0,this._error("destroy")},pause:function(){this._pausing("pause")},resume:function(){this._pausing("resume")},retrieve:function(pageNum){var instance=this,opts=instance.options,path=opts.path,box,frag,desturl,method,condition,pageNum=pageNum||null,getPage=pageNum?pageNum:opts.state.currPage;beginAjax=function(opts){opts.state.currPage++,instance._debug("heading into ajax",path),box=$(opts.contentSelector).is("table")?$("<tbody/>"):$("<div/>"),desturl=path.join(opts.state.currPage),method=opts.dataType=="html"||opts.dataType=="json"?opts.dataType:"html+callback",opts.appendCallback&&opts.dataType=="html"&&(method+="+callback");switch(method){case"html+callback":instance._debug("Using HTML via .load() method"),box.load(desturl+" "+opts.itemSelector,null,function(responseText){instance._loadcallback(box,responseText)});break;case"html":case"json":instance._debug("Using "+method.toUpperCase()+" via $.ajax() method"),$.ajax({url:desturl,dataType:opts.dataType,complete:function(jqXHR,textStatus){condition=typeof jqXHR.isResolved!="undefined"?jqXHR.isResolved():textStatus==="success"||textStatus==="notmodified",condition?instance._loadcallback(box,jqXHR.responseText):instance._error("end")}})}};if(!!opts.behavior&&this["retrieve_"+opts.behavior]!==undefined){this["retrieve_"+opts.behavior].call(this,pageNum);return}if(opts.state.isDestroyed)return this._debug("Instance is destroyed"),!1;opts.state.isDuringAjax=!0,opts.loading.start.call($(opts.contentSelector)[0],opts)},scroll:function(){var opts=this.options,state=opts.state;if(!!opts.behavior&&this["scroll_"+opts.behavior]!==undefined){this["scroll_"+opts.behavior].call(this);return}if(state.isDuringAjax||state.isInvalidPage||state.isDone||state.isDestroyed||state.isPaused)return;if(!this._nearbottom())return;this.retrieve()},toggle:function(){this._pausing()},unbind:function(){this._binding("unbind")},update:function(key){$.isPlainObject(key)&&(this.options=$.extend(!0,this.options,key))}},$.fn.infinitescroll=function(options,callback){var thisCall=typeof options;switch(thisCall){case"string":var args=Array.prototype.slice.call(arguments,1);this.each(function(){var instance=$.data(this,"infinitescroll");if(!instance)return!1;if(!$.isFunction(instance[options])||options.charAt(0)==="_")return!1;instance[options].apply(instance,args)});break;case"object":this.each(function(){var instance=$.data(this,"infinitescroll");instance?instance.update(options):(instance=new $.infinitescroll(options,callback,this),instance.failed||$.data(this,"infinitescroll",instance))})}return this};var event=$.event,scrollTimeout;event.special.smartscroll={setup:function(){$(this).bind("scroll",event.special.smartscroll.handler)},teardown:function(){$(this).unbind("scroll",event.special.smartscroll.handler)},handler:function(event,execAsap){var context=this,args=arguments;event.type="smartscroll",scrollTimeout&&clearTimeout(scrollTimeout),scrollTimeout=setTimeout(function(){$.event.handle.apply(context,args)},execAsap==="execAsap"?0:100)}},$.fn.smartscroll=function(fn){return fn?this.bind("smartscroll",fn):this.trigger("smartscroll",["execAsap"])}})(window,jQuery),"use strict",window.log=function(){log.history=log.history||[],log.history.push(arguments);if(this.console){arguments.callee=arguments.callee.caller;var newarr=[].slice.call(arguments);typeof console.log=="object"?log.apply.call(console.log,console,newarr):console.log.apply(console,newarr)}},function(b){function c(){}for(var d="assert,clear,count,debug,dir,dirxml,error,exception,firebug,group,groupCollapsed,groupEnd,info,log,memoryProfile,memoryProfileEnd,profile,profileEnd,table,time,timeEnd,timeStamp,trace,warn".split(","),a;a=d.pop();)b[a]=b[a]||c}(function(){try{return console.log(),window.console}catch(err){return window.console={}}}()),typeof enableContributionAjaxForm!="undefined"&&enableContributionAjaxForm("/contribution/type-form"),jQuery(function($){"use strict";$(".pagination").hide();var $results=$(".results");$results.infinitescroll({animate:!0,nextSelector:".pagination_next a.next",navSelector:".pagination_next",itemSelector:".item",loading:{msgText:"<p><em>Loading next set of contributions...</em></p>",finishedMsg:"<p><em>You have reached the end of the contributions.</em></p>"}})});var uvatheme=function(){"use strict";}(uvatheme);