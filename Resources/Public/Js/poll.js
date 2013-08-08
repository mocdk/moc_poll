(function ($) {
	$.fn.poll = function () {
		var me = $(this),
				votingInProgess = false;

		function vote(reply, poll, layout) {
			if ((reply !== null) && (votingInProgess === false)) {
				votingInProgess = true;
				var url = '/index.php?type=1375939455&pluginName=pi1&extensionName=mocpoll&tx_mocpoll_pi1[action]=vote&tx_mocpoll_pi1[controller]=Poll' +
						'&tx_mocpoll_pi1[reply]=' + reply +
						'&tx_mocpoll_pi1[poll]=' + poll +
						'&tx_mocpoll_pi1[layout]=' + layout;
				$('.content', me).load(url + ' .answers', function () {
					$('.answers', this).show();
				});
			}
		}

		return me.each(function () {
			var reply = null,
					layout = me.attr('moc:layout'),
					poll = me.attr('moc:poll');

			if (parseInt($.cookie('moc_poll_' + poll), 10) === 1) {
				$('.answers', me).show();
				$('.questions', me).remove();
			} else {
				$('.questions', me).show();
				$('.answers', me).remove();
			}

			$('.reply', me).bind('change', function () {
				reply = this.value;
			});

			$('.vote-button', me).click(function () {
				vote(reply, poll, layout);
			});
		});
	};
})(jQuery);