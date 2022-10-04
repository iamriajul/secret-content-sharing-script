<?php require './vendor/autoload.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--region jQuery-->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <!--endregion-->

    <!--region Bootstrap-->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!--endregion-->
</head>
<body>

<h1 class="d-flex justify-content-between">
    A Content Title.
    <a href="/generate-link.php" class="btn btn-secondary">Secret Link Generator</a>
</h1>
<p>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent at tellus in ex consequat malesuada. Morbi gravida quam non dui faucibus mollis. Sed congue quam ac massa condimentum, id sagittis lorem feugiat. Nullam pharetra nulla eu eros pretium posuere. Nullam sit amet vestibulum diam. Nullam sed lectus ipsum. Donec faucibus faucibus metus, vitae suscipit arcu hendrerit non. Quisque pretium nibh pharetra lacus dignissim, eleifend convallis libero accumsan. Mauris convallis, justo nec molestie placerat, sapien purus semper leo, sed lobortis turpis nisl non tortor.

    Integer suscipit ultrices ornare. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus gravida elementum mauris, at scelerisque diam scelerisque non. Sed varius quam vitae sodales bibendum. Nulla libero urna, mattis ac auctor vel, sollicitudin eu ipsum. Morbi imperdiet rutrum augue a venenatis. Sed nec venenatis est. Cras faucibus at tortor ac commodo.

    Aenean tincidunt orci justo, at vulputate neque laoreet sed. Praesent id dictum libero, ut tristique eros. Duis eu scelerisque lectus. Pellentesque elementum fermentum massa et hendrerit. Duis suscipit ligula ac lorem commodo imperdiet. Nullam nisi ligula, venenatis eu massa non, malesuada lobortis erat. Phasellus et sem a erat vehicula eleifend. Duis non commodo risus, quis tristique risus.

    Maecenas in nulla volutpat, iaculis turpis vitae, fermentum est. Quisque lacus massa, accumsan a egestas molestie, facilisis sed felis. Ut hendrerit varius lacinia. Pellentesque neque eros, lobortis id lorem ut, ultrices scelerisque mauris. Mauris sed arcu sit amet eros egestas maximus a ut quam. Pellentesque tincidunt maximus dolor, mollis fringilla ligula consequat a. In erat orci, lacinia et justo eget, efficitur mollis leo. Nulla et blandit neque. Vivamus sit amet elementum libero, at aliquet nisl. Aenean pharetra sapien at est accumsan, vel elementum sem lacinia.

    Maecenas tincidunt, est sit amet sodales hendrerit, tellus sem ultrices nisl, eu suscipit purus mauris ut odio. Integer imperdiet accumsan ante. In nisi tellus, porttitor sed ante sed, volutpat aliquet mi. Praesent molestie, ex et egestas accumsan, libero quam elementum lectus, id suscipit justo magna id nunc. In et lacus mauris. Curabitur ornare ligula velit, nec facilisis nisi congue ut. Cras euismod consectetur tincidunt. Vivamus egestas in sem quis lobortis.
</p>

<?php
$config = include './config.php';
$password = $config['password'];

$hash = @$_GET['hash'];

if ($hash && PasswordHasher::getInstance()->check(base64_decode($hash), $password)) {
?>
    <!-- Button trigger modal -->
    <button id="btn-show-modal" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Secret Content Title.</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Your awesome secret content.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        jQuery(document).ready(function ($) {
            $('#btn-show-modal').click();
        });
    </script>
<?php
}
?>


</body>
</html>
