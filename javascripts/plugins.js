'use strict';

// usage: log('inside coolFunc', this, arguments);
// paulirish.com/2009/log-a-lightweight-wrapper-for-consolelog/
window.log = function(){
  log.history = log.history || [];   // store logs to an array for reference
  log.history.push(arguments);
  if (this.console) {
    arguments.callee = arguments.callee.caller;
    var newarr = [].slice.call(arguments);
    (typeof console.log === 'object' ? log.apply.call(console.log, console, newarr) : console.log.apply(console, newarr));
  }
};

// make it safe to use console.log always
(function(b){function c(){}for(var d="assert,clear,count,debug,dir,dirxml,error,exception,firebug,group,groupCollapsed,groupEnd,info,log,memoryProfile,memoryProfileEnd,profile,profileEnd,table,time,timeEnd,timeStamp,trace,warn".split(","),a;a=d.pop();){b[a]=b[a]||c}})((function(){try
{console.log();return window.console;}catch(err){return window.console={};}})());

// TODO: Hack for conditionally setting this global
if (typeof(enableContributionAjaxForm) != 'undefined') {
  enableContributionAjaxForm('\/contribution\/type-form');
}

jQuery(function($) {
    'use strict';
    // add any jQuery namespace functions here
    //

    // Infinite scroll for items/browse view
    $('.pagination').hide(); // hide pagination for JS fallback

    var $results = $('.results');

    $results.infinitescroll({
      //debug: true,
      animate: true,
      nextSelector: '.pagination_next a.next',
      navSelector: '.pagination_next',
      itemSelector: '.item',
      loading: {
        msgText: '<p><em>Loading next set of contributions...</em></p>',
        finishedMsg: '<p><em>You have reached the end of the contributions.</em></p>'
      }
    });

    



});

var uvatheme = (function() {
  'use strict';
  // UvaTheme module namespace using tight augmentation

}(uvatheme));


