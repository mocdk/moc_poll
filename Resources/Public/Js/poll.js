(function($) {
	$.fn.poll = function() {
		var that = $(this),
			votingInProgess = false;

		function vote(reply, poll, layout) {
			if ((reply !== null) && (votingInProgess === false)) {
				votingInProgess = true;
				var url = '/index.php?type=1375939455&pluginName=plugin&extensionName=mocpoll&tx_mocpoll_plugin[action]=vote&tx_mocpoll_plugin[controller]=Poll' +
					'&tx_mocpoll_plugin[reply]=' + reply +
					'&tx_mocpoll_plugin[poll]=' + poll +
					'&tx_mocpoll_plugin[layout]=' + layout ;
				$('.content', that).load(url + ' .answers', function () {
					$('.answers', this).show();
				});
			}
		}

		return that.each(function () {
			var reply = null,
				layout = that.attr('data-layout'),
				poll = that.attr('data-poll');

			if (parseInt($.cookie('moc_poll_' + poll), 10) === 1) {
				$('.answers', that).show();
				$('.questions', that).remove();
			} else {
				$('.questions', that).show();
				$('.answers', that).remove();
			}

			$('.reply', that).bind('change', function () {
				reply = this.value;
			});

			$('.vote-button', that).click(function () {
				vote(reply, poll, layout);
			});
		});
	};
})(jQuery);