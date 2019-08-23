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
            <p>Designed by CP</p>
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

<?php wp_footer(); ?>
</body>
</html>