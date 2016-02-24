/*!
* jquery.counterup.js 1.0
*
* Copyright 2013, Benjamin Intal http://gambit.ph @bfintal
* Released under the GPL v2 License
*
* Date: Nov 26, 2013
* Customized by Tobias Forkel, http://www.tobiasforkel.de
*/!function(t){"use strict";t.fn.counterUp=function(e){var a=t.extend({time:1e3,delay:10},e);return this.each(function(){var e=t(this),n={time:t(this).data("time")||a.time,delay:t(this).data("delay")||a.delay},u=function(){var t=[],a=n.time/n.delay,u=e.text(),r=/[0-9]+,[0-9]+/.test(u);u=u.replace(/,/g,"");for(var d=(/^[0-9]+$/.test(u),/^[0-9]+\.[0-9]+$/.test(u)),i=d?(u.split(".")[1]||[]).length:0,o=a;o>=1;o--){var c=parseInt(u/a*o);if(d&&(c=parseFloat(u/a*o).toFixed(i)),r)for(;/(\d+)(\d{3})/.test(c.toString());)c=c.toString().replace(/(\d+)(\d{3})/,"$1,$2");t.unshift(c)}e.data("counterup-nums",t),e.text("0");var s=function(){e.data("counterup-nums")&&(e.text(e.data("counterup-nums").shift()),e.data("counterup-nums").length?setTimeout(e.data("counterup-func"),n.delay):(delete e.data("counterup-nums"),e.data("counterup-nums",null),e.data("counterup-func",null)))};e.data("counterup-func",s),setTimeout(e.data("counterup-func"),n.delay)};e.waypoint(u,{offset:"100%",triggerOnce:!0})})}}(jQuery);
