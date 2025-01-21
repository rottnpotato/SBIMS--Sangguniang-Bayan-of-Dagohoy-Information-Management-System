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
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Source+Sans+Pro:wght@400;600&display=swap');

        body {
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            font-family: 'Source Sans Pro', sans-serif;
        }

        .news-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
            background-color: #fff;
        }

        .news-slider {
            position: relative;
            background: #fff;
            padding: 30px;
            margin-bottom: 50px;
            border: 1px solid #e0e0e0;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        }
        .news-excerpt {
    text-align: justify;
    text-justify: inter-word;
}

        .slide {
            display: none;
            animation: fade 1.5s;
        }

        .slide.active {
            display: block;
        }

        @keyframes fade {
            from {opacity: .4} 
            to {opacity: 1}
        }

        .slide-content {
            display: flex;
            gap: 40px;
            align-items: center;
        }

        .slide-image {
            width: 400px;
            height: 300px;
            object-fit: cover;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .slide-text {
            flex: 1;
        }

        .slide-text h2 {
            font-family: 'Playfair Display', serif;
            color: #1a1a1a;
            margin-bottom: 20px;
            font-size: 2.2em;
            line-height: 1.3;
            font-weight: 700;
        }

        .slide-text p {
            color: #444;
            line-height: 1.8;
            font-size: 1.1em;
            margin-bottom: 20px;
            text-align: justify;
    text-justify: inter-word;
        }

        .read-more-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #2c2c2c;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            transition: all 0.3s ease;
        }

        .read-more-btn:hover {
            padding: 10px 20px;
            background-clip: content-box; /* <---- */
            box-shadow: inset 0 0 0 2px #2c2c2c; /* <-- 10px spread radius */
            color: #1a1a1a;
            background-color: #fff;
            transform: translateY(-2px);
        }

        .slider-nav {
            text-align: center;
            margin-top: 25px;
        }

        .dot {
            height: 10px;
            width: 10px;
            margin: 0 8px;
            background-color: #d4d4d4;
            border-radius: 50%;
            display: inline-block;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .dot.active {
            background-color: #2c2c2c;
            transform: scale(1.2);
        }

        .recent-news {
            background: #fff;
            padding: 40px;
            border: 1px solid #e0e0e0;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        }

        .recent-news h3 {
            font-family: 'Playfair Display', serif;
            color: #1a1a1a;
            margin-bottom: 30px;
            font-size: 1.8em;
            position: relative;
            padding-bottom: 15px;
        }

        .recent-news h3::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 3px;
            background-color: #2c2c2c;
        }

        .news-list {
            list-style: none;
            padding: 0;
        }

        .news-list li {
            padding: 20px 0;
            border-bottom: 1px solid #eaeaea;
            transition: all 0.3s ease;
        }

        .news-list li:hover {
            background-color: #f9f9f9;
            padding-left: 10px;
        }

        .news-list a {
            display: grid;
            grid-template-columns: 120px 1fr;
            gap: 20px;
            text-decoration: none;
            color: inherit;
            cursor: pointer;
        }

        .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        background-color: rgba(0,0,0,0.85);
        z-index: 9999;
        backdrop-filter: blur(8px);
        overflow-y: auto;
        padding: 20px;
    }

    .modal-content {
        position: relative;
        background-color: #ffffff;
        margin: 30px auto;
        padding: 0;
        width: 95%;
        max-width: 1200px;
        border-radius: 12px;
        box-shadow: 0 25px 50px -12px rgba(0,0,0,0.25);
        overflow: hidden;
    }

    .close-modal {
        position: fixed;
        right: calc((100% - min(1200px, 95%)) / 2 + 25px);
        top: 45px;
        width: 40px;
        height: 40px;
        background: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        cursor: pointer;
        box-shadow: 0 2px 10px rgba(0,0,0,0.2);
        z-index: 10000;
        transition: all 0.3s ease;
    }

    .close-modal:hover {
        transform: rotate(90deg);
        background-color: #f3f4f6;
    }

    .modal-image-container {
        position: relative;
        width: 100%;
        height: 500px;
        overflow: hidden;
    }

    .modal-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .modal-image-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 150px;
        background: linear-gradient(to bottom, transparent, rgba(0,0,0,0.7));
    }

    .modal-article {
        max-width: 980px;
        margin: -100px auto 0;
        position: relative;
        padding: 40px;
        background: white;
        border-radius: 12px 12px 0 0;
    }

    .article-header {
        margin-bottom: 30px;
    }

    .article-title {
        font-family: 'Playfair Display', serif;
        font-size: 2.5em;
        line-height: 1.2;
        color: #1a1a1a;
        margin-bottom: 15px;
    }

    .article-meta {
        font-size: 0.95em;
        color: #666;
        border-bottom: 1px solid #eee;
        padding-bottom: 15px;
    }

    .article-date {
        display: inline-block;
        margin-right: 15px;
    }

    .article-content {
        font-family: 'Source Sans Pro', sans-serif;
        font-size: 1.1em;
        line-height: 1.8;
        color: #333;
        text-align: justify;
    text-justify: inter-word;
    }

    .article-content p {
        margin-bottom: 1.5em;
        text-align: justify;
    text-justify: inter-word;
    }

    .article-content p:first-of-type::first-letter {
        float: left;
        font-family: 'Playfair Display', serif;
        font-size: 3.5em;
        line-height: 0.8;
        padding-right: 8px;
        color: #1a1a1a;
    }

    .article-content h2 {
        font-family: 'Playfair Display', serif;
        font-size: 1.8em;
        color: #1a1a1a;
        margin: 1.5em 0 0.8em;
    }

    .article-content h3 {
        font-family: 'Playfair Display', serif;
        font-size: 1.4em;
        color: #1a1a1a;
        margin: 1.2em 0 0.6em;
    }

    .article-footer {
        margin-top: 40px;
        padding-top: 20px;
        border-top: 1px solid #eee;
    }

    .share-buttons {
        display: flex;
        gap: 15px;
    }

    .share-btn, .bookmark-btn {
        padding: 8px 16px;
        border: 1px solid #ddd;
        border-radius: 6px;
        background: transparent;
        color: #666;
        font-size: 0.9em;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .share-btn:hover, .bookmark-btn:hover {
        background-color: #f3f4f6;
        color: #1a1a1a;
    }

    @media (max-width: 768px) {
        .modal-content {
            margin: 10px auto;
        }

        .modal-article {
            padding: 20px;
            margin-top: -50px;
        }

        .article-title {
            font-size: 2em;
        }

        .modal-image-container {
            height: 300px;
        }

        .close-modal {
            right: 15px;
            top: 15px;
        }
        .article-content,
    .article-content p,
    .slide-text p,
    .news-excerpt {
        text-align: left; /* Better readability on mobile */
    }
    }
    </style>
    
</head>

<body>
    @include('inc.client_nav')

    <div class="news-container">
        <div class="news-slider" id="newsSlider">
            <!-- Slides will be dynamically inserted here -->
        </div>
        <div class="recent-news">
            <h3>Latest Chronicles</h3>
            <ul class="news-list" id="newsList">
                <!-- News items will be dynamically inserted here -->
            </ul>
        </div>
    </div>
    <!-- Modal for full article -->
    <!-- Modal -->
    <div id="newsModal" class="modal">
    <div class="modal-content">
        <span class="close-modal">&times;</span>
        
        <!-- Featured Image -->
        <div class="modal-image-container">
            <img id="modalImage" class="modal-image" src="" alt="">
            <div class="modal-image-overlay"></div>
        </div>
        
        <!-- Article Content -->
        <article class="modal-article">
            <header class="article-header">
                <h2 id="modalTitle" class="article-title"></h2>
                <div class="article-meta">
                    <span id="modalDate" class="article-date"></span>
                </div>
            </header>
            
            <div id="modalContent" class="article-content"></div>
            
            <footer class="article-footer">
                <div class="share-buttons">
                    <button class="share-btn">
                        <i class="fas fa-share-alt"></i> Share
                    </button>
                    <button class="bookmark-btn">
                        <i class="far fa-bookmark"></i> Save
                    </button>
                </div>
            </footer>
        </article>
    </div>
</div>


    @include('inc.footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
    <script>

    // Update the event handler for "Read More" buttons
    $(this).on('click', '.read-more', function(e) {
        e.preventDefault();
        console.log(valueID);
        const id = $('.read-more').data('id');
        openArticleModal(valueID);
    });
    document.addEventListener('DOMContentLoaded', function() {
            let currentSlide = 0;
            let newsItems = [];

            // Fetch news data
           // Fetch news data
           function fetchNews() {
                fetch('/api/news')
                    .then(response => response.json())
                    .then(data => {
                        newsItems = data;
                        renderSlides();
                        renderNewsList();
                        // Check for redirect after content is loaded
                        checkForRedirect();
                    })
                    .catch(error => {
                        console.error('Error fetching news:', error);
                        showErrorState();
                    });
            }

            function renderSlides() {
                const sliderContainer = document.getElementById('newsSlider');
                let slidesHTML = '';
                let dotsHTML = '<div class="slider-nav">';

                newsItems.forEach((item, index) => {
                    slidesHTML += `
                        <div class="slide ${index === 0 ? 'active' : ''}" data-id="${item.id}">
                            <div class="slide-content">
                                <img src="/api/serve/${item.id}" alt="${item.title}" class="slide-image">
                                <div class="slide-text">
                                    <h2>${item.title}</h2>
                                    <p>${item.content.substring(0, 200)}...</p>
                                    <a href="#" class="read-more-btn" onclick="openModal(${item.id})">Read More</a>
                                </div>
                            </div>
                        </div>
                    `;
                    dotsHTML += `<span class="dot ${index === 0 ? 'active' : ''}" onclick="currentSlide(${index})"></span>`;
                });

                dotsHTML += '</div>';
                sliderContainer.innerHTML = slidesHTML + dotsHTML;
                
                // Start automatic slideshow
                setInterval(nextSlide, 5000);
            }
            function renderNewsList() {
                const newsListContainer = document.getElementById('newsList');
                let listHTML = '';

                newsItems.forEach(item => {
                    const date = new Date(item.created_at);
                    listHTML += `
                        <li>
                            <a onclick="openModal(${item.id})">
                                <div class="news-date">
                                    <span class="day">${date.getDate()}</span>
                                    <span class="month-year">${date.toLocaleString('default', { month: 'short' })} ${date.getFullYear()}</span>
                                </div>
                                <div class="news-content">
                                    <h4 class="news-title">${item.title}</h4>
                                    <p class="news-excerpt">${item.content.substring(0, 100)}...</p>
                                </div>
                            </a>
                        </li>
                    `;
                });

                newsListContainer.innerHTML = listHTML;
            }

            // Modified modal functionality to work with redirect
            const modal = document.getElementById('newsModal');
            const closeModal = document.getElementsByClassName('close-modal')[0];

            window.openModal = function(id) {
        fetch(`/api/news/${id}`)
            .then(response => response.json())
            .then(item => {
                // Set image and title
                document.getElementById('modalImage').src = `/api/serve/${item.id}`;
                document.getElementById('modalTitle').textContent = item.title;
                
                // Format and set date
                const date = new Date(item.created_at);
                document.getElementById('modalDate').textContent = date.toLocaleDateString('en-US', {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                });

                // Format content
                let content = item.full_content;
                
                // Split into paragraphs and format
                const paragraphs = content.split('\n')
                .filter(p => p.trim())
                .filter(p => p.trim() !== item.title);
                
                const formattedContent = paragraphs.map((paragraph, index) => {
                    // Check for headers
                    if (paragraph.startsWith('# ')) {
                        return `<h2>${paragraph.substring(2)}</h2>`;
                    } else if (paragraph.startsWith('## ')) {
                        return `<h3>${paragraph.substring(3)}</h3>`;
                    }
                    
                    // Regular paragraphs
                    return `<p>${paragraph}</p>`;
                }).join('');

                document.getElementById('modalContent').innerHTML = formattedContent;
                
                // Show modal
                const modal = document.getElementById('newsModal');
                modal.style.display = 'block';
                document.body.style.overflow = 'hidden';
                
                // Update URL
                const newUrl = new URL(window.location);
                newUrl.searchParams.set('id', id);
                window.history.pushState({}, '', newUrl);
            })
            .catch(error => console.error('Error fetching news details:', error));
    }

            closeModal.onclick = function() {
                modal.style.display = 'none';
                // Remove the id parameter from URL when closing the modal
                const newUrl = new URL(window.location);
                newUrl.searchParams.delete('id');
                window.history.pushState({}, '', newUrl);
            }

            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = 'none';
                    // Remove the id parameter from URL when closing the modal
                    const newUrl = new URL(window.location);
                    newUrl.searchParams.delete('id');
                    window.history.pushState({}, '', newUrl);
                }
            }

            // Slideshow functionality
            window.currentSlide = function(n) {
                showSlide(n);
            }

            function showSlide(n) {
                const slides = document.getElementsByClassName('slide');
                const dots = document.getElementsByClassName('dot');
                
                if (n >= slides.length) n = 0;
                if (n < 0) n = slides.length - 1;

                Array.from(slides).forEach(slide => slide.classList.remove('active'));
                Array.from(dots).forEach(dot => dot.classList.remove('active'));

                slides[n].classList.add('active');
                dots[n].classList.add('active');
                currentSlide = n;
            }

            function nextSlide() {
                showSlide(currentSlide + 1);
            }



             // Add the checkForRedirect function
             function checkForRedirect() {
                const urlParams = new URLSearchParams(window.location.search);
                const newsId = urlParams.get('id');
                if (newsId) {
                    // Open the modal with the specific news item
                    openModal(newsId);
                    
                    // Find and scroll to the corresponding slide
                    const newsSlide = document.querySelector(`.slide[data-id="${newsId}"]`);
                    if (newsSlide) {
                        // Find the index of the slide
                        const slides = document.getElementsByClassName('slide');
                        const slideIndex = Array.from(slides).indexOf(newsSlide);
                        
                        // Show the correct slide
                        showSlide(slideIndex);
                        
                        // Smooth scroll to the slider
                        newsSlide.scrollIntoView({ 
                            behavior: 'smooth', 
                            block: 'center' 
                        });
                    }
                }
            }

            // Initialize
            fetchNews();
            
            const nav = document.querySelector('nav');
            const navbarBrand = document.createElement('div');
            navbarBrand.className = 'nav-title';
            navbarBrand.textContent = 'News & Updates';
            
            // Insert the title after the first child of nav (usually the logo)
            nav.insertBefore(navbarBrand, nav.firstChild.nextSibling);

            // Add animation after a short delay
            setTimeout(() => {
                navbarBrand.classList.add('visible');
            }, 100);
        });
    </script>
</body>

</html>

