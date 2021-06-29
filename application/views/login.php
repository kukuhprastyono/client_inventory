<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/xtreme_admin_lite/assets/images/favicon.png') ?>">
    <title>Xtreme Admin Template - The Ultimate Multipurpose admin template</title>
    <!-- Custom CSS -->
    <link href="<?= base_url('assets/xtreme_admin_lite') ?>/dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="preloader" style="display: none;">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal form-material" id="formLogin">
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <input type="email" placeholder="johnathan@admin.com" class="form-control form-control-line form-user-input" name="email" id="example-email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Password</label>
                                        <div class="col-md-12">
                                            <input type="password" value="" name="password" class="form-control form-control-line form-user-input">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success">LOGIN</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url('assets/xtreme_admin_lite/')  ?>assets/libs/jquery/dist/jquery.min.js"></script>

    <script type="text/javascript">
        $("#formLogin").on('submit', function(e) {
            e.preventDefault();
            checkLogin();
        });

        function checkLogin() {
            var link = "http://localhost/backend_inventory/user/check_login/";
            var dataForm = {};
            var allInput = $('.form-user-input');
            $.each(allInput, function(i, val) {
                dataForm[val['name']] = val['value'];
            });
            $.ajax(link, {
                type: 'POST',
                data: dataForm,
                success: function(data, status, xhr) {
                    var data_str = JSON.parse(data);
                    alert(data_str['pesan']);
                    if (data_str['sukses'] == 'Ya') {
                        setSession(data_str['user']);
                    }
                },
                error: function(jqXHR, textStatus, errorMsg) {
                    alert('Error : ' + errorMsg);
                }
            });
        }

        function setSession(user) {
            var link = "http://localhost/client_inventory/login/setSession";
            var dataForm = {};
            dataForm['id_user'] = user['id_admin'];
            dataForm['email'] = user['email'];
            dataForm['level'] = user['level'];
            dataForm['nama'] = user['nama'];
            $.ajax(link, {
                type: 'POST',
                data: dataForm,
                success: function(data, status, xhr) {
                    location.replace('http://localhost/client_inventory/home');
                },
                error: function(jqXHR, textStatus, errorMsg) {
                    alert('Error : ' + errorMsg);
                }
            });
        }
    </script>

</body>

</html>