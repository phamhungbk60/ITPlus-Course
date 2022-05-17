<tbody>
    <?php
    if (count($users) > 0) :
        foreach ($users as $user) : ?>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['first_name']; ?></td>
                <td><?php echo $user['last_name']; ?></td>
                <td>
                    <a href="?controller=user&action=view&id=<?php echo $user['id'] ?>">View</a>
                    <a href="javascript:void(0)" data-id="<?php echo $user['id'] ?>" name="delete" href="?controller=user&action=delete&id=<?php echo $user['id'] ?>">Delete</a>
                </td>
            </tr>
    <?php
        endforeach;
    endif;
    ?>
</tbody>