<div class="sidebar" id="sidebar-wrapper">
    @include('layouts.image')

    <nav class="sidebar-nav">
        <ul class="list-unstyled components">
            <li class="{{ (request()->is('dashboard*')) ? 'active' : '' }}">
                <a href="/dashboard"><i class="fas fa-home"></i>Dashboard</a>
            </li>
            <li class="{{ (request()->is('resident*')) ? 'active' : '' }}">
                <a href="/resident"><i class="fas fa-user"></i>SB Members Info</a>
            </li>
            <li class="{{ (request()->is('documents*')) ? 'active' : '' }}">
                <a href="/documents"><i class="fas fa-folder"></i>Legislative Records</a>
            </li>
            @if(session('user.type') != 'SBMember')
            <li class="{{ (request()->is('certificate*')) ? 'active' : '' }}">
                <a href="/certificate"><i class="fas fa-newspaper"></i>News & Updates</a>
            </li>
            @endif
            <li class="{{ (request()->is('schedule*')) ? 'active' : '' }}">
                <a href="/schedules"><i class="fas fa-calendar"></i>Schedules</a>
            </li>
            <li class="{{ (request()->is('other-documents*')) ? 'active' : '' }}">
                <a href="/other-documents"><i class="fas fa-file-alt"></i>Other Documents</a>
            </li>
            <li class="{{ (request()->is('setting/account*')) ? 'active' : '' }}">
                        <a href="/setting/account"><i class="fas fa-user-cog"></i>Account</a>
                </li>
        </ul>
    </nav>
</div>
 
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

    .sidebar {
        min-width: 250px;
        max-width: 250px;
        background: linear-gradient(135deg, #24243e 0%, #302b63 50%, #0f0c29 100%);
        color: #fff;
        transition: all 0.3s;
        box-shadow: 4px 0 10px rgba(0, 0, 0, 0.1);
        font-family: 'Poppins', sans-serif;
        
    }

    .sidebar .sidebar-nav {
        padding: 20px 0;
        
    }

    .sidebar ul li a {
        padding: 12px 20px;
        font-size: 1rem;
        display: block;
        color: rgba(255, 255, 255, 0.8);
        text-decoration: none;
        transition: all 0.3s ease;
        border-left: 4px solid transparent;
    }

    .sidebar ul li a:hover {
        color: #ffd700;
        background: rgba(255, 255, 255, 0.05);
        transform: translateX(5px);
    }

    .sidebar ul li.active > a {
        color: #ffd700;
        background: rgba(255, 255, 255, 0.05);
        border-left: 4px solid #ffd700;
    }

    .sidebar ul ul a {
        font-size: 0.9rem !important;
        padding-left: 40px !important;
        background: rgba(0, 0, 0, 0.2);
    }

    .sidebar a[data-bs-toggle="collapse"] {
        position: relative;
    }

    .sidebar .dropdown-toggle::after {
        display: block;
        position: absolute;
        top: 50%;
        right: 20px;
        transform: translateY(-50%);
    }

    .sidebar i {
        margin-right: 10px;
        width: 20px;
        text-align: center;
    }

    @media (max-width: 768px) {
        .sidebar {
            margin-left: -250px;
        }
        .sidebar.active {
            margin-left: 0;
        }
    }

    /* Scrollbar Styles */
    .sidebar::-webkit-scrollbar {
        width: 5px;
    }

    .sidebar::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.1);
    }

    .sidebar::-webkit-scrollbar-thumb {
        background-color: rgba(255, 255, 255, 0.3);
        border-radius: 20px;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var dropdownToggle = document.querySelector('.dropdown-toggle');
        var dropdownMenu = document.querySelector('#settingsSubmenu');
        dropdownToggle.addEventListener('click', function(event) {
            event.preventDefault();
            dropdownMenu.classList.toggle('show');
        });
        
    });
</script>