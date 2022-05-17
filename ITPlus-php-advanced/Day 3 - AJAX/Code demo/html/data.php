<?php 
    $data = [
        [
            'id' => 1,
            'f_name' => 'camnh',
            'l_name' => 'lname',
        ],
        [
            'id' => 2,
            'f_name' => 'camnh2',
            'l_name' => 'lname2',
        ],
        [
            'id' => 3,
            'f_name' => 'camnh3',
            'l_name' => 'lname3',
        ]
    ];
?>

<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Fname</th>
            <th>Lname</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach($data as $value): ?>
            <tr>
                <td><?php echo $value['id']?></td>
                <td><?php echo $value['f_name']?></td>
                <td><?php echo $value['l_name']?></td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>