(function ($) {
  $("#plugin-dev-enquiry-form").on("submit", function (e) {
    e.preventDefault();

    var data = $(this).serialize();

    $.post(pluginDev.ajaxurl, data, function (data) {}).fail(function (error) {
      alert(pluginDev.error);
    });
  });
})(jQuery);
