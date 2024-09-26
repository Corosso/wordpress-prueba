<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sneaker_shop
 */

/* 
La linea <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" /> es para que carguen los estilos css en una nueva instalacion
del tema, a mi me funciona pero me da miedo que no funcione entonces mejor prevenir que lamentar. Sí no funciona, simplemente cambiar esta linea
<link rel="stylesheet" href="http://localhost/wordpress-prueba/wp-content/themes/sneaker-shop/style.css"/>, precisamente cambiar el directorio 
'worpress-prueba' por el nombre de la carpeta donde se encuentra wordpress*/


?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba tecnica</title>    
    <link rel="stylesheet" href="http://localhost/wordpress-prueba/wp-content/themes/sneaker-shop/style.css"/>    
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php wp_head(); ?> 
  </head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<nav  class="navbar navbar-expand-lg bg-body-tertiary">
        <div id='navbar' class="container-fluid">
            <a class="navbar-brand" href="#">                
                <img src="<?php echo get_template_directory_uri() . '/icons/logo.png'; ?>" id='img' alt="Navbar Image">
              </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul id='texto-navbar' class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#">Productos</a>
              </li>          
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#">Contacto</a>
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="<?php echo home_url('/registro-productos'); ?>">Registrar producto</a>
          </li>
              </li>      
            </ul>            
          </div>
        </div>
      </nav>
