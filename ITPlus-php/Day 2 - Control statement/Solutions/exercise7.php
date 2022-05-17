<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./exercise7.css"/>
</head>
<body>
    <table>
        <tbody>
                <?php for($i = 1; $i <= 8; $i++): ?> <!-- Tiến hành mở và đóng thẻ PHP ngay trên dòng -->
                    <tr>                                <!-- Do thẻ PHP ở trên đã đóng, viết HTML như bình thường -->
                    <?php for ($j = 1; $j <= 8; $j++): ?> <!-- Tương tự với dòng số 12 -->
                        <td></td>
                    <?php endfor; ?>  <!-- Tương tự với dòng số 12 -->
                    </tr>
                <?php endfor; ?><!-- Tương tự với dòng số 12 -->
        </tbody>
    </table>
</body>
</html>