<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Management System</title>
      
      <link href=" {{ URL::asset('css/app.css') }}" rel="stylesheet">
      
      <link href=" https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.9.359/pdf.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.css" rel="stylesheet">
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
      <script src="https://documentservices.adobe.com/view-sdk/viewer.js"></script>
      <style>
    .dropdown-menu {
        right: 0;
        left: auto;
    }
    
    /* Updated navbar styles */
    .navbar {
        position: sticky;
        top: 0;
        width: 100%;
        z-index: 1030;
    }
    
    /* New sidebar styles */
    #wrapper {
        display: flex;
        min-height: 100vh;
        position: relative;
        overflow-x: hidden;
        transition: all 0.3s ease;
    }
    
    /* Sidebar positioning */
    .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        height: 100vh;
        z-index: 1020;
        width: 250px;
        background: linear-gradient(135deg, #24243e 0%, #302b63 50%, #0f0c29 100%);
        transition: all 0.3s ease;
        overflow-y: auto;
    }
    
    /* Main content wrapper adjustment */
    #page-content-wrapper {
        flex: 1;
        width: 100%;
        margin-left: 250px;
        transition: all 0.3s ease;
    }
    
    /* Container adjustments */
    .main-body {
        padding: 20px;
        min-height: calc(100vh - 60px); /* Adjust based on your navbar height */
    }
    
    .sidebar {
        transform: translateX(0);
        transition: transform 0.3s ease;
    }

    #wrapper.toggled .sidebar {
        transform: translateX(-100%);
    }

    #wrapper.toggled #page-content-wrapper {
        margin-left: 0;
    }
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .sidebar {
            margin-left: -250px;
        }
        
        #page-content-wrapper {
            margin-left: 0;
            width: 100%;
        }
        
        #wrapper.toggled .sidebar {
            margin-left: 0;
        }
    }
</style>

      <script>
        // global app configuration object
        var config = {
            routes: {
            }
        };
     </script>


   </head>
   <body>
      <div class="d-flex overflow-auto" id="wrapper">
         @include('inc.nav')
         <div id="page-content-wrapper">
            @include('inc.top_nav')
            <div class="container-fluid main-body" id="body">
               @yield('content')
            </div>
         </div>
      </div>
   </body>

   <script>
    // Ensure sidebar height matches content
    function adjustSidebarHeight() {
        const contentHeight = document.getElementById('page-content-wrapper').scrollHeight;
        const sidebar = document.querySelector('.sidebar');
        sidebar.style.minHeight = `${contentHeight}px`;
    }
    
    // Run on load and resize
    window.addEventListener('load', adjustSidebarHeight);
    window.addEventListener('resize', adjustSidebarHeight);
</script>






   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

   <script type="text/javascript" src=" {{ URL::asset('js/app.js') }}"></script>

 <!---datatable-->


 <script type="text/javascript" src=" https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>



   <script type="text/javascript" src="{{ URL::asset('js/custom.js') }}"></script>

   <!--pagination-->
   <script type="text/javascript" src="{{ URL::asset('js/pagination.js') }}"></script>
   <script type="text/javascript" src="{{ URL::asset('js/pagination.min.js') }}"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.js"></script>



</html>
