
$(document).ready(function() {

    var room = 'BED3';
    var floor = 0;
    var wall = 0;

    var default_room_img = 'BED3';
    var default_floor_img = 'BED3';
    var default_wall_img = 'BAT7';

    var loading = 'assets/img/image.gif';
    var image = 'uploads/files/' + default_room_img + '.jpg';

    $('.preview-image').removeClass('loading-image');
    $('.preview-image').attr('src', image);
    $('#' + default_room_img).css('border', '1px solid #EF602F');

    $('.nav-room li img').click(function() {
        if(room != $(this).attr('id'))
        {
            $('.preview-image').attr('src', loading);
            $('.preview-image').addClass('loading-image');
            room = $(this).attr('id');
            var img = 'uploads/files/' + room + '_' + floor + '_' + wall + '.jpg';            
            $('.preview-image').removeClass('loading-image');
            if(url_exists(img))
            {
                $('.preview-image').attr('src', img);
            }
            else
            {
                floor = 0;
                wall = 0;
                $('.preview-image').attr('src', 'uploads/files/' + room + '.jpg');
            } 
            select(room, wall, floor);           
        }
    });

    $('.nav-floor li img').click(function() {
        if(floor != $(this).attr('id'))
        {
            $('.preview-image').attr('src', loading);
            $('.preview-image').addClass('loading-image');
            floor = $(this).attr('id');
            var img = 'uploads/files/' + room + '_' + floor + '_' + wall + '.jpg';
            $('.preview-image').removeClass('loading-image');
            if(url_exists(img))
            {
                $('.preview-image').attr('src', img);
            }
            else 
            {
                wall = 0;
                room = default_floor_img;
                $('.preview-image').attr('src', 'uploads/files/' + room + '_' + floor + '_' + wall + '.jpg');
            }  
            select(room, wall, floor);         
        }
    });

    $('.nav-wall li img').click(function() {
        if(wall != $(this).attr('id'))
        {
            $('.preview-image').attr('src', loading);
            $('.preview-image').addClass('loading-image');
            wall = $(this).attr('id');
            var img = 'uploads/files/' + room + '_' + floor + '_' + wall + '.jpg';
            $('.preview-image').removeClass('loading-image');
            if(url_exists(img))
            {
                $('.preview-image').attr('src', img);
            }
            else 
            {
                floor = 0;
                room = default_wall_img;
                $('.preview-image').attr('src', 'uploads/files/' + room + '_' + floor + '_' + wall + '.jpg');
            }
            select(room, wall, floor);
        }
    });


});

function url_exists(url)
{
    var http = new XMLHttpRequest();
    http.open('HEAD', url, false);
    http.send();
    return http.status!=404;
}

function select(room, wall, floor) {
    $('.nav-room li img').css('border', '1px solid #ccc');
    $('.nav-wall li img').css('border', '1px solid #ccc');
    $('.nav-floor li img').css('border', '1px solid #ccc');

    $('#' + room).css('border', '1px solid #EF602F');
    $('#' + wall).css('border', '1px solid #EF602F');
    $('#' + floor).css('border', '1px solid #EF602F');
}