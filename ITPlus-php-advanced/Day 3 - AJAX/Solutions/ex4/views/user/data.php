<tbody>
    <?php 
        if (count($users) > 0):
            foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['first_name']; ?></td>
                    <td><?php echo $user['last_name']; ?></td>
                    <td>
                        <a href="?controller=user&action=view&id=<?php echo $user['id'] ?>">View</a>
                    </td>
                </tr>
            <?php 
            endforeach;
        endif;
    ?>
</tbody>