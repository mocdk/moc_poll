(function($) {
	$.fn.poll = function() {
		return $(this).each(function() {
			var that = $(this),
				reply = null,
				layout = that.attr('data-layout'),
				poll = that.attr('data-poll');

			if (parseInt($.cookie('moc_poll_' + poll), 10) === 1) {
				$('.answers', that).show();
				$('.questions', that).remove();
			} else {
				$('.questions', that).show();
				$('.answers', that).remove();
			}

			$('.reply', that).bind('change', function() {
				reply = this.value;
			});

			var votingInProgress = false;
			$('.vote-button', that).click(function() {
				if (reply !== null && votingInProgress === false) {
					votingInProgress = true;
					var url = '/index.php?type=1375939455&pluginName=plugin&extensionName=mocpoll&tx_mocpoll_plugin[action]=vote&tx_mocpoll_plugin[controller]=Poll' +
						'&tx_mocpoll_plugin[reply]=' + reply +
						'&tx_mocpoll_plugin[poll]=' + poll +
						'&tx_mocpoll_plugin[layout]=' + layout ;
					$('.content', that).load(url + ' .answers', function() {
						$('.answers', this).show();
					});
				}
			});
		});
	};
})(jQuery);