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
                    <img src="<?php echo get_template_directory_uri() . '/icons/95.png'; ?>" id='img' alt="Nike '95">
                    <h4>Nike '95</h4>
                    <p>Hombre</p>
                    <p>$500.000</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="product-card">
                    <img src="<?php echo get_template_directory_uri() . '/icons/adi2000.png'; ?>" id='img' alt="Adidas Adi2000">
                    
                    <h4>Adidas Adi2000</h4>
                    <p>Hombre</p>
                    <p>$500.000</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="product-card">
                    
                    <img src="<?php echo get_template_directory_uri() . '/icons/blazer.png'; ?>" id='img' alt="Nike Blazer">
                    <h4>Nike Blazer</h4>
                    <p>Hombre</p>
                    <p>$500.000</p>
                </div>
            </div>
            <div class="featured-product col-md-3">
                <h3>PRODUCTO DESTACADO</h3>
                <div class="product-card">
                    <img src="<?php echo get_template_directory_uri() . '/icons/tn.png'; ?>" id='img' alt="Nike TN">
                    <h4>Nike TN</h4>
                    <p>Hombre</p>
                    <p>$800.000</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="product-card">
                    
                    <img src="<?php echo get_template_directory_uri() . '/icons/initiator.png'; ?>" id='img' alt="Nike Inititator">
                    <h4>Nike Inititator</h4>
                    <p>Hombre</p>
                    <p>$500.000</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="product-card">
                    
                    <img src="<?php echo get_template_directory_uri() . '/icons/nike97.png'; ?>" id='img' alt="Nike '97">
                    <h4>Nike '97</h4>
                    <p>Hombre</p>
                    <p>$500.000</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="product-card">
                    <img src="<?php echo get_template_directory_uri() . '/icons/forum.png'; ?>" id='img' alt="Adidas Forum">
                    
                    <h4>Adidas Forum</h4>
                    <p>Hombre</p>
                    <p>$500.000</p>
                </div>
            </div>
        </div>

        
    </div>

		

	</main><!-- #main -->

<?php

get_footer();
