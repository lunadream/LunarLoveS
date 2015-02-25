var stimer;
jQuery(document).ready(function(jQuery) {
	var $commentform = jQuery('#commentform'),
	$comments = jQuery('#comments-title'),
	$cancel = jQuery('#cancel-comment-reply-link'),
	cancel_text = $cancel.text();
	jQuery(document).on("submit", "#commentform",
	function() {
		jQuery.ajax({
			url: ajaxcomment.ajax_url,
			data: jQuery(this).serialize() + "&action=ajax_comment",
			type: jQuery(this).attr('method'),
			beforeSend:function(){addComment.createBeforeButterbar("提交中....");jQuery('#submit').attr('disabled','disabled');jQuery('body').append('<div id="wait_block" style="display: block;position: absolute;top: 0%;left: 0%;width: 100%;height: '+ document.documentElement.offsetHeight +'px;background-color: rgba(0,0,0,0.3);z-index: 1001;cursor:wait"></div>');clearTimeout(stimer);},
			error: function(request) {
				var t = addComment;
				t.createFailButterbar(request.responseText);
                try {
				t.I('comment').focus();
                jQuery('#submit').removeAttr('disabled');
                jQuery('#wait_block').remove();
                }
                catch(e) {}
			},
			success: function(data) {
				jQuery('textarea').each(function() {
					this.value = ''
				});
				var t = addComment,
				cancel = t.I('cancel-comment-reply-link'),
				temp = t.I('wp-temp-form-div'),
				respond = t.I(t.respondId),
				post = t.I('comment_post_ID').value,
				parent = t.I('comment_parent').value;
				if (parent != '0') {
					jQuery('#respond').before('<ul class="children">' + data + '</ul>');
				} else {
					jQuery('.comment-list').append(data);// your comments wrapper
				}
				t.createButterbar("提交成功");
				cancel.style.display = 'none';
				cancel.onclick = null;
				t.I('comment_parent').value = '0';
				if (temp && respond) {
					temp.parentNode.insertBefore(respond, temp);
					temp.parentNode.removeChild(temp)
				}
                try {
                jQuery('#submit').removeAttr('disabled');
                jQuery('#wait_block').remove();
			}
			 catch(e) {}
			}
		});
		return false;
	});
	addComment = {
		moveForm: function(commId, parentId, respondId) {
			var t = this,
			div,
			comm = t.I(commId),
			respond = t.I(respondId),
			cancel = t.I('cancel-comment-reply-link'),
			parent = t.I('comment_parent'),
			post = t.I('comment_post_ID');
			$cancel.text(cancel_text);
			t.respondId = respondId;
			if (!t.I('wp-temp-form-div')) {
				div = document.createElement('div');
				div.id = 'wp-temp-form-div';
				div.style.display = 'none';
				respond.parentNode.insertBefore(div, respond)
			} ! comm ? (temp = t.I('wp-temp-form-div'), t.I('comment_parent').value = '0', temp.parentNode.insertBefore(respond, temp), temp.parentNode.removeChild(temp)) : comm.parentNode.insertBefore(respond, comm.nextSibling);
			jQuery("body").animate({
				scrollTop: jQuery('#respond').offset().top - 180
			},
			400);
			parent.value = parentId;
			cancel.style.display = '';
			cancel.onclick = function() {
				var t = addComment,
				temp = t.I('wp-temp-form-div'),
				respond = t.I(t.respondId);
				t.I('comment_parent').value = '0';
				if (temp && respond) {
					temp.parentNode.insertBefore(respond, temp);
					temp.parentNode.removeChild(temp);
				}
				this.style.display = 'none';
				this.onclick = null;
				return false;
			};
			try {
				t.I('comment').focus();
			}
			 catch(e) {}
			return false;
		},
		I: function(e) {
			return document.getElementById(e);
		},
		clearButterbar: function(e) {
			if (jQuery(".butterBar").length > 0) {
				jQuery(".butterBar").remove();
			}
		},
        createBeforeButterbar: function(message) {
            var t = this;
			t.clearButterbar();
			jQuery("body").append('<div id="butterBar" class="butterBar butterBar-center"><p class="butterBar-message">' + message + '</p></div>');
        },
		createButterbar: function(message) {
			var t = this;
			t.clearButterbar();
			jQuery("body").append('<div id="butterBar" class="butterBar butterBar-center"><p class="butterBar-message">' + message + '</p></div>');
			stimer=setTimeout("jQuery('.butterBar').remove()", 3000);
		},
        createFailButterbar: function(message) {
            var t = this;
			t.clearButterbar();
			jQuery("body").append('<div id="butterBar" class="butterBar butterBar-center"><p class="butterBar-message  butterBar-error">' + message + '</p></div>');
			stimer=setTimeout("jQuery('.butterBar').remove()", 10000);
        }
	};
});
	
