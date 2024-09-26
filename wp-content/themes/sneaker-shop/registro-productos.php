<?php

/*
Template Name: Registro de productos
*/
get_header();
?>

<?php
// Inicializar la variable de mensaje de error
$error_message = '';
$success_message = '';

//logica para subir el CPT
if (isset($_POST['submit'])) {
  // Validar los campos del formulario
  if (empty($_POST['producto_nombre']) || empty($_POST['producto_descripcion']) || empty($_POST['producto_precio']) || empty($_FILES['image']['name'])) {
    // Guardar el mensaje de error
    $error_message = 'Error: Todos los campos son requeridos.';
  } else {
    // Procesar los datos del formulario si todo está correcto
    $producto_nombre = sanitize_text_field($_POST['producto_nombre']);
    $producto_descripcion = sanitize_textarea_field($_POST['producto_descripcion']);
    $producto_precio = sanitize_text_field($_POST['producto_precio']);

    // Crear el post tipo producto
    $post = array(
      'post_title' => $producto_nombre,
      'post_content' => $producto_descripcion,
      'post_status' => 'publish',
      'post_type' => 'producto'
    );
    $post_id = wp_insert_post($post);

    // Manejo de la imagen
    if (!empty($_FILES['image']['name'])) {
      $image = $_FILES['image'];
      $upload_overrides = array('test_form' => false);
      $movefile = wp_upload_bits($image['name'], null, file_get_contents($image['tmp_name']));
      if ($movefile) {
        $wp_upload_dir = wp_upload_dir();
        $attachment = array(
          'guid' => $wp_upload_dir['url'] . '/' . $movefile['file'],
          'post_mime_type' => $movefile['type'],
          'post_title' => preg_replace('/\.[^.]+$/', '', $movefile['file']),
          'post_content' => '',
          'post_status' => 'inherit',
        );
        $attach_id = wp_insert_attachment($attachment, $movefile['file'], $post_id);
        require_once(ABSPATH . 'wp-admin/includes/image.php');
        $attach_data = wp_generate_attachment_metadata($attach_id, $movefile['file']);
        wp_update_attachment_metadata($attach_id, $attach_data);
      }
    }
    // Guardar la imagen como un meta campo para llamar en el template Productos
    update_post_meta($post_id, 'imagen', $attach_id);
    // Guardar el precio como un meta campo
    update_post_meta($post_id, 'precio', $producto_precio);

    // Mensaje de éxito
    $success_message = 'Producto registrado correctamente.';
  }
}
?>

<div class="registro-productos">
  <?php
  // Mostrar mensaje de error si lo hay
  if (!empty($error_message)) {
    echo '<h4 style="color: red;">' . $error_message . '</h4>';
  }

  // Mostrar mensaje de éxito si se registró correctamente
  if (!empty($success_message)) {
    echo '<h4 style="color: green;">' . $success_message . '</h4>';
  }
  ?>

  <form action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" method="post" enctype="multipart/form-data">
    <label for="producto_nombre">Nombre del producto:</label>
    <input type="text" id="producto_nombre" name="producto_nombre" value="<?php echo isset($_POST['producto_nombre']) ? esc_attr($_POST['producto_nombre']) : ''; ?>"><br><br>

    <label for="producto_descripcion">Descripción del producto:</label>
    <textarea id="producto_descripcion" name="producto_descripcion"><?php echo isset($_POST['producto_descripcion']) ? esc_textarea($_POST['producto_descripcion']) : ''; ?></textarea><br><br>

    <label for="producto_precio">Precio del producto:</label>
    <input type="number" id="producto_precio" name="producto_precio" value="<?php echo isset($_POST['producto_precio']) ? esc_attr($_POST['producto_precio']) : ''; ?>"><br><br>

    <input type="file" name="image"><br><br>

    <input type="submit" name="submit" value="Registrar producto">
  </form>
</div>

<?php
get_footer();
?>
