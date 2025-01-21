<!DOCTYPE html>
<html lang="en" style="position: relative; min-height: 100%;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>News & Updates</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ URL::asset('css/ClientCSS/app.css') }}">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
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
        .news-container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            overflow: hidden;
            transition: transform 0.3s ease;
            cursor: pointer;
        }
        .news-container:hover {
            transform: translateY(-5px);
        }
        .news-image {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }
        .news-content {
            padding: 20px;
        }
        .news-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 15px;
            color: #333;
        }
        .news-text {
            font-size: 1rem;
            color: #666;
            line-height: 1.6;
        }
        .section-title {
            text-align: center;
            margin-bottom: 40px;
            font-weight: 600;
            color: #333;
        }
        .modal-dialog {
            max-width: 800px;
        }
        .modal-content {
            border-radius: 10px;
        }
        .modal-header {
            border-bottom: none;
            padding-bottom: 0;
        }
        .modal-body {
            padding-top: 0;
        }
        .modal-title {
            font-weight: 600;
            color: #333;
        }
    </style>
</head>

<body>
    @include('inc.client_nav')

    <div class="container mt-5">
    <h1 class="text-4xl font-bold mb-8 text-gray-800">News & Updates</h1>
        <div id="newsContainer" class="row">
            <!-- News items will be dynamically inserted here -->
        </div>
    </div>

    <!-- Modal for full article -->
    <div class="modal fade" id="articleModal" tabindex="-1" role="dialog" aria-labelledby="articleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="articleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img id="modalImage" src="" alt="" class="img-fluid mb-3">
                    <div id="modalContent"></div>
                </div>
            </div>
        </div>
    </div>

    @include('inc.footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
    <script>
     $(document).ready(function() {
    function createNewsItem(item, index) {
        const isEven = index % 2 === 0;
        return `
            <div class="col-12 news-container mb-4" data-id="${item.id}">
                <div class="row">
                    <div class="col-md-6 ${isEven ? 'order-md-1' : 'order-md-2'}">
                        <img src="/api/serve/${item.id}" alt="${item.title}" class="img-fluid news-image">
                    </div>
                    <div class="col-md-6 ${isEven ? 'order-md-2' : 'order-md-1'}">
                        <div class="news-content">
                            <h4 class="news-title">${item.title}</h4>
                            <p class="news-text">${item.content}</p>
                            <button class="btn btn-primary read-more">Read More</button>
                        </div>
                    </div>
                </div>
            </div>
        `;
    }

    function displayRecentNews() {
        $.ajax({
            url: '/api/news',
            method: 'GET',
            success: function(newsItems) {
                const newsContainer = $('#newsContainer');
                newsContainer.empty();

                if (newsItems.length === 0) {
                    newsContainer.html(`
                        <div class="col-12 text-center">
                            <h3>No News Available</h3>
                            <p>There are currently no news items to display. Please check back later.</p>
                        </div>
                    `);
                } else {
                    newsItems.forEach((item, index) => {
                        newsContainer.append(createNewsItem(item, index));
                    });
                }
            },
            error: function(error) {
                console.error('Error fetching recent news items:', error);
                $('#newsContainer').html(`
                    <div class="col-12 text-center">
                        <h3>Error Loading News</h3>
                        <p class="text-danger">There was a problem loading the news. Please try again later.</p>
                    </div>
                `);
            }
        });
    }

    displayRecentNews();

    // Handle click event on "Read More" buttons
    $('#newsContainer').on('click', '.read-more', function(e) {
        e.stopPropagation();
        const newsItem = $(this).closest('.news-container');
        const id = newsItem.data('id');
        
        $.ajax({
            url: `/api/news/${id}`,
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
    });

    // Optional: Add a refresh button to fetch the latest news
    $('#refreshNewsButton').click(function() {
        displayRecentNews();
    });
});
    </script>
</body>

</html>