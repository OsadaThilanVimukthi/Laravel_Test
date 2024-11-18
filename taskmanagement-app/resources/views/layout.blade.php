<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width,
                   initial-scale=1.0">
    <title>Dashbord</title>
    <link href=
"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" 
          rel="stylesheet"
        integrity=
"sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" 
          crossorigin="anonymous">
    <link rel="stylesheet" 
          href="style.css">
    <link rel="stylesheet" href=
"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity=
"sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" 
        referrerpolicy="no-referrer" />
        <style>
            html, body {
    height: 100%;
    font-family: 'Ubuntu', sans-serif;
}

.gfg {
    height: 50px;
    width: 50px;

}

.mynav {
    color: #fff;
}

.mynav li a {
    color: #fff;
    text-decoration: none;
    width: 100%;
    display: block;
    border-radius: 5px;
    padding: 8px 5px;
}

.mynav li a.active {
    background: rgba(255, 255, 255, 0.2);
}

.mynav li a:hover {
    background: rgba(255, 255, 255, 0.2);
}

.mynav li a i {
    width: 25px;
    text-align: center;
}

.notification-badge {
    background-color: rgba(255, 255, 255, 0.7);
    float: right;
    color: #222;
    font-size: 14px;
    padding: 0px 8px;
    border-radius: 2px;
}

        </style>
</head>

<body>
   
    <div class="container-fluid p-0 d-flex h-100">
        <div id="bdSidebar" 
             class="d-flex flex-column 
                    flex-shrink-0 
                    p-3 bg-success
                    text-white offcanvas-md offcanvas-start">
            <a href="#" 
               class="navbar-brand">
            </a><hr>
            <p>Dashboard</p>
            <ul class="mynav nav nav-pills flex-column mb-auto">
                <li class="nav-item mb-1">
                    <a href="{{url('/tasks')}}">
                        <i class="fa-regular fa-user"></i>
                        Tasks 
                    </a>
                </li>


                <li class="sidebar-item  nav-item mb-1">
                    <a href="#" 
                       class="sidebar-link collapsed" 
                       data-bs-toggle="collapse"
                       data-bs-target="#settings"
                       aria-expanded="false"
                       aria-controls="settings">
                        <i class="fas fa-cog pe-2"></i>
                        <span class="topic">Settings </span>
                    </a>
                    <ul id="settings" 
                        class="sidebar-dropdown list-unstyled collapse" 
                        data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">
                                <i class="fas fa-sign-in-alt pe-2"></i>
                                <span class="topic"> Login</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">
                                <i class="fas fa-user-plus pe-2"></i>
                                <span class="topic">Register</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">
                                <i class="fas fa-sign-out-alt pe-2"></i>
                                <span class="topic">Log Out</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <hr>
            <div class="d-flex">

                <i class="fa-solid fa-book  me-2"></i>
                <span>
                    <h6 class="mt-1 mb-0">
                          Design and Developed by Osada
                      </h6>
                </span>
            </div>
        </div>

        <div class="bg-light flex-fill">
            <div class="p-2 d-md-none d-flex text-white bg-success">
                <a href="#" class="text-white" 
                   data-bs-toggle="offcanvas"
                   data-bs-target="#bdSidebar">
                    <i class="fa-solid fa-bars"></i>
                </a>
                <span class="ms-3">GFG Portal</span>
            </div>
            <div class="p-4">
                <nav style="--bs-breadcrumb-divider:'>';font-size:14px">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <i class="fa-solid fa-house"></i>
                        </li>

                    </ol>
                </nav>

                <hr>
                <div class="row">
                    <div class="col">
                        @yield('content')
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>
