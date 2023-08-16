$('.click').on('click', function () {
  $('.click').toggleClass('hidden');
  $('.visible').hasClass('hidden') ? $('#password').attr('type', 'password') : $('#password').attr('type', 'text');
})