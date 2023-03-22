/* Source and licensing information for the line(s) below can be found at https://www.blood.ca/modules/contrib/webform/js/webform.dialog.js. */
(function(o,e,i){'use strict';e.webform=e.webform||{};e.webform.dialog=e.webform.dialog||{};e.webform.dialog.options=e.webform.dialog.options||{};e.webformOpenDialog=function(i,t){var a=o('<div><a href="'+i+'" class="webform-dialog '+t+'"></a></div>');e.behaviors.webformDialog.attach(a);a.find('a').trigger('click')};e.behaviors.webformDialog={attach:function(t){o('a.webform-dialog',t).once('webform-dialog').each(function(){var r=o(this),l=o.extend({},e.webform.dialog.options);if(r.attr('class').match(/webform-dialog-([a-z0-9_]+)/)){var n=RegExp.$1;if(i.webform.dialog.options[n]){l=i.webform.dialog.options[n];delete l.title}};if(o(this).data('dialog-options')){o.extend(l,o(this).data('dialog-options'))};var t=r.attr('href');if(t.indexOf('?source_entity_type=ENTITY_TYPE&source_entity_id=ENTITY_ID')!==-1){if(i.webform.dialog.entity_type&&i.webform.dialog.entity_id){t=t.replace('ENTITY_TYPE',encodeURIComponent(i.webform.dialog.entity_type));t=t.replace('ENTITY_ID',encodeURIComponent(i.webform.dialog.entity_id))}
else{t=t.replace('?source_entity_type=ENTITY_TYPE&source_entity_id=ENTITY_ID','')};r.attr('href',t)};t+=(t.indexOf('?')===-1?'?':'&')+'_webform_dialog=1';var a={};a.progress={type:'fullscreen'};a.url=t;a.event='click';a.dialogType=r.data('dialog-type')||'modal';a.dialog=l;a.element=this;a.error=function(e,o){if(e.status===403){window.location.replace(t.split('?')[0])}};e.ajax(a)})}}})(jQuery,Drupal,drupalSettings);
/* Source and licensing information for the above line(s) can be found at https://www.blood.ca/modules/contrib/webform/js/webform.dialog.js. */;
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
