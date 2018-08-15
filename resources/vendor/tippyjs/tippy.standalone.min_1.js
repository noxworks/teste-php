(function(a,b){'object'==typeof exports&&'undefined'!=typeof module?module.exports=b(require('popper.js')):'function'==typeof define&&define.amd?define(['popper.js'],b):a.tippy=b(a.Popper)})(this,function(a){'use strict';function b(a){return'[object Object]'===Object.prototype.toString.call(a)}function c(a){if(a instanceof Element||b(a))return[a];if(a instanceof NodeList)return[].slice.call(a);if(Array.isArray(a))return a;try{return[].slice.call(document.querySelectorAll(a))}catch(a){return[]}}function d(a){for(var b=[!1,'webkit'],c=a.charAt(0).toUpperCase()+a.slice(1),d=0;d<b.length;d++){var e=b[d],f=e?''+e+c:a;if('undefined'!=typeof document.body.style[f])return f}return null}function f(a,b,c){var e=c.placement,f=c.distance,g=c.arrow,h=c.arrowType,i=c.arrowTransform,j=c.animateFill,k=c.inertia,l=c.animation,m=c.size,n=c.theme,o=c.html,p=c.zIndex,q=c.interactive,r=c.maxWidth,s=document.createElement('div');s.setAttribute('class','tippy-popper'),s.setAttribute('role','tooltip'),s.setAttribute('id','tippy-'+a),s.style.zIndex=p,s.style.maxWidth=r;var u=document.createElement('div');if(u.setAttribute('class','tippy-tooltip'),u.setAttribute('data-size',m),u.setAttribute('data-animation',l),u.setAttribute('data-state','hidden'),n.split(' ').forEach(function(a){u.classList.add(a+'-theme')}),g){var t=document.createElement('div');t.style[d('transform')]=i,'round'===h?(t.classList.add('tippy-roundarrow'),t.innerHTML='\n      <svg width="100%" height="100%" viewBox="0 0 64 20" xml:space="preserve" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:1.41421;">\n        <g transform="matrix(1.04009,0,0,1.45139,-1.26297,-65.9145)">\n          <path d="M1.214,59.185C1.214,59.185 12.868,59.992 21.5,51.55C29.887,43.347 33.898,43.308 42.5,51.55C51.352,60.031 62.747,59.185 62.747,59.185L1.214,59.185Z"/>\n        </g>\n      </svg>'):t.classList.add('tippy-arrow'),u.appendChild(t)}if(j){u.setAttribute('data-animatefill','');var v=document.createElement('div');v.setAttribute('data-state','hidden'),v.classList.add('tippy-backdrop'),u.appendChild(v)}k&&u.setAttribute('data-inertia',''),q&&u.setAttribute('data-interactive','');var w=document.createElement('div');if(w.setAttribute('class','tippy-content'),o){var x;o instanceof Element?(w.appendChild(o),x='#'+o.id||'tippy-html-template'):(w.innerHTML=document.querySelector(o).innerHTML,x=o),s.setAttribute('data-html',''),q&&s.setAttribute('tabindex','-1'),u.setAttribute('data-template-id',x)}else w.innerHTML=b;return u.appendChild(w),s.appendChild(u),s}function g(a,b,c,d){var e=[];return'manual'===a?e:(b.addEventListener(a,c.handleTrigger),e.push({event:a,handler:c.handleTrigger}),'mouseenter'===a&&(M.supportsTouch&&d&&(b.addEventListener('touchstart',c.handleTrigger),e.push({event:'touchstart',handler:c.handleTrigger}),b.addEventListener('touchend',c.handleMouseleave),e.push({event:'touchend',handler:c.handleMouseleave})),b.addEventListener('mouseleave',c.handleMouseleave),e.push({event:'mouseleave',handler:c.handleMouseleave})),'focus'===a&&(b.addEventListener('blur',c.handleBlur),e.push({event:'blur',handler:c.handleBlur})),e)}function h(a,b){var c=P.reduce(function(c,d){var e=a.getAttribute('data-tippy-'+d.toLowerCase())||b[d];return'false'===e&&(e=!1),'true'===e&&(e=!0),isFinite(e)&&!isNaN(parseFloat(e))&&(e=parseFloat(e)),'string'==typeof e&&'['===e.trim().charAt(0)&&(e=JSON.parse(e)),c[d]=e,c},{});return S({},b,c)}function i(a,b){return b.arrow&&(b.animateFill=!1),b.appendTo&&'function'==typeof b.appendTo&&(b.appendTo=b.appendTo()),'function'==typeof b.html&&(b.html=b.html(a)),b}function j(a){return{tooltip:a.querySelector(N.TOOLTIP),backdrop:a.querySelector(N.BACKDROP),content:a.querySelector(N.CONTENT)}}function k(a){var b=a.getAttribute('title');b&&a.setAttribute('data-original-title',b),a.removeAttribute('title')}function l(a){return a.getAttribute('x-placement').replace(/-.+/,'')}function m(a,b,c){if(!b.getAttribute('x-placement'))return!0;var d=a.clientX,e=a.clientY,f=c.interactiveBorder,g=c.distance,h=b.getBoundingClientRect(),i=l(b),j=f+g,k={top:h.top-e>f,bottom:e-h.bottom>f,left:h.left-d>f,right:d-h.right>f};return'top'===i?k.top=h.top-e>j:'bottom'===i?k.bottom=e-h.bottom>j:'left'===i?k.left=h.left-d>j:'right'===i?k.right=d-h.right>j:void 0,k.top||k.bottom||k.left||k.right}function n(a,b,c,d){if(!b.length)return'';var e={scale:function(){return 1===b.length?''+b[0]:c?b[0]+', '+b[1]:b[1]+', '+b[0]}(),translate:function(){return 1===b.length?d?-b[0]+'px':b[0]+'px':c?d?b[0]+'px, '+-b[1]+'px':b[0]+'px, '+b[1]+'px':d?-b[1]+'px, '+b[0]+'px':b[1]+'px, '+b[0]+'px'}()};return e[a]}function o(a,b){if(!a)return'';return b?a:{X:'Y',Y:'X'}[a]}function p(a,b,c){var e=l(a),f='top'===e||'bottom'===e,g='right'===e||'bottom'===e,h=function(a){var b=c.match(a);return b?b[1]:''},i=function(a){var b=c.match(a);return b?b[1].split(',').map(parseFloat):[]},j={translate:/translateX?Y?\(([^)]+)\)/,scale:/scaleX?Y?\(([^)]+)\)/},k={translate:{axis:h(/translate([XY])/),numbers:i(j.translate)},scale:{axis:h(/scale([XY])/),numbers:i(j.scale)}},m=c.replace(j.translate,'translate'+o(k.translate.axis,f)+'('+n('translate',k.translate.numbers,f,g)+')').replace(j.scale,'scale'+o(k.scale.axis,f)+'('+n('scale',k.scale.numbers,f,g)+')');b.style[d('transform')]=m}function q(a){var b=a.getBoundingClientRect();return 0<=b.top&&0<=b.left&&b.bottom<=(window.innerHeight||document.documentElement.clientHeight)&&b.right<=(window.innerWidth||document.documentElement.clientWidth)}function r(a){return-(a-O.distance)+'px'}function s(a){requestAnimationFrame(function(){setTimeout(a,0)})}function t(a,b){var c=Element.prototype.closest||function(a){for(var b=this;b;){if(e.call(b,a))return b;b=b.parentElement}};return c.call(a,b)}function u(a,b){return Array.isArray(a)?a[b]:a}function v(a,b){a.forEach(function(a){a&&a.setAttribute('data-state',b)})}function w(a,b){a.forEach(function(a){a&&(a.style[d('transitionDuration')]=b+'ms')})}function x(a){var b=this;if(C.call(this),!this.state.visible){if(this.options.wait)return void this.options.wait.call(this.popper,this.show.bind(this),a);var c=Array.isArray(this.options.delay)?this.options.delay[0]:this.options.delay;c?this._internal.showTimeout=setTimeout(function(){b.show()},c):this.show()}}function y(){var a=this;if(C.call(this),!!this.state.visible){var b=Array.isArray(this.options.delay)?this.options.delay[1]:this.options.delay;b?this._internal.hideTimeout=setTimeout(function(){a.state.visible&&a.hide()},b):this.hide()}}function z(){var a=this;return{handleTrigger:function(b){if(!a.state.disabled){var c=M.supportsTouch&&M.usingTouch&&('mouseenter'===b.type||'focus'===b.type);c&&a.options.touchHold||(a._internal.lastTriggerEvent=b,'click'===b.type&&'persistent'!==a.options.hideOnClick&&a.state.visible?y.call(a):x.call(a,b),c&&M.iOS&&a.reference.click&&a.reference.click())}},handleMouseleave:function(b){if(!('mouseleave'===b.type&&M.supportsTouch&&M.usingTouch&&a.options.touchHold)){if(a.options.interactive){var c=y.bind(a),d=function b(d){var e=t(d.target,N.REFERENCE),f=t(d.target,N.POPPER)===a.popper,g=e===a.reference;f||g||m(d,a.popper,a.options)&&(document.body.removeEventListener('mouseleave',c),document.removeEventListener('mousemove',b),y.call(a))};return document.body.addEventListener('mouseleave',c),void document.addEventListener('mousemove',d)}y.call(a)}},handleBlur:function(b){!b.relatedTarget||M.usingTouch||t(b.relatedTarget,N.POPPER)||y.call(a)}}}function A(){var b=this,c=this.popper,e=this.reference,f=this.options,g=j(c),h=g.tooltip,i=f.popperOptions,k='round'===f.arrowType?N.ROUND_ARROW:N.ARROW,m=h.querySelector(k),n=S({placement:f.placement},i||{},{modifiers:S({},i?i.modifiers:{},{arrow:S({element:k},i&&i.modifiers?i.modifiers.arrow:{}),flip:S({enabled:f.flip,padding:f.distance+5,behavior:f.flipBehavior},i&&i.modifiers?i.modifiers.flip:{}),offset:S({offset:f.offset},i&&i.modifiers?i.modifiers.offset:{})}),onCreate:function(){h.style[l(c)]=r(f.distance),m&&f.arrowTransform&&p(c,m,f.arrowTransform)},onUpdate:function(){var a=h.style;a.top='',a.bottom='',a.left='',a.right='',a[l(c)]=r(f.distance),m&&f.arrowTransform&&p(c,m,f.arrowTransform)}});return F.call(this,{target:c,callback:function(){var a=c.style;a[d('transitionDuration')]='0ms',b.popperInstance.update(),s(function(){a[d('transitionDuration')]=f.updateDuration+'ms'})},options:{childList:!0,subtree:!0,characterData:!0}}),new a(e,c,n)}function B(){var a=this,b=this.popper;this.options.appendTo.contains(b)||(this.options.appendTo.appendChild(b),this.popperInstance?(b.style[d('transform')]=null,this.popperInstance.update(),(!this.options.followCursor||M.usingTouch)&&this.popperInstance.enableEventListeners()):this.popperInstance=A.call(this),this.options.followCursor&&!M.usingTouch&&(!this._internal.followCursorListener&&D.call(this),document.addEventListener('mousemove',this._internal.followCursorListener),this.popperInstance.disableEventListeners(),s(function(){a._internal.followCursorListener(a._internal.lastTriggerEvent)})))}function C(){clearTimeout(this._internal.showTimeout),clearTimeout(this._internal.hideTimeout)}function D(){var a=this;this._internal.followCursorListener=function(b){var c=Math.round;if(!(a._internal.lastTriggerEvent&&'focus'===a._internal.lastTriggerEvent.type)){var e,f,g=a.popper,h=a.options.offset,i=l(g),j=c(g.offsetWidth/2),k=c(g.offsetHeight/2),m=5,n=document.documentElement.offsetWidth||document.body.offsetWidth,o=b.pageX,p=b.pageY;'top'===i?(e=o-j+h,f=p-2*k):'bottom'===i?(e=o-j+h,f=p+10):'left'===i?(e=o-2*j,f=p-k+h):'right'===i?(e=o+5,f=p-k+h):void 0;('top'===i||'bottom'===i)&&(o+m+j+h>n&&(e=n-m-2*j),0>o-m-j+h&&(e=m)),g.style[d('transform')]='translate3d('+e+'px, '+f+'px, 0)'}}}function E(){var a=this,b=function(){a.popper.style[d('transitionDuration')]=a.options.updateDuration+'ms'},c=function(){a.popper.style[d('transitionDuration')]=''};s(function d(){a.popperInstance&&a.popperInstance.scheduleUpdate(),b(),a.state.visible?requestAnimationFrame(d):c()})}function F(a){var b=a.target,c=a.callback,d=a.options;if(window.MutationObserver){var e=new MutationObserver(c);e.observe(b,d),this._internal.mutationObservers.push(e)}}function G(a,b){if(!a)return b();var c=j(this.popper),d=c.tooltip,f=function(a,b){b&&d[a+'EventListener']('ontransitionend'in window?'transitionend':'webkitTransitionEnd',b)},e=function a(c){c.target===d&&(f('remove',a),b())};f('remove',this._internal.transitionendListener),f('add',e),this._internal.transitionendListener=e}function H(a,b){return a.reduce(function(a,c){var d=W,e=i(c,b.performance?b:h(c,b)),l=e.html,m=e.trigger,n=e.touchHold,o=e.dynamicTitle,p=e.createPopperInstanceOnInit,q=c.getAttribute('title');if(!q&&!l)return a;c.setAttribute('data-tippy',''),c.setAttribute('aria-describedby','tippy-'+d),k(c);var r=f(d,q,e),s=new V({id:d,reference:c,popper:r,options:e});s.popperInstance=p?A.call(s):null;var t=z.call(s);return s.listeners=m.trim().split(' ').reduce(function(a,b){return a.concat(g(b,c,t,n))},[]),o&&F.call(s,{target:c,callback:function(){var a=j(r),b=a.content,d=c.getAttribute('title');d&&(b.innerHTML=d,k(c))},options:{attributes:!0}}),c._tippy=s,r._reference=c,a.push(s),W++,a},[])}function I(a){var b=[].slice.call(document.querySelectorAll(N.POPPER));b.forEach(function(b){var c=b._reference._tippy,d=c.options;(!0===d.hideOnClick||-1<d.trigger.indexOf('focus'))&&(!a||b!==a.popper)&&c.hide()})}function J(){var a=function(){M.usingTouch||(M.usingTouch=!0,M.iOS&&document.body.classList.add('tippy-touch'),M.dynamicInputDetection&&window.performance&&document.addEventListener('mousemove',b),M.onUserInputChange('touch'))},b=function(){var a;return function(){var c=performance.now();20>c-a&&(M.usingTouch=!1,document.removeEventListener('mousemove',b),!M.iOS&&document.body.classList.remove('tippy-touch'),M.onUserInputChange('mouse')),a=c}}();document.addEventListener('click',function(a){if(!(a.target instanceof Element))return I();var b=t(a.target,N.REFERENCE),c=t(a.target,N.POPPER);if(!(c&&c._reference._tippy.options.interactive)){if(b){var d=b._tippy.options;if(!d.multiple&&M.usingTouch||!d.multiple&&-1<d.trigger.indexOf('click'))return I(b._tippy);if(!0!==d.hideOnClick||-1<d.trigger.indexOf('click'))return}I()}}),document.addEventListener('touchstart',a),window.addEventListener('blur',function(){var a=document,b=a.activeElement;b&&b.blur&&e.call(b,N.REFERENCE)&&b.blur()}),!M.supportsTouch&&(navigator.maxTouchPoints||navigator.msMaxTouchPoints)&&document.addEventListener('pointerdown',a)}function K(a,d){return M.supported&&!M._eventListenersBound&&(J(),M._eventListenersBound=!0),b(a)&&(a.refObj=!0,a.attributes=a.attributes||{},a.setAttribute=function(b,c){a.attributes[b]=c},a.getAttribute=function(b){return a.attributes[b]},a.removeAttribute=function(b){delete a.attributes[b]},a.addEventListener=function(){},a.removeEventListener=function(){},a.classList={classNames:{},add:function(b){return a.classList.classNames[b]=!0},remove:function(b){return delete a.classList.classNames[b],!0},contains:function(b){return!!a.classList.classNames[b]}}),d=S({},O,d),{selector:a,options:d,tooltips:M.supported?H(c(a),d):[],destroyAll:function(){this.tooltips.forEach(function(a){return a.destroy()})}}}a=a&&a.hasOwnProperty('default')?a['default']:a;var L='undefined'!=typeof window,M={};L&&(M.supported='requestAnimationFrame'in window,M.supportsTouch='ontouchstart'in window,M.usingTouch=!1,M.dynamicInputDetection=!0,M.iOS=/iPhone|iPad|iPod/.test(navigator.platform)&&!window.MSStream,M.onUserInputChange=function(){},M._eventListenersBound=!1);var N={POPPER:'.tippy-popper',TOOLTIP:'.tippy-tooltip',CONTENT:'.tippy-content',BACKDROP:'.tippy-backdrop',ARROW:'.tippy-arrow',ROUND_ARROW:'.tippy-roundarrow',REFERENCE:'[data-tippy]'},O={placement:'top',trigger:'mouseenter focus',animation:'shift-away',html:!1,animateFill:!0,arrow:!1,delay:0,duration:[350,300],interactive:!1,interactiveBorder:2,theme:'dark',size:'regular',distance:10,offset:0,hideOnClick:!0,multiple:!1,followCursor:!1,inertia:!1,updateDuration:350,sticky:!1,appendTo:function(){return document.body},zIndex:9999,touchHold:!1,performance:!1,dynamicTitle:!1,flip:!0,flipBehavior:'flip',arrowType:'sharp',arrowTransform:'',maxWidth:'',popperOptions:{},createPopperInstanceOnInit:!1,onShow:function(){},onShown:function(){},onHide:function(){},onHidden:function(){}},P=M.supported&&Object.keys(O),Q=function(a,b){if(!(a instanceof b))throw new TypeError('Cannot call a class as a function')},R=function(){function a(a,b){for(var c,d=0;d<b.length;d++)c=b[d],c.enumerable=c.enumerable||!1,c.configurable=!0,'value'in c&&(c.writable=!0),Object.defineProperty(a,c.key,c)}return function(b,c,d){return c&&a(b.prototype,c),d&&a(b,d),b}}(),S=Object.assign||function(a){for(var b,c=1;c<arguments.length;c++)for(var d in b=arguments[c],b)Object.prototype.hasOwnProperty.call(b,d)&&(a[d]=b[d]);return a},T={};if(L){var U=Element.prototype;T=U.matches||U.matchesSelector||U.webkitMatchesSelector||U.mozMatchesSelector||U.msMatchesSelector||function(a){for(var b=(this.document||this.ownerDocument).querySelectorAll(a),c=b.length;0<=--c&&b.item(c)!==this;);return-1<c}}var e=T,V=function(){function a(b){for(var c in Q(this,a),b)this[c]=b[c];this.state={destroyed:!1,visible:!1,enabled:!0},this._internal={mutationObservers:[]}}return R(a,[{key:'enable',value:function(){this.state.enabled=!0}},{key:'disable',value:function(){this.state.enabled=!1}},{key:'show',value:function(a){var b=this;if(!this.state.destroyed&&this.state.enabled){var c=this.popper,e=this.reference,f=this.options,g=j(c),h=g.tooltip,i=g.backdrop,k=g.content;return e.refObj||document.documentElement.contains(e)?void(f.onShow.call(c),a=u(void 0===a?f.duration:a,0),w([c,h,i],0),B.call(this),c.style.visibility='visible',this.state.visible=!0,s(function(){b.state.visible&&((!f.followCursor||M.usingTouch)&&(b.popperInstance.update(),w([c],f.updateDuration)),w([h,i,i?k:null],a),i&&getComputedStyle(i)[d('transform')],f.interactive&&e.classList.add('tippy-active'),f.sticky&&E.call(b),v([h,i],'visible'),G.call(b,a,function(){f.updateDuration||h.classList.add('tippy-notransition'),f.interactive&&c.focus(),f.onShown.call(c)}))})):void this.destroy()}}},{key:'hide',value:function(a){var b=this;if(!this.state.destroyed&&this.state.enabled){var c=this.popper,d=this.reference,e=this.options,f=j(c),g=f.tooltip,h=f.backdrop,i=f.content;e.onHide.call(c),a=u(void 0===a?e.duration:a,1),e.updateDuration||g.classList.remove('tippy-notransition'),e.interactive&&d.classList.remove('tippy-active'),c.style.visibility='hidden',this.state.visible=!1,w([g,h,h?i:null],a),v([g,h],'hidden'),e.interactive&&-1<e.trigger.indexOf('click')&&q(d)&&d.focus(),s(function(){G.call(b,a,function(){b.state.visible||!e.appendTo.contains(c)||(b.popperInstance.disableEventListeners(),document.removeEventListener('mousemove',b._internal.followCursorListener),e.appendTo.removeChild(c),e.onHidden.call(c))})})}}},{key:'destroy',value:function(){var a=this;this.state.destroyed||(this.state.visible&&this.hide(0),this.listeners.forEach(function(b){a.reference.removeEventListener(b.event,b.handler)}),this.reference.setAttribute('title',this.reference.getAttribute('data-original-title')),delete this.reference._tippy,['data-original-title','data-tippy','aria-describedby'].forEach(function(b){a.reference.removeAttribute(b)}),this.popperInstance&&this.popperInstance.destroy(),this._internal.mutationObservers.forEach(function(a){a.disconnect()}),this.state.destroyed=!0)}}]),a}(),W=1;return K.browser=M,K.defaults=O,K});
