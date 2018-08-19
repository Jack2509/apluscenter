<style type="text/css">
	.hisella-messages { position: fixed;bottom: -300px;
		right: -70px; z-index: 999999; }
		.hisella-messages-outer { position: relative; }
		#hisella-minimize {
		    background: #007ccd;
		    font-size: 14px;
		    color: #fff;
		    padding: 3px 20px;
		    position: absolute;
		    top: -42px;
		    left: 0px;
		    cursor: pointer;
		    height: 42px;
		    border-radius: 10px 10px 0 0;
		    line-height: 42px;
		}
		#hisella-minimize i{font-size: 18px;margin: 0 5px;}
		#hisella-minimize i.up{
		    display: inline-block;
		    position: relative;
		    top: 6px;
		}
		@media screen and (max-width:768px){ #hisella-facebook { opacity:0; } .hisella-messages { bottom: -300px; right: -135px; } }
	</style>
	<div id='fb-root'></div>
	<script>
		(function($) { 
			$(document).ready(function(){ 
				$( '#hisella-minimize' ).click( function() { 
					if( $( '#hisella-facebook' ).css( 'opacity' ) == 0 ) { 
						$( '#hisella-facebook' ).css( 'opacity', 1 ); 
						$( '.hisella-messages' ).animate( { right: '0' } ).animate( { bottom: '0' } ); 
					} else { 

						$( '.hisella-messages' ).animate( { bottom: '-300px' } ).animate( { right: '-70' }, 400, function(){ 
							$( '#hisella-facebook' ).css( 'opacity', 0 ) } ); 
					} 
				} ) 
			}); 
		})(jQuery);
		(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
	<div class="hisella-messages"><div class="hisella-messages-outer"><div id="hisella-minimize" ><i class="fa fa-facebook-square" aria-hidden="true"></i> Fanpage Facebook <i class="fa fa-sort-asc up" aria-hidden="true"></i></div><div style="opacity:0" id="hisella-facebook" class='fb-page' data-adapt-container-width='true' data-height='300' data-hide-cover='false' data-href='<?=$row_setting['facebook']?>' data-show-facepile='true' data-show-posts='false' data-small-header='false' data-tabs='messages' data-width='290'></div></div></div>