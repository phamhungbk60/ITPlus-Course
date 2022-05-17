<?php require('views/layouts/header.php') ?>
<div class="container">
    <form method="POST" action="<?php echo 'index.php?controller=user&action=store' ?>">
        <div>
            <label>First name</label>
            <input name="first_name" />
        </div>
        <div>
            <label>Last name</label>
            <input name="last_name" />
        </div>
        <button type="submit" name="submit">Create</button>
    </form>
</div>
<?php require('views/layouts/footer.php') ?>