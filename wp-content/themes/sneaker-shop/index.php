<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Sneaker_shop
 */

get_header();
?>

	<main id="primary" class="site-main">

      <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="product-card">
                    <img src="wordpress-prueba\wp-content\themes\sneaker-shop\icons\95.png" alt="Nike '95">
                    <h4>Nike '95</h4>
                    <p>Hombre</p>
                    <p>$500.000</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="product-card">
                    <img src="icons/adi2000.png" alt="Adidas Adi2000">
                    <h4>Adidas Adi2000</h4>
                    <p>Hombre</p>
                    <p>$500.000</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="product-card">
                    <img src="icons/blazer.png" alt="Nike Blazer">
                    <h4>Nike Blazer</h4>
                    <p>Hombre</p>
                    <p>$500.000</p>
                </div>
            </div>
            <div class="featured-product col-md-3">
                <h3>PRODUCTO DESTACADO</h3>
                <div class="product-card">
                    <img src="icons/tn.png" alt="Nike TN">
                    <h4>Nike TN</h4>
                    <p>Hombre</p>
                    <p>$800.000</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="product-card">
                    <img src="icons/initiator.png" alt="Nike Inititator">
                    <h4>Nike Inititator</h4>
                    <p>Hombre</p>
                    <p>$500.000</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="product-card">
                    <img src="icons/nike97.png" alt="Nike '97">
                    <h4>Nike '97</h4>
                    <p>Hombre</p>
                    <p>$500.000</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="product-card">
                    <img src="icons/forum.png" alt="Adidas Forum">
                    <h4>Adidas Forum</h4>
                    <p>Hombre</p>
                    <p>$500.000</p>
                </div>
            </div>
        </div>

        
    </div>

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :

			endif;

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				
				

			endwhile;

			
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
