<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./exercise8.css"/>
</head>
<body>
    <table>
        <?php for($i = 1; $i <= 10; $i++): ?>
            <tr>
                <?php for($j = 1; $j <= 10; $j++):
                    $number = 10 * ($i - 1) + $j;
                    $isPrime = true;
                    for ($k = 2; $k <= sqrt($number); $k++):
                        if ($number % $k === 0):
                            $isPrime = false;
                            break;
                        endif;
                    endfor;

                    if ($isPrime && $number !== 1):
                        echo "<td class='prime'>{$number}</td>";
                    else:
                        echo "<td>{$number}</td>";
                    endif;
                endfor; ?>
            </tr>
        <?php endfor; ?>
    </table>
</body>
</html>