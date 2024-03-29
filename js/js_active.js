jQuery(function()
{
	jQuery('#thumbgrid-container').each(
		function()
		{
			jQuery(this).jScrollPane(
				{
					
				}
			);
			var api = jQuery(this).data('jsp');
			var throttleTimeout;
			jQuery(window).bind(
				'resize',
				function()
				{
					if (jQuery.browser.msie) {
						// IE fires multiple resize events while you are dragging the browser window which
						// causes it to crash if you try to update the scrollpane on every one. So we need
						// to throttle it to fire a maximum of once every 50 milliseconds...
						if (!throttleTimeout) {
							throttleTimeout = setTimeout(
								function()
								{
									api.reinitialise();
									throttleTimeout = null;
								},
								50
							);
						}
					} else {
						api.reinitialise();
					}
				}
			);
		}
	)

});