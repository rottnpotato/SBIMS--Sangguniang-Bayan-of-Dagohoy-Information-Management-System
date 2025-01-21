
<style>
:root {
    --primary-color: #1e3a8a;
    --secondary-color: #34d399;
    --text-color: #333333;
    --background-color: #f0f9ff;
}
.navbar {
            background-color: #ffffff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .navbar-light .navbar-nav .nav-link,.nav-title {
            color: #1a5f7a;
            font-weight: 500;
            padding: 10px 15px;
            transition: all 0.3s ease;
        }
        .navbar-light .navbar-nav .nav-link:hover {
            color: #0056b3;
            background-color: rgba(0,0,0,0.05);
        }
.nav-link,.nav-title {
    color: var(--primary-color) !important;
    font-weight: 100;
    transition: color 0.3s ease;
}

.nav-link:hover {
    color: var(--secondary-color) !important;
}


</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container">
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/management/home">Home</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="/management/news">News & Updates</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/management/docs">Legislatures</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/management/info">About SB</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/management/schedules">Schedules</a>
                    </li>
                </ul>
            </div>
        </div>
</nav>



