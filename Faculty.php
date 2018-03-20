<?php

function random_password($length = 10) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
    $password = substr(str_shuffle($chars), 0, $length);
    return $password;
}

session_start();
if ($_SESSION['utype']) {
    $uname = $_SESSION['uname'];
    $usertype = $_SESSION['utype'];
} else {

    header("location:login.php");
}
$password = random_password(10);
?>
<?php include('config/db_con.php');
include('config/userDetails.php'); ?>
<?php
$queary = "SELECT * FROM `faculty`";
$result = mysqli_query($con, $queary);
?>

<!DOCTYPE html>
<html lang="en"><head>
        <title>Library Management System</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="accetets/bootstrap.min.css">
        <link rel="stylesheet" href="accetets/datatables.min.css">
        <link rel="stylesheet" href="accetets/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">

        <link rel="shortcut icon" href="img/icon2.png" >
        <link rel="stylesheet" href="accetets/w3.css">
        <script src="accetets/jquery-3.2.1.js"></script>
        <script src="accetets/jquery.validate.js"></script>
        <script src="accetets/bootstrap.min.js"></script>
        <script src="accetets/datatables.min.js"></script>
        <script src="accetets/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
        <link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="accetets/bootstrap-4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <script src="accetets/bootstrap-4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
        <style>
            body{
                background-color:
            }
            a:link {
                text-decoration: none;
            }

            a:visited {
                text-decoration: none;
            }

            a:hover {
                text-decoration: none;
            }

            a:active {
                text-decoration: none;
            }
            .navbar-login
            {
                width: 305px;
                padding: 10px;
                padding-bottom: 0px;
            }

            .navbar-login-session
            {
                padding: 1px;
                padding-bottom: 0px;
                padding-top: 0px;
            }

            .icon-size
            {
                width: 100px;
            }

        </style>
        <script type="text/javascript">
            $(function () {
                $(":file").change(function () {
                    if (this.files && this.files[0]) {
                        var reader = new FileReader();
                        reader.onload = imageIsLoaded;
                        reader.readAsDataURL(this.files[0]);
                    }
                });
            });

            function imageIsLoaded(e) {
                $('#myImg').attr('src', e.target.result);
            }
            ;

            function myAccFunc() {
                var x = document.getElementById("demoAcc");
                //x=document.getElementById("demoAcc2");
                if (x.className.indexOf("w3-show") == -1) {
                    x.className += " w3-show";
                    x.previousElementSibling.className += " w3-gray";
                } else {
                    x.className = x.className.replace(" w3-show", "");
                    x.previousElementSibling.className =
                            x.previousElementSibling.className.replace(" w3-gray", "");
                }


            }

            function myAccFunc2() {
                //x = document.getElementById("demoAcc");
                var x = document.getElementById("demoAcc2");
                if (x.className.indexOf("w3-show") == -1) {
                    x.className += " w3-show";
                    x.previousElementSibling.className += " w3-gray";
                } else {
                    x.className = x.className.replace(" w3-show", "");
                    x.previousElementSibling.className =
                            x.previousElementSibling.className.replace(" w3-gray", "");
                }


            }
            function myAccFunc3() {
                //x = document.getElementById("demoAcc");
                var x = document.getElementById("demoAcc3");
                if (x.className.indexOf("w3-show") == -1) {
                    x.className += " w3-show";
                    x.previousElementSibling.className += " w3-gray";
                } else {
                    x.className = x.className.replace(" w3-show", "");
                    x.previousElementSibling.className =
                            x.previousElementSibling.className.replace(" w3-gray", "");
                }


            }

            $(document).ready(function () {
                oTable = $('#example').DataTable({

                    "sDom": "ltipr"

                });

                $('#myInputTextField').keyup(function () {
                    oTable.columns(0)
                            .search(this.value)
                            .draw();
                })
                $('#myInputTextField2').keyup(function () {
                    oTable.columns(1)
                            .search(this.value)
                            .draw();
                })

                oTable.columns('.select-filter').every(function () {
                    var that = this;

                    // Create the select list and search operation
                    var select = $('<select />')
                            .appendTo(
                                    this.footer()
                                    )
                            .on('change', function () {
                                that
                                        .search($(this).val())
                                        .draw();
                            });

                    // Get the search data for the first column and add to the select list
                    this
                            .cache('search')
                            .sort()
                            .unique()
                            .each(function (d) {
                                select.append($('<option value="' + d + '">' + d + '</option>'));
                            });
                });
            });
        </script>
    </head>
    <body>

        <?php include('config/nav.php'); ?>
        <?php $page = "faculty" ?>
<?php include('config/side_nav.php'); ?>
        <div style="margin-left:12%;">
            <div class="container" style="padding-top:50px">

                <div class="w3-row">

                    <div class="w3-card-4 w3-col s12 w3-margin">
                        <div class="w3-container w3-padding">
                            <div class="row" style="padding-left:16px"><i class="fa fa-institution" style="font-size:40px">&nbsp&nbsp</i> <h2>Faculties</h2> </div><hr/>
                        </div>
                        <div class="w3-container">
                            <form  action="GET" id="form">

                                <div class="row w3-section">
                                    <div class="col-sm-2"><h5 class="text-right" style="margin-top:4px"><i class="fa fa-search" style="font-size:30px"></i> &nbsp;Search By :</h5></div>
                                    <div class="col-sm-3">

                                        <input class="w3-input w3-border " name="first" type="text" placeholder="Faculty ID" id="myInputTextField"></div>
                                    <div class="col-sm-3">
                                        <input class="w3-input w3-border " name="first" type="text" placeholder="Faculty Name" id="myInputTextField2"></div>

                            </form>
                            <div class="col-sm-3 float-right">
                                <button class="w3-btn w3-block w3-red w3-margin-bottom w3-padding" type="button"  data-toggle="modal" data-target="#myModale"><i class="fa fa-plus"></i>&nbsp;Add New</button></div>
                        </div>
                        <div class="modal fade" id="myModale" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class=" w3-card modal-dialog" role="document">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-institution"></i> Add New Faculty</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="config/faculty_engin.php" id="form1">
                                            <input class="w3-input w3-border" name="facName" type="text" placeholder="Faculty Name" >
                                            <div id="check"></div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="w3-btn  w3-gray w3-margin-bottom w3-padding" data-dismiss="modal" onClick="window.location.href = 'Faculty.php'">Close</button>
                                        <button type="submit" name="submit" class="w3-btn  w3-red w3-margin-bottom w3-padding" id="submit">Add</button></form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered" id="example">
                            <thead>
                                <tr class="w3-light-grey">
                                    <th>Faculty ID</th>
                                    <th>Faculty</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <?php
                            while ($row = mysqli_fetch_array($result)) {
                                ?> 

                                <tr>
                                    <td><?php echo $row["fac_id"]; ?></td>
                                    <td><?php echo $row["fac_name"]; ?></td>
                                    <td><a class="openModal1" data-toggle="modal" data-target="#myModal" data-id="<?php echo $row['fac_id'] ?>" style="cursor:pointer"><i class="fa fa-pencil" style="font-size:24px;color:blue;" ></i></a> &nbsp;<a href="#" data-toggle="tooltip" title="Delete This Book" id="delete_fac_<?php echo $row["fac_id"]; ?>" name="<?php echo $row["fac_id"]; ?>"><i class="fa fa-trash-o" aria-hidden="true" style="font-size:24px;color:red"></i></a></td>
                                </tr>
<?php } ?>



                        </table>

                    </div>
                </div>

            </div>

        </div></div>
    <div  class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-institution"></i> Update Faculty</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="form2" action="config/updateFac.php" >
                        <div id="modal-content"></div><div id="check2"></div></div>
                <div class="modal-footer">
                    <button type="button" class="w3-btn  w3-gray w3-margin-bottom w3-padding" data-dismiss="modal" onClick="window.location.href = 'Faculty.php'">Close</button>
                    <input type="submit" class="w3-btn  w3-red w3-margin-bottom w3-padding" id="update" value="Update" name="update" ></form>

                </div>
            </div>
        </div>

    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#submit").click(function () {

                $.post($("#form1").attr("action"),
                        $("#form1 :input").serializeArray(),
                        function (info1) {
                            $("#check").html(info1);
                        })
//clearInput();
            });

            $("#form1").submit(function () {

                return false;
//  window.location='Faculty.php';
            });
        });

        $(function () {
            // setup validate
            $.validate({

                // modules : 'file',
                onSuccess: function () {

                }
            });

        });

        jQuery(document).ready(function ($) {

            $("[id^='delete_fac']").click(function (event) {
                event.preventDefault();
                if (confirm('Are you sure delete this Faculty?')) {
                    $.ajax({

                        method: "POST",
                        url: "config/delete_Faculty.php",
                        data: {id: this.name}
                    })
                            .done(function (msg) {

                                window.location = 'Faculty.php';
                            });
                }



            });
        });

        $('.openModal1').click(function () {
            $("#check2").html("");
            var id = $(this).attr('data-id');
            $.ajax({url: "test2.php?id=" + id, cache: false, success: function (result) {
                    $("#modal-content").html(result);
                }});
        });

        $(document).ready(function () {
            $("#update").click(function () {
                //alert("dsv");


                $.post($("#form2").attr("action"),
                        $("#form2 :input").serializeArray(),
                        function (info1) {
                            $("#check2").html(info1);
                        })
//clearInput();
            });

            $("#form2").submit(function () {

                return false;
//  window.location='Faculty.php';
            });
        });
    </script>
    <script src="accetets/form-validator/jquery.form-validator.js"></script>
</body>

</html>
