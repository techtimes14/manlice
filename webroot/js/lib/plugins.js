/*
    1. ModernizrCustom v2.6.2
    2. WayPoint v2.0.2
	3. Hammer v1.1.3
	4. SideBarMenu
	5. Owl v2.2.1
	6. TheiaStickySidebar v1.6.0
	7. mCustomScrollbar v3.0.2
	8. MouseWheel v3.1.11
	9. BxSlider  v4.1.2
	10. YouTubePopUp v1.0.1
	11. FancyBox v2.1.5
*/

/*---------------------- ModernizrCustom ----------------------*/
/* Modernizr 2.6.2 (Custom Build) | MIT & BSD
 * Build: http://modernizr.com/download/#-fontface-borderradius-boxshadow-opacity-textshadow-cssanimations-generatedcontent-cssgradients-csstransitions-indexeddb-inputtypes-shiv-cssclasses-addtest-teststyles-testprop-testallprops-prefixes-domprefixes-load
 */
;window.Modernizr=function(a,b,c){function A(a){j.cssText=a}function B(a,b){return A(n.join(a+";")+(b||""))}function C(a,b){return typeof a===b}function D(a,b){return!!~(""+a).indexOf(b)}function E(a,b){for(var d in a){var e=a[d];if(!D(e,"-")&&j[e]!==c)return b=="pfx"?e:!0}return!1}function F(a,b,d){for(var e in a){var f=b[a[e]];if(f!==c)return d===!1?a[e]:C(f,"function")?f.bind(d||b):f}return!1}function G(a,b,c){var d=a.charAt(0).toUpperCase()+a.slice(1),e=(a+" "+p.join(d+" ")+d).split(" ");return C(b,"string")||C(b,"undefined")?E(e,b):(e=(a+" "+q.join(d+" ")+d).split(" "),F(e,b,c))}function H(){e.inputtypes=function(a){for(var d=0,e,f,h,i=a.length;d<i;d++)k.setAttribute("type",f=a[d]),e=k.type!=="text",e&&(k.value=l,k.style.cssText="position:absolute;visibility:hidden;",/^range$/.test(f)&&k.style.WebkitAppearance!==c?(g.appendChild(k),h=b.defaultView,e=h.getComputedStyle&&h.getComputedStyle(k,null).WebkitAppearance!=="textfield"&&k.offsetHeight!==0,g.removeChild(k)):/^(search|tel)$/.test(f)||(/^(url|email)$/.test(f)?e=k.checkValidity&&k.checkValidity()===!1:e=k.value!=l)),s[a[d]]=!!e;return s}("search tel url email datetime date month week time datetime-local number range color".split(" "))}var d="2.6.2",e={},f=!0,g=b.documentElement,h="modernizr",i=b.createElement(h),j=i.style,k=b.createElement("input"),l=":)",m={}.toString,n=" -webkit- -moz- -o- -ms- ".split(" "),o="Webkit Moz O ms",p=o.split(" "),q=o.toLowerCase().split(" "),r={},s={},t={},u=[],v=u.slice,w,x=function(a,c,d,e){var f,i,j,k,l=b.createElement("div"),m=b.body,n=m||b.createElement("body");if(parseInt(d,10))while(d--)j=b.createElement("div"),j.id=e?e[d]:h+(d+1),l.appendChild(j);return f=["&#173;",'<style id="s',h,'">',a,"</style>"].join(""),l.id=h,(m?l:n).innerHTML+=f,n.appendChild(l),m||(n.style.background="",n.style.overflow="hidden",k=g.style.overflow,g.style.overflow="hidden",g.appendChild(n)),i=c(l,a),m?l.parentNode.removeChild(l):(n.parentNode.removeChild(n),g.style.overflow=k),!!i},y={}.hasOwnProperty,z;!C(y,"undefined")&&!C(y.call,"undefined")?z=function(a,b){return y.call(a,b)}:z=function(a,b){return b in a&&C(a.constructor.prototype[b],"undefined")},Function.prototype.bind||(Function.prototype.bind=function(b){var c=this;if(typeof c!="function")throw new TypeError;var d=v.call(arguments,1),e=function(){if(this instanceof e){var a=function(){};a.prototype=c.prototype;var f=new a,g=c.apply(f,d.concat(v.call(arguments)));return Object(g)===g?g:f}return c.apply(b,d.concat(v.call(arguments)))};return e}),r.indexedDB=function(){return!!G("indexedDB",a)},r.borderradius=function(){return G("borderRadius")},r.boxshadow=function(){return G("boxShadow")},r.textshadow=function(){return b.createElement("div").style.textShadow===""},r.opacity=function(){return B("opacity:.55"),/^0.55$/.test(j.opacity)},r.cssanimations=function(){return G("animationName")},r.cssgradients=function(){var a="background-image:",b="gradient(linear,left top,right bottom,from(#9f9),to(white));",c="linear-gradient(left top,#9f9, white);";return A((a+"-webkit- ".split(" ").join(b+a)+n.join(c+a)).slice(0,-a.length)),D(j.backgroundImage,"gradient")},r.csstransitions=function(){return G("transition")},r.fontface=function(){var a;return x('@font-face {font-family:"font";src:url("https://")}',function(c,d){var e=b.getElementById("smodernizr"),f=e.sheet||e.styleSheet,g=f?f.cssRules&&f.cssRules[0]?f.cssRules[0].cssText:f.cssText||"":"";a=/src/i.test(g)&&g.indexOf(d.split(" ")[0])===0}),a},r.generatedcontent=function(){var a;return x(["#",h,"{font:0/0 a}#",h,':after{content:"',l,'";visibility:hidden;font:3px/1 a}'].join(""),function(b){a=b.offsetHeight>=3}),a};for(var I in r)z(r,I)&&(w=I.toLowerCase(),e[w]=r[I](),u.push((e[w]?"":"no-")+w));return e.input||H(),e.addTest=function(a,b){if(typeof a=="object")for(var d in a)z(a,d)&&e.addTest(d,a[d]);else{a=a.toLowerCase();if(e[a]!==c)return e;b=typeof b=="function"?b():b,typeof f!="undefined"&&f&&(g.className+=" "+(b?"":"no-")+a),e[a]=b}return e},A(""),i=k=null,function(a,b){function k(a,b){var c=a.createElement("p"),d=a.getElementsByTagName("head")[0]||a.documentElement;return c.innerHTML="x<style>"+b+"</style>",d.insertBefore(c.lastChild,d.firstChild)}function l(){var a=r.elements;return typeof a=="string"?a.split(" "):a}function m(a){var b=i[a[g]];return b||(b={},h++,a[g]=h,i[h]=b),b}function n(a,c,f){c||(c=b);if(j)return c.createElement(a);f||(f=m(c));var g;return f.cache[a]?g=f.cache[a].cloneNode():e.test(a)?g=(f.cache[a]=f.createElem(a)).cloneNode():g=f.createElem(a),g.canHaveChildren&&!d.test(a)?f.frag.appendChild(g):g}function o(a,c){a||(a=b);if(j)return a.createDocumentFragment();c=c||m(a);var d=c.frag.cloneNode(),e=0,f=l(),g=f.length;for(;e<g;e++)d.createElement(f[e]);return d}function p(a,b){b.cache||(b.cache={},b.createElem=a.createElement,b.createFrag=a.createDocumentFragment,b.frag=b.createFrag()),a.createElement=function(c){return r.shivMethods?n(c,a,b):b.createElem(c)},a.createDocumentFragment=Function("h,f","return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&("+l().join().replace(/\w+/g,function(a){return b.createElem(a),b.frag.createElement(a),'c("'+a+'")'})+");return n}")(r,b.frag)}function q(a){a||(a=b);var c=m(a);return r.shivCSS&&!f&&!c.hasCSS&&(c.hasCSS=!!k(a,"article,aside,figcaption,figure,footer,header,hgroup,nav,section{display:block}mark{background:#FF0;color:#000}")),j||p(a,c),a}var c=a.html5||{},d=/^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i,e=/^(?:a|b|code|div|fieldset|h1|h2|h3|h4|h5|h6|i|label|li|ol|p|q|span|strong|style|table|tbody|td|th|tr|ul)$/i,f,g="_html5shiv",h=0,i={},j;(function(){try{var a=b.createElement("a");a.innerHTML="<xyz></xyz>",f="hidden"in a,j=a.childNodes.length==1||function(){b.createElement("a");var a=b.createDocumentFragment();return typeof a.cloneNode=="undefined"||typeof a.createDocumentFragment=="undefined"||typeof a.createElement=="undefined"}()}catch(c){f=!0,j=!0}})();var r={elements:c.elements||"abbr article aside audio bdi canvas data datalist details figcaption figure footer header hgroup mark meter nav output progress section summary time video",shivCSS:c.shivCSS!==!1,supportsUnknownElements:j,shivMethods:c.shivMethods!==!1,type:"default",shivDocument:q,createElement:n,createDocumentFragment:o};a.html5=r,q(b)}(this,b),e._version=d,e._prefixes=n,e._domPrefixes=q,e._cssomPrefixes=p,e.testProp=function(a){return E([a])},e.testAllProps=G,e.testStyles=x,g.className=g.className.replace(/(^|\s)no-js(\s|$)/,"$1$2")+(f?" js "+u.join(" "):""),e}(this,this.document),function(a,b,c){function d(a){return"[object Function]"==o.call(a)}function e(a){return"string"==typeof a}function f(){}function g(a){return!a||"loaded"==a||"complete"==a||"uninitialized"==a}function h(){var a=p.shift();q=1,a?a.t?m(function(){("c"==a.t?B.injectCss:B.injectJs)(a.s,0,a.a,a.x,a.e,1)},0):(a(),h()):q=0}function i(a,c,d,e,f,i,j){function k(b){if(!o&&g(l.readyState)&&(u.r=o=1,!q&&h(),l.onload=l.onreadystatechange=null,b)){"img"!=a&&m(function(){t.removeChild(l)},50);for(var d in y[c])y[c].hasOwnProperty(d)&&y[c][d].onload()}}var j=j||B.errorTimeout,l=b.createElement(a),o=0,r=0,u={t:d,s:c,e:f,a:i,x:j};1===y[c]&&(r=1,y[c]=[]),"object"==a?l.data=c:(l.src=c,l.type=a),l.width=l.height="0",l.onerror=l.onload=l.onreadystatechange=function(){k.call(this,r)},p.splice(e,0,u),"img"!=a&&(r||2===y[c]?(t.insertBefore(l,s?null:n),m(k,j)):y[c].push(l))}function j(a,b,c,d,f){return q=0,b=b||"j",e(a)?i("c"==b?v:u,a,b,this.i++,c,d,f):(p.splice(this.i++,0,a),1==p.length&&h()),this}function k(){var a=B;return a.loader={load:j,i:0},a}var l=b.documentElement,m=a.setTimeout,n=b.getElementsByTagName("script")[0],o={}.toString,p=[],q=0,r="MozAppearance"in l.style,s=r&&!!b.createRange().compareNode,t=s?l:n.parentNode,l=a.opera&&"[object Opera]"==o.call(a.opera),l=!!b.attachEvent&&!l,u=r?"object":l?"script":"img",v=l?"script":u,w=Array.isArray||function(a){return"[object Array]"==o.call(a)},x=[],y={},z={timeout:function(a,b){return b.length&&(a.timeout=b[0]),a}},A,B;B=function(a){function b(a){var a=a.split("!"),b=x.length,c=a.pop(),d=a.length,c={url:c,origUrl:c,prefixes:a},e,f,g;for(f=0;f<d;f++)g=a[f].split("="),(e=z[g.shift()])&&(c=e(c,g));for(f=0;f<b;f++)c=x[f](c);return c}function g(a,e,f,g,h){var i=b(a),j=i.autoCallback;i.url.split(".").pop().split("?").shift(),i.bypass||(e&&(e=d(e)?e:e[a]||e[g]||e[a.split("/").pop().split("?")[0]]),i.instead?i.instead(a,e,f,g,h):(y[i.url]?i.noexec=!0:y[i.url]=1,f.load(i.url,i.forceCSS||!i.forceJS&&"css"==i.url.split(".").pop().split("?").shift()?"c":c,i.noexec,i.attrs,i.timeout),(d(e)||d(j))&&f.load(function(){k(),e&&e(i.origUrl,h,g),j&&j(i.origUrl,h,g),y[i.url]=2})))}function h(a,b){function c(a,c){if(a){if(e(a))c||(j=function(){var a=[].slice.call(arguments);k.apply(this,a),l()}),g(a,j,b,0,h);else if(Object(a)===a)for(n in m=function(){var b=0,c;for(c in a)a.hasOwnProperty(c)&&b++;return b}(),a)a.hasOwnProperty(n)&&(!c&&!--m&&(d(j)?j=function(){var a=[].slice.call(arguments);k.apply(this,a),l()}:j[n]=function(a){return function(){var b=[].slice.call(arguments);a&&a.apply(this,b),l()}}(k[n])),g(a[n],j,b,n,h))}else!c&&l()}var h=!!a.test,i=a.load||a.both,j=a.callback||f,k=j,l=a.complete||f,m,n;c(h?a.yep:a.nope,!!i),i&&c(i)}var i,j,l=this.yepnope.loader;if(e(a))g(a,0,l,0);else if(w(a))for(i=0;i<a.length;i++)j=a[i],e(j)?g(j,0,l,0):w(j)?B(j):Object(j)===j&&h(j,l);else Object(a)===a&&h(a,l)},B.addPrefix=function(a,b){z[a]=b},B.addFilter=function(a){x.push(a)},B.errorTimeout=1e4,null==b.readyState&&b.addEventListener&&(b.readyState="loading",b.addEventListener("DOMContentLoaded",A=function(){b.removeEventListener("DOMContentLoaded",A,0),b.readyState="complete"},0)),a.yepnope=k(),a.yepnope.executeStack=h,a.yepnope.injectJs=function(a,c,d,e,i,j){var k=b.createElement("script"),l,o,e=e||B.errorTimeout;k.src=a;for(o in d)k.setAttribute(o,d[o]);c=j?h:c||f,k.onreadystatechange=k.onload=function(){!l&&g(k.readyState)&&(l=1,c(),k.onload=k.onreadystatechange=null)},m(function(){l||(l=1,c(1))},e),i?k.onload():n.parentNode.insertBefore(k,n)},a.yepnope.injectCss=function(a,c,d,e,g,i){var e=b.createElement("link"),j,c=i?h:c||f;e.href=a,e.rel="stylesheet",e.type="text/css";for(j in d)e.setAttribute(j,d[j]);g||(n.parentNode.insertBefore(e,n),m(c,0))}}(this,document),Modernizr.load=function(){yepnope.apply(window,[].slice.call(arguments,0))};

/*---------------------- WayPoint ----------------------*/
// Generated by CoffeeScript 1.6.2
/*
jQuery Waypoints - v2.0.2
Copyright (c) 2011-2013 Caleb Troughton
Dual licensed under the MIT license and GPL license.
https://github.com/imakewebthings/jquery-waypoints/blob/master/licenses.txt
*/
(function(){var t=[].indexOf||function(t){for(var e=0,n=this.length;e<n;e++){if(e in this&&this[e]===t)return e}return-1},e=[].slice;(function(t,e){if(typeof define==="function"&&define.amd){return define("waypoints",["jquery"],function(n){return e(n,t)})}else{return e(t.jQuery,t)}})(this,function(n,r){var i,o,l,s,f,u,a,c,h,d,p,y,v,w,g,m;i=n(r);c=t.call(r,"ontouchstart")>=0;s={horizontal:{},vertical:{}};f=1;a={};u="waypoints-context-id";p="resize.waypoints";y="scroll.waypoints";v=1;w="waypoints-waypoint-ids";g="waypoint";m="waypoints";o=function(){function t(t){var e=this;this.$element=t;this.element=t[0];this.didResize=false;this.didScroll=false;this.id="context"+f++;this.oldScroll={x:t.scrollLeft(),y:t.scrollTop()};this.waypoints={horizontal:{},vertical:{}};t.data(u,this.id);a[this.id]=this;t.bind(y,function(){var t;if(!(e.didScroll||c)){e.didScroll=true;t=function(){e.doScroll();return e.didScroll=false};return r.setTimeout(t,n[m].settings.scrollThrottle)}});t.bind(p,function(){var t;if(!e.didResize){e.didResize=true;t=function(){n[m]("refresh");return e.didResize=false};return r.setTimeout(t,n[m].settings.resizeThrottle)}})}t.prototype.doScroll=function(){var t,e=this;t={horizontal:{newScroll:this.$element.scrollLeft(),oldScroll:this.oldScroll.x,forward:"right",backward:"left"},vertical:{newScroll:this.$element.scrollTop(),oldScroll:this.oldScroll.y,forward:"down",backward:"up"}};if(c&&(!t.vertical.oldScroll||!t.vertical.newScroll)){n[m]("refresh")}n.each(t,function(t,r){var i,o,l;l=[];o=r.newScroll>r.oldScroll;i=o?r.forward:r.backward;n.each(e.waypoints[t],function(t,e){var n,i;if(r.oldScroll<(n=e.offset)&&n<=r.newScroll){return l.push(e)}else if(r.newScroll<(i=e.offset)&&i<=r.oldScroll){return l.push(e)}});l.sort(function(t,e){return t.offset-e.offset});if(!o){l.reverse()}return n.each(l,function(t,e){if(e.options.continuous||t===l.length-1){return e.trigger([i])}})});return this.oldScroll={x:t.horizontal.newScroll,y:t.vertical.newScroll}};t.prototype.refresh=function(){var t,e,r,i=this;r=n.isWindow(this.element);e=this.$element.offset();this.doScroll();t={horizontal:{contextOffset:r?0:e.left,contextScroll:r?0:this.oldScroll.x,contextDimension:this.$element.width(),oldScroll:this.oldScroll.x,forward:"right",backward:"left",offsetProp:"left"},vertical:{contextOffset:r?0:e.top,contextScroll:r?0:this.oldScroll.y,contextDimension:r?n[m]("viewportHeight"):this.$element.height(),oldScroll:this.oldScroll.y,forward:"down",backward:"up",offsetProp:"top"}};return n.each(t,function(t,e){return n.each(i.waypoints[t],function(t,r){var i,o,l,s,f;i=r.options.offset;l=r.offset;o=n.isWindow(r.element)?0:r.$element.offset()[e.offsetProp];if(n.isFunction(i)){i=i.apply(r.element)}else if(typeof i==="string"){i=parseFloat(i);if(r.options.offset.indexOf("%")>-1){i=Math.ceil(e.contextDimension*i/100)}}r.offset=o-e.contextOffset+e.contextScroll-i;if(r.options.onlyOnScroll&&l!=null||!r.enabled){return}if(l!==null&&l<(s=e.oldScroll)&&s<=r.offset){return r.trigger([e.backward])}else if(l!==null&&l>(f=e.oldScroll)&&f>=r.offset){return r.trigger([e.forward])}else if(l===null&&e.oldScroll>=r.offset){return r.trigger([e.forward])}})})};t.prototype.checkEmpty=function(){if(n.isEmptyObject(this.waypoints.horizontal)&&n.isEmptyObject(this.waypoints.vertical)){this.$element.unbind([p,y].join(" "));return delete a[this.id]}};return t}();l=function(){function t(t,e,r){var i,o;r=n.extend({},n.fn[g].defaults,r);if(r.offset==="bottom-in-view"){r.offset=function(){var t;t=n[m]("viewportHeight");if(!n.isWindow(e.element)){t=e.$element.height()}return t-n(this).outerHeight()}}this.$element=t;this.element=t[0];this.axis=r.horizontal?"horizontal":"vertical";this.callback=r.handler;this.context=e;this.enabled=r.enabled;this.id="waypoints"+v++;this.offset=null;this.options=r;e.waypoints[this.axis][this.id]=this;s[this.axis][this.id]=this;i=(o=t.data(w))!=null?o:[];i.push(this.id);t.data(w,i)}t.prototype.trigger=function(t){if(!this.enabled){return}if(this.callback!=null){this.callback.apply(this.element,t)}if(this.options.triggerOnce){return this.destroy()}};t.prototype.disable=function(){return this.enabled=false};t.prototype.enable=function(){this.context.refresh();return this.enabled=true};t.prototype.destroy=function(){delete s[this.axis][this.id];delete this.context.waypoints[this.axis][this.id];return this.context.checkEmpty()};t.getWaypointsByElement=function(t){var e,r;r=n(t).data(w);if(!r){return[]}e=n.extend({},s.horizontal,s.vertical);return n.map(r,function(t){return e[t]})};return t}();d={init:function(t,e){var r;if(e==null){e={}}if((r=e.handler)==null){e.handler=t}this.each(function(){var t,r,i,s;t=n(this);i=(s=e.context)!=null?s:n.fn[g].defaults.context;if(!n.isWindow(i)){i=t.closest(i)}i=n(i);r=a[i.data(u)];if(!r){r=new o(i)}return new l(t,r,e)});n[m]("refresh");return this},disable:function(){return d._invoke(this,"disable")},enable:function(){return d._invoke(this,"enable")},destroy:function(){return d._invoke(this,"destroy")},prev:function(t,e){return d._traverse.call(this,t,e,function(t,e,n){if(e>0){return t.push(n[e-1])}})},next:function(t,e){return d._traverse.call(this,t,e,function(t,e,n){if(e<n.length-1){return t.push(n[e+1])}})},_traverse:function(t,e,i){var o,l;if(t==null){t="vertical"}if(e==null){e=r}l=h.aggregate(e);o=[];this.each(function(){var e;e=n.inArray(this,l[t]);return i(o,e,l[t])});return this.pushStack(o)},_invoke:function(t,e){t.each(function(){var t;t=l.getWaypointsByElement(this);return n.each(t,function(t,n){n[e]();return true})});return this}};n.fn[g]=function(){var t,r;r=arguments[0],t=2<=arguments.length?e.call(arguments,1):[];if(d[r]){return d[r].apply(this,t)}else if(n.isFunction(r)){return d.init.apply(this,arguments)}else if(n.isPlainObject(r)){return d.init.apply(this,[null,r])}else if(!r){return n.error("jQuery Waypoints needs a callback function or handler option.")}else{return n.error("The "+r+" method does not exist in jQuery Waypoints.")}};n.fn[g].defaults={context:r,continuous:true,enabled:true,horizontal:false,offset:0,triggerOnce:false};h={refresh:function(){return n.each(a,function(t,e){return e.refresh()})},viewportHeight:function(){var t;return(t=r.innerHeight)!=null?t:i.height()},aggregate:function(t){var e,r,i;e=s;if(t){e=(i=a[n(t).data(u)])!=null?i.waypoints:void 0}if(!e){return[]}r={horizontal:[],vertical:[]};n.each(r,function(t,i){n.each(e[t],function(t,e){return i.push(e)});i.sort(function(t,e){return t.offset-e.offset});r[t]=n.map(i,function(t){return t.element});return r[t]=n.unique(r[t])});return r},above:function(t){if(t==null){t=r}return h._filter(t,"vertical",function(t,e){return e.offset<=t.oldScroll.y})},below:function(t){if(t==null){t=r}return h._filter(t,"vertical",function(t,e){return e.offset>t.oldScroll.y})},left:function(t){if(t==null){t=r}return h._filter(t,"horizontal",function(t,e){return e.offset<=t.oldScroll.x})},right:function(t){if(t==null){t=r}return h._filter(t,"horizontal",function(t,e){return e.offset>t.oldScroll.x})},enable:function(){return h._invoke("enable")},disable:function(){return h._invoke("disable")},destroy:function(){return h._invoke("destroy")},extendFn:function(t,e){return d[t]=e},_invoke:function(t){var e;e=n.extend({},s.vertical,s.horizontal);return n.each(e,function(e,n){n[t]();return true})},_filter:function(t,e,r){var i,o;i=a[n(t).data(u)];if(!i){return[]}o=[];n.each(i.waypoints[e],function(t,e){if(r(i,e)){return o.push(e)}});o.sort(function(t,e){return t.offset-e.offset});return n.map(o,function(t){return t.element})}};n[m]=function(){var t,n;n=arguments[0],t=2<=arguments.length?e.call(arguments,1):[];if(h[n]){return h[n].apply(null,t)}else{return h.aggregate.call(null,n)}};n[m].settings={resizeThrottle:100,scrollThrottle:30};return i.load(function(){return n[m]("refresh")})})}).call(this);

/*---------------------- Hammer ----------------------*/
/*! Hammer.JS - v1.1.3 - 2014-05-20
 * http://eightmedia.github.io/hammer.js
 *
 * Copyright (c) 2014 Jorik Tangelder <j.tangelder@gmail.com>;
 * Licensed under the MIT license */
!function(a,b){"use strict";function c(){d.READY||(s.determineEventTypes(),r.each(d.gestures,function(a){u.register(a)}),s.onTouch(d.DOCUMENT,n,u.detect),s.onTouch(d.DOCUMENT,o,u.detect),d.READY=!0)}var d=function v(a,b){return new v.Instance(a,b||{})};d.VERSION="1.1.3",d.defaults={behavior:{userSelect:"none",touchAction:"pan-y",touchCallout:"none",contentZooming:"none",userDrag:"none",tapHighlightColor:"rgba(0,0,0,0)"}},d.DOCUMENT=document,d.HAS_POINTEREVENTS=navigator.pointerEnabled||navigator.msPointerEnabled,d.HAS_TOUCHEVENTS="ontouchstart"in a,d.IS_MOBILE=/mobile|tablet|ip(ad|hone|od)|android|silk/i.test(navigator.userAgent),d.NO_MOUSEEVENTS=d.HAS_TOUCHEVENTS&&d.IS_MOBILE||d.HAS_POINTEREVENTS,d.CALCULATE_INTERVAL=25;var e={},f=d.DIRECTION_DOWN="down",g=d.DIRECTION_LEFT="left",h=d.DIRECTION_UP="up",i=d.DIRECTION_RIGHT="right",j=d.POINTER_MOUSE="mouse",k=d.POINTER_TOUCH="touch",l=d.POINTER_PEN="pen",m=d.EVENT_START="start",n=d.EVENT_MOVE="move",o=d.EVENT_END="end",p=d.EVENT_RELEASE="release",q=d.EVENT_TOUCH="touch";d.READY=!1,d.plugins=d.plugins||{},d.gestures=d.gestures||{};var r=d.utils={extend:function(a,c,d){for(var e in c)!c.hasOwnProperty(e)||a[e]!==b&&d||(a[e]=c[e]);return a},on:function(a,b,c){a.addEventListener(b,c,!1)},off:function(a,b,c){a.removeEventListener(b,c,!1)},each:function(a,c,d){var e,f;if("forEach"in a)a.forEach(c,d);else if(a.length!==b){for(e=0,f=a.length;f>e;e++)if(c.call(d,a[e],e,a)===!1)return}else for(e in a)if(a.hasOwnProperty(e)&&c.call(d,a[e],e,a)===!1)return},inStr:function(a,b){return a.indexOf(b)>-1},inArray:function(a,b){if(a.indexOf){var c=a.indexOf(b);return-1===c?!1:c}for(var d=0,e=a.length;e>d;d++)if(a[d]===b)return d;return!1},toArray:function(a){return Array.prototype.slice.call(a,0)},hasParent:function(a,b){for(;a;){if(a==b)return!0;a=a.parentNode}return!1},getCenter:function(a){var b=[],c=[],d=[],e=[],f=Math.min,g=Math.max;return 1===a.length?{pageX:a[0].pageX,pageY:a[0].pageY,clientX:a[0].clientX,clientY:a[0].clientY}:(r.each(a,function(a){b.push(a.pageX),c.push(a.pageY),d.push(a.clientX),e.push(a.clientY)}),{pageX:(f.apply(Math,b)+g.apply(Math,b))/2,pageY:(f.apply(Math,c)+g.apply(Math,c))/2,clientX:(f.apply(Math,d)+g.apply(Math,d))/2,clientY:(f.apply(Math,e)+g.apply(Math,e))/2})},getVelocity:function(a,b,c){return{x:Math.abs(b/a)||0,y:Math.abs(c/a)||0}},getAngle:function(a,b){var c=b.clientX-a.clientX,d=b.clientY-a.clientY;return 180*Math.atan2(d,c)/Math.PI},getDirection:function(a,b){var c=Math.abs(a.clientX-b.clientX),d=Math.abs(a.clientY-b.clientY);return c>=d?a.clientX-b.clientX>0?g:i:a.clientY-b.clientY>0?h:f},getDistance:function(a,b){var c=b.clientX-a.clientX,d=b.clientY-a.clientY;return Math.sqrt(c*c+d*d)},getScale:function(a,b){return a.length>=2&&b.length>=2?this.getDistance(b[0],b[1])/this.getDistance(a[0],a[1]):1},getRotation:function(a,b){return a.length>=2&&b.length>=2?this.getAngle(b[1],b[0])-this.getAngle(a[1],a[0]):0},isVertical:function(a){return a==h||a==f},setPrefixedCss:function(a,b,c,d){var e=["","Webkit","Moz","O","ms"];b=r.toCamelCase(b);for(var f=0;f<e.length;f++){var g=b;if(e[f]&&(g=e[f]+g.slice(0,1).toUpperCase()+g.slice(1)),g in a.style){a.style[g]=(null==d||d)&&c||"";break}}},toggleBehavior:function(a,b,c){if(b&&a&&a.style){r.each(b,function(b,d){r.setPrefixedCss(a,d,b,c)});var d=c&&function(){return!1};"none"==b.userSelect&&(a.onselectstart=d),"none"==b.userDrag&&(a.ondragstart=d)}},toCamelCase:function(a){return a.replace(/[_-]([a-z])/g,function(a){return a[1].toUpperCase()})}},s=d.event={preventMouseEvents:!1,started:!1,shouldDetect:!1,on:function(a,b,c,d){var e=b.split(" ");r.each(e,function(b){r.on(a,b,c),d&&d(b)})},off:function(a,b,c,d){var e=b.split(" ");r.each(e,function(b){r.off(a,b,c),d&&d(b)})},onTouch:function(a,b,c){var f=this,g=function(e){var g,h=e.type.toLowerCase(),i=d.HAS_POINTEREVENTS,j=r.inStr(h,"mouse");j&&f.preventMouseEvents||(j&&b==m&&0===e.button?(f.preventMouseEvents=!1,f.shouldDetect=!0):i&&b==m?f.shouldDetect=1===e.buttons||t.matchType(k,e):j||b!=m||(f.preventMouseEvents=!0,f.shouldDetect=!0),i&&b!=o&&t.updatePointer(b,e),f.shouldDetect&&(g=f.doDetect.call(f,e,b,a,c)),g==o&&(f.preventMouseEvents=!1,f.shouldDetect=!1,t.reset()),i&&b==o&&t.updatePointer(b,e))};return this.on(a,e[b],g),g},doDetect:function(a,b,c,d){var e=this.getTouchList(a,b),f=e.length,g=b,h=e.trigger,i=f;b==m?h=q:b==o&&(h=p,i=e.length-(a.changedTouches?a.changedTouches.length:1)),i>0&&this.started&&(g=n),this.started=!0;var j=this.collectEventData(c,g,e,a);return b!=o&&d.call(u,j),h&&(j.changedLength=i,j.eventType=h,d.call(u,j),j.eventType=g,delete j.changedLength),g==o&&(d.call(u,j),this.started=!1),g},determineEventTypes:function(){var b;return b=d.HAS_POINTEREVENTS?a.PointerEvent?["pointerdown","pointermove","pointerup pointercancel lostpointercapture"]:["MSPointerDown","MSPointerMove","MSPointerUp MSPointerCancel MSLostPointerCapture"]:d.NO_MOUSEEVENTS?["touchstart","touchmove","touchend touchcancel"]:["touchstart mousedown","touchmove mousemove","touchend touchcancel mouseup"],e[m]=b[0],e[n]=b[1],e[o]=b[2],e},getTouchList:function(a,b){if(d.HAS_POINTEREVENTS)return t.getTouchList();if(a.touches){if(b==n)return a.touches;var c=[],e=[].concat(r.toArray(a.touches),r.toArray(a.changedTouches)),f=[];return r.each(e,function(a){r.inArray(c,a.identifier)===!1&&f.push(a),c.push(a.identifier)}),f}return a.identifier=1,[a]},collectEventData:function(a,b,c,d){var e=k;return r.inStr(d.type,"mouse")||t.matchType(j,d)?e=j:t.matchType(l,d)&&(e=l),{center:r.getCenter(c),timeStamp:Date.now(),target:d.target,touches:c,eventType:b,pointerType:e,srcEvent:d,preventDefault:function(){var a=this.srcEvent;a.preventManipulation&&a.preventManipulation(),a.preventDefault&&a.preventDefault()},stopPropagation:function(){this.srcEvent.stopPropagation()},stopDetect:function(){return u.stopDetect()}}}},t=d.PointerEvent={pointers:{},getTouchList:function(){var a=[];return r.each(this.pointers,function(b){a.push(b)}),a},updatePointer:function(a,b){a==o||a!=o&&1!==b.buttons?delete this.pointers[b.pointerId]:(b.identifier=b.pointerId,this.pointers[b.pointerId]=b)},matchType:function(a,b){if(!b.pointerType)return!1;var c=b.pointerType,d={};return d[j]=c===(b.MSPOINTER_TYPE_MOUSE||j),d[k]=c===(b.MSPOINTER_TYPE_TOUCH||k),d[l]=c===(b.MSPOINTER_TYPE_PEN||l),d[a]},reset:function(){this.pointers={}}},u=d.detection={gestures:[],current:null,previous:null,stopped:!1,startDetect:function(a,b){this.current||(this.stopped=!1,this.current={inst:a,startEvent:r.extend({},b),lastEvent:!1,lastCalcEvent:!1,futureCalcEvent:!1,lastCalcData:{},name:""},this.detect(b))},detect:function(a){if(this.current&&!this.stopped){a=this.extendEventData(a);var b=this.current.inst,c=b.options;return r.each(this.gestures,function(d){!this.stopped&&b.enabled&&c[d.name]&&d.handler.call(d,a,b)},this),this.current&&(this.current.lastEvent=a),a.eventType==o&&this.stopDetect(),a}},stopDetect:function(){this.previous=r.extend({},this.current),this.current=null,this.stopped=!0},getCalculatedData:function(a,b,c,e,f){var g=this.current,h=!1,i=g.lastCalcEvent,j=g.lastCalcData;i&&a.timeStamp-i.timeStamp>d.CALCULATE_INTERVAL&&(b=i.center,c=a.timeStamp-i.timeStamp,e=a.center.clientX-i.center.clientX,f=a.center.clientY-i.center.clientY,h=!0),(a.eventType==q||a.eventType==p)&&(g.futureCalcEvent=a),(!g.lastCalcEvent||h)&&(j.velocity=r.getVelocity(c,e,f),j.angle=r.getAngle(b,a.center),j.direction=r.getDirection(b,a.center),g.lastCalcEvent=g.futureCalcEvent||a,g.futureCalcEvent=a),a.velocityX=j.velocity.x,a.velocityY=j.velocity.y,a.interimAngle=j.angle,a.interimDirection=j.direction},extendEventData:function(a){var b=this.current,c=b.startEvent,d=b.lastEvent||c;(a.eventType==q||a.eventType==p)&&(c.touches=[],r.each(a.touches,function(a){c.touches.push({clientX:a.clientX,clientY:a.clientY})}));var e=a.timeStamp-c.timeStamp,f=a.center.clientX-c.center.clientX,g=a.center.clientY-c.center.clientY;return this.getCalculatedData(a,d.center,e,f,g),r.extend(a,{startEvent:c,deltaTime:e,deltaX:f,deltaY:g,distance:r.getDistance(c.center,a.center),angle:r.getAngle(c.center,a.center),direction:r.getDirection(c.center,a.center),scale:r.getScale(c.touches,a.touches),rotation:r.getRotation(c.touches,a.touches)}),a},register:function(a){var c=a.defaults||{};return c[a.name]===b&&(c[a.name]=!0),r.extend(d.defaults,c,!0),a.index=a.index||1e3,this.gestures.push(a),this.gestures.sort(function(a,b){return a.index<b.index?-1:a.index>b.index?1:0}),this.gestures}};d.Instance=function(a,b){var e=this;c(),this.element=a,this.enabled=!0,r.each(b,function(a,c){delete b[c],b[r.toCamelCase(c)]=a}),this.options=r.extend(r.extend({},d.defaults),b||{}),this.options.behavior&&r.toggleBehavior(this.element,this.options.behavior,!0),this.eventStartHandler=s.onTouch(a,m,function(a){e.enabled&&a.eventType==m?u.startDetect(e,a):a.eventType==q&&u.detect(a)}),this.eventHandlers=[]},d.Instance.prototype={on:function(a,b){var c=this;return s.on(c.element,a,b,function(a){c.eventHandlers.push({gesture:a,handler:b})}),c},off:function(a,b){var c=this;return s.off(c.element,a,b,function(a){var d=r.inArray({gesture:a,handler:b});d!==!1&&c.eventHandlers.splice(d,1)}),c},trigger:function(a,b){b||(b={});var c=d.DOCUMENT.createEvent("Event");c.initEvent(a,!0,!0),c.gesture=b;var e=this.element;return r.hasParent(b.target,e)&&(e=b.target),e.dispatchEvent(c),this},enable:function(a){return this.enabled=a,this},dispose:function(){var a,b;for(r.toggleBehavior(this.element,this.options.behavior,!1),a=-1;b=this.eventHandlers[++a];)r.off(this.element,b.gesture,b.handler);return this.eventHandlers=[],s.off(this.element,e[m],this.eventStartHandler),null}},function(a){function b(b,d){var e=u.current;if(!(d.options.dragMaxTouches>0&&b.touches.length>d.options.dragMaxTouches))switch(b.eventType){case m:c=!1;break;case n:if(b.distance<d.options.dragMinDistance&&e.name!=a)return;var j=e.startEvent.center;if(e.name!=a&&(e.name=a,d.options.dragDistanceCorrection&&b.distance>0)){var k=Math.abs(d.options.dragMinDistance/b.distance);j.pageX+=b.deltaX*k,j.pageY+=b.deltaY*k,j.clientX+=b.deltaX*k,j.clientY+=b.deltaY*k,b=u.extendEventData(b)}(e.lastEvent.dragLockToAxis||d.options.dragLockToAxis&&d.options.dragLockMinDistance<=b.distance)&&(b.dragLockToAxis=!0);var l=e.lastEvent.direction;b.dragLockToAxis&&l!==b.direction&&(b.direction=r.isVertical(l)?b.deltaY<0?h:f:b.deltaX<0?g:i),c||(d.trigger(a+"start",b),c=!0),d.trigger(a,b),d.trigger(a+b.direction,b);var q=r.isVertical(b.direction);(d.options.dragBlockVertical&&q||d.options.dragBlockHorizontal&&!q)&&b.preventDefault();break;case p:c&&b.changedLength<=d.options.dragMaxTouches&&(d.trigger(a+"end",b),c=!1);break;case o:c=!1}}var c=!1;d.gestures.Drag={name:a,index:50,handler:b,defaults:{dragMinDistance:10,dragDistanceCorrection:!0,dragMaxTouches:1,dragBlockHorizontal:!1,dragBlockVertical:!1,dragLockToAxis:!1,dragLockMinDistance:25}}}("drag"),d.gestures.Gesture={name:"gesture",index:1337,handler:function(a,b){b.trigger(this.name,a)}},function(a){function b(b,d){var e=d.options,f=u.current;switch(b.eventType){case m:clearTimeout(c),f.name=a,c=setTimeout(function(){f&&f.name==a&&d.trigger(a,b)},e.holdTimeout);break;case n:b.distance>e.holdThreshold&&clearTimeout(c);break;case p:clearTimeout(c)}}var c;d.gestures.Hold={name:a,index:10,defaults:{holdTimeout:500,holdThreshold:2},handler:b}}("hold"),d.gestures.Release={name:"release",index:1/0,handler:function(a,b){a.eventType==p&&b.trigger(this.name,a)}},d.gestures.Swipe={name:"swipe",index:40,defaults:{swipeMinTouches:1,swipeMaxTouches:1,swipeVelocityX:.6,swipeVelocityY:.6},handler:function(a,b){if(a.eventType==p){var c=a.touches.length,d=b.options;if(c<d.swipeMinTouches||c>d.swipeMaxTouches)return;(a.velocityX>d.swipeVelocityX||a.velocityY>d.swipeVelocityY)&&(b.trigger(this.name,a),b.trigger(this.name+a.direction,a))}}},function(a){function b(b,d){var e,f,g=d.options,h=u.current,i=u.previous;switch(b.eventType){case m:c=!1;break;case n:c=c||b.distance>g.tapMaxDistance;break;case o:!r.inStr(b.srcEvent.type,"cancel")&&b.deltaTime<g.tapMaxTime&&!c&&(e=i&&i.lastEvent&&b.timeStamp-i.lastEvent.timeStamp,f=!1,i&&i.name==a&&e&&e<g.doubleTapInterval&&b.distance<g.doubleTapDistance&&(d.trigger("doubletap",b),f=!0),(!f||g.tapAlways)&&(h.name=a,d.trigger(h.name,b)))}}var c=!1;d.gestures.Tap={name:a,index:100,handler:b,defaults:{tapMaxTime:250,tapMaxDistance:10,tapAlways:!0,doubleTapDistance:20,doubleTapInterval:300}}}("tap"),d.gestures.Touch={name:"touch",index:-1/0,defaults:{preventDefault:!1,preventMouse:!1},handler:function(a,b){return b.options.preventMouse&&a.pointerType==j?void a.stopDetect():(b.options.preventDefault&&a.preventDefault(),void(a.eventType==q&&b.trigger("touch",a)))}},function(a){function b(b,d){switch(b.eventType){case m:c=!1;break;case n:if(b.touches.length<2)return;var e=Math.abs(1-b.scale),f=Math.abs(b.rotation);if(e<d.options.transformMinScale&&f<d.options.transformMinRotation)return;u.current.name=a,c||(d.trigger(a+"start",b),c=!0),d.trigger(a,b),f>d.options.transformMinRotation&&d.trigger("rotate",b),e>d.options.transformMinScale&&(d.trigger("pinch",b),d.trigger("pinch"+(b.scale<1?"in":"out"),b));break;case p:c&&b.changedLength<2&&(d.trigger(a+"end",b),c=!1)}}var c=!1;d.gestures.Transform={name:a,index:45,defaults:{transformMinScale:.01,transformMinRotation:1},handler:b}}("transform"),"function"==typeof define&&define.amd?define(function(){return d}):"undefined"!=typeof module&&module.exports?module.exports=d:a.Hammer=d}(window);
/*# sourceMappingURL=hammer.min.map*/

/*---------------------- SideBarMenu ----------------------*/
/* This file is part of the Sonatra package.
 *
 * (c) FranÃ§ois Pluchino <francois.pluchino@sonatra.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code. 
/*global jQuery*/
/*global window*/
/*global navigator*/
/*global document*/
/*global CSSMatrix*/
/*global WebKitCSSMatrix*/
/*global MSCSSMatrix*/
/*global Hammer*/
/*global Sidebar*/

/**
 * @param {jQuery} $
 *
 * @typedef {Sidebar} Sidebar
 */
(function ($) {
    'use strict';

    /**
     * Check if is a mobile device.
     *
     * @returns {boolean}
     *
     * @private
     */
    function mobileCheck() {
        return Boolean(navigator.userAgent.match(/Android|iPhone|iPad|iPod|IEMobile|BlackBerry|Opera Mini/i));
    }

    /**
     * Binding actions of keyboard.
     *
     * @param {jQuery.Event|Event} event
     *
     * @typedef {Sidebar} Event.data The sidebar instance
     *
     * @private
     */
    function keyboardAction(event) {
        if (!event instanceof jQuery.Event || event.data.options.disabledKeyboard) {
            return;
        }

        var self = event.data,
            kbe = self.options.keyboardEvent;

        if (event.shiftKey === kbe.shiftKey
                && event.ctrlKey  === kbe.ctrlKey
                && event.altKey   === kbe.altKey
                && event.keyCode  === kbe.keyCode) {
            self.toggle(event);
        }
    }

    /**
     * Checks if the window width is wider than the minimum width defined in
     * options.
     *
     * @param {Sidebar} self The sidebar instance
     *
     * @returns {boolean}
     *
     * @private
     */
    function isOverMinWidth(self) {
        var scrollbarWidth = 'scrollbarWidth',
            isOver = false,
            $window = $(window),
            windowWidth = $window.innerWidth(),
            widthNoScroll,
            inner,
            outer;

        if ($('body').height() > $window.innerHeight()) {
            if (null === self.scrollbarWidth) {
                inner = document.createElement('div');
                outer = document.createElement('div');
                outer.style.visibility = 'hidden';
                outer.style.width = '100px';

                document.body.appendChild(outer);

                widthNoScroll = outer.offsetWidth;
                outer.style.overflow = 'scroll';
                inner.style.width = '100%';
                outer.appendChild(inner);

                self[scrollbarWidth] = widthNoScroll - inner.offsetWidth;

                outer.parentNode.removeChild(outer);
            }

            windowWidth += self[scrollbarWidth];
        }

        if (windowWidth >= self.options.minLockWidth) {
            isOver = true;
        }

        return isOver;
    }

    /**
     * Close the sidebar since external action.
     *
     * @param {Event} event The event
     *
     * @typedef {Sidebar} Event.data The sidebar instance
     *
     * @private
     */
    function closeExternal(event) {
        var self = event.data,
            $target = $(event.currentTarget.activeElement);

        if ((self.isLocked() && isOverMinWidth(self)) || $(event.target).parents('.' + self.options.classWrapper).size() > 0 || $target.parents('.' + self.options.classWrapper).size() > 0 || $target.hasClass('sidebar-swipe')) {
            return;
        }

        event.stopPropagation();
        event.preventDefault();

        if (isOverMinWidth(self)) {
            self.close();

        } else {
            self.forceClose();
        }
    }

    /**
     * Close the sidebar or reopen the locked sidebar on window resize event.
     *
     * @param {Event} event The event
     *
     * @typedef {Sidebar} Event.data The sidebar instance
     *
     * @private
     */
    function onResizeWindow(event) {
        var self = event.data;

        if (isOverMinWidth(self) && self.isLocked()) {
            self.forceOpen();

            return;
        }

        closeExternal(event);
    }

    /**
     * Get the sidebar wrapper position.
     *
     * @param {jQuery} $target
     *
     * @returns {number} The Y axis position
     *
     * @private
     */
    function getWrapperPosition($target) {
        var transformCss = $target.css('transform'),
            transform = {e: 0, f: 0},
            reMatrix,
            match;

        if (transformCss) {
            if ('function' === typeof CSSMatrix) {
                transform = new CSSMatrix(transformCss);

            } else if ('function' === typeof WebKitCSSMatrix) {
                transform = new WebKitCSSMatrix(transformCss);

            } else if ('function' === typeof MSCSSMatrix) {
                transform = new MSCSSMatrix(transformCss);

            } else {
                reMatrix = /matrix\(\s*-?\d+(?:\.\d+)?\s*,\s*-?\d+(?:\.\d+)?\s*,\s*-?\d+(?:\.\d+)?\s*,\s*-?\d+(?:\.\d+)?\s*,\s*(-?\d+(?:\.\d+)?)\s*,\s*(-?\d+(?:\.\d+)?)\s*\)/;
                match = transformCss.match(reMatrix);

                if (match) {
                    transform.e = parseInt(match[1], 10);
                    transform.f = parseInt(match[2], 10);
                }
            }
        }

        return transform.e;
    }

    /**
     * Cleans the hammer configuration on the wrapper element.
     *
     * @param {Sidebar} self The sidebar instance
     *
     * @private
     */
    function cleanHammer(self) {
        self.$wrapper.removeData('drap-start-position');
        self.$wrapper.css('-webkit-transition', '');
        self.$wrapper.css('transition', '');
        self.$wrapper.css('-webkit-transform', '');
        self.$wrapper.css('transform', '');
        self.$wrapper.removeClass(self.options.classOnDragging);
        delete self.dragStartPosition;
    }

    /**
     * Action of "on drag" hammer event.
     *
     * @param {Sidebar} self  The sidebar instance
     * @param {Event}   event The hammer event
     *
     * @private
     */
    function onDrag(self, event) {
        var dragStartPosition = 'dragStartPosition',
            horizontal;

        if (undefined !== self.hammerScroll) {
            self.hammerScroll.onDrag(event);
        }

        if ((Hammer.DIRECTION_LEFT !== event.gesture.direction && Hammer.DIRECTION_RIGHT !== event.gesture.direction)
                || (self.options.locked && isOverMinWidth(self))) {
            return;
        }

        if (undefined === self.dragStartPosition) {
            self[dragStartPosition] = getWrapperPosition(self.$wrapper);
        }

        horizontal = Math.round(self.dragStartPosition + event.gesture.deltaX);
        if ((Sidebar.POSITION_LEFT === self.getPosition() && horizontal > 0) || (Sidebar.POSITION_RIGHT === self.getPosition() && horizontal < 0)) {
            horizontal = 0;
        }

        self.$wrapper.addClass(self.options.classOnDragging);
        self.$wrapper.css('-webkit-transition', 'none');
        self.$wrapper.css('transition', 'none');
        self.$wrapper.css('-webkit-transform', 'translate3d(' + horizontal + 'px, 0px, 0px)');
        self.$wrapper.css('transform', 'translate3d(' + horizontal + 'px, 0px, 0px)');
    }

    /**
     * Action of "on drag end" hammer event.
     *
     * @param {Sidebar} self  The sidebar instance
     * @param {Event}   event The hammer event
     *
     * @private
     */
    function onDragEnd(self, event) {
        var closeGesture = Sidebar.POSITION_LEFT,
            openGesture = Sidebar.POSITION_RIGHT;

        if (undefined !== self.hammerScroll) {
            self.hammerScroll.onDragEnd(event);
        }

        cleanHammer(self);

        if (Math.abs(event.gesture.deltaX) <= (self.$wrapper.innerWidth() / 4)) {
            return;
        }

        if (Sidebar.POSITION_RIGHT === self.getPosition()) {
            closeGesture = Sidebar.POSITION_RIGHT;
            openGesture = Sidebar.POSITION_LEFT;
        }

        if (self.isOpen() && closeGesture === event.gesture.direction) {
            self.forceClose();

        } else if (openGesture === event.gesture.direction) {
            if (self.isOpen() && isOverMinWidth(self) && $.inArray(self.options.forceToggle, [true, 'always']) >= 0) {
                self.forceOpen();

            } else if (isOverMinWidth(self) && 'always' === self.options.forceToggle) {
                self.forceOpen();

            } else {
                self.open();
            }
        }
    }

    /**
     * Init the hammer instance.
     *
     * @param {Sidebar} self The sidebar instance
     *
     * @private
     */
    function initHammer(self) {
        if (!Hammer) {
            return;
        }

        var swipe = '$swipe',
            hammer = 'hammer',
            hammerScroll = 'hammerScroll';

        if ($.fn.hammerScroll) {
            self[hammerScroll] = $('.sidebar-scroller', self.$wrapper).hammerScroll({
                contentWrapperClass: 'sidebar-scroller-content',
                eventDelegated:      true,
                hammerStickyHeader:  self.options.sidebarStickyHeader,
                scrollbar:           self.options.hammerScrollbar,
                scrollbarInverse:    Sidebar.POSITION_RIGHT === self.options.position
            }).data('st.hammerscroll');
        }

        self[swipe] = $('<div id="sidebar-swipe' + self.guid + '" class="sidebar-swipe"></div>').appendTo(self.$element);
        self[swipe].on('mouseover', function (event) {
            event.stopPropagation();
            event.preventDefault();
        });

        self[hammer] = new Hammer(self.$element[0], {
            tap: false,
            transform: false,
            release: false,
            hold: false,
            swipe: false,
            drag_block_horizontal: true,
            drag_block_vertical: $.fn.hammerScroll,
            drag_lock_to_axis: false,
            drag_min_distance: 5
        })

            .on('drag', function (event) {
                onDrag(self, event);
            })
            .on('dragend', function (event) {
                onDragEnd(self, event);
            });
    }

    /**
     * Destroy the hammer configuration.
     *
     * @param {Sidebar} self The sidebar instance
     *
     * @private
     */
    function destroyHammer(self) {
        if (!Hammer) {
            return;
        }

        self.$swipe.off('mouseover');
        self.$element.remove(self.$swipe);
    }

    // SIDEBAR CLASS DEFINITION
    // ========================

    /**
     * @constructor
     *
     * @param {string|elements|object|jQuery} element
     * @param {object}                        options
     *
     * @this Sidebar
     */
    var Sidebar = function (element, options) {
        this.guid           = jQuery.guid;
        this.options        = $.extend({}, Sidebar.DEFAULTS, options);
        this.$element       = $(element);
        this.$toggle        = $('.' + this.options.classToggle, this.$element);
        this.$wrapper       = $('.' + this.options.classWrapper, this.$element);
        this.eventType      = mobileCheck() ? 'touchstart' : 'click';
        this.scrollbarWidth = null;
        this.hammer         = undefined;
        this.hammerScroll   = undefined;
        this.$swipe         = undefined;
        this.$element.attr('data-sidebar', 'true');

        var $findToggle;

        if (Sidebar.POSITION_RIGHT !== this.options.position) {
            this.options.position = Sidebar.POSITION_LEFT;

        } else {
            this.$element.addClass('sidebar-right');
        }

        if (this.$element.hasClass('sidebar-right')) {
            this.options.position = Sidebar.POSITION_RIGHT;
        }

        if (this.options.locked) {
            this.options.forceToggle = 'always';
            this.$element.css('-webkit-transition', 'none');
            this.$element.css('transition', 'none');
            this.$wrapper.css('-webkit-transition', 'none');
            this.$wrapper.css('transition', 'none');
            this.$element.addClass(this.options.classLocked);
            this.$element.addClass(this.options.classForceOpen);
            this.$wrapper.addClass(this.options.classOpen + '-init');
        }

        if (!mobileCheck() && this.options.openOnHover && null === this.options.toggleId) {
            this.$element.on('mouseover.st.sidebar' + this.guid, $.proxy(Sidebar.prototype.open, this));
            this.$element.on('mouseout.st.sidebar' + this.guid, $.proxy(Sidebar.prototype.close, this));
        }

        if (null !== this.options.toggleId) {
            $findToggle = $('#' + this.options.toggleId);

            if (1 === $findToggle.size()) {
                this.$toggle.remove();
                this.$toggle = $findToggle;
            }

        } else {
            this.$element.addClass('sidebar-togglable');
        }

        this.$toggle.on(this.eventType + '.st.sidebar' + this.guid, null, this, Sidebar.prototype.toggle);
        $(window).on('keyup.st.sidebar' + this.guid, null, this, keyboardAction);
        $(window).on('resize.st.sidebar' + this.guid, null, this, onResizeWindow);

        if (this.$wrapper.hasClass(this.options.classOpen + '-init')) {
            if (isOverMinWidth(this)) {
                this.$wrapper.addClass(this.options.classOpen);

            } else {
                this.$wrapper.removeClass(this.options.classOpen);
            }

            this.$wrapper.removeClass(this.options.classOpen + '-init');
        }

        if (this.$wrapper.hasClass(this.options.classOpen)) {
            $(document).on(this.eventType + '.st.sidebar' + this.guid, null, this, closeExternal);
        }

        if (this.options.sidebarStickyHeader && $.fn.stickyHeader && !$.fn.hammerScroll) {
            this.stickyHeader = $('.sidebar-scroller', this.$wrapper).stickyHeader().data('st.stickyheader');
        }

        initHammer(this);

        this.$element.css('-webkit-transition', '');
        this.$element.css('transition', '');
        this.$wrapper.css('-webkit-transition', '');
        this.$wrapper.css('transition', '');
        this.$wrapper.addClass('sidebar-ready');
    },
        old;

    /**
     * Defaults options.
     *
     * @type {object}
     */
    Sidebar.DEFAULTS = {
        classToggle:         'sidebar-toggle',
        classWrapper:        'sidebar-wrapper',
        classOpen:           'sidebar-open',
        classLocked:         'sidebar-locked',
        classForceOpen:      'sidebar-force-open',
        classOnDragging:     'sidebar-dragging',
        openOnHover:         false,
        forceToggle:         false,//false, true, 'always'
        locked:              false,
        position:            Sidebar.POSITION_LEFT,//left, right
        minLockWidth:        992,
        toggleId:            null,
        sidebarStickyHeader: false,
        hammerScrollbar:     true,
        disabledKeyboard:    false,
        keyboardEvent:       {
            ctrlKey:             true,
            shiftKey:            false,
            altKey:              true,
            keyCode:             'S'.charCodeAt(0)
        }
    };

    /**
     * Left position.
     *
     * @type {string}
     */
    Sidebar.POSITION_LEFT  = 'left';

    /**
     * Right position.
     *
     * @type {string}
     */
    Sidebar.POSITION_RIGHT = 'right';

    /**
     * Get sidebar position.
     *
     * @returns {string} The position (left or right)
     *
     * @this Sidebar
     */
    Sidebar.prototype.getPosition = function () {
        return this.options.position;
    };

    /**
     * Checks if sidebar is locked (always open).
     *
     * @returns {boolean}
     *
     * @this Sidebar
     */
    Sidebar.prototype.isLocked = function () {
        return this.options.locked;
    };

    /**
     * Checks if sidebar is locked (always open).
     *
     * @returns {boolean}
     *
     * @this Sidebar
     */
    Sidebar.prototype.isOpen = function () {
        return this.$wrapper.hasClass(this.options.classOpen);
    };

    /**
     * Checks if sidebar is fully opened.
     *
     * @return {boolean}
     *
     * @this Sidebar
     */
    Sidebar.prototype.isFullyOpened = function () {
        return this.$element.hasClass(this.options.classForceOpen);
    };

    /**
     * Force open the sidebar.
     *
     * @this Sidebar
     */
    Sidebar.prototype.forceOpen = function () {
        if (this.isOpen() && this.isFullyOpened()) {
            return;
        }

        this.$element.addClass(this.options.classForceOpen);
        this.open();
        this.$toggle.removeClass(this.options.classToggle + '-opened');
		//alert("sdsd");
    };

    /**
     * Force close the sidebar.
     *
     * @this Sidebar
     */
    Sidebar.prototype.forceClose = function () {
        if (!this.isOpen() || (this.isLocked() && isOverMinWidth(this))) {
            return;
        }

        this.$element.removeClass(this.options.classForceOpen);
        this.close();
    };

    /**
     * Open the sidebar.
     *
     * @this Sidebar
     */
    Sidebar.prototype.open = function () {
        if (this.isOpen()) {
            return;
        }

        $('[data-sidebar=true]').sidebar('forceClose');
        this.$wrapper.addClass(this.options.classOpen);
        this.$toggle.addClass(this.options.classToggle + '-opened');
		//console.log("hi");
		$('body').addClass('show_cbtn');
		var winWidth = $(window).width();
		var gap = winWidth - $('.sidebar-wrapper').width();
		$('.sidebar-swipe').css('width',gap);
        $(document).on(this.eventType + '.st.sidebar' + this.guid, null, this, closeExternal);
    };

    /**
     * Close open the sidebar.
     *
     * @this Sidebar
     */
    Sidebar.prototype.close = function () {
        if (!this.isOpen() || (this.isFullyOpened() && isOverMinWidth(this))) {
            return;
        }

        this.$wrapper.removeClass(this.options.classOpen);
        this.$toggle.removeClass(this.options.classToggle + '-opened');
		$('body').removeClass('show_cbtn');
		$('.sidebar-swipe').css('width','10px');
        $(document).off(this.eventType + '.st.sidebar' + this.guid, closeExternal);
    };

    /**
     * Toggle the sidebar ("close, "open", "force open").
     *
     * @param {jQuery.Event|Event} [event]
     *
     * @typedef {Sidebar} Event.data The sidebar instance
     *
     * @this Sidebar
     */
    Sidebar.prototype.toggle = function (event) {
        var self = (undefined !== event) ? event.data : this,
            $target,
            $parents;

        if (event) {
            $target = $(event.target);
            $parents = $target.parents('.' + self.options.classWrapper);
            event.stopPropagation();

            if ($target.hasClass(self.options.classToggle) || $target.parents('.' + self.options.classToggle).size() > 0) {
                event.preventDefault();
            }

            if ($parents.size() > 0 || $target.hasClass('sidebar-swipe')) {
                return;
            }
        }

        if (self.isOpen()) {
            if (self.isFullyOpened()) {
                self.forceClose();

            } else if (isOverMinWidth(self) && $.inArray(self.options.forceToggle, [true, 'always']) >= 0) {
                self.forceOpen();

            } else {
                self.close();
            }

        } else if (isOverMinWidth(self) && 'always' === self.options.forceToggle) {
            self.forceOpen();

        } else {
            self.open();
        }
    };

    /**
     * Destroy instance.
     *
     * @this Sidebar
     */
    Sidebar.prototype.destroy = function () {
        if (!mobileCheck()) {
            this.$element.off('mouseover.st.sidebar' + this.guid, $.proxy(Sidebar.prototype.open, this));
            this.$element.off('mouseout.st.sidebar' + this.guid, $.proxy(Sidebar.prototype.close, this));
        }

        $(document).off(this.eventType + '.st.sidebar' + this.guid, closeExternal);
        $(window).off('resize.st.sidebar' + this.guid, onResizeWindow);
        this.$toggle.off(this.eventType + '.st.sidebar' + this.guid, Sidebar.prototype.toggle);
        $(window).off('keyup.st.sidebar' + this.guid, keyboardAction);
        destroyHammer(this);

        if (undefined !== this.stickyHeader) {
            this.stickyHeader.destroy();
        }

        this.$element.removeData('st.sidebar');
    };


    // SIDEBAR PLUGIN DEFINITION
    // =========================

    function Plugin(option, value) {
        return this.each(function () {
            var $this   = $(this),
                data    = $this.data('st.sidebar'),
                options = typeof option === 'object' && option;

            if (!data && option === 'destroy') {
                return;
            }

            if (!data) {
                $this.data('st.sidebar', (data = new Sidebar(this, options)));
            }

            if (typeof option === 'string') {
                data[option](value);
            }
        });
    }

    old = $.fn.sidebar;

    $.fn.sidebar             = Plugin;
    $.fn.sidebar.Constructor = Sidebar;


    // SIDEBAR NO CONFLICT
    // ===================

    $.fn.sidebar.noConflict = function () {
        $.fn.sidebar = old;

        return this;
    };


    // SIDEBAR DATA-API
    // ================

    $(window).on('load', function () {
        $('[data-sidebar="true"]').each(function () {
            var $this = $(this);
            Plugin.call($this, $this.data());
        });
    });

}(jQuery));

/*---------------------- Owl ----------------------*/
/**
 * Owl Carousel v2.2.1
 * Copyright 2013-2017 David Deutsch
 * Licensed under  ()
 */
/**
 * Owl carousel, AutoRefresh Plugin, Lazy Plugin, AutoHeight Plugin, Video Plugin, Animate Plugin, Autoplay Plugin, Navigation Plugin, Hash Plugin, Support Plugin
 * @version 2.1.6
 * @author Bartosz Wojciechowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 * @todo Lazy Load Icon
 * @todo prevent animationend bubling
 * @todo itemsScaleUp
 * @todo Test Zepto
 * @todo stagePadding calculate wrong active classes
 */
;(function($, window, document, undefined) {

	/**
	 * Creates a carousel.
	 * @class The Owl Carousel.
	 * @public
	 * @param {HTMLElement|jQuery} element - The element to create the carousel for.
	 * @param {Object} [options] - The options
	 */
	function Owl(element, options) {

		/**
		 * Current settings for the carousel.
		 * @public
		 */
		this.settings = null;

		/**
		 * Current options set by the caller including defaults.
		 * @public
		 */
		this.options = $.extend({}, Owl.Defaults, options);

		/**
		 * Plugin element.
		 * @public
		 */
		this.$element = $(element);

		/**
		 * Proxied event handlers.
		 * @protected
		 */
		this._handlers = {};

		/**
		 * References to the running plugins of this carousel.
		 * @protected
		 */
		this._plugins = {};

		/**
		 * Currently suppressed events to prevent them from beeing retriggered.
		 * @protected
		 */
		this._supress = {};

		/**
		 * Absolute current position.
		 * @protected
		 */
		this._current = null;

		/**
		 * Animation speed in milliseconds.
		 * @protected
		 */
		this._speed = null;

		/**
		 * Coordinates of all items in pixel.
		 * @todo The name of this member is missleading.
		 * @protected
		 */
		this._coordinates = [];

		/**
		 * Current breakpoint.
		 * @todo Real media queries would be nice.
		 * @protected
		 */
		this._breakpoint = null;

		/**
		 * Current width of the plugin element.
		 */
		this._width = null;

		/**
		 * All real items.
		 * @protected
		 */
		this._items = [];

		/**
		 * All cloned items.
		 * @protected
		 */
		this._clones = [];

		/**
		 * Merge values of all items.
		 * @todo Maybe this could be part of a plugin.
		 * @protected
		 */
		this._mergers = [];

		/**
		 * Widths of all items.
		 */
		this._widths = [];

		/**
		 * Invalidated parts within the update process.
		 * @protected
		 */
		this._invalidated = {};

		/**
		 * Ordered list of workers for the update process.
		 * @protected
		 */
		this._pipe = [];

		/**
		 * Current state information for the drag operation.
		 * @todo #261
		 * @protected
		 */
		this._drag = {
			time: null,
			target: null,
			pointer: null,
			stage: {
				start: null,
				current: null
			},
			direction: null
		};

		/**
		 * Current state information and their tags.
		 * @type {Object}
		 * @protected
		 */
		this._states = {
			current: {},
			tags: {
				'initializing': [ 'busy' ],
				'animating': [ 'busy' ],
				'dragging': [ 'interacting' ]
			}
		};

		$.each([ 'onResize', 'onThrottledResize' ], $.proxy(function(i, handler) {
			this._handlers[handler] = $.proxy(this[handler], this);
		}, this));

		$.each(Owl.Plugins, $.proxy(function(key, plugin) {
			this._plugins[key.charAt(0).toLowerCase() + key.slice(1)]
				= new plugin(this);
		}, this));

		$.each(Owl.Workers, $.proxy(function(priority, worker) {
			this._pipe.push({
				'filter': worker.filter,
				'run': $.proxy(worker.run, this)
			});
		}, this));

		this.setup();
		this.initialize();
	}

	/**
	 * Default options for the carousel.
	 * @public
	 */
	Owl.Defaults = {
		items: 3,
		loop: false,
		center: false,
		rewind: false,

		mouseDrag: true,
		touchDrag: true,
		pullDrag: true,
		freeDrag: false,

		margin: 0,
		stagePadding: 0,

		merge: false,
		mergeFit: true,
		autoWidth: false,

		startPosition: 0,
		rtl: false,

		smartSpeed: 250,
		fluidSpeed: false,
		dragEndSpeed: false,

		responsive: {},
		responsiveRefreshRate: 200,
		responsiveBaseElement: window,

		fallbackEasing: 'swing',

		info: false,

		nestedItemSelector: false,
		itemElement: 'div',
		stageElement: 'div',

		refreshClass: 'owl-refresh',
		loadedClass: 'owl-loaded',
		loadingClass: 'owl-loading',
		rtlClass: 'owl-rtl',
		responsiveClass: 'owl-responsive',
		dragClass: 'owl-drag',
		itemClass: 'owl-item',
		stageClass: 'owl-stage',
		stageOuterClass: 'owl-stage-outer',
		grabClass: 'owl-grab'
	};

	/**
	 * Enumeration for width.
	 * @public
	 * @readonly
	 * @enum {String}
	 */
	Owl.Width = {
		Default: 'default',
		Inner: 'inner',
		Outer: 'outer'
	};

	/**
	 * Enumeration for types.
	 * @public
	 * @readonly
	 * @enum {String}
	 */
	Owl.Type = {
		Event: 'event',
		State: 'state'
	};

	/**
	 * Contains all registered plugins.
	 * @public
	 */
	Owl.Plugins = {};

	/**
	 * List of workers involved in the update process.
	 */
	Owl.Workers = [ {
		filter: [ 'width', 'settings' ],
		run: function() {
			this._width = this.$element.width();
		}
	}, {
		filter: [ 'width', 'items', 'settings' ],
		run: function(cache) {
			cache.current = this._items && this._items[this.relative(this._current)];
		}
	}, {
		filter: [ 'items', 'settings' ],
		run: function() {
			this.$stage.children('.cloned').remove();
		}
	}, {
		filter: [ 'width', 'items', 'settings' ],
		run: function(cache) {
			var margin = this.settings.margin || '',
				grid = !this.settings.autoWidth,
				rtl = this.settings.rtl,
				css = {
					'width': 'auto',
					'margin-left': rtl ? margin : '',
					'margin-right': rtl ? '' : margin
				};

			!grid && this.$stage.children().css(css);

			cache.css = css;
		}
	}, {
		filter: [ 'width', 'items', 'settings' ],
		run: function(cache) {
			var width = (this.width() / this.settings.items).toFixed(3) - this.settings.margin,
				merge = null,
				iterator = this._items.length,
				grid = !this.settings.autoWidth,
				widths = [];

			cache.items = {
				merge: false,
				width: width
			};

			while (iterator--) {
				merge = this._mergers[iterator];
				merge = this.settings.mergeFit && Math.min(merge, this.settings.items) || merge;

				cache.items.merge = merge > 1 || cache.items.merge;

				widths[iterator] = !grid ? this._items[iterator].width() : width * merge;
			}

			this._widths = widths;
		}
	}, {
		filter: [ 'items', 'settings' ],
		run: function() {
			var clones = [],
				items = this._items,
				settings = this.settings,
				// TODO: Should be computed from number of min width items in stage
				view = Math.max(settings.items * 2, 4),
				size = Math.ceil(items.length / 2) * 2,
				repeat = settings.loop && items.length ? settings.rewind ? view : Math.max(view, size) : 0,
				append = '',
				prepend = '';

			repeat /= 2;

			while (repeat--) {
				// Switch to only using appended clones
				clones.push(this.normalize(clones.length / 2, true));
				append = append + items[clones[clones.length - 1]][0].outerHTML;
				clones.push(this.normalize(items.length - 1 - (clones.length - 1) / 2, true));
				prepend = items[clones[clones.length - 1]][0].outerHTML + prepend;
			}

			this._clones = clones;

			$(append).addClass('cloned').appendTo(this.$stage);
			$(prepend).addClass('cloned').prependTo(this.$stage);
		}
	}, {
		filter: [ 'width', 'items', 'settings' ],
		run: function() {
			var rtl = this.settings.rtl ? 1 : -1,
				size = this._clones.length + this._items.length,
				iterator = -1,
				previous = 0,
				current = 0,
				coordinates = [];

			while (++iterator < size) {
				previous = coordinates[iterator - 1] || 0;
				current = this._widths[this.relative(iterator)] + this.settings.margin;
				coordinates.push(previous + current * rtl);
			}

			this._coordinates = coordinates;
		}
	}, {
		filter: [ 'width', 'items', 'settings' ],
		run: function() {
			var padding = this.settings.stagePadding,
				coordinates = this._coordinates,
				css = {
					'width': Math.ceil(Math.abs(coordinates[coordinates.length - 1])) + padding * 2,
					'padding-left': padding || '',
					'padding-right': padding || ''
				};

			this.$stage.css(css);
		}
	}, {
		filter: [ 'width', 'items', 'settings' ],
		run: function(cache) {
			var iterator = this._coordinates.length,
				grid = !this.settings.autoWidth,
				items = this.$stage.children();

			if (grid && cache.items.merge) {
				while (iterator--) {
					cache.css.width = this._widths[this.relative(iterator)];
					items.eq(iterator).css(cache.css);
				}
			} else if (grid) {
				cache.css.width = cache.items.width;
				items.css(cache.css);
			}
		}
	}, {
		filter: [ 'items' ],
		run: function() {
			this._coordinates.length < 1 && this.$stage.removeAttr('style');
		}
	}, {
		filter: [ 'width', 'items', 'settings' ],
		run: function(cache) {
			cache.current = cache.current ? this.$stage.children().index(cache.current) : 0;
			cache.current = Math.max(this.minimum(), Math.min(this.maximum(), cache.current));
			this.reset(cache.current);
		}
	}, {
		filter: [ 'position' ],
		run: function() {
			this.animate(this.coordinates(this._current));
		}
	}, {
		filter: [ 'width', 'position', 'items', 'settings' ],
		run: function() {
			var rtl = this.settings.rtl ? 1 : -1,
				padding = this.settings.stagePadding * 2,
				begin = this.coordinates(this.current()) + padding,
				end = begin + this.width() * rtl,
				inner, outer, matches = [], i, n;

			for (i = 0, n = this._coordinates.length; i < n; i++) {
				inner = this._coordinates[i - 1] || 0;
				outer = Math.abs(this._coordinates[i]) + padding * rtl;

				if ((this.op(inner, '<=', begin) && (this.op(inner, '>', end)))
					|| (this.op(outer, '<', begin) && this.op(outer, '>', end))) {
					matches.push(i);
				}
			}

			this.$stage.children('.active').removeClass('active');
			this.$stage.children(':eq(' + matches.join('), :eq(') + ')').addClass('active');

			if (this.settings.center) {
				this.$stage.children('.center').removeClass('center');
				this.$stage.children().eq(this.current()).addClass('center');
			}
		}
	} ];

	/**
	 * Initializes the carousel.
	 * @protected
	 */
	Owl.prototype.initialize = function() {
		this.enter('initializing');
		this.trigger('initialize');

		this.$element.toggleClass(this.settings.rtlClass, this.settings.rtl);

		if (this.settings.autoWidth && !this.is('pre-loading')) {
			var imgs, nestedSelector, width;
			imgs = this.$element.find('img');
			nestedSelector = this.settings.nestedItemSelector ? '.' + this.settings.nestedItemSelector : undefined;
			width = this.$element.children(nestedSelector).width();

			if (imgs.length && width <= 0) {
				this.preloadAutoWidthImages(imgs);
			}
		}

		this.$element.addClass(this.options.loadingClass);

		// create stage
		this.$stage = $('<' + this.settings.stageElement + ' class="' + this.settings.stageClass + '"/>')
			.wrap('<div class="' + this.settings.stageOuterClass + '"/>');

		// append stage
		this.$element.append(this.$stage.parent());

		// append content
		this.replace(this.$element.children().not(this.$stage.parent()));

		// check visibility
		if (this.$element.is(':visible')) {
			// update view
			this.refresh();
		} else {
			// invalidate width
			this.invalidate('width');
		}

		this.$element
			.removeClass(this.options.loadingClass)
			.addClass(this.options.loadedClass);

		// register event handlers
		this.registerEventHandlers();

		this.leave('initializing');
		this.trigger('initialized');
	};

	/**
	 * Setups the current settings.
	 * @todo Remove responsive classes. Why should adaptive designs be brought into IE8?
	 * @todo Support for media queries by using `matchMedia` would be nice.
	 * @public
	 */
	Owl.prototype.setup = function() {
		var viewport = this.viewport(),
			overwrites = this.options.responsive,
			match = -1,
			settings = null;

		if (!overwrites) {
			settings = $.extend({}, this.options);
		} else {
			$.each(overwrites, function(breakpoint) {
				if (breakpoint <= viewport && breakpoint > match) {
					match = Number(breakpoint);
				}
			});

			settings = $.extend({}, this.options, overwrites[match]);
			if (typeof settings.stagePadding === 'function') {
				settings.stagePadding = settings.stagePadding();
			}
			delete settings.responsive;

			// responsive class
			if (settings.responsiveClass) {
				this.$element.attr('class',
					this.$element.attr('class').replace(new RegExp('(' + this.options.responsiveClass + '-)\\S+\\s', 'g'), '$1' + match)
				);
			}
		}

		this.trigger('change', { property: { name: 'settings', value: settings } });
		this._breakpoint = match;
		this.settings = settings;
		this.invalidate('settings');
		this.trigger('changed', { property: { name: 'settings', value: this.settings } });
	};

	/**
	 * Updates option logic if necessery.
	 * @protected
	 */
	Owl.prototype.optionsLogic = function() {
		if (this.settings.autoWidth) {
			this.settings.stagePadding = false;
			this.settings.merge = false;
		}
	};

	/**
	 * Prepares an item before add.
	 * @todo Rename event parameter `content` to `item`.
	 * @protected
	 * @returns {jQuery|HTMLElement} - The item container.
	 */
	Owl.prototype.prepare = function(item) {
		var event = this.trigger('prepare', { content: item });

		if (!event.data) {
			event.data = $('<' + this.settings.itemElement + '/>')
				.addClass(this.options.itemClass).append(item)
		}

		this.trigger('prepared', { content: event.data });

		return event.data;
	};

	/**
	 * Updates the view.
	 * @public
	 */
	Owl.prototype.update = function() {
		var i = 0,
			n = this._pipe.length,
			filter = $.proxy(function(p) { return this[p] }, this._invalidated),
			cache = {};

		while (i < n) {
			if (this._invalidated.all || $.grep(this._pipe[i].filter, filter).length > 0) {
				this._pipe[i].run(cache);
			}
			i++;
		}

		this._invalidated = {};

		!this.is('valid') && this.enter('valid');
	};

	/**
	 * Gets the width of the view.
	 * @public
	 * @param {Owl.Width} [dimension=Owl.Width.Default] - The dimension to return.
	 * @returns {Number} - The width of the view in pixel.
	 */
	Owl.prototype.width = function(dimension) {
		dimension = dimension || Owl.Width.Default;
		switch (dimension) {
			case Owl.Width.Inner:
			case Owl.Width.Outer:
				return this._width;
			default:
				return this._width - this.settings.stagePadding * 2 + this.settings.margin;
		}
	};

	/**
	 * Refreshes the carousel primarily for adaptive purposes.
	 * @public
	 */
	Owl.prototype.refresh = function() {
		this.enter('refreshing');
		this.trigger('refresh');

		this.setup();

		this.optionsLogic();

		this.$element.addClass(this.options.refreshClass);

		this.update();

		this.$element.removeClass(this.options.refreshClass);

		this.leave('refreshing');
		this.trigger('refreshed');
	};

	/**
	 * Checks window `resize` event.
	 * @protected
	 */
	Owl.prototype.onThrottledResize = function() {
		window.clearTimeout(this.resizeTimer);
		this.resizeTimer = window.setTimeout(this._handlers.onResize, this.settings.responsiveRefreshRate);
	};

	/**
	 * Checks window `resize` event.
	 * @protected
	 */
	Owl.prototype.onResize = function() {
		if (!this._items.length) {
			return false;
		}

		if (this._width === this.$element.width()) {
			return false;
		}

		if (!this.$element.is(':visible')) {
			return false;
		}

		this.enter('resizing');

		if (this.trigger('resize').isDefaultPrevented()) {
			this.leave('resizing');
			return false;
		}

		this.invalidate('width');

		this.refresh();

		this.leave('resizing');
		this.trigger('resized');
	};

	/**
	 * Registers event handlers.
	 * @todo Check `msPointerEnabled`
	 * @todo #261
	 * @protected
	 */
	Owl.prototype.registerEventHandlers = function() {
		if ($.support.transition) {
			this.$stage.on($.support.transition.end + '.owl.core', $.proxy(this.onTransitionEnd, this));
		}

		if (this.settings.responsive !== false) {
			this.on(window, 'resize', this._handlers.onThrottledResize);
		}

		if (this.settings.mouseDrag) {
			this.$element.addClass(this.options.dragClass);
			this.$stage.on('mousedown.owl.core', $.proxy(this.onDragStart, this));
			this.$stage.on('dragstart.owl.core selectstart.owl.core', function() { return false });
		}

		if (this.settings.touchDrag){
			this.$stage.on('touchstart.owl.core', $.proxy(this.onDragStart, this));
			this.$stage.on('touchcancel.owl.core', $.proxy(this.onDragEnd, this));
		}
	};

	/**
	 * Handles `touchstart` and `mousedown` events.
	 * @todo Horizontal swipe threshold as option
	 * @todo #261
	 * @protected
	 * @param {Event} event - The event arguments.
	 */
	Owl.prototype.onDragStart = function(event) {
		var stage = null;

		if (event.which === 3) {
			return;
		}

		if ($.support.transform) {
			stage = this.$stage.css('transform').replace(/.*\(|\)| /g, '').split(',');
			stage = {
				x: stage[stage.length === 16 ? 12 : 4],
				y: stage[stage.length === 16 ? 13 : 5]
			};
		} else {
			stage = this.$stage.position();
			stage = {
				x: this.settings.rtl ?
					stage.left + this.$stage.width() - this.width() + this.settings.margin :
					stage.left,
				y: stage.top
			};
		}

		if (this.is('animating')) {
			$.support.transform ? this.animate(stage.x) : this.$stage.stop()
			this.invalidate('position');
		}

		this.$element.toggleClass(this.options.grabClass, event.type === 'mousedown');

		this.speed(0);

		this._drag.time = new Date().getTime();
		this._drag.target = $(event.target);
		this._drag.stage.start = stage;
		this._drag.stage.current = stage;
		this._drag.pointer = this.pointer(event);

		$(document).on('mouseup.owl.core touchend.owl.core', $.proxy(this.onDragEnd, this));

		$(document).one('mousemove.owl.core touchmove.owl.core', $.proxy(function(event) {
			var delta = this.difference(this._drag.pointer, this.pointer(event));

			$(document).on('mousemove.owl.core touchmove.owl.core', $.proxy(this.onDragMove, this));

			if (Math.abs(delta.x) < Math.abs(delta.y) && this.is('valid')) {
				return;
			}

			event.preventDefault();

			this.enter('dragging');
			this.trigger('drag');
		}, this));
	};

	/**
	 * Handles the `touchmove` and `mousemove` events.
	 * @todo #261
	 * @protected
	 * @param {Event} event - The event arguments.
	 */
	Owl.prototype.onDragMove = function(event) {
		var minimum = null,
			maximum = null,
			pull = null,
			delta = this.difference(this._drag.pointer, this.pointer(event)),
			stage = this.difference(this._drag.stage.start, delta);

		if (!this.is('dragging')) {
			return;
		}

		event.preventDefault();

		if (this.settings.loop) {
			minimum = this.coordinates(this.minimum());
			maximum = this.coordinates(this.maximum() + 1) - minimum;
			stage.x = (((stage.x - minimum) % maximum + maximum) % maximum) + minimum;
		} else {
			minimum = this.settings.rtl ? this.coordinates(this.maximum()) : this.coordinates(this.minimum());
			maximum = this.settings.rtl ? this.coordinates(this.minimum()) : this.coordinates(this.maximum());
			pull = this.settings.pullDrag ? -1 * delta.x / 5 : 0;
			stage.x = Math.max(Math.min(stage.x, minimum + pull), maximum + pull);
		}

		this._drag.stage.current = stage;

		this.animate(stage.x);
	};

	/**
	 * Handles the `touchend` and `mouseup` events.
	 * @todo #261
	 * @todo Threshold for click event
	 * @protected
	 * @param {Event} event - The event arguments.
	 */
	Owl.prototype.onDragEnd = function(event) {
		var delta = this.difference(this._drag.pointer, this.pointer(event)),
			stage = this._drag.stage.current,
			direction = delta.x > 0 ^ this.settings.rtl ? 'left' : 'right';

		$(document).off('.owl.core');

		this.$element.removeClass(this.options.grabClass);

		if (delta.x !== 0 && this.is('dragging') || !this.is('valid')) {
			this.speed(this.settings.dragEndSpeed || this.settings.smartSpeed);
			this.current(this.closest(stage.x, delta.x !== 0 ? direction : this._drag.direction));
			this.invalidate('position');
			this.update();

			this._drag.direction = direction;

			if (Math.abs(delta.x) > 3 || new Date().getTime() - this._drag.time > 300) {
				this._drag.target.one('click.owl.core', function() { return false; });
			}
		}

		if (!this.is('dragging')) {
			return;
		}

		this.leave('dragging');
		this.trigger('dragged');
	};

	/**
	 * Gets absolute position of the closest item for a coordinate.
	 * @todo Setting `freeDrag` makes `closest` not reusable. See #165.
	 * @protected
	 * @param {Number} coordinate - The coordinate in pixel.
	 * @param {String} direction - The direction to check for the closest item. Ether `left` or `right`.
	 * @return {Number} - The absolute position of the closest item.
	 */
	Owl.prototype.closest = function(coordinate, direction) {
		var position = -1,
			pull = 30,
			width = this.width(),
			coordinates = this.coordinates();

		if (!this.settings.freeDrag) {
			// check closest item
			$.each(coordinates, $.proxy(function(index, value) {
				// on a left pull, check on current index
				if (direction === 'left' && coordinate > value - pull && coordinate < value + pull) {
					position = index;
				// on a right pull, check on previous index
				// to do so, subtract width from value and set position = index + 1
				} else if (direction === 'right' && coordinate > value - width - pull && coordinate < value - width + pull) {
					position = index + 1;
				} else if (this.op(coordinate, '<', value)
					&& this.op(coordinate, '>', coordinates[index + 1] || value - width)) {
					position = direction === 'left' ? index + 1 : index;
				}
				return position === -1;
			}, this));
		}

		if (!this.settings.loop) {
			// non loop boundries
			if (this.op(coordinate, '>', coordinates[this.minimum()])) {
				position = coordinate = this.minimum();
			} else if (this.op(coordinate, '<', coordinates[this.maximum()])) {
				position = coordinate = this.maximum();
			}
		}

		return position;
	};

	/**
	 * Animates the stage.
	 * @todo #270
	 * @public
	 * @param {Number} coordinate - The coordinate in pixels.
	 */
	Owl.prototype.animate = function(coordinate) {
		var animate = this.speed() > 0;

		this.is('animating') && this.onTransitionEnd();

		if (animate) {
			this.enter('animating');
			this.trigger('translate');
		}

		if ($.support.transform3d && $.support.transition) {
			this.$stage.css({
				transform: 'translate3d(' + coordinate + 'px,0px,0px)',
				transition: (this.speed() / 1000) + 's'
			});
		} else if (animate) {
			this.$stage.animate({
				left: coordinate + 'px'
			}, this.speed(), this.settings.fallbackEasing, $.proxy(this.onTransitionEnd, this));
		} else {
			this.$stage.css({
				left: coordinate + 'px'
			});
		}
	};

	/**
	 * Checks whether the carousel is in a specific state or not.
	 * @param {String} state - The state to check.
	 * @returns {Boolean} - The flag which indicates if the carousel is busy.
	 */
	Owl.prototype.is = function(state) {
		return this._states.current[state] && this._states.current[state] > 0;
	};

	/**
	 * Sets the absolute position of the current item.
	 * @public
	 * @param {Number} [position] - The new absolute position or nothing to leave it unchanged.
	 * @returns {Number} - The absolute position of the current item.
	 */
	Owl.prototype.current = function(position) {
		if (position === undefined) {
			return this._current;
		}

		if (this._items.length === 0) {
			return undefined;
		}

		position = this.normalize(position);

		if (this._current !== position) {
			var event = this.trigger('change', { property: { name: 'position', value: position } });

			if (event.data !== undefined) {
				position = this.normalize(event.data);
			}

			this._current = position;

			this.invalidate('position');

			this.trigger('changed', { property: { name: 'position', value: this._current } });
		}

		return this._current;
	};

	/**
	 * Invalidates the given part of the update routine.
	 * @param {String} [part] - The part to invalidate.
	 * @returns {Array.<String>} - The invalidated parts.
	 */
	Owl.prototype.invalidate = function(part) {
		if ($.type(part) === 'string') {
			this._invalidated[part] = true;
			this.is('valid') && this.leave('valid');
		}
		return $.map(this._invalidated, function(v, i) { return i });
	};

	/**
	 * Resets the absolute position of the current item.
	 * @public
	 * @param {Number} position - The absolute position of the new item.
	 */
	Owl.prototype.reset = function(position) {
		position = this.normalize(position);

		if (position === undefined) {
			return;
		}

		this._speed = 0;
		this._current = position;

		this.suppress([ 'translate', 'translated' ]);

		this.animate(this.coordinates(position));

		this.release([ 'translate', 'translated' ]);
	};

	/**
	 * Normalizes an absolute or a relative position of an item.
	 * @public
	 * @param {Number} position - The absolute or relative position to normalize.
	 * @param {Boolean} [relative=false] - Whether the given position is relative or not.
	 * @returns {Number} - The normalized position.
	 */
	Owl.prototype.normalize = function(position, relative) {
		var n = this._items.length,
			m = relative ? 0 : this._clones.length;

		if (!this.isNumeric(position) || n < 1) {
			position = undefined;
		} else if (position < 0 || position >= n + m) {
			position = ((position - m / 2) % n + n) % n + m / 2;
		}

		return position;
	};

	/**
	 * Converts an absolute position of an item into a relative one.
	 * @public
	 * @param {Number} position - The absolute position to convert.
	 * @returns {Number} - The converted position.
	 */
	Owl.prototype.relative = function(position) {
		position -= this._clones.length / 2;
		return this.normalize(position, true);
	};

	/**
	 * Gets the maximum position for the current item.
	 * @public
	 * @param {Boolean} [relative=false] - Whether to return an absolute position or a relative position.
	 * @returns {Number}
	 */
	Owl.prototype.maximum = function(relative) {
		var settings = this.settings,
			maximum = this._coordinates.length,
			iterator,
			reciprocalItemsWidth,
			elementWidth;

		if (settings.loop) {
			maximum = this._clones.length / 2 + this._items.length - 1;
		} else if (settings.autoWidth || settings.merge) {
			iterator = this._items.length;
			reciprocalItemsWidth = this._items[--iterator].width();
			elementWidth = this.$element.width();
			while (iterator--) {
				reciprocalItemsWidth += this._items[iterator].width() + this.settings.margin;
				if (reciprocalItemsWidth > elementWidth) {
					break;
				}
			}
			maximum = iterator + 1;
		} else if (settings.center) {
			maximum = this._items.length - 1;
		} else {
			maximum = this._items.length - settings.items;
		}

		if (relative) {
			maximum -= this._clones.length / 2;
		}

		return Math.max(maximum, 0);
	};

	/**
	 * Gets the minimum position for the current item.
	 * @public
	 * @param {Boolean} [relative=false] - Whether to return an absolute position or a relative position.
	 * @returns {Number}
	 */
	Owl.prototype.minimum = function(relative) {
		return relative ? 0 : this._clones.length / 2;
	};

	/**
	 * Gets an item at the specified relative position.
	 * @public
	 * @param {Number} [position] - The relative position of the item.
	 * @return {jQuery|Array.<jQuery>} - The item at the given position or all items if no position was given.
	 */
	Owl.prototype.items = function(position) {
		if (position === undefined) {
			return this._items.slice();
		}

		position = this.normalize(position, true);
		return this._items[position];
	};

	/**
	 * Gets an item at the specified relative position.
	 * @public
	 * @param {Number} [position] - The relative position of the item.
	 * @return {jQuery|Array.<jQuery>} - The item at the given position or all items if no position was given.
	 */
	Owl.prototype.mergers = function(position) {
		if (position === undefined) {
			return this._mergers.slice();
		}

		position = this.normalize(position, true);
		return this._mergers[position];
	};

	/**
	 * Gets the absolute positions of clones for an item.
	 * @public
	 * @param {Number} [position] - The relative position of the item.
	 * @returns {Array.<Number>} - The absolute positions of clones for the item or all if no position was given.
	 */
	Owl.prototype.clones = function(position) {
		var odd = this._clones.length / 2,
			even = odd + this._items.length,
			map = function(index) { return index % 2 === 0 ? even + index / 2 : odd - (index + 1) / 2 };

		if (position === undefined) {
			return $.map(this._clones, function(v, i) { return map(i) });
		}

		return $.map(this._clones, function(v, i) { return v === position ? map(i) : null });
	};

	/**
	 * Sets the current animation speed.
	 * @public
	 * @param {Number} [speed] - The animation speed in milliseconds or nothing to leave it unchanged.
	 * @returns {Number} - The current animation speed in milliseconds.
	 */
	Owl.prototype.speed = function(speed) {
		if (speed !== undefined) {
			this._speed = speed;
		}

		return this._speed;
	};

	/**
	 * Gets the coordinate of an item.
	 * @todo The name of this method is missleanding.
	 * @public
	 * @param {Number} position - The absolute position of the item within `minimum()` and `maximum()`.
	 * @returns {Number|Array.<Number>} - The coordinate of the item in pixel or all coordinates.
	 */
	Owl.prototype.coordinates = function(position) {
		var multiplier = 1,
			newPosition = position - 1,
			coordinate;

		if (position === undefined) {
			return $.map(this._coordinates, $.proxy(function(coordinate, index) {
				return this.coordinates(index);
			}, this));
		}

		if (this.settings.center) {
			if (this.settings.rtl) {
				multiplier = -1;
				newPosition = position + 1;
			}

			coordinate = this._coordinates[position];
			coordinate += (this.width() - coordinate + (this._coordinates[newPosition] || 0)) / 2 * multiplier;
		} else {
			coordinate = this._coordinates[newPosition] || 0;
		}

		coordinate = Math.ceil(coordinate);

		return coordinate;
	};

	/**
	 * Calculates the speed for a translation.
	 * @protected
	 * @param {Number} from - The absolute position of the start item.
	 * @param {Number} to - The absolute position of the target item.
	 * @param {Number} [factor=undefined] - The time factor in milliseconds.
	 * @returns {Number} - The time in milliseconds for the translation.
	 */
	Owl.prototype.duration = function(from, to, factor) {
		if (factor === 0) {
			return 0;
		}

		return Math.min(Math.max(Math.abs(to - from), 1), 6) * Math.abs((factor || this.settings.smartSpeed));
	};

	/**
	 * Slides to the specified item.
	 * @public
	 * @param {Number} position - The position of the item.
	 * @param {Number} [speed] - The time in milliseconds for the transition.
	 */
	Owl.prototype.to = function(position, speed) {
		var current = this.current(),
			revert = null,
			distance = position - this.relative(current),
			direction = (distance > 0) - (distance < 0),
			items = this._items.length,
			minimum = this.minimum(),
			maximum = this.maximum();

		if (this.settings.loop) {
			if (!this.settings.rewind && Math.abs(distance) > items / 2) {
				distance += direction * -1 * items;
			}

			position = current + distance;
			revert = ((position - minimum) % items + items) % items + minimum;

			if (revert !== position && revert - distance <= maximum && revert - distance > 0) {
				current = revert - distance;
				position = revert;
				this.reset(current);
			}
		} else if (this.settings.rewind) {
			maximum += 1;
			position = (position % maximum + maximum) % maximum;
		} else {
			position = Math.max(minimum, Math.min(maximum, position));
		}

		this.speed(this.duration(current, position, speed));
		this.current(position);

		if (this.$element.is(':visible')) {
			this.update();
		}
	};

	/**
	 * Slides to the next item.
	 * @public
	 * @param {Number} [speed] - The time in milliseconds for the transition.
	 */
	Owl.prototype.next = function(speed) {
		speed = speed || false;
		this.to(this.relative(this.current()) + 1, speed);
	};

	/**
	 * Slides to the previous item.
	 * @public
	 * @param {Number} [speed] - The time in milliseconds for the transition.
	 */
	Owl.prototype.prev = function(speed) {
		speed = speed || false;
		this.to(this.relative(this.current()) - 1, speed);
	};

	/**
	 * Handles the end of an animation.
	 * @protected
	 * @param {Event} event - The event arguments.
	 */
	Owl.prototype.onTransitionEnd = function(event) {

		// if css2 animation then event object is undefined
		if (event !== undefined) {
			event.stopPropagation();

			// Catch only owl-stage transitionEnd event
			if ((event.target || event.srcElement || event.originalTarget) !== this.$stage.get(0)) {
				return false;
			}
		}

		this.leave('animating');
		this.trigger('translated');
	};

	/**
	 * Gets viewport width.
	 * @protected
	 * @return {Number} - The width in pixel.
	 */
	Owl.prototype.viewport = function() {
		var width;
		if (this.options.responsiveBaseElement !== window) {
			width = $(this.options.responsiveBaseElement).width();
		} else if (window.innerWidth) {
			width = window.innerWidth;
		} else if (document.documentElement && document.documentElement.clientWidth) {
			width = document.documentElement.clientWidth;
		} else {
			console.warn('Can not detect viewport width.');
		}
		return width;
	};

	/**
	 * Replaces the current content.
	 * @public
	 * @param {HTMLElement|jQuery|String} content - The new content.
	 */
	Owl.prototype.replace = function(content) {
		this.$stage.empty();
		this._items = [];

		if (content) {
			content = (content instanceof jQuery) ? content : $(content);
		}

		if (this.settings.nestedItemSelector) {
			content = content.find('.' + this.settings.nestedItemSelector);
		}

		content.filter(function() {
			return this.nodeType === 1;
		}).each($.proxy(function(index, item) {
			item = this.prepare(item);
			this.$stage.append(item);
			this._items.push(item);
			this._mergers.push(item.find('[data-merge]').addBack('[data-merge]').attr('data-merge') * 1 || 1);
		}, this));

		this.reset(this.isNumeric(this.settings.startPosition) ? this.settings.startPosition : 0);

		this.invalidate('items');
	};

	/**
	 * Adds an item.
	 * @todo Use `item` instead of `content` for the event arguments.
	 * @public
	 * @param {HTMLElement|jQuery|String} content - The item content to add.
	 * @param {Number} [position] - The relative position at which to insert the item otherwise the item will be added to the end.
	 */
	Owl.prototype.add = function(content, position) {
		var current = this.relative(this._current);

		position = position === undefined ? this._items.length : this.normalize(position, true);
		content = content instanceof jQuery ? content : $(content);

		this.trigger('add', { content: content, position: position });

		content = this.prepare(content);

		if (this._items.length === 0 || position === this._items.length) {
			this._items.length === 0 && this.$stage.append(content);
			this._items.length !== 0 && this._items[position - 1].after(content);
			this._items.push(content);
			this._mergers.push(content.find('[data-merge]').addBack('[data-merge]').attr('data-merge') * 1 || 1);
		} else {
			this._items[position].before(content);
			this._items.splice(position, 0, content);
			this._mergers.splice(position, 0, content.find('[data-merge]').addBack('[data-merge]').attr('data-merge') * 1 || 1);
		}

		this._items[current] && this.reset(this._items[current].index());

		this.invalidate('items');

		this.trigger('added', { content: content, position: position });
	};

	/**
	 * Removes an item by its position.
	 * @todo Use `item` instead of `content` for the event arguments.
	 * @public
	 * @param {Number} position - The relative position of the item to remove.
	 */
	Owl.prototype.remove = function(position) {
		position = this.normalize(position, true);

		if (position === undefined) {
			return;
		}

		this.trigger('remove', { content: this._items[position], position: position });

		this._items[position].remove();
		this._items.splice(position, 1);
		this._mergers.splice(position, 1);

		this.invalidate('items');

		this.trigger('removed', { content: null, position: position });
	};

	/**
	 * Preloads images with auto width.
	 * @todo Replace by a more generic approach
	 * @protected
	 */
	Owl.prototype.preloadAutoWidthImages = function(images) {
		images.each($.proxy(function(i, element) {
			this.enter('pre-loading');
			element = $(element);
			$(new Image()).one('load', $.proxy(function(e) {
				element.attr('src', e.target.src);
				element.css('opacity', 1);
				this.leave('pre-loading');
				!this.is('pre-loading') && !this.is('initializing') && this.refresh();
			}, this)).attr('src', element.attr('src') || element.attr('data-src') || element.attr('data-src-retina'));
		}, this));
	};

	/**
	 * Destroys the carousel.
	 * @public
	 */
	Owl.prototype.destroy = function() {

		this.$element.off('.owl.core');
		this.$stage.off('.owl.core');
		$(document).off('.owl.core');

		if (this.settings.responsive !== false) {
			window.clearTimeout(this.resizeTimer);
			this.off(window, 'resize', this._handlers.onThrottledResize);
		}

		for (var i in this._plugins) {
			this._plugins[i].destroy();
		}

		this.$stage.children('.cloned').remove();

		this.$stage.unwrap();
		this.$stage.children().contents().unwrap();
		this.$stage.children().unwrap();

		this.$element
			.removeClass(this.options.refreshClass)
			.removeClass(this.options.loadingClass)
			.removeClass(this.options.loadedClass)
			.removeClass(this.options.rtlClass)
			.removeClass(this.options.dragClass)
			.removeClass(this.options.grabClass)
			.attr('class', this.$element.attr('class').replace(new RegExp(this.options.responsiveClass + '-\\S+\\s', 'g'), ''))
			.removeData('owl.carousel');
	};

	/**
	 * Operators to calculate right-to-left and left-to-right.
	 * @protected
	 * @param {Number} [a] - The left side operand.
	 * @param {String} [o] - The operator.
	 * @param {Number} [b] - The right side operand.
	 */
	Owl.prototype.op = function(a, o, b) {
		var rtl = this.settings.rtl;
		switch (o) {
			case '<':
				return rtl ? a > b : a < b;
			case '>':
				return rtl ? a < b : a > b;
			case '>=':
				return rtl ? a <= b : a >= b;
			case '<=':
				return rtl ? a >= b : a <= b;
			default:
				break;
		}
	};

	/**
	 * Attaches to an internal event.
	 * @protected
	 * @param {HTMLElement} element - The event source.
	 * @param {String} event - The event name.
	 * @param {Function} listener - The event handler to attach.
	 * @param {Boolean} capture - Wether the event should be handled at the capturing phase or not.
	 */
	Owl.prototype.on = function(element, event, listener, capture) {
		if (element.addEventListener) {
			element.addEventListener(event, listener, capture);
		} else if (element.attachEvent) {
			element.attachEvent('on' + event, listener);
		}
	};

	/**
	 * Detaches from an internal event.
	 * @protected
	 * @param {HTMLElement} element - The event source.
	 * @param {String} event - The event name.
	 * @param {Function} listener - The attached event handler to detach.
	 * @param {Boolean} capture - Wether the attached event handler was registered as a capturing listener or not.
	 */
	Owl.prototype.off = function(element, event, listener, capture) {
		if (element.removeEventListener) {
			element.removeEventListener(event, listener, capture);
		} else if (element.detachEvent) {
			element.detachEvent('on' + event, listener);
		}
	};

	/**
	 * Triggers a public event.
	 * @todo Remove `status`, `relatedTarget` should be used instead.
	 * @protected
	 * @param {String} name - The event name.
	 * @param {*} [data=null] - The event data.
	 * @param {String} [namespace=carousel] - The event namespace.
	 * @param {String} [state] - The state which is associated with the event.
	 * @param {Boolean} [enter=false] - Indicates if the call enters the specified state or not.
	 * @returns {Event} - The event arguments.
	 */
	Owl.prototype.trigger = function(name, data, namespace, state, enter) {
		var status = {
			item: { count: this._items.length, index: this.current() }
		}, handler = $.camelCase(
			$.grep([ 'on', name, namespace ], function(v) { return v })
				.join('-').toLowerCase()
		), event = $.Event(
			[ name, 'owl', namespace || 'carousel' ].join('.').toLowerCase(),
			$.extend({ relatedTarget: this }, status, data)
		);

		if (!this._supress[name]) {
			$.each(this._plugins, function(name, plugin) {
				if (plugin.onTrigger) {
					plugin.onTrigger(event);
				}
			});

			this.register({ type: Owl.Type.Event, name: name });
			this.$element.trigger(event);

			if (this.settings && typeof this.settings[handler] === 'function') {
				this.settings[handler].call(this, event);
			}
		}

		return event;
	};

	/**
	 * Enters a state.
	 * @param name - The state name.
	 */
	Owl.prototype.enter = function(name) {
		$.each([ name ].concat(this._states.tags[name] || []), $.proxy(function(i, name) {
			if (this._states.current[name] === undefined) {
				this._states.current[name] = 0;
			}

			this._states.current[name]++;
		}, this));
	};

	/**
	 * Leaves a state.
	 * @param name - The state name.
	 */
	Owl.prototype.leave = function(name) {
		$.each([ name ].concat(this._states.tags[name] || []), $.proxy(function(i, name) {
			this._states.current[name]--;
		}, this));
	};

	/**
	 * Registers an event or state.
	 * @public
	 * @param {Object} object - The event or state to register.
	 */
	Owl.prototype.register = function(object) {
		if (object.type === Owl.Type.Event) {
			if (!$.event.special[object.name]) {
				$.event.special[object.name] = {};
			}

			if (!$.event.special[object.name].owl) {
				var _default = $.event.special[object.name]._default;
				$.event.special[object.name]._default = function(e) {
					if (_default && _default.apply && (!e.namespace || e.namespace.indexOf('owl') === -1)) {
						return _default.apply(this, arguments);
					}
					return e.namespace && e.namespace.indexOf('owl') > -1;
				};
				$.event.special[object.name].owl = true;
			}
		} else if (object.type === Owl.Type.State) {
			if (!this._states.tags[object.name]) {
				this._states.tags[object.name] = object.tags;
			} else {
				this._states.tags[object.name] = this._states.tags[object.name].concat(object.tags);
			}

			this._states.tags[object.name] = $.grep(this._states.tags[object.name], $.proxy(function(tag, i) {
				return $.inArray(tag, this._states.tags[object.name]) === i;
			}, this));
		}
	};

	/**
	 * Suppresses events.
	 * @protected
	 * @param {Array.<String>} events - The events to suppress.
	 */
	Owl.prototype.suppress = function(events) {
		$.each(events, $.proxy(function(index, event) {
			this._supress[event] = true;
		}, this));
	};

	/**
	 * Releases suppressed events.
	 * @protected
	 * @param {Array.<String>} events - The events to release.
	 */
	Owl.prototype.release = function(events) {
		$.each(events, $.proxy(function(index, event) {
			delete this._supress[event];
		}, this));
	};

	/**
	 * Gets unified pointer coordinates from event.
	 * @todo #261
	 * @protected
	 * @param {Event} - The `mousedown` or `touchstart` event.
	 * @returns {Object} - Contains `x` and `y` coordinates of current pointer position.
	 */
	Owl.prototype.pointer = function(event) {
		var result = { x: null, y: null };

		event = event.originalEvent || event || window.event;

		event = event.touches && event.touches.length ?
			event.touches[0] : event.changedTouches && event.changedTouches.length ?
				event.changedTouches[0] : event;

		if (event.pageX) {
			result.x = event.pageX;
			result.y = event.pageY;
		} else {
			result.x = event.clientX;
			result.y = event.clientY;
		}

		return result;
	};

	/**
	 * Determines if the input is a Number or something that can be coerced to a Number
	 * @protected
	 * @param {Number|String|Object|Array|Boolean|RegExp|Function|Symbol} - The input to be tested
	 * @returns {Boolean} - An indication if the input is a Number or can be coerced to a Number
	 */
	Owl.prototype.isNumeric = function(number) {
		return !isNaN(parseFloat(number));
	};

	/**
	 * Gets the difference of two vectors.
	 * @todo #261
	 * @protected
	 * @param {Object} - The first vector.
	 * @param {Object} - The second vector.
	 * @returns {Object} - The difference.
	 */
	Owl.prototype.difference = function(first, second) {
		return {
			x: first.x - second.x,
			y: first.y - second.y
		};
	};

	/**
	 * The jQuery Plugin for the Owl Carousel
	 * @todo Navigation plugin `next` and `prev`
	 * @public
	 */
	$.fn.owlCarousel = function(option) {
		var args = Array.prototype.slice.call(arguments, 1);

		return this.each(function() {
			var $this = $(this),
				data = $this.data('owl.carousel');

			if (!data) {
				data = new Owl(this, typeof option == 'object' && option);
				$this.data('owl.carousel', data);

				$.each([
					'next', 'prev', 'to', 'destroy', 'refresh', 'replace', 'add', 'remove'
				], function(i, event) {
					data.register({ type: Owl.Type.Event, name: event });
					data.$element.on(event + '.owl.carousel.core', $.proxy(function(e) {
						if (e.namespace && e.relatedTarget !== this) {
							this.suppress([ event ]);
							data[event].apply(this, [].slice.call(arguments, 1));
							this.release([ event ]);
						}
					}, data));
				});
			}

			if (typeof option == 'string' && option.charAt(0) !== '_') {
				data[option].apply(data, args);
			}
		});
	};

	/**
	 * The constructor for the jQuery Plugin
	 * @public
	 */
	$.fn.owlCarousel.Constructor = Owl;

})(window.Zepto || window.jQuery, window, document);

/**
 * AutoRefresh Plugin
 * @version 2.1.0
 * @author Artus Kolanowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
;(function($, window, document, undefined) {

	/**
	 * Creates the auto refresh plugin.
	 * @class The Auto Refresh Plugin
	 * @param {Owl} carousel - The Owl Carousel
	 */
	var AutoRefresh = function(carousel) {
		/**
		 * Reference to the core.
		 * @protected
		 * @type {Owl}
		 */
		this._core = carousel;

		/**
		 * Refresh interval.
		 * @protected
		 * @type {number}
		 */
		this._interval = null;

		/**
		 * Whether the element is currently visible or not.
		 * @protected
		 * @type {Boolean}
		 */
		this._visible = null;

		/**
		 * All event handlers.
		 * @protected
		 * @type {Object}
		 */
		this._handlers = {
			'initialized.owl.carousel': $.proxy(function(e) {
				if (e.namespace && this._core.settings.autoRefresh) {
					this.watch();
				}
			}, this)
		};

		// set default options
		this._core.options = $.extend({}, AutoRefresh.Defaults, this._core.options);

		// register event handlers
		this._core.$element.on(this._handlers);
	};

	/**
	 * Default options.
	 * @public
	 */
	AutoRefresh.Defaults = {
		autoRefresh: true,
		autoRefreshInterval: 500
	};

	/**
	 * Watches the element.
	 */
	AutoRefresh.prototype.watch = function() {
		if (this._interval) {
			return;
		}

		this._visible = this._core.$element.is(':visible');
		this._interval = window.setInterval($.proxy(this.refresh, this), this._core.settings.autoRefreshInterval);
	};

	/**
	 * Refreshes the element.
	 */
	AutoRefresh.prototype.refresh = function() {
		if (this._core.$element.is(':visible') === this._visible) {
			return;
		}

		this._visible = !this._visible;

		this._core.$element.toggleClass('owl-hidden', !this._visible);

		this._visible && (this._core.invalidate('width') && this._core.refresh());
	};

	/**
	 * Destroys the plugin.
	 */
	AutoRefresh.prototype.destroy = function() {
		var handler, property;

		window.clearInterval(this._interval);

		for (handler in this._handlers) {
			this._core.$element.off(handler, this._handlers[handler]);
		}
		for (property in Object.getOwnPropertyNames(this)) {
			typeof this[property] != 'function' && (this[property] = null);
		}
	};

	$.fn.owlCarousel.Constructor.Plugins.AutoRefresh = AutoRefresh;

})(window.Zepto || window.jQuery, window, document);

/**
 * Lazy Plugin
 * @version 2.1.0
 * @author Bartosz Wojciechowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
;(function($, window, document, undefined) {

	/**
	 * Creates the lazy plugin.
	 * @class The Lazy Plugin
	 * @param {Owl} carousel - The Owl Carousel
	 */
	var Lazy = function(carousel) {

		/**
		 * Reference to the core.
		 * @protected
		 * @type {Owl}
		 */
		this._core = carousel;

		/**
		 * Already loaded items.
		 * @protected
		 * @type {Array.<jQuery>}
		 */
		this._loaded = [];

		/**
		 * Event handlers.
		 * @protected
		 * @type {Object}
		 */
		this._handlers = {
			'initialized.owl.carousel change.owl.carousel resized.owl.carousel': $.proxy(function(e) {
				if (!e.namespace) {
					return;
				}

				if (!this._core.settings || !this._core.settings.lazyLoad) {
					return;
				}

				if ((e.property && e.property.name == 'position') || e.type == 'initialized') {
					var settings = this._core.settings,
						n = (settings.center && Math.ceil(settings.items / 2) || settings.items),
						i = ((settings.center && n * -1) || 0),
						position = (e.property && e.property.value !== undefined ? e.property.value : this._core.current()) + i,
						clones = this._core.clones().length,
						load = $.proxy(function(i, v) { this.load(v) }, this);

					while (i++ < n) {
						this.load(clones / 2 + this._core.relative(position));
						clones && $.each(this._core.clones(this._core.relative(position)), load);
						position++;
					}
				}
			}, this)
		};

		// set the default options
		this._core.options = $.extend({}, Lazy.Defaults, this._core.options);

		// register event handler
		this._core.$element.on(this._handlers);
	};

	/**
	 * Default options.
	 * @public
	 */
	Lazy.Defaults = {
		lazyLoad: false
	};

	/**
	 * Loads all resources of an item at the specified position.
	 * @param {Number} position - The absolute position of the item.
	 * @protected
	 */
	Lazy.prototype.load = function(position) {
		var $item = this._core.$stage.children().eq(position),
			$elements = $item && $item.find('.owl-lazy');

		if (!$elements || $.inArray($item.get(0), this._loaded) > -1) {
			return;
		}

		$elements.each($.proxy(function(index, element) {
			var $element = $(element), image,
				url = (window.devicePixelRatio > 1 && $element.attr('data-src-retina')) || $element.attr('data-src');

			this._core.trigger('load', { element: $element, url: url }, 'lazy');

			if ($element.is('img')) {
				$element.one('load.owl.lazy', $.proxy(function() {
					$element.css('opacity', 1);
					this._core.trigger('loaded', { element: $element, url: url }, 'lazy');
				}, this)).attr('src', url);
			} else {
				image = new Image();
				image.onload = $.proxy(function() {
					$element.css({
						'background-image': 'url("' + url + '")',
						'opacity': '1'
					});
					this._core.trigger('loaded', { element: $element, url: url }, 'lazy');
				}, this);
				image.src = url;
			}
		}, this));

		this._loaded.push($item.get(0));
	};

	/**
	 * Destroys the plugin.
	 * @public
	 */
	Lazy.prototype.destroy = function() {
		var handler, property;

		for (handler in this.handlers) {
			this._core.$element.off(handler, this.handlers[handler]);
		}
		for (property in Object.getOwnPropertyNames(this)) {
			typeof this[property] != 'function' && (this[property] = null);
		}
	};

	$.fn.owlCarousel.Constructor.Plugins.Lazy = Lazy;

})(window.Zepto || window.jQuery, window, document);

/**
 * AutoHeight Plugin
 * @version 2.1.0
 * @author Bartosz Wojciechowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
;(function($, window, document, undefined) {

	/**
	 * Creates the auto height plugin.
	 * @class The Auto Height Plugin
	 * @param {Owl} carousel - The Owl Carousel
	 */
	var AutoHeight = function(carousel) {
		/**
		 * Reference to the core.
		 * @protected
		 * @type {Owl}
		 */
		this._core = carousel;

		/**
		 * All event handlers.
		 * @protected
		 * @type {Object}
		 */
		this._handlers = {
			'initialized.owl.carousel refreshed.owl.carousel': $.proxy(function(e) {
				if (e.namespace && this._core.settings.autoHeight) {
					this.update();
				}
			}, this),
			'changed.owl.carousel': $.proxy(function(e) {
				if (e.namespace && this._core.settings.autoHeight && e.property.name == 'position'){
					this.update();
				}
			}, this),
			'loaded.owl.lazy': $.proxy(function(e) {
				if (e.namespace && this._core.settings.autoHeight
					&& e.element.closest('.' + this._core.settings.itemClass).index() === this._core.current()) {
					this.update();
				}
			}, this)
		};

		// set default options
		this._core.options = $.extend({}, AutoHeight.Defaults, this._core.options);

		// register event handlers
		this._core.$element.on(this._handlers);
	};

	/**
	 * Default options.
	 * @public
	 */
	AutoHeight.Defaults = {
		autoHeight: false,
		autoHeightClass: 'owl-height'
	};

	/**
	 * Updates the view.
	 */
	AutoHeight.prototype.update = function() {
		var start = this._core._current,
			end = start + this._core.settings.items,
			visible = this._core.$stage.children().toArray().slice(start, end),
			heights = [],
			maxheight = 0;

		$.each(visible, function(index, item) {
			heights.push($(item).height());
		});

		maxheight = Math.max.apply(null, heights);

		this._core.$stage.parent()
			.height(maxheight)
			.addClass(this._core.settings.autoHeightClass);
	};

	AutoHeight.prototype.destroy = function() {
		var handler, property;

		for (handler in this._handlers) {
			this._core.$element.off(handler, this._handlers[handler]);
		}
		for (property in Object.getOwnPropertyNames(this)) {
			typeof this[property] != 'function' && (this[property] = null);
		}
	};

	$.fn.owlCarousel.Constructor.Plugins.AutoHeight = AutoHeight;

})(window.Zepto || window.jQuery, window, document);

/**
 * Video Plugin
 * @version 2.1.0
 * @author Bartosz Wojciechowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
;(function($, window, document, undefined) {

	/**
	 * Creates the video plugin.
	 * @class The Video Plugin
	 * @param {Owl} carousel - The Owl Carousel
	 */
	var Video = function(carousel) {
		/**
		 * Reference to the core.
		 * @protected
		 * @type {Owl}
		 */
		this._core = carousel;

		/**
		 * Cache all video URLs.
		 * @protected
		 * @type {Object}
		 */
		this._videos = {};

		/**
		 * Current playing item.
		 * @protected
		 * @type {jQuery}
		 */
		this._playing = null;

		/**
		 * All event handlers.
		 * @todo The cloned content removale is too late
		 * @protected
		 * @type {Object}
		 */
		this._handlers = {
			'initialized.owl.carousel': $.proxy(function(e) {
				if (e.namespace) {
					this._core.register({ type: 'state', name: 'playing', tags: [ 'interacting' ] });
				}
			}, this),
			'resize.owl.carousel': $.proxy(function(e) {
				if (e.namespace && this._core.settings.video && this.isInFullScreen()) {
					e.preventDefault();
				}
			}, this),
			'refreshed.owl.carousel': $.proxy(function(e) {
				if (e.namespace && this._core.is('resizing')) {
					this._core.$stage.find('.cloned .owl-video-frame').remove();
				}
			}, this),
			'changed.owl.carousel': $.proxy(function(e) {
				if (e.namespace && e.property.name === 'position' && this._playing) {
					this.stop();
				}
			}, this),
			'prepared.owl.carousel': $.proxy(function(e) {
				if (!e.namespace) {
					return;
				}

				var $element = $(e.content).find('.owl-video');

				if ($element.length) {
					$element.css('display', 'none');
					this.fetch($element, $(e.content));
				}
			}, this)
		};

		// set default options
		this._core.options = $.extend({}, Video.Defaults, this._core.options);

		// register event handlers
		this._core.$element.on(this._handlers);

		this._core.$element.on('click.owl.video', '.owl-video-play-icon', $.proxy(function(e) {
			this.play(e);
		}, this));
	};

	/**
	 * Default options.
	 * @public
	 */
	Video.Defaults = {
		video: false,
		videoHeight: false,
		videoWidth: false
	};

	/**
	 * Gets the video ID and the type (YouTube/Vimeo/vzaar only).
	 * @protected
	 * @param {jQuery} target - The target containing the video data.
	 * @param {jQuery} item - The item containing the video.
	 */
	Video.prototype.fetch = function(target, item) {
			var type = (function() {
					if (target.attr('data-vimeo-id')) {
						return 'vimeo';
					} else if (target.attr('data-vzaar-id')) {
						return 'vzaar'
					} else {
						return 'youtube';
					}
				})(),
				id = target.attr('data-vimeo-id') || target.attr('data-youtube-id') || target.attr('data-vzaar-id'),
				width = target.attr('data-width') || this._core.settings.videoWidth,
				height = target.attr('data-height') || this._core.settings.videoHeight,
				url = target.attr('href');

		if (url) {

			/*
					Parses the id's out of the following urls (and probably more):
					https://www.youtube.com/watch?v=:id
					https://youtu.be/:id
					https://vimeo.com/:id
					https://vimeo.com/channels/:channel/:id
					https://vimeo.com/groups/:group/videos/:id
					https://app.vzaar.com/videos/:id

					Visual example: https://regexper.com/#(http%3A%7Chttps%3A%7C)%5C%2F%5C%2F(player.%7Cwww.%7Capp.)%3F(vimeo%5C.com%7Cyoutu(be%5C.com%7C%5C.be%7Cbe%5C.googleapis%5C.com)%7Cvzaar%5C.com)%5C%2F(video%5C%2F%7Cvideos%5C%2F%7Cembed%5C%2F%7Cchannels%5C%2F.%2B%5C%2F%7Cgroups%5C%2F.%2B%5C%2F%7Cwatch%5C%3Fv%3D%7Cv%5C%2F)%3F(%5BA-Za-z0-9._%25-%5D*)(%5C%26%5CS%2B)%3F
			*/

			id = url.match(/(http:|https:|)\/\/(player.|www.|app.)?(vimeo\.com|youtu(be\.com|\.be|be\.googleapis\.com)|vzaar\.com)\/(video\/|videos\/|embed\/|channels\/.+\/|groups\/.+\/|watch\?v=|v\/)?([A-Za-z0-9._%-]*)(\&\S+)?/);

			if (id[3].indexOf('youtu') > -1) {
				type = 'youtube';
			} else if (id[3].indexOf('vimeo') > -1) {
				type = 'vimeo';
			} else if (id[3].indexOf('vzaar') > -1) {
				type = 'vzaar';
			} else {
				throw new Error('Video URL not supported.');
			}
			id = id[6];
		} else {
			throw new Error('Missing video URL.');
		}

		this._videos[url] = {
			type: type,
			id: id,
			width: width,
			height: height
		};

		item.attr('data-video', url);

		this.thumbnail(target, this._videos[url]);
	};

	/**
	 * Creates video thumbnail.
	 * @protected
	 * @param {jQuery} target - The target containing the video data.
	 * @param {Object} info - The video info object.
	 * @see `fetch`
	 */
	Video.prototype.thumbnail = function(target, video) {
		var tnLink,
			icon,
			path,
			dimensions = video.width && video.height ? 'style="width:' + video.width + 'px;height:' + video.height + 'px;"' : '',
			customTn = target.find('img'),
			srcType = 'src',
			lazyClass = '',
			settings = this._core.settings,
			create = function(path) {
				icon = '<div class="owl-video-play-icon"></div>';

				if (settings.lazyLoad) {
					tnLink = '<div class="owl-video-tn ' + lazyClass + '" ' + srcType + '="' + path + '"></div>';
				} else {
					tnLink = '<div class="owl-video-tn" style="opacity:1;background-image:url(' + path + ')"></div>';
				}
				target.after(tnLink);
				target.after(icon);
			};

		// wrap video content into owl-video-wrapper div
		target.wrap('<div class="owl-video-wrapper"' + dimensions + '></div>');

		if (this._core.settings.lazyLoad) {
			srcType = 'data-src';
			lazyClass = 'owl-lazy';
		}

		// custom thumbnail
		if (customTn.length) {
			create(customTn.attr(srcType));
			customTn.remove();
			return false;
		}

		if (video.type === 'youtube') {
			path = "//img.youtube.com/vi/" + video.id + "/hqdefault.jpg";
			create(path);
		} else if (video.type === 'vimeo') {
			$.ajax({
				type: 'GET',
				url: '//vimeo.com/api/v2/video/' + video.id + '.json',
				jsonp: 'callback',
				dataType: 'jsonp',
				success: function(data) {
					path = data[0].thumbnail_large;
					create(path);
				}
			});
		} else if (video.type === 'vzaar') {
			$.ajax({
				type: 'GET',
				url: '//vzaar.com/api/videos/' + video.id + '.json',
				jsonp: 'callback',
				dataType: 'jsonp',
				success: function(data) {
					path = data.framegrab_url;
					create(path);
				}
			});
		}
	};

	/**
	 * Stops the current video.
	 * @public
	 */
	Video.prototype.stop = function() {
		this._core.trigger('stop', null, 'video');
		this._playing.find('.owl-video-frame').remove();
		this._playing.removeClass('owl-video-playing');
		this._playing = null;
		this._core.leave('playing');
		this._core.trigger('stopped', null, 'video');
	};

	/**
	 * Starts the current video.
	 * @public
	 * @param {Event} event - The event arguments.
	 */
	Video.prototype.play = function(event) {
		var target = $(event.target),
			item = target.closest('.' + this._core.settings.itemClass),
			video = this._videos[item.attr('data-video')],
			width = video.width || '100%',
			height = video.height || this._core.$stage.height(),
			html;

		if (this._playing) {
			return;
		}

		this._core.enter('playing');
		this._core.trigger('play', null, 'video');

		item = this._core.items(this._core.relative(item.index()));

		this._core.reset(item.index());

		if (video.type === 'youtube') {
			html = '<iframe width="' + width + '" height="' + height + '" src="//www.youtube.com/embed/' +
				video.id + '?autoplay=1&rel=0&v=' + video.id + '" frameborder="0" allowfullscreen></iframe>';
		} else if (video.type === 'vimeo') {
			html = '<iframe src="//player.vimeo.com/video/' + video.id +
				'?autoplay=1" width="' + width + '" height="' + height +
				'" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
		} else if (video.type === 'vzaar') {
			html = '<iframe frameborder="0"' + 'height="' + height + '"' + 'width="' + width +
				'" allowfullscreen mozallowfullscreen webkitAllowFullScreen ' +
				'src="//view.vzaar.com/' + video.id + '/player?autoplay=true"></iframe>';
		}

		$('<div class="owl-video-frame">' + html + '</div>').insertAfter(item.find('.owl-video'));

		this._playing = item.addClass('owl-video-playing');
	};

	/**
	 * Checks whether an video is currently in full screen mode or not.
	 * @todo Bad style because looks like a readonly method but changes members.
	 * @protected
	 * @returns {Boolean}
	 */
	Video.prototype.isInFullScreen = function() {
		var element = document.fullscreenElement || document.mozFullScreenElement ||
				document.webkitFullscreenElement;

		return element && $(element).parent().hasClass('owl-video-frame');
	};

	/**
	 * Destroys the plugin.
	 */
	Video.prototype.destroy = function() {
		var handler, property;

		this._core.$element.off('click.owl.video');

		for (handler in this._handlers) {
			this._core.$element.off(handler, this._handlers[handler]);
		}
		for (property in Object.getOwnPropertyNames(this)) {
			typeof this[property] != 'function' && (this[property] = null);
		}
	};

	$.fn.owlCarousel.Constructor.Plugins.Video = Video;

})(window.Zepto || window.jQuery, window, document);

/**
 * Animate Plugin
 * @version 2.1.0
 * @author Bartosz Wojciechowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
;(function($, window, document, undefined) {

	/**
	 * Creates the animate plugin.
	 * @class The Navigation Plugin
	 * @param {Owl} scope - The Owl Carousel
	 */
	var Animate = function(scope) {
		this.core = scope;
		this.core.options = $.extend({}, Animate.Defaults, this.core.options);
		this.swapping = true;
		this.previous = undefined;
		this.next = undefined;

		this.handlers = {
			'change.owl.carousel': $.proxy(function(e) {
				if (e.namespace && e.property.name == 'position') {
					this.previous = this.core.current();
					this.next = e.property.value;
				}
			}, this),
			'drag.owl.carousel dragged.owl.carousel translated.owl.carousel': $.proxy(function(e) {
				if (e.namespace) {
					this.swapping = e.type == 'translated';
				}
			}, this),
			'translate.owl.carousel': $.proxy(function(e) {
				if (e.namespace && this.swapping && (this.core.options.animateOut || this.core.options.animateIn)) {
					this.swap();
				}
			}, this)
		};

		this.core.$element.on(this.handlers);
	};

	/**
	 * Default options.
	 * @public
	 */
	Animate.Defaults = {
		animateOut: false,
		animateIn: false
	};

	/**
	 * Toggles the animation classes whenever an translations starts.
	 * @protected
	 * @returns {Boolean|undefined}
	 */
	Animate.prototype.swap = function() {

		if (this.core.settings.items !== 1) {
			return;
		}

		if (!$.support.animation || !$.support.transition) {
			return;
		}

		this.core.speed(0);

		var left,
			clear = $.proxy(this.clear, this),
			previous = this.core.$stage.children().eq(this.previous),
			next = this.core.$stage.children().eq(this.next),
			incoming = this.core.settings.animateIn,
			outgoing = this.core.settings.animateOut;

		if (this.core.current() === this.previous) {
			return;
		}

		if (outgoing) {
			left = this.core.coordinates(this.previous) - this.core.coordinates(this.next);
			previous.one($.support.animation.end, clear)
				.css( { 'left': left + 'px' } )
				.addClass('animated owl-animated-out')
				.addClass(outgoing);
		}

		if (incoming) {
			next.one($.support.animation.end, clear)
				.addClass('animated owl-animated-in')
				.addClass(incoming);
		}
	};

	Animate.prototype.clear = function(e) {
		$(e.target).css( { 'left': '' } )
			.removeClass('animated owl-animated-out owl-animated-in')
			.removeClass(this.core.settings.animateIn)
			.removeClass(this.core.settings.animateOut);
		this.core.onTransitionEnd();
	};

	/**
	 * Destroys the plugin.
	 * @public
	 */
	Animate.prototype.destroy = function() {
		var handler, property;

		for (handler in this.handlers) {
			this.core.$element.off(handler, this.handlers[handler]);
		}
		for (property in Object.getOwnPropertyNames(this)) {
			typeof this[property] != 'function' && (this[property] = null);
		}
	};

	$.fn.owlCarousel.Constructor.Plugins.Animate = Animate;

})(window.Zepto || window.jQuery, window, document);

/**
 * Autoplay Plugin
 * @version 2.1.0
 * @author Bartosz Wojciechowski
 * @author Artus Kolanowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
;(function($, window, document, undefined) {

	/**
	 * Creates the autoplay plugin.
	 * @class The Autoplay Plugin
	 * @param {Owl} scope - The Owl Carousel
	 */
	var Autoplay = function(carousel) {
		/**
		 * Reference to the core.
		 * @protected
		 * @type {Owl}
		 */
		this._core = carousel;

		/**
		 * The autoplay timeout.
		 * @type {Timeout}
		 */
		this._timeout = null;

		/**
		 * Indicates whenever the autoplay is paused.
		 * @type {Boolean}
		 */
		this._paused = false;

		/**
		 * All event handlers.
		 * @protected
		 * @type {Object}
		 */
		this._handlers = {
			'changed.owl.carousel': $.proxy(function(e) {
				if (e.namespace && e.property.name === 'settings') {
					if (this._core.settings.autoplay) {
						this.play();
					} else {
						this.stop();
					}
				} else if (e.namespace && e.property.name === 'position') {
					//console.log('play?', e);
					if (this._core.settings.autoplay) {
						this._setAutoPlayInterval();
					}
				}
			}, this),
			'initialized.owl.carousel': $.proxy(function(e) {
				if (e.namespace && this._core.settings.autoplay) {
					this.play();
				}
			}, this),
			'play.owl.autoplay': $.proxy(function(e, t, s) {
				if (e.namespace) {
					this.play(t, s);
				}
			}, this),
			'stop.owl.autoplay': $.proxy(function(e) {
				if (e.namespace) {
					this.stop();
				}
			}, this),
			'mouseover.owl.autoplay': $.proxy(function() {
				if (this._core.settings.autoplayHoverPause && this._core.is('rotating')) {
					this.pause();
				}
			}, this),
			'mouseleave.owl.autoplay': $.proxy(function() {
				if (this._core.settings.autoplayHoverPause && this._core.is('rotating')) {
					this.play();
				}
			}, this),
			'touchstart.owl.core': $.proxy(function() {
				if (this._core.settings.autoplayHoverPause && this._core.is('rotating')) {
					this.pause();
				}
			}, this),
			'touchend.owl.core': $.proxy(function() {
				if (this._core.settings.autoplayHoverPause) {
					this.play();
				}
			}, this)
		};

		// register event handlers
		this._core.$element.on(this._handlers);

		// set default options
		this._core.options = $.extend({}, Autoplay.Defaults, this._core.options);
	};

	/**
	 * Default options.
	 * @public
	 */
	Autoplay.Defaults = {
		autoplay: false,
		autoplayTimeout: 5000,
		autoplayHoverPause: false,
		autoplaySpeed: false
	};

	/**
	 * Starts the autoplay.
	 * @public
	 * @param {Number} [timeout] - The interval before the next animation starts.
	 * @param {Number} [speed] - The animation speed for the animations.
	 */
	Autoplay.prototype.play = function(timeout, speed) {
		this._paused = false;

		if (this._core.is('rotating')) {
			return;
		}

		this._core.enter('rotating');

		this._setAutoPlayInterval();
	};

	/**
	 * Gets a new timeout
	 * @private
	 * @param {Number} [timeout] - The interval before the next animation starts.
	 * @param {Number} [speed] - The animation speed for the animations.
	 * @return {Timeout}
	 */
	Autoplay.prototype._getNextTimeout = function(timeout, speed) {
		if ( this._timeout ) {
			window.clearTimeout(this._timeout);
		}
		return window.setTimeout($.proxy(function() {
			if (this._paused || this._core.is('busy') || this._core.is('interacting') || document.hidden) {
				return;
			}
			this._core.next(speed || this._core.settings.autoplaySpeed);
		}, this), timeout || this._core.settings.autoplayTimeout);
	};

	/**
	 * Sets autoplay in motion.
	 * @private
	 */
	Autoplay.prototype._setAutoPlayInterval = function() {
		this._timeout = this._getNextTimeout();
	};

	/**
	 * Stops the autoplay.
	 * @public
	 */
	Autoplay.prototype.stop = function() {
		if (!this._core.is('rotating')) {
			return;
		}

		window.clearTimeout(this._timeout);
		this._core.leave('rotating');
	};

	/**
	 * Stops the autoplay.
	 * @public
	 */
	Autoplay.prototype.pause = function() {
		if (!this._core.is('rotating')) {
			return;
		}

		this._paused = true;
	};

	/**
	 * Destroys the plugin.
	 */
	Autoplay.prototype.destroy = function() {
		var handler, property;

		this.stop();

		for (handler in this._handlers) {
			this._core.$element.off(handler, this._handlers[handler]);
		}
		for (property in Object.getOwnPropertyNames(this)) {
			typeof this[property] != 'function' && (this[property] = null);
		}
	};

	$.fn.owlCarousel.Constructor.Plugins.autoplay = Autoplay;

})(window.Zepto || window.jQuery, window, document);

/**
 * Navigation Plugin
 * @version 2.1.0
 * @author Artus Kolanowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
;(function($, window, document, undefined) {
	'use strict';

	/**
	 * Creates the navigation plugin.
	 * @class The Navigation Plugin
	 * @param {Owl} carousel - The Owl Carousel.
	 */
	var Navigation = function(carousel) {
		/**
		 * Reference to the core.
		 * @protected
		 * @type {Owl}
		 */
		this._core = carousel;

		/**
		 * Indicates whether the plugin is initialized or not.
		 * @protected
		 * @type {Boolean}
		 */
		this._initialized = false;

		/**
		 * The current paging indexes.
		 * @protected
		 * @type {Array}
		 */
		this._pages = [];

		/**
		 * All DOM elements of the user interface.
		 * @protected
		 * @type {Object}
		 */
		this._controls = {};

		/**
		 * Markup for an indicator.
		 * @protected
		 * @type {Array.<String>}
		 */
		this._templates = [];

		/**
		 * The carousel element.
		 * @type {jQuery}
		 */
		this.$element = this._core.$element;

		/**
		 * Overridden methods of the carousel.
		 * @protected
		 * @type {Object}
		 */
		this._overrides = {
			next: this._core.next,
			prev: this._core.prev,
			to: this._core.to
		};

		/**
		 * All event handlers.
		 * @protected
		 * @type {Object}
		 */
		this._handlers = {
			'prepared.owl.carousel': $.proxy(function(e) {
				if (e.namespace && this._core.settings.dotsData) {
					this._templates.push('<div class="' + this._core.settings.dotClass + '">' +
						$(e.content).find('[data-dot]').addBack('[data-dot]').attr('data-dot') + '</div>');
				}
			}, this),
			'added.owl.carousel': $.proxy(function(e) {
				if (e.namespace && this._core.settings.dotsData) {
					this._templates.splice(e.position, 0, this._templates.pop());
				}
			}, this),
			'remove.owl.carousel': $.proxy(function(e) {
				if (e.namespace && this._core.settings.dotsData) {
					this._templates.splice(e.position, 1);
				}
			}, this),
			'changed.owl.carousel': $.proxy(function(e) {
				if (e.namespace && e.property.name == 'position') {
					this.draw();
				}
			}, this),
			'initialized.owl.carousel': $.proxy(function(e) {
				if (e.namespace && !this._initialized) {
					this._core.trigger('initialize', null, 'navigation');
					this.initialize();
					this.update();
					this.draw();
					this._initialized = true;
					this._core.trigger('initialized', null, 'navigation');
				}
			}, this),
			'refreshed.owl.carousel': $.proxy(function(e) {
				if (e.namespace && this._initialized) {
					this._core.trigger('refresh', null, 'navigation');
					this.update();
					this.draw();
					this._core.trigger('refreshed', null, 'navigation');
				}
			}, this)
		};

		// set default options
		this._core.options = $.extend({}, Navigation.Defaults, this._core.options);

		// register event handlers
		this.$element.on(this._handlers);
	};

	/**
	 * Default options.
	 * @public
	 * @todo Rename `slideBy` to `navBy`
	 */
	Navigation.Defaults = {
		nav: false,
		navText: [ 'prev', 'next' ],
		navSpeed: false,
		navElement: 'div',
		navContainer: false,
		navContainerClass: 'owl-nav',
		navClass: [ 'owl-prev', 'owl-next' ],
		slideBy: 1,
		dotClass: 'owl-dot',
		dotsClass: 'owl-dots',
		dots: true,
		dotsEach: false,
		dotsData: false,
		dotsSpeed: false,
		dotsContainer: false
	};

	/**
	 * Initializes the layout of the plugin and extends the carousel.
	 * @protected
	 */
	Navigation.prototype.initialize = function() {
		var override,
			settings = this._core.settings;

		// create DOM structure for relative navigation
		this._controls.$relative = (settings.navContainer ? $(settings.navContainer)
			: $('<div>').addClass(settings.navContainerClass).appendTo(this.$element)).addClass('disabled');

		this._controls.$previous = $('<' + settings.navElement + '>')
			.addClass(settings.navClass[0])
			.html(settings.navText[0])
			.prependTo(this._controls.$relative)
			.on('click', $.proxy(function(e) {
				this.prev(settings.navSpeed);
			}, this));
		this._controls.$next = $('<' + settings.navElement + '>')
			.addClass(settings.navClass[1])
			.html(settings.navText[1])
			.appendTo(this._controls.$relative)
			.on('click', $.proxy(function(e) {
				this.next(settings.navSpeed);
			}, this));

		// create DOM structure for absolute navigation
		if (!settings.dotsData) {
			this._templates = [ $('<div>')
				.addClass(settings.dotClass)
				.append($('<span>'))
				.prop('outerHTML') ];
		}

		this._controls.$absolute = (settings.dotsContainer ? $(settings.dotsContainer)
			: $('<div>').addClass(settings.dotsClass).appendTo(this.$element)).addClass('disabled');

		this._controls.$absolute.on('click', 'div', $.proxy(function(e) {
			var index = $(e.target).parent().is(this._controls.$absolute)
				? $(e.target).index() : $(e.target).parent().index();

			e.preventDefault();

			this.to(index, settings.dotsSpeed);
		}, this));

		// override public methods of the carousel
		for (override in this._overrides) {
			this._core[override] = $.proxy(this[override], this);
		}
	};

	/**
	 * Destroys the plugin.
	 * @protected
	 */
	Navigation.prototype.destroy = function() {
		var handler, control, property, override;

		for (handler in this._handlers) {
			this.$element.off(handler, this._handlers[handler]);
		}
		for (control in this._controls) {
			this._controls[control].remove();
		}
		for (override in this.overides) {
			this._core[override] = this._overrides[override];
		}
		for (property in Object.getOwnPropertyNames(this)) {
			typeof this[property] != 'function' && (this[property] = null);
		}
	};

	/**
	 * Updates the internal state.
	 * @protected
	 */
	Navigation.prototype.update = function() {
		var i, j, k,
			lower = this._core.clones().length / 2,
			upper = lower + this._core.items().length,
			maximum = this._core.maximum(true),
			settings = this._core.settings,
			size = settings.center || settings.autoWidth || settings.dotsData
				? 1 : settings.dotsEach || settings.items;

		if (settings.slideBy !== 'page') {
			settings.slideBy = Math.min(settings.slideBy, settings.items);
		}

		if (settings.dots || settings.slideBy == 'page') {
			this._pages = [];

			for (i = lower, j = 0, k = 0; i < upper; i++) {
				if (j >= size || j === 0) {
					this._pages.push({
						start: Math.min(maximum, i - lower),
						end: i - lower + size - 1
					});
					if (Math.min(maximum, i - lower) === maximum) {
						break;
					}
					j = 0, ++k;
				}
				j += this._core.mergers(this._core.relative(i));
			}
		}
	};

	/**
	 * Draws the user interface.
	 * @todo The option `dotsData` wont work.
	 * @protected
	 */
	Navigation.prototype.draw = function() {
		var difference,
			settings = this._core.settings,
			disabled = this._core.items().length <= settings.items,
			index = this._core.relative(this._core.current()),
			loop = settings.loop || settings.rewind;

		this._controls.$relative.toggleClass('disabled', !settings.nav || disabled);

		if (settings.nav) {
			this._controls.$previous.toggleClass('disabled', !loop && index <= this._core.minimum(true));
			this._controls.$next.toggleClass('disabled', !loop && index >= this._core.maximum(true));
		}

		this._controls.$absolute.toggleClass('disabled', !settings.dots || disabled);

		if (settings.dots) {
			difference = this._pages.length - this._controls.$absolute.children().length;

			if (settings.dotsData && difference !== 0) {
				this._controls.$absolute.html(this._templates.join(''));
			} else if (difference > 0) {
				this._controls.$absolute.append(new Array(difference + 1).join(this._templates[0]));
			} else if (difference < 0) {
				this._controls.$absolute.children().slice(difference).remove();
			}

			this._controls.$absolute.find('.active').removeClass('active');
			this._controls.$absolute.children().eq($.inArray(this.current(), this._pages)).addClass('active');
		}
	};

	/**
	 * Extends event data.
	 * @protected
	 * @param {Event} event - The event object which gets thrown.
	 */
	Navigation.prototype.onTrigger = function(event) {
		var settings = this._core.settings;

		event.page = {
			index: $.inArray(this.current(), this._pages),
			count: this._pages.length,
			size: settings && (settings.center || settings.autoWidth || settings.dotsData
				? 1 : settings.dotsEach || settings.items)
		};
	};

	/**
	 * Gets the current page position of the carousel.
	 * @protected
	 * @returns {Number}
	 */
	Navigation.prototype.current = function() {
		var current = this._core.relative(this._core.current());
		return $.grep(this._pages, $.proxy(function(page, index) {
			return page.start <= current && page.end >= current;
		}, this)).pop();
	};

	/**
	 * Gets the current succesor/predecessor position.
	 * @protected
	 * @returns {Number}
	 */
	Navigation.prototype.getPosition = function(successor) {
		var position, length,
			settings = this._core.settings;

		if (settings.slideBy == 'page') {
			position = $.inArray(this.current(), this._pages);
			length = this._pages.length;
			successor ? ++position : --position;
			position = this._pages[((position % length) + length) % length].start;
		} else {
			position = this._core.relative(this._core.current());
			length = this._core.items().length;
			successor ? position += settings.slideBy : position -= settings.slideBy;
		}

		return position;
	};

	/**
	 * Slides to the next item or page.
	 * @public
	 * @param {Number} [speed=false] - The time in milliseconds for the transition.
	 */
	Navigation.prototype.next = function(speed) {
		$.proxy(this._overrides.to, this._core)(this.getPosition(true), speed);
	};

	/**
	 * Slides to the previous item or page.
	 * @public
	 * @param {Number} [speed=false] - The time in milliseconds for the transition.
	 */
	Navigation.prototype.prev = function(speed) {
		$.proxy(this._overrides.to, this._core)(this.getPosition(false), speed);
	};

	/**
	 * Slides to the specified item or page.
	 * @public
	 * @param {Number} position - The position of the item or page.
	 * @param {Number} [speed] - The time in milliseconds for the transition.
	 * @param {Boolean} [standard=false] - Whether to use the standard behaviour or not.
	 */
	Navigation.prototype.to = function(position, speed, standard) {
		var length;

		if (!standard && this._pages.length) {
			length = this._pages.length;
			$.proxy(this._overrides.to, this._core)(this._pages[((position % length) + length) % length].start, speed);
		} else {
			$.proxy(this._overrides.to, this._core)(position, speed);
		}
	};

	$.fn.owlCarousel.Constructor.Plugins.Navigation = Navigation;

})(window.Zepto || window.jQuery, window, document);

/**
 * Hash Plugin
 * @version 2.1.0
 * @author Artus Kolanowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
;(function($, window, document, undefined) {
	'use strict';

	/**
	 * Creates the hash plugin.
	 * @class The Hash Plugin
	 * @param {Owl} carousel - The Owl Carousel
	 */
	var Hash = function(carousel) {
		/**
		 * Reference to the core.
		 * @protected
		 * @type {Owl}
		 */
		this._core = carousel;

		/**
		 * Hash index for the items.
		 * @protected
		 * @type {Object}
		 */
		this._hashes = {};

		/**
		 * The carousel element.
		 * @type {jQuery}
		 */
		this.$element = this._core.$element;

		/**
		 * All event handlers.
		 * @protected
		 * @type {Object}
		 */
		this._handlers = {
			'initialized.owl.carousel': $.proxy(function(e) {
				if (e.namespace && this._core.settings.startPosition === 'URLHash') {
					$(window).trigger('hashchange.owl.navigation');
				}
			}, this),
			'prepared.owl.carousel': $.proxy(function(e) {
				if (e.namespace) {
					var hash = $(e.content).find('[data-hash]').addBack('[data-hash]').attr('data-hash');

					if (!hash) {
						return;
					}

					this._hashes[hash] = e.content;
				}
			}, this),
			'changed.owl.carousel': $.proxy(function(e) {
				if (e.namespace && e.property.name === 'position') {
					var current = this._core.items(this._core.relative(this._core.current())),
						hash = $.map(this._hashes, function(item, hash) {
							return item === current ? hash : null;
						}).join();

					if (!hash || window.location.hash.slice(1) === hash) {
						return;
					}

					window.location.hash = hash;
				}
			}, this)
		};

		// set default options
		this._core.options = $.extend({}, Hash.Defaults, this._core.options);

		// register the event handlers
		this.$element.on(this._handlers);

		// register event listener for hash navigation
		$(window).on('hashchange.owl.navigation', $.proxy(function(e) {
			var hash = window.location.hash.substring(1),
				items = this._core.$stage.children(),
				position = this._hashes[hash] && items.index(this._hashes[hash]);

			if (position === undefined || position === this._core.current()) {
				return;
			}

			this._core.to(this._core.relative(position), false, true);
		}, this));
	};

	/**
	 * Default options.
	 * @public
	 */
	Hash.Defaults = {
		URLhashListener: false
	};

	/**
	 * Destroys the plugin.
	 * @public
	 */
	Hash.prototype.destroy = function() {
		var handler, property;

		$(window).off('hashchange.owl.navigation');

		for (handler in this._handlers) {
			this._core.$element.off(handler, this._handlers[handler]);
		}
		for (property in Object.getOwnPropertyNames(this)) {
			typeof this[property] != 'function' && (this[property] = null);
		}
	};

	$.fn.owlCarousel.Constructor.Plugins.Hash = Hash;

})(window.Zepto || window.jQuery, window, document);

/**
 * Support Plugin
 *
 * @version 2.1.0
 * @author Vivid Planet Software GmbH
 * @author Artus Kolanowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
;(function($, window, document, undefined) {

	var style = $('<support>').get(0).style,
		prefixes = 'Webkit Moz O ms'.split(' '),
		events = {
			transition: {
				end: {
					WebkitTransition: 'webkitTransitionEnd',
					MozTransition: 'transitionend',
					OTransition: 'oTransitionEnd',
					transition: 'transitionend'
				}
			},
			animation: {
				end: {
					WebkitAnimation: 'webkitAnimationEnd',
					MozAnimation: 'animationend',
					OAnimation: 'oAnimationEnd',
					animation: 'animationend'
				}
			}
		},
		tests = {
			csstransforms: function() {
				return !!test('transform');
			},
			csstransforms3d: function() {
				return !!test('perspective');
			},
			csstransitions: function() {
				return !!test('transition');
			},
			cssanimations: function() {
				return !!test('animation');
			}
		};

	function test(property, prefixed) {
		var result = false,
			upper = property.charAt(0).toUpperCase() + property.slice(1);

		$.each((property + ' ' + prefixes.join(upper + ' ') + upper).split(' '), function(i, property) {
			if (style[property] !== undefined) {
				result = prefixed ? property : true;
				return false;
			}
		});

		return result;
	}

	function prefixed(property) {
		return test(property, true);
	}

	if (tests.csstransitions()) {
		/* jshint -W053 */
		$.support.transition = new String(prefixed('transition'))
		$.support.transition.end = events.transition.end[ $.support.transition ];
	}

	if (tests.cssanimations()) {
		/* jshint -W053 */
		$.support.animation = new String(prefixed('animation'))
		$.support.animation.end = events.animation.end[ $.support.animation ];
	}

	if (tests.csstransforms()) {
		/* jshint -W053 */
		$.support.transform = new String(prefixed('transform'));
		$.support.transform3d = tests.csstransforms3d();
	}

})(window.Zepto || window.jQuery, window, document);

/*---------------------- TheiaStickySidebar ----------------------*/
/*!
 * Theia Sticky Sidebar v1.6.0
 * https://github.com/WeCodePixels/theia-sticky-sidebar
 *
 * Glues your website's sidebars, making them permanently visible while scrolling.
 *
 * Copyright 2013-2016 WeCodePixels and other contributors
 * Released under the MIT license
 */

(function ($) {
    $.fn.theiaStickySidebar = function (options) {
        var defaults = {
            'containerSelector': '',
            'additionalMarginTop': 0,
            'additionalMarginBottom': 0,
            'updateSidebarHeight': true,
            'minWidth': 0,
            'disableOnResponsiveLayouts': true,
            'sidebarBehavior': 'modern'
        };
        options = $.extend(defaults, options);

        // Validate options
        options.additionalMarginTop = parseInt(options.additionalMarginTop) || 0;
        options.additionalMarginBottom = parseInt(options.additionalMarginBottom) || 0;

        tryInitOrHookIntoEvents(options, this);

        // Try doing init, otherwise hook into window.resize and document.scroll and try again then.
        function tryInitOrHookIntoEvents(options, $that) {
            var success = tryInit(options, $that);

            if (!success) {
                console.log('TSS: Body width smaller than options.minWidth. Init is delayed.');

                $(document).scroll(function (options, $that) {
                    return function (evt) {
                        var success = tryInit(options, $that);

                        if (success) {
                            $(this).unbind(evt);
                        }
                    };
                }(options, $that));
                $(window).resize(function (options, $that) {
                    return function (evt) {
                        var success = tryInit(options, $that);

                        if (success) {
                            $(this).unbind(evt);
                        }
                    };
                }(options, $that))
            }
        }

        // Try doing init if proper conditions are met.
        function tryInit(options, $that) {
            if (options.initialized === true) {
                return true;
            }

            if ($('body').width() < options.minWidth) {
                return false;
            }

            init(options, $that);

            return true;
        }

        // Init the sticky sidebar(s).
        function init(options, $that) {
            options.initialized = true;

            // Add CSS
            $('head').append($('<style>.theiaStickySidebar:after {content: ""; display: table; clear: both;}</style>'));

            $that.each(function () {
                var o = {};

                o.sidebar = $(this);

                // Save options
                o.options = options || {};

                // Get container
                o.container = $(o.options.containerSelector);
                if (o.container.length == 0) {
                    o.container = o.sidebar.parent();
                }

                // Create sticky sidebar
                o.sidebar.parents().css('-webkit-transform', 'none'); // Fix for WebKit bug - https://code.google.com/p/chromium/issues/detail?id=20574
                o.sidebar.css({
                    'position': 'relative',
                    'overflow': 'visible',
                    // The "box-sizing" must be set to "content-box" because we set a fixed height to this element when the sticky sidebar has a fixed position.
                    '-webkit-box-sizing': 'border-box',
                    '-moz-box-sizing': 'border-box',
                    'box-sizing': 'border-box'
                });

                // Get the sticky sidebar element. If none has been found, then create one.
                o.stickySidebar = o.sidebar.find('.theiaStickySidebar');
                if (o.stickySidebar.length == 0) {
                    // Remove <script> tags, otherwise they will be run again when added to the stickySidebar.
                    var javaScriptMIMETypes = /(?:text|application)\/(?:x-)?(?:javascript|ecmascript)/i;
                    o.sidebar.find('script').filter(function (index, script) {
                        return script.type.length === 0 || script.type.match(javaScriptMIMETypes);
                    }).remove();

                    o.stickySidebar = $('<div>').addClass('theiaStickySidebar').append(o.sidebar.children());
                    o.sidebar.append(o.stickySidebar);
                }

                // Get existing top and bottom margins and paddings
                o.marginBottom = parseInt(o.sidebar.css('margin-bottom'));
                o.paddingTop = parseInt(o.sidebar.css('padding-top'));
                o.paddingBottom = parseInt(o.sidebar.css('padding-bottom'));

                // Add a temporary padding rule to check for collapsable margins.
                var collapsedTopHeight = o.stickySidebar.offset().top;
                var collapsedBottomHeight = o.stickySidebar.outerHeight();
                o.stickySidebar.css('padding-top', 1);
                o.stickySidebar.css('padding-bottom', 1);
                collapsedTopHeight -= o.stickySidebar.offset().top;
                collapsedBottomHeight = o.stickySidebar.outerHeight() - collapsedBottomHeight - collapsedTopHeight;
                if (collapsedTopHeight == 0) {
                    o.stickySidebar.css('padding-top', 0);
                    o.stickySidebarPaddingTop = 0;
                }
                else {
                    o.stickySidebarPaddingTop = 1;
                }

                if (collapsedBottomHeight == 0) {
                    o.stickySidebar.css('padding-bottom', 0);
                    o.stickySidebarPaddingBottom = 0;
                }
                else {
                    o.stickySidebarPaddingBottom = 1;
                }

                // We use this to know whether the user is scrolling up or down.
                o.previousScrollTop = null;

                // Scroll top (value) when the sidebar has fixed position.
                o.fixedScrollTop = 0;

                // Set sidebar to default values.
                resetSidebar();

                o.onScroll = function (o) {
                    // Stop if the sidebar isn't visible.
                    if (!o.stickySidebar.is(":visible")) {
                        return;
                    }

                    // Stop if the window is too small.
                    if ($('body').width() < o.options.minWidth) {
                        resetSidebar();
                        return;
                    }

                    // Stop if the sidebar width is larger than the container width (e.g. the theme is responsive and the sidebar is now below the content)
                    if (o.options.disableOnResponsiveLayouts) {
                        var sidebarWidth = o.sidebar.outerWidth(o.sidebar.css('float') == 'none');

                        if (sidebarWidth + 50 > o.container.width()) {
                            resetSidebar();
                            return;
                        }
                    }

                    var scrollTop = $(document).scrollTop();
                    var position = 'static';

                    // If the user has scrolled down enough for the sidebar to be clipped at the top, then we can consider changing its position.
                    if (scrollTop >= o.sidebar.offset().top + (o.paddingTop - o.options.additionalMarginTop)) {
                        // The top and bottom offsets, used in various calculations.
                        var offsetTop = o.paddingTop + options.additionalMarginTop;
                        var offsetBottom = o.paddingBottom + o.marginBottom + options.additionalMarginBottom;

                        // All top and bottom positions are relative to the window, not to the parent elemnts.
                        var containerTop = o.sidebar.offset().top;
                        var containerBottom = o.sidebar.offset().top + getClearedHeight(o.container);

                        // The top and bottom offsets relative to the window screen top (zero) and bottom (window height).
                        var windowOffsetTop = 0 + options.additionalMarginTop;
                        var windowOffsetBottom;

                        var sidebarSmallerThanWindow = (o.stickySidebar.outerHeight() + offsetTop + offsetBottom) < $(window).height();
                        if (sidebarSmallerThanWindow) {
                            windowOffsetBottom = windowOffsetTop + o.stickySidebar.outerHeight();
                        }
                        else {
                            windowOffsetBottom = $(window).height() - o.marginBottom - o.paddingBottom - options.additionalMarginBottom;
                        }

                        var staticLimitTop = containerTop - scrollTop + o.paddingTop;
                        var staticLimitBottom = containerBottom - scrollTop - o.paddingBottom - o.marginBottom;

                        var top = o.stickySidebar.offset().top - scrollTop;
                        var scrollTopDiff = o.previousScrollTop - scrollTop;

                        // If the sidebar position is fixed, then it won't move up or down by itself. So, we manually adjust the top coordinate.
                        if (o.stickySidebar.css('position') == 'fixed') {
                            if (o.options.sidebarBehavior == 'modern') {
                                top += scrollTopDiff;
                            }
                        }

                        if (o.options.sidebarBehavior == 'stick-to-top') {
                            top = options.additionalMarginTop;
                        }

                        if (o.options.sidebarBehavior == 'stick-to-bottom') {
                            top = windowOffsetBottom - o.stickySidebar.outerHeight();
                        }

                        if (scrollTopDiff > 0) { // If the user is scrolling up.
                            top = Math.min(top, windowOffsetTop);
                        }
                        else { // If the user is scrolling down.
                            top = Math.max(top, windowOffsetBottom - o.stickySidebar.outerHeight());
                        }

                        top = Math.max(top, staticLimitTop);

                        top = Math.min(top, staticLimitBottom - o.stickySidebar.outerHeight());

                        // If the sidebar is the same height as the container, we won't use fixed positioning.
                        var sidebarSameHeightAsContainer = o.container.height() == o.stickySidebar.outerHeight();

                        if (!sidebarSameHeightAsContainer && top == windowOffsetTop) {
                            position = 'fixed';
                        }
                        else if (!sidebarSameHeightAsContainer && top == windowOffsetBottom - o.stickySidebar.outerHeight()) {
                            position = 'fixed';
                        }
                        else if (scrollTop + top - o.sidebar.offset().top - o.paddingTop <= options.additionalMarginTop) {
                            // Stuck to the top of the page. No special behavior.
                            position = 'static';
                        }
                        else {
                            // Stuck to the bottom of the page.
                            position = 'absolute';
                        }
                    }

                    /*
                     * Performance notice: It's OK to set these CSS values at each resize/scroll, even if they don't change.
                     * It's way slower to first check if the values have changed.
                     */
                    if (position == 'fixed') {
                        var scrollLeft = $(document).scrollLeft();

                        o.stickySidebar.css({
                            'position': 'fixed',
                            'width': getWidthForObject(o.stickySidebar) + 'px',
                            'transform': 'translateY(' + top + 'px)',
                            'left': (o.sidebar.offset().left + parseInt(o.sidebar.css('padding-left')) - scrollLeft) + 'px',
                            'top': '0px'
                        });
                    }
                    else if (position == 'absolute') {
                        var css = {};

                        if (o.stickySidebar.css('position') != 'absolute') {
                            css.position = 'absolute';
                            css.transform = 'translateY(' + (scrollTop + top - o.sidebar.offset().top - o.stickySidebarPaddingTop - o.stickySidebarPaddingBottom) + 'px)';
                            css.top = '0px';
                        }

                        css.width = getWidthForObject(o.stickySidebar) + 'px';
                        css.left = '';

                        o.stickySidebar.css(css);
                    }
                    else if (position == 'static') {
                        resetSidebar();
                    }

                    if (position != 'static') {
                        if (o.options.updateSidebarHeight == true) {
                            o.sidebar.css({
                                'min-height': o.stickySidebar.outerHeight() + o.stickySidebar.offset().top - o.sidebar.offset().top + o.paddingBottom
                            });
                        }
                    }

                    o.previousScrollTop = scrollTop;
                };

                // Initialize the sidebar's position.
                o.onScroll(o);

                // Recalculate the sidebar's position on every scroll and resize.
                $(document).scroll(function (o) {
                    return function () {
                        o.onScroll(o);
                    };
                }(o));
                $(window).resize(function (o) {
                    return function () {
                        o.stickySidebar.css({'position': 'static'});
                        o.onScroll(o);
                    };
                }(o));

                // Recalculate the sidebar's position every time the sidebar changes its size.
                if (typeof ResizeSensor !== 'undefined') {
                    new ResizeSensor(o.stickySidebar[0], function (o) {
                        return function () {
                            o.onScroll(o);
                        };
                    }(o));
                }

                // Reset the sidebar to its default state
                function resetSidebar() {
                    o.fixedScrollTop = 0;
                    o.sidebar.css({
                        'min-height': '1px'
                    });
                    o.stickySidebar.css({
                        'position': 'static',
                        'width': '',
                        'transform': 'none'
                    });
                }

                // Get the height of a div as if its floated children were cleared. Note that this function fails if the floats are more than one level deep.
                function getClearedHeight(e) {
                    var height = e.height();

                    e.children().each(function () {
                        height = Math.max(height, $(this).height());
                    });

                    return height;
                }
            });
        }

        function getWidthForObject(object) {
            var width;

            try {
                width = object[0].getBoundingClientRect().width;
            }
            catch (err) {
            }

            if (typeof width === "undefined") {
                width = object.width();
            }

            return width;
        }
    }
})(jQuery);

/*---------------------- mCustomScrollbar ----------------------*/
/* == malihu jquery custom scrollbar plugin == Version: 3.0.2, License: MIT License (MIT) */
(function(h,l,m,d){var e="mCustomScrollbar",a="mCS",k=".mCustomScrollbar",f={setWidth:false,setHeight:false,setTop:0,setLeft:0,axis:"y",scrollbarPosition:"inside",scrollInertia:950,autoDraggerLength:true,autoHideScrollbar:false,autoExpandScrollbar:false,alwaysShowScrollbar:0,snapAmount:null,snapOffset:0,mouseWheel:{enable:true,scrollAmount:"auto",axis:"y",preventDefault:false,deltaFactor:"auto",normalizeDelta:false,invert:false,disableOver:["select","option","keygen","datalist","textarea"]},scrollButtons:{enable:false,scrollType:"stepless",scrollAmount:"auto"},keyboard:{enable:true,scrollType:"stepless",scrollAmount:"auto"},contentTouchScroll:25,advanced:{autoExpandHorizontalScroll:false,autoScrollOnFocus:"input,textarea,select,button,datalist,keygen,a[tabindex],area,object,[contenteditable='true']",updateOnContentResize:true,updateOnImageLoad:true,updateOnSelectorChange:false},theme:"light",callbacks:{onScrollStart:false,onScroll:false,onTotalScroll:false,onTotalScrollBack:false,whileScrolling:false,onTotalScrollOffset:0,onTotalScrollBackOffset:0,alwaysTriggerOffsets:true},live:false,liveSelector:null},j=0,o={},c=function(p){if(o[p]){clearTimeout(o[p]);g._delete.call(null,o[p])}},i=(l.attachEvent&&!l.addEventListener)?1:0,n=false,b={init:function(q){var q=h.extend(true,{},f,q),p=g._selector.call(this);if(q.live){var s=q.liveSelector||this.selector||k,r=h(s);if(q.live==="off"){c(s);return}o[s]=setTimeout(function(){r.mCustomScrollbar(q);if(q.live==="once"&&r.length){c(s)}},500)}else{c(s)}q.setWidth=(q.set_width)?q.set_width:q.setWidth;q.setHeight=(q.set_height)?q.set_height:q.setHeight;q.axis=(q.horizontalScroll)?"x":g._findAxis.call(null,q.axis);q.scrollInertia=q.scrollInertia<17?17:q.scrollInertia;if(typeof q.mouseWheel!=="object"&&q.mouseWheel==true){q.mouseWheel={enable:true,scrollAmount:"auto",axis:"y",preventDefault:false,deltaFactor:"auto",normalizeDelta:false,invert:false}}q.mouseWheel.scrollAmount=!q.mouseWheelPixels?q.mouseWheel.scrollAmount:q.mouseWheelPixels;q.mouseWheel.normalizeDelta=!q.advanced.normalizeMouseWheelDelta?q.mouseWheel.normalizeDelta:q.advanced.normalizeMouseWheelDelta;q.scrollButtons.scrollType=g._findScrollButtonsType.call(null,q.scrollButtons.scrollType);g._theme.call(null,q);return h(p).each(function(){var u=h(this);if(!u.data(a)){u.data(a,{idx:++j,opt:q,scrollRatio:{y:null,x:null},overflowed:null,bindEvents:false,tweenRunning:false,sequential:{},langDir:u.css("direction"),cbOffsets:null,trigger:null});var w=u.data(a).opt,v=u.data("mcs-axis"),t=u.data("mcs-scrollbar-position"),x=u.data("mcs-theme");if(v){w.axis=v}if(t){w.scrollbarPosition=t}if(x){w.theme=x;g._theme.call(null,w)}g._pluginMarkup.call(this);b.update.call(null,u)}})},update:function(q){var p=q||g._selector.call(this);return h(p).each(function(){var t=h(this);if(t.data(a)){var v=t.data(a),u=v.opt,r=h("#mCSB_"+v.idx+"_container"),s=[h("#mCSB_"+v.idx+"_dragger_vertical"),h("#mCSB_"+v.idx+"_dragger_horizontal")];if(!r.length){return}if(v.tweenRunning){g._stop.call(null,t)}if(t.hasClass("mCS_disabled")){t.removeClass("mCS_disabled")}if(t.hasClass("mCS_destroyed")){t.removeClass("mCS_destroyed")}g._maxHeight.call(this);g._expandContentHorizontally.call(this);if(u.axis!=="y"&&!u.advanced.autoExpandHorizontalScroll){r.css("width",g._contentWidth(r.children()))}v.overflowed=g._overflowed.call(this);g._scrollbarVisibility.call(this);if(u.autoDraggerLength){g._setDraggerLength.call(this)}g._scrollRatio.call(this);g._bindEvents.call(this);var w=[Math.abs(r[0].offsetTop),Math.abs(r[0].offsetLeft)];if(u.axis!=="x"){if(!v.overflowed[0]){g._resetContentPosition.call(this);if(u.axis==="y"){g._unbindEvents.call(this)}else{if(u.axis==="yx"&&v.overflowed[1]){g._scrollTo.call(this,t,w[1].toString(),{dir:"x",dur:0,overwrite:"none"})}}}else{if(s[0].height()>s[0].parent().height()){g._resetContentPosition.call(this)}else{g._scrollTo.call(this,t,w[0].toString(),{dir:"y",dur:0,overwrite:"none"})}}}if(u.axis!=="y"){if(!v.overflowed[1]){g._resetContentPosition.call(this);if(u.axis==="x"){g._unbindEvents.call(this)}else{if(u.axis==="yx"&&v.overflowed[0]){g._scrollTo.call(this,t,w[0].toString(),{dir:"y",dur:0,overwrite:"none"})}}}else{if(s[1].width()>s[1].parent().width()){g._resetContentPosition.call(this)}else{g._scrollTo.call(this,t,w[1].toString(),{dir:"x",dur:0,overwrite:"none"})}}}g._autoUpdate.call(this)}})},scrollTo:function(r,q){if(typeof r=="undefined"||r==null){return}var p=g._selector.call(this);return h(p).each(function(){var u=h(this);if(u.data(a)){var x=u.data(a),w=x.opt,v={trigger:"external",scrollInertia:w.scrollInertia,scrollEasing:"mcsEaseInOut",moveDragger:false,callbacks:true,onStart:true,onUpdate:true,onComplete:true},s=h.extend(true,{},v,q),y=g._arr.call(this,r),t=s.scrollInertia<17?17:s.scrollInertia;y[0]=g._to.call(this,y[0],"y");y[1]=g._to.call(this,y[1],"x");if(s.moveDragger){y[0]*=x.scrollRatio.y;y[1]*=x.scrollRatio.x}s.dur=t;setTimeout(function(){if(y[0]!==null&&typeof y[0]!=="undefined"&&w.axis!=="x"&&x.overflowed[0]){s.dir="y";s.overwrite="all";g._scrollTo.call(this,u,y[0].toString(),s)}if(y[1]!==null&&typeof y[1]!=="undefined"&&w.axis!=="y"&&x.overflowed[1]){s.dir="x";s.overwrite="none";g._scrollTo.call(this,u,y[1].toString(),s)}},60)}})},stop:function(){var p=g._selector.call(this);return h(p).each(function(){var q=h(this);if(q.data(a)){g._stop.call(null,q)}})},disable:function(q){var p=g._selector.call(this);return h(p).each(function(){var r=h(this);if(r.data(a)){var t=r.data(a),s=t.opt;g._autoUpdate.call(this,"remove");g._unbindEvents.call(this);if(q){g._resetContentPosition.call(this)}g._scrollbarVisibility.call(this,true);r.addClass("mCS_disabled")}})},destroy:function(){var p=g._selector.call(this);return h(p).each(function(){var s=h(this);if(s.data(a)){var u=s.data(a),t=u.opt,q=h("#mCSB_"+u.idx),r=h("#mCSB_"+u.idx+"_container"),v=h(".mCSB_"+u.idx+"_scrollbar");if(t.live){c(p)}g._autoUpdate.call(this,"remove");g._unbindEvents.call(this);g._resetContentPosition.call(this);s.removeData(a);g._delete.call(null,this.mcs);v.remove();q.replaceWith(r.contents());s.removeClass(e+" _"+a+"_"+u.idx+" mCS-autoHide mCS-dir-rtl mCS_no_scrollbar mCS_disabled").addClass("mCS_destroyed")}})}},g={_selector:function(){return(typeof h(this)!=="object"||h(this).length<1)?k:this},_theme:function(s){var r=["rounded","rounded-dark","rounded-dots","rounded-dots-dark"],q=["rounded-dots","rounded-dots-dark","3d","3d-dark","3d-thick","3d-thick-dark","inset","inset-dark","inset-2","inset-2-dark","inset-3","inset-3-dark"],p=["minimal","minimal-dark"],u=["minimal","minimal-dark"],t=["minimal","minimal-dark"];s.autoDraggerLength=h.inArray(s.theme,r)>-1?false:s.autoDraggerLength;s.autoExpandScrollbar=h.inArray(s.theme,q)>-1?false:s.autoExpandScrollbar;s.scrollButtons.enable=h.inArray(s.theme,p)>-1?false:s.scrollButtons.enable;s.autoHideScrollbar=h.inArray(s.theme,u)>-1?true:s.autoHideScrollbar;s.scrollbarPosition=h.inArray(s.theme,t)>-1?"outside":s.scrollbarPosition},_findAxis:function(p){return(p==="yx"||p==="xy"||p==="auto")?"yx":(p==="x"||p==="horizontal")?"x":"y"},_findScrollButtonsType:function(p){return(p==="stepped"||p==="pixels"||p==="step"||p==="click")?"stepped":"stepless"},_pluginMarkup:function(){var y=h(this),x=y.data(a),r=x.opt,t=r.autoExpandScrollbar?" mCSB_scrollTools_onDrag_expand":"",B=["<div id='mCSB_"+x.idx+"_scrollbar_vertical' class='mCSB_scrollTools mCSB_"+x.idx+"_scrollbar mCS-"+r.theme+" mCSB_scrollTools_vertical"+t+"'><div class='mCSB_draggerContainer'><div id='mCSB_"+x.idx+"_dragger_vertical' class='mCSB_dragger' style='position:absolute;' oncontextmenu='return false;'><div class='mCSB_dragger_bar' /></div><div class='mCSB_draggerRail' /></div></div>","<div id='mCSB_"+x.idx+"_scrollbar_horizontal' class='mCSB_scrollTools mCSB_"+x.idx+"_scrollbar mCS-"+r.theme+" mCSB_scrollTools_horizontal"+t+"'><div class='mCSB_draggerContainer'><div id='mCSB_"+x.idx+"_dragger_horizontal' class='mCSB_dragger' style='position:absolute;' oncontextmenu='return false;'><div class='mCSB_dragger_bar' /></div><div class='mCSB_draggerRail' /></div></div>"],u=r.axis==="yx"?"mCSB_vertical_horizontal":r.axis==="x"?"mCSB_horizontal":"mCSB_vertical",w=r.axis==="yx"?B[0]+B[1]:r.axis==="x"?B[1]:B[0],v=r.axis==="yx"?"<div id='mCSB_"+x.idx+"_container_wrapper' class='mCSB_container_wrapper' />":"",s=r.autoHideScrollbar?" mCS-autoHide":"",p=(r.axis!=="x"&&x.langDir==="rtl")?" mCS-dir-rtl":"";if(r.setWidth){y.css("width",r.setWidth)}if(r.setHeight){y.css("height",r.setHeight)}r.setLeft=(r.axis!=="y"&&x.langDir==="rtl")?"989999px":r.setLeft;y.addClass(e+" _"+a+"_"+x.idx+s+p).wrapInner("<div id='mCSB_"+x.idx+"' class='mCustomScrollBox mCS-"+r.theme+" "+u+"'><div id='mCSB_"+x.idx+"_container' class='mCSB_container' style='position:relative; top:"+r.setTop+"; left:"+r.setLeft+";' dir="+x.langDir+" /></div>");var q=h("#mCSB_"+x.idx),z=h("#mCSB_"+x.idx+"_container");if(r.axis!=="y"&&!r.advanced.autoExpandHorizontalScroll){z.css("width",g._contentWidth(z.children()))}if(r.scrollbarPosition==="outside"){if(y.css("position")==="static"){y.css("position","relative")}y.css("overflow","visible");q.addClass("mCSB_outside").after(w)}else{q.addClass("mCSB_inside").append(w);z.wrap(v)}g._scrollButtons.call(this);var A=[h("#mCSB_"+x.idx+"_dragger_vertical"),h("#mCSB_"+x.idx+"_dragger_horizontal")];A[0].css("min-height",A[0].height());A[1].css("min-width",A[1].width())},_contentWidth:function(p){return Math.max.apply(Math,p.map(function(){return h(this).outerWidth(true)}).get())},_expandContentHorizontally:function(){var q=h(this),s=q.data(a),r=s.opt,p=h("#mCSB_"+s.idx+"_container");if(r.advanced.autoExpandHorizontalScroll&&r.axis!=="y"){p.css({position:"absolute",width:"auto"}).wrap("<div class='mCSB_h_wrapper' style='position:relative; left:0; width:999999px;' />").css({width:(Math.ceil(p[0].getBoundingClientRect().right+0.4)-Math.floor(p[0].getBoundingClientRect().left)),position:"relative"}).unwrap()}},_scrollButtons:function(){var s=h(this),u=s.data(a),t=u.opt,q=h(".mCSB_"+u.idx+"_scrollbar:first"),r=["<a href='#' class='mCSB_buttonUp' oncontextmenu='return false;' />","<a href='#' class='mCSB_buttonDown' oncontextmenu='return false;' />","<a href='#' class='mCSB_buttonLeft' oncontextmenu='return false;' />","<a href='#' class='mCSB_buttonRight' oncontextmenu='return false;' />"],p=[(t.axis==="x"?r[2]:r[0]),(t.axis==="x"?r[3]:r[1]),r[2],r[3]];if(t.scrollButtons.enable){q.prepend(p[0]).append(p[1]).next(".mCSB_scrollTools").prepend(p[2]).append(p[3])}},_maxHeight:function(){var t=h(this),w=t.data(a),v=w.opt,r=h("#mCSB_"+w.idx),q=t.css("max-height"),s=q.indexOf("%")!==-1,p=t.css("box-sizing");if(q!=="none"){var u=s?t.parent().height()*parseInt(q)/100:parseInt(q);if(p==="border-box"){u-=((t.innerHeight()-t.height())+(t.outerHeight()-t.innerHeight()))}r.css("max-height",Math.round(u))}},_setDraggerLength:function(){var u=h(this),s=u.data(a),p=h("#mCSB_"+s.idx),v=h("#mCSB_"+s.idx+"_container"),y=[h("#mCSB_"+s.idx+"_dragger_vertical"),h("#mCSB_"+s.idx+"_dragger_horizontal")],t=[p.height()/v.outerHeight(false),p.width()/v.outerWidth(false)],q=[parseInt(y[0].css("min-height")),Math.round(t[0]*y[0].parent().height()),parseInt(y[1].css("min-width")),Math.round(t[1]*y[1].parent().width())],r=i&&(q[1]<q[0])?q[0]:q[1],x=i&&(q[3]<q[2])?q[2]:q[3];y[0].css({height:r,"max-height":(y[0].parent().height()-10)}).find(".mCSB_dragger_bar").css({"line-height":q[0]+"px"});y[1].css({width:x,"max-width":(y[1].parent().width()-10)})},_scrollRatio:function(){var t=h(this),v=t.data(a),q=h("#mCSB_"+v.idx),r=h("#mCSB_"+v.idx+"_container"),s=[h("#mCSB_"+v.idx+"_dragger_vertical"),h("#mCSB_"+v.idx+"_dragger_horizontal")],u=[r.outerHeight(false)-q.height(),r.outerWidth(false)-q.width()],p=[u[0]/(s[0].parent().height()-s[0].height()),u[1]/(s[1].parent().width()-s[1].width())];v.scrollRatio={y:p[0],x:p[1]}},_onDragClasses:function(r,t,q){var s=q?"mCSB_dragger_onDrag_expanded":"",p=["mCSB_dragger_onDrag","mCSB_scrollTools_onDrag"],u=r.closest(".mCSB_scrollTools");if(t==="active"){r.toggleClass(p[0]+" "+s);u.toggleClass(p[1]);r[0]._draggable=r[0]._draggable?0:1}else{if(!r[0]._draggable){if(t==="hide"){r.removeClass(p[0]);u.removeClass(p[1])}else{r.addClass(p[0]);u.addClass(p[1])}}}},_overflowed:function(){var t=h(this),u=t.data(a),q=h("#mCSB_"+u.idx),s=h("#mCSB_"+u.idx+"_container"),r=u.overflowed==null?s.height():s.outerHeight(false),p=u.overflowed==null?s.width():s.outerWidth(false);return[r>q.height(),p>q.width()]},_resetContentPosition:function(){var t=h(this),v=t.data(a),u=v.opt,q=h("#mCSB_"+v.idx),r=h("#mCSB_"+v.idx+"_container"),s=[h("#mCSB_"+v.idx+"_dragger_vertical"),h("#mCSB_"+v.idx+"_dragger_horizontal")];g._stop(t);if((u.axis!=="x"&&!v.overflowed[0])||(u.axis==="y"&&v.overflowed[0])){s[0].add(r).css("top",0)}if((u.axis!=="y"&&!v.overflowed[1])||(u.axis==="x"&&v.overflowed[1])){var p=dx=0;if(v.langDir==="rtl"){p=q.width()-r.outerWidth(false);dx=Math.abs(p/v.scrollRatio.x)}r.css("left",p);s[1].css("left",dx)}},_bindEvents:function(){var r=h(this),t=r.data(a),s=t.opt;if(!t.bindEvents){g._draggable.call(this);if(s.contentTouchScroll){g._contentDraggable.call(this)}if(s.mouseWheel.enable){function q(){p=setTimeout(function(){if(!h.event.special.mousewheel){q()}else{clearTimeout(p);g._mousewheel.call(r[0])}},1000)}var p;q()}g._draggerRail.call(this);g._wrapperScroll.call(this);if(s.advanced.autoScrollOnFocus){g._focus.call(this)}if(s.scrollButtons.enable){g._buttons.call(this)}if(s.keyboard.enable){g._keyboard.call(this)}t.bindEvents=true}},_unbindEvents:function(){var s=h(this),t=s.data(a),p=a+"_"+t.idx,u=".mCSB_"+t.idx+"_scrollbar",r=h("#mCSB_"+t.idx+",#mCSB_"+t.idx+"_container,#mCSB_"+t.idx+"_container_wrapper,"+u+" .mCSB_draggerContainer,#mCSB_"+t.idx+"_dragger_vertical,#mCSB_"+t.idx+"_dragger_horizontal,"+u+">a"),q=h("#mCSB_"+t.idx+"_container");if(t.bindEvents){h(m).unbind("."+p);r.each(function(){h(this).unbind("."+p)});clearTimeout(s[0]._focusTimeout);g._delete.call(null,s[0]._focusTimeout);clearTimeout(t.sequential.step);g._delete.call(null,t.sequential.step);clearTimeout(q[0].onCompleteTimeout);g._delete.call(null,q[0].onCompleteTimeout);t.bindEvents=false}},_scrollbarVisibility:function(q){var t=h(this),v=t.data(a),u=v.opt,p=h("#mCSB_"+v.idx+"_container_wrapper"),r=p.length?p:h("#mCSB_"+v.idx+"_container"),w=[h("#mCSB_"+v.idx+"_scrollbar_vertical"),h("#mCSB_"+v.idx+"_scrollbar_horizontal")],s=[w[0].find(".mCSB_dragger"),w[1].find(".mCSB_dragger")];if(u.axis!=="x"){if(v.overflowed[0]&&!q){w[0].add(s[0]).add(w[0].children("a")).css("display","block");r.removeClass("mCS_no_scrollbar_y mCS_y_hidden")}else{if(u.alwaysShowScrollbar){if(u.alwaysShowScrollbar!==2){s[0].add(w[0].children("a")).css("display","none")}r.removeClass("mCS_y_hidden")}else{w[0].css("display","none");r.addClass("mCS_y_hidden")}r.addClass("mCS_no_scrollbar_y")}}if(u.axis!=="y"){if(v.overflowed[1]&&!q){w[1].add(s[1]).add(w[1].children("a")).css("display","block");r.removeClass("mCS_no_scrollbar_x mCS_x_hidden")}else{if(u.alwaysShowScrollbar){if(u.alwaysShowScrollbar!==2){s[1].add(w[1].children("a")).css("display","none")}r.removeClass("mCS_x_hidden")}else{w[1].css("display","none");r.addClass("mCS_x_hidden")}r.addClass("mCS_no_scrollbar_x")}}if(!v.overflowed[0]&&!v.overflowed[1]){t.addClass("mCS_no_scrollbar")}else{t.removeClass("mCS_no_scrollbar")}},_coordinates:function(q){var p=q.type;switch(p){case"pointerdown":case"MSPointerDown":case"pointermove":case"MSPointerMove":case"pointerup":case"MSPointerUp":return[q.originalEvent.pageY,q.originalEvent.pageX];break;case"touchstart":case"touchmove":case"touchend":var r=q.originalEvent.touches[0]||q.originalEvent.changedTouches[0];return[r.pageY,r.pageX];break;default:return[q.pageY,q.pageX]}},_draggable:function(){var u=h(this),s=u.data(a),p=s.opt,r=a+"_"+s.idx,t=["mCSB_"+s.idx+"_dragger_vertical","mCSB_"+s.idx+"_dragger_horizontal"],v=h("#mCSB_"+s.idx+"_container"),w=h("#"+t[0]+",#"+t[1]),A,y,z;w.bind("mousedown."+r+" touchstart."+r+" pointerdown."+r+" MSPointerDown."+r,function(E){E.stopImmediatePropagation();E.preventDefault();if(!g._mouseBtnLeft(E)){return}n=true;if(i){m.onselectstart=function(){return false}}x(false);g._stop(u);A=h(this);var F=A.offset(),G=g._coordinates(E)[0]-F.top,B=g._coordinates(E)[1]-F.left,D=A.height()+F.top,C=A.width()+F.left;if(G<D&&G>0&&B<C&&B>0){y=G;z=B}g._onDragClasses(A,"active",p.autoExpandScrollbar)}).bind("touchmove."+r,function(C){C.stopImmediatePropagation();C.preventDefault();var D=A.offset(),E=g._coordinates(C)[0]-D.top,B=g._coordinates(C)[1]-D.left;q(y,z,E,B)});h(m).bind("mousemove."+r+" pointermove."+r+" MSPointerMove."+r,function(C){if(A){var D=A.offset(),E=g._coordinates(C)[0]-D.top,B=g._coordinates(C)[1]-D.left;if(y===E){return}q(y,z,E,B)}}).add(w).bind("mouseup."+r+" touchend."+r+" pointerup."+r+" MSPointerUp."+r,function(B){if(A){g._onDragClasses(A,"active",p.autoExpandScrollbar);A=null}n=false;if(i){m.onselectstart=null}x(true)});function x(B){var C=v.find("iframe");if(!C.length){return}var D=!B?"none":"auto";C.css("pointer-events",D)}function q(D,E,G,B){v[0].idleTimer=p.scrollInertia<233?250:0;if(A.attr("id")===t[1]){var C="x",F=((A[0].offsetLeft-E)+B)*s.scrollRatio.x}else{var C="y",F=((A[0].offsetTop-D)+G)*s.scrollRatio.y}g._scrollTo(u,F.toString(),{dir:C,drag:true})}},_contentDraggable:function(){var y=h(this),K=y.data(a),I=K.opt,F=a+"_"+K.idx,v=h("#mCSB_"+K.idx),z=h("#mCSB_"+K.idx+"_container"),w=[h("#mCSB_"+K.idx+"_dragger_vertical"),h("#mCSB_"+K.idx+"_dragger_horizontal")],E,G,L,M,C=[],D=[],H,A,u,t,J,x,r=0,q,s=I.axis==="yx"?"none":"all";z.bind("touchstart."+F+" pointerdown."+F+" MSPointerDown."+F,function(N){if(!g._pointerTouch(N)||n){return}var O=z.offset();E=g._coordinates(N)[0]-O.top;G=g._coordinates(N)[1]-O.left}).bind("touchmove."+F+" pointermove."+F+" MSPointerMove."+F,function(Q){if(!g._pointerTouch(Q)||n){return}Q.stopImmediatePropagation();A=g._getTime();var P=v.offset(),S=g._coordinates(Q)[0]-P.top,U=g._coordinates(Q)[1]-P.left,R="mcsLinearOut";C.push(S);D.push(U);if(K.overflowed[0]){var O=w[0].parent().height()-w[0].height(),T=((E-S)>0&&(S-E)>-(O*K.scrollRatio.y))}if(K.overflowed[1]){var N=w[1].parent().width()-w[1].width(),V=((G-U)>0&&(U-G)>-(N*K.scrollRatio.x))}if(T||V){Q.preventDefault()}x=I.axis==="yx"?[(E-S),(G-U)]:I.axis==="x"?[null,(G-U)]:[(E-S),null];z[0].idleTimer=250;if(K.overflowed[0]){B(x[0],r,R,"y","all",true)}if(K.overflowed[1]){B(x[1],r,R,"x",s,true)}});v.bind("touchstart."+F+" pointerdown."+F+" MSPointerDown."+F,function(N){if(!g._pointerTouch(N)||n){return}N.stopImmediatePropagation();g._stop(y);H=g._getTime();var O=v.offset();L=g._coordinates(N)[0]-O.top;M=g._coordinates(N)[1]-O.left;C=[];D=[]}).bind("touchend."+F+" pointerup."+F+" MSPointerUp."+F,function(P){if(!g._pointerTouch(P)||n){return}P.stopImmediatePropagation();u=g._getTime();var N=v.offset(),T=g._coordinates(P)[0]-N.top,V=g._coordinates(P)[1]-N.left;if((u-A)>30){return}J=1000/(u-H);var Q="mcsEaseOut",R=J<2.5,W=R?[C[C.length-2],D[D.length-2]]:[0,0];t=R?[(T-W[0]),(V-W[1])]:[T-L,V-M];var O=[Math.abs(t[0]),Math.abs(t[1])];J=R?[Math.abs(t[0]/4),Math.abs(t[1]/4)]:[J,J];var U=[Math.abs(z[0].offsetTop)-(t[0]*p((O[0]/J[0]),J[0])),Math.abs(z[0].offsetLeft)-(t[1]*p((O[1]/J[1]),J[1]))];x=I.axis==="yx"?[U[0],U[1]]:I.axis==="x"?[null,U[1]]:[U[0],null];q=[(O[0]*4)+I.scrollInertia,(O[1]*4)+I.scrollInertia];var S=parseInt(I.contentTouchScroll)||0;x[0]=O[0]>S?x[0]:0;x[1]=O[1]>S?x[1]:0;if(K.overflowed[0]){B(x[0],q[0],Q,"y",s,false)}if(K.overflowed[1]){B(x[1],q[1],Q,"x",s,false)}});function p(P,N){var O=[N*1.5,N*2,N/1.5,N/2];if(P>90){return N>4?O[0]:O[3]}else{if(P>60){return N>3?O[3]:O[2]}else{if(P>30){return N>8?O[1]:N>6?O[0]:N>4?N:O[2]}else{return N>8?N:O[3]}}}}function B(P,R,S,O,N,Q){if(!P){return}g._scrollTo(y,P.toString(),{dur:R,scrollEasing:S,dir:O,overwrite:N,drag:Q})}},_mousewheel:function(){var s=h(this),u=s.data(a),t=u.opt,q=a+"_"+u.idx,p=h("#mCSB_"+u.idx),r=[h("#mCSB_"+u.idx+"_dragger_vertical"),h("#mCSB_"+u.idx+"_dragger_horizontal")];p.bind("mousewheel."+q,function(z,D){g._stop(s);if(g._disableMousewheel(s,z.target)){return}var B=t.mouseWheel.deltaFactor!=="auto"?parseInt(t.mouseWheel.deltaFactor):(i&&z.deltaFactor<100)?100:z.deltaFactor<40?40:z.deltaFactor||100;if(t.axis==="x"||t.mouseWheel.axis==="x"){var w="x",C=[Math.round(B*u.scrollRatio.x),parseInt(t.mouseWheel.scrollAmount)],y=t.mouseWheel.scrollAmount!=="auto"?C[1]:C[0]>=p.width()?p.width()*0.9:C[0],E=Math.abs(h("#mCSB_"+u.idx+"_container")[0].offsetLeft),A=r[1][0].offsetLeft,x=r[1].parent().width()-r[1].width(),v=z.deltaX||z.deltaY||D}else{var w="y",C=[Math.round(B*u.scrollRatio.y),parseInt(t.mouseWheel.scrollAmount)],y=t.mouseWheel.scrollAmount!=="auto"?C[1]:C[0]>=p.height()?p.height()*0.9:C[0],E=Math.abs(h("#mCSB_"+u.idx+"_container")[0].offsetTop),A=r[0][0].offsetTop,x=r[0].parent().height()-r[0].height(),v=z.deltaY||D}if((w==="y"&&!u.overflowed[0])||(w==="x"&&!u.overflowed[1])){return}if(t.mouseWheel.invert){v=-v}if(t.mouseWheel.normalizeDelta){v=v<0?-1:1}if((v>0&&A!==0)||(v<0&&A!==x)||t.mouseWheel.preventDefault){z.stopImmediatePropagation();z.preventDefault()}g._scrollTo(s,(E-(v*y)).toString(),{dir:w})})},_disableMousewheel:function(r,t){var p=t.nodeName.toLowerCase(),q=r.data(a).opt.mouseWheel.disableOver,s=["select","textarea"];return h.inArray(p,q)>-1&&!(h.inArray(p,s)>-1&&!h(t).is(":focus"))},_draggerRail:function(){var s=h(this),t=s.data(a),q=a+"_"+t.idx,r=h("#mCSB_"+t.idx+"_container"),u=r.parent(),p=h(".mCSB_"+t.idx+"_scrollbar .mCSB_draggerContainer");p.bind("touchstart."+q+" pointerdown."+q+" MSPointerDown."+q,function(v){n=true}).bind("touchend."+q+" pointerup."+q+" MSPointerUp."+q,function(v){n=false}).bind("click."+q,function(z){if(h(z.target).hasClass("mCSB_draggerContainer")||h(z.target).hasClass("mCSB_draggerRail")){g._stop(s);var w=h(this),y=w.find(".mCSB_dragger");if(w.parent(".mCSB_scrollTools_horizontal").length>0){if(!t.overflowed[1]){return}var v="x",x=z.pageX>y.offset().left?-1:1,A=Math.abs(r[0].offsetLeft)-(x*(u.width()*0.9))}else{if(!t.overflowed[0]){return}var v="y",x=z.pageY>y.offset().top?-1:1,A=Math.abs(r[0].offsetTop)-(x*(u.height()*0.9))}g._scrollTo(s,A.toString(),{dir:v,scrollEasing:"mcsEaseInOut"})}})},_focus:function(){var r=h(this),t=r.data(a),s=t.opt,p=a+"_"+t.idx,q=h("#mCSB_"+t.idx+"_container"),u=q.parent();q.bind("focusin."+p,function(x){var w=h(m.activeElement),y=q.find(".mCustomScrollBox").length,v=0;if(!w.is(s.advanced.autoScrollOnFocus)){return}g._stop(r);clearTimeout(r[0]._focusTimeout);r[0]._focusTimer=y?(v+17)*y:0;r[0]._focusTimeout=setTimeout(function(){var C=[w.offset().top-q.offset().top,w.offset().left-q.offset().left],B=[q[0].offsetTop,q[0].offsetLeft],z=[(B[0]+C[0]>=0&&B[0]+C[0]<u.height()-w.outerHeight(false)),(B[1]+C[1]>=0&&B[0]+C[1]<u.width()-w.outerWidth(false))],A=(s.axis==="yx"&&!z[0]&&!z[1])?"none":"all";if(s.axis!=="x"&&!z[0]){g._scrollTo(r,C[0].toString(),{dir:"y",scrollEasing:"mcsEaseInOut",overwrite:A,dur:v})}if(s.axis!=="y"&&!z[1]){g._scrollTo(r,C[1].toString(),{dir:"x",scrollEasing:"mcsEaseInOut",overwrite:A,dur:v})}},r[0]._focusTimer)})},_wrapperScroll:function(){var q=h(this),r=q.data(a),p=a+"_"+r.idx,s=h("#mCSB_"+r.idx+"_container").parent();s.bind("scroll."+p,function(t){s.scrollTop(0).scrollLeft(0)})},_buttons:function(){var u=h(this),w=u.data(a),v=w.opt,p=w.sequential,r=a+"_"+w.idx,t=h("#mCSB_"+w.idx+"_container"),s=".mCSB_"+w.idx+"_scrollbar",q=h(s+">a");q.bind("mousedown."+r+" touchstart."+r+" pointerdown."+r+" MSPointerDown."+r+" mouseup."+r+" touchend."+r+" pointerup."+r+" MSPointerUp."+r+" mouseout."+r+" pointerout."+r+" MSPointerOut."+r+" click."+r,function(z){z.preventDefault();if(!g._mouseBtnLeft(z)){return}var y=h(this).attr("class");p.type=v.scrollButtons.scrollType;switch(z.type){case"mousedown":case"touchstart":case"pointerdown":case"MSPointerDown":if(p.type==="stepped"){return}n=true;w.tweenRunning=false;x("on",y);break;case"mouseup":case"touchend":case"pointerup":case"MSPointerUp":case"mouseout":case"pointerout":case"MSPointerOut":if(p.type==="stepped"){return}n=false;if(p.dir){x("off",y)}break;case"click":if(p.type!=="stepped"||w.tweenRunning){return}x("on",y);break}function x(A,B){p.scrollAmount=v.snapAmount||v.scrollButtons.scrollAmount;g._sequentialScroll.call(this,u,A,B)}})},_keyboard:function(){var u=h(this),t=u.data(a),q=t.opt,x=t.sequential,s=a+"_"+t.idx,r=h("#mCSB_"+t.idx),w=h("#mCSB_"+t.idx+"_container"),p=w.parent(),v="input,textarea,select,datalist,keygen,[contenteditable='true']";r.attr("tabindex","0").bind("blur."+s+" keydown."+s+" keyup."+s,function(D){switch(D.type){case"blur":if(t.tweenRunning&&x.dir){y("off",null)}break;case"keydown":case"keyup":var A=D.keyCode?D.keyCode:D.which,B="on";if((q.axis!=="x"&&(A===38||A===40))||(q.axis!=="y"&&(A===37||A===39))){if(((A===38||A===40)&&!t.overflowed[0])||((A===37||A===39)&&!t.overflowed[1])){return}if(D.type==="keyup"){B="off"}if(!h(m.activeElement).is(v)){D.preventDefault();D.stopImmediatePropagation();y(B,A)}}else{if(A===33||A===34){if(t.overflowed[0]||t.overflowed[1]){D.preventDefault();D.stopImmediatePropagation()}if(D.type==="keyup"){g._stop(u);var C=A===34?-1:1;if(q.axis==="x"||(q.axis==="yx"&&t.overflowed[1]&&!t.overflowed[0])){var z="x",E=Math.abs(w[0].offsetLeft)-(C*(p.width()*0.9))}else{var z="y",E=Math.abs(w[0].offsetTop)-(C*(p.height()*0.9))}g._scrollTo(u,E.toString(),{dir:z,scrollEasing:"mcsEaseInOut"})}}else{if(A===35||A===36){if(!h(m.activeElement).is(v)){if(t.overflowed[0]||t.overflowed[1]){D.preventDefault();D.stopImmediatePropagation()}if(D.type==="keyup"){if(q.axis==="x"||(q.axis==="yx"&&t.overflowed[1]&&!t.overflowed[0])){var z="x",E=A===35?Math.abs(p.width()-w.outerWidth(false)):0}else{var z="y",E=A===35?Math.abs(p.height()-w.outerHeight(false)):0}g._scrollTo(u,E.toString(),{dir:z,scrollEasing:"mcsEaseInOut"})}}}}}break}function y(F,G){x.type=q.keyboard.scrollType;x.scrollAmount=q.snapAmount||q.keyboard.scrollAmount;if(x.type==="stepped"&&t.tweenRunning){return}g._sequentialScroll.call(this,u,F,G)}})},_sequentialScroll:function(r,u,s){var w=r.data(a),q=w.opt,y=w.sequential,x=h("#mCSB_"+w.idx+"_container"),p=y.type==="stepped"?true:false;switch(u){case"on":y.dir=[(s==="mCSB_buttonRight"||s==="mCSB_buttonLeft"||s===39||s===37?"x":"y"),(s==="mCSB_buttonUp"||s==="mCSB_buttonLeft"||s===38||s===37?-1:1)];g._stop(r);if(g._isNumeric(s)&&y.type==="stepped"){return}t(p);break;case"off":v();if(p||(w.tweenRunning&&y.dir)){t(true)}break}function t(z){var F=y.type!=="stepped",J=!z?1000/60:F?q.scrollInertia/1.5:q.scrollInertia,B=!z?2.5:F?7.5:40,I=[Math.abs(x[0].offsetTop),Math.abs(x[0].offsetLeft)],E=[w.scrollRatio.y>10?10:w.scrollRatio.y,w.scrollRatio.x>10?10:w.scrollRatio.x],C=y.dir[0]==="x"?I[1]+(y.dir[1]*(E[1]*B)):I[0]+(y.dir[1]*(E[0]*B)),H=y.dir[0]==="x"?I[1]+(y.dir[1]*parseInt(y.scrollAmount)):I[0]+(y.dir[1]*parseInt(y.scrollAmount)),G=y.scrollAmount!=="auto"?H:C,D=!z?"mcsLinear":F?"mcsLinearOut":"mcsEaseInOut",A=!z?false:true;if(z&&J<17){G=y.dir[0]==="x"?I[1]:I[0]}g._scrollTo(r,G.toString(),{dir:y.dir[0],scrollEasing:D,dur:J,onComplete:A});if(z){y.dir=false;return}clearTimeout(y.step);y.step=setTimeout(function(){t()},J)}function v(){clearTimeout(y.step);g._stop(r)}},_arr:function(r){var q=h(this).data(a).opt,p=[];if(typeof r==="function"){r=r()}if(!(r instanceof Array)){p[0]=r.y?r.y:r.x||q.axis==="x"?null:r;p[1]=r.x?r.x:r.y||q.axis==="y"?null:r}else{p=r.length>1?[r[0],r[1]]:q.axis==="x"?[null,r[0]]:[r[0],null]}if(typeof p[0]==="function"){p[0]=p[0]()}if(typeof p[1]==="function"){p[1]=p[1]()}return p},_to:function(v,w){if(v==null||typeof v=="undefined"){return}var C=h(this),B=C.data(a),u=B.opt,D=h("#mCSB_"+B.idx+"_container"),r=D.parent(),F=typeof v;if(!w){w=u.axis==="x"?"x":"y"}var q=w==="x"?D.outerWidth(false):D.outerHeight(false),x=w==="x"?D.offset().left:D.offset().top,E=w==="x"?D[0].offsetLeft:D[0].offsetTop,z=w==="x"?"left":"top";switch(F){case"function":return v();break;case"object":if(v.nodeType){var A=w==="x"?h(v).offset().left:h(v).offset().top}else{if(v.jquery){if(!v.length){return}var A=w==="x"?v.offset().left:v.offset().top}}return A-x;break;case"string":case"number":if(g._isNumeric.call(null,v)){return Math.abs(v)}else{if(v.indexOf("%")!==-1){return Math.abs(q*parseInt(v)/100)}else{if(v.indexOf("-=")!==-1){return Math.abs(E-parseInt(v.split("-=")[1]))}else{if(v.indexOf("+=")!==-1){var s=(E+parseInt(v.split("+=")[1]));return s>=0?0:Math.abs(s)}else{if(v.indexOf("px")!==-1&&g._isNumeric.call(null,v.split("px")[0])){return Math.abs(v.split("px")[0])}else{if(v==="top"||v==="left"){return 0}else{if(v==="bottom"){return Math.abs(r.height()-D.outerHeight(false))}else{if(v==="right"){return Math.abs(r.width()-D.outerWidth(false))}else{if(v==="first"||v==="last"){var y=D.find(":"+v),A=w==="x"?h(y).offset().left:h(y).offset().top;return A-x}else{if(h(v).length){var A=w==="x"?h(v).offset().left:h(v).offset().top;return A-x}else{D.css(z,v);b.update.call(null,C[0]);return}}}}}}}}}}break}},_autoUpdate:function(q){var t=h(this),F=t.data(a),z=F.opt,v=h("#mCSB_"+F.idx+"_container");if(q){clearTimeout(v[0].autoUpdate);g._delete.call(null,v[0].autoUpdate);return}var s=v.parent(),p=[h("#mCSB_"+F.idx+"_scrollbar_vertical"),h("#mCSB_"+F.idx+"_scrollbar_horizontal")],D=function(){return[p[0].is(":visible")?p[0].outerHeight(true):0,p[1].is(":visible")?p[1].outerWidth(true):0]},E=y(),x,u=[v.outerHeight(false),v.outerWidth(false),s.height(),s.width(),D()[0],D()[1]],H,B=G(),w;C();function C(){clearTimeout(v[0].autoUpdate);v[0].autoUpdate=setTimeout(function(){if(z.advanced.updateOnSelectorChange){x=y();if(x!==E){r();E=x;return}}if(z.advanced.updateOnContentResize){H=[v.outerHeight(false),v.outerWidth(false),s.height(),s.width(),D()[0],D()[1]];if(H[0]!==u[0]||H[1]!==u[1]||H[2]!==u[2]||H[3]!==u[3]||H[4]!==u[4]||H[5]!==u[5]){r();u=H}}if(z.advanced.updateOnImageLoad){w=G();if(w!==B){v.find("img").each(function(){A(this.src)});B=w}}if(z.advanced.updateOnSelectorChange||z.advanced.updateOnContentResize||z.advanced.updateOnImageLoad){C()}},60)}function G(){var I=0;if(z.advanced.updateOnImageLoad){I=v.find("img").length}return I}function A(L){var I=new Image();function K(M,N){return function(){return N.apply(M,arguments)}}function J(){this.onload=null;r()}I.onload=K(I,J);I.src=L}function y(){if(z.advanced.updateOnSelectorChange===true){z.advanced.updateOnSelectorChange="*"}var I=0,J=v.find(z.advanced.updateOnSelectorChange);if(z.advanced.updateOnSelectorChange&&J.length>0){J.each(function(){I+=h(this).height()+h(this).width()})}return I}function r(){clearTimeout(v[0].autoUpdate);b.update.call(null,t[0])}},_snapAmount:function(r,p,q){return(Math.round(r/p)*p-q)},_stop:function(p){var r=p.data(a),q=h("#mCSB_"+r.idx+"_container,#mCSB_"+r.idx+"_container_wrapper,#mCSB_"+r.idx+"_dragger_vertical,#mCSB_"+r.idx+"_dragger_horizontal");q.each(function(){g._stopTween.call(this)})},_scrollTo:function(q,s,u){var I=q.data(a),E=I.opt,D={trigger:"internal",dir:"y",scrollEasing:"mcsEaseOut",drag:false,dur:E.scrollInertia,overwrite:"all",callbacks:true,onStart:true,onUpdate:true,onComplete:true},u=h.extend(D,u),G=[u.dur,(u.drag?0:u.dur)],v=h("#mCSB_"+I.idx),B=h("#mCSB_"+I.idx+"_container"),K=E.callbacks.onTotalScrollOffset?g._arr.call(q,E.callbacks.onTotalScrollOffset):[0,0],p=E.callbacks.onTotalScrollBackOffset?g._arr.call(q,E.callbacks.onTotalScrollBackOffset):[0,0];I.trigger=u.trigger;if(E.snapAmount){s=g._snapAmount(s,E.snapAmount,E.snapOffset)}switch(u.dir){case"x":var x=h("#mCSB_"+I.idx+"_dragger_horizontal"),z="left",C=B[0].offsetLeft,H=[v.width()-B.outerWidth(false),x.parent().width()-x.width()],r=[s,(s/I.scrollRatio.x)],L=K[1],J=p[1],A=L>0?L/I.scrollRatio.x:0,w=J>0?J/I.scrollRatio.x:0;break;case"y":var x=h("#mCSB_"+I.idx+"_dragger_vertical"),z="top",C=B[0].offsetTop,H=[v.height()-B.outerHeight(false),x.parent().height()-x.height()],r=[s,(s/I.scrollRatio.y)],L=K[0],J=p[0],A=L>0?L/I.scrollRatio.y:0,w=J>0?J/I.scrollRatio.y:0;break}if(r[1]<0){r=[0,0]}else{if(r[1]>=H[1]){r=[H[0],H[1]]}else{r[0]=-r[0]}}clearTimeout(B[0].onCompleteTimeout);if(!I.tweenRunning&&((C===0&&r[0]>=0)||(C===H[0]&&r[0]<=H[0]))){return}g._tweenTo.call(null,x[0],z,Math.round(r[1]),G[1],u.scrollEasing);g._tweenTo.call(null,B[0],z,Math.round(r[0]),G[0],u.scrollEasing,u.overwrite,{onStart:function(){if(u.callbacks&&u.onStart&&!I.tweenRunning){if(t("onScrollStart")){F();E.callbacks.onScrollStart.call(q[0])}I.tweenRunning=true;g._onDragClasses(x);I.cbOffsets=y()}},onUpdate:function(){if(u.callbacks&&u.onUpdate){if(t("whileScrolling")){F();E.callbacks.whileScrolling.call(q[0])}}},onComplete:function(){if(u.callbacks&&u.onComplete){if(E.axis==="yx"){clearTimeout(B[0].onCompleteTimeout)}var M=B[0].idleTimer||0;B[0].onCompleteTimeout=setTimeout(function(){if(t("onScroll")){F();E.callbacks.onScroll.call(q[0])}if(t("onTotalScroll")&&r[1]>=H[1]-A&&I.cbOffsets[0]){F();E.callbacks.onTotalScroll.call(q[0])}if(t("onTotalScrollBack")&&r[1]<=w&&I.cbOffsets[1]){F();E.callbacks.onTotalScrollBack.call(q[0])}I.tweenRunning=false;B[0].idleTimer=0;g._onDragClasses(x,"hide")},M)}}});function t(M){return I&&E.callbacks[M]&&typeof E.callbacks[M]==="function"}function y(){return[E.callbacks.alwaysTriggerOffsets||C>=H[0]+L,E.callbacks.alwaysTriggerOffsets||C<=-J]}function F(){var O=[B[0].offsetTop,B[0].offsetLeft],P=[x[0].offsetTop,x[0].offsetLeft],M=[B.outerHeight(false),B.outerWidth(false)],N=[v.height(),v.width()];q[0].mcs={content:B,top:O[0],left:O[1],draggerTop:P[0],draggerLeft:P[1],topPct:Math.round((100*Math.abs(O[0]))/(Math.abs(M[0])-N[0])),leftPct:Math.round((100*Math.abs(O[1]))/(Math.abs(M[1])-N[1])),direction:u.dir}}},_tweenTo:function(r,u,s,q,A,t,J){var J=J||{},G=J.onStart||function(){},B=J.onUpdate||function(){},H=J.onComplete||function(){},z=g._getTime(),x,v=0,D=r.offsetTop,E=r.style;if(u==="left"){D=r.offsetLeft}var y=s-D;r._mcsstop=0;if(t!=="none"){C()}p();function I(){if(r._mcsstop){return}if(!v){G.call()}v=g._getTime()-z;F();if(v>=r._mcstime){r._mcstime=(v>r._mcstime)?v+x-(v-r._mcstime):v+x-1;if(r._mcstime<v+1){r._mcstime=v+1}}if(r._mcstime<q){r._mcsid=_request(I)}else{H.call()}}function F(){if(q>0){r._mcscurrVal=w(r._mcstime,D,y,q,A);E[u]=Math.round(r._mcscurrVal)+"px"}else{E[u]=s+"px"}B.call()}function p(){x=1000/60;r._mcstime=v+x;_request=(!l.requestAnimationFrame)?function(K){F();return setTimeout(K,0.01)}:l.requestAnimationFrame;r._mcsid=_request(I)}function C(){if(r._mcsid==null){return}if(!l.requestAnimationFrame){clearTimeout(r._mcsid)}else{l.cancelAnimationFrame(r._mcsid)}r._mcsid=null}function w(M,L,Q,P,N){switch(N){case"linear":case"mcsLinear":return Q*M/P+L;break;case"mcsLinearOut":M/=P;M--;return Q*Math.sqrt(1-M*M)+L;break;case"easeInOutSmooth":M/=P/2;if(M<1){return Q/2*M*M+L}M--;return -Q/2*(M*(M-2)-1)+L;break;case"easeInOutStrong":M/=P/2;if(M<1){return Q/2*Math.pow(2,10*(M-1))+L}M--;return Q/2*(-Math.pow(2,-10*M)+2)+L;break;case"easeInOut":case"mcsEaseInOut":M/=P/2;if(M<1){return Q/2*M*M*M+L}M-=2;return Q/2*(M*M*M+2)+L;break;case"easeOutSmooth":M/=P;M--;return -Q*(M*M*M*M-1)+L;break;case"easeOutStrong":return Q*(-Math.pow(2,-10*M/P)+1)+L;break;case"easeOut":case"mcsEaseOut":default:var O=(M/=P)*M,K=O*M;return L+Q*(0.499999999999997*K*O+-2.5*O*O+5.5*K+-6.5*O+4*M)}}},_getTime:function(){if(l.performance&&l.performance.now){return l.performance.now()}else{if(l.performance&&l.performance.webkitNow){return l.performance.webkitNow()}else{if(Date.now){return Date.now()}else{return new Date().getTime()}}}},_stopTween:function(){var p=this;if(p._mcsid==null){return}if(!l.requestAnimationFrame){clearTimeout(p._mcsid)}else{l.cancelAnimationFrame(p._mcsid)}p._mcsid=null;p._mcsstop=1},_delete:function(r){try{delete r}catch(q){r=null}},_mouseBtnLeft:function(p){return !(p.which&&p.which!==1)},_pointerTouch:function(q){var p=q.originalEvent.pointerType;return !(p&&p!=="touch"&&p!==2)},_isNumeric:function(p){return !isNaN(parseFloat(p))&&isFinite(p)}};h.fn[e]=function(p){if(b[p]){return b[p].apply(this,Array.prototype.slice.call(arguments,1))}else{if(typeof p==="object"||!p){return b.init.apply(this,arguments)}else{h.error("Method "+p+" does not exist")}}};h[e]=function(p){if(b[p]){return b[p].apply(this,Array.prototype.slice.call(arguments,1))}else{if(typeof p==="object"||!p){return b.init.apply(this,arguments)}else{h.error("Method "+p+" does not exist")}}};h[e].defaults=f;l[e]=true;h(l).load(function(){h(k)[e]()})})(jQuery,window,document);

/*---------------------- MouseWheel ----------------------*/
/*! Copyright (c) 2013 Brandon Aaron (http://brandon.aaron.sh)
 * Licensed under the MIT License (LICENSE.txt).
 *
 * Version: 3.1.11
 *
 * Requires: jQuery 1.2.2+
 */
!function(a){"function"==typeof define&&define.amd?define(["jquery"],a):"object"==typeof exports?module.exports=a:a(jQuery)}(function(a){function b(b){var g=b||window.event,h=i.call(arguments,1),j=0,l=0,m=0,n=0,o=0,p=0;if(b=a.event.fix(g),b.type="mousewheel","detail"in g&&(m=-1*g.detail),"wheelDelta"in g&&(m=g.wheelDelta),"wheelDeltaY"in g&&(m=g.wheelDeltaY),"wheelDeltaX"in g&&(l=-1*g.wheelDeltaX),"axis"in g&&g.axis===g.HORIZONTAL_AXIS&&(l=-1*m,m=0),j=0===m?l:m,"deltaY"in g&&(m=-1*g.deltaY,j=m),"deltaX"in g&&(l=g.deltaX,0===m&&(j=-1*l)),0!==m||0!==l){if(1===g.deltaMode){var q=a.data(this,"mousewheel-line-height");j*=q,m*=q,l*=q}else if(2===g.deltaMode){var r=a.data(this,"mousewheel-page-height");j*=r,m*=r,l*=r}if(n=Math.max(Math.abs(m),Math.abs(l)),(!f||f>n)&&(f=n,d(g,n)&&(f/=40)),d(g,n)&&(j/=40,l/=40,m/=40),j=Math[j>=1?"floor":"ceil"](j/f),l=Math[l>=1?"floor":"ceil"](l/f),m=Math[m>=1?"floor":"ceil"](m/f),k.settings.normalizeOffset&&this.getBoundingClientRect){var s=this.getBoundingClientRect();o=b.clientX-s.left,p=b.clientY-s.top}return b.deltaX=l,b.deltaY=m,b.deltaFactor=f,b.offsetX=o,b.offsetY=p,b.deltaMode=0,h.unshift(b,j,l,m),e&&clearTimeout(e),e=setTimeout(c,200),(a.event.dispatch||a.event.handle).apply(this,h)}}function c(){f=null}function d(a,b){return k.settings.adjustOldDeltas&&"mousewheel"===a.type&&b%120===0}var e,f,g=["wheel","mousewheel","DOMMouseScroll","MozMousePixelScroll"],h="onwheel"in document||document.documentMode>=9?["wheel"]:["mousewheel","DomMouseScroll","MozMousePixelScroll"],i=Array.prototype.slice;if(a.event.fixHooks)for(var j=g.length;j;)a.event.fixHooks[g[--j]]=a.event.mouseHooks;var k=a.event.special.mousewheel={version:"3.1.11",setup:function(){if(this.addEventListener)for(var c=h.length;c;)this.addEventListener(h[--c],b,!1);else this.onmousewheel=b;a.data(this,"mousewheel-line-height",k.getLineHeight(this)),a.data(this,"mousewheel-page-height",k.getPageHeight(this))},teardown:function(){if(this.removeEventListener)for(var c=h.length;c;)this.removeEventListener(h[--c],b,!1);else this.onmousewheel=null;a.removeData(this,"mousewheel-line-height"),a.removeData(this,"mousewheel-page-height")},getLineHeight:function(b){var c=a(b)["offsetParent"in a.fn?"offsetParent":"parent"]();return c.length||(c=a("body")),parseInt(c.css("fontSize"),10)},getPageHeight:function(b){return a(b).height()},settings:{adjustOldDeltas:!0,normalizeOffset:!0}};a.fn.extend({mousewheel:function(a){return a?this.bind("mousewheel",a):this.trigger("mousewheel")},unmousewheel:function(a){return this.unbind("mousewheel",a)}})});

/*---------------------- BxSlider ----------------------*/
/**
 * BxSlider v4.1.2 - Fully loaded, responsive content slider
 * http://bxslider.com
 *
 * Copyright 2014, Steven Wanderski - http://stevenwanderski.com - http://bxcreative.com
 * Written while drinking Belgian ales and listening to jazz
 *
 * Released under the MIT license - http://opensource.org/licenses/MIT
 */

;(function($){

	var plugin = {};

	var defaults = {

		// GENERAL
		mode: 'horizontal',
		slideSelector: '',
		infiniteLoop: true,
		hideControlOnEnd: false,
		speed: 500,
		easing: null,
		slideMargin: 0,
		startSlide: 0,
		randomStart: false,
		captions: false,
		ticker: false,
		tickerHover: false,
		adaptiveHeight: false,
		adaptiveHeightSpeed: 500,
		video: false,
		useCSS: true,
		preloadImages: 'visible',
		responsive: true,
		slideZIndex: 50,
		wrapperClass: 'bx-wrapper',

		// TOUCH
		touchEnabled: true,
		swipeThreshold: 50,
		oneToOneTouch: true,
		preventDefaultSwipeX: true,
		preventDefaultSwipeY: false,

		// PAGER
		pager: true,
		pagerType: 'full',
		pagerShortSeparator: ' / ',
		pagerSelector: null,
		buildPager: null,
		pagerCustom: null,

		// CONTROLS
		controls: true,
		nextText: 'Next',
		prevText: 'Prev',
		nextSelector: null,
		prevSelector: null,
		autoControls: false,
		startText: 'Start',
		stopText: 'Stop',
		autoControlsCombine: false,
		autoControlsSelector: null,

		// AUTO
		auto: false,
		pause: 4000,
		autoStart: true,
		autoDirection: 'next',
		autoHover: false,
		autoDelay: 0,
		autoSlideForOnePage: false,

		// CAROUSEL
		minSlides: 1,
		maxSlides: 1,
		moveSlides: 0,
		slideWidth: 0,

		// CALLBACKS
		onSliderLoad: function() {},
		onSlideBefore: function() {},
		onSlideAfter: function() {},
		onSlideNext: function() {},
		onSlidePrev: function() {},
		onSliderResize: function() {}
	}

	$.fn.bxSlider = function(options){

		if(this.length == 0) return this;

		// support mutltiple elements
		if(this.length > 1){
			this.each(function(){$(this).bxSlider(options)});
			return this;
		}

		// create a namespace to be used throughout the plugin
		var slider = {};
		// set a reference to our slider element
		var el = this;
		plugin.el = this;

		/**
		 * Makes slideshow responsive
		 */
		// first get the original window dimens (thanks alot IE)
		var windowWidth = $(window).width();
		var windowHeight = $(window).height();



		/**
		 * ===================================================================================
		 * = PRIVATE FUNCTIONS
		 * ===================================================================================
		 */

		/**
		 * Initializes namespace settings to be used throughout plugin
		 */
		var init = function(){
			// merge user-supplied options with the defaults
			slider.settings = $.extend({}, defaults, options);
			// parse slideWidth setting
			slider.settings.slideWidth = parseInt(slider.settings.slideWidth);
			// store the original children
			slider.children = el.children(slider.settings.slideSelector);
			// check if actual number of slides is less than minSlides / maxSlides
			if(slider.children.length < slider.settings.minSlides) slider.settings.minSlides = slider.children.length;
			if(slider.children.length < slider.settings.maxSlides) slider.settings.maxSlides = slider.children.length;
			// if random start, set the startSlide setting to random number
			if(slider.settings.randomStart) slider.settings.startSlide = Math.floor(Math.random() * slider.children.length);
			// store active slide information
			slider.active = { index: slider.settings.startSlide }
			// store if the slider is in carousel mode (displaying / moving multiple slides)
			slider.carousel = slider.settings.minSlides > 1 || slider.settings.maxSlides > 1;
			// if carousel, force preloadImages = 'all'
			if(slider.carousel) slider.settings.preloadImages = 'all';
			// calculate the min / max width thresholds based on min / max number of slides
			// used to setup and update carousel slides dimensions
			slider.minThreshold = (slider.settings.minSlides * slider.settings.slideWidth) + ((slider.settings.minSlides - 1) * slider.settings.slideMargin);
			slider.maxThreshold = (slider.settings.maxSlides * slider.settings.slideWidth) + ((slider.settings.maxSlides - 1) * slider.settings.slideMargin);
			// store the current state of the slider (if currently animating, working is true)
			slider.working = false;
			// initialize the controls object
			slider.controls = {};
			// initialize an auto interval
			slider.interval = null;
			// determine which property to use for transitions
			slider.animProp = slider.settings.mode == 'vertical' ? 'top' : 'left';
			// determine if hardware acceleration can be used
			slider.usingCSS = slider.settings.useCSS && slider.settings.mode != 'fade' && (function(){
				// create our test div element
				var div = document.createElement('div');
				// css transition properties
				var props = ['WebkitPerspective', 'MozPerspective', 'OPerspective', 'msPerspective'];
				// test for each property
				for(var i in props){
					if(div.style[props[i]] !== undefined){
						slider.cssPrefix = props[i].replace('Perspective', '').toLowerCase();
						slider.animProp = '-' + slider.cssPrefix + '-transform';
						return true;
					}
				}
				return false;
			}());
			// if vertical mode always make maxSlides and minSlides equal
			if(slider.settings.mode == 'vertical') slider.settings.maxSlides = slider.settings.minSlides;
			// save original style data
			el.data("origStyle", el.attr("style"));
			el.children(slider.settings.slideSelector).each(function() {
			  $(this).data("origStyle", $(this).attr("style"));
			});
			// perform all DOM / CSS modifications
			setup();
		}

		/**
		 * Performs all DOM and CSS modifications
		 */
		var setup = function(){
			// wrap el in a wrapper
			el.wrap('<div class="' + slider.settings.wrapperClass + '"><div class="bx-viewport"></div></div>');
			// store a namspace reference to .bx-viewport
			slider.viewport = el.parent();
			// add a loading div to display while images are loading
			slider.loader = $('<div class="bx-loading" />');
			slider.viewport.prepend(slider.loader);
			// set el to a massive width, to hold any needed slides
			// also strip any margin and padding from el
			el.css({
				width: slider.settings.mode == 'horizontal' ? (slider.children.length * 100 + 215) + '%' : 'auto',
				position: 'relative'
			});
			// if using CSS, add the easing property
			if(slider.usingCSS && slider.settings.easing){
				el.css('-' + slider.cssPrefix + '-transition-timing-function', slider.settings.easing);
			// if not using CSS and no easing value was supplied, use the default JS animation easing (swing)
			}else if(!slider.settings.easing){
				slider.settings.easing = 'swing';
			}
			var slidesShowing = getNumberSlidesShowing();
			// make modifications to the viewport (.bx-viewport)
			slider.viewport.css({
				width: '100%',
				overflow: 'hidden',
				position: 'relative'
			});
			slider.viewport.parent().css({
				maxWidth: getViewportMaxWidth()
			});
			// make modification to the wrapper (.bx-wrapper)
			if(!slider.settings.pager) {
				slider.viewport.parent().css({
				margin: '0 auto 0px'
				});
			}
			// apply css to all slider children
			slider.children.css({
				'float': slider.settings.mode == 'horizontal' ? 'left' : 'none',
				listStyle: 'none',
				position: 'relative'
			});
			// apply the calculated width after the float is applied to prevent scrollbar interference
			slider.children.css('width', getSlideWidth());
			// if slideMargin is supplied, add the css
			if(slider.settings.mode == 'horizontal' && slider.settings.slideMargin > 0) slider.children.css('marginRight', slider.settings.slideMargin);
			if(slider.settings.mode == 'vertical' && slider.settings.slideMargin > 0) slider.children.css('marginBottom', slider.settings.slideMargin);
			// if "fade" mode, add positioning and z-index CSS
			if(slider.settings.mode == 'fade'){
				slider.children.css({
					position: 'absolute',
					zIndex: 0,
					display: 'none'
				});
				// prepare the z-index on the showing element
				slider.children.eq(slider.settings.startSlide).css({zIndex: slider.settings.slideZIndex, display: 'block'});
			}
			// create an element to contain all slider controls (pager, start / stop, etc)
			slider.controls.el = $('<div class="bx-controls" />');
			// if captions are requested, add them
			if(slider.settings.captions) appendCaptions();
			// check if startSlide is last slide
			slider.active.last = slider.settings.startSlide == getPagerQty() - 1;
			// if video is true, set up the fitVids plugin
			if(slider.settings.video) el.fitVids();
			// set the default preload selector (visible)
			var preloadSelector = slider.children.eq(slider.settings.startSlide);
			if (slider.settings.preloadImages == "all") preloadSelector = slider.children;
			// only check for control addition if not in "ticker" mode
			if(!slider.settings.ticker){
				// if pager is requested, add it
				if(slider.settings.pager) appendPager();
				// if controls are requested, add them
				if(slider.settings.controls) appendControls();
				// if auto is true, and auto controls are requested, add them
				if(slider.settings.auto && slider.settings.autoControls) appendControlsAuto();
				// if any control option is requested, add the controls wrapper
				if(slider.settings.controls || slider.settings.autoControls || slider.settings.pager) slider.viewport.after(slider.controls.el);
			// if ticker mode, do not allow a pager
			}else{
				slider.settings.pager = false;
			}
			// preload all images, then perform final DOM / CSS modifications that depend on images being loaded
			loadElements(preloadSelector, start);
		}

		var loadElements = function(selector, callback){
			var total = selector.find('img, iframe').length;
			if (total == 0){
				callback();
				return;
			}
			var count = 0;
			selector.find('img, iframe').each(function(){
				$(this).one('load', function() {
				  if(++count == total) callback();
				}).each(function() {
				  if(this.complete) $(this).load();
				});
			});
		}

		/**
		 * Start the slider
		 */
		var start = function(){
			// if infinite loop, prepare additional slides
			if(slider.settings.infiniteLoop && slider.settings.mode != 'fade' && !slider.settings.ticker){
				var slice = slider.settings.mode == 'vertical' ? slider.settings.minSlides : slider.settings.maxSlides;
				var sliceAppend = slider.children.slice(0, slice).clone().addClass('bx-clone');
				var slicePrepend = slider.children.slice(-slice).clone().addClass('bx-clone');
				el.append(sliceAppend).prepend(slicePrepend);
			}
			// remove the loading DOM element
			slider.loader.remove();
			// set the left / top position of "el"
			setSlidePosition();
			// if "vertical" mode, always use adaptiveHeight to prevent odd behavior
			if (slider.settings.mode == 'vertical') slider.settings.adaptiveHeight = true;
			// set the viewport height
			slider.viewport.height(getViewportHeight());
			// make sure everything is positioned just right (same as a window resize)
			el.redrawSlider();
			// onSliderLoad callback
			slider.settings.onSliderLoad(slider.active.index);
			// slider has been fully initialized
			slider.initialized = true;
			// bind the resize call to the window
			if (slider.settings.responsive) $(window).bind('resize', resizeWindow);
			// if auto is true and has more than 1 page, start the show
			if (slider.settings.auto && slider.settings.autoStart && (getPagerQty() > 1 || slider.settings.autoSlideForOnePage)) initAuto();
			// if ticker is true, start the ticker
			if (slider.settings.ticker) initTicker();
			// if pager is requested, make the appropriate pager link active
			if (slider.settings.pager) updatePagerActive(slider.settings.startSlide);
			// check for any updates to the controls (like hideControlOnEnd updates)
			if (slider.settings.controls) updateDirectionControls();
			// if touchEnabled is true, setup the touch events
			if (slider.settings.touchEnabled && !slider.settings.ticker) initTouch();
		}

		/**
		 * Returns the calculated height of the viewport, used to determine either adaptiveHeight or the maxHeight value
		 */
		var getViewportHeight = function(){
			var height = 0;
			// first determine which children (slides) should be used in our height calculation
			var children = $();
			// if mode is not "vertical" and adaptiveHeight is false, include all children
			if(slider.settings.mode != 'vertical' && !slider.settings.adaptiveHeight){
				children = slider.children;
			}else{
				// if not carousel, return the single active child
				if(!slider.carousel){
					children = slider.children.eq(slider.active.index);
				// if carousel, return a slice of children
				}else{
					// get the individual slide index
					var currentIndex = slider.settings.moveSlides == 1 ? slider.active.index : slider.active.index * getMoveBy();
					// add the current slide to the children
					children = slider.children.eq(currentIndex);
					// cycle through the remaining "showing" slides
					for (i = 1; i <= slider.settings.maxSlides - 1; i++){
						// if looped back to the start
						if(currentIndex + i >= slider.children.length){
							children = children.add(slider.children.eq(i - 1));
						}else{
							children = children.add(slider.children.eq(currentIndex + i));
						}
					}
				}
			}
			// if "vertical" mode, calculate the sum of the heights of the children
			if(slider.settings.mode == 'vertical'){
				children.each(function(index) {
				  height += $(this).outerHeight();
				});
				// add user-supplied margins
				if(slider.settings.slideMargin > 0){
					height += slider.settings.slideMargin * (slider.settings.minSlides - 1);
				}
			// if not "vertical" mode, calculate the max height of the children
			}else{
				height = Math.max.apply(Math, children.map(function(){
					return $(this).outerHeight(false);
				}).get());
			}

			if(slider.viewport.css('box-sizing') == 'border-box'){
				height +=	parseFloat(slider.viewport.css('padding-top')) + parseFloat(slider.viewport.css('padding-bottom')) +
							parseFloat(slider.viewport.css('border-top-width')) + parseFloat(slider.viewport.css('border-bottom-width'));
			}else if(slider.viewport.css('box-sizing') == 'padding-box'){
				height +=	parseFloat(slider.viewport.css('padding-top')) + parseFloat(slider.viewport.css('padding-bottom'));
			}

			return height;
		}

		/**
		 * Returns the calculated width to be used for the outer wrapper / viewport
		 */
		var getViewportMaxWidth = function(){
			var width = '100%';
			if(slider.settings.slideWidth > 0){
				if(slider.settings.mode == 'horizontal'){
					width = (slider.settings.maxSlides * slider.settings.slideWidth) + ((slider.settings.maxSlides - 1) * slider.settings.slideMargin);
				}else{
					width = slider.settings.slideWidth;
				}
			}
			return width;
		}

		/**
		 * Returns the calculated width to be applied to each slide
		 */
		var getSlideWidth = function(){
			// start with any user-supplied slide width
			var newElWidth = slider.settings.slideWidth;
			// get the current viewport width
			var wrapWidth = slider.viewport.width();
			// if slide width was not supplied, or is larger than the viewport use the viewport width
			if(slider.settings.slideWidth == 0 ||
				(slider.settings.slideWidth > wrapWidth && !slider.carousel) ||
				slider.settings.mode == 'vertical'){
				newElWidth = wrapWidth;
			// if carousel, use the thresholds to determine the width
			}else if(slider.settings.maxSlides > 1 && slider.settings.mode == 'horizontal'){
				if(wrapWidth > slider.maxThreshold){
					// newElWidth = (wrapWidth - (slider.settings.slideMargin * (slider.settings.maxSlides - 1))) / slider.settings.maxSlides;
				}else if(wrapWidth < slider.minThreshold){
					newElWidth = (wrapWidth - (slider.settings.slideMargin * (slider.settings.minSlides - 1))) / slider.settings.minSlides;
				}
			}
			return newElWidth;
		}

		/**
		 * Returns the number of slides currently visible in the viewport (includes partially visible slides)
		 */
		var getNumberSlidesShowing = function(){
			var slidesShowing = 1;
			if(slider.settings.mode == 'horizontal' && slider.settings.slideWidth > 0){
				// if viewport is smaller than minThreshold, return minSlides
				if(slider.viewport.width() < slider.minThreshold){
					slidesShowing = slider.settings.minSlides;
				// if viewport is larger than minThreshold, return maxSlides
				}else if(slider.viewport.width() > slider.maxThreshold){
					slidesShowing = slider.settings.maxSlides;
				// if viewport is between min / max thresholds, divide viewport width by first child width
				}else{
					var childWidth = slider.children.first().width() + slider.settings.slideMargin;
					slidesShowing = Math.floor((slider.viewport.width() +
						slider.settings.slideMargin) / childWidth);
				}
			// if "vertical" mode, slides showing will always be minSlides
			}else if(slider.settings.mode == 'vertical'){
				slidesShowing = slider.settings.minSlides;
			}
			return slidesShowing;
		}

		/**
		 * Returns the number of pages (one full viewport of slides is one "page")
		 */
		var getPagerQty = function(){
			var pagerQty = 0;
			// if moveSlides is specified by the user
			if(slider.settings.moveSlides > 0){
				if(slider.settings.infiniteLoop){
					pagerQty = Math.ceil(slider.children.length / getMoveBy());
				}else{
					// use a while loop to determine pages
					var breakPoint = 0;
					var counter = 0
					// when breakpoint goes above children length, counter is the number of pages
					while (breakPoint < slider.children.length){
						++pagerQty;
						breakPoint = counter + getNumberSlidesShowing();
						counter += slider.settings.moveSlides <= getNumberSlidesShowing() ? slider.settings.moveSlides : getNumberSlidesShowing();
					}
				}
			// if moveSlides is 0 (auto) divide children length by sides showing, then round up
			}else{
				pagerQty = Math.ceil(slider.children.length / getNumberSlidesShowing());
			}
			return pagerQty;
		}

		/**
		 * Returns the number of indivual slides by which to shift the slider
		 */
		var getMoveBy = function(){
			// if moveSlides was set by the user and moveSlides is less than number of slides showing
			if(slider.settings.moveSlides > 0 && slider.settings.moveSlides <= getNumberSlidesShowing()){
				return slider.settings.moveSlides;
			}
			// if moveSlides is 0 (auto)
			return getNumberSlidesShowing();
		}

		/**
		 * Sets the slider's (el) left or top position
		 */
		var setSlidePosition = function(){
			// if last slide, not infinite loop, and number of children is larger than specified maxSlides
			if(slider.children.length > slider.settings.maxSlides && slider.active.last && !slider.settings.infiniteLoop){
				if (slider.settings.mode == 'horizontal'){
					// get the last child's position
					var lastChild = slider.children.last();
					var position = lastChild.position();
					// set the left position
					setPositionProperty(-(position.left - (slider.viewport.width() - lastChild.outerWidth())), 'reset', 0);
				}else if(slider.settings.mode == 'vertical'){
					// get the last showing index's position
					var lastShowingIndex = slider.children.length - slider.settings.minSlides;
					var position = slider.children.eq(lastShowingIndex).position();
					// set the top position
					setPositionProperty(-position.top, 'reset', 0);
				}
			// if not last slide
			}else{
				// get the position of the first showing slide
				var position = slider.children.eq(slider.active.index * getMoveBy()).position();
				// check for last slide
				if (slider.active.index == getPagerQty() - 1) slider.active.last = true;
				// set the repective position
				if (position != undefined){
					if (slider.settings.mode == 'horizontal') setPositionProperty(-position.left, 'reset', 0);
					else if (slider.settings.mode == 'vertical') setPositionProperty(-position.top, 'reset', 0);
				}
			}
		}

		/**
		 * Sets the el's animating property position (which in turn will sometimes animate el).
		 * If using CSS, sets the transform property. If not using CSS, sets the top / left property.
		 *
		 * @param value (int)
		 *  - the animating property's value
		 *
		 * @param type (string) 'slider', 'reset', 'ticker'
		 *  - the type of instance for which the function is being
		 *
		 * @param duration (int)
		 *  - the amount of time (in ms) the transition should occupy
		 *
		 * @param params (array) optional
		 *  - an optional parameter containing any variables that need to be passed in
		 */
		var setPositionProperty = function(value, type, duration, params){
			// use CSS transform
			if(slider.usingCSS){
				// determine the translate3d value
				var propValue = slider.settings.mode == 'vertical' ? 'translate3d(0, ' + value + 'px, 0)' : 'translate3d(' + value + 'px, 0, 0)';
				// add the CSS transition-duration
				el.css('-' + slider.cssPrefix + '-transition-duration', duration / 1000 + 's');
				if(type == 'slide'){
					// set the property value
					el.css(slider.animProp, propValue);
					// bind a callback method - executes when CSS transition completes
					el.bind('transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd', function(){
						// unbind the callback
						el.unbind('transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd');
						updateAfterSlideTransition();
					});
				}else if(type == 'reset'){
					el.css(slider.animProp, propValue);
				}else if(type == 'ticker'){
					// make the transition use 'linear'
					el.css('-' + slider.cssPrefix + '-transition-timing-function', 'linear');
					el.css(slider.animProp, propValue);
					// bind a callback method - executes when CSS transition completes
					el.bind('transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd', function(){
						// unbind the callback
						el.unbind('transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd');
						// reset the position
						setPositionProperty(params['resetValue'], 'reset', 0);
						// start the loop again
						tickerLoop();
					});
				}
			// use JS animate
			}else{
				var animateObj = {};
				animateObj[slider.animProp] = value;
				if(type == 'slide'){
					el.animate(animateObj, duration, slider.settings.easing, function(){
						updateAfterSlideTransition();
					});
				}else if(type == 'reset'){
					el.css(slider.animProp, value)
				}else if(type == 'ticker'){
					el.animate(animateObj, speed, 'linear', function(){
						setPositionProperty(params['resetValue'], 'reset', 0);
						// run the recursive loop after animation
						tickerLoop();
					});
				}
			}
		}

		/**
		 * Populates the pager with proper amount of pages
		 */
		var populatePager = function(){
			var pagerHtml = '';
			var pagerQty = getPagerQty();
			// loop through each pager item
			for(var i=0; i < pagerQty; i++){
				var linkContent = '';
				// if a buildPager function is supplied, use it to get pager link value, else use index + 1
				if(slider.settings.buildPager && $.isFunction(slider.settings.buildPager)){
					linkContent = slider.settings.buildPager(i);
					slider.pagerEl.addClass('bx-custom-pager');
				}else{
					linkContent = i + 1;
					slider.pagerEl.addClass('bx-default-pager');
				}
				// var linkContent = slider.settings.buildPager && $.isFunction(slider.settings.buildPager) ? slider.settings.buildPager(i) : i + 1;
				// add the markup to the string
				pagerHtml += '<div class="bx-pager-item"><a href="" data-slide-index="' + i + '" class="bx-pager-link">' + linkContent + '</a></div>';
			};
			// populate the pager element with pager links
			slider.pagerEl.html(pagerHtml);
		}

		/**
		 * Appends the pager to the controls element
		 */
		var appendPager = function(){
			if(!slider.settings.pagerCustom){
				// create the pager DOM element
				slider.pagerEl = $('<div class="bx-pager" />');
				// if a pager selector was supplied, populate it with the pager
				if(slider.settings.pagerSelector){
					$(slider.settings.pagerSelector).html(slider.pagerEl);
				// if no pager selector was supplied, add it after the wrapper
				}else{
					slider.controls.el.addClass('bx-has-pager').append(slider.pagerEl);
				}
				// populate the pager
				populatePager();
			}else{
				slider.pagerEl = $(slider.settings.pagerCustom);
			}
			// assign the pager click binding
			slider.pagerEl.on('click', 'a', clickPagerBind);
		}

		/**
		 * Appends prev / next controls to the controls element
		 */
		var appendControls = function(){
			slider.controls.next = $('<a class="bx-next" href="">' + slider.settings.nextText + '</a>');
			slider.controls.prev = $('<a class="bx-prev" href="">' + slider.settings.prevText + '</a>');
			// bind click actions to the controls
			slider.controls.next.bind('click', clickNextBind);
			slider.controls.prev.bind('click', clickPrevBind);
			// if nextSlector was supplied, populate it
			if(slider.settings.nextSelector){
				$(slider.settings.nextSelector).append(slider.controls.next);
			}
			// if prevSlector was supplied, populate it
			if(slider.settings.prevSelector){
				$(slider.settings.prevSelector).append(slider.controls.prev);
			}
			// if no custom selectors were supplied
			if(!slider.settings.nextSelector && !slider.settings.prevSelector){
				// add the controls to the DOM
				slider.controls.directionEl = $('<div class="bx-controls-direction" />');
				// add the control elements to the directionEl
				slider.controls.directionEl.append(slider.controls.prev).append(slider.controls.next);
				// slider.viewport.append(slider.controls.directionEl);
				slider.controls.el.addClass('bx-has-controls-direction').append(slider.controls.directionEl);
			}
		}

		/**
		 * Appends start / stop auto controls to the controls element
		 */
		var appendControlsAuto = function(){
			slider.controls.start = $('<div class="bx-controls-auto-item"><a class="bx-start" href="">' + slider.settings.startText + '</a></div>');
			slider.controls.stop = $('<div class="bx-controls-auto-item"><a class="bx-stop" href="">' + slider.settings.stopText + '</a></div>');
			// add the controls to the DOM
			slider.controls.autoEl = $('<div class="bx-controls-auto" />');
			// bind click actions to the controls
			slider.controls.autoEl.on('click', '.bx-start', clickStartBind);
			slider.controls.autoEl.on('click', '.bx-stop', clickStopBind);
			// if autoControlsCombine, insert only the "start" control
			if(slider.settings.autoControlsCombine){
				slider.controls.autoEl.append(slider.controls.start);
			// if autoControlsCombine is false, insert both controls
			}else{
				slider.controls.autoEl.append(slider.controls.start).append(slider.controls.stop);
			}
			// if auto controls selector was supplied, populate it with the controls
			if(slider.settings.autoControlsSelector){
				$(slider.settings.autoControlsSelector).html(slider.controls.autoEl);
			// if auto controls selector was not supplied, add it after the wrapper
			}else{
				slider.controls.el.addClass('bx-has-controls-auto').append(slider.controls.autoEl);
			}
			// update the auto controls
			updateAutoControls(slider.settings.autoStart ? 'stop' : 'start');
		}

		/**
		 * Appends image captions to the DOM
		 */
		var appendCaptions = function(){
			// cycle through each child
			slider.children.each(function(index){
				// get the image title attribute
				var title = $(this).find('img:first').attr('title');
				// append the caption
				if (title != undefined && ('' + title).length) {
                    $(this).append('<div class="bx-caption"><span>' + title + '</span></div>');
                }
			});
		}

		/**
		 * Click next binding
		 *
		 * @param e (event)
		 *  - DOM event object
		 */
		var clickNextBind = function(e){
			// if auto show is running, stop it
			if (slider.settings.auto) el.stopAuto();
			el.goToNextSlide();
			e.preventDefault();
		}

		/**
		 * Click prev binding
		 *
		 * @param e (event)
		 *  - DOM event object
		 */
		var clickPrevBind = function(e){
			// if auto show is running, stop it
			if (slider.settings.auto) el.stopAuto();
			el.goToPrevSlide();
			e.preventDefault();
		}

		/**
		 * Click start binding
		 *
		 * @param e (event)
		 *  - DOM event object
		 */
		var clickStartBind = function(e){
			el.startAuto();
			e.preventDefault();
		}

		/**
		 * Click stop binding
		 *
		 * @param e (event)
		 *  - DOM event object
		 */
		var clickStopBind = function(e){
			el.stopAuto();
			e.preventDefault();
		}

		/**
		 * Click pager binding
		 *
		 * @param e (event)
		 *  - DOM event object
		 */
		var clickPagerBind = function(e){
			// if auto show is running, stop it
			if (slider.settings.auto) el.stopAuto();
			var pagerLink = $(e.currentTarget);
			if(pagerLink.attr('data-slide-index') !== undefined){
				var pagerIndex = parseInt(pagerLink.attr('data-slide-index'));
				// if clicked pager link is not active, continue with the goToSlide call
				if(pagerIndex != slider.active.index) el.goToSlide(pagerIndex);
				e.preventDefault();
			}
		}

		/**
		 * Updates the pager links with an active class
		 *
		 * @param slideIndex (int)
		 *  - index of slide to make active
		 */
		var updatePagerActive = function(slideIndex){
			// if "short" pager type
			var len = slider.children.length; // nb of children
			if(slider.settings.pagerType == 'short'){
				if(slider.settings.maxSlides > 1) {
					len = Math.ceil(slider.children.length/slider.settings.maxSlides);
				}
				slider.pagerEl.html( (slideIndex + 1) + slider.settings.pagerShortSeparator + len);
				return;
			}
			// remove all pager active classes
			slider.pagerEl.find('a').removeClass('active');
			// apply the active class for all pagers
			slider.pagerEl.each(function(i, el) { $(el).find('a').eq(slideIndex).addClass('active'); });
		}

		/**
		 * Performs needed actions after a slide transition
		 */
		var updateAfterSlideTransition = function(){
			// if infinte loop is true
			if(slider.settings.infiniteLoop){
				var position = '';
				// first slide
				if(slider.active.index == 0){
					// set the new position
					position = slider.children.eq(0).position();
				// carousel, last slide
				}else if(slider.active.index == getPagerQty() - 1 && slider.carousel){
					position = slider.children.eq((getPagerQty() - 1) * getMoveBy()).position();
				// last slide
				}else if(slider.active.index == slider.children.length - 1){
					position = slider.children.eq(slider.children.length - 1).position();
				}
				if(position){
					if (slider.settings.mode == 'horizontal') { setPositionProperty(-position.left, 'reset', 0); }
					else if (slider.settings.mode == 'vertical') { setPositionProperty(-position.top, 'reset', 0); }
				}
			}
			// declare that the transition is complete
			slider.working = false;
			// onSlideAfter callback
			slider.settings.onSlideAfter(slider.children.eq(slider.active.index), slider.oldIndex, slider.active.index);
		}

		/**
		 * Updates the auto controls state (either active, or combined switch)
		 *
		 * @param state (string) "start", "stop"
		 *  - the new state of the auto show
		 */
		var updateAutoControls = function(state){
			// if autoControlsCombine is true, replace the current control with the new state
			if(slider.settings.autoControlsCombine){
				slider.controls.autoEl.html(slider.controls[state]);
			// if autoControlsCombine is false, apply the "active" class to the appropriate control
			}else{
				slider.controls.autoEl.find('a').removeClass('active');
				slider.controls.autoEl.find('a:not(.bx-' + state + ')').addClass('active');
			}
		}

		/**
		 * Updates the direction controls (checks if either should be hidden)
		 */
		var updateDirectionControls = function(){
			if(getPagerQty() == 1){
				slider.controls.prev.addClass('disabled');
				slider.controls.next.addClass('disabled');
			}else if(!slider.settings.infiniteLoop && slider.settings.hideControlOnEnd){
				// if first slide
				if (slider.active.index == 0){
					slider.controls.prev.addClass('disabled');
					slider.controls.next.removeClass('disabled');
				// if last slide
				}else if(slider.active.index == getPagerQty() - 1){
					slider.controls.next.addClass('disabled');
					slider.controls.prev.removeClass('disabled');
				// if any slide in the middle
				}else{
					slider.controls.prev.removeClass('disabled');
					slider.controls.next.removeClass('disabled');
				}
			}
		}

		/**
		 * Initialzes the auto process
		 */
		var initAuto = function(){
			// if autoDelay was supplied, launch the auto show using a setTimeout() call
			if(slider.settings.autoDelay > 0){
				var timeout = setTimeout(el.startAuto, slider.settings.autoDelay);
			// if autoDelay was not supplied, start the auto show normally
			}else{
				el.startAuto();
			}
			// if autoHover is requested
			if(slider.settings.autoHover){
				// on el hover
				el.hover(function(){
					// if the auto show is currently playing (has an active interval)
					if(slider.interval){
						// stop the auto show and pass true agument which will prevent control update
						el.stopAuto(true);
						// create a new autoPaused value which will be used by the relative "mouseout" event
						slider.autoPaused = true;
					}
				}, function(){
					// if the autoPaused value was created be the prior "mouseover" event
					if(slider.autoPaused){
						// start the auto show and pass true agument which will prevent control update
						el.startAuto(true);
						// reset the autoPaused value
						slider.autoPaused = null;
					}
				});
			}
		}

		/**
		 * Initialzes the ticker process
		 */
		var initTicker = function(){
			var startPosition = 0;
			// if autoDirection is "next", append a clone of the entire slider
			if(slider.settings.autoDirection == 'next'){
				el.append(slider.children.clone().addClass('bx-clone'));
			// if autoDirection is "prev", prepend a clone of the entire slider, and set the left position
			}else{
				el.prepend(slider.children.clone().addClass('bx-clone'));
				var position = slider.children.first().position();
				startPosition = slider.settings.mode == 'horizontal' ? -position.left : -position.top;
			}
			setPositionProperty(startPosition, 'reset', 0);
			// do not allow controls in ticker mode
			slider.settings.pager = false;
			slider.settings.controls = false;
			slider.settings.autoControls = false;
			// if autoHover is requested
			if(slider.settings.tickerHover && !slider.usingCSS){
				// on el hover
				slider.viewport.hover(function(){
					el.stop();
				}, function(){
					// calculate the total width of children (used to calculate the speed ratio)
					var totalDimens = 0;
					slider.children.each(function(index){
					  totalDimens += slider.settings.mode == 'horizontal' ? $(this).outerWidth(true) : $(this).outerHeight(true);
					});
					// calculate the speed ratio (used to determine the new speed to finish the paused animation)
					var ratio = slider.settings.speed / totalDimens;
					// determine which property to use
					var property = slider.settings.mode == 'horizontal' ? 'left' : 'top';
					// calculate the new speed
					var newSpeed = ratio * (totalDimens - (Math.abs(parseInt(el.css(property)))));
					tickerLoop(newSpeed);
				});
			}
			// start the ticker loop
			tickerLoop();
		}

		/**
		 * Runs a continuous loop, news ticker-style
		 */
		var tickerLoop = function(resumeSpeed){
			speed = resumeSpeed ? resumeSpeed : slider.settings.speed;
			var position = {left: 0, top: 0};
			var reset = {left: 0, top: 0};
			// if "next" animate left position to last child, then reset left to 0
			if(slider.settings.autoDirection == 'next'){
				position = el.find('.bx-clone').first().position();
			// if "prev" animate left position to 0, then reset left to first non-clone child
			}else{
				reset = slider.children.first().position();
			}
			var animateProperty = slider.settings.mode == 'horizontal' ? -position.left : -position.top;
			var resetValue = slider.settings.mode == 'horizontal' ? -reset.left : -reset.top;
			var params = {resetValue: resetValue};
			setPositionProperty(animateProperty, 'ticker', speed, params);
		}

		/**
		 * Initializes touch events
		 */
		var initTouch = function(){
			// initialize object to contain all touch values
			slider.touch = {
				start: {x: 0, y: 0},
				end: {x: 0, y: 0}
			}
			slider.viewport.bind('touchstart', onTouchStart);
		}

		/**
		 * Event handler for "touchstart"
		 *
		 * @param e (event)
		 *  - DOM event object
		 */
		var onTouchStart = function(e){
			if(slider.working){
				e.preventDefault();
			}else{
				// record the original position when touch starts
				slider.touch.originalPos = el.position();
				var orig = e.originalEvent;
				// record the starting touch x, y coordinates
				slider.touch.start.x = orig.changedTouches[0].pageX;
				slider.touch.start.y = orig.changedTouches[0].pageY;
				// bind a "touchmove" event to the viewport
				slider.viewport.bind('touchmove', onTouchMove);
				// bind a "touchend" event to the viewport
				slider.viewport.bind('touchend', onTouchEnd);
			}
		}

		/**
		 * Event handler for "touchmove"
		 *
		 * @param e (event)
		 *  - DOM event object
		 */
		var onTouchMove = function(e){
			var orig = e.originalEvent;
			// if scrolling on y axis, do not prevent default
			var xMovement = Math.abs(orig.changedTouches[0].pageX - slider.touch.start.x);
			var yMovement = Math.abs(orig.changedTouches[0].pageY - slider.touch.start.y);
			// x axis swipe
			if((xMovement * 3) > yMovement && slider.settings.preventDefaultSwipeX){
				e.preventDefault();
			// y axis swipe
			}else if((yMovement * 3) > xMovement && slider.settings.preventDefaultSwipeY){
				e.preventDefault();
			}
			if(slider.settings.mode != 'fade' && slider.settings.oneToOneTouch){
				var value = 0;
				// if horizontal, drag along x axis
				if(slider.settings.mode == 'horizontal'){
					var change = orig.changedTouches[0].pageX - slider.touch.start.x;
					value = slider.touch.originalPos.left + change;
				// if vertical, drag along y axis
				}else{
					var change = orig.changedTouches[0].pageY - slider.touch.start.y;
					value = slider.touch.originalPos.top + change;
				}
				setPositionProperty(value, 'reset', 0);
			}
		}

		/**
		 * Event handler for "touchend"
		 *
		 * @param e (event)
		 *  - DOM event object
		 */
		var onTouchEnd = function(e){
			slider.viewport.unbind('touchmove', onTouchMove);
			var orig = e.originalEvent;
			var value = 0;
			// record end x, y positions
			slider.touch.end.x = orig.changedTouches[0].pageX;
			slider.touch.end.y = orig.changedTouches[0].pageY;
			// if fade mode, check if absolute x distance clears the threshold
			if(slider.settings.mode == 'fade'){
				var distance = Math.abs(slider.touch.start.x - slider.touch.end.x);
				if(distance >= slider.settings.swipeThreshold){
					slider.touch.start.x > slider.touch.end.x ? el.goToNextSlide() : el.goToPrevSlide();
					el.stopAuto();
				}
			// not fade mode
			}else{
				var distance = 0;
				// calculate distance and el's animate property
				if(slider.settings.mode == 'horizontal'){
					distance = slider.touch.end.x - slider.touch.start.x;
					value = slider.touch.originalPos.left;
				}else{
					distance = slider.touch.end.y - slider.touch.start.y;
					value = slider.touch.originalPos.top;
				}
				// if not infinite loop and first / last slide, do not attempt a slide transition
				if(!slider.settings.infiniteLoop && ((slider.active.index == 0 && distance > 0) || (slider.active.last && distance < 0))){
					setPositionProperty(value, 'reset', 200);
				}else{
					// check if distance clears threshold
					if(Math.abs(distance) >= slider.settings.swipeThreshold){
						distance < 0 ? el.goToNextSlide() : el.goToPrevSlide();
						el.stopAuto();
					}else{
						// el.animate(property, 200);
						setPositionProperty(value, 'reset', 200);
					}
				}
			}
			slider.viewport.unbind('touchend', onTouchEnd);
		}

		/**
		 * Window resize event callback
		 */
		var resizeWindow = function(e){
			// don't do anything if slider isn't initialized.
			if(!slider.initialized) return;
			// get the new window dimens (again, thank you IE)
			var windowWidthNew = $(window).width();
			var windowHeightNew = $(window).height();
			// make sure that it is a true window resize
			// *we must check this because our dinosaur friend IE fires a window resize event when certain DOM elements
			// are resized. Can you just die already?*
			if(windowWidth != windowWidthNew || windowHeight != windowHeightNew){
				// set the new window dimens
				windowWidth = windowWidthNew;
				windowHeight = windowHeightNew;
				// update all dynamic elements
				el.redrawSlider();
				// Call user resize handler
				slider.settings.onSliderResize.call(el, slider.active.index);
			}
		}

		/**
		 * ===================================================================================
		 * = PUBLIC FUNCTIONS
		 * ===================================================================================
		 */

		/**
		 * Performs slide transition to the specified slide
		 *
		 * @param slideIndex (int)
		 *  - the destination slide's index (zero-based)
		 *
		 * @param direction (string)
		 *  - INTERNAL USE ONLY - the direction of travel ("prev" / "next")
		 */
		el.goToSlide = function(slideIndex, direction){
			// if plugin is currently in motion, ignore request
			if(slider.working || slider.active.index == slideIndex) return;
			// declare that plugin is in motion
			slider.working = true;
			// store the old index
			slider.oldIndex = slider.active.index;
			// if slideIndex is less than zero, set active index to last child (this happens during infinite loop)
			if(slideIndex < 0){
				slider.active.index = getPagerQty() - 1;
			// if slideIndex is greater than children length, set active index to 0 (this happens during infinite loop)
			}else if(slideIndex >= getPagerQty()){
				slider.active.index = 0;
			// set active index to requested slide
			}else{
				slider.active.index = slideIndex;
			}
			// onSlideBefore, onSlideNext, onSlidePrev callbacks
			slider.settings.onSlideBefore(slider.children.eq(slider.active.index), slider.oldIndex, slider.active.index);
			if(direction == 'next'){
				slider.settings.onSlideNext(slider.children.eq(slider.active.index), slider.oldIndex, slider.active.index);
			}else if(direction == 'prev'){
				slider.settings.onSlidePrev(slider.children.eq(slider.active.index), slider.oldIndex, slider.active.index);
			}
			// check if last slide
			slider.active.last = slider.active.index >= getPagerQty() - 1;
			// update the pager with active class
			if(slider.settings.pager) updatePagerActive(slider.active.index);
			// // check for direction control update
			if(slider.settings.controls) updateDirectionControls();
			// if slider is set to mode: "fade"
			if(slider.settings.mode == 'fade'){
				// if adaptiveHeight is true and next height is different from current height, animate to the new height
				if(slider.settings.adaptiveHeight && slider.viewport.height() != getViewportHeight()){
					slider.viewport.animate({height: getViewportHeight()}, slider.settings.adaptiveHeightSpeed);
				}
				// fade out the visible child and reset its z-index value
				slider.children.filter(':visible').fadeOut(slider.settings.speed).css({zIndex: 0});
				// fade in the newly requested slide
				slider.children.eq(slider.active.index).css('zIndex', slider.settings.slideZIndex+1).fadeIn(slider.settings.speed, function(){
					$(this).css('zIndex', slider.settings.slideZIndex);
					updateAfterSlideTransition();
				});
			// slider mode is not "fade"
			}else{
				// if adaptiveHeight is true and next height is different from current height, animate to the new height
				if(slider.settings.adaptiveHeight && slider.viewport.height() != getViewportHeight()){
					slider.viewport.animate({height: getViewportHeight()}, slider.settings.adaptiveHeightSpeed);
				}
				var moveBy = 0;
				var position = {left: 0, top: 0};
				// if carousel and not infinite loop
				if(!slider.settings.infiniteLoop && slider.carousel && slider.active.last){
					if(slider.settings.mode == 'horizontal'){
						// get the last child position
						var lastChild = slider.children.eq(slider.children.length - 1);
						position = lastChild.position();
						// calculate the position of the last slide
						moveBy = slider.viewport.width() - lastChild.outerWidth();
					}else{
						// get last showing index position
						var lastShowingIndex = slider.children.length - slider.settings.minSlides;
						position = slider.children.eq(lastShowingIndex).position();
					}
					// horizontal carousel, going previous while on first slide (infiniteLoop mode)
				}else if(slider.carousel && slider.active.last && direction == 'prev'){
					// get the last child position
					var eq = slider.settings.moveSlides == 1 ? slider.settings.maxSlides - getMoveBy() : ((getPagerQty() - 1) * getMoveBy()) - (slider.children.length - slider.settings.maxSlides);
					var lastChild = el.children('.bx-clone').eq(eq);
					position = lastChild.position();
				// if infinite loop and "Next" is clicked on the last slide
				}else if(direction == 'next' && slider.active.index == 0){
					// get the last clone position
					position = el.find('> .bx-clone').eq(slider.settings.maxSlides).position();
					slider.active.last = false;
				// normal non-zero requests
				}else if(slideIndex >= 0){
					var requestEl = slideIndex * getMoveBy();
					position = slider.children.eq(requestEl).position();
				}

				/* If the position doesn't exist
				 * (e.g. if you destroy the slider on a next click),
				 * it doesn't throw an error.
				 */
				if ("undefined" !== typeof(position)) {
					var value = slider.settings.mode == 'horizontal' ? -(position.left - moveBy) : -position.top;
					// plugin values to be animated
					setPositionProperty(value, 'slide', slider.settings.speed);
				}
			}
		}

		/**
		 * Transitions to the next slide in the show
		 */
		el.goToNextSlide = function(){
			// if infiniteLoop is false and last page is showing, disregard call
			if (!slider.settings.infiniteLoop && slider.active.last) return;
			var pagerIndex = parseInt(slider.active.index) + 1;
			el.goToSlide(pagerIndex, 'next');
		}

		/**
		 * Transitions to the prev slide in the show
		 */
		el.goToPrevSlide = function(){
			// if infiniteLoop is false and last page is showing, disregard call
			if (!slider.settings.infiniteLoop && slider.active.index == 0) return;
			var pagerIndex = parseInt(slider.active.index) - 1;
			el.goToSlide(pagerIndex, 'prev');
		}

		/**
		 * Starts the auto show
		 *
		 * @param preventControlUpdate (boolean)
		 *  - if true, auto controls state will not be updated
		 */
		el.startAuto = function(preventControlUpdate){
			// if an interval already exists, disregard call
			if(slider.interval) return;
			// create an interval
			slider.interval = setInterval(function(){
				slider.settings.autoDirection == 'next' ? el.goToNextSlide() : el.goToPrevSlide();
			}, slider.settings.pause);
			// if auto controls are displayed and preventControlUpdate is not true
			if (slider.settings.autoControls && preventControlUpdate != true) updateAutoControls('stop');
		}

		/**
		 * Stops the auto show
		 *
		 * @param preventControlUpdate (boolean)
		 *  - if true, auto controls state will not be updated
		 */
		el.stopAuto = function(preventControlUpdate){
			// if no interval exists, disregard call
			if(!slider.interval) return;
			// clear the interval
			clearInterval(slider.interval);
			slider.interval = null;
			// if auto controls are displayed and preventControlUpdate is not true
			if (slider.settings.autoControls && preventControlUpdate != true) updateAutoControls('start');
		}

		/**
		 * Returns current slide index (zero-based)
		 */
		el.getCurrentSlide = function(){
			return slider.active.index;
		}

		/**
		 * Returns current slide element
		 */
		el.getCurrentSlideElement = function(){
			return slider.children.eq(slider.active.index);
		}

		/**
		 * Returns number of slides in show
		 */
		el.getSlideCount = function(){
			return slider.children.length;
		}

		/**
		 * Update all dynamic slider elements
		 */
		el.redrawSlider = function(){
			// resize all children in ratio to new screen size
			slider.children.add(el.find('.bx-clone')).width(getSlideWidth());
			// adjust the height
			slider.viewport.css('height', getViewportHeight());
			// update the slide position
			if(!slider.settings.ticker) setSlidePosition();
			// if active.last was true before the screen resize, we want
			// to keep it last no matter what screen size we end on
			if (slider.active.last) slider.active.index = getPagerQty() - 1;
			// if the active index (page) no longer exists due to the resize, simply set the index as last
			if (slider.active.index >= getPagerQty()) slider.active.last = true;
			// if a pager is being displayed and a custom pager is not being used, update it
			if(slider.settings.pager && !slider.settings.pagerCustom){
				populatePager();
				updatePagerActive(slider.active.index);
			}
		}

		/**
		 * Destroy the current instance of the slider (revert everything back to original state)
		 */
		el.destroySlider = function(){
			// don't do anything if slider has already been destroyed
			if(!slider.initialized) return;
			slider.initialized = false;
			$('.bx-clone', this).remove();
			slider.children.each(function() {
				$(this).data("origStyle") != undefined ? $(this).attr("style", $(this).data("origStyle")) : $(this).removeAttr('style');
			});
			$(this).data("origStyle") != undefined ? this.attr("style", $(this).data("origStyle")) : $(this).removeAttr('style');
			$(this).unwrap().unwrap();
			if(slider.controls.el) slider.controls.el.remove();
			if(slider.controls.next) slider.controls.next.remove();
			if(slider.controls.prev) slider.controls.prev.remove();
			if(slider.pagerEl && slider.settings.controls) slider.pagerEl.remove();
			$('.bx-caption', this).remove();
			if(slider.controls.autoEl) slider.controls.autoEl.remove();
			clearInterval(slider.interval);
			if(slider.settings.responsive) $(window).unbind('resize', resizeWindow);
		}

		/**
		 * Reload the slider (revert all DOM changes, and re-initialize)
		 */
		el.reloadSlider = function(settings){
			if (settings != undefined) options = settings;
			el.destroySlider();
			init();
		}

		init();

		// returns the current jQuery object
		return this;
	}

})(jQuery);

/*---------------------- YouTubePopUp ----------------------*/
/*  Name: YouTubePopUp Version: 1.0.1
    Description: jQuery plugin to display YouTube or Vimeo video in PopUp, responsive and retina, easy to use.
    Plugin URL: http://wp-time.com/youtube-popup-jquery-plugin/
    Written By: Qassim Hassan
    Twitter: @QQQHZ
    Websites: wp-time.com | qass.im | wp-plugins.in
    Dual licensed under the MIT and GPL licenses:
        http://www.opensource.org/licenses/mit-license.php
        http://www.gnu.org/licenses/gpl.html
    Copyright (c) 2016 - Qassim Hassan*/
(function ( $ ) {
    $.fn.YouTubePopUp = function(options) {
        var YouTubePopUpOptions = $.extend({
            autoplay: 1
        }, options );
        $(this).on('click', function (e) {
            var youtubeLink = $(this).attr("href");
            if( youtubeLink.match(/(youtube.com)/) ){
                var split_c = "v=";
                var split_n = 1;
            }
            if( youtubeLink.match(/(youtu.be)/) || youtubeLink.match(/(vimeo.com\/)+[0-9]/) ){
                var split_c = "/";
                var split_n = 3;
            }
            if( youtubeLink.match(/(vimeo.com\/)+[a-zA-Z]/) ){
                var split_c = "/";
                var split_n = 5;
            }
            var getYouTubeVideoID = youtubeLink.split(split_c)[split_n];
            var cleanVideoID = getYouTubeVideoID.replace(/(&)+(.*)/, "");
            if( youtubeLink.match(/(youtu.be)/) || youtubeLink.match(/(youtube.com)/) ){
                var videoEmbedLink = "https://www.youtube.com/embed/"+cleanVideoID+"?autoplay="+YouTubePopUpOptions.autoplay+"";
            }
            if( youtubeLink.match(/(vimeo.com\/)+[0-9]/) || youtubeLink.match(/(vimeo.com\/)+[a-zA-Z]/) ){
                var videoEmbedLink = "https://player.vimeo.com/video/"+cleanVideoID+"?autoplay="+YouTubePopUpOptions.autoplay+"";
            }
            $("body").append('<div class="YouTubePopUp-Wrap YouTubePopUp-animation"><div class="YouTubePopUp-Content"><span class="YouTubePopUp-Close"></span><iframe src="'+videoEmbedLink+'" allowfullscreen></iframe></div></div>');
            if( $('.YouTubePopUp-Wrap').hasClass('YouTubePopUp-animation') ){
                setTimeout(function() {
                    $('.YouTubePopUp-Wrap').removeClass("YouTubePopUp-animation");
                }, 600);
            }
            $(".YouTubePopUp-Wrap, .YouTubePopUp-Close").click(function(){
                $(".YouTubePopUp-Wrap").addClass("YouTubePopUp-Hide").delay(515).queue(function() { $(this).remove(); });
            });
            e.preventDefault();
        });
        $(document).keyup(function(e) {
            if ( e.keyCode == 27 ){
                $('.YouTubePopUp-Wrap, .YouTubePopUp-Close').click();
            }
        });
    }; 
}( jQuery ));

/*---------------------- FancyBox ----------------------*/
/*! fancyBox v2.1.5 fancyapps.com | fancyapps.com/fancybox/#license */
(function(s,H,f,w){var K=f("html"),q=f(s),p=f(H),b=f.fancybox=function(){b.open.apply(this,arguments)},J=navigator.userAgent.match(/msie/i),C=null,t=H.createTouch!==w,u=function(a){return a&&a.hasOwnProperty&&a instanceof f},r=function(a){return a&&"string"===f.type(a)},F=function(a){return r(a)&&0<a.indexOf("%")},m=function(a,d){var e=parseInt(a,10)||0;d&&F(a)&&(e*=b.getViewport()[d]/100);return Math.ceil(e)},x=function(a,b){return m(a,b)+"px"};f.extend(b,{version:"2.1.5",defaults:{padding:15,margin:20,
width:800,height:600,minWidth:100,minHeight:100,maxWidth:9999,maxHeight:9999,pixelRatio:1,autoSize:!0,autoHeight:!1,autoWidth:!1,autoResize:!0,autoCenter:!t,fitToView:!0,aspectRatio:!1,topRatio:0.5,leftRatio:0.5,scrolling:"auto",wrapCSS:"",arrows:!0,closeBtn:!0,closeClick:!1,nextClick:!1,mouseWheel:!0,autoPlay:!1,playSpeed:3E3,preload:3,modal:!1,loop:!0,ajax:{dataType:"html",headers:{"X-fancyBox":!0}},iframe:{scrolling:"auto",preload:!0},swf:{wmode:"transparent",allowfullscreen:"true",allowscriptaccess:"always"},
keys:{next:{13:"left",34:"up",39:"left",40:"up"},prev:{8:"right",33:"down",37:"right",38:"down"},close:[27],play:[32],toggle:[70]},direction:{next:"left",prev:"right"},scrollOutside:!0,index:0,type:null,href:null,content:null,title:null,tpl:{wrap:'<div class="fancybox-wrap" tabIndex="-1"><div class="fancybox-skin"><div class="fancybox-outer"><div class="fancybox-inner"></div></div></div></div>',image:'<img class="fancybox-image" src="{href}" alt="" />',iframe:'<iframe id="fancybox-frame{rnd}" name="fancybox-frame{rnd}" class="fancybox-iframe" frameborder="0" vspace="0" hspace="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen'+
(J?' allowtransparency="true"':"")+"></iframe>",error:'<p class="fancybox-error">The requested content cannot be loaded.<br/>Please try again later.</p>',closeBtn:'<a title="Close" class="fancybox-item fancybox-close" href="javascript:;"></a>',next:'<a title="Next" class="fancybox-nav fancybox-next" href="javascript:;"><span></span></a>',prev:'<a title="Previous" class="fancybox-nav fancybox-prev" href="javascript:;"><span></span></a>'},openEffect:"fade",openSpeed:250,openEasing:"swing",openOpacity:!0,
openMethod:"zoomIn",closeEffect:"fade",closeSpeed:250,closeEasing:"swing",closeOpacity:!0,closeMethod:"zoomOut",nextEffect:"elastic",nextSpeed:250,nextEasing:"swing",nextMethod:"changeIn",prevEffect:"elastic",prevSpeed:250,prevEasing:"swing",prevMethod:"changeOut",helpers:{overlay:!0,title:!0},onCancel:f.noop,beforeLoad:f.noop,afterLoad:f.noop,beforeShow:f.noop,afterShow:f.noop,beforeChange:f.noop,beforeClose:f.noop,afterClose:f.noop},group:{},opts:{},previous:null,coming:null,current:null,isActive:!1,
isOpen:!1,isOpened:!1,wrap:null,skin:null,outer:null,inner:null,player:{timer:null,isActive:!1},ajaxLoad:null,imgPreload:null,transitions:{},helpers:{},open:function(a,d){if(a&&(f.isPlainObject(d)||(d={}),!1!==b.close(!0)))return f.isArray(a)||(a=u(a)?f(a).get():[a]),f.each(a,function(e,c){var l={},g,h,k,n,m;"object"===f.type(c)&&(c.nodeType&&(c=f(c)),u(c)?(l={href:c.data("fancybox-href")||c.attr("href"),title:f("<div/>").text(c.data("fancybox-title")||c.attr("title")).html(),isDom:!0,element:c},
f.metadata&&f.extend(!0,l,c.metadata())):l=c);g=d.href||l.href||(r(c)?c:null);h=d.title!==w?d.title:l.title||"";n=(k=d.content||l.content)?"html":d.type||l.type;!n&&l.isDom&&(n=c.data("fancybox-type"),n||(n=(n=c.prop("class").match(/fancybox\.(\w+)/))?n[1]:null));r(g)&&(n||(b.isImage(g)?n="image":b.isSWF(g)?n="swf":"#"===g.charAt(0)?n="inline":r(c)&&(n="html",k=c)),"ajax"===n&&(m=g.split(/\s+/,2),g=m.shift(),m=m.shift()));k||("inline"===n?g?k=f(r(g)?g.replace(/.*(?=#[^\s]+$)/,""):g):l.isDom&&(k=c):
"html"===n?k=g:n||g||!l.isDom||(n="inline",k=c));f.extend(l,{href:g,type:n,content:k,title:h,selector:m});a[e]=l}),b.opts=f.extend(!0,{},b.defaults,d),d.keys!==w&&(b.opts.keys=d.keys?f.extend({},b.defaults.keys,d.keys):!1),b.group=a,b._start(b.opts.index)},cancel:function(){var a=b.coming;a&&!1===b.trigger("onCancel")||(b.hideLoading(),a&&(b.ajaxLoad&&b.ajaxLoad.abort(),b.ajaxLoad=null,b.imgPreload&&(b.imgPreload.onload=b.imgPreload.onerror=null),a.wrap&&a.wrap.stop(!0,!0).trigger("onReset").remove(),
b.coming=null,b.current||b._afterZoomOut(a)))},close:function(a){b.cancel();!1!==b.trigger("beforeClose")&&(b.unbindEvents(),b.isActive&&(b.isOpen&&!0!==a?(b.isOpen=b.isOpened=!1,b.isClosing=!0,f(".fancybox-item, .fancybox-nav").remove(),b.wrap.stop(!0,!0).removeClass("fancybox-opened"),b.transitions[b.current.closeMethod]()):(f(".fancybox-wrap").stop(!0).trigger("onReset").remove(),b._afterZoomOut())))},play:function(a){var d=function(){clearTimeout(b.player.timer)},e=function(){d();b.current&&b.player.isActive&&
(b.player.timer=setTimeout(b.next,b.current.playSpeed))},c=function(){d();p.unbind(".player");b.player.isActive=!1;b.trigger("onPlayEnd")};!0===a||!b.player.isActive&&!1!==a?b.current&&(b.current.loop||b.current.index<b.group.length-1)&&(b.player.isActive=!0,p.bind({"onCancel.player beforeClose.player":c,"onUpdate.player":e,"beforeLoad.player":d}),e(),b.trigger("onPlayStart")):c()},next:function(a){var d=b.current;d&&(r(a)||(a=d.direction.next),b.jumpto(d.index+1,a,"next"))},prev:function(a){var d=
b.current;d&&(r(a)||(a=d.direction.prev),b.jumpto(d.index-1,a,"prev"))},jumpto:function(a,d,e){var c=b.current;c&&(a=m(a),b.direction=d||c.direction[a>=c.index?"next":"prev"],b.router=e||"jumpto",c.loop&&(0>a&&(a=c.group.length+a%c.group.length),a%=c.group.length),c.group[a]!==w&&(b.cancel(),b._start(a)))},reposition:function(a,d){var e=b.current,c=e?e.wrap:null,l;c&&(l=b._getPosition(d),a&&"scroll"===a.type?(delete l.position,c.stop(!0,!0).animate(l,200)):(c.css(l),e.pos=f.extend({},e.dim,l)))},
update:function(a){var d=a&&a.originalEvent&&a.originalEvent.type,e=!d||"orientationchange"===d;e&&(clearTimeout(C),C=null);b.isOpen&&!C&&(C=setTimeout(function(){var c=b.current;c&&!b.isClosing&&(b.wrap.removeClass("fancybox-tmp"),(e||"load"===d||"resize"===d&&c.autoResize)&&b._setDimension(),"scroll"===d&&c.canShrink||b.reposition(a),b.trigger("onUpdate"),C=null)},e&&!t?0:300))},toggle:function(a){b.isOpen&&(b.current.fitToView="boolean"===f.type(a)?a:!b.current.fitToView,t&&(b.wrap.removeAttr("style").addClass("fancybox-tmp"),
b.trigger("onUpdate")),b.update())},hideLoading:function(){p.unbind(".loading");f("#fancybox-loading").remove()},showLoading:function(){var a,d;b.hideLoading();a=f('<div id="fancybox-loading"><div></div></div>').click(b.cancel).appendTo("body");p.bind("keydown.loading",function(a){27===(a.which||a.keyCode)&&(a.preventDefault(),b.cancel())});b.defaults.fixed||(d=b.getViewport(),a.css({position:"absolute",top:0.5*d.h+d.y,left:0.5*d.w+d.x}));b.trigger("onLoading")},getViewport:function(){var a=b.current&&
b.current.locked||!1,d={x:q.scrollLeft(),y:q.scrollTop()};a&&a.length?(d.w=a[0].clientWidth,d.h=a[0].clientHeight):(d.w=t&&s.innerWidth?s.innerWidth:q.width(),d.h=t&&s.innerHeight?s.innerHeight:q.height());return d},unbindEvents:function(){b.wrap&&u(b.wrap)&&b.wrap.unbind(".fb");p.unbind(".fb");q.unbind(".fb")},bindEvents:function(){var a=b.current,d;a&&(q.bind("orientationchange.fb"+(t?"":" resize.fb")+(a.autoCenter&&!a.locked?" scroll.fb":""),b.update),(d=a.keys)&&p.bind("keydown.fb",function(e){var c=
e.which||e.keyCode,l=e.target||e.srcElement;if(27===c&&b.coming)return!1;e.ctrlKey||e.altKey||e.shiftKey||e.metaKey||l&&(l.type||f(l).is("[contenteditable]"))||f.each(d,function(d,l){if(1<a.group.length&&l[c]!==w)return b[d](l[c]),e.preventDefault(),!1;if(-1<f.inArray(c,l))return b[d](),e.preventDefault(),!1})}),f.fn.mousewheel&&a.mouseWheel&&b.wrap.bind("mousewheel.fb",function(d,c,l,g){for(var h=f(d.target||null),k=!1;h.length&&!(k||h.is(".fancybox-skin")||h.is(".fancybox-wrap"));)k=h[0]&&!(h[0].style.overflow&&
"hidden"===h[0].style.overflow)&&(h[0].clientWidth&&h[0].scrollWidth>h[0].clientWidth||h[0].clientHeight&&h[0].scrollHeight>h[0].clientHeight),h=f(h).parent();0!==c&&!k&&1<b.group.length&&!a.canShrink&&(0<g||0<l?b.prev(0<g?"down":"left"):(0>g||0>l)&&b.next(0>g?"up":"right"),d.preventDefault())}))},trigger:function(a,d){var e,c=d||b.coming||b.current;if(c){f.isFunction(c[a])&&(e=c[a].apply(c,Array.prototype.slice.call(arguments,1)));if(!1===e)return!1;c.helpers&&f.each(c.helpers,function(d,e){if(e&&
b.helpers[d]&&f.isFunction(b.helpers[d][a]))b.helpers[d][a](f.extend(!0,{},b.helpers[d].defaults,e),c)})}p.trigger(a)},isImage:function(a){return r(a)&&a.match(/(^data:image\/.*,)|(\.(jp(e|g|eg)|gif|png|bmp|webp|svg)((\?|#).*)?$)/i)},isSWF:function(a){return r(a)&&a.match(/\.(swf)((\?|#).*)?$/i)},_start:function(a){var d={},e,c;a=m(a);e=b.group[a]||null;if(!e)return!1;d=f.extend(!0,{},b.opts,e);e=d.margin;c=d.padding;"number"===f.type(e)&&(d.margin=[e,e,e,e]);"number"===f.type(c)&&(d.padding=[c,c,
c,c]);d.modal&&f.extend(!0,d,{closeBtn:!1,closeClick:!1,nextClick:!1,arrows:!1,mouseWheel:!1,keys:null,helpers:{overlay:{closeClick:!1}}});d.autoSize&&(d.autoWidth=d.autoHeight=!0);"auto"===d.width&&(d.autoWidth=!0);"auto"===d.height&&(d.autoHeight=!0);d.group=b.group;d.index=a;b.coming=d;if(!1===b.trigger("beforeLoad"))b.coming=null;else{c=d.type;e=d.href;if(!c)return b.coming=null,b.current&&b.router&&"jumpto"!==b.router?(b.current.index=a,b[b.router](b.direction)):!1;b.isActive=!0;if("image"===
c||"swf"===c)d.autoHeight=d.autoWidth=!1,d.scrolling="visible";"image"===c&&(d.aspectRatio=!0);"iframe"===c&&t&&(d.scrolling="scroll");d.wrap=f(d.tpl.wrap).addClass("fancybox-"+(t?"mobile":"desktop")+" fancybox-type-"+c+" fancybox-tmp "+d.wrapCSS).appendTo(d.parent||"body");f.extend(d,{skin:f(".fancybox-skin",d.wrap),outer:f(".fancybox-outer",d.wrap),inner:f(".fancybox-inner",d.wrap)});f.each(["Top","Right","Bottom","Left"],function(a,b){d.skin.css("padding"+b,x(d.padding[a]))});b.trigger("onReady");
if("inline"===c||"html"===c){if(!d.content||!d.content.length)return b._error("content")}else if(!e)return b._error("href");"image"===c?b._loadImage():"ajax"===c?b._loadAjax():"iframe"===c?b._loadIframe():b._afterLoad()}},_error:function(a){f.extend(b.coming,{type:"html",autoWidth:!0,autoHeight:!0,minWidth:0,minHeight:0,scrolling:"no",hasError:a,content:b.coming.tpl.error});b._afterLoad()},_loadImage:function(){var a=b.imgPreload=new Image;a.onload=function(){this.onload=this.onerror=null;b.coming.width=
this.width/b.opts.pixelRatio;b.coming.height=this.height/b.opts.pixelRatio;b._afterLoad()};a.onerror=function(){this.onload=this.onerror=null;b._error("image")};a.src=b.coming.href;!0!==a.complete&&b.showLoading()},_loadAjax:function(){var a=b.coming;b.showLoading();b.ajaxLoad=f.ajax(f.extend({},a.ajax,{url:a.href,error:function(a,e){b.coming&&"abort"!==e?b._error("ajax",a):b.hideLoading()},success:function(d,e){"success"===e&&(a.content=d,b._afterLoad())}}))},_loadIframe:function(){var a=b.coming,
d=f(a.tpl.iframe.replace(/\{rnd\}/g,(new Date).getTime())).attr("scrolling",t?"auto":a.iframe.scrolling).attr("src",a.href);f(a.wrap).bind("onReset",function(){try{f(this).find("iframe").hide().attr("src","//about:blank").end().empty()}catch(a){}});a.iframe.preload&&(b.showLoading(),d.one("load",function(){f(this).data("ready",1);t||f(this).bind("load.fb",b.update);f(this).parents(".fancybox-wrap").width("100%").removeClass("fancybox-tmp").show();b._afterLoad()}));a.content=d.appendTo(a.inner);a.iframe.preload||
b._afterLoad()},_preloadImages:function(){var a=b.group,d=b.current,e=a.length,c=d.preload?Math.min(d.preload,e-1):0,f,g;for(g=1;g<=c;g+=1)f=a[(d.index+g)%e],"image"===f.type&&f.href&&((new Image).src=f.href)},_afterLoad:function(){var a=b.coming,d=b.current,e,c,l,g,h;b.hideLoading();if(a&&!1!==b.isActive)if(!1===b.trigger("afterLoad",a,d))a.wrap.stop(!0).trigger("onReset").remove(),b.coming=null;else{d&&(b.trigger("beforeChange",d),d.wrap.stop(!0).removeClass("fancybox-opened").find(".fancybox-item, .fancybox-nav").remove());
b.unbindEvents();e=a.content;c=a.type;l=a.scrolling;f.extend(b,{wrap:a.wrap,skin:a.skin,outer:a.outer,inner:a.inner,current:a,previous:d});g=a.href;switch(c){case "inline":case "ajax":case "html":a.selector?e=f("<div>").html(e).find(a.selector):u(e)&&(e.data("fancybox-placeholder")||e.data("fancybox-placeholder",f('<div class="fancybox-placeholder"></div>').insertAfter(e).hide()),e=e.show().detach(),a.wrap.bind("onReset",function(){f(this).find(e).length&&e.hide().replaceAll(e.data("fancybox-placeholder")).data("fancybox-placeholder",
!1)}));break;case "image":e=a.tpl.image.replace(/\{href\}/g,g);break;case "swf":e='<object id="fancybox-swf" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="100%" height="100%"><param name="movie" value="'+g+'"></param>',h="",f.each(a.swf,function(a,b){e+='<param name="'+a+'" value="'+b+'"></param>';h+=" "+a+'="'+b+'"'}),e+='<embed src="'+g+'" type="application/x-shockwave-flash" width="100%" height="100%"'+h+"></embed></object>"}u(e)&&e.parent().is(a.inner)||a.inner.append(e);b.trigger("beforeShow");
a.inner.css("overflow","yes"===l?"scroll":"no"===l?"hidden":l);b._setDimension();b.reposition();b.isOpen=!1;b.coming=null;b.bindEvents();if(!b.isOpened)f(".fancybox-wrap").not(a.wrap).stop(!0).trigger("onReset").remove();else if(d.prevMethod)b.transitions[d.prevMethod]();b.transitions[b.isOpened?a.nextMethod:a.openMethod]();b._preloadImages()}},_setDimension:function(){var a=b.getViewport(),d=0,e=!1,c=!1,e=b.wrap,l=b.skin,g=b.inner,h=b.current,c=h.width,k=h.height,n=h.minWidth,v=h.minHeight,p=h.maxWidth,
q=h.maxHeight,t=h.scrolling,r=h.scrollOutside?h.scrollbarWidth:0,y=h.margin,z=m(y[1]+y[3]),s=m(y[0]+y[2]),w,A,u,D,B,G,C,E,I;e.add(l).add(g).width("auto").height("auto").removeClass("fancybox-tmp");y=m(l.outerWidth(!0)-l.width());w=m(l.outerHeight(!0)-l.height());A=z+y;u=s+w;D=F(c)?(a.w-A)*m(c)/100:c;B=F(k)?(a.h-u)*m(k)/100:k;if("iframe"===h.type){if(I=h.content,h.autoHeight&&1===I.data("ready"))try{I[0].contentWindow.document.location&&(g.width(D).height(9999),G=I.contents().find("body"),r&&G.css("overflow-x",
"hidden"),B=G.outerHeight(!0))}catch(H){}}else if(h.autoWidth||h.autoHeight)g.addClass("fancybox-tmp"),h.autoWidth||g.width(D),h.autoHeight||g.height(B),h.autoWidth&&(D=g.width()),h.autoHeight&&(B=g.height()),g.removeClass("fancybox-tmp");c=m(D);k=m(B);E=D/B;n=m(F(n)?m(n,"w")-A:n);p=m(F(p)?m(p,"w")-A:p);v=m(F(v)?m(v,"h")-u:v);q=m(F(q)?m(q,"h")-u:q);G=p;C=q;h.fitToView&&(p=Math.min(a.w-A,p),q=Math.min(a.h-u,q));A=a.w-z;s=a.h-s;h.aspectRatio?(c>p&&(c=p,k=m(c/E)),k>q&&(k=q,c=m(k*E)),c<n&&(c=n,k=m(c/
E)),k<v&&(k=v,c=m(k*E))):(c=Math.max(n,Math.min(c,p)),h.autoHeight&&"iframe"!==h.type&&(g.width(c),k=g.height()),k=Math.max(v,Math.min(k,q)));if(h.fitToView)if(g.width(c).height(k),e.width(c+y),a=e.width(),z=e.height(),h.aspectRatio)for(;(a>A||z>s)&&c>n&&k>v&&!(19<d++);)k=Math.max(v,Math.min(q,k-10)),c=m(k*E),c<n&&(c=n,k=m(c/E)),c>p&&(c=p,k=m(c/E)),g.width(c).height(k),e.width(c+y),a=e.width(),z=e.height();else c=Math.max(n,Math.min(c,c-(a-A))),k=Math.max(v,Math.min(k,k-(z-s)));r&&"auto"===t&&k<B&&
c+y+r<A&&(c+=r);g.width(c).height(k);e.width(c+y);a=e.width();z=e.height();e=(a>A||z>s)&&c>n&&k>v;c=h.aspectRatio?c<G&&k<C&&c<D&&k<B:(c<G||k<C)&&(c<D||k<B);f.extend(h,{dim:{width:x(a),height:x(z)},origWidth:D,origHeight:B,canShrink:e,canExpand:c,wPadding:y,hPadding:w,wrapSpace:z-l.outerHeight(!0),skinSpace:l.height()-k});!I&&h.autoHeight&&k>v&&k<q&&!c&&g.height("auto")},_getPosition:function(a){var d=b.current,e=b.getViewport(),c=d.margin,f=b.wrap.width()+c[1]+c[3],g=b.wrap.height()+c[0]+c[2],c={position:"absolute",
top:c[0],left:c[3]};d.autoCenter&&d.fixed&&!a&&g<=e.h&&f<=e.w?c.position="fixed":d.locked||(c.top+=e.y,c.left+=e.x);c.top=x(Math.max(c.top,c.top+(e.h-g)*d.topRatio));c.left=x(Math.max(c.left,c.left+(e.w-f)*d.leftRatio));return c},_afterZoomIn:function(){var a=b.current;a&&((b.isOpen=b.isOpened=!0,b.wrap.css("overflow","visible").addClass("fancybox-opened"),b.update(),(a.closeClick||a.nextClick&&1<b.group.length)&&b.inner.css("cursor","pointer").bind("click.fb",function(d){f(d.target).is("a")||f(d.target).parent().is("a")||
(d.preventDefault(),b[a.closeClick?"close":"next"]())}),a.closeBtn&&f(a.tpl.closeBtn).appendTo(b.skin).bind("click.fb",function(a){a.preventDefault();b.close()}),a.arrows&&1<b.group.length&&((a.loop||0<a.index)&&f(a.tpl.prev).appendTo(b.outer).bind("click.fb",b.prev),(a.loop||a.index<b.group.length-1)&&f(a.tpl.next).appendTo(b.outer).bind("click.fb",b.next)),b.trigger("afterShow"),a.loop||a.index!==a.group.length-1)?b.opts.autoPlay&&!b.player.isActive&&(b.opts.autoPlay=!1,b.play(!0)):b.play(!1))},
_afterZoomOut:function(a){a=a||b.current;f(".fancybox-wrap").trigger("onReset").remove();f.extend(b,{group:{},opts:{},router:!1,current:null,isActive:!1,isOpened:!1,isOpen:!1,isClosing:!1,wrap:null,skin:null,outer:null,inner:null});b.trigger("afterClose",a)}});b.transitions={getOrigPosition:function(){var a=b.current,d=a.element,e=a.orig,c={},f=50,g=50,h=a.hPadding,k=a.wPadding,n=b.getViewport();!e&&a.isDom&&d.is(":visible")&&(e=d.find("img:first"),e.length||(e=d));u(e)?(c=e.offset(),e.is("img")&&
(f=e.outerWidth(),g=e.outerHeight())):(c.top=n.y+(n.h-g)*a.topRatio,c.left=n.x+(n.w-f)*a.leftRatio);if("fixed"===b.wrap.css("position")||a.locked)c.top-=n.y,c.left-=n.x;return c={top:x(c.top-h*a.topRatio),left:x(c.left-k*a.leftRatio),width:x(f+k),height:x(g+h)}},step:function(a,d){var e,c,f=d.prop;c=b.current;var g=c.wrapSpace,h=c.skinSpace;if("width"===f||"height"===f)e=d.end===d.start?1:(a-d.start)/(d.end-d.start),b.isClosing&&(e=1-e),c="width"===f?c.wPadding:c.hPadding,c=a-c,b.skin[f](m("width"===
f?c:c-g*e)),b.inner[f](m("width"===f?c:c-g*e-h*e))},zoomIn:function(){var a=b.current,d=a.pos,e=a.openEffect,c="elastic"===e,l=f.extend({opacity:1},d);delete l.position;c?(d=this.getOrigPosition(),a.openOpacity&&(d.opacity=0.1)):"fade"===e&&(d.opacity=0.1);b.wrap.css(d).animate(l,{duration:"none"===e?0:a.openSpeed,easing:a.openEasing,step:c?this.step:null,complete:b._afterZoomIn})},zoomOut:function(){var a=b.current,d=a.closeEffect,e="elastic"===d,c={opacity:0.1};e&&(c=this.getOrigPosition(),a.closeOpacity&&
(c.opacity=0.1));b.wrap.animate(c,{duration:"none"===d?0:a.closeSpeed,easing:a.closeEasing,step:e?this.step:null,complete:b._afterZoomOut})},changeIn:function(){var a=b.current,d=a.nextEffect,e=a.pos,c={opacity:1},f=b.direction,g;e.opacity=0.1;"elastic"===d&&(g="down"===f||"up"===f?"top":"left","down"===f||"right"===f?(e[g]=x(m(e[g])-200),c[g]="+=200px"):(e[g]=x(m(e[g])+200),c[g]="-=200px"));"none"===d?b._afterZoomIn():b.wrap.css(e).animate(c,{duration:a.nextSpeed,easing:a.nextEasing,complete:b._afterZoomIn})},
changeOut:function(){var a=b.previous,d=a.prevEffect,e={opacity:0.1},c=b.direction;"elastic"===d&&(e["down"===c||"up"===c?"top":"left"]=("up"===c||"left"===c?"-":"+")+"=200px");a.wrap.animate(e,{duration:"none"===d?0:a.prevSpeed,easing:a.prevEasing,complete:function(){f(this).trigger("onReset").remove()}})}};b.helpers.overlay={defaults:{closeClick:!0,speedOut:200,showEarly:!0,css:{},locked:!t,fixed:!0},overlay:null,fixed:!1,el:f("html"),create:function(a){var d;a=f.extend({},this.defaults,a);this.overlay&&
this.close();d=b.coming?b.coming.parent:a.parent;this.overlay=f('<div class="fancybox-overlay"></div>').appendTo(d&&d.lenth?d:"body");this.fixed=!1;a.fixed&&b.defaults.fixed&&(this.overlay.addClass("fancybox-overlay-fixed"),this.fixed=!0)},open:function(a){var d=this;a=f.extend({},this.defaults,a);this.overlay?this.overlay.unbind(".overlay").width("auto").height("auto"):this.create(a);this.fixed||(q.bind("resize.overlay",f.proxy(this.update,this)),this.update());a.closeClick&&this.overlay.bind("click.overlay",
function(a){if(f(a.target).hasClass("fancybox-overlay"))return b.isActive?b.close():d.close(),!1});this.overlay.css(a.css).show()},close:function(){q.unbind("resize.overlay");this.el.hasClass("fancybox-lock")&&(f(".fancybox-margin").removeClass("fancybox-margin"),this.el.removeClass("fancybox-lock"),q.scrollTop(this.scrollV).scrollLeft(this.scrollH));f(".fancybox-overlay").remove().hide();f.extend(this,{overlay:null,fixed:!1})},update:function(){var a="100%",b;this.overlay.width(a).height("100%");
J?(b=Math.max(H.documentElement.offsetWidth,H.body.offsetWidth),p.width()>b&&(a=p.width())):p.width()>q.width()&&(a=p.width());this.overlay.width(a).height(p.height())},onReady:function(a,b){var e=this.overlay;f(".fancybox-overlay").stop(!0,!0);e||this.create(a);a.locked&&this.fixed&&b.fixed&&(b.locked=this.overlay.append(b.wrap),b.fixed=!1);!0===a.showEarly&&this.beforeShow.apply(this,arguments)},beforeShow:function(a,b){b.locked&&!this.el.hasClass("fancybox-lock")&&(!1!==this.fixPosition&&f("*").filter(function(){return"fixed"===
f(this).css("position")&&!f(this).hasClass("fancybox-overlay")&&!f(this).hasClass("fancybox-wrap")}).addClass("fancybox-margin"),this.el.addClass("fancybox-margin"),this.scrollV=q.scrollTop(),this.scrollH=q.scrollLeft(),this.el.addClass("fancybox-lock"),q.scrollTop(this.scrollV).scrollLeft(this.scrollH));this.open(a)},onUpdate:function(){this.fixed||this.update()},afterClose:function(a){this.overlay&&!b.coming&&this.overlay.fadeOut(a.speedOut,f.proxy(this.close,this))}};b.helpers.title={defaults:{type:"float",
position:"bottom"},beforeShow:function(a){var d=b.current,e=d.title,c=a.type;f.isFunction(e)&&(e=e.call(d.element,d));if(r(e)&&""!==f.trim(e)){d=f('<div class="fancybox-title fancybox-title-'+c+'-wrap">'+e+"</div>");switch(c){case "inside":c=b.skin;break;case "outside":c=b.wrap;break;case "over":c=b.inner;break;default:c=b.skin,d.appendTo("body"),J&&d.width(d.width()),d.wrapInner('<span class="child"></span>'),b.current.margin[2]+=Math.abs(m(d.css("margin-bottom")))}d["top"===a.position?"prependTo":
"appendTo"](c)}}};f.fn.fancybox=function(a){var d,e=f(this),c=this.selector||"",l=function(g){var h=f(this).blur(),k=d,l,m;g.ctrlKey||g.altKey||g.shiftKey||g.metaKey||h.is(".fancybox-wrap")||(l=a.groupAttr||"data-fancybox-group",m=h.attr(l),m||(l="rel",m=h.get(0)[l]),m&&""!==m&&"nofollow"!==m&&(h=c.length?f(c):e,h=h.filter("["+l+'="'+m+'"]'),k=h.index(this)),a.index=k,!1!==b.open(h,a)&&g.preventDefault())};a=a||{};d=a.index||0;c&&!1!==a.live?p.undelegate(c,"click.fb-start").delegate(c+":not('.fancybox-item, .fancybox-nav')",
"click.fb-start",l):e.unbind("click.fb-start").bind("click.fb-start",l);this.filter("[data-fancybox-start=1]").trigger("click");return this};p.ready(function(){var a,d;f.scrollbarWidth===w&&(f.scrollbarWidth=function(){var a=f('<div style="width:50px;height:50px;overflow:auto"><div/></div>').appendTo("body"),b=a.children(),b=b.innerWidth()-b.height(99).innerWidth();a.remove();return b});f.support.fixedPosition===w&&(f.support.fixedPosition=function(){var a=f('<div style="position:fixed;top:20px;"></div>').appendTo("body"),
b=20===a[0].offsetTop||15===a[0].offsetTop;a.remove();return b}());f.extend(b.defaults,{scrollbarWidth:f.scrollbarWidth(),fixed:f.support.fixedPosition,parent:f("body")});a=f(s).width();K.addClass("fancybox-lock-test");d=f(s).width();K.removeClass("fancybox-lock-test");f("<style type='text/css'>.fancybox-margin{margin-right:"+(d-a)+"px;}</style>").appendTo("head")})})(window,document,jQuery);

/*---------------------- xxx ----------------------*/