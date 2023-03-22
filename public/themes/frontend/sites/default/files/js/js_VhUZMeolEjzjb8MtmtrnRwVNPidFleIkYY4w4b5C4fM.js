/* Source and licensing information for the line(s) below can be found at https://www.blood.ca/core/modules/views/js/ajax_view.js. */
(function(e,i,t){i.behaviors.ViewsAjaxView={};i.behaviors.ViewsAjaxView.attach=function(e,t){if(t&&t.views&&t.views.ajaxViews){var s=t.views.ajaxViews;Object.keys(s||{}).forEach(function(e){i.views.instances[e]=new i.views.ajaxView(s[e])})}};i.behaviors.ViewsAjaxView.detach=function(t,s,a){if(a==='unload'){if(s&&s.views&&s.views.ajaxViews){var r=s.views.ajaxViews;Object.keys(r||{}).forEach(function(a){var o='.js-view-dom-id-'+r[a].view_dom_id;if(e(o,t).length){delete i.views.instances[a];delete s.views.ajaxViews[a]}})}}};i.views={};i.views.instances={};i.views.ajaxView=function(s){var o='.js-view-dom-id-'+s.view_dom_id;this.$view=e(o);var r=t.views.ajax_path;if(r.constructor.toString().indexOf('Array')!==-1){r=r[0]};var a=window.location.search||'';if(a!==''){a=a.slice(1).replace(/q=[^&]+&?|&?render=[^&]+/,'');if(a!==''){a=(/\?/.test(r)?'&':'?')+a}};this.element_settings={url:r+a,submit:s,setClick:!0,event:'click',selector:o,progress:{type:'fullscreen'}};this.settings=s;this.$exposed_form=e('form#views-exposed-form-'+s.view_name.replace(/_/g,'-')+'-'+s.view_display_id.replace(/_/g,'-'));this.$exposed_form.once('exposed-form').each(e.proxy(this.attachExposedFormAjax,this));this.$view.filter(e.proxy(this.filterNestedViews,this)).once('ajax-pager').each(e.proxy(this.attachPagerAjax,this));var n=e.extend({},this.element_settings,{event:'RefreshView',base:this.selector,element:this.$view.get(0)});this.refreshViewAjax=i.ajax(n)};i.views.ajaxView.prototype.attachExposedFormAjax=function(){var t=this;this.exposedFormAjax=[];e('input[type=submit], input[type=image]',this.$exposed_form).not('[data-drupal-selector=edit-reset]').each(function(s){var a=e.extend({},t.element_settings,{base:e(this).attr('id'),element:this});t.exposedFormAjax[s]=i.ajax(a)})};i.views.ajaxView.prototype.filterNestedViews=function(){return!this.$view.parents('.view').length};i.views.ajaxView.prototype.attachPagerAjax=function(){this.$view.find('ul.js-pager__items > li > a, th.views-field a, .attachment .views-summary a').each(e.proxy(this.attachPagerLinkAjax,this))};i.views.ajaxView.prototype.attachPagerLinkAjax=function(t,s){var n=e(s),r={};var a=n.attr('href');e.extend(r,this.settings,i.Views.parseQueryString(a),i.Views.parseViewArgs(a,this.settings.view_base_path));var o=e.extend({},this.element_settings,{submit:r,base:!1,element:s});this.pagerAjax=i.ajax(o)};i.AjaxCommands.prototype.viewsScrollTop=function(i,t){var a=e(t.selector).offset(),s=t.selector;while(e(s).scrollTop()===0&&e(s).parent()){s=e(s).parent()};if(a.top-10<e(s).scrollTop()){e(s).animate({scrollTop:a.top-10},500)}}})(jQuery,Drupal,drupalSettings);
/* Source and licensing information for the above line(s) can be found at https://www.blood.ca/core/modules/views/js/ajax_view.js. */;
/* Source and licensing information for the line(s) below can be found at https://www.blood.ca/themes/contrib/bootstrap_barrio/js/modules/views/ajax_view.js. */
(function(t,e){'use strict';e.views.ajaxView.prototype.attachExposedFormAjax=function(){var a=this;this.exposedFormAjax=[];t('button[type=submit], input[type=submit], input[type=image]',this.$exposed_form).not('[data-drupal-selector=edit-reset]').each(function(i){var s=t.extend({},a.element_settings,{base:t(this).attr('id'),element:this});a.exposedFormAjax[i]=e.ajax(s)})}})(jQuery,Drupal);
/* Source and licensing information for the above line(s) can be found at https://www.blood.ca/themes/contrib/bootstrap_barrio/js/modules/views/ajax_view.js. */;
/* Source and licensing information for the line(s) below can be found at https://www.blood.ca/modules/contrib/better_exposed_filters/js/better_exposed_filters.js. */
(function(e,t,c){t.behaviors.betterExposedFilters={attach:function(t,c){e('.bef-tree input[type=checkbox], .bef-checkboxes input[type=checkbox]').change(function(){i(this,t)}).filter(':checked').closest('.form-item',t).addClass('highlight')}};function i(i,t){$elem=e(i,t);$elem.attr('checked')?$elem.closest('.form-item',t).addClass('highlight'):$elem.closest('.form-item',t).removeClass('highlight')}})(jQuery,Drupal,drupalSettings);
/* Source and licensing information for the above line(s) can be found at https://www.blood.ca/modules/contrib/better_exposed_filters/js/better_exposed_filters.js. */;
/* Source and licensing information for the line(s) below can be found at https://www.blood.ca/modules/contrib/better_exposed_filters/js/auto_submit.js. */
(function(e,t){t.behaviors.betterExposedFiltersAutoSubmit={attach:function(a){var r=[16,17,18,20,33,34,35,36,37,38,39,40,9,13,27],i='form[data-bef-auto-submit-full-form], [data-bef-auto-submit-full-form] form, [data-bef-auto-submit]';function u(e){e.closest('form').find('[data-bef-auto-submit-click]').click()};var o=e('.views-exposed-form .form-date.datepicker-here');e(o).each(function(){let me=this;e(me).datepicker({onHide:function(t,a){u(e(me))}})});e(i,a).addBack(i).once('bef-auto-submit').on('change keyup keypress',function(t){var a=e(t.target);if(a.is('[data-bef-auto-submit-exclude], :submit')){return!0}
else if(a.is(':text:not(.hasDatepicker), textarea')&&e.inArray(t.keyCode,r)===-1){return}
else if(t.type==='change'){u(a)}});e(i,a).addBack(i).find('input:text:not(.hasDatepicker), textarea').once('bef-auto-submit-text').on('change keyup keypress',t.debounce(function(t){var a=e(t.target);if(a.is('[data-bef-auto-submit-exclude], :submit')){return!0};u(a)},drupalSettings.data.better_exposed_filters.autosubmitTextfieldDelay))}}}(jQuery,Drupal));
/* Source and licensing information for the above line(s) can be found at https://www.blood.ca/modules/contrib/better_exposed_filters/js/auto_submit.js. */;
/* Source and licensing information for the line(s) below can be found at https://www.blood.ca/core/assets/vendor/js-cookie/js.cookie.min.js. */
/*! js-cookie v3.0.0-rc.0 | MIT */
!function(e,t){"object"==typeof exports&&"undefined"!=typeof module?module.exports=t():"function"==typeof define&&define.amd?define(t):(e=e||self,function(){var r=e.Cookies,n=e.Cookies=t();n.noConflict=function(){return e.Cookies=r,n}}())}(this,function(){"use strict";function e(e){for(var t=1;t<arguments.length;t++){var r=arguments[t];for(var n in r)e[n]=r[n]}return e}var t={read:function(e){return e.replace(/%3B/g,";")},write:function(e){return e.replace(/;/g,"%3B")}};return function r(n,i){function o(r,o,u){if("undefined"!=typeof document){"number"==typeof(u=e({},i,u)).expires&&(u.expires=new Date(Date.now()+864e5*u.expires)),u.expires&&(u.expires=u.expires.toUTCString()),r=t.write(r).replace(/=/g,"%3D"),o=n.write(String(o),r);var c="";for(var f in u)u[f]&&(c+="; "+f,!0!==u[f]&&(c+="="+u[f].split(";")[0]));return document.cookie=r+"="+o+c}}return Object.create({set:o,get:function(e){if("undefined"!=typeof document&&(!arguments.length||e)){for(var r=document.cookie?document.cookie.split("; "):[],i={},o=0;o<r.length;o++){var u=r[o].split("="),c=u.slice(1).join("="),f=t.read(u[0]).replace(/%3D/g,"=");if(i[f]=n.read(c,f),e===f)break}return e?i[e]:i}},remove:function(t,r){o(t,"",e({},r,{expires:-1}))},withAttributes:function(t){return r(this.converter,e({},this.attributes,t))},withConverter:function(t){return r(e({},this.converter,t),this.attributes)}},{attributes:{value:Object.freeze(i)},converter:{value:Object.freeze(n)}})}(t,{path:"/"})});

/* Source and licensing information for the above line(s) can be found at https://www.blood.ca/core/assets/vendor/js-cookie/js.cookie.min.js. */;
/* Source and licensing information for the line(s) below can be found at https://www.blood.ca/core/misc/jquery.cookie.shim.js. */
(function(e,t,n){var r=function(e){return Object.prototype.toString.call(e)==='[object Function]'},o=function(e,n){if(e.indexOf('"')===0){e=e.slice(1,-1).replace(/\\"/g,'"').replace(/\\\\/g,'\\')};try{e=decodeURIComponent(e.replace(/\+/g,' '));return n?JSON.parse(e):e}catch(t){}},i=function(e,n,t,u,c){var i=u?e:o(e,c);if(t!==undefined&&r(t)){return t(i,n)};return i};e.cookie=function(t){var o=arguments.length>1&&arguments[1]!==undefined?arguments[1]:undefined,d=arguments.length>2&&arguments[2]!==undefined?arguments[2]:undefined;t=t&&!e.cookie.raw?encodeURIComponent(t):t;if(o!==undefined&&!r(o)){var u=Object.assign({},e.cookie.defaults,d);if(typeof u.expires==='string'&&u.expires!==''){u.expires=new Date(u.expires)};var s=n.withConverter({write:function(e){return encodeURIComponent(e)}});o=e.cookie.json&&!e.cookie.raw?JSON.stringify(o):String(o);return s.set(t,o,u)};var f=o,a=n.withConverter({read:function(n,t){return i(n,t,f,e.cookie.raw,e.cookie.json)}});if(t!==undefined){return a.get(t)};var c=a.get();Object.keys(c).forEach(function(e){if(c[e]===undefined){delete c[e]}});return c};e.cookie.defaults=Object.assign({path:''},n.defaults);e.cookie.json=!1;e.cookie.raw=!1;e.removeCookie=function(t,r){n.remove(t,Object.assign({},e.cookie.defaults,r));return!n.get(t)}})(jQuery,Drupal,window.Cookies);
/* Source and licensing information for the above line(s) can be found at https://www.blood.ca/core/misc/jquery.cookie.shim.js. */;
/* Source and licensing information for the line(s) below can be found at https://www.blood.ca/modules/contrib/closeblock/js/closeblock.js. */
(function(e,o){'use strict';o.behaviors.closeblock={attach:function(s,c){var o=c.closeBlockSettings,l=e('<span />').addClass('closeblock-button').html(o.close_block_button_text),t=e('<div />').addClass('closeblock').append(l);e('.close-block').each(function(){if(e.cookie('closeblock-'+this.id)){e('#'+this.id).hide()}
else{e('#'+this.id).show();e('.close-block').once().prepend(t)}});e('.closeblock-button').once().click(function(){switch(o.close_block_type){case'fadeOut':e(this).closest('.close-block').fadeOut(o.close_block_speed);break;case'slideUp':e(this).closest('.close-block').slideUp(o.close_block_speed);break;default:e(this).closest('.close-block').hide();break};e.cookie('closeblock-'+e(this).closest('.close-block').attr('id'),'1',{path:'/',expires:parseInt(o.reset_cookie_time)})});e('#closeblock-clear-cookie-button').once().click(function(){for(var o in e.cookie()){if(o.indexOf('closeblock-')>=0){e.removeCookie(o,{path:'/'})}}})}}})(jQuery,Drupal);
/* Source and licensing information for the above line(s) can be found at https://www.blood.ca/modules/contrib/closeblock/js/closeblock.js. */;
/* Source and licensing information for the line(s) below can be found at https://www.blood.ca/modules/custom/cbs_blood_search_block/js/cbs-blood-search-block.js. */
(function(e,a,t){a.behaviors.cbsBloodSearchBlock={attach:function(t,n){e('#cbs-search-block-container',t).once('searchCollapse').each(function(n){var r=e(this),t=e(this).find('.btn-search'),d=e(this).find('.cbs-search-close'),c=e(this).find('#cbs-search-toggle'),s=e('#cbs-secondary-menu-wrap'),i=e(this).find('input[name="keys"]');t.click(function(e){e.preventDefault();if(r.attr('data-expanded')!=='true'){t.attr('aria-expanded','true');d.attr('aria-expanded','true');s.attr('data-expanded','false');r.attr('data-expanded','true');a.announce(a.t('The search form is now visible and the secondary menu is hidden.'))}});t.focus(function(e){a.announce(a.t('Use the search link to expand the search form.'))});d.click(function(e){e.preventDefault();t.attr('aria-expanded','false');d.attr('aria-expanded','false');r.attr('data-expanded','false');s.attr('data-expanded','true');if(t.length>0){t.focus()};a.announce(a.t('The search form has been hidden and the secondary menu is now visible.'))});r.focusout(function(n){target=e(n.relatedTarget);if(target.parents('#cbs-search-block-container').length==0){t.attr('aria-expanded','false');d.attr('aria-expanded','false');r.attr('data-expanded','false');s.attr('data-expanded','true');a.announce(a.t('The search form has been hidden and the secondary menu is now visible.'))}})})}}})(jQuery,Drupal,drupalSettings);
/* Source and licensing information for the above line(s) can be found at https://www.blood.ca/modules/custom/cbs_blood_search_block/js/cbs-blood-search-block.js. */;
/* Source and licensing information for the line(s) below can be found at https://www.blood.ca/modules/custom/cbs_login_block/js/cbs-login-block.js. */
(function(e,n,o){n.behaviors.cbsLoginBlock={attach:function(t,i){var c=o.cbsLoginBlock.portalUrl,n=new XMLHttpRequest();n.onreadystatechange=function(){if(n.readyState==XMLHttpRequest.DONE){if(n.responseText){var i=JSON.parse(n.responseText);if(i.isLoggedIn){e('#block-cbslogin .btn.login').html(o.cbsLoginBlock.myAccount);var t=new Date();t.setTime(t.getTime()+(5*60*1000));e.cookie('cbsLoginBlock','1',{expires:t})}
else{e('#block-cbslogin .btn.login').html(o.cbsLoginBlock.login);e.cookie('cbsLoginBlock',null,{expires:-1})}}}};n.open('GET',c,!0);n.withCredentials=!0;n.send(null)}}})(jQuery,Drupal,drupalSettings);
/* Source and licensing information for the above line(s) can be found at https://www.blood.ca/modules/custom/cbs_login_block/js/cbs-login-block.js. */;
