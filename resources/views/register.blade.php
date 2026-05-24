<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="Stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <title>Register Student</title>

    <style>
        /* BASE SIDEBAR SETUP (Desktop default) */
        .sidebar-menu {
            width: 260px;
            min-width: 260px;
            background-color: #1e293b;
            z-index: 1040;
            transition: transform 0.3s ease;
        }

        .sidebar-menu .nav-link {
            color: #cbd5e1;
            transition: all 0.2s ease;
        }

        .sidebar-menu .nav-link:hover, 
        .sidebar-menu .nav-link.active {
            color: #ffffff;
            background-color: #334155;
            border-radius: 6px;
        }

        .action-buttons {
            white-space: nowrap;
        }

        .action-buttons a {
            color: #000;
            text-decoration: none;
        }

        h1 {
            color: #333;
        }

        @media (max-width: 991.98px) {
            .sidebar-menu {
                position: fixed;
                top: 0;
                left: 0;
                height: 100vh;
                transform: translateX(-100%); /* Hides the sidebar off-screen by default */
            }

            /* Class added via JavaScript to slide the menu into view */
            .sidebar-menu.show-sidebar {
                transform: translateX(0);
            }
            
            /* Optional overlay background behind the menu when active on phone screens */
            .sidebar-overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100vw;
                height: 100vh;
                background: rgba(0, 0, 0, 0.4);
                z-index: 1030;
            }
            
            .sidebar-overlay.active {
                display: block;
            }
        }

        /* Custom table row colors for better readability */
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f8f9fa;
        }

        .table-striped tbody tr:nth-of-type(even) {
            background-color: #e9ecef;
        }

        /* Subtle hover effect on table rows */
        .table tbody tr:hover {
            background-color: #dee2e6;
        }
    </style>


</head>
<body>
    <body>
        <div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

    <div class="d-flex min-vh-100">
        
        <!-- SIDEBAR MENU (LEFT SIDE) -->
        <aside class="sidebar-menu p-3 text-white d-flex flex-column shadow" id="sidebarMenu">
            <div class="brand-logo mb-4 p-2 border-bottom border-secondary d-flex align-items-center justify-content-between">
                <h4 class="m-0 fw-bold"><i class="fa-solid fa-graduation-cap me-2"></i>Portal</h4>
                <!-- Close Button visible only on mobile screens -->
                <button class="btn btn-link text-white d-lg-none p-0" onclick="toggleSidebar()">
                    <i class="fa-solid fa-xmark fs-4"></i>
                </button>
            </div>
            
            <!-- Navigation links -->
            <ul class="nav nav-pills flex-column mb-auto gap-1">
                <li class="nav-item">
                    <a href="./portal" class="nav-link py-2.5 px-3">
                        <i class="fa-solid fa-gauge me-3"></i>Dashboard
                    </a>
                </li>
                <li>
                    <a href="./register" class="nav-link active py-2.5 px-3">
                        <i class="fa-solid fa-user-graduate me-3"></i>Students List
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link py-2.5 px-3">
                        <i class="fa-solid fa-clipboard-user me-3"></i>Attendance
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link py-2.5 px-3">
                        <i class="fa-solid fa-gear me-3"></i>Settings
                    </a>
                </li>
            </ul>
        </aside>

        <!-- MAIN STUDENT CONTENT (RIGHT SIDE) -->
        <div class="body-wrapper flex-grow-1 bg-light d-flex flex-column" style="min-width: 0;">
            
            <!-- Mobile Top Header Bar -->
            <header class="navbar navbar-expand-lg navbar-white bg-white border-bottom px-4 py-3 d-lg-none shadow-sm">
                <button class="btn btn-outline-dark btn-sm" onclick="toggleSidebar()">
                    <i class="fa-solid fa-bars me-2"></i>Menu
                </button>
                <span class="fw-bold text-dark ms-3">Student Portal</span>
            </header>

            <div class="mt-4 p-4 bg-light rounded">
                <h3>REGISTER NEW STUDENT</h3>
                <form action="{{ route('student.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="IC" class="form-label">IC Number</label>
                        <input type="text" class="form-control" id="IC" name="IC" placeholder="Enter IC number" required>
                    </div>

                    <div class="mb-3">
                        <label for="Name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="Name" name="Name" placeholder="Enter your name" required>
                    </div>

                    <div class="mb-3">
                        <label for="Contact" class="form-label">Contact Number</label>
                        <input type="text" class="form-control" id="Contact" name="Contact" placeholder="Enter Contact number" required>
                    </div>

                    <div class="mb-3">
                        <label for="class" class="form-label">Class</label>
                        <input type="text" class="form-control" id="class" name="class" placeholder="Enter Student class" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>

                @if (session('success'))
                    <div class="alert alert-success-dismissable fade-show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss='alert'></button>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                    </ul>
                        
                    </div>
                @endif
        </div>
    </div>
    <!-- Global Javascript Bundles -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebarMenu');
            const overlay = document.getElementById('sidebarOverlay');
            sidebar.classList.toggle('show-sidebar');
            overlay.classList.toggle('active');
        }
    </script>

</body>
</html>