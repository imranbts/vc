<?php
get_header();
?>


 <!-- Normalize CSS -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/4.0.0/normalize.min.css" type="text/css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="http://viftech.linuxdemos.me/wp-content/themes/viftech/assets/packages/404/css/style.css" type="text/css">
    <!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter44122239 = new Ya.Metrika({
                    id:44122239,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/44122239" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter --> 



<section id="animation">
        <!-- This is Animation-->
        <div class="anim-icon" id="404"></div>
        <!-- End Animation-->
    </section>
    <section id="info">
        <h1>Sorry, we couldn't find that page</h1>
        <a href="http://viftech.linuxdemos.me" class="orange_gradient_glowing_btn">Go To Home Page</a>
    </section>

    


    <!-- Building Animation-->
    <script src="http://viftech.linuxdemos.me/wp-content/themes/viftech/assets/packages/404/js/animation404.js" type="text/javascript"></script>
    <!-- End Building Animation-->


<?php
get_footer();