/* Source and licensing information for the line(s) below can be found at https://www.blood.ca/modules/contrib/webform/js/webform.element.message.js. */
(function(e,t){'use strict';var s=(function(){try{localStorage.setItem('webform','webform');localStorage.removeItem('webform');return!0}catch(e){return!1}}()),r=(function(){try{sessionStorage.setItem('webform','webform');sessionStorage.removeItem('webform');return!0}catch(e){return!1}}());t.behaviors.webformMessageClose={attach:function(t){e(t).find('.js-webform-message--close').once('webform-message--close').each(function(){var t=e(this),r=t.attr('data-message-id'),n=t.attr('data-message-storage'),s=t.attr('data-message-close-effect')||'hide';switch(s){case'slide':s='slideUp';break;case'fade':s='fadeOut';break};if(a(t,n,r)){return};if(t.attr('style')!=='display: none;'){t.show()};t.find('.js-webform-message__link').on('click',function(e){t[s]();o(t,n,r);t.trigger('close');e.preventDefault()})})}};function a(e,t,a){if(!a||!t){return!1};switch(t){case'local':if(s){return localStorage.getItem('Drupal.webform.message.'+a)||!1};return!1;case'session':if(r){return sessionStorage.getItem('Drupal.webform.message.'+a)||!1};return!1;default:return!1}};function o(t,a,o){if(!o||!a){return};switch(a){case'local':if(s){localStorage.setItem('Drupal.webform.message.'+o,!0)};break;case'session':if(r){sessionStorage.setItem('Drupal.webform.message.'+o,!0)};break;case'user':case'state':case'custom':e.get(t.find('.js-webform-message__link').attr('href'));return!0}}})(jQuery,Drupal);
/* Source and licensing information for the above line(s) can be found at https://www.blood.ca/modules/contrib/webform/js/webform.element.message.js. */;
/* Source and licensing information for the line(s) below can be found at https://www.blood.ca/core/misc/details-aria.js. */
(function(a,r){r.behaviors.detailsAria={attach:function(){a('body').once('detailsAria').on('click.detailsAria','summary',function(r){var t=a(r.currentTarget),e=a(r.currentTarget.parentNode).attr('open')==='open'?'false':'true';t.attr({'aria-expanded':e,'aria-pressed':e})})}}})(jQuery,Drupal);
/* Source and licensing information for the above line(s) can be found at https://www.blood.ca/core/misc/details-aria.js. */;
/* Source and licensing information for the line(s) below can be found at https://www.blood.ca/core/misc/collapse.js. */
(function(t,a,e){function n(e){this.$node=t(e);this.$node.data('details',this);var n=window.location.hash&&window.location.hash!=='#'?', '+window.location.hash:'';if(this.$node.find('.error'+n).length){this.$node.attr('open',!0)};this.setupSummary();this.setupLegend()};t.extend(n,{instances:[]});t.extend(n.prototype,{setupSummary:function(){this.$summary=t('<span class="summary"></span>');this.$node.on('summaryUpdated',t.proxy(this.onSummaryUpdated,this)).trigger('summaryUpdated')},setupLegend:function(){var n=this.$node.find('> summary');t('<span class="details-summary-prefix visually-hidden"></span>').append(this.$node.attr('open')?e.t('Hide'):e.t('Show')).prependTo(n).after(document.createTextNode(' '));t('<a class="details-title"></a>').attr('href','#'+this.$node.attr('id')).prepend(n.contents()).appendTo(n);n.append(this.$summary).on('click',t.proxy(this.onLegendClick,this))},onLegendClick:function(t){this.toggle();t.preventDefault()},onSummaryUpdated:function(){var e=t.trim(this.$node.drupalGetSummary());this.$summary.html(e?' ('+e+')':'')},toggle:function(){var a=this,t=!!this.$node.attr('open'),n=this.$node.find('> summary span.details-summary-prefix');if(t){n.html(e.t('Show'))}
else{n.html(e.t('Hide'))};setTimeout(function(){a.$node.attr('open',!t)},0)}});e.behaviors.collapse={attach:function(e){if(a.details){return};var i=t(e).find('details').once('collapse').addClass('collapse-processed');if(i.length){for(var s=0;s<i.length;s++){n.instances.push(new n(i[s]))}}}};var s=function(t,e){e.parents('details').not('[open]').find('> summary').trigger('click')};t('body').on('formFragmentLinkClickOrHashChange.details',s);e.CollapsibleDetails=n})(jQuery,Modernizr,Drupal);
/* Source and licensing information for the above line(s) can be found at https://www.blood.ca/core/misc/collapse.js. */;
/* Source and licensing information for the line(s) below can be found at https://www.blood.ca/modules/contrib/webform/js/webform.element.options.js. */
(function(t,e){'use strict';e.behaviors.webformOptionsButtons={attach:function(e){t(e).find('label.webform-options-display-buttons-label > input[type="checkbox"], label.webform-options-display-buttons-label > input[type="radio"]').each(function(){var e=t(this),o=e.parent();e.detach().insertBefore(o)})}}})(jQuery,Drupal);
/* Source and licensing information for the above line(s) can be found at https://www.blood.ca/modules/contrib/webform/js/webform.element.options.js. */;
