$(function() {
  'use strict'

  if ($(".select2-single").length) {
    $(".select2-single").select2({
      placeholder: "Select an option",
    });
  }

  if ($(".select2-office").length) {
    $(".select2-office").select2({
      placeholder: "Select an option",
    });
  }
  if ($(".js-example-basic-multiple").length) {
    $(".js-example-basic-multiple").select2();
  }

  $('body').on('shown.bs.modal', '.modal', function () {
    $(this).find('select').each(function () {
      var dropdownParent = $(document.body);
      if ($(this).parents('.modal.in:first').length !== 0)
        dropdownParent = $(this).parents('.modal.in:first');
      $(this).select2({
        placeholder: "Select an option",
        dropdownParent: dropdownParent
        // ...
      });
    });
  });
});