<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Customer-Technician</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<!-- this is the include of header css  -->
@include('frontend.body.headercss')
</head>
<body id="top">

<!-- =============================header top =========================== -->
@include('frontend.body.header')
<!-- ===================================end of header top=========================== -->

<!-- ================================ navbar =======================================-->
@include('frontend.body.navbar')
<!-- ===================================end of navbar =================================== -->



<div class="bg-light" >
 
  @yield('frontend_content')
 
  
</div>


<!-- =============================================foooter code =============================================== -->
@include('frontend.body.footer')
<!-- ==============================================end of the foooter code =========================================== -->



</body>
</html>