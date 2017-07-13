(function(context) {
	if (context.board) {
		return;
	}

	context.board = {
		/**
		 * 게시판 리스트 가져오기
		 */
		get_board_list: function() {

			$.post("/ajax/Ajax_board/get_board_list_ajax", {

				},
				function(data) {
					if (data) {
						$(".admin_rank_list tbody tr").detach();
						board_draw.set_board_list(data);
					}
				}, 'json'
			);
		},
		/**
		 * 게시판 view 가져오기
		 */
		get_board_view: function() {

		},

	};
})(window);
