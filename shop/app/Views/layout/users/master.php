<?php
$pageName = 'Users';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageName ?></title>
    <?= $this->include('partial/users/header') ?>
</head>

<body class="g-sidenav-show bg-gray-100">

    <div class="min-height-300 bg-primary position-absolute w-100"></div>

    <!-- start side bar -->
    <?= $this->include("partial/sidebar"); ?>

    <main class="main-content position-relative border-radius-lg ">

        <!-- Navbar -->
        <?= $this->include("partial/navbar"); ?>

        <?= $this->renderSection('body-content'); ?>

    </main>

    <?= $this->include('partial/users/footer'); ?>

    <!-- fetch the data and show this data in table by using class name in tbody -->
    <script>
        $(document).ready(function() {
            // when reload the page fetch all data of user
            userLoad();

            // this get for one user data by user_id
            $(document).on('click', '.user-view', function(e) {
                e.preventDefault()
                // for access to id in the class user-id
                let user_id = $(this).closest('tr').find('.user-id').text();
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('user-view') ?>",
                    data: {
                        "user-id": user_id
                    },
                    dataType: "JSON",
                    success: function(response) {
                        // show info of user by using class and append this to the text
                        $('.id-view').text(response['id']);
                        $('.first-name-view').text(response['first-name']);
                        $('.last-name-view').text(response['last-name']);
                        $('.email-view').text(response['email']);
                        $('.postion-view').text(response['postion']);
                        $('.rank-view').text(response['rank']);

                        // after append the user to text show me the modal
                        $('#userView').modal('show');
                    }
                });
            });
        });

        function userLoad() {
            $.ajax({
                url: "<?= base_url('user-fetch') ?>",
                method: "GET",
                dataType: "json",
                success: function(response) {

                    // loop on the ajax data
                    $.each(response, function(key, value) {
                        // append to table the all value
                        $('.userdata').append(`
                                <tr>
                                    <td class='text-center user-id'>${value.id}</td>
                                    <td class='text-center'>${value['first-name']}</td>
                                    <td class='text-center'>${value['last-name']}</td>
                                    <td class='text-center'>${value['email']}</td>
                                    <td class='text-center'>${value['postion']}</td>
                                    <td class='text-center'>${value['rank']}</td>
                                    <td class='text-center'>
                                        <a href="" class="btn btn-info btn-sm user-view">View</a>
                                        <a href="" class="btn btn-primary btn-sm user-edit">Edit</a>
                                        <a href="" class="btn btn-danger btn-sm user-delete">Delete</a>
                                    </td>
                                </tr>`);
                    });

                    // active datatable 
                    new DataTable('#mydatatable');
                }

            });
        }
    </script>

    <!-- edit user -->
    <script>
        $(document).ready(function() {
            $(document).on('click', '.user-edit', function(e) {
                e.preventDefault();
                var user_id = $(this).closest('tr').find('.user-id').text();
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('user-edit') ?>",
                    data: {
                        'user-id': user_id,
                    },
                    success: function(response) {
                        $('.user-id').val(response['id']);
                        $('.first-name').val(response['first-name']);
                        $('.last-name').val(response['last-name']);
                        $('.email').val(response['email']);
                        $('.postion').val(response['postion']);

                        // get the rank value and check one of choises
                        if (response['rank'] == '1') {
                            $('.admin').prop('checked', true);
                        } else if (response['rank'] == '0') {
                            $('.user').prop('checked', true);
                        }

                        // show the user edit modal
                        $('#userEdit').modal('show');
                    }
                });
            });
        });
    </script>

    <!-- update user -->
    <script>
        $(document).on('click', '.ajaxuser-update', function() {
            var data = {
                'id': $('#user-id').val(),
                'first-name': $('#first-name').val(),
                'last-name': $('#last-name').val(),
                'email': $('#email').val(),
                'postion': $('#postion').val(),
                'rank': $('#rank').val(),
            };
            $.ajax({
                method: "POST",
                url: "<?= base_url('user-update') ?>",
                data: data,
                success: function(response) {
                    // to un repeat the data fetched
                    $('.userdata').html('');

                    // when insert the new data show the data in table by using this function
                    userLoad();

                    // this code for configration of the success msg by using alertify
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success(response.status);
                }
            });
        });
    </script>

    <!-- add user -->
    <script>
        $(document).ready(function() {
            // when click in class ajaxuser-save that i put this class in the save button
            $(document).on('click', '.ajaxuser-save', function() {
                /**
                 ** check on the input first name by class first name 
                 ** is empty that add class error_firstname
                 ** that class have msg that put  by id error_firstname
                 ** is not empty the id have empty msg
                 */
                if ($.trim($('.first-name').val()).length == 0) {
                    error_firstname = 'please enter first name';
                    $("#error_firstname").text(error_firstname);
                } else {
                    error_firstname = '';
                    $("#error_firstname").text(error_firstname);
                }

                // check on the input last name
                if ($.trim($('.last-name').val()).length == 0) {
                    error_lastname = 'please enter last name';
                    $("#error_lastname").text(error_lastname);
                } else {
                    error_lastname = '';
                    $("#error_lastname").text(error_lastname);
                }

                // check on the input email
                if ($.trim($('.email').val()).length == 0) {
                    error_email = 'please enter email';
                    $("#error_email").text(error_email);
                } else {
                    error_email = '';
                    $("#error_email").text(error_email);
                }

                // check on the input password
                if ($.trim($('.password').val()).length == 0) {
                    error_password = 'please enter password';
                    $("#error_password").text(error_password);
                } else {
                    error_password = '';
                    $("#error_password").text(error_password);
                }

                // check on the input postion
                if ($.trim($('.postion').val()).length == 0) {
                    error_postion = 'please enter postion';
                    $("#error_postion").text(error_postion);
                } else {
                    error_postion = '';
                    $("#error_postion").text(error_postion);
                }

                // check on the input rank
                if ($('input[name="rank"]:checked').val() == undefined) {
                    error_rank = 'please enter rank';
                    $("#error_rank").text(error_rank);
                } else {
                    error_rank = '';
                    $("#error_rank").text(error_rank);
                }

                // checked if any thing is empty returned false else
                // go to ajax code
                if (error_firstname != '' || error_lastname != '' || error_email != '' || error_password != '') {
                    return false;
                } else {
                    // get data this the user entered in the input by class
                    var data = {
                        'first-name': $('.first-name').val(),
                        'last-name': $('.last-name').val(),
                        'email': $('.email').val(),
                        'password': $('.password').val(),
                        'postion': $('.postion').val(),
                        'rank': $('input[name="rank"]:checked').val(),
                    }
                    $.ajax({
                        method: "POST",
                        url: "<?= base_url('user-insert') ?>", // this ajax go to route user-insert
                        data: data,
                        success: function(response) {

                            // when enter the wrong email show this msg
                            $("#error_email").text(response.status.email);

                            // empty the all input
                            $('#userModal').find('input').val('');

                            // to un repeat the data fetched
                            $('.userdata').html('');

                            userLoad();

                            // this code for configration of the success msg by using alertify
                            alertify.set('notifier', 'position', 'top-right');
                            alertify.success(response.status);

                            // datatable
                            new DataTable('#mydatatable');
                        }
                    });
                }
            });
        });
    </script>

    <!-- delete user  -->
    <script>
        $(document).ready(function() {
            // view the pop up message
            $(document).on('click', '.user-delete', function(e) {
                e.preventDefault();
                let user_id = $(this).closest('tr').find('.user-id').text();
                // add the user_id in input value
                $('.user-id').val(user_id);
                // show the modal
                $('#userDelete').modal('show');
            });

            // when click on yes query the process
            $(document).on('click', '.ajaxuser-delete', function() {
                var data = {
                    'id': $('.user-id').val()
                };
                $.ajax({
                    method: "POST",
                    url: "<?= base_url('user-delete') ?>",
                    data: data,
                    success: function(response) {
                        // to un repeat the data fetched
                        $('.userdata').html('');

                        userLoad();

                        // hide the modal after process
                        $('#userDelete').modal('hide');

                        // this code for configration of the success msg by using alertify
                        alertify.set('notifier', 'position', 'top-right');
                        alertify.success(response.status);
                    }
                });
            });
        });
    </script>
</body>

</html>