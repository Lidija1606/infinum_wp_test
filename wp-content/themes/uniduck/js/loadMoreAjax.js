jQuery(document).ready(function () {
  var page = 2;
  jQuery(function($) {
      $('body').on('click', '.load-more-btn', function() {
          var data = {
              'action': 'load_posts_by_ajax',
              'page': page,
              'security': blog.security
          };
   
          $.post(blog.ajaxurl, data, function(response) {
              if($.trim(response) != '') {
                  $('.blog-posts').append(response);
                  page++;
              } else {
                  $('.load-more-btn').hide();
              }
          });
      });
  });

});