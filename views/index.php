<?php require_once 'index/header.php'; error_reporting(-1)?>
    <div class="row">
        <div class="col-md-3">
            <h4>Категорії</h4>
            <ul>
                <?php while ($row = $categories->fetch(PDO::FETCH_ASSOC)): ?>
                    <li>
                        <a href="#" class="category-link" data-id="<?php echo $row['id']; ?>">
                            <?php echo $row['name']; ?> (<?php echo $row['product_count']; ?>)
                        </a>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>
        <div class="col-md-9">
            <h4>Товари</h4>
            <select id="sort">
                <option value="price">Спочатку дешевші</option>
                <option value="name">По алфавіту</option>
                <option value="created_at">Спочатку нові</option>
            </select>
            <div id="products">
                <?php require_once 'products.php'; ?>
            </div>
        </div>
    </div>
<?php require_once 'index/modal.php'?>
<?php require_once 'index/footer.php'; ?>