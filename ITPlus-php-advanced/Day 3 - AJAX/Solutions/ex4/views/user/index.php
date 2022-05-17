<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Sử dụng thẻ base tag làm cho tất cả các link sẽ được tính từ <base> tag ra -->
    <base href="<?php echo BASE?>" />
    <link rel="stylesheet" href="public/vendors/bootstrap/css/bootstrap.min.css"/>
</head>
<body>
    <div class="container">
        <div class="mt-3 mb-3">
            <a class="btn btn-primary" data-toggle="modal" data-target="#modalCreate">
                Create
            </a>

            <!-- Modal create -->
            <div class="modal fade" id="modalCreate" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <form name="form-create">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Create new user</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>First name</label>
                                    <input type="text" name="first_name" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label>Last name</label>
                                    <input type="text" name="last_name" class="form-control"/>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Refresh page -->
            <a class="btn btn-primary" name="refresh">
                Refresh
            </a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    if (count($users) > 0):
                        foreach($users as $user): ?>
                            <tr>
                                <td><?php echo $user['id']; ?></td>
                                <td><?php echo $user['first_name']; ?></td>
                                <td><?php echo $user['last_name']; ?></td>
                                <td>
                                    <a href="?controller=user&action=view&id=<?php echo $user['id'] ?>">View</a>
                                </td>
                            </tr>
                        <?php endforeach;
                    endif;
                ?>
            </tbody>
        </table>
    </div>
    <script src="public/vendors/jquery/jquery-2.2.4.min.js"></script>
    <script src="public/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
    $(function() {
        // Ajax logic để load data.
        function loadData() {
            $.ajax({
                //gửi request lên url index.php với controller và action tương ứng
                url: 'index.php?controller=user&action=index',
                method: 'GET',
                //nếu thành công thì xoá nội dung trong <tbody> và append nội dung ajax vào <table>
                success: function(res) {
                    $("tbody").remove();
                    $("table").append(res);
                },
                error: function(err) {
                    console.error(err)
                }
            });  
        }

        // Ajax logic để thêm mới data
        function createData(firstName, lastName) {
            $.ajax({
                url: 'index.php?controller=user&action=store',
                method: 'POST',
                data: {
                    first_name: firstName,
                    last_name: lastName
                },
                success: function(res) {
                    const response = JSON.parse(res)
                    if (response.status == 1) {
                        loadData()
                        //close modal
                        $("#modalCreate").modal('hide')
                    }
                },
                error: function(err) {
                    console.error(err)
                }
            })
        }

        $("a[name='refresh']").click(function() {
            loadData()
        })

        //modal create form
        $("form[name='form-create']").submit(function(e) {
            e.preventDefault()
            const firstName = $("input[name='first_name']")
            const lastName = $("input[name='last_name']")
            createData(firstName.val(), lastName.val())
        });
    })
    </script>
</body>
</html>