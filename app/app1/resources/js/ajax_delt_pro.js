
function get_id(page,id,place) {
        var phone_id = id
        $.ajax({
            url: page,
            type: 'POST',
            data: {phone_id:phone_id},
            success: function (data) {
                if (!data.error) {
                    $(place).html(data);
                }
            }
        });
    }
    
    
    
    
