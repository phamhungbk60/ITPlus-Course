<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Materials/bootstrap.min.css"/>
</head>
<body>
    <div class="container">
        <form action="#" method="POST">
            <div class="form-group">
                <label>Nhập từ để tìm kiếm</label>
                <input type="text" class="form-control" placeholder="Enter word for searching">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Search</button>
        </form>
    
        <!-- Result goes here -->
        <div id="result">
            <div id="phonetics">
                <h2>Phonetics</h2>
                <div id="phonetics-content">
                
                </div>
            </div>
        </div>
    </div>
</body>
<script src="../Materials/jquery-2.2.4.min.js"></script>
<script>
    $("form").submit(function(e) {
        e.preventDefault();
        const word = $("input").val();
        const languageCode = 'en'
        $.ajax({
            url: `https://api.dictionaryapi.dev/api/v2/entries/${languageCode}/${word}`,
            method: 'GET',
            success: function(res) {
                let phonetics = []
                for(let i = 0; i < res[0].phonetics.length; i++) {
                    phonetics.push(`<li>${res[0].phonetics[i].text}</li>`)
                }

                $("#phonetics-content").html(`<ul>${phonetics.join('')}</ul>`)
            },
            error: function(err) {
                if (err.status == 404) {
                    $("#result").text(err.responseJSON.title)
                }
            }
        })
    })
</script>
</html>