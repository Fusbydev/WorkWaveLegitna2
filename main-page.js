$(document).ready(function() {
    // Function to update the dataContainer with search results
    function updateDataContainer(data) {
        var container = $('#dataContainer');
        container.empty(); // Clear existing content

        $.each(data, function(index, item) {
            var truncatedDescription = item.description.length > 100 ? item.description.substring(0, 100) + '...' : item.description;
            var html = '<div class="col-md-4 mb-4">';
            html += '<div class="card" style="height: 498px;">';
            html += '<img src="logo.jpg" class="card-img-top mx-auto" alt="Card Image" style="height: 200px; width: 200px;">';
            html += '<div class="card-body flex-fill">';
            html += '<h5 class="card-title">' + item.title + '</h5>';
            html += '<p class="card-text">' + truncatedDescription + '</p>';
            html += '<p class="card-text">' + item.name + '</p>';
            html += '<p class="card-text">php ' + item.price + '/hour</p>';
            html += '<a href="services.php?serviceID=' + item.id + '&id=' + mainPageId + '&username=' + mainPageUsername + '" class="btn btn-primary">Hire Now</a>';
            console.log(item.id);
            html += '</div>';
            html += '</div>';
            html += '</div>';
            container.append(html);
        });
    }

    // Initial data load using AJAX
    $.ajax({
        url: "get-data.php",
        method: "GET",
        dataType: "json",
        success: function(data) {
            updateDataContainer(data);
        },
        error: function(xhr, status, error) {
            console.log(error);
        }
    });

    // Handle form submission for search
    $('#searchForm').submit(function(event) {
        event.preventDefault(); // Prevent the form from submitting in the traditional way

        var formData = $(this).serialize(); // Serialize form data
        $.ajax({
            url: "search.php",
            method: "GET",
            data: formData,
            dataType: "json",
            success: function(data) {
                updateDataContainer(data);
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    });
});
