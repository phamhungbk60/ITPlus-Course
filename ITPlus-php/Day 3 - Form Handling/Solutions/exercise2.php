<?php 
    if (isset($_POST['save'])) {
        $errors = [];

        if (strlen(trim($_POST['first_name'])) === 0) {
            $errors['first_name'] = "First name must not be null";
        }

        if (strlen(trim($_POST['last_name'])) === 0) {
            $errors['last_name'] = "Last name must not be null";
        }

        if (strlen(trim($_POST['email'])) === 0) {
            $errors['email'] = "Email must not be null";
        } else {
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Email must be in correct format';
            }
        }

        if (strlen(trim($_POST['gender'])) === 0) {
            $errors['gender'] = "Gender must not be null";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css"
        integrity="sha512-oc9+XSs1H243/FRN9Rw62Fn8EtxjEYWHXRvjS43YtueEewbS6ObfXcJNyohjHqVKFPoXXUxwc+q1K7Dee6vv9g=="
        crossorigin="anonymous" />
</head>

<body>
    <?php if (isset($errors) && count($errors) == 0) { ?>
        <div class="card">
            <div class="card-body">
                <p>First name: <?php echo $_POST['first_name'] ?></p>
                <p>Last name: <?php echo $_POST['last_name'] ?></p>
                <p>Email: <?php echo $_POST['email'] ?></p>
                <p>Gender: <?php echo $_POST['gender'] ?></p>
                <p>State: <?php echo $_POST['state'] ?></p>
                <!-- Do hobbies là array, nên mình muốn join các phần tử trong array lại bằng hàm implode -->
                <p>Hobbies: <?php echo (isset($_POST['hobbies']) && count($_POST['hobbies'])) > 0 ? implode(',', $_POST['hobbies']) : "" ?></p>
            </div>
        </div>
    <?php } ?>

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <h5 class="card-header">Registration Form</h5>
                    <div class="card-body">
                        <form action="exercise2.php" method="POST">
                            <div class="form-group">
                                <label for="first_name">First name</label>
                                <input type="text" name="first_name" id="first_name" class="form-control <?php echo isset($errors['first_name']) ? 'is-invalid' : '' ?>" placeholder="" value="<?php echo isset($_POST['first_name']) ? $_POST['first_name']: ''?>"/>
                                <?php if (isset($errors) && isset($errors['first_name'])) { ?>
                                    <small id="helpId" class="invalid-feedback"><?php echo $errors['first_name']; ?></small>
                                <?php } ?>
                            </div>

                            <div class="form-group">
                                <label for="last_name">Last name</label>
                                <input type="text" name="last_name" id="last_name" class="form-control <?php echo isset($errors['last_name']) ? 'is-invalid' : '' ?>" placeholder="" value="<?php echo isset($_POST['last_name']) ? $_POST['last_name']: ''?>"/>
                                <?php if (isset($errors) && isset($errors['last_name'])) { ?>
                                    <small id="helpId" class="invalid-feedback"><?php echo $errors['last_name']; ?></small>
                                <?php } ?>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control <?php echo isset($errors['email']) ? 'is-invalid' : '' ?>" placeholder="" value="<?php echo isset($_POST['email']) ? $_POST['email']: ''?>"/>
                                <?php if (isset($errors) && isset($errors['email'])) { ?>
                                    <small id="helpId" class="invalid-feedback"><?php echo $errors['email']; ?></small>
                                <?php } ?>
                            </div>

                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="male" value="male" checked>
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                                <?php if (isset($errors) && isset($errors['gender'])) { ?>
                                    <small id="helpId" class="invalid-feedback"><?php echo $errors['gender']; ?></small>
                                <?php } ?>
                            </div>

                            <div class="form-group">
                                <label for="state">State</label>
                                <select type="text" name="state" id="state" class="form-control" placeholder="">
                                    <option value="1" <?php echo (isset($_POST['state']) && $_POST['state']) === "1" ? 'selected': ''?>>Johor</option>
                                    <option value="2" <?php echo (isset($_POST['state']) && $_POST['state']) === "2" ? 'selected': ''?>>Massachusetts</option>
                                    <option value="3" <?php echo (isset($_POST['state']) && $_POST['state']) === "3" ? 'selected': ''?>>Washington</option>
                                </select>
                            </div>

                            <!-- Hobbies -->
                            <div class="form-group">
                                <div>
                                    <label>Hobbies</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="hobbies[]" type="checkbox" id="badminton" value="badminton" <?php echo (isset($_POST['hobbies']) && in_array("badminton", $_POST['hobbies'])) ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="badminton">Badminton</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="hobbies[]" type="checkbox" id="football" value="football" <?php echo (isset($_POST['hobbies']) && in_array("football", $_POST['hobbies'])) ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="football">Football</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="hobbies[]" type="checkbox" id="bycicle" value="bicycle" <?php echo (isset($_POST['hobbies']) && in_array("bicycle", $_POST['hobbies'])) ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="bicycle">Bicycle</label>
                                </div>            
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" name="save">Save record</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                        <h5 class="card-header">Featured</h5>
                        <div class="card-body">
                            <h5 class="card-title">Special title treatment</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.min.js"
        integrity="sha512-8qmis31OQi6hIRgvkht0s6mCOittjMa9GMqtK9hes5iEQBQE/Ca6yGE5FsW36vyipGoWQswBj/QBm2JR086Rkw=="
        crossorigin="anonymous"></script>
</body>

</html>