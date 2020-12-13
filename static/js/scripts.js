$(document).ready(function () {

  $('.phone').mask('(00) 00009-0000');
  $('.cpf').mask('000.000.000-00');
  $('.money').mask('#.##0', {reverse: true});

  $('.form input, .form select, .form textarea').each(function () {
    if ($(this).val() && $(this).attr('type') !== 'radio') {
      $(this).addClass('input-filled ')
      $(this).parent().find('label').addClass('label-top')
    }
  })

  $('input[name="gender"]:checked')
      .prev()
      .addClass('gender-selected');

  $('.form input, .form select, .form textarea').focus(function() {
    $(this).addClass('input-filled ')
    $(this).parent().find('label').addClass('label-top')
  })
 
  $('.form input, .form select, .form textarea').focusout(function() {
    if (!$(this).val()) {
      $(this).removeClass('input-filled ')
      $(this).parent().find('label').removeClass('label-top')
    }
  })

  $('input[name="gender"]').change(function() {
    $('.gender-selected').removeClass('gender-selected')
    $(this).parent().find(`label[for="${$(this).attr('id')}"]`).addClass('gender-selected')
  })

})