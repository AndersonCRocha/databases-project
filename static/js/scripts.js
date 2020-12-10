$(document).ready(function () {

  $('.form input').focus(function() {
    $(this).addClass('input-filled ')
    $(this).parent().find('label').addClass('label-top')
  })
 
  $('.form input').focusout(function() {
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