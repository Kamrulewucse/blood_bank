/* Source and licensing information for the line(s) below can be found at https://www.blood.ca/modules/contrib/webform/js/webform.element.inputmask.js. */
(function(i,a){'use strict';if(window.Inputmask){window.Inputmask.extendAliases({currency:{prefix:'$ ',groupSeparator:',',alias:'numeric',placeholder:'0',autoGroup:!0,digits:2,digitsOptional:!1,clearMaskOnLostFocus:!1},currency_negative:{prefix:'$ ',groupSeparator:',',alias:'numeric',placeholder:'0',autoGroup:!0,digits:2,digitsOptional:!1,clearMaskOnLostFocus:!1},currency_positive_negative:{prefix:'$ ',groupSeparator:',',alias:'numeric',placeholder:'0',autoGroup:!0,digits:2,digitsOptional:!1,clearMaskOnLostFocus:!1}})};a.behaviors.webformInputMask={attach:function(a){if(!i.fn.inputmask){return};i(a).find('input.js-webform-input-mask').once('webform-input-mask').inputmask()}}})(jQuery,Drupal);
/* Source and licensing information for the above line(s) can be found at https://www.blood.ca/modules/contrib/webform/js/webform.element.inputmask.js. */;
/* Source and licensing information for the line(s) below can be found at https://www.blood.ca/modules/contrib/webform/js/webform.element.select.js. */
(function(t,e){'use strict';e.behaviors.webformSelectOptionsDisabled={attach:function(e){t('select[data-webform-select-options-disabled]',e).once('webform-select-options-disabled').each(function(){var e=t(this),i=e.attr('data-webform-select-options-disabled').split(/\s*,\s*/);e.find('option').filter(function(){return(t.inArray(this.value,i)!==-1)}).attr('disabled','disabled')})}}})(jQuery,Drupal);
/* Source and licensing information for the above line(s) can be found at https://www.blood.ca/modules/contrib/webform/js/webform.element.select.js. */;
/* Source and licensing information for the line(s) below can be found at https://www.blood.ca/modules/contrib/webform/js/webform.element.checkboxes.js. */
(function(e,c){'use strict';c.behaviors.webformCheckboxesAllorNone={attach:function(c){e('[data-options-all], [data-options-none]',c).once('webform-checkboxes-all-or-none').each(function(){var n=e(this),i=n.data('options-all'),r=n.data('options-none'),h=n.find('input[type="checkbox"]'),o=h.not('[value="'+i+'"]').not('[value="'+r+'"]'),t=n.find(':checkbox[value="'+i+'"]'),c=n.find(':checkbox[value="'+r+'"]');if(t.length){t.on('click',a);if(t.prop('checked')){a()}};if(c.length){c.on('click',f);f()};o.on('click',p);p();function a(){if(t.prop('checked')){if(c.is(':checked')){c.prop('checked',!1).trigger('change',['webform.states'])};o.not(':checked').prop('checked',!0).trigger('change',['webform.states'])}
else{o.filter(':checked').prop('checked',!1).trigger('change',['webform.states'])}};function f(){if(c.prop('checked')){h.not('[value="'+r+'"]').filter(':checked').prop('checked',!1).trigger('change',['webform.states'])}};function p(){var e=(o.filter(':checked').length===o.length);if(t.length&&t.prop('checked')!==e){t.prop('checked',e).trigger('change',['webform.states'])};var n=o.is(':checked');if(c.length&&n){c.prop('checked',!1).trigger('change',['webform.states'])}}})}}})(jQuery,Drupal);
/* Source and licensing information for the above line(s) can be found at https://www.blood.ca/modules/contrib/webform/js/webform.element.checkboxes.js. */;
