  <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">
    <script src="<?php echo base_url().'assets/js/jquery-3.6.0.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js';?>"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/dashboard.css');?>">
</head>

<body class="bg-white">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top mb-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo base_url().'admin/home';?>">Admin Panel</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarRes">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarRes">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            User
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo base_url().'admin/user/';?>">Manage User</a>
                            <a class="dropdown-item" href="<?php echo base_url().'admin/user/create_user';?>">Create
                                User</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown active ">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Store
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo base_url().'admin/store/';?>">Manage Store</a>
                            <a class="dropdown-item"
                                href="<?php echo base_url().'admin/store/create_restaurant';?>">Create Store</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Category
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo base_url().'admin/category/';?>">Manage
                                Categories</a>
                            <a class="dropdown-item"
                                href="<?php echo base_url().'admin/category/create_category';?>">Create
                                Category</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Menu
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo base_url().'admin/menu/';?>">Manage Menu</a>
                            <a class="dropdown-item" href="<?php echo base_url().'admin/menu/create_menu';?>">Create
                                Menu</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Orders
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo base_url().'admin/orders/';?>"><i class="fas fa-shopping-basket"></i> All Orders</a>
                        </div>
                    </li>
                     <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Reports
                        </a>
                     <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                             <a class="dropdown-item" href="<?php echo base_url().'admin/home/rejected_orders/';?>"><i class="fas fa-shopping-basket"></i> Rejected</a>
                          
                            <a class="dropdown-item" href="<?php echo base_url().'admin/home/resReport';?>"><i class="fas fa-shopping-basket"></i> Restaurants Reports</a>
                    
                            <a class="dropdown-item" href="<?php echo base_url().'admin/home/dishesReport';?>"><i class="fas fa-shopping-basket"></i> Dishes Reports</a>
                        </div>
                    </li>
                    <li class="nav-item active">
                        <a href="<?php echo base_url().'admin/login/logout';?>"
                            class="nav-link">Logout </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <script>
    $(document).ready(function() {
        $(".dropdown").hover(function() {
            var dropdownMenu = $(this).children(".dropdown-menu");
            if (dropdownMenu.is(":visible")) {
                dropdownMenu.parent().toggleClass("open");
            }
        });
    });
    </script>

  <div class="col-md-6 mt-3" style="margin-left: 30%;">            <div class="row">
                <div class="col-md-12">
                    <h2>Restaurants Report</h2>
                </div>
                <div class="col-md-12">
                    <table class="table table-striped table-responsive table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Restaurant Name</th>
                                <th>Total Sales</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            <?php if(!empty($resReport)) {?>
                            <?php foreach($resReport as $report) { ?>
                            <tr>
                                <td><?php echo $report->r_id; ?></td>
                                <td><?php echo $report->name; ?></td>
                                <td><?php echo $report->price; ?></td>
                            </tr>
                            <?php } ?>
                            <?php } else {?>
                            <tr>
                                <td colspan="4">Records not found</td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    <a href="<?php $id=1; echo base_url().'admin/home/generate_pdf/'.$id; ?>"
                        class="btn btn-success mt-3">Download Report</a>
                </div>
            </div>
        </div>