<?php require './vendor/autoload.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--region Bootstrap-->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!--endregion-->
</head>
<body>

<h1>Link Generation.</h1>

<form action="/generate-link.php" method="post">
    <input type="hidden" name="action" value="generate_link">
    <button type="submit" class="btn btn-primary">Generate Link</button>
</form>

<?php
$config = include './config.php';
$password = $config['password'];

$action = @$_POST['action'];

if ($action != 'generate_link') return;

$hash = base64_encode(PasswordHasher::getInstance()->hash($password));
?>

<?php
if (@$hash) {
    $rootUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
    echo "<code>$rootUrl/index.php?hash=$hash</code>";
}
?>

</body>
</html>
