$(document).ready(function() {
    $('input.rcHolderFinder').typeahead({
        name: 'rcHolderFinder',
        remote: 'data/searchRCholder.php?query=%QUERY'
      });
  })