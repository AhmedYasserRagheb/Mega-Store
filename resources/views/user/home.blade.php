<!DOCTYPE html>
<html>

<head>
   <!-- Basic -->
   <meta charset="utf-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <!-- Mobile Metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
   <!-- Site Metas -->
   <meta name="keywords" content="" />
   <meta name="description" content="" />
   <meta name="author" content="" />
   <link rel="shortcut icon" href="home/images/favicon.png" type="">
   <title>Famms - Fashion HTML Template</title>
   <!-- bootstrap core css -->
   <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
   <!-- font awesome style -->
   <link href="home/css/font-awesome.min.css" rel="stylesheet" />
   <!-- Custom styles for this template -->
   <link href="home/css/style.css" rel="stylesheet" />
   <!-- responsive style -->
   <link href="home/css/responsive.css" rel="stylesheet" />
   <style>
      .pagination {
         width: 450px;
         height: auto;
         padding: 5px;
         margin: 6px auto;
      }

      .small {
         width: 180px
      }
   </style>
</head>

<body>
   <div class="hero_area">
      <!-- header section strats -->
      @include('user.header')
      <!-- end header section -->
      <!-- slider section -->
      @include('user.slider')
      <!-- end slider section -->
   </div>
   <!-- why section -->
   @include('user.why')
   <!-- end why section -->

   <!-- arrival section -->
   @include('user.arrival')
   <!-- end arrival section -->

   <!-- product section -->
   @include('user.product')
   <!-- end product section -->

   <!-- subscribe section -->
   @include('user.subscribe')
   <!-- end subscribe section -->

   <!-- client section -->
   @include('user.clients')
   <!-- end client section -->
   <!-- footer start -->
   @include('user.footer')
   <!-- footer end -->
   <div class="cpy_">
      <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

         Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

      </p>
   </div>
   <!-- jQery -->
   <script src="home/js/jquery-3.4.1.min.js"></script>
   <!-- popper js -->
   <script src="home/js/popper.min.js"></script>
   <!-- bootstrap js -->
   <script src="home/js/bootstrap.js"></script>
   <!-- custom js -->
   <script src="home/js/custom.js"></script>
   <script>
      document.addEventListener("DOMContentLoaded", function(event) {
         var scrollpos = localStorage.getItem('scrollpos');
         if (scrollpos) window.scrollTo(0, scrollpos);
      });

      window.onbeforeunload = function(e) {
         localStorage.setItem('scrollpos', window.scrollY);
      };
   </script>
   

</body>

</html>