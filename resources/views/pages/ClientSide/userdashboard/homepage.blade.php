<!DOCTYPE html>
<html lang="en" style="position: relative;min-height: 100%;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js"></script>
    

    <style>
/* Base Styles */
body {
    font-family: 'Poppins', sans-serif;
}

/* Navigation Styles */
.navbar {
    background-color: #ffffff;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.navbar-light .navbar-nav .nav-link {
    color: #1a5f7a;
    font-weight: 500;
    padding: 10px 15px;
    transition: all 0.3s ease;
}

.navbar-light .navbar-nav .nav-link:hover {
    color: #0056b3;
    background-color: rgba(0,0,0,0.05);
}

#mainCarousel {
    margin-bottom: 40px;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
}

#mainCarousel .carousel-item {
    height: 600px;
    position: relative;
}

#mainCarousel .carousel-item img {
    height: 100%;
    object-fit: cover;
    object-position: center;
}

#mainCarousel .overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    
    z-index: 1;
}

#mainCarousel .carousel-caption {
    bottom: 50%;
    transform: translateY(50%);
    padding: 0 100px;
    z-index: 2;
}

#mainCarousel .carousel-caption h1 {
    font-family: 'Poppins', sans-serif;
    font-size: 3.5rem;
    font-weight: 700;
    margin-bottom: 1rem;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
}

#mainCarousel .carousel-caption .lead {
    font-size: 1.8rem;
    font-weight: 500;
    margin-bottom: 1rem;
    text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
}

#mainCarousel .caption-description {
    font-size: 1.2rem;
    max-width: 800px;
    margin: 0 auto;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
}

#mainCarousel .carousel-indicators {
    bottom: 30px;
}

#mainCarousel .carousel-indicators li {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    margin: 0 5px;
    background-color: rgba(255, 255, 255, 0.5);
    transition: all 0.3s ease;
}

#mainCarousel .carousel-indicators .active {
    width: 30px;
    border-radius: 6px;
    background-color: #fff;
}

#mainCarousel .carousel-control-prev,
#mainCarousel .carousel-control-next {
    width: 50px;
    height: 50px;
    background-color: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    top: 50%;
    transform: translateY(-50%);
    margin: 0 30px;
}

#mainCarousel .carousel-control-prev:hover,
#mainCarousel .carousel-control-next:hover {
    background-color: rgba(255, 255, 255, 0.3);
}

/* Responsive adjustments */
@media (max-width: 768px) {
    #mainCarousel .carousel-item {
        height: 400px;
    }

    #mainCarousel .carousel-caption {
        padding: 0 20px;
    }

    #mainCarousel .carousel-caption h1 {
        font-size: 2rem;
    }

    #mainCarousel .carousel-caption .lead {
        font-size: 1.2rem;
    }

    #mainCarousel .caption-description {
        font-size: 1rem;
    }

    #mainCarousel .carousel-control-prev,
    #mainCarousel .carousel-control-next {
        width: 40px;
        height: 40px;
        margin: 0 10px;
    }
}

/* Quick Links Section */
.quick-links {
    position: relative;
    z-index: 10;
    padding: 40px 0;
    margin-top: 0;
    background-color: #f8f9fa;
}

.quick-link-item {
    text-align: center;
    padding: 20px;
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
}

.quick-link-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.quick-link-item i {
    font-size: 2.5rem;
    color: #1a5f7a;
    margin-bottom: 15px;
}

.quick-link-item h4 {
    font-size: 1.2rem;
    font-weight: 600;
    color: #333;
}

.quick-link-item p {
    font-size: 0.9rem;
    color: #666;
}

/* News Slider Styles */
.news-slider {
            position: relative;
            height: 350px;
            overflow: hidden;
            margin: 0 15px 20px; /* Added side margins */
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

.news-slide {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    transition: opacity 0.5s ease-in-out;
}

.news-slide.active {
    opacity: 1;
}

.news-content {
    position: absolute;
    bottom: 20px;
    left: 20px;
    right: 20px;
    color: white;
    background-color: rgba(0, 0, 0, 0.6);
    padding: 20px;
    border-radius: 5px;
}

.news-content h3 {
    font-size: 1.5rem;
    margin-bottom: 10px;
}

.news-content p {
    font-size: 1rem;
    margin-bottom: 15px;
}
.news-controls {
    position: absolute;
    bottom: 10px;
    right: 20px;
    z-index: 10;
}

.news-nav {
    background-color: rgba(255, 255, 255, 0.7);
    border: none;
    padding: 5px 10px;
    margin-left: 5px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.news-nav:hover {
    background-color: rgba(255, 255, 255, 0.9);
}

/* Calendar Styles */
#calendar-container {
    margin-bottom: 20px;
    max-width: 350px;
}

#calendar-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
}

#current-month-year {
    font-weight: bold;
    font-size: 1.2em;
}

#calendar {
    margin-bottom: 20px;
}

#calendar table {
    width: 100%;
    font-size: 0.9em;
}

#calendar th,
#calendar td {
    padding: 5px;
    text-align: center;
}

.calendar-day {
    position: relative;
    height: 30px;
    width: 30px;
    line-height: 30px;
    cursor: pointer;
    font-size: 0.8em;
}

.calendar-day.has-event::after {
    content: '';
    position: absolute;
    bottom: 2px;
    left: 50%;
    transform: translateX(-50%);
    width: 6px;
    height: 6px;
    background-color: #1a5f7a;
    border-radius: 50%;
}

.calendar-day.active {
    background-color: #e6f3ff;
}

/* Card Styles */
.card {
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
}

.card-title {
    color: #1a5f7a;
    font-size: 1.5rem;
    font-weight: 600;
    margin-bottom: 20px;
}

/* Stats Card Styles */
 /* Legislative Activities Section Styles */
 .stats-card {
            transition: all 0.3s ease;
            background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%);
            border: 1px solid rgba(0, 0, 0, 0.1);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .stats-number {
            font-size: 2.5rem;
            line-height: 1.2;
            color: #2d3748;
            font-weight: 600;
        }

        .stats-icon {
            height: 48px;
            width: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
        }

        .bg-gradient-light {
            background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%);
        }

        .border-4 {
            border-width: 4px !important;
        }

        .table th {
            font-weight: 600;
            color: #4a5568;
            border-top: none;
            white-space: nowrap;
        }

        .table td {
            vertical-align: middle;
            color: #2d3748;
            padding: 1rem;
        }

        .table tr:hover {
            background-color: rgba(26, 95, 122, 0.05);
            cursor: pointer;
        }

        .badge {
            padding: 0.5em 1em;
            font-weight: 500;
            letter-spacing: 0.3px;
        }

        .badge-pill {
            border-radius: 50rem;
        }

        .title-tooltip {
            position: relative;
            cursor: help;
        }

        .title-tooltip:hover::after {
            content: attr(data-full-title);
            position: absolute;
            left: 0;
            top: 100%;
            background: #333;
            color: white;
            padding: 8px 12px;
            border-radius: 6px;
            font-size: 14px;
            z-index: 1000;
            width: max-content;
            max-width: 300px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-group .btn-outline-secondary {
            border-color: #dee2e6;
            color: #6c757d;
            font-weight: 500;
        }

        .btn-group .btn-outline-secondary.active {
            background-color: #1a5f7a;
            border-color: #1a5f7a;
            color: white;
        }

        .btn-group .btn-outline-secondary:hover:not(.active) {
            background-color: #f8f9fa;
            border-color: #dee2e6;
            color: #1a5f7a;
        }

        /* Animation for status badges */
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        .badge-success {
            animation: pulse 2s infinite;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .stats-card {
                margin-bottom: 1rem;
            }
            
            .stats-number {
                font-size: 2rem;
            }
            
            .table-responsive {
                margin: 0 -1rem;
            }
            
            .btn-group {
                display: none;
            }

            .title-tooltip:hover::after {
                display: none;
            }
        }

        /* Card hover effects */
        .stats-card:hover .stats-icon i {
            transform: scale(1.1);
            transition: transform 0.3s ease;
        }

        /* Table row hover animation */
        .table tbody tr {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .table tbody tr:hover {
            transform: translateX(5px);
            box-shadow: -5px 0 10px rgba(0, 0, 0, 0.05);
        }

/* Button & Badge Styles */
.btn-primary {
    background-color: #1a5f7a;
    border-color: #1a5f7a;
}

.btn-primary:hover {
    background-color: #164d63;
    border-color: #164d63;
}

.btn-read-more {
    display: inline-block;
    background-color: #1a5f7a;
    color: white;
    padding: 8px 15px;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.btn-read-more:hover {
    background-color: #0056b3;
    color: white;
}

.badge {
    padding: 0.5em 1em;
}

.badge-primary {
    background-color: #1a5f7a;
    color: white;
}

.badge-success {
    background-color: #28a745;
    color: white;
}

/* Event Styles */
.events-card {
    height: 100%;
}

.event-item {
    margin-bottom: 5px;
    padding: 5px;
    border-bottom: 1px solid #eee;
    border-radius: 4px;
    background-color: #f8f9fa;
}

.event-title {
    font-weight: bold;
    color: #1a5f7a;
    margin-bottom: 5px;
}

.event-time,
.event-date {
    font-size: 0.7em;
    color: #666;
}

/* Table Styles */
.table-responsive {
    margin-bottom: 1rem;
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    border-radius: 0.5rem;
}

.table th {
    background-color: #f8f9fa;
    border-top: none;
}

.table td,
.table th {
    padding: 1rem;
    vertical-align: middle;
}

/* Title & Tooltip Styles */
.truncated-title {
    max-width: 300px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    display: block;
}

.title-tooltip {
    position: relative;
    display: inline-block;
}

.title-tooltip:hover::after {
    content: attr(data-full-title);
    position: absolute;
    left: 0;
    top: 100%;
    background: #333;
    color: white;
    padding: 5px 10px;
    border-radius: 4px;
    font-size: 14px;
    z-index: 1000;
    white-space: normal;
    max-width: 300px;
    word-wrap: break-word;
}

/* Utility Classes */
.text-sm {
    font-size: 0.875rem;
}

.hover\:underline:hover {
    text-decoration: underline;
}

.cursor-pointer {
    cursor: pointer;
}

/* Responsive Styles */
@media (max-width: 768px) {
    .card-title {
        font-size: 1.3rem;
    }
    
    #calendar-container {
        max-width: 100%;
    }
    
    .news-slider {
        height: 300px;
    }
    
    .container .carousel {
        margin-bottom: 20px;
    }
    
    .quick-links {
        padding: 20px 0;
    }
    
    .carousel-caption {
        bottom: 10%;
        padding-bottom: 15px;
    }
}
    </style>

</head>

<body class="bg-gray-100">
    
    
@include('inc.client_nav')
    <!-- Carousel -->
    <div class="container mt-4">
    <div id="mainCarousel" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#mainCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#mainCarousel" data-slide-to="1"></li>
            <li data-target="#mainCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="overlay"></div>
                <img src="{{ URL::to('images/one.jpg') }}" class="d-block w-100" alt="Sangguniang Bayan Session Hall">
                <div class="carousel-caption">
                    <h1 class="display-4 font-weight-bold">17th Sangguniang Bayan of Dagohoy</h1>
                    <p class="lead">Legislative Excellence in Public Service</p>
                    <div class="caption-description">
                        Committed to creating meaningful legislation for the progress of Dagohoy
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="overlay"></div>
                <img src="{{ URL::to('images/two.jpg') }}" class="d-block w-100" alt="Regular Session">
                <div class="carousel-caption">
                    <h1 class="display-4 font-weight-bold">Regular Sessions</h1>
                    <p class="lead">Every Monday, 9:00 AM</p>
                    <div class="caption-description">
                        Join us at the Session Hall for our weekly legislative proceedings
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="overlay"></div>
                <img src="{{ URL::to('images/five.jpg') }}" class="d-block w-100" alt="Public Service">
                <div class="carousel-caption">
                    <h1 class="display-4 font-weight-bold">Public Service</h1>
                    <p class="lead">Serving the People of Dagohoy</p>
                    <div class="caption-description">
                        Crafting ordinances and resolutions for the betterment of our community
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#mainCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#mainCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
    <section class="quick-links">
        <div class="container">
            <div class="row">
               <div class="col-md-3 quick-link-item">
                    <a href="/management/news">
                    <i class="fas fa-newspaper"></i>
                        <h4>News & Updates</h4>
                        <p>View latest news & updates</p>
                    </a>
                </div> 
                <div class="col-md-3 quick-link-item">
                    <a href="/management/docs">
                        <i class="fas fa-file-alt"></i>
                        <h4>Legislatures</h4>
                        <p>Access all legislative documents</p>
                    </a>
                </div>
                <div class="col-md-3 quick-link-item">
                    <a href="/management/schedules">
                        <i class="fas fa-calendar-alt"></i>
                        <h4>Session Schedule</h4>
                        <p>View upcoming SB sessions</p>
                    </a>
                </div>
                <div class="col-md-3 quick-link-item">
                    <a href="/management/info">
                        <i class="fas fa-users"></i>
                        <h4>SB Members</h4>
                        <p>Meet your local legislators</p>
                    </a>
                </div>
            </div>
        </div>
    </section>
      <!-- News and Announcements -->
<div class="container my-5">
    <div class="row">
        <!-- News Section -->
        <div class="col-md-8">
            <div class="card content-card h-100"> <!-- Added h-100 class for full height -->
                <div class="card-body p-0 d-flex flex-column"> <!-- Added d-flex and flex-column -->
                    <div class="d-flex justify-content-between align-items-center p-3 border-bottom">
                        <h2 class="card-title mb-0">Latest News & Updates</h2>
                        <a href="/management/news" class="text-primary text-sm hover:underline">View All News</a>
                    </div>
                    <div id="news-slider" class="news-slider flex-grow-1"> <!-- Added flex-grow-1 -->
                        <!-- News slides will be dynamically inserted here -->
                    </div>
                    
                </div>
            </div>
        </div>

        <!-- Events Section -->
        <div class="col-md-4">
            <div class="card content-card h-100"> <!-- Added h-100 class for full height -->
                <div class="card-body p-0 d-flex flex-column"> <!-- Added d-flex and flex-column -->
                    <div class="d-flex justify-content-between align-items-center p-3 border-bottom">
                        <h2 class="card-title mb-0">Upcoming Events</h2>
                        <a href="/management/schedules" class="text-primary text-sm hover:underline">See All Events</a>
                    </div>
                    <div id="calendar-container" class="px-4 pt-3 flex-grow-1"> <!-- Added flex-grow-1 -->
                        <div id="calendar-header" class="d-flex justify-content-between align-items-center mb-2">
                            <button id="prev-month" class="btn btn-sm btn-outline-secondary">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <span id="current-month-year" class="font-weight-bold"></span>
                            <button id="next-month" class="btn btn-sm btn-outline-secondary">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                        <div id="calendar" class="mb-3"></div>
                    </div>
                    <div id="events-list" class="px-4 pb-4">
                        <!-- Single event will be displayed here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Legislative Activities Section -->
<section class="container my-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-white border-bottom-0 pt-4 px-4">
            <h2 class="card-title mb-0">Legislative Activities Dashboard</h2>
            <p class="text-muted mt-2">Track the progress and impact of our legislative work</p>
        </div>
        <div class="card-body p-4">
            <!-- Legislative Statistics Cards -->
            <div class="row g-4 mb-4">
                <!-- Ordinances Card -->
                <div class="col-md-6 col-lg-3">
                    <div class="stats-card h-100 rounded-lg p-4 bg-gradient-light border-start border-light border-4">
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <h4 class="text-reset font-weight-bold mb-1">Ordinances</h4>
                                <div class="stats-number display-4 font-weight-bold text-dark" id="ordinanceCount">-</div>
                            </div>
                            <div class="stats-icon">
                                <i class="fas fa-book-open fa-2x text-primary opacity-75"></i>
                            </div>
                        </div>
                        <div class="stats-info">
                            <p class="text-muted mb-2">Passed this year</p>
                            <a href="/management/docs?type=ordinance" class="btn btn-outline-primary btn-sm">
                                View Details <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Resolutions Card -->
                <div class="col-md-6 col-lg-3">
                    <div class="stats-card h-100 rounded-lg p-4 bg-gradient-light border-start border-light border-4">
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <h4 class="text-reset font-weight-bold mb-1">Resolutions</h4>
                                <div class="stats-number display-4 font-weight-bold text-dark" id="resolutionCount">-</div>
                            </div>
                            <div class="stats-icon">
                                <i class="fas fa-scroll fa-2x text-success opacity-75"></i>
                            </div>
                        </div>
                        <div class="stats-info">
                            <p class="text-muted mb-2">Passed this year</p>
                            <a href="/management/docs?type=resolution" class="btn btn-outline-success btn-sm">
                                View Details <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Committee Meetings Card -->
                <div class="col-md-6 col-lg-3">
                    <div class="stats-card h-100 rounded-lg p-4 bg-gradient-light border-start border-light border-4">
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <h4 class="text-reset font-weight-bold mb-1">Committee Meetings</h4>
                                <div class="stats-number display-4 font-weight-bold text-dark" id="meetingCount">-</div>
                            </div>
                            <div class="stats-icon">
                                <i class="fas fa-users fa-2x text-info opacity-75"></i>
                            </div>
                        </div>
                        <div class="stats-info">
                            <p class="text-muted mb-2">This month</p>
                            <a href="/management/schedules" class="btn btn-outline-info btn-sm">
                                View Schedule <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Public Hearings Card -->
                <div class="col-md-6 col-lg-3">
                    <div class="stats-card h-100 rounded-lg p-4 bg-gradient-light border-start border-light border-4">
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <h4 class="text-reset font-weight-bold mb-1">Public Hearings</h4>
                                <div class="stats-number display-4 font-weight-bold text-dark" id="hearingCount">-</div>
                            </div>
                            <div class="stats-icon">
                                <i class="fas fa-comments fa-2x text-warning opacity-75"></i>
                            </div>
                        </div>
                        <div class="stats-info">
                            <p class="text-muted mb-2">Scheduled</p>
                            <a href="/management/schedules?type=hearing" class="btn btn-outline-warning btn-sm">
                                View Schedule <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Legislative Items -->
            <div class="recent-items mt-5">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="text-dark font-weight-bold mb-0">Recently Passed Legislation</h3>
                    <div class="btn-group">
                        <button type="button" class="btn btn-outline-secondary btn-sm active" data-filter="all">
                            All
                        </button>
                        <button type="button" class="btn btn-outline-secondary btn-sm" data-filter="ordinance">
                            Ordinances
                        </button>
                        <button type="button" class="btn btn-outline-secondary btn-sm" data-filter="resolution">
                            Resolutions
                        </button>
                    </div>
                </div>
                <div class="table-responsive shadow-sm rounded">
                    <table class="table table-hover mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="py-3" style="width: 15%">Reference No.</th>
                                <th class="py-3" style="width: 45%">Title</th>
                                <th class="py-3" style="width: 15%">Type</th>
                                <th class="py-3" style="width: 15%">Date Passed</th>
                                <th class="py-3 text-center" style="width: 10%">Status</th>
                            </tr>
                        </thead>
                        <tbody id="legislatureTableBody">
                            <tr>
                                <td colspan="5" class="text-center py-4">
                                    <div class="spinner-border text-primary" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="text-center mt-4">
                    <a href="/management/docs" class="btn btn-primary">
                        View Complete Legislative Archive
                        <i class="fas fa-external-link-alt ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    </section>

    <br><br>

   @include('inc.footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    
    <script>
        $(document).ready(function() {
            let valueID = 0;
            function createNewsSlide(item, index) {
                return `
                    <div class="news-slide ${index === 0 ? 'active' : ''}" data-id="${item.id}">
                        <img src="/api/serve/${item.id}" alt="${item.title}" style="width: 100%; height: 100%; object-fit: cover;">
                        <div class="news-content">
                            <h3>${item.title}</h3>
                            <p>${item.content.substring(0, 100)}...</p>
                            <a href="javascriptvoid(0)" class="btn-read-more" >READ MORE</a>
                        </div>
                    </div>
                `;
            }

            function createSliderNav(count) {
                let navDots = '';
                for (let i = 0; i < count; i++) {
                    navDots += `<span class="${i === 0 ? 'active' : ''}"></span>`;
                }
                return `<div class="slider-nav">${navDots}</div>`;
            }

            function displayRecentNews() {
                $.ajax({
                    url: '/api/news',
                    method: 'GET',
                    success: function(newsItems) {
                        const newsSlider = $('#news-slider');
                        newsSlider.empty();

                        if (newsItems.length === 0) {
                            newsSlider.html(`
                                <div class="news-slide active">
                                    <div class="news-content">
                                        <h3>No News Available</h3>
                                        <p>There are currently no news items to display. Please check back later.</p>
                                    </div>
                                </div>
                            `);
                        } else {
                            newsItems.slice(0, 5).forEach((item, index) => {
                                newsSlider.append(createNewsSlide(item, index));
                            });
                            newsSlider.append(createSliderNav(Math.min(newsItems.length, 5)));
                        }

                        setupSlideshow();
                    },
                    error: function(error) {
                        console.error('Error fetching recent news items:', error);
                        $('#news-slider').html(`
                            <div class="news-slide active">
                                <div class="news-content">
                                    <h3>Error Loading News</h3>
                                    <p>There was a problem loading the news. Please try again later.</p>
                                </div>
                            </div>
                        `);
                    }
                });
            }

            function setupSlideshow() {
                const slides = document.querySelectorAll('.news-slide');
                const btn = document.querySelectorAll('.btn-read-more');
                const navDots = document.querySelectorAll('.slider-nav span');
                let currentSlide = 0;

                function showSlide(n) {
                    slides[currentSlide].classList.remove('active');
                    navDots[currentSlide].classList.remove('active');
                   // btn[currentSlide].setAttribute("href", "/management/news?id="+valueID);
                    currentSlide = (n + slides.length) % slides.length;
                    slides[currentSlide].classList.add('active');
                    navDots[currentSlide].classList.add('active');
                    
                    var currentData = slides[currentSlide].getAttribute('data-id');
                    valueID = currentData;
                     $('.btn-read-more').attr('href', `/management/news?id=${valueID}`)
                    //btn[currentSlide].setAttribute("href", "/management/news?id="+valueID);
                    console.log(valueID);
                    
                    //btn[currentSlide]
                }

                function nextSlide() {
                    showSlide(currentSlide + 1);
                }

                navDots.forEach((dot, index) => {
                    dot.addEventListener('click', () => showSlide(index));
                });

                setInterval(nextSlide, 5000);
            }

            displayRecentNews();

             // Function to open the article modal
    function openArticleModal(id) {
        $.ajax({
            url: `/management/news?id=${id}`,
            method: 'GET',
            success: function(item) {
                $('#articleModalLabel').text(item.title);
                $('#modalImage').attr('src', `/api/serve/${item.id}`).attr('alt', item.title);
                $('#modalContent').html(item.full_content);
                $('#articleModal').modal('show');
            },
                 error: function(error) {
                console.error('Error fetching full news item:', error);
                alert('Error loading the full article. Please try again later.');
             }
            });
        }

        // Check if there's an ID in the URL parameters
        const urlParams = new URLSearchParams(window.location.search);
        const newsId = valueID;
       // console.log(newsId+" sadajdk") //debug purposes
        if (newsId) {
            // If there's an ID, open the corresponding article modal
            openArticleModal(newsId);
        }
        // Update the click event handler for "Read More" buttons
        $('.btn-read-more').on('click', '.btn-read-more', function(e) {
            e.preventDefault();
            //openArticleModal(valueID);
            console.log(valueID);
           
        });
          
        
    let events = [];
    let currentDate = moment();

    function renderCalendar(year, month) {
    var firstDay = moment([year, month]);
    var lastDay = moment(firstDay).endOf('month');
    
    $('#current-month-year').text(firstDay.format('MMMM YYYY'));
    
    var calendarHtml = '<table class="table table-bordered">';
    calendarHtml += '<thead><tr><th>S</th><th>M</th><th>T</th><th>W</th><th>TH</th><th>F</th><th>S</th></tr></thead>';
    calendarHtml += '<tbody>';
    
    // Start from the last Monday of the previous month if necessary
    var date = moment(firstDay).startOf('week');
    
    // Generate 6 weeks to ensure we always have enough rows
    for (var week = 0; week < 6; week++) {
        calendarHtml += '<tr>';
        for (var day = 0; day < 7; day++) {
            var className = date.month() === month ? 'calendar-day' : 'calendar-day text-muted';
            if (hasEvent(date)) className += ' has-event';
            
            calendarHtml += `<td class="${className}" data-date="${date.format('YYYY-MM-DD')}">${date.date()}</td>`;
            
            date.add(1, 'day');
        }
        calendarHtml += '</tr>';
        
        // If we've gone past the end of the month and completed the week, we can stop
        if (date.month() !== month && date.day() === 1) break;
    }
    
    calendarHtml += '</tbody></table>';
    $('#calendar').html(calendarHtml);

    // Add click event to calendar days
    $('.calendar-day').click(function() {
        $('.calendar-day').removeClass('active');
        $(this).addClass('active');
        var clickedDate = $(this).data('date');
        showEventsForDate(clickedDate);
    });
}
    function hasEvent(date) {
        return events.some(event => moment(event.start).isSame(date, 'day'));
    }

    function showEventsForDate(dateString) {
        var eventsOnDay = events.filter(event => moment(event.start).isSame(dateString, 'day'));
        updateEventsList(eventsOnDay);
    }

    function updateEventsList(eventsToShow, isMonthView = false) {
        var eventsHtml = "";
        
        // Get events for the current month view
        let currentMonthEvents = events.filter(event => 
            moment(event.start).isSame(currentDate, 'month')
        );

        // Sort events by date
        currentMonthEvents.sort((a, b) => moment(a.start).valueOf() - moment(b.start).valueOf());

        if (isMonthView) {
            // Show all events for the month
            if (currentMonthEvents.length === 0) {
                eventsHtml = "<p>No events for this month.</p>";
            } else {
                // Show up to 5 upcoming events for the month
                const eventsToDisplay = currentMonthEvents.slice(0, 5);
                eventsHtml = eventsToDisplay.map(event => {
                    var startDate = moment(event.start);
                    return `
                        <div class="event-item">
                            <div class="event-title">${event.title}</div>
                            <div class="event-time">${startDate.format('h:mm A')}</div>
                            <div class="event-date">${startDate.format('D MMMM YYYY')}</div>
                        </div>
                    `;
                }).join('');

                if (currentMonthEvents.length > 5) {
                    eventsHtml += `
                        <div class="text-muted mt-2">
                            <small>+ ${currentMonthEvents.length - 5} more events this month</small>
                        </div>
                    `;
                }
            }
        } else {
                //temp solution for defaul loading of events
            eventsHtml = "<p>No events for this month.</p>";
            // Show events for selected date
            // if (eventsToShow.length === 0) {
            //     eventsHtml = "<p>No events on this date.</p>";
            // } else {
            //     // Only show the first event
            //     const event = eventsToShow[0];
            //     var startDate = moment(event.start);
            //     eventsHtml = `
            //         <div class="event-item">
            //             <div class="event-title">${event.title}</div>
            //             <div class="event-time">${startDate.format('h:mm A')}</div>
            //             <div class="event-date">${startDate.format('D MMMM YYYY')}</div>
            //             ${eventsToShow.length > 1 ? 
            //                 `<div class="text-muted mt-2">
            //                     <small>+ ${eventsToShow.length - 1} more event${eventsToShow.length > 2 ? 's' : ''} on this date</small>
            //                 </div>` 
            //                 : ''
            //             }
            //         </div>
            //     `;
            // }
        }
        $('#events-list').html(eventsHtml);
    }

    function changeMonth(delta) {
        currentDate.add(delta, 'month');
        renderCalendar(currentDate.year(), currentDate.month());
        // Update events list with month view when changing months
        updateEventsList([], true);
    }

    $('#prev-month').click(function() {
        changeMonth(-1);
    });

    $('#next-month').click(function() {
        changeMonth(1);
    });

    renderCalendar(currentDate.year(), currentDate.month());

    $.ajax({
        url: '/api/events',
        method: 'GET',
        success: function(fetchedEvents) {
            events = fetchedEvents;
            renderCalendar(currentDate.year(), currentDate.month());
            updateEventsList(events);
        },
        error: function(error) {
            console.error('Error fetching events:', error);
            $('#events-list').html('<p>Error loading events. Please try again later.</p>');
        }
    });


    //Legislatures Section Script
   // Function to format date
   function formatDate(dateString) {
        return moment(dateString).format('MMM DD, YYYY');
    }

    // Function to capitalize first letter
    function capitalizeFirstLetter(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
    }

    // Function to truncate text
    function truncateTitle(title, maxLength = 50) {
        if (title.length <= maxLength) return title;
        return `<span class="title-tooltip" data-full-title="${title}">
                    <span class="truncated-title">${title.substring(0, maxLength)}...</span>
                </span>`;
    }
    loadLegislatureStats();
    loadRecentLegislatures();
   

    // Enhanced loadRecentLegislatures function
    function loadRecentLegislatures() {
                $.ajax({
                    url: '/documents/recent',
                    method: 'GET',
                    success: function(response) {
                        const tableBody = $('#legislatureTableBody');
                        tableBody.empty();

                        if (response.length === 0) {
                            tableBody.html(`
                                <tr>
                                    <td colspan="5" class="text-center py-4">
                                        <i class="fas fa-inbox fa-2x text-muted mb-2"></i>
                                        <p class="text-muted mb-0">No recent legislative items found</p>
                                    </td>
                                </tr>
                            `);
                            return;
                        }

                        response.forEach(function(item) {
                            const row = `
                                <tr class="legislature-item" data-type="${item.type.toLowerCase()}" onclick="window.location='/management/docs?id=${item.id}'">
                                    <td class="font-weight-medium">${item.id || '-'}</td>
                                    <td>
                                        ${truncateTitle(item.title)}
                                        ${item.priority ? '<span class="badge badge-danger badge-pill ms-2">Priority</span>' : ''}
                                    </td>
                                    <td>
                                        <span class="badge ${item.type.toLowerCase() === 'ordinance' ? 'badge-primary' : 'badge-success'} badge-pill">
                                            ${capitalizeFirstLetter(item.type)}
                                        </span>
                                    </td>
                                    <td>${formatDate(item.date_published)}</td>
                                    <td class="text-center">
                                        <span class="badge badge-success badge-pill">
                                            <i class="fas fa-check-circle me-1"></i> Passed
                                        </span>
                                    </td>
                                </tr>
                            `;
                            tableBody.append(row);
                        });
                    },
                    error: function(error) {
                        console.error('Error fetching recent legislatures:', error);
                        $('#legislatureTableBody').html(`
                            <tr>
                                <td colspan="5" class="text-center py-4">
                                    <i class="fas fa-exclamation-triangle fa-2x text-warning mb-2"></i>
                                    <p class="text-muted mb-0">Error loading data. Please try again later.</p>
                                </td>
                            </tr>
                        `);
                    }
                });
            }

            // Enhanced loadLegislatureStats function with animation
            function loadLegislatureStats() {
                $.ajax({
                    url: '/documents/stats',
                    method: 'GET',
                    success: function(response) {
                        animateNumber('#ordinanceCount', response.ordinances || 0);
                        animateNumber('#resolutionCount', response.resolutions || 0);
                        animateNumber('#meetingCount', response.meetings || 0);
                        animateNumber('#hearingCount', response.hearings || 0);
                    },
                    error: function(error) {
                        console.error('Error fetching legislature stats:', error);
                        $('#ordinanceCount, #resolutionCount, #meetingCount, #hearingCount').text('--');
                    }
                });
            }

            // Number animation function
            function animateNumber(elementId, endValue) {
                const duration = 1500;
                const startValue = parseInt($(elementId).text()) || 0;
                const increment = (endValue - startValue) / (duration / 16);
                let currentValue = startValue;

                const animation = setInterval(() => {
                    currentValue += increment;
                    if ((increment > 0 && currentValue >= endValue) || 
                        (increment < 0 && currentValue <= endValue)) {
                        clearInterval(animation);
                        $(elementId).text(endValue);
                    } else {
                        $(elementId).text(Math.round(currentValue));
                    }
                }, 16);
            }

            // Enhanced title truncation with tooltip
            function truncateTitle(title, maxLength = 60) {
                if (!title) return '-';
                if (title.length <= maxLength) return escapeHtml(title);
                
                return `
                    <span class="title-tooltip" data-full-title="${escapeHtml(title)}">
                        ${escapeHtml(title.substring(0, maxLength))}...
                    </span>
                `;
            }

            // HTML escape function for security
            function escapeHtml(text) {
                const div = document.createElement('div');
                div.textContent = text;
                return div.innerHTML;
            }

            // Enhanced date formatting
            function formatDate(dateString) {
                if (!dateString) return '-';
                const date = moment(dateString);
                return date.isValid() ? date.format('MMM DD, YYYY') : '-';
            }

            // String capitalization with error handling
            function capitalizeFirstLetter(string) {
                if (!string) return '';
                return string.charAt(0).toUpperCase() + string.slice(1).toLowerCase();
            }

            // Filter functionality
            $('.btn-group .btn').on('click', function() {
                const filterValue = $(this).data('filter');
                
                // Update active state
                $('.btn-group .btn').removeClass('active');
                $(this).addClass('active');
                
                // Apply filter with animation
                if (filterValue === 'all') {
                    $('.legislature-item').fadeIn(300);
                } else {
                    $('.legislature-item').hide();
                    $(`.legislature-item[data-type="${filterValue}"]`).fadeIn(300);
                }
            });

            // Add hover effects for cards
            $('.stats-card').hover(
                function() {
                    $(this).find('.stats-icon i').addClass('fa-beat-fade');
                },
                function() {
                    $(this).find('.stats-icon i').removeClass('fa-beat-fade');
                }
            );

            // Initialize tooltips
            $('[data-toggle="tooltip"]').tooltip({
                boundary: 'window',
                trigger: 'hover'
            });

            // Smooth scroll functionality
            $('a[href^="#"]').on('click', function(e) {
                e.preventDefault();
                const target = $(this.getAttribute('href'));
                if (target.length) {
                    $('html, body').animate({
                        scrollTop: target.offset().top - 100
                    }, 500);
                }
            });

            // Enhanced error handling for images
            $('img').on('error', function() {
                $(this).attr('src', '/path/to/fallback-image.jpg')
                       .addClass('img-error');
            });

            // Responsive handling
            function handleResponsive() {
                if ($(window).width() < 768) {
                    $('.btn-group').addClass('btn-group-vertical');
                    $('.stats-card').removeClass('h-100');
                } else {
                    $('.btn-group').removeClass('btn-group-vertical');
                    $('.stats-card').addClass('h-100');
                }
            }

            // Call responsive handler on load and resize
            handleResponsive();
            $(window).on('resize', _.debounce(handleResponsive, 150));

            // Keyboard navigation
            $(document).on('keydown', function(e) {
                // Close tooltips on escape
                if (e.key === 'Escape') {
                    $('.tooltip').tooltip('hide');
                }

                // Handle arrow key navigation in table
                if (e.key.startsWith('Arrow')) {
                    const focusedRow = $('tr:focus');
                    if (focusedRow.length) {
                        e.preventDefault();
                        switch(e.key) {
                            case 'ArrowDown':
                                focusedRow.next('tr').focus();
                                break;
                            case 'ArrowUp':
                                focusedRow.prev('tr').focus();
                                break;
                        }
                    }
                }
            });

            // Loading state handling
            $(document)
                .ajaxStart(function() {
                    $('.stats-card').addClass('opacity-75');
                    $('.table-responsive').addClass('opacity-75');
                })
                .ajaxComplete(function() {
                    $('.stats-card').removeClass('opacity-75');
                    $('.table-responsive').removeClass('opacity-75');
                });

            // Initial load
           

            // Refresh data periodically
            setInterval(function() {
                loadLegislatureStats();
                loadRecentLegislatures();
            }, 300000); // Every 5 minutes

            // Error boundary
            window.onerror = function(msg, url, lineNo, columnNo, error) {
                console.error('Error: ' + msg + '\nURL: ' + url + '\nLine: ' + lineNo);
                return false;
            };

            
    $('#mainCarousel').carousel({
        interval: 3000,  // 5 seconds per slide
        pause: 'hover',  // Pause on mouse hover
        ride: 'carousel',
        keyboard: true   // Enable keyboard navigation
    });

    // Add smooth fade transition
    $('.carousel').carousel('cycle');

    // Optional: Add swipe support for mobile devices
    $("#mainCarousel").on("touchstart", function(event){
        const xClick = event.originalEvent.touches[0].pageX;
        $(this).one("touchmove", function(event){
            const xMove = event.originalEvent.touches[0].pageX;
            const sensitivityInPx = 5;

            if(Math.floor(xClick - xMove) > sensitivityInPx){
                $(this).carousel('next');
            }
            else if(Math.floor(xClick - xMove) < -sensitivityInPx){
                $(this).carousel('prev');
            }
        });
        $(this).on("touchend", function(){
            $(this).off("touchmove");
        });
    });

        });
    </script>
</body>

</html>