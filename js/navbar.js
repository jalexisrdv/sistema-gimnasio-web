$(function() {
    // Sidebar toggle behavior
    $('#sidebarCollapse').on('click', function() {
      $('#sidebar, .principal-content').toggleClass('active');
    });
  });