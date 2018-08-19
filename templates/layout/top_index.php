<script type="text/javascript">
	$(document).ready(function(e) {
		$(window).scroll(function(e) {
            var body = $(window);
			var top = body.scrollTop();
			if(top>0)
			{
				$('.top').css({ display:'block'});
			}
			else
			{
				$('.top').css({ display:'none'});
				}
        });
		
        $('.top').click(function(e) {
            $('html,body').animate({
				scrollTop: $('body').offset().top},'slow'
			);
        });
    });

</script>
<div class="top" style="display:none; position:fixed; bottom:60px; cursor:pointer; right:15px; transition:0.5s;    z-index: 99;">
<img src="images/top.png" alt="Back To Top" />
</div>