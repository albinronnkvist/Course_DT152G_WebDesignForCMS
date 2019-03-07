</div><!-- End of #container -->

<!-- Footer -->
<footer>
    <!-- Copyright text -->
    <p>
        <!-- Copyright logo -->
        <i class="fas fa-copyright"></i>
        <!-- Print current year -->
        <script>
        var d = new Date()
        document.write(d.getFullYear())
        </script>
        <!-- Sitename -->
        <?php echo get_bloginfo( 'name' ); ?>
    </p> 
</footer><!-- End of footer -->
    <?php wp_footer(); ?>
</body>
</html>