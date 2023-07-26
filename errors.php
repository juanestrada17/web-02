<!--errors.php checks if there are errors inside the array. If so loops over them and displays them in a p
    in the registration.php that includes it-->
<?php  if(count($errors) > 0) : ?>
    <div class="error">
        <?php foreach ($errors as $error) : ?>
            <p><?php echo $error ?></p>
        <?php endforeach ?>
    </div>
<?php endif ?>