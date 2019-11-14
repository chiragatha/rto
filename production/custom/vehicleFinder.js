$(document).ready(function() {
    $('input.vehicleFinder').typeahead({
        name: 'vehicleFinder',
        remote: 'data/searchVehicles.php?query=%QUERY'
      });
  })