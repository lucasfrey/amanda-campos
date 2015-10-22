<% if isDev %>
	<script src="{$ThemeDir}/js/bundle-head.js"></script>
<% else %>
	<script>
		$addInlineScript('/js/bundle-head.js').RAW
	</script>
<% end_if %>
<% if isDev %><%-- Site stylesheet, compiled from lesscss --%>
<link rel="stylesheet" href="{$ThemeDir}/css/style.css"><% else %>
<link rel="stylesheet" href="$HashPath('css/style.css')"><% end_if %>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script type="text/javascript">
//    console.log($('.header'));


$( document ).ready(function() {
    console.log($(window).height());
    $('.header').css('height', $(window).height());

    $( window ).resize(function() {
        $('.header').css('height', $(window).height());
//        $( "#log" ).append( "<div>Handler for .resize() called.</div>" );
    });
});
</script>