<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./public/vendors/bootstrap/css/bootstrap.min.css" />
</head>

<body>
    <div class="container">
        <div class="mt-3 mb-3">
            <a class="btn btn-primary">
                Create
            </a>
            <a class="btn btn-primary" name="refresh">
                Refresh
            </a>
        </div>

        <!-- Modal to display data in view -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p id="first_name">First name: <span></span></p>
                        <p id="last_name">Last name: <span></span></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- End modal -->

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
                if (count($users) > 0) :
                    foreach ($users as $user) : ?>
                        <tr>
                            <td><?php echo $user['id']; ?></td>
                            <td><?php echo $user['first_name']; ?></td>
                            <td><?php echo $user['last_name']; ?></td>
                            <td>
                                <a href="javascript:void(0)" data-id="<?php echo $user['id'] ?>" name="view">View</a>
                                <a href="javascript:void(0)" data-id="<?php echo $user['id'] ?>" name="delete" href="?controller=user&action=delete&id=<?php echo $user['id'] ?>">Delete</a>
                            </td>
                        </tr>
                <?php endforeach;
                endif;
                ?>
            </tbody>
        </table>
    </div>
    <script src="./public/vendors/jquery/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        $(function() {
            function refreshPage() {
                return $.ajax({
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



            function deleteUser(id, successCallback) {
                return $.ajax({
                    //gửi request lên url index.php với controller và action tương ứng
                    url: 'index.php?controller=user&action=delete&id=' + id,
                    method: 'GET',
                    //nếu thành công thì xoá nội dung trong <tbody> và append nội dung ajax vào <table>
                    success: function(res) {
                        successCallback()
                    },
                    error: function(err) {
                        console.error(err)
                    }
                });
            }


            $("a[name='refresh']").click(function() {
                refreshPage()
            });

            $(document).on('click', "a[name='delete']", function() {
                const userId = $(this).data('id');
                deleteUser(userId, [refreshPage, refreshPage2])
            });

            // code to be implemented
            $("a[name='view']").click(function() {
                const id = $(this).data('id');
                $.ajax({
                    url: 'index.php?controller=user&action=view&id=' + id,
                    method: 'GET',
                }).done(function(res) {
                    const result = JSON.parse(res);
                    $("#exampleModal").modal('show')
                    $("#first_name span").text(result.first_name)
                    $("#last_name span").text(result.last_name)
                }).fail(function(err) {

                });
            });
        });
    </script>
</body>

</html>