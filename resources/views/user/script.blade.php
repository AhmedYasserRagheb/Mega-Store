<script src="/js/jquery-3.4.1.min.js"></script>
<!-- popper js -->
<script src="/js/popper.min.js"></script>
<!-- bootstrap js -->
<script src="/js/bootstrap.js"></script>
<!-- custom js -->
<script src="/js/custom.js"></script>

<script>
        document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>