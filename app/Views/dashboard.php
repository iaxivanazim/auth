<?php
$session = session();


?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="dashboardstyle.css" />

    <title>Dashboard</title>

</head>

<body>

    <div class="container">
        <div class="row" style="justify-content: center;">
            <div class="col-lg-4">
                <div class="card p-0">
                    <div class="card-image">
                        <img src="https://picsum.photos/600/800?random=1" alt="Random Profile Image">
                    </div>
                    <div class="card-content d-flex flex-column align-items-center">
                        <h4 class="pt-2"><?php echo $session->get('fname'); ?></h4>
                        <h5>Awesome User!</h5>

                        <ul class="social-icons d-flex justify-content-center">
                            <li style="--i:1">
                                <a onclick="myFunction()" class="btn" style="padding: 8px 10px;"><i class="fa fa-info"></i> View info</a>
                            </li>
                            <li style="--i:2">
                                <a href="<?php echo base_url(); ?>LoginController/logout" class="btn" style="padding: 8px 10px;"><i class="fa fa-user"></i> Logout</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <footer style="text-align: center;padding-top: 20px;color: white;">Made with &#10084;&#65039; by Ivan Azim </footer>
        </div>
    </div>


    <script>
        function myFunction() {
            alert("<?php echo 'Name:' . ' ' . $session->get('fname') . ' ' . $session->get('lname'); ?>\n<?php echo 'Email:' . ' ' . $session->get('email'); ?>\n<?php echo 'Contact:' . ' ' . $session->get('contact'); ?>");
        }
    </script>
</body>

</html>