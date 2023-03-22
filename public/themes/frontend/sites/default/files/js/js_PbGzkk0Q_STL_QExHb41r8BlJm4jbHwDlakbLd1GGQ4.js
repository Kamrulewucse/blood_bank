/* Source and licensing information for the line(s) below can be found at https://www.blood.ca/modules/contrib/webform/js/webform.dialog.js. */
(function(o,e,i){'use strict';e.webform=e.webform||{};e.webform.dialog=e.webform.dialog||{};e.webform.dialog.options=e.webform.dialog.options||{};e.webformOpenDialog=function(i,t){var a=o('<div><a href="'+i+'" class="webform-dialog '+t+'"></a></div>');e.behaviors.webformDialog.attach(a);a.find('a').trigger('click')};e.behaviors.webformDialog={attach:function(t){o('a.webform-dialog',t).once('webform-dialog').each(function(){var r=o(this),l=o.extend({},e.webform.dialog.options);if(r.attr('class').match(/webform-dialog-([a-z0-9_]+)/)){var n=RegExp.$1;if(i.webform.dialog.options[n]){l=i.webform.dialog.options[n];delete l.title}};if(o(this).data('dialog-options')){o.extend(l,o(this).data('dialog-options'))};var t=r.attr('href');if(t.indexOf('?source_entity_type=ENTITY_TYPE&source_entity_id=ENTITY_ID')!==-1){if(i.webform.dialog.entity_type&&i.webform.dialog.entity_id){t=t.replace('ENTITY_TYPE',encodeURIComponent(i.webform.dialog.entity_type));t=t.replace('ENTITY_ID',encodeURIComponent(i.webform.dialog.entity_id))}
else{t=t.replace('?source_entity_type=ENTITY_TYPE&source_entity_id=ENTITY_ID','')};r.attr('href',t)};t+=(t.indexOf('?')===-1?'?':'&')+'_webform_dialog=1';var a={};a.progress={type:'fullscreen'};a.url=t;a.event='click';a.dialogType=r.data('dialog-type')||'modal';a.dialog=l;a.element=this;a.error=function(e,o){if(e.status===403){window.location.replace(t.split('?')[0])}};e.ajax(a)})}}})(jQuery,Drupal,drupalSettings);
/* Source and licensing information for the above line(s) can be found at https://www.blood.ca/modules/contrib/webform/js/webform.dialog.js. */;
