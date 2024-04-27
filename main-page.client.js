$(document).ready(function() {
    $.ajax({
        url: "get-clients.php",
        method: "GET",
        dataType: "json",
        success: function(data) {
            var container = $('#dataContainer');

            $.each(data, function(index, item) {
                var truncatedDescription = item.description.length > 100 ? item.description.substring(0, 100) + '...' : item.description;

                var html = '<div class="col-md-4 mb-4">';
                html += '<div class="card" style="height: 498px;">';
                html += '<img src="logo.jpg" class="card-img-top mx-auto" alt="Card Image" style="height: 200px; width: 200px;">';
                html += '<div class="card-body flex-fill">';
                html += '<h5 class="card-title">' + item.looking_for + '</h5>';
                html += '<p class="card-text">' + truncatedDescription + '</p>';
                html += '<p class="card-text">' + item.username + '</p>';
                html += '<p class="card-text">php 1000/hour</p>';
                html += '<a href="hiring.php?serviceID='+item.id+'&cid=' + mainPageId + '&username=' + mainPageUsername + '" class="btn btn-primary">Apply Now</a>';
                console.log(item.id);
                container.append(html);
            });
        },
        error: function(xhr, status, error) {
            console.log(error);
        }
    });
});