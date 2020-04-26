(function ($) {
  $("#plugin-dev-enquiry-form form").on("submit", function (e) {
    e.preventDefault();

    var data = $(this).serialize();

    $.post(pluginDev.ajaxurl, data, function (response) {
      if (response.success) {
        console.log(response.success);
      } else {
        alert(response.data.message);
      }
    }).fail(function (error) {
      alert(pluginDev.error);
    });
  });
})(jQuery);
