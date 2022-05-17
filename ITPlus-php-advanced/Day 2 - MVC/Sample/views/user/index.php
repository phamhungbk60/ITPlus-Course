<?php require('views/layouts/header.php') ?>
    <div class="container">
        <a href="<?php echo 'index.php?controller=user&action=create'?>">
            <button>Create</button>
        </a>
        <table class="table table-striped">
            <thead>
                <th>Id</th>
                <th>First name</th>
                <th>Last name</th>
                <th></th>
            </thead>

            <tbody>
                <?php foreach($users as $user): ?>
                    <tr>
                        <td><?php echo $user['id'];?></td>
                        <td><?php echo $user['first_name'];?></td>
                        <td><?php echo $user['last_name'];?></td>
                        <td>
                            <a href="<?php echo 'index.php?controller=user&action=edit&id='.$user['id']?>">Edit</a>
                            <a href="<?php echo 'index.php?controller=user&action=delete&id='.$user['id']?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php require('views/layouts/footer.php') ?>
