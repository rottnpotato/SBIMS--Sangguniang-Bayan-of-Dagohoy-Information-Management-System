@extends('layouts.apps')
@section('content')


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<div class="container">
  <h1 class="mt-4 mb-4">News & Updates</h1>
  <button id="addNewsButton" class="btn btn-primary mb-4">Add News</button>
  <div id="newsContainer" class="row">
    <!-- News items will be dynamically inserted here -->
  </div>
</div>

<!-- Add News Modal -->
<div class="modal fade" id="addNewsModal" tabindex="-1" role="dialog" aria-labelledby="addNewsModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addNewsModalLabel">Add News Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="addNewsForm" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="addNewsTitle">Title</label>
            <input type="text" class="form-control" id="addNewsTitle" name="title" required>
          </div>
          <div class="form-group">
            <label for="addNewsContent">Content</label>
            <textarea class="form-control" id="addNewsContent" name="content" rows="3" required></textarea>
          </div>
          <div class="form-group">
            <label for="addNewsFullContent">Full Content</label>
            <textarea class="form-control" id="addNewsFullContent" name="full_content" rows="5" required></textarea>
          </div>
          <div class="form-group">
            <label for="addNewsImage">Image</label>
            <input type="file" class="form-control-file" id="addNewsImage" name="image" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add News</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Edit News Modal -->
<div class="modal fade" id="editNewsModal" tabindex="-1" role="dialog" aria-labelledby="editNewsModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editNewsModalLabel">Edit News Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="editNewsForm" enctype="multipart/form-data">
        <div class="modal-body">
          <input type="hidden" id="editNewsId" name="id">
          <div class="form-group">
            <label for="editNewsTitle">Title</label>
            <input type="text" class="form-control" id="editNewsTitle" name="title">
          </div>
          <div class="form-group">
            <label for="editNewsContent">Content</label>
            <textarea class="form-control" id="editNewsContent" name="content" rows="3"></textarea>
          </div>
          <div class="form-group">
            <label for="editNewsFullContent">Full Content</label>
            <textarea class="form-control" id="editNewsFullContent" name="full_content" rows="5"></textarea>
          </div>
          <div class="form-group">
            <label for="editNewsImage">Image (leave blank to keep current image)</label>
            <input type="file" class="form-control-file" id="editNewsImage" name="image">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update News</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Delete News Confirmation Modal -->
<div class="modal fade" id="deleteNewsModal" tabindex="-1" role="dialog" aria-labelledby="deleteNewsModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteNewsModalLabel">Confirm Deletion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this news item? This action cannot be undone.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="confirmDeleteNews">Delete</button>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="articleModal" tabindex="-1" role="dialog" aria-labelledby="articleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="articleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="article-meta mb-3">
          <span id="modalDate" class="text-muted"></span>
        </div>
        <div class="article-featured-image mb-4">
          <img id="modalImage" src="" alt="" class="img-fluid rounded">
        </div>
        <article class="article-content">
          <div id="modalContent" class="formatted-content"></div>
        </article>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="shareArticle">Share</button>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<style>
.news-card {
  border: none;
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  height: 450px; /* Fixed height for all cards */
  transition: transform 0.3s ease-in-out;
  display: flex;
    flex-direction: column;
}

.news-card:hover {
  transform: translateY(-5px);
}

.news-image-container {
  height: 200px;
  overflow: hidden;
}

.news-image {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.3s ease-in-out;
}

.news-card:hover .news-image {
  transform: scale(1.05);
}

.news-content {
  padding: 1.5rem;
  display: flex;
  flex-direction: column;
  flex-grow: 1; /* Allow content to fill remaining space */
}

.news-title {
  font-size: 1.25rem;
  font-weight: bold;
  margin-bottom: 0.5rem;
  color: #333;
  line-height: 1.2;
  max-height: 3.6em; /* Limit to 2 lines */
  overflow: hidden;
  text-overflow: ellipsis;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
}

.news-text {
  color: #666;
  font-size: 0.9rem;
  margin-bottom: 1rem;
  overflow: hidden;
  text-overflow: ellipsis;
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  flex-grow: 1;
  text-align: justify;
}

.news-date {
  font-size: 0.8rem;
  color: #999;
  margin-bottom: 1rem;
}

.news-actions {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-top: auto; /* Push actions to the bottom */
}

.btn-read-more {
  background-color: #007bff;
  color: white;
  border: none;
  padding: 0.5rem 1rem;
  border-radius: 4px;
  text-decoration: none;
  transition: background-color 0.3s ease-in-out;
}

.btn-read-more:hover {
  background-color: #0056b3;
  color: white;
}

.news-admin-actions {
  display: flex;
  gap: 0.5rem;
}

.btn-edit, .btn-delete {
  padding: 0.25rem 0.5rem;
  font-size: 0.8rem;
}

.is-invalid {
  border-color: #dc3545;
}

.invalid-feedback {
  display: none;
  color: #dc3545;
  font-size: 0.875rem;
  margin-top: 0.25rem;
}

.was-validated .form-control:invalid {
  border-color: #dc3545;
}

.was-validated .form-control:invalid + .invalid-feedback {
  display: block;
}
.modal-header{
        background: linear-gradient(135deg, #24243e 0%, #302b63 50%, #0f0c29 100%);
        color: #fff;
  }

  .article-meta {
  font-size: 0.9rem;
  color: #666;
  border-bottom: 1px solid #eee;
  padding-bottom: 1rem;
}

.article-featured-image {
  position: relative;
  background: #f8f9fa;
  border-radius: 8px;
  overflow: hidden;
}

.article-featured-image img {
  width: 100%;
  height: auto;
  max-height: 400px;
  object-fit: cover;
}

.article-content {
  font-size: 1.1rem;
  line-height: 1.8;
  color: #333;
  text-align: justify; 
}

.formatted-content {
  white-space: pre-line;
  text-align: justify; 
}

.formatted-content p {
  margin-bottom: 1.5rem;
  text-align: justify; /* Add text justification to paragraphs */
  text-justify: inter-word;
}

.formatted-content h2 {
  font-size: 1.5rem;
  margin: 2rem 0 1rem;
  color: #1a1a1a;
}

.formatted-content h3 {
  font-size: 1.25rem;
  margin: 1.5rem 0 1rem;
  color: #333;
}
.modal-content .news-text {
    text-align: justify; /* Add text justification to modal news text */
    text-justify: inter-word;
}

.formatted-content blockquote {
  margin: 1.5rem 0;
  padding: 1rem 1.5rem;
  border-left: 4px solid #007bff;
  background-color: #f8f9fa;
  font-style: italic;
}

.modal-header {
  background: linear-gradient(135deg, #24243e 0%, #302b63 50%, #0f0c29 100%);
  color: #fff;
  border-bottom: none;
}

.modal-body {
  padding: 2rem;
}

/* Enhanced card styles */
.news-text {
  color: #444;
  font-size: 0.95rem;
  line-height: 1.6;
  margin-bottom: 1rem;
  overflow: hidden;
  text-overflow: ellipsis;
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  flex-grow: 1;
}

.news-date {
  font-size: 0.85rem;
  color: #666;
  margin-bottom: 1rem;
  font-weight: 500;
}

/* Responsive adjustments */
@media (max-width: 768px) {
  .modal-body {
    padding: 1rem;
  }
  
  .article-content {
    font-size: 1rem;
    line-height: 1.6;
  }
    .article-content, 
    .formatted-content, 
    .formatted-content p {
        text-align: left; /* Switch to left alignment on mobile for better readability */
    }

}
</style>

<script>



toastr.options = {
  closeButton: true,
  progressBar: true,
  positionClass: "toast-top-right",
  timeOut: 3000
};
$(document).ready(function() {


  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


  function validateForm(form) {
    const requiredFields = $(form).find('[required]');
    let isValid = true;
    const errors = [];

    requiredFields.each(function() {
      if (!$(this).val()) {
        isValid = false;
        const fieldName = $(this).prev('label').text() || $(this).attr('name');
        errors.push(`${fieldName} is required`);
        $(this).addClass('is-invalid');
      } else {
        $(this).removeClass('is-invalid');
      }
    });

    if (!isValid) {
      errors.forEach(error => toastr.error(error));
    }

    return isValid;
  }

  function createNewsItem(item) {
  const date = new Date(item.created_at).toLocaleDateString('en-US', { 
    year: 'numeric', 
    month: 'long', 
    day: 'numeric'
  });
  
  const truncatedContent = item.content.length > 150 ? 
    item.content.substring(0, 150) + '...' : 
    item.content;

  return `
    <div class="col-md-4 mb-4">
      <div class="card news-card" data-id="${item.id}">
        <div class="news-image-container">
          <img src="/api/serve/${item.id}" alt="${item.title}" class="news-image">
        </div>
        <div class="news-content">
          <h5 class="news-title">${item.title}</h5>
          <p class="news-date">
            <i class="far fa-calendar-alt mr-1"></i>
            ${date}
          </p>
          <p class="news-text">${truncatedContent}</p>
            <div class="news-actions">
            <button class="btn btn-sm btn-primary read-more">
              <i class="fas fa-book"></i> Read More
            </button>
            <div class="news-admin-actions">
              <button class="btn btn-sm btn-outline-primary edit-news">
              <i class="fas fa-edit"></i> Edit
              </button>
              <button class="btn btn-sm btn-outline-danger delete-news">
              <i class="fas fa-trash"></i> Delete
              </button>
            </div>
            </div>
        </div>
      </div>
    </div>
  `;
}

function displayNews() {
    $.ajax({
      url: '/api/news',
      method: 'GET',
      success: function(newsItems) {
        const newsContainer = $('#newsContainer');
        newsContainer.empty();
        newsItems.forEach((item, index) => {
          newsContainer.append(createNewsItem(item, index));
        });
        toastr.success('News items loaded successfully');
      },
      error: function(error) {
        toastr.error('Error loading news items');
        console.error('Error fetching news items:', error);
      }
    });
  }

    displayNews();

    $('#newsContainer').on('click', '.news-card', function() {
    const id = $(this).data('id');
    $.ajax({
      url: `/api/news/${id}`,
      method: 'GET',
      success: function(item) {
        $('#articleModalLabel').text(item.title);
        $('#modalImage').attr('src', `/api/serve/${id}`).attr('alt', item.title);
        $('#modalContent').html(item.full_content);
        $('#articleModal').modal('show');
      },
      error: function(error) {
        toastr.error('Error loading article details');
        console.error('Error fetching news item:', error);
      }
    });
  });

    // Add new news item
    $('#addNewsForm').submit(function(e) {
    e.preventDefault();
    
    if (!validateForm(this)) {
      return;
    }

    const formData = new FormData(this);
    $.ajax({
      url: '/api/news',
      method: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      success: function(response) {
        displayNews();
        $('#addNewsModal').modal('hide');
        $(this).trigger('reset');
        toastr.success('News item added successfully');
      },
      error: function(error) {
        toastr.error(error.responseJSON?.message || 'Error adding news item');
        console.error('Error adding news item:', error);
      }
    });
  });



// Edit News
  $('#newsContainer').on('click', '.edit-news', function(e) {
    e.stopPropagation();
    const id = $(this).closest('.news-card').data('id');
    $.ajax({
      url: `/api/news/${id}`,
      method: 'GET',
      success: function(item) {
        $('#editNewsId').val(item.id);
        $('#editNewsTitle').val(item.title);
        $('#editNewsContent').val(item.content);
        $('#editNewsFullContent').val(item.full_content);
        $('#editNewsModal').modal('show');
      },
      error: function(error) {
        toastr.error('Error loading news item for editing');
        console.error('Error fetching news item for edit:', error);
      }
    });
  });

  $('#editNewsForm').submit(function(e) {
    e.preventDefault();
    
    if (!validateForm(this)) {
      return;
    }

    const formData = new FormData(this);
    const id = $('#editNewsId').val();
    $.ajax({
      url: `/api/news/${id}`,
      method: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      success: function(response) {
        displayNews();
        $('#editNewsModal').modal('hide');
        toastr.success('News item updated successfully');
      },
      error: function(error) {
        toastr.error(error.responseJSON?.message || 'Error updating news item');
        console.error('Error updating news item:', error);
      }
    });
  });

  $('#newsContainer').on('click', '.news-card', function() {
  const id = $(this).data('id');
  $.ajax({
    url: `/api/news/${id}`,
    method: 'GET',
    success: function(item) {
      const date = new Date(item.created_at).toLocaleDateString('en-US', { 
        weekday: 'long',
        year: 'numeric', 
        month: 'long', 
        day: 'numeric'
      });
      
      // Format the content by properly spacing paragraphs
      const formattedContent = item.full_content
        .split('\n')
        .map(paragraph => paragraph.trim())
        .filter(paragraph => paragraph.length > 0)
        .map(paragraph => `<p>${paragraph}</p>`)
        .join('');
      
      $('#articleModalLabel').text(item.title);
      $('#modalDate').text(date);
      $('#modalImage').attr('src', `/api/serve/${id}`).attr('alt', item.title);
      $('#modalContent').html(formattedContent);
      $('#articleModal').modal('show');
    },
    error: function(error) {
      toastr.error('Error loading article details');
      console.error('Error fetching news item:', error);
    }
  });
});


 // Delete news item
$('#newsContainer').on('click', '.delete-news', function(e) {
    e.stopPropagation();
    const id = $(this).closest('.news-card').data('id');
    $('#deleteNewsModal').data('news-id', id).modal('show');
});

// Add confirmation handler for delete modal
$('#confirmDeleteNews').click(function() {
    const id = $('#deleteNewsModal').data('news-id');
    $.ajax({
        url: `/api/news/${id}`,
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            $('#deleteNewsModal').modal('hide');
            toastr.success('News item deleted successfully');
            displayNews();
        },
        error: function(error) {
            toastr.error('Error deleting news item');
            console.error('Error deleting news item:', error);
        }
    });
});
// Add sharing functionality
$('#shareArticle').click(function() {
  const title = $('#articleModalLabel').text();
  const url = window.location.href;
  
  if (navigator.share) {
    navigator.share({
      title: title,
      url: url
    })
    .catch(error => console.log('Error sharing:', error));
  } else {
    // Fallback copy to clipboard
    const dummy = document.createElement('input');
    document.body.appendChild(dummy);
    dummy.value = url;
    dummy.select();
    document.execCommand('copy');
    document.body.removeChild(dummy);
    toastr.success('Link copied to clipboard!');
  }
});


  $('.modal').on('hidden.bs.modal', function() {
    const form = $(this).find('form');
    if (form.length) {
      form[0].reset();
      form.find('.is-invalid').removeClass('is-invalid');
    }
  });

    // Add News button to open the Add News Modal
    $('#addNewsButton').click(function() {
        $('#addNewsModal').modal('show');
    });
});

$('.modal .close, .modal .btn-secondary').on('click', function() {
    $(this).closest('.modal').modal('hide');
});
</script>
@endsection