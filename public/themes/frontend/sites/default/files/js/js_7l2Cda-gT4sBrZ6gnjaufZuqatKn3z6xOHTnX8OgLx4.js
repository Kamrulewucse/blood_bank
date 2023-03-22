/* Source and licensing information for the line(s) below can be found at https://www.blood.ca/modules/contrib/webform/js/webform.form.js. */
(function(t,e){'use strict';e.behaviors.webformRemoveFormSingleSubmit={attach:function(){function e(e){var r=t(e.currentTarget);r.removeAttr('data-drupal-form-submit-last')};t('body').once('webform-single-submit').on('submit.singleSubmit','form.webform-remove-single-submit',e)}};e.behaviors.webformDisableAutoSubmit={attach:function(e){t('.js-webform-disable-autosubmit input').not(':button, :submit, :reset, :image, :file').once('webform-disable-autosubmit').on('keyup keypress',function(t){if(t.which===13){t.preventDefault();return!1}})}};e.behaviors.webformRequiredError={attach:function(e){t(e).find(':input[data-webform-required-error], :input[data-webform-pattern-error]').once('webform-required-error').on('invalid',function(){this.setCustomValidity('');if(this.valid){return};if(this.validity.patternMismatch&&t(this).attr('data-webform-pattern-error')){this.setCustomValidity(t(this).attr('data-webform-pattern-error'))}
else if(this.validity.valueMissing&&t(this).attr('data-webform-required-error')){this.setCustomValidity(t(this).attr('data-webform-required-error'))}}).on('input change',function(){var e=t(this).attr('name');t(this.form).find(':input[name="'+e+'"]').each(function(){this.setCustomValidity('')})})}};t(document).on('state:required',function(e){t(e.target).filter('[data-webform-required-error]').each(function(){this.setCustomValidity('')})})})(jQuery,Drupal);
/* Source and licensing information for the above line(s) can be found at https://www.blood.ca/modules/contrib/webform/js/webform.form.js. */;
/* Source and licensing information for the line(s) below can be found at https://www.blood.ca/modules/contrib/webform/js/webform.element.details.save.js. */
(function(e,r){'use strict';var t=(function(){try{localStorage.setItem('webform','webform');localStorage.removeItem('webform');return!0}catch(e){return!1}}());r.behaviors.webformDetailsSave={attach:function(a){if(!t){return};e('details > summary',a).once('webform-details-summary-save').on('click',function(){var t=e(this).parent();if(t[0].hasAttribute('data-webform-details-nosave')){return};var a=r.webformDetailsSaveGetName(t);if(!a){return};var n=(t.attr('open')!=='open')?'1':'0';localStorage.setItem(a,n)});e('details',a).once('webform-details-save').each(function(){var t=e(this),n=r.webformDetailsSaveGetName(t);if(!n){return};var a=localStorage.getItem(n);if(a===null){return};if(a==='1'){t.attr('open','open')}
else{t.removeAttr('open')}})}};r.webformDetailsSaveGetName=function(e){if(!t){return''};if(e.hasClass('vertical-tabs__pane')){return''};var o=e.attr('data-webform-element-id');if(o){return'Drupal.webform.'+o.replace('--','.')};var a=e.attr('id');if(!a){return''};var n=e.parents('form');if(!n.length||!n.attr('id')){return''};var r=n.attr('id');if(!r){return''};r=r.replace(/--.+?$/,'').replace(/-/g,'_');a=a.replace(/--.+?$/,'').replace(/-/g,'_');return'Drupal.webform.'+r+'.'+a}})(jQuery,Drupal);
/* Source and licensing information for the above line(s) can be found at https://www.blood.ca/modules/contrib/webform/js/webform.element.details.save.js. */;
/* Source and licensing information for the line(s) below can be found at https://www.blood.ca/modules/contrib/webform/js/webform.element.details.toggle.js. */
(function(t,e){'use strict';e.webform=e.webform||{};e.webform.detailsToggle=e.webform.detailsToggle||{};e.webform.detailsToggle.options=e.webform.detailsToggle.options||{};e.behaviors.webformDetailsToggle={attach:function(l){t('.js-webform-details-toggle',l).once('webform-details-toggle').each(function(){var l=t(this),o=l.find('.webform-tabs'),n=(o.length)?'.webform-tab':'.js-webform-details-toggle, .webform-elements',i=l.find('details').filter(function(){var e=t(this).parentsUntil(n);return(e.find('details').length===0)});if(i.length<2){return};var s=t.extend({button:'<button type="button" class="webform-details-toggle-state"></button>'},e.webform.detailsToggle.options);var a=t(s.button).attr('title',e.t('Toggle details widget state.')).on('click',function(o){var a=l.find('details:not(.vertical-tabs__pane)'),i;if(e.webform.detailsToggle.isFormDetailsOpen(l)){a.removeAttr('open');i=0}
else{a.attr('open','open');i=1};e.webform.detailsToggle.setDetailsToggleLabel(l);if(e.webformDetailsSaveGetName){a.each(function(){var l=e.webformDetailsSaveGetName(t(this));if(l){localStorage.setItem(l,i)}})}}).wrap('<div class="webform-details-toggle-state-wrapper"></div>').parent();if(o.length){o.find('.item-list:first-child').eq(0).before(a)}
else{i.eq(0).before(a)};e.webform.detailsToggle.setDetailsToggleLabel(l)})}};e.webform.detailsToggle.isFormDetailsOpen=function(e){return(e.find('details[open]').length===e.find('details').length)};e.webform.detailsToggle.setDetailsToggleLabel=function(t){var l=e.webform.detailsToggle.isFormDetailsOpen(t),a=(l)?e.t('Collapse all'):e.t('Expand all');t.find('.webform-details-toggle-state').html(a);var o=(l)?e.t('All details have been expanded.'):e.t('All details have been collapsed.');e.announce(o)}})(jQuery,Drupal);
/* Source and licensing information for the above line(s) can be found at https://www.blood.ca/modules/contrib/webform/js/webform.element.details.toggle.js. */;
/* Source and licensing information for the line(s) below can be found at https://www.blood.ca/modules/contrib/webform/js/webform.element.message.js. */
(function(e,t){'use strict';var s=(function(){try{localStorage.setItem('webform','webform');localStorage.removeItem('webform');return!0}catch(e){return!1}}()),r=(function(){try{sessionStorage.setItem('webform','webform');sessionStorage.removeItem('webform');return!0}catch(e){return!1}}());t.behaviors.webformMessageClose={attach:function(t){e(t).find('.js-webform-message--close').once('webform-message--close').each(function(){var t=e(this),r=t.attr('data-message-id'),n=t.attr('data-message-storage'),s=t.attr('data-message-close-effect')||'hide';switch(s){case'slide':s='slideUp';break;case'fade':s='fadeOut';break};if(a(t,n,r)){return};if(t.attr('style')!=='display: none;'){t.show()};t.find('.js-webform-message__link').on('click',function(e){t[s]();o(t,n,r);t.trigger('close');e.preventDefault()})})}};function a(e,t,a){if(!a||!t){return!1};switch(t){case'local':if(s){return localStorage.getItem('Drupal.webform.message.'+a)||!1};return!1;case'session':if(r){return sessionStorage.getItem('Drupal.webform.message.'+a)||!1};return!1;default:return!1}};function o(t,a,o){if(!o||!a){return};switch(a){case'local':if(s){localStorage.setItem('Drupal.webform.message.'+o,!0)};break;case'session':if(r){sessionStorage.setItem('Drupal.webform.message.'+o,!0)};break;case'user':case'state':case'custom':e.get(t.find('.js-webform-message__link').attr('href'));return!0}}})(jQuery,Drupal);
/* Source and licensing information for the above line(s) can be found at https://www.blood.ca/modules/contrib/webform/js/webform.element.message.js. */;
/* Source and licensing information for the line(s) below can be found at https://www.blood.ca/modules/contrib/webform/js/webform.wizard.track.js. */
(function(a,r){'use strict';r.behaviors.webformWizardTrackPage={attach:function(r){if(window.history&&window.history.replaceState){var t=a(r).hasData('webform-wizard-current-page')?a(r):a(r).find('[data-webform-wizard-current-page]');if(t.length&&t.is(':visible')){var i=t.attr('data-webform-wizard-current-page'),o=e(window.location.toString(),i);window.history.replaceState(null,null,o)}};a(':button[data-webform-wizard-page], :submit[data-webform-wizard-page]',r).once('webform-wizard-page').on('click',function(){var r=a(this).attr('data-webform-wizard-page');this.form.action=e(this.form.action,r)});function e(a,r){var t=/([?&])page=[^?&]+/;if(a.match(t)){return a.replace(t,'$1page='+r)}
else{return a+(a.indexOf('?')!==-1?'&page=':'?page=')+r}}}}})(jQuery,Drupal);
/* Source and licensing information for the above line(s) can be found at https://www.blood.ca/modules/contrib/webform/js/webform.wizard.track.js. */;
/* Source and licensing information for the line(s) below can be found at https://www.blood.ca/modules/contrib/webform/js/webform.element.details.js. */
(function(e,i){'use strict';i.behaviors.webformDetailsInvalid={attach:function(t){e('details :input',t).on('invalid',function(){e(this).parents('details:not([open])').children('summary').trigger('click');if(i.webform&&i.webform.detailsToggle){i.webform.detailsToggle.setDetailsToggleLabel(e(this.form))}})}}})(jQuery,Drupal);
/* Source and licensing information for the above line(s) can be found at https://www.blood.ca/modules/contrib/webform/js/webform.element.details.js. */;
/* Source and licensing information for the line(s) below can be found at https://www.blood.ca/core/misc/details-aria.js. */
(function(a,r){r.behaviors.detailsAria={attach:function(){a('body').once('detailsAria').on('click.detailsAria','summary',function(r){var t=a(r.currentTarget),e=a(r.currentTarget.parentNode).attr('open')==='open'?'false':'true';t.attr({'aria-expanded':e,'aria-pressed':e})})}}})(jQuery,Drupal);
/* Source and licensing information for the above line(s) can be found at https://www.blood.ca/core/misc/details-aria.js. */;
/* Source and licensing information for the line(s) below can be found at https://www.blood.ca/core/misc/collapse.js. */
(function(t,a,e){function n(e){this.$node=t(e);this.$node.data('details',this);var n=window.location.hash&&window.location.hash!=='#'?', '+window.location.hash:'';if(this.$node.find('.error'+n).length){this.$node.attr('open',!0)};this.setupSummary();this.setupLegend()};t.extend(n,{instances:[]});t.extend(n.prototype,{setupSummary:function(){this.$summary=t('<span class="summary"></span>');this.$node.on('summaryUpdated',t.proxy(this.onSummaryUpdated,this)).trigger('summaryUpdated')},setupLegend:function(){var n=this.$node.find('> summary');t('<span class="details-summary-prefix visually-hidden"></span>').append(this.$node.attr('open')?e.t('Hide'):e.t('Show')).prependTo(n).after(document.createTextNode(' '));t('<a class="details-title"></a>').attr('href','#'+this.$node.attr('id')).prepend(n.contents()).appendTo(n);n.append(this.$summary).on('click',t.proxy(this.onLegendClick,this))},onLegendClick:function(t){this.toggle();t.preventDefault()},onSummaryUpdated:function(){var e=t.trim(this.$node.drupalGetSummary());this.$summary.html(e?' ('+e+')':'')},toggle:function(){var a=this,t=!!this.$node.attr('open'),n=this.$node.find('> summary span.details-summary-prefix');if(t){n.html(e.t('Show'))}
else{n.html(e.t('Hide'))};setTimeout(function(){a.$node.attr('open',!t)},0)}});e.behaviors.collapse={attach:function(e){if(a.details){return};var i=t(e).find('details').once('collapse').addClass('collapse-processed');if(i.length){for(var s=0;s<i.length;s++){n.instances.push(new n(i[s]))}}}};var s=function(t,e){e.parents('details').not('[open]').find('> summary').trigger('click')};t('body').on('formFragmentLinkClickOrHashChange.details',s);e.CollapsibleDetails=n})(jQuery,Modernizr,Drupal);
/* Source and licensing information for the above line(s) can be found at https://www.blood.ca/core/misc/collapse.js. */;
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