  $(document).ready(function(){

      var che=$('.ch-href').text();


         if ($('.ch-href').on('click', function (e) {
                 if ($('.ch-href').text() == 'Регистрация') {
                     e.preventDefault();
                     $('#login').css('display', 'none');
                     $('#registration').css('display', 'block');
                 }
                 $('.btn-choo').text('Регистрация');
                 $('.check-flow').css('display', 'none');
                 $('span.btn-choo').attr("title","Sign-Up");
             }));

          if ($('.ch-href1').on('click', function (e) {
                  if ($('.ch-href1').text() == 'Вернуться к входу') {
                      e.preventDefault();
                      $(che).text('Регистрация');
                      $('#login').css('display', 'block');
                      $('#registration').css('display', 'none');
                      $('.btn-choo').text('Войти');
                      $('span.btn-choo').attr("title","Sign-In");
                      $('.check-flow').css('display', 'block');
                  }

              }));

          if ($('.reset-pass').on('click', function (e) {

                      e.preventDefault();
                      $('#login').css('display', 'none');
                      $('#registration').css('display', 'none');
                      $('#reset-pass').css('display', 'block');
                      $('.btn-choo').text('Восстановить');
                      $('span.btn-choo').attr("title","Reset");
                      $('.check-flow').css('display', 'none');
          }));

         if ($("span[name='Sign-In']").on('click', function (e) {
           console.log('нажали на спан войти');
             }));

  });