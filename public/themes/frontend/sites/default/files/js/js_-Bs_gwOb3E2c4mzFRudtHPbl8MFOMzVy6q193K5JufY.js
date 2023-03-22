/* Source and licensing information for the line(s) below can be found at https://www.blood.ca/modules/contrib/webform/js/webform.behaviors.js. */
(function(n,e){'use strict';var r=(/chrom(e|ium)/.test(window.navigator.userAgent.toLowerCase()));if(r){var a=!1;if(window.performance){var i=window.performance.getEntriesByType('navigation');if(i.length>0&&i[0].type==='back_forward'){a=!0}
else if(window.performance.navigation&&window.performance.navigation.type===window.performance.navigation.TYPE_BACK_FORWARD){a=!0}};if(a){var o=e.attachBehaviors;e.attachBehaviors=function(e,a){setTimeout(function(e,a){o(e,a)},300)}}}})(jQuery,Drupal);
/* Source and licensing information for the above line(s) can be found at https://www.blood.ca/modules/contrib/webform/js/webform.behaviors.js. */;
/* Source and licensing information for the line(s) below can be found at https://www.blood.ca/core/misc/states.js. */
(function(e,i){var t={postponed:[]};i.states=t;function s(e,t){return t&&typeof e!=='undefined'?!e:e};function r(e,t){if(e===t){return typeof e==='undefined'?e:!0};return typeof e==='undefined'||typeof t==='undefined'};function a(e,t){if(typeof e==='undefined'){return t};if(typeof t==='undefined'){return e};return e&&t};i.behaviors.states={attach:function(i,n){var s=e(i).find('[data-drupal-states]'),a=s.length,o=function(i){var n=JSON.parse(s[i].getAttribute('data-drupal-states'));Object.keys(n||{}).forEach(function(r){new t.Dependent({element:e(s[i]),state:t.State.sanitize(r),constraints:n[r]})})};for(var r=0;r<a;r++){o(r)}
while(t.postponed.length){t.postponed.shift()()}}};t.Dependent=function(t){var i=this;e.extend(this,{values:{},oldValue:null},t);this.dependees=this.getDependees();Object.keys(this.dependees||{}).forEach(function(e){i.initializeDependee(e,i.dependees[e])})};t.Dependent.comparisons={RegExp:function(e,t){return e.test(t)},Function:function(e,t){return e(t)},Number:function(e,t){return typeof t==='string'?r(e.toString(),t):r(e,t)}};t.Dependent.prototype={initializeDependee:function(i,n){var r=this;this.values[i]={};Object.keys(n).forEach(function(s){var a=n[s];if(e.inArray(a,n)===-1){return};a=t.State.sanitize(a);r.values[i][a.name]=null;e(i).on('state:'+a,{selector:i,state:a},function(e){r.update(e.data.selector,e.data.state,e.value)});new t.Trigger({selector:i,state:a})})},compare:function(e,i,n){var s=this.values[i][n.name];if(e.constructor.name in t.Dependent.comparisons){return t.Dependent.comparisons[e.constructor.name](e,s)};return r(e,s)},update:function(e,t,i){if(i!==this.values[e][t.name]){this.values[e][t.name]=i;this.reevaluate()}},reevaluate:function(){var e=this.verifyConstraints(this.constraints);if(e!==this.oldValue){this.oldValue=e;e=s(e,this.state.invert);this.element.trigger({type:'state:'+this.state,value:e,trigger:!0})}},verifyConstraints:function(t,i){var n=void 0;if(e.isArray(t)){var u=e.inArray('xor',t)===-1,l=t.length;for(var r=0;r<l;r++){if(t[r]!=='xor'){var o=this.checkConstraints(t[r],i,r);if(o&&(u||n)){return u};n=n||o}}}
else if(e.isPlainObject(t)){for(var s in t){if(t.hasOwnProperty(s)){n=a(n,this.checkConstraints(t[s],i,s));if(n===!1){return!1}}}};return n},checkConstraints:function(e,i,n){if(typeof n!=='string'||/[0-9]/.test(n[0])){n=null}
else if(typeof i==='undefined'){i=n;n=null};if(n!==null){n=t.State.sanitize(n);return s(this.compare(e,i,n),n.invert)};return this.verifyConstraints(e,i)},getDependees:function(){var e={};var t=this.compare;this.compare=function(t,i,n){(e[i]||(e[i]=[])).push(n.name)};this.verifyConstraints(this.constraints);this.compare=t;return e}};t.Trigger=function(i){e.extend(this,i);if(this.state in t.Trigger.states){this.element=e(this.selector);if(!this.element.data('trigger:'+this.state)){this.initialize()}}};t.Trigger.prototype={initialize:function(){var i=this,e=t.Trigger.states[this.state];if(typeof e==='function'){e.call(window,this.element)}
else{Object.keys(e||{}).forEach(function(t){i.defaultTrigger(t,e[t])})};this.element.data('trigger:'+this.state,!0)},defaultTrigger:function(i,n){var r=n.call(this.element);this.element.on(i,e.proxy(function(e){var t=n.call(this.element,e);if(r!==t){this.element.trigger({type:'state:'+this.state,value:t,oldValue:r});r=t}},this));t.postponed.push(e.proxy(function(){this.element.trigger({type:'state:'+this.state,value:r,oldValue:null})},this))}};t.Trigger.states={empty:{keyup:function(){return this.val()===''}},checked:{change:function(){var t=!1;this.each(function(){t=e(this).prop('checked');return!t});return t}},value:{keyup:function(){if(this.length>1){return this.filter(':checked').val()||!1};return this.val()},change:function(){if(this.length>1){return this.filter(':checked').val()||!1};return this.val()}},collapsed:{collapsed:function(e){return typeof e!=='undefined'&&'value' in e?e.value:!this.is('[open]')}}};t.State=function(e){this.pristine=e;this.name=e;var i=!0;do{while(this.name.charAt(0)==='!'){this.name=this.name.substring(1);this.invert=!this.invert};if(this.name in t.State.aliases){this.name=t.State.aliases[this.name]}
else{i=!1}}
while(i);};t.State.sanitize=function(e){if(e instanceof t.State){return e};return new t.State(e)};t.State.aliases={enabled:'!disabled',invisible:'!visible',invalid:'!valid',untouched:'!touched',optional:'!required',filled:'!empty',unchecked:'!checked',irrelevant:'!relevant',expanded:'!collapsed',open:'!collapsed',closed:'collapsed',readwrite:'!readonly'};t.State.prototype={invert:!1,toString:function(){return this.name}};var n=e(document);n.on('state:disabled',function(t){if(t.trigger){e(t.target).prop('disabled',t.value).closest('.js-form-item, .js-form-submit, .js-form-wrapper').toggleClass('form-disabled',t.value).find('select, input, textarea').prop('disabled',t.value)}});n.on('state:required',function(t){if(t.trigger){if(t.value){var n='label'+(t.target.id?'[for='+t.target.id+']':''),i=e(t.target).attr({required:'required','aria-required':'true'}).closest('.js-form-item, .js-form-wrapper').find(n);if(!i.hasClass('js-form-required').length){i.addClass('js-form-required form-required')}}
else{e(t.target).removeAttr('required aria-required').closest('.js-form-item, .js-form-wrapper').find('label.js-form-required').removeClass('js-form-required form-required')}}});n.on('state:visible',function(t){if(t.trigger){e(t.target).closest('.js-form-item, .js-form-submit, .js-form-wrapper').toggle(t.value)}});n.on('state:checked',function(t){if(t.trigger){e(t.target).prop('checked',t.value)}});n.on('state:collapsed',function(t){if(t.trigger){if(e(t.target).is('[open]')===t.value){e(t.target).find('> summary').trigger('click')}}})})(jQuery,Drupal);
/* Source and licensing information for the above line(s) can be found at https://www.blood.ca/core/misc/states.js. */;
/* Source and licensing information for the line(s) below can be found at https://www.blood.ca/modules/contrib/webform/js/webform.states.js. */
(function(e,t){'use strict';t.webform=t.webform||{};t.webform.states=t.webform.states||{};t.webform.states.slideDown=t.webform.states.slideDown||{};t.webform.states.slideDown.duration='slow';t.webform.states.slideUp=t.webform.states.slideUp||{};t.webform.states.slideUp.duration='fast';e.fn.hasData=function(e){return(typeof this.data(e)!=='undefined')};e.fn.isWebform=function(){return e(this).closest('form.webform-submission-form, form[id^="webform"], form[data-is-webform]').length?!0:!1};e.fn.isWebformElement=function(){return(e(this).isWebform()||e(this).closest('[data-is-webform-element]').length)?!0:!1};t.states.Trigger.states.empty.change=function(){return this.val()===''};var n=t.states;t.states.Dependent.prototype.compare=function(t,r,a){var o=this.values[r][a.name],i=t.constructor.name;if(!i){i=e.type(t);i=i.charAt(0).toUpperCase()+i.slice(1)};if(i in n.Dependent.comparisons){return n.Dependent.comparisons[i](t,o)};if(t.constructor.name in n.Dependent.comparisons){return n.Dependent.comparisons[t.constructor.name](t,o)};return u(t,o)};function u(e,t){if(e===t){return typeof e==='undefined'?e:!0};return typeof e==='undefined'||typeof t==='undefined'};t.states.Dependent.comparisons.Object=function(e,t){if('pattern' in e){return(new RegExp(e['pattern'])).test(t)}
else if('!pattern' in e){return!((new RegExp(e['!pattern'])).test(t))}
else if('less' in e){return(t!==''&&parseFloat(e['less'])>parseFloat(t))}
else if('less_equal' in e){return(t!==''&&parseFloat(e['less_equal'])>=parseFloat(t))}
else if('greater' in e){return(t!==''&&parseFloat(e['greater'])<parseFloat(t))}
else if('greater_equal' in e){return(t!==''&&parseFloat(e['greater_equal'])<=parseFloat(t))}
else if('between' in e||'!between' in e){if(t===''){return!1};var s=e['between']||e['!between'],r=s.split(':'),i=r[0],o=(typeof r[1]!=='undefined')?r[1]:null,n=(i===null||i===''||parseFloat(t)>=parseFloat(i)),f=(o===null||o===''||parseFloat(t)<=parseFloat(o)),a=(n&&f);return(e['!between'])?!a:a}
else{return e.indexOf(t)!==!1}};var i=e(document);i.on('state:required',function(t){if(t.trigger&&e(t.target).isWebformElement()){var i=e(t.target);r(i.find('input[type="file"]'),t.value);if(i.is('.js-form-type-radios, .js-form-type-webform-radios-other, .js-webform-type-radios, .js-webform-type-webform-radios-other, .js-webform-type-webform-entity-radios, .webform-likert-table')){i.toggleClass('required',t.value);r(i.find('input[type="radio"]'),t.value)};if(i.is('.js-form-type-checkboxes, .js-form-type-webform-checkboxes-other, .js-webform-type-checkboxes, .js-webform-type-webform-checkboxes-other')){i.toggleClass('required',t.value);var n=i.find('input[type="checkbox"]');if(t.value){n.on('click',a);o(i)}
else{n.off('click',a);r(n,!1)}};if(i.is('.js-webform-tableselect')){i.toggleClass('required',t.value);var d=i.is('[multiple]');if(d){var f=i.find('tbody'),n=f.find('input[type="checkbox"]');s(i,n);if(t.value){n.on('click change',a);o(f)}
else{n.off('click change ',a);r(f,!1)}}
else{var u=i.find('input[type="radio"]');s(i,u);r(u,t.value)}};if(i.is('.js-form-type-webform-select-other, .js-webform-type-webform-select-other')){var l=i.find('select');r(l,t.value);s(i,l)};if(i.find('> label:not([for])').length){i.find('> label').toggleClass('js-form-required form-required',t.value)};if(i.is('.js-webform-type-radios, .js-webform-type-checkboxes, fieldset')){i.find('legend span.fieldset-legend:not(.visually-hidden)').toggleClass('js-form-required form-required',t.value)};if(i.is('fieldset')){i.removeAttr('required aria-required')}}});i.on('state:checked',function(t){if(t.trigger){e(t.target).trigger('change')}});i.on('state:readonly',function(t){if(t.trigger&&e(t.target).isWebformElement()){e(t.target).prop('readonly',t.value).closest('.js-form-item, .js-form-wrapper').toggleClass('webform-readonly',t.value).find('input, textarea').prop('readonly',t.value);e(t.target).trigger('webform:readonly').find('select, input, textarea, button').trigger('webform:readonly')}});i.on('state:visible state:visible-slide',function(t){if(t.trigger&&e(t.target).isWebformElement()){if(t.value){e(':input',t.target).addBack().each(function(){c(this);l(this)})}
else{e(':input',t.target).addBack().each(function(){d(this);m(this);l(this)})}}});i.on('state:visible-slide',function(r){if(r.trigger&&e(r.target).isWebformElement()){var i=r.value?'slideDown':'slideUp',o=t.webform.states[i].duration;e(r.target).closest('.js-form-item, .js-form-submit, .js-form-wrapper')[i](o)}});t.states.State.aliases['invisible-slide']='!visible-slide';i.on('state:disabled',function(t){if(t.trigger&&e(t.target).isWebformElement()){e(t.target).prop('disabled',t.value).closest('.js-form-item, .js-form-submit, .js-form-wrapper').toggleClass('form-disabled',t.value).find('select, input, textarea, button').prop('disabled',t.value);var r=e(t.target).find(':input[type="hidden"][name$="[fids]"]');if(r.length){if(e(t.target).is('fieldset')){e(t.target).prop('disabled',!1)};r.removeAttr('disabled')};e(t.target).trigger('webform:disabled').find('select, input, textarea, button').trigger('webform:disabled')}});t.behaviors.webformCheckboxesRequired={attach:function(t){e('.js-form-type-checkboxes.required, .js-form-type-webform-checkboxes-other.required, .js-webform-type-checkboxes.required, .js-webform-type-webform-checkboxes-other.required, .js-webform-type-webform-radios-other.checkboxes',t).once('webform-checkboxes-required').each(function(){var t=e(this);t.find('input[type="checkbox"]').on('click',a);setTimeout(function(){o(t)})})}};t.behaviors.webformRadiosRequired={attach:function(t){e('.js-form-type-radios, .js-form-type-webform-radios-other, .js-webform-type-radios, .js-webform-type-webform-radios-other, .js-webform-type-webform-entity-radios, .js-webform-type-webform-scale',t).once('webform-radios-required').each(function(){var t=e(this);setTimeout(function(){f(t)})})}};t.behaviors.webformTableSelectRequired={attach:function(t){e('.js-webform-tableselect.required',t).once('webform-tableselect-required').each(function(){var t=e(this),r=t.find('tbody'),i=t.is('[multiple]');if(i){r.find('input[type="checkbox"]').on('click change',function(){o(r)})};setTimeout(function(){i?o(r):f(t)})})}};function o(e){var t=e.find('input[type="checkbox"]').first(),i=e.find('input[type="checkbox"]').is(':checked');r(t,!i);s(e,t)};function f(e){var t=e.find('input[type="radio"]'),i=e.hasClass('required');r(t,i);s(e,t)};function a(){var t=e(this).closest('.js-webform-type-checkboxes, .js-webform-type-webform-checkboxes-other');o(t)};function l(t){var r=e(t),o=t.type,s=t.tagName.toLowerCase(),i=['webform.states'];if(o==='checkbox'||o==='radio'){r.trigger('change',i).trigger('blur',i)}
else if(s==='select'){if(r.closest('.webform-type-address').length){if(!r.data('webform-states-address-initialized')&&r.attr('autocomplete')==='country'&&r.val()===r.find('option[selected]').attr('value')){return};r.data('webform-states-address-initialized',!0)};r.trigger('change',i).trigger('blur',i)}
else if(o!=='submit'&&o!=='button'&&o!=='file'){var a=(e.fn.inputmask&&r.hasClass('js-webform-input-mask'));a&&r.inputmask('remove');r.trigger('input',i).trigger('change',i).trigger('keydown',i).trigger('keyup',i).trigger('blur',i);a&&r.inputmask()}};function d(t){var r=e(t),i=t.type,a=t.tagName.toLowerCase();if(r.prop('required')&&!r.hasData('webform-required')){r.data('webform-required',!0)};if(!r.hasData('webform-value')){if(i==='checkbox'||i==='radio'){r.data('webform-value',r.prop('checked'))}
else if(a==='select'){var o=[];r.find('option:selected').each(function(e,t){o[e]=t.value});r.data('webform-value',o)}
else if(i!=='submit'&&i!=='button'){r.data('webform-value',t.value)}}};function c(t){var r=e(t),o=r.data('webform-value');if(typeof o!=='undefined'){var i=t.type,s=t.tagName.toLowerCase();if(i==='checkbox'||i==='radio'){r.prop('checked',o)}
else if(s==='select'){e.each(o,function(e,t){t=t.replace(/'/g,'\\\'');r.find('option[value=\''+t+'\']').prop('selected',!0)})}
else if(i!=='submit'&&i!=='button'){t.value=o};r.removeData('webform-value')};var a=r.data('webform-required');if(typeof a!=='undefined'){if(a){r.prop('required',!0)};r.removeData('webform-required')}};function m(t){var i=e(t);if(i.closest('[data-webform-states-no-clear]').length){return};var r=t.type,o=t.tagName.toLowerCase();if(r==='checkbox'||r==='radio'){i.prop('checked',!1)}
else if(o==='select'){if(i.find('option[value=""]').length){i.val('')}
else{t.selectedIndex=-1}}
else if(r!=='submit'&&r!=='button'){t.value=(r==='color')?'#000000':''};i.prop('required',!1)};function r(e,t){var r=(e.attr('type')==='radio'||e.attr('type')==='checkbox');if(t){if(r){e.attr({'required':'required'})}
else{e.attr({'required':'required','aria-required':'true'})}}
else{if(r){e.removeAttr('required')}
else{e.removeAttr('required aria-required')}}};function s(e,t){if(e.attr('data-msg-required')){t.attr('data-msg-required',e.attr('data-msg-required'))}}})(jQuery,Drupal);
/* Source and licensing information for the above line(s) can be found at https://www.blood.ca/modules/contrib/webform/js/webform.states.js. */;
/* Source and licensing information for the line(s) below can be found at https://www.blood.ca/modules/contrib/webform/js/webform.form.js. */
(function(t,e){'use strict';e.behaviors.webformRemoveFormSingleSubmit={attach:function(){function e(e){var r=t(e.currentTarget);r.removeAttr('data-drupal-form-submit-last')};t('body').once('webform-single-submit').on('submit.singleSubmit','form.webform-remove-single-submit',e)}};e.behaviors.webformDisableAutoSubmit={attach:function(e){t('.js-webform-disable-autosubmit input').not(':button, :submit, :reset, :image, :file').once('webform-disable-autosubmit').on('keyup keypress',function(t){if(t.which===13){t.preventDefault();return!1}})}};e.behaviors.webformRequiredError={attach:function(e){t(e).find(':input[data-webform-required-error], :input[data-webform-pattern-error]').once('webform-required-error').on('invalid',function(){this.setCustomValidity('');if(this.valid){return};if(this.validity.patternMismatch&&t(this).attr('data-webform-pattern-error')){this.setCustomValidity(t(this).attr('data-webform-pattern-error'))}
else if(this.validity.valueMissing&&t(this).attr('data-webform-required-error')){this.setCustomValidity(t(this).attr('data-webform-required-error'))}}).on('input change',function(){var e=t(this).attr('name');t(this.form).find(':input[name="'+e+'"]').each(function(){this.setCustomValidity('')})})}};t(document).on('state:required',function(e){t(e.target).filter('[data-webform-required-error]').each(function(){this.setCustomValidity('')})})})(jQuery,Drupal);
/* Source and licensing information for the above line(s) can be found at https://www.blood.ca/modules/contrib/webform/js/webform.form.js. */;
/* Source and licensing information for the line(s) below can be found at https://www.blood.ca/modules/contrib/webform/js/webform.element.details.toggle.js. */
(function(t,e){'use strict';e.webform=e.webform||{};e.webform.detailsToggle=e.webform.detailsToggle||{};e.webform.detailsToggle.options=e.webform.detailsToggle.options||{};e.behaviors.webformDetailsToggle={attach:function(l){t('.js-webform-details-toggle',l).once('webform-details-toggle').each(function(){var l=t(this),o=l.find('.webform-tabs'),n=(o.length)?'.webform-tab':'.js-webform-details-toggle, .webform-elements',i=l.find('details').filter(function(){var e=t(this).parentsUntil(n);return(e.find('details').length===0)});if(i.length<2){return};var s=t.extend({button:'<button type="button" class="webform-details-toggle-state"></button>'},e.webform.detailsToggle.options);var a=t(s.button).attr('title',e.t('Toggle details widget state.')).on('click',function(o){var a=l.find('details:not(.vertical-tabs__pane)'),i;if(e.webform.detailsToggle.isFormDetailsOpen(l)){a.removeAttr('open');i=0}
else{a.attr('open','open');i=1};e.webform.detailsToggle.setDetailsToggleLabel(l);if(e.webformDetailsSaveGetName){a.each(function(){var l=e.webformDetailsSaveGetName(t(this));if(l){localStorage.setItem(l,i)}})}}).wrap('<div class="webform-details-toggle-state-wrapper"></div>').parent();if(o.length){o.find('.item-list:first-child').eq(0).before(a)}
else{i.eq(0).before(a)};e.webform.detailsToggle.setDetailsToggleLabel(l)})}};e.webform.detailsToggle.isFormDetailsOpen=function(e){return(e.find('details[open]').length===e.find('details').length)};e.webform.detailsToggle.setDetailsToggleLabel=function(t){var l=e.webform.detailsToggle.isFormDetailsOpen(t),a=(l)?e.t('Collapse all'):e.t('Expand all');t.find('.webform-details-toggle-state').html(a);var o=(l)?e.t('All details have been expanded.'):e.t('All details have been collapsed.');e.announce(o)}})(jQuery,Drupal);
/* Source and licensing information for the above line(s) can be found at https://www.blood.ca/modules/contrib/webform/js/webform.element.details.toggle.js. */;
/* Source and licensing information for the line(s) below can be found at https://www.blood.ca/modules/contrib/webform/js/webform.element.checkboxes.js. */
(function(e,c){'use strict';c.behaviors.webformCheckboxesAllorNone={attach:function(c){e('[data-options-all], [data-options-none]',c).once('webform-checkboxes-all-or-none').each(function(){var n=e(this),i=n.data('options-all'),r=n.data('options-none'),h=n.find('input[type="checkbox"]'),o=h.not('[value="'+i+'"]').not('[value="'+r+'"]'),t=n.find(':checkbox[value="'+i+'"]'),c=n.find(':checkbox[value="'+r+'"]');if(t.length){t.on('click',a);if(t.prop('checked')){a()}};if(c.length){c.on('click',f);f()};o.on('click',p);p();function a(){if(t.prop('checked')){if(c.is(':checked')){c.prop('checked',!1).trigger('change',['webform.states'])};o.not(':checked').prop('checked',!0).trigger('change',['webform.states'])}
else{o.filter(':checked').prop('checked',!1).trigger('change',['webform.states'])}};function f(){if(c.prop('checked')){h.not('[value="'+r+'"]').filter(':checked').prop('checked',!1).trigger('change',['webform.states'])}};function p(){var e=(o.filter(':checked').length===o.length);if(t.length&&t.prop('checked')!==e){t.prop('checked',e).trigger('change',['webform.states'])};var n=o.is(':checked');if(c.length&&n){c.prop('checked',!1).trigger('change',['webform.states'])}}})}}})(jQuery,Drupal);
/* Source and licensing information for the above line(s) can be found at https://www.blood.ca/modules/contrib/webform/js/webform.element.checkboxes.js. */;
/* Source and licensing information for the line(s) below can be found at https://www.blood.ca/modules/contrib/webform/js/webform.element.options.js. */
(function(t,e){'use strict';e.behaviors.webformOptionsButtons={attach:function(e){t(e).find('label.webform-options-display-buttons-label > input[type="checkbox"], label.webform-options-display-buttons-label > input[type="radio"]').each(function(){var e=t(this),o=e.parent();e.detach().insertBefore(o)})}}})(jQuery,Drupal);
/* Source and licensing information for the above line(s) can be found at https://www.blood.ca/modules/contrib/webform/js/webform.element.options.js. */;
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