(function ($) {
  $("table.wp-list-table.contacts").on("click", "a.submitdelete", function (
    event
  ) {
    event.preventDefault();
    if (!confirm(pluginDev.confirm)) {
      return;
    }

    var self = $(this),
      id = self.data("id");

    wp.ajax
      //   .send("wd-plugin-delete-contact", {
      //     data: {
      //       id: id,
      //       _wpnonce: pluginDev.nonce,
      //     },
      //   })
      .post("wd-plugin-delete-contact", {
        id: id,
        _wpnonce: pluginDev.nonce,
      })
      .done(function (response) {
        self
          .closest("tr")
          .css("background-color", "red")
          .hide(400, function () {
            $(this).remove();
          });
      })
      .fail(function () {
        alert(pluginDev.error);
      });
  });
})(jQuery);
