<?php
/**
 * The template for displaying the footer
 */
?>

<!-- Above Footer Level-->
<div class="row py-4 all-shadows" id="contacts">
    <hr>
    <div class="col-md-6 text-center text-md-right h5"><?php dynamic_sidebar( 'above-footer-col1' ); ?></div>
    <div class="col-md-6 text-center text-md-left h5"><?php dynamic_sidebar( 'above-footer-col2' ); ?></div>
</div>

<a class="d-none totopbtn"><i class="fa fa-arrow-circle-o-up" aria-hidden="true"></i></a>
</div><!-- #content -->

    <footer id="colophon" class="site-footer bg-dark pb-3 pt-3" role="contentinfo" itemscope itemtype="https://schema.org/WPFooter">
<!--       <nav class="navbar navbar-expand-lg pb-3 pt-3">-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 text-center text-md-right site-info footer-1 ">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php dynamic_sidebar( 'footer-1' ); ?></a>
                </div><!-- .site-info -->
                <div class="col-md-6 text-center text-md-left footer-2">
                   <?php dynamic_sidebar( 'footer-2' ); ?>
                </div><!-- .site-info -->
            </div> <!-- row -->
        </div> <!-- container -->
<!--        </nav>-->
    </footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>