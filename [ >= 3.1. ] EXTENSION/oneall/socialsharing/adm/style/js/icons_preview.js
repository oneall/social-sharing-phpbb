function init_preview($, layout_p, selection_p, services_p, insight_disable_p) {
	"use strict";
	$(document)
			.ready(
					function($) {

						var share_preview = {
							layout : layout_p,
							selection : selection_p,  // array.
							services : services_p,    // object.
							insight : insight_disable_p == 1 ? 0:1,  // stores disable value.
						};

						share_preview.trigger_refresh = function() {
							clearTimeout($.data(this, 'timer'));
							var that = this;
							var wait = setTimeout(function() {
								that.refresh();
							}, 500);
							$(this).data('timer', wait);
						};

						share_preview.refresh = function() {
							$("#oa_social_sharing_preview").html(this.src());
							_oneall.push([ 'social_sharing', 'do_init' ]);
						};

						share_preview.src = function() {
							var div = '<div class="oas_box oas_box_'
									+ this.layout + '" '
									+ 'data-title="sharing preview" '
									+ 'data-url="' + window.location + '" '
									+ 'data-opt="si:' + this.insight + '">';
							var providers = [];
							var classes = '';
							var title = '';
							for (var provider in this.services) {
								if (this.services.hasOwnProperty(provider)
										&& this.selection.indexOf(provider) != -1) {
									classes = 'oas_btn oas_btn_' + provider;
									title = 'Send to ' + this.services[provider];
									providers.push('<span class="' + classes
													+ '" title="' + title
													+ '"></span>');
								}
							}
							return div + providers.join('') + '</div>';
						};

						/* Button style */
						$('select#oa_social_sharing_btns')
								.change("layout", function(ev) {
									share_preview.layout = $(this).val();
									share_preview.trigger_refresh();
								});

						var pfx = 'oa_social_sharing_provider_';
						$("input[name^=" + pfx + "][type='checkbox']")
								.change(
										"services",
										function(ev) {
											var provider = $(this).attr("name").substr(pfx.length);
											if (ev.target.checked) {
												share_preview.selection.push(provider);
											} else {
												share_preview.selection = share_preview.selection
													.filter(function(e, i, arr) { return e != this;	}, 
															provider);
											}
											share_preview.trigger_refresh();
										});

						$("input[name='oa_social_sharing_insight_disable'][type='radio']")
								.change("insight", function(ev) {
									share_preview.insight = $(this).val() == 1 ? 0:1;  // stores disable value.
									share_preview.trigger_refresh();
								});

						share_preview.trigger_refresh();
					});
};

