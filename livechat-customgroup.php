<?php
function devvn_live_chat_custom(){
	ob_start();
	?>
	<div id="livechat-status">
		<h3 class="livechat_title"><a href="#" class="chat_with_us">Live chat</a></h3>
	</div>
	<div id="livechat-segmenation" class="full">
		<h3 class="livechat_title"><a href="#" class="my-icon-close">Live chat</a></h3>
		<div class="second_window_content">
			<div class="message">
				<div class="time"><strong>Sent:</strong> <span class="currenttime">11:25 am</span></div>
				<div class="response">				
					<?php echo get_field('live_chat_message','option');?>
				</div>
				<div class="avatar">
				<?php
					$live_chat_avatar = get_field('live_chat_avatar','option');
					echo wp_get_attachment_image($live_chat_avatar,'full');
				?>
				</div>
			</div>
			<div class="selection">
				<span>I'm looking for…</span>
				<a class="cta-button support marginr" href="" data-group="3">Support</a>
				<a class="cta-button sales marginr" href="" data-group="2">Sales</a>
			</div>
			<img id="loading-indicator" src="<?php echo get_stylesheet_directory_uri();?>/inc/livechat-custom/ajax-loader.gif"/>
		</div>		
	</div>
	<style>
	#livechat-status, #livechat-segmenation {
	    position: fixed;
	    bottom: 0px;
	    color: white;
	    right: 41px;
	    visibility: visible;
	    z-index: 990;
	    border: 0px;
	    backface-visibility: visible;
	    opacity: 1;
	    width: 350px;
	}
	#livechat-segmenation{
		display: none;		
	    background: #c8e5e9;
	}
	h3.livechat_title{
		margin: 0;
		padding: 0;
		position: relative;
	}
	h3.livechat_title a{
	    margin: 0;
	    font-family: 'Gotham Light';
	    text-transform: uppercase;
	    font-size: 15px;
	    font-weight: 600;
	    padding: 0 60px 0 46px !important;
	    position: relative;
	    background: #3b8ba4 url(<?php echo get_stylesheet_directory_uri();?>/inc/livechat-custom/chat_icon2.png)no-repeat left 10px center;
	    display: block;
    	color: #fff;
    	height: 36px;
    	line-height: 36px;
	}
	h3.livechat_title:after {
	    content: "";
	    width: 36px;
	    height: 100%;
	    position: absolute;
	    top: 0;
	    right: 0;
	    background: url(<?php echo get_stylesheet_directory_uri();?>/inc/livechat-custom/chat_icon1.png)no-repeat center center;
	    pointer-events: none;
	}
	.second_window_content {
	    padding: 20px 20px 30px;
	    color: #000102;
    	font-weight: 400;
    	text-align: center;
	}
	.second_window_content .selection span{
	    display: block;
	    padding: 10px 0 15px;
	}
	.second_window_content .selection a {
	    display: inline-block;
	    height: 38px;
	    line-height: 38px;
	    background: #3c8ca5;
	    color: #fff;
	    text-transform: uppercase;
	    padding: 0;
	    margin: 0;
	    width: 130px;
	    font-size: 14px;
	}
	.second_window_content .selection a:hover {
		background: #79bdc8;
	}
	.second_window_content .selection a.cta-button.support {
	    margin: 0 6px 0 0;
	}
	.second_window_content .selection a.cta-button.sales {
	    margin: 0 0 0 6px;
	}
	.second_window_content .selection {
	    padding-top: 10px;
	}
	img#loading-indicator {
	    display: none;
	    padding: 20px 0;
	}
	#livechat-segmenation h3.livechat_title:after {
		background: url(<?php echo get_stylesheet_directory_uri();?>/inc/livechat-custom/less-lc.jpg) no-repeat center center;
	}
	.second_window_content .message {
	    padding: 0 0 0 20px;
	    text-align: left;
	    font-size: 14px;
	    position: relative;
	}
	.second_window_content .time {
	    text-transform: uppercase;
	    color: #555;
	}
	.second_window_content .response {
	    background: #fff;
	    padding: 10px;
	    border-radius: 5px;
	    position: relative;
	    margin: 5px 0;
	}
	.second_window_content .response:before {
		right: 100%;
		top: 50%;
		border: solid transparent;
		content: " ";
		height: 0;
		width: 0;
		position: absolute;
		pointer-events: none;
		border-color: rgba(255, 255, 255, 0);
		border-right-color: #fff;
		border-width: 10px;
		margin-top: -20px;
	}
	div#livechat-status {
	    width: 228px;
	}
	.avatar {
	    position: absolute;
	    top: 16px;
	    left: -50px;
	    width: 60px;
	    height: 60px;
	    border-radius: 50%;
	    -moz-border-radius: 50%;
	    -webkit-border-radius: 50%;
	    overflow: hidden;
	    border: 3px solid #fff;
	}
	.avatar img {
	    width: 100%;
	    height: auto;
	}
	</style>
	<script type="text/javascript">
		window.__lc = window.__lc || {};
		window.__lc.license = 8444971;
		window.__lc.chat_between_groups = false;
		
		(function($){
			$(document).ready(function(){
				function formatAMPM(date) {
					  var hours = date.getHours();
					  var minutes = date.getMinutes();
					  var ampm = hours >= 12 ? 'pm' : 'am';
					  hours = hours % 12;
					  hours = hours ? hours : 12; // the hour '0' should be '12'
					  minutes = minutes < 10 ? '0'+minutes : minutes;
					  var strTime = hours + ':' + minutes + ' ' + ampm;
					  return strTime;
				}
				/*$(".a-group").bind("click", function(){
					window.__lc.group = $(this).data("group");
					$('#loading-indicator').show();
					$('.groups').hide();
					(function() {
						var lc = document.createElement('script');
						lc.type = 'text/javascript';
						lc.async = true;
						lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
						var s = document.getElementsByTagName('script')[0];
						s.parentNode.insertBefore(lc, s);
					})();
				});*/
				$(".chat_with_us").bind("click", function(){
					if(typeof LC_API.chat_window_minimized === 'undefined'){
						var dt = new Date();
						$('.second_window_content .currenttime').html(formatAMPM(dt));
						$('#livechat-segmenation').show();
						return false;
					}else{
						LC_API.open_chat_window();
						return false;
					}
				});
				$(".cta-button").bind("click", function(){
					window.__lc.group = $(this).data("group");
					$('.second_window_content .selection').hide();
					$('#loading-indicator').show();
					(function() {
						var lc = document.createElement('script');
						lc.type = 'text/javascript';
						lc.async = true;
						lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
						var s = document.getElementsByTagName('script')[0];
						s.parentNode.insertBefore(lc, s);
					})();
					return false;
				});
				$(".my-icon-close").bind("click", function(){
					$('#livechat-segmenation').hide();
					return false;
				});
			});
		})(jQuery);

		var LC_API = LC_API || {};
		LC_API.on_before_load = function()
		{
			jQuery('#livechat-segmenation,#livechat-status').hide();
			LC_API.open_chat_window();
		};
		LC_API.on_after_load = function()
		{
			LC_API.open_chat_window();
		};
		LC_API.on_chat_window_minimized = function()
		{
			jQuery('div#livechat-compact-container').show();
		};
	</script>
	<?php
	echo ob_get_clean();
}
add_action('wp_footer', 'devvn_live_chat_custom');