<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <title>Student Portal</title>

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

        .table tr.green-row td {
            background-color: #d1e7dd !important;
            color: #0f5132;
        }

        .table tr.red-row td {
            background-color: #f8d7da !important;
            color: #842029;
        }

        /* MOBILE RESPONSIVE MEDIA QUERIES (< 992px) */
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
    </style>
</head>

<body>
    <!-- Mobile Screen Dimmer Overlay -->
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
                    <a href="./portal" class="nav-link active py-2.5 px-3">
                        <i class="fa-solid fa-gauge me-3"></i>Dashboard
                    </a>
                </li>
                <li>
                    <a href="./register" class="nav-link py-2.5 px-3">
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

            <!-- Inner Grid Container -->
            <div class="container-fluid p-3 p-md-4 flex-grow-1">
                <div class="text-center mb-4 mt-2 mt-lg-0">
                    <h1 class="fw-bold tracking-tight m-0 py-2">STUDENTS</h1>
                </div>

                <!-- Student Dynamic Attendance Table Card -->
                <div class="card shadow-sm border-0">
                    <div class="card-body p-3 p-md-4">
                        <div class="table-responsive">
                            <table class="table table-striped align-middle m-0">
                                <thead class="table-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>IC.No</th>
                                        <th>Name</th>
                                        <th>Contact</th>
                                        <th>Class</th>
                                        <th style="min-width: 280px; width: 320px;">Status / Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($attendance as $student)
                                        <tr class="{{ $student->status == 1 ? 'green-row' : ($student->status == 2 ? 'red-row' : '') }}">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $student->IC }}</td>
                                            <td class="text-nowrap fw-semibold">{{ $student->Name }}</td>
                                            <td>{{ $student->Contact }}</td>
                                            <td>{{ $student->class }}</td>
                                            <td class="action-buttons">
                                                <div class="d-flex gap-2">
                                                    <!-- Update Status Form -->
                                                    <form action="{{ route('attendance.update', $student->id) }}" method="POST" class="d-flex align-items-center gap-2 m-0">
                                                        @csrf
                                                        @method('PUT')

                                                        <select name="status" class="form-select form-select-sm" style="width: 140px;" onchange="changeRowColor(this)">
                                                            <option value="">Choose</option>
                                                            <option value="1" {{ $student->status == 1 ? 'selected' : '' }}>Present</option>
                                                            <option value="2" {{ $student->status == 2 ? 'selected' : '' }}>Absent</option>
                                                        </select>

                                                        <button type="submit" class="btn btn-success btn-sm px-2.5">Save</button>
                                                    </form>

                                                    <!-- Drop Student Form -->
                                                    <form action="{{ route('attendance.delete', $student->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to drop this student?');" class="m-0">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm px-2.5">Drop</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>    
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Global Javascript Bundles -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // RESPONSIVE SIDEBAR TOGGLE MECHANIC
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebarMenu');
            const overlay = document.getElementById('sidebarOverlay');
            
            sidebar.classList.toggle('show-sidebar');
            overlay.classList.toggle('active');
        }

        // ROW SELECTION THEME UPDATER
        function changeRowColor(select) {
            let row = select.closest("tr");
            if (!row) return;

            row.classList.remove("green-row", "red-row");

            if (select.value === "1") {
                row.classList.add("green-row");
            } else if (select.value === "2") {
                row.classList.add("red-row");
            }
        }
    </script>
</body>
</html>