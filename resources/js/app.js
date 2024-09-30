
$(function() {
  $('#sidebarToggleBtn').click(function() {
      $('#sidebar').toggleClass('show');
  });

  
    const $toggleButton = $('#toggle-filters');
    const $filterOptions = $('#filterOptions');
    
    // Click event for toggle button
    $toggleButton.on('click', function (e) {
        e.preventDefault();
        $filterOptions.collapse('toggle');
    });

    // Bootstrap collapse events
    $filterOptions.on('shown.bs.collapse', function () {
        $toggleButton.text('- Hide filters');
    });

    $filterOptions.on('hidden.bs.collapse', function () {
        $toggleButton.text('+ Show filters');
    });


    var confirmDeleteModal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));

    $('.delete-btn').on('click', function(event) {
        event.preventDefault();
        var button = $(this);
        var recordId = button.data('id');
        var deleteUrl = button.data('url');
        var recordType = button.data('type'); // Get the data-type attribute
    
        // Update the modal's content
        $('#confirmDeleteMessage').text(`Are you sure you want to delete this ${recordType} with ID ${recordId}?`);
    
        // Handle the confirm delete button click
        $('#confirmDeleteBtn').off('click').on('click', function () {
            var form = $('<form>', {
                method: 'POST',
                action: deleteUrl
            });
    
            $('<input>', {
                type: 'hidden',
                name: '_token',
                value: $('meta[name="csrf-token"]').attr('content')
            }).appendTo(form);
    
            $('<input>', {
                type: 'hidden',
                name: '_method',
                value: 'DELETE'
            }).appendTo(form);
    
            $('body').append(form);
            form.submit();
        });
    
        confirmDeleteModal.show();
    });
    
    
  });
  