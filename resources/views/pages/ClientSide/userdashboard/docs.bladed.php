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
    <link rel="stylesheet" href={{ URL::asset('css/ClientCSS/app.css') }}>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Add Adobe PDF Embed API script -->
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
        .document-card {
            transition: all 0.3s ease-in-out;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .document-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }
        .document-type {
            position: absolute;
            top: 10px;
            right: 10px;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
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
            display: none; /* Hide by default */
        }
        .nav-hidden {
            display: none !important;
        }
    </style>
</head>
<body class="bg-gray-100">
   @include('inc.client_nav')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold mb-8 text-gray-800">Legislative Documents</h1>
        
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

        <div id="document-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Document cards will be dynamically inserted here -->
        </div>

        <div id="adobe-dc-view"></div>
    </div>

    @include('inc.footer')
</body>


<script>
$(function () {
    let documents = [];
    let filterOptions = {
        author: new Set(),
        co_author: new Set(),
        date_published: new Set(),
        document_type: new Set(['Ordinance', 'Resolution'])
    };

    const navHeader = document.querySelector('nav');
    const documentGrid = document.getElementById('document-grid');

    // Function to fetch data from the server
    function fetchData() {
        $.ajax({
            url: "{{ route('blotters.index') }}",
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                documents = response.data;
                renderDocuments(documents);
                updateFilterOptions();
            },
            error: function(xhr, status, error) {
                console.error("Error fetching data:", error);
            }
        });
    }

    // Function to render document cards
    function renderDocuments(docs) {
        documentGrid.innerHTML = '';
        docs.forEach(doc => {
            const card = document.createElement('div');
            card.className = 'document-card bg-white p-6 relative';
            const documentType = doc.type;
            card.innerHTML = `
                <span class="document-type ${documentType.toLowerCase()}">${documentType}</span>
                <h3 class="text-xl font-semibold mb-2">${doc.title}</h3>
                <p class="text-gray-600 mb-2"><i class="fas fa-user mr-2"></i>${doc.author}</p>
                <p class="text-gray-600 mb-2"><i class="fas fa-users mr-2"></i>${doc.co_author}</p>
                <p class="text-gray-700 mb-2">${doc.description}</p>
                <p class="text-gray-600 mb-4"><i class="far fa-calendar-alt mr-2"></i>${doc.date_published}</p>
                <button class="view-pdf bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-200" data-id="${doc.id}">View PDF</button>
            `;
            documentGrid.appendChild(card);
            
            // Attach click event to the button
            const viewPdfButton = card.querySelector('.view-pdf');
            viewPdfButton.addEventListener('click', function() {
                console.log("CLICKED");
                
                document.getElementById("adobe-dc-view").style.display = "block";
                const blotterId = this.getAttribute('data-id');
                openPdfViewer(blotterId);
            });
        });
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
            filterOptions.author.add(doc.author);
            filterOptions.co_author.add(doc.co_author);
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
                doc.author.toLowerCase().includes(searchTerm) ||
                doc.co_author.toLowerCase().includes(searchTerm) ||
                doc.description.toLowerCase().includes(searchTerm);

            const matchesFilter = filterType === 'all' || 
                (filterType === 'document_type' ? (doc.type || '').toLowerCase() === filterValue.toLowerCase() : doc[filterType] === filterValue);

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
                //alert(event.type);
                if (event.type === "PDF_VIEWER_CLOSE") {
                    //alert('ASD');
                    adobeDCView = null;//reset pdfviewer for reinitialization
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

    // Function to open PDF viewer
    function openPdfViewer(blotterId) {
        const url = `/blotter/${blotterId}/download`;
        
        document.getElementById("adobe-dc-view").style.display = "block";
        navHeader.classList.add('nav-hidden'); // Hide the nav bar

        // Wait for Adobe DC View to be ready before initializing
        adobeViewerReady.then(() => {
            initializeAdobeViewer(url);
        }).catch(error => {
            console.error("Error initializing Adobe PDF Embed API:", error);
            alert("An error occurred while trying to display the PDF. Please try again later.");
            navHeader.classList.remove('nav-hidden'); // Show the nav bar if there's an error
        });
    }

    // Initial data fetch
    fetchData();
});
</script>

</html>
