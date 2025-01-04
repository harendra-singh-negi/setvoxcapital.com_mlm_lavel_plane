<!DOCTYPE html>
<html lang="en">

@include('frontend::include.__head')

<body class="rock-page-bg">
<x:notify-messages/>

<!--Header Area-->
@include('frontend::include.__header')
<!--/Header Area End--> 

@yield('content')

<!--Footer Area-->
@include('frontend::include.__footer')
<!--Footer Area End-->

@include('frontend::cookie.gdpr_cookie')

@include('frontend::include.__script')


</body>
</html>

