<nav class="navbar navbar-expand-lg navbar-dark ">
    <div class="container-fluid">
        <button class="btn btn-link text-white" id="menu-toggle">
            <i class="fas fa-bars"></i>
        </button>
        <a class="navbar-brand mx-auto" href="/dashboard">
            <img src="{{ URL::asset('images/icons.png') }}" alt="Logo" height="30" class="d-inline-block align-top">
            <span class="brand-text">SBMIS</span>
        </a>
        <a class="navbar-brand mx-auto" href="/dashboard">
            <img src="{{ URL::asset('images/phnew.png') }}" alt="Logo" height="30" class="d-inline-block align-top">
           
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
    <ul class="navbar-nav align-items-center">
        <li class="nav-item">
            <span class="nav-link text-white">Welcome, <strong>{{session("user.firstname")}}</strong></span>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="javascript:void(0)" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user-circle fa-lg"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="/dashboard"><i class="fas fa-home me-2"></i>Home</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="/logout"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
            </ul>
        </li>
    </ul>
</div>
    </div>
</nav>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

    body {
        font-family: 'Poppins', sans-serif;
    }

    .navbar {
        position: sticky;
        top: 0;
        background: linear-gradient(135deg, #24243e 0%, #302b63 50%, #0f0c29 100%);
        box-shadow: 0 4px 6px rgba(0,0,0,.1);
        padding: 0.5rem 1rem;
        z-index: 1030;
        width: 100%;
    }
    .nav-item.dropdown {
    position: static; /* Reset position */
}
.dropdown-menu.show {
    display: block;
    animation: dropdownFade 0.2s ease-in-out;
}
.navbar-nav {
    position: relative;
    z-index: 1030;
}



/* handle any potential overlay issues */
.dropdown-menu-end {
    right: 0;
    left: auto;
}
img{
    margin-left: 10px;
}

    .navbar-brand {
        font-weight: 600;
        letter-spacing: 1px;
    }

    .brand-text {
        font-size: 1.2rem;
        margin-left: 0.5rem;
        vertical-align: middle;
    }

    .nav-link {
        font-weight: 500;
        transition: color 0.3s ease, transform 0.3s ease;
        padding: 0.5rem 1rem;
    }

    .nav-link:hover {
        color: #ffd700 !important;
        transform: translateY(-2px);
    }

    .dropdown-menu {
        border: none;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        border-radius: 0.5rem;
    }

    .dropdown-item {
        padding: 0.75rem 1.5rem;
        transition: background-color 0.3s ease, color 0.3s ease;
        font-weight: 500;
    }

    .dropdown-item:hover {
        background-color: #f0f0f0;
        color: #302b63;
    }

    #menu-toggle {
        padding: 0.375rem 0.75rem;
        font-size: 1.25rem;
        line-height: 1;
        background-color: transparent;
        border: 1px solid rgba(255,255,255,0.1);
        border-radius: 0.25rem;
        transition: all 0.3s ease;
    }

    #menu-toggle:hover {
        color: #ffd700;
        border-color: #ffd700;
        transform: scale(1.05);
    }

    .navbar-toggler {
        border-color: rgba(255,255,255,0.1);
    }

    .navbar-toggler:focus {
        box-shadow: 0 0 0 0.25rem rgba(255,255,255,0.1);
    }

    @media (max-width: 991.98px) {
        .navbar-brand {
            margin-right: auto;
            margin-left: 1rem;
        }
    }
</style>