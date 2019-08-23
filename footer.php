</div><!-- /.row -->

</div><!-- /.container -->

<footer class="blog-footer">
    <div class='container'>
        <div>
            <h2><?php bloginfo('name')?></h2>
            <p><?php bloginfo('description')?></p>
        </div>
        <div class='align-right'>
            <p><a href="#">Back to top</a></p>
            <a id="my-tag" href='https://www.callum-pullinger.co.uk'>Designed by CP</a>
        </div>
    </div>
</footer>

<script type='text/javascript'>
$("header nav ul li a").click(function(e) {
    e.preventDefault();
    var aid = $(this).attr("href");
    var offset = $(aid).offset().top - 100
    $('html,body').animate({scrollTop: offset},'slow');
});
</script>



    <script type="text/javascript">

      $(document).ready(function () {

        var nav = false;

         function openNav() {
            $('#menu-menu-1').css('display', 'flex');
            nav = true;
         }

        function closeNav() {
           $('#menu-menu-1').css('display', 'none');


           nav = false;
        }

        function toggleNav() {
            nav ? closeNav() : openNav();
        }

        $( "#menu-toggle" ).click(function() {

          $( "#menu-menu-1" ).toggle( "fast", function() {
             toggleNav()
            });
        });

      });

    </script>



<?php wp_footer(); ?>
</body>
</html>