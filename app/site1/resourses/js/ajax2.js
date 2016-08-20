function get_page(page,id,place) {
        var search = $(id).val();
        var cat_id_1 =$('#cat_id_1').val();
        var cat_id_2 =$('#cat_id_2').val();
        var cat_id_3 =$('#cat_id_3').val();
        var id_1 = $('#id_1').val();
        var id_2 = $('#id_2').val();
        var id_3 = $('#id_3').val();
        $.ajax({
            url: page,
            type: 'POST',
            data: {search: search, id_1: id_1, id_2: id_2, id_3: id_3,cat_id_1:cat_id_1,cat_id_2:cat_id_2,cat_id_3:cat_id_3},
            success: function (data, id_1, id_2, id_3,cat_id_1,cat_id_2,cat_id_3) {
                if (!data.error) {
                    $(place).html(data);
                }
            }
        });
    }
    
    function wish_list(page,id,place) {
        var phone_id = id
        var search = $(id).val();
        var wishlis_id =$('#wishlis_id').val();
        $.ajax({
            url: page,
            type: 'POST',
            data: {phone_id:phone_id, search: search,wishlis_id:wishlis_id},
            success: function (data,wishlis_id) {
                if (!data.error) {
                    $(place).html(data);
                }
            }
        });
    }