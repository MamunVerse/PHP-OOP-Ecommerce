<?php if(!empty($_SESSION['errors'])): ?>
    <div class="alert alert-warning">
        <?php  foreach($_SESSION['errors'] as $error): ?>
            <li>
                <?php echo $error; ?>
            </li>
        <?php endforeach; ?>
    </div>
    <?php unset($_SESSION['errors'])  ?>
<?php endif; ?>

<?php if(!empty($_SESSION['success'])): ?>
    <div class="alert alert-success">
        <p>
            <?php echo $_SESSION['success']; ?>
        </p>
    </div>
    <?php unset($_SESSION['success'])  ?>
<?php endif; ?>