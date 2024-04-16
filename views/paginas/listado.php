<div class="grid grid-cols-2 md:grid-cols-4 gap-6">
    <?php foreach ($productos as $producto): ?>
    <div class="p-6 flex flex-col">
        <a href="producto?id=<?php echo $producto['id']; ?>">
            <!-- Utiliza la información del producto para construir la ruta de la imagen -->
            <img class="hover:grow hover:shadow-lg" src="<?php echo $producto['image']; ?>" alt="<?php echo $producto['name']; ?>">
            <div class="pt-3 flex items-center justify-between">
                <!-- Utiliza la información del producto para mostrar el nombre y el precio -->
                <p class=""><?php echo $producto['name']; ?></p>
                <p class="pt-1 text-gray-900">$<?php echo $producto['price']; ?></p>
            </div>
        </a>
    </div>
    <?php endforeach; ?>
</div>