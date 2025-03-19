<?php while ($row = $products->fetch(PDO::FETCH_ASSOC)): ?>
    <br>
    <div class="product-<?php echo $row['id']?>">
        <h5><?php echo $row['name']; ?></h5>
        <p>Ціна: <?php echo $row['price']; ?> $</p>
        <p>Дата додавання: <?php echo $row['created_at']; ?></p>
        <button class="btn btn-primary buy-button" id="buy-button" data-id="<?php echo $row['id']; ?>">Купити</button>
    </div>
    <hr>
<?php endwhile; ?>