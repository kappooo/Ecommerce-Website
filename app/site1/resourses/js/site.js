$(document).ready(function () {
  var trigger = $('.hamburger'),
      overlay = $('.overlay'),
     isClosed = false;

    trigger.click(function () {
      hamburger_cross();      
    });

    function hamburger_cross() {

      if (isClosed == true) {          
        overlay.hide();
        trigger.removeClass('is-open');
        trigger.addClass('is-closed');
        isClosed = false;
      } else {   
        overlay.show();
        trigger.removeClass('is-closed');
        trigger.addClass('is-open');
        isClosed = true;
      }
  }
  
  $('[data-toggle="offcanvas"]').click(function () {
        $('#wrapper').toggleClass('toggled');
  });  
});


$(document).ready(function () {
     
    var click_num = 0;
    $('.rating span').mouseover(function () {
        $('rating span').css("color", "black");
        $(this).prevAll().css("color", "#EB9515");
        $(this).css("color", "#EB9515");
    });
    $('.rating span').mouseleave(function () {
        if (click_num === 0 || click_num > 5) {
            $('#1_star').css("color", "black");
            $('#2_star').css("color", "black");
            $('#3_star').css("color", "black");
            $('#4_star').css("color", "black");
            $('#5_star').css("color", "black");
        }
        else if (click_num == 1) {
            $('#1_star').css("color", "#EB9515");
            $('#2_star').css("color", "black");
            $('#3_star').css("color", "black");
            $('#4_star').css("color", "black");
            $('#5_star').css("color", "black");
        }
        else if (click_num == 2) {
            $('#1_star').css("color", "#EB9515");
            $('#2_star').css("color", "#EB9515");
            $('#3_star').css("color", "black");
            $('#4_star').css("color", "black");
            $('#5_star').css("color", "black");
        }
        else if (click_num == 3) {
            $('#1_star').css("color", "#EB9515");
            $('#2_star').css("color", "#EB9515");
            $('#3_star').css("color", "#EB9515");
            $('#4_star').css("color", "black");
            $('#5_star').css("color", "black");
        }
        else if (click_num == 4) {
            $('#1_star').css("color", "#EB9515");
            $('#2_star').css("color", "#EB9515");
            $('#3_star').css("color", "#EB9515");
            $('#4_star').css("color", "#EB9515");
            $('#5_star').css("color", "black");
        }
        else if (click_num == 5) {
            $('#1_star').css("color", "#EB9515");
            $('#2_star').css("color", "#EB9515");
            $('#3_star').css("color", "#EB9515");
            $('#4_star').css("color", "#EB9515");
            $('#5_star').css("color", "#EB9515");
        }
    });
    $('#1_star').click(function () {
        click_num = 1;
    });
    $('#2_star').click(function () {
        click_num = 2;
    });
    $('#3_star').click(function () {
        click_num = 3;
    });
    $('#4_star').click(function () {
        click_num = 4;
    });
    $('#5_star').click(function () {
        click_num = 5;
    });
    var phone_id = $('#phone_id').val();
    $('#add_rate').click(function () {
        $.ajax({
            url: 'index.php?page=specifications/rating_2.php',
            type: 'POST',
            data: {click_num: click_num, phone_id: phone_id},
            success: function (response) {
                $('#response').html(response);
            }
        });
    });
});
