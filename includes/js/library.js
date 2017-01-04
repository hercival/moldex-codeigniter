
	function confirmM(heading, question, callback) {
	$('.modal').modal('hide');
		cancelButtonTxt = "Cancel";
		okButtonTxt = "Yes";
		var html = "<div class='modal fade'>";
			html += "<div class='modal-dialog'>";
				html += "<div class='modal-content'>";
					html += "<div class='modal-header'>";
						html += "<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>";
						html += "<h4 class='modal-title'>"+heading+"</h4>";
					html += "</div>";
					html += "<div class='modal-body'>";
						html += "<p>"+question+"</p>";
					html += "</div>";
					html += "<div class='modal-footer'>";
						html += "<a href='javascript:;' class='btn btn-primary' data-dismiss='modal'>Close</a>";
						html += "<a href='#!' id='okButton' class='btn btn-primary'>"+okButtonTxt+"</a>";
					html += "</div>";
				html += "</div>";
			html += "</div>";
		html += "</div>";

		$('body').on('click', '#okButton', function(event) {
	      callback();
	      $('.modal').modal('hide');
	    }); 


		$(html).modal('show');     
	  };
	
	function modalView(id, heading, dialog_msg){
		$('.modal').modal('hide');
		var html = "<div class='modal fade' id='"+id+"'>";
			html += "<div class='modal-dialog'>";
				html += "<div class='modal-content'>";
					html += "<div class='modal-header'>";
						html += "<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>";
						html += "<h4 class='modal-title'>"+heading+"</h4>";
					html += "</div>";
					html += "<div class='modal-body'>";
						html += "<p>"+dialog_msg+"</p>";
					html += "</div>";
					html += "<div class='modal-footer'>";
						html += "<a href='javascript:;'' class='btn-sm btn-primary' data-dismiss='modal'>Close</a>";
					html += "</div>";
				html += "</div>";
			html += "</div>";
		html += "</div>";
		
		$(html).modal('show', {show: true, backdrop: 'static', keyboard: false});
	}

	function wait(dialog_msg) {
		var html = "<div class='modal fade' id='waitmodal' data-backdrop='static'>";
			html += "<div class='modal-dialog'>";
				html += "<div class='modal-content'>";
					html += "<div class='modal-header'>";
						html += "<h4 class='modal-title'>Please wait..</h4>";
					html += "</div>";
					html += "<div class='modal-body'>";
						html += "<p>"+dialog_msg+"</p>";
						html += '<div class="progress progress-striped active"><div style="width: 100%;" class="progress-bar"></div></div>';
					html += "</div>";
				html += "</div>";
			html += "</div>";
		html += "</div>";

	    $(html).modal('show', {keyboard: false});     
  };