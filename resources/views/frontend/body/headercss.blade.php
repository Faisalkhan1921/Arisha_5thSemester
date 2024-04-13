<link rel="stylesheet" href="{{asset('assets/layout/styles/layout.css')}}" type="text/css" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <title>Owl Carousel Example</title>

<script type="text/javascript" src="{{asset('assets/layout/scripts/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/layout/scripts/jquery.ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/layout/scripts/jquery.defaultvalue.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/layout/scripts/jquery.scrollTo-min.js')}}"></script>
<script type="text/javascript">
$(document).ready(function () {
    $("#fullname, #validemail, #message").defaultvalue("Full Name", "Email Address", "Message");
    $('#shout a').click(function () {
        var to = $(this).attr('href');
        $.scrollTo(to, 1200);
        return false;
    });
    $('a.topOfPage').click(function () {
        $.scrollTo(0, 1200);
        return false;
    });
    $("#tabcontainer").tabs({
        event: "click"
    });
});
</script>
<!-- Homepage Only Scripts -->
<script type="text/javascript" src="{{asset('assets/layout/scripts/jquery.cycle.min.js')}}"></script>
<script type="text/javascript">
$(function() {
    $('#hpage_slider').after('<div id="fsn"><ul id="fs_pagination">').cycle({
        timeout: 5000,
        fx: 'fade',
        pager: '#fs_pagination',
        pause: 1,
        pauseOnPagerHover: 0
    });
});
</script>
<script type="text/javascript" src="{{asset('assets/layout/scripts/piecemaker/swfobject/swfobject.js')}}"></script>
<script type="text/javascript">
var flashvars = {};
flashvars.cssSource = "{{asset('assets/layout/scripts/piecemaker/piecemaker.css')}}";
flashvars.xmlSource = "{{asset('assets/layout/scripts/piecemaker/piecemaker.xml')}}";
var params = {};
params.play = "false";
params.menu = "false";
params.scale = "showall";
params.wmode = "transparent";
params.allowfullscreen = "true";
params.allowscriptaccess = "sameDomain";
params.allownetworking = "all";
swfobject.embedSWF('{{asset("assets/layout/scripts/piecemaker/piecemaker.swf")}}', 'piecemaker', '960', '430', '10', null, flashvars, params, null);
</script>
<!-- End Homepage Only Scripts -->

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
