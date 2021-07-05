<?php
/* 
    khi vào trang tạo tài khoản thì sẽ load lại toàn bộ tài khoản trên csdl,
    dùng nó để kiểm tra nếu người tạo tài khoản nhập trùng username thì sẽ thông báo lỗi bằng javascript,
    nếu không thực hiện tiếp tục, nếu ấn vào create thì sẽ thông báo đã tạo tài khoản thành công và tiêp tục chuyển qua trang login
    lúc lưu có đề cập muốn lưu cookie hay không .
*/
include_once('models/db.php');
include_once('models/register.php');

$objRegister = new Register();

// lấy lại toàn bộ đối tượng users nếu có.
$users = $objRegister->getAllUsers();
?>


<?php
// đưa vào biến javascript để thực hiện kiểm tra.
echo "<script> var users = " . json_encode($users, JSON_HEX_TAG) . "; console.log(users);</script>"
?>

<?php


$username = NULL;
$email  = NULL;
$password = NULL;

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
    if ($_POST['username'] !== '' && $_POST['password'] !== '' && $_POST['email'] !== '') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email  = $_POST['email'];
        $objRegister->createUser($username, $password, $email);
?>
        <script>
            let check = confirm("Tạo tài khoản thành công!");
            if (check === true) {
                document.location.href = '<?php echo ROOT_URL."login.php" ?>';
            }
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("Vui lòng nhập đủ giá trị!");
        </script>
<?php
    }
}
?>

<!DOCTYPE html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Login / Sign Up Form</title>
    <link rel="stylesheet" href="./css/css-login.css">
</head>

<body>
    <div class="container">
        <form class="form" id="createAccount" method="POST" action="register.php" false>
            <h1 class="form__title">Create Account</h1>
            <div class="form__message form__message--error"></div>
            <div class="form__input-group">
                <input type="text" id="username" name="username" class="form__input" autofocus placeholder="Username" require>
                <div class="form__input-error-message"></div>
            </div>
            <div class="form__input-group">
                <input type="email" name="email" class="form__input" autofocus placeholder="Email Address" require>
                <div class="form__input-error-message"></div>
            </div>
            <div class="form__input-group">
                <input type="password" name="password" class="form__input" autofocus placeholder="Password" require>
                <div class="form__input-error-message"></div>
            </div>
            <button class="form__button" type="submit">Continue</button>
            <p class="form__text">
                <a class="form__link" href="./login.php" id="linkLogin">Already have an account? Sign in</a>
            </p>
        </form>
    </div>
    <script src="./js/main-login-js"></script>
</body>