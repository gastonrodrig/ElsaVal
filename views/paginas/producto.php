<?php
include('../includes/config/database.php');
$conexion = conectarDB();

// Obtener el ID del producto de la URL
if(isset($_GET['id'])) {
    $producto_id = $_GET['id'];

    // Consulta para obtener la información del producto
    $query = "SELECT products.name AS product_name, products.price, products.stock, products.status, 
              categories.name AS category_name, materials.name AS material_name, products.material_weight 
              FROM products 
              INNER JOIN categories ON products.category_id = categories.id 
              INNER JOIN materials ON products.material_id = materials.id 
              WHERE products.id = $producto_id";
    
    $resultado = mysqli_query($conexion, $query);

    if($resultado->num_rows === 1) {
        // Obtener los datos del producto
        $producto = mysqli_fetch_assoc($resultado);
    }
}
?>

<!-- Mostrar la información del producto -->
<div class="product-details">
    <?php if($producto): ?>
        <h2><?php echo $producto['product_name']; ?></h2>
        <p><strong>Precio:</strong> $<?php echo $producto['price']; ?></p>
        <p><strong>Stock:</strong> <?php echo $producto['stock']; ?></p>
        <p><strong>Estado:</strong> <?php echo $producto['status']; ?></p>
        <p><strong>Categoría:</strong> <?php echo $producto['category_name']; ?></p>
        <p><strong>Material:</strong> <?php echo $producto['material_name']; ?></p>
        <p><strong>Peso del material:</strong> <?php echo $producto['material_weight']; ?></p>
    <?php endif; ?>
</div>