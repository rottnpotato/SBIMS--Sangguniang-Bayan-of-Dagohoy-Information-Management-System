<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Legislative Documents</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://documentservices.adobe.com/view-sdk/viewer.js"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f7f9;
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
        .read-more-btn {
            background-color: #1e3a8a;
            color: #ffffff;
            padding: 10px;
            text-align: center;
            display: block;
            text-decoration: none;
            font-weight: 600;
            border-radius: 4px;
            transition: background-color 0.2s ease;
        }
        
        .read-more-btn:hover {
            background-color: #1e40af;
            color: #ffffff;
            text-decoration: none;
            cursor: pointer;
        }

        .document-icon {
            float: right;
            font-size: 24px;
            color: #1e3a8a;
        }
        .ordinance {
            background-color: #e3f2fd;
            color: #1565c0;
        }
        .resolution {
            background-color: #e8f5e9;
            color: #2e7d32;
        }
        .filter-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .custom-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%23a0aec0'%3E%3Cpath d='M7 10l5 5 5-5z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 0.5rem center;
            background-size: 1.5em 1.5em;
        }
        #adobe-dc-view {
            height: 100vh;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;    
            z-index: 1000;
            display: none;
        }
        .nav-hidden {
            display: none !important;
        }
        .pop-up-modal {
    position: fixed;
    left: 0%;
    top: 0%;
    right: 0%;
    bottom: 0%;
    z-index: 999999;
    display: none;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -webkit-flex-direction: column;
    -ms-flex-direction: column;
    flex-direction: column;
    -webkit-box-pack: center;
    -webkit-justify-content: center;
    -ms-flex-pack: center;
    justify-content: center;
    -webkit-box-align: center;
    -webkit-align-items: center;
    -ms-flex-align: center;
    align-items: center;
    background-color: rgba(42, 42, 45, 0.75);
    padding: 20px;
}

.pop-up-modal.show {
    display: flex;
}

.pop-up {
    position: relative;
    display: flex;
    flex-direction: column;
    width: 90%;
    max-width: 600px;
    max-height: 90vh;
    border-radius: 8px;
    background-color: #fff;
    box-shadow: 1px 1px 10px 5px rgba(0, 0, 0, 0.25);
    opacity: 0;
    transform: translateY(-50px);
    transition: all 0.3s ease-in-out;
}

.pop-up.show {
    opacity: 1;
    transform: translateY(0);
}

.pop-up-icon {
    position: absolute;
    left: 50%;
    top: -40px;
    transform: translateX(-50%);
    width: 80px;
    height: 80px;
    padding: 20px;
    border: 4px solid #fff;
    border-radius: 50%;
    background-color: #1e3a8a;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 2;
}

.pop-up-icon i {
    font-size: 28px;
    color: white;
}

.modal-header {
    padding: 50px 25px 15px;
    border-bottom: 1px solid #e5e7eb;
    position: relative;
}

.pop-up-heading {
    color: #1e3a8a;
    font-size: 1.25rem;
    line-height: 1.4;
    font-weight: 700;
    margin: 0;
    text-align: center;
    /* Added property for long titles */
    word-wrap: break-word;
    overflow-wrap: break-word;
    hyphens: auto;
    max-height: 2.8em;
    overflow-y: auto;
}

.exit-button {
    position: absolute;
    right: 15px;
    top: 15px;
    width: 30px;
    height: 30px;
    padding: 0;
    border-radius: 50%;
    background-color: #1e3a8a;
    cursor: pointer;
    border: none;
    color: white;
    font-size: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 3;
    transition: background-color 0.2s ease;
}

.exit-button:hover {
    background-color: #1e40af;
}

.modal-body {
    flex: 1;
    overflow-y: auto;
    padding: 20px 25px;
    min-height: 100px;
    max-height: calc(90vh - 200px);
    scrollbar-width: thin;
    scrollbar-color: #1e3a8a #f0f0f0;
}

.modal-body::-webkit-scrollbar {
    width: 6px;
}

.modal-body::-webkit-scrollbar-track {
    background: #f0f0f0;
    border-radius: 3px;
}

.modal-body::-webkit-scrollbar-thumb {
    background-color: #1e3a8a;
    border-radius: 3px;
}

.pop-up-content {
    text-align: left;
}

.pop-up-content h4 {
    font-size: 1rem;
    font-weight: 600;
    color: #1e3a8a;
    margin-bottom: 15px;
    line-height: 1.5;
    /* Added properties for long descriptions */
    word-wrap: break-word;
    overflow-wrap: break-word;
}

.pop-up-content p {
    margin-bottom: 12px;
    color: #333;
    line-height: 1.6;
    font-size: 0.9rem;
    /* Added property for long content */
    word-wrap: break-word;
}

.modal-footer {
    padding: 15px 25px;
    border-top: 1px solid #e5e7eb;
    text-align: center;
    background-color: #f8fafc;
    border-bottom-left-radius: 8px;
    border-bottom-right-radius: 8px;
}

.view-pdf-btn {
    padding: 10px 30px;
    border-radius: 50px;
    background-color: #1e3a8a;
    color: white;
    font-size: 0.9rem;
    font-weight: 600;
    text-decoration: none;
    cursor: pointer;
    border: none;
    transition: background-color 0.3s ease;
}

.view-pdf-btn:hover {
    background-color: #1e40af;
    color: white;
    text-decoration: none;
}

/* Responsive adjustments */
@media (max-width: 640px) {
    .pop-up {
        width: 95%;
        max-height: 85vh;
    }

    .pop-up-icon {
        width: 60px;
        height: 60px;
        padding: 15px;
        top: -30px;
    }

    .pop-up-icon i {
        font-size: 20px;
    }

    .modal-header {
        padding: 40px 20px 12px;
    }

    .pop-up-heading {
        font-size: 1.1rem;
    }

    .modal-body {
        padding: 15px 20px;
        max-height: calc(85vh - 180px);
    }

    .modal-footer {
        padding: 12px 20px;
    }

    .view-pdf-btn {
        padding: 8px 25px;
        font-size: 0.875rem;
    }
}
        
        .document-card {
            background-color: #ffffff;
            border: 1px solid #e5e7eb;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
            height: 300px;
            width: 100%;
            position: relative;
            transition: height 0.3s ease;
            cursor: pointer;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }
        .document-card .content {
            flex-grow: 1;
            overflow: hidden;
        }

        .document-card.expanded {
            height: 400px;
        }

        .document-card h3 {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 5px;
            color: #000000;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .document-card .date {
            color: #666;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .document-card .description {
            font-size: 14px;
            margin-bottom: 20px;
            color: #333;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .document-card .author-info {
            display: none;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #e5e7eb;
        }

        .document-card.expanded .author-info {
            display: block;
        }

        .view-controls {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
            align-items: center;
        }

        .view-toggle {
            display: flex;
            gap: 10px;
        }

        .view-toggle button {
            padding: 8px 12px;
            border: 1px solid #e5e7eb;
            background: white;
            border-radius: 4px;
            cursor: pointer;
        }

        .view-toggle button.active {
            background: #1e3a8a;
            color: white;
        }

        .grid-view {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        .list-view .document-card {
            max-width: 100%;
            height: 200px;
        }

        .list-view .document-card.expanded {
            height: 300px;
        }

        .sort-control {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sort-control select {
            padding: 8px;
            border: 1px solid #e5e7eb;
            border-radius: 4px;
            background: white;
        }
    </style>
</head>
<body class="bg-gray-100">
   @include('inc.client_nav')
    <div class="container mx-auto px-4 py-8">
        <!--<h1 class="text-4xl font-bold mb-8 text-gray-800">Legislative Documents</h1> -->
        
        <div class="filter-container mb-6 p-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div>
                    <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                    <input type="text" id="search" placeholder="Search documents..." class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    
                    <label for="filter-type" class="block text-sm font-medium text-gray-700 mb-1">Filter by</label>
                    <select id="filter-type" class="custom-select w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="all">All</option>
                        <option value="author">Author</option>
                        <option value="co_author">Co-Author</option>
                        <option value="date_published">Date Published</option>
                        <option value="document_type">Document Type</option>
                    </select>
                </div>
                <div>
                    <label for="filter-value" class="block text-sm font-medium text-gray-700 mb-1">Filter value</label>
                    <select id="filter-value" class="custom-select w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Select filter</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">&nbsp;</label>
                    <button id="reset-filters" class="w-full bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition duration-200">Reset Filters</button>
                </div>
            </div>
        </div>
        <div class="view-controls">
            <div class="view-toggle">
                <button class="active" data-view="grid">
                    <i class="fas fa-th-large"></i> Grid
                </button>
                <button data-view="list">
                    <i class="fas fa-list"></i> List
                </button>
            </div>
            <div class="sort-control">
                <label>Sort by:</label>
                <select id="sort-select">
                    <option value="date-new">Date (Newest First)</option>
                    <option value="date-old">Date (Oldest First)</option>
                    <option value="title-asc">Title (A-Z)</option>
                    <option value="title-desc">Title (Z-A)</option>
                </select>
            </div>
        </div>

        <div id="document-grid" class="grid-view">
            <!-- Documents will be inserted here -->
        </div>

        <div id="adobe-dc-view"></div>
    </div>

    <!-- Updated Modal -->
    <div class="pop-up-modal" id="documentModal">
        <div class="pop-up">
            <div class="pop-up-icon">
                <i class="fas fa-file-alt"></i>
            </div>
            <button class="exit-button">&times;</button>
            
            <div class="modal-header">
                <h2 class="pop-up-heading"></h2>
            </div>
            
            <div class="modal-body">
                <div class="pop-up-content">
                    <!-- Content will be dynamically inserted here -->
                </div>
            </div>
            
            <div class="modal-footer">
                <button class="view-pdf-btn">View PDF</button>
            </div>
        </div>
    </div>

    @include('inc.footer')
</body>

<script>
$(function () {
    let documents = [];
    let currentView = 'grid';
    let isDirectAccess = false; // Flag to track if this is a direct URL access

            function toggleCard(card) {
                card.classList.toggle('expanded');
            }
     // Check if this is a direct access via URL parameters
     function checkDirectAccess() {
        const urlParams = new URLSearchParams(window.location.search);
        isDirectAccess = urlParams.has('id') || urlParams.has('type');
        return isDirectAccess;
    }
         // Get URL parameters
    function getUrlParameter(name) {
        name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
        var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
        var results = regex.exec(location.search);
        return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
    }

    let filterOptions = {
        author: new Set(),
        co_author: new Set(),
        date_published: new Set(),
        document_type: new Set(['Ordinance', 'Resolution'])
    };

    const navHeader = document.querySelector('nav');
    const documentGrid = document.getElementById('document-grid');

   // Modified fetchData function
   function fetchData() {
            $.ajax({
                url: "{{ route('document.index') }}",
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    documents = response.data;
                    renderDocuments(documents);
                    updateFilterOptions();


                    // Check for type parameter in URL
                const typeParam = getUrlParameter('type');
                if (typeParam) {
                    // Set the filter type and value in the UI
                    $('#filter-type').val('document_type');
                    updateFilterValueDropdown();
                    $('#filter-value').val(typeParam);
                    
                    // Apply the filter
                    const filteredDocs = documents.filter(doc => 
                        doc.type && doc.type.toLowerCase() === typeParam.toLowerCase()
                    );
                    renderDocuments(filteredDocs);
                } else {
                    renderDocuments(documents);
                }

                // Handle direct document access
                if (getUrlParameter('id')) {
                    const documentId = getUrlParameter('id');
                    const document = documents.find(doc => doc.id === parseInt(documentId));
                    if (document) {
                        const showPdf = getUrlParameter('pdf') === 'true';
                        if (showPdf) {
                            openPdfViewer(documentId);
                        } else {
                            openModal(document);
                        }
                    }
                }
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching data:", error);
                }
            });
        }

    // Update the renderDocuments function
    function renderDocuments(docs) {
                const grid = document.getElementById('document-grid');
                grid.innerHTML = '';
                
                docs.forEach(doc => {
                    const card = document.createElement('div');
                    card.className = 'document-card';
                    card.innerHTML = `
                    <div class="content">
                        <i class="fas fa-file-alt document-icon"></i>
                        <h3>${doc.title}</h3>
                        <div class="date">Date Approved: ${doc.date_published}</div>
                        <div class="description">${doc.description}</div>
                        <div class="author-info">
                            <p><strong>Principal Author:</strong> ${doc.sponsored}</p>
                            <p><strong>Co-Author:</strong> ${doc.co_sponsored}</p>
                        </div>
                    </div>
                        <div class="button-container">
                            <a href="#" class="read-more-btn">Read More</a>
                        </div>
                    `;

                    card.addEventListener('click', (e) => {
                        if (!e.target.classList.contains('read-more-btn')) {
                            toggleCard(card);
                        }
                    });

                    const readMoreBtn = card.querySelector('.read-more-btn');
                    readMoreBtn.addEventListener('click', (e) => {
                        e.preventDefault();
                        e.stopPropagation();
                        openModal(doc);
                    });

                    grid.appendChild(card);
                });
            }
            function sortDocuments(method) {
                const sortedDocs = [...documents];
                switch (method) {
                    case 'date-new':
                        sortedDocs.sort((a, b) => new Date(b.date_published) - new Date(a.date_published));
                        break;
                    case 'date-old':
                        sortedDocs.sort((a, b) => new Date(a.date_published) - new Date(b.date_published));
                        break;
                    case 'title-asc':
                        sortedDocs.sort((a, b) => a.title.localeCompare(b.title));
                        break;
                    case 'title-desc':
                        sortedDocs.sort((a, b) => b.title.localeCompare(a.title));
                        break;
                }
                renderDocuments(sortedDocs);
            }

            // View toggle handlers
            document.querySelectorAll('.view-toggle button').forEach(button => {
                button.addEventListener('click', () => {
                    document.querySelectorAll('.view-toggle button').forEach(b => b.classList.remove('active'));
                    button.classList.add('active');
                    const view = button.dataset.view;
                    const grid = document.getElementById('document-grid');
                    grid.className = view === 'grid' ? 'grid-view' : 'list-view';
                    currentView = view;
                });
            });

            // Sort handler
            document.getElementById('sort-select').addEventListener('change', (e) => {
                sortDocuments(e.target.value);
            });

    // Modified openModal function
    function openModal(doc) {
            // Only update URL if this was triggered by a redirect
            if (isDirectAccess) {
                const newUrl = new URL(window.location);
                newUrl.searchParams.set('id', doc.id);
                window.history.pushState({}, '', newUrl);
            }

            const modal = document.querySelector('.pop-up-modal');
            const popup = modal.querySelector('.pop-up');
            const modalTitle = modal.querySelector('.pop-up-heading');
            const modalContent = modal.querySelector('.pop-up-content');
            const viewPdfBtn = modal.querySelector('.view-pdf-btn');
            const exitBtn = modal.querySelector('.exit-button');

            modalTitle.textContent = `${doc.title}`;
            modalContent.innerHTML = `
                <h4 style="font-weight: 600; margin-bottom: 15px;">${doc.description}</h4>
                <p><strong>Date Approved:</strong> ${doc.date_published}</p>
                <p><strong>Principal Author(s):</strong> ${doc.sponsored}</p>
                <p><strong>Co-Author(s):</strong> ${doc.co_sponsored}</p>
            `;

            viewPdfBtn.setAttribute('data-id', doc.id);
            
            modal.style.display = 'flex';
            setTimeout(() => {
                popup.classList.add('show');
            }, 10);

            exitBtn.onclick = function() {
                popup.classList.remove('show');
                setTimeout(() => {
                    modal.style.display = 'none';
                    // Only clear URL if this was from a redirect
                    if (isDirectAccess) {
                        const newUrl = new URL(window.location);
                        newUrl.searchParams.delete('id');
                        window.history.pushState({}, '', newUrl);
                        isDirectAccess = false; // Reset the flag
                    }
                }, 300);
            };

            viewPdfBtn.onclick = function() {
                const documentId = this.getAttribute('data-id');
                if (isDirectAccess) {
                    const newUrl = new URL(window.location);
                    newUrl.searchParams.set('pdf', 'true');
                    window.history.pushState({}, '', newUrl);
                }
                openPdfViewer(documentId);
                exitBtn.click();
            };

            modal.onclick = function(e) {
                if (e.target === modal) {
                    exitBtn.click();
                }
            };
        }


    // Function to update filter options
    function updateFilterOptions() {
        filterOptions = {
            author: new Set(),
            co_author: new Set(),
            date_published: new Set(),
            document_type: new Set()
        };

        documents.forEach(doc => {
            filterOptions.author.add(doc.sponsored);
            filterOptions.co_author.add(doc.co_sponsored);
            filterOptions.date_published.add(doc.date_published);
            if (doc.type) {
                filterOptions.document_type.add(doc.type);
            }
        });

        updateFilterValueDropdown();
    }

    // Function to update filter value dropdown
    function updateFilterValueDropdown() {
        const filterType = $('#filter-type').val();
        const filterValueSelect = $('#filter-value');
        filterValueSelect.empty();
        filterValueSelect.append('<option value="">Select filter</option>');

        if (filterType !== 'all') {
            [...filterOptions[filterType]].sort().forEach(value => {
                filterValueSelect.append(`<option value="${value}">${value}</option>`);
            });
        }
    }

    // Search and filter functionality
    function searchAndFilter() {
        const searchTerm = $('#search').val().toLowerCase();
        const filterType = $('#filter-type').val();
        const filterValue = $('#filter-value').val();

        const filteredDocs = documents.filter(doc => {
            const matchesSearch = doc.title.toLowerCase().includes(searchTerm) ||
                doc.sponsored.toLowerCase().includes(searchTerm) ||
                doc.co_sponsored.toLowerCase().includes(searchTerm) ||
                doc.subject_matter.toLowerCase().includes(searchTerm) ||
                doc.description.toLowerCase().includes(searchTerm);

                let matchesFilter = true;
        if (filterType !== 'all' && filterValue) {
            switch(filterType) {
                case 'document_type':
                    matchesFilter = (doc.type || '').toLowerCase() === filterValue.toLowerCase();
                    break;
                case 'author':
                    matchesFilter = (doc.sponsored || '').toLowerCase() === filterValue.toLowerCase();
                    break;
                case 'co_author':
                    matchesFilter = (doc.co_sponsored || '').toLowerCase() === filterValue.toLowerCase();
                    break;
                case 'date_published':
                    matchesFilter = (doc.date_published || '').toLowerCase() === filterValue.toLowerCase();
                    break;
                default:
                    matchesFilter = (doc[filterType] || '').toLowerCase() === filterValue.toLowerCase();
            }
        }
            return matchesSearch && matchesFilter;
        });

        renderDocuments(filteredDocs);
    }
    

    $('#search, #filter-type, #filter-value').on('input change', searchAndFilter);

    $('#filter-type').on('change', updateFilterValueDropdown);

    $('#reset-filters').on('click', function() {
        $('#search').val('');
        $('#filter-type').val('all');
        $('#filter-value').empty().append('<option value="">Select filter</option>');
        renderDocuments(documents);
    });

    // Adobe PDF Embed API viewer logic
    let adobeDCView = null;

    // Initialize Adobe PDF Embed API
    const initializeAdobeViewer = (url) => {
        if (!adobeDCView) {
            const clientId = "620e1c18ae984f439f9d46d3aabaeb9b";
            adobeDCView = new AdobeDC.View({clientId: clientId, divId: "adobe-dc-view"});
        }

        const viewerConfig = {
            embedMode: "LIGHT_BOX",
            defaultViewMode: "FIT_PAGE",
            showDownloadPDF: false,
            showPrintPDF: false,
            showLeftHandPanel: true,
            showAnnotationTools: false,
        };

        adobeDCView.previewFile(
            {content: {location: {url: url}}, metaData: {fileName: "document.pdf"}},
            viewerConfig
        );

        // Add event listener for when the PDF viewer is closed
        adobeDCView.registerCallback(
            AdobeDC.View.Enum.CallbackType.EVENT_LISTENER,
            function(event) {
                if (event.type === "PDF_VIEWER_CLOSE") {
                    adobeDCView = null; // Reset PDF viewer for reinitialization
                    document.getElementById("adobe-dc-view").style.display = "none";
                    navHeader.classList.remove('nav-hidden'); // Show the nav bar when the viewer is closed
                }
            }
        );
    };

    // Function to ensure Adobe DC View is ready
    const adobeViewerReady = new Promise((resolve) => {
        if (window.AdobeDC) {
            resolve();
        } else {
            document.addEventListener("adobe_dc_view_sdk.ready", () => resolve());
        }
    });

    // Modified openPdfViewer function
    function openPdfViewer(documentId) {
            const url = `/documents/${documentId}/download`;
            
            document.getElementById("adobe-dc-view").style.display = "block";
            navHeader.classList.add('nav-hidden');

            adobeViewerReady.then(() => {
                initializeAdobeViewer(url);
            }).catch(error => {
                console.error("Error initializing Adobe PDF Embed API:", error);
                alert("An error occurred while trying to display the PDF. Please try again later.");
                navHeader.classList.remove('nav-hidden');
                if (isDirectAccess) {
                    const newUrl = new URL(window.location);
                    newUrl.searchParams.delete('pdf');
                    window.history.pushState({}, '', newUrl);
                }
            });
        }
         // Handle browser back/forward buttons
         window.onpopstate = function(event) {
            const documentId = getUrlParameter('id');
            const showPdf = getUrlParameter('pdf') === 'true';

            if (!documentId) {
                const modal = document.querySelector('.pop-up-modal');
                modal.style.display = 'none';
                document.getElementById("adobe-dc-view").style.display = "none";
                navHeader.classList.remove('nav-hidden');
                isDirectAccess = false;
            } else {
                isDirectAccess = true;
                const document = documents.find(doc => doc.id === parseInt(documentId));
                if (document) {
                    if (showPdf) {
                        openPdfViewer(documentId);
                    } else {
                        openModal(document);
                    }
                }
            }
        };

    // Initial data fetch
    fetchData();
            const nav = document.querySelector('nav');
            const navbarBrand = document.createElement('div');
            navbarBrand.className = 'nav-title';
            navbarBrand.textContent = 'Legislative Documents';
            
            // Insert the title after the first child of nav (usually the logo)
            nav.insertBefore(navbarBrand, nav.firstChild.nextSibling);

            // Add animation after a short delay
            setTimeout(() => {
                navbarBrand.classList.add('visible');
            }, 100);
});
</script>

</html>