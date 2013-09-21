$(document).ready(function() { 

    $('.loading').show();  

    $('img').hide();
    $('img').each(function(i) {
        if (this.complete) {
            $(this).fadeIn(1000);
        } else {
            $(this).load(function() {
                $(this).fadeIn(1000);
            });
        }
    });
});


$(window).load(function() {

    var roomType = 'liv';
    var room = 'LIV23';
    var floor = 0;
    var wall = 0;

    var default_room_img = 'LIV23';
    var default_floor_img = 'LIV23';
    var default_wall_img = 'BAT7';

    $("input:radio[id=liv]:first").attr('checked', true);

    $('.nav-room ul li').hide();
    $('.nav-wall ul li').hide();
    $('.nav-floor ul li').hide();
    $('.nav-room ul li.liv').show();
    $('.nav-wall ul li.liv').show();
    $('.nav-floor ul li.liv').show();

    $('.nav-floor ul li.' + room).show();

    var loading = 'assets/img/image.gif';
    var image = 'uploads/files/' + default_room_img + '.jpg';

    $('.preview-image').attr('src', image);
    $('.preview-image').load(function() {
        $('meta[property="og:image"]').attr('content', 'http://eventconnectbd.com/design/' + $('.preview-image').attr('src'));
        $('#fb').attr('href', 'https://www.facebook.com/sharer/sharer.php?s=100&p[url]=http://eventconnectbd.com/design/&p[title]=Click %26 See %7C Akij Ceramics Ltd.&p[images][0]=http://eventconnectbd.com/design/' + $('.preview-image').attr('src') + '&p[summary]=Akij Group is one of the pioneers of the manufacturing industry in Bangladesh.');
        $('#save').attr('href', 'http://eventconnectbd.com/design/' + $('.preview-image').attr('src'));
        $('.loading').hide();  
    });

    $('#' + default_room_img).css('background', '#FEECE2');

    $('.nav-room li img').click(function() {
        if(room != $(this).attr('id'))
        {
            $('.loading').show();
            room = $(this).attr('id');
            var img = 'uploads/files/' + room + '_' + floor + '_' + wall + '.jpg';            
            if(!url_exists(img))
            {
                floor = 0;
                wall = 0;
                img = 'uploads/files/' + room + '.jpg';
            } 
            
            $('.preview-image').attr('src', img);

            $('.nav-wall ul li').hide();
            $('.nav-floor ul li').hide();
            $('.nav-wall ul li.' + room).show();
            $('.nav-floor ul li.' + room).show();
            select(room, wall, floor);        
        }
    });

    $('.nav-floor li img').click(function() {
        if(floor != $(this).attr('id'))
        {
            $('.loading').show();
            floor = $(this).attr('id');
            var img = 'uploads/files/' + room + '_' + floor + '_' + wall + '.jpg';
            if(!url_exists(img))
            {
                wall = 0;
                room = default_floor_img;
                img = 'uploads/files/' + room + '_' + floor + '_' + wall + '.jpg';
            }  
            
            $('.preview-image').attr('src', img);
            $('.tiles-info-bar #cat').html($(this).attr('data-cat'));
            $('.tiles-info-bar #model').html($(this).attr('id'));
            $('.tiles-info-bar #price').html($(this).attr('data-price') + ' Tk.');
            select(room, wall, floor);    
        }
    });

    $('.nav-wall li img').click(function() {
        if(wall != $(this).attr('id'))
        {
            $('.loading').show();
            wall = $(this).attr('id');
            var img = 'uploads/files/' + room + '_' + floor + '_' + wall + '.jpg';
            if(!url_exists(img))
            {
                floor = 0;
                room = default_wall_img;
                img = 'uploads/files/' + room + '_' + floor + '_' + wall + '.jpg';
            }
            
            $('.preview-image').attr('src', img);
            $('.tiles-info-bar #cat').html($(this).attr('data-cat'));
            $('.tiles-info-bar #model').html($(this).attr('id'));
            $('.tiles-info-bar #price').html($(this).attr('data-price') + ' Tk.');
            select(room, wall, floor);
        }
    });


    $('.room-type').change(function(){
        $('.loading').show();

        roomType = this.id;

        floor = 0;
        wall = 0;
        room = 0;
        if($('.nav-room ul li.' + this.id).attr('id'))
        {
            room = $('.nav-room ul li.' + this.id).attr('id');
            room = room.substring(0, room.length-1);
        }     

        $('.nav-room ul li').hide();
        $('.nav-wall ul li').hide();
        $('.nav-floor ul li').hide();
        $('.nav-room ul li.' + this.id).show();
        $('.nav-wall ul li.' + room).show();
        $('.nav-floor ul li.' + room).show();   

        img = 'uploads/files/' + room + '.jpg';
        
        $('.preview-image').attr('src', img);
        select(room, wall, floor);
    });


    $('.top-floor a').click(function() {
        if(this.id != 'f-all')
        {
            $('.nav-floor ul li').hide();
            $('.nav-floor ul li.' + room + '-' + this.id).show();
        }
        else
            $('.nav-floor ul li.' + room).show();

    });

    $('.top-wall a').click(function() {
        if(this.id != 'w-all')
        {
            $('.nav-wall ul li').hide();
            $('.nav-wall ul li.' + room + '-' + this.id).show();
        }
        else
            $('.nav-wall ul li.' + room).show();
    });

    $('body').on('click', function (e) {
        $('.popover-link').each(function () {
            if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
                $(this).popover('hide');
            }
        });
    });

    $('#fb').tooltip();
    $('#tw').tooltip();
    $('#gp').tooltip();
    $('#save').tooltip();
    $('#info').tooltip();

    $("#info").click(function(){
        $(".alert").toggle();
    });

    $(".alert").alert();

    $(".preview-image").mouseover(function(){
        $(".alert").css('opacity',0.1);
    });

    $(".preview-image").mouseout(function(){
        $(".alert").css('opacity',0.7);
    });

});

function url_exists(url)
{
    var http = new XMLHttpRequest();
    http.open('HEAD', url, false);
    http.send();
    return http.status!=404;
}

function select(room, wall, floor) 
{
    $('.nav-room li img').css('background', '#FFFFFF');
    $('.nav-wall li img').css('background', '#FFFFFF');
    $('.nav-floor li img').css('background', '#FFFFFF');

    $('#' + room).css('background', '#FEECE2');
    $('#' + wall).css('background', '#FEECE2');
    $('#' + floor).css('background', '#FEECE2');

    if($('.preview-image').attr('src') != 'uploads/files/0.jpg')
    { 
        $('.preview-image').attr('alt', 'Please wait...');
        $('.preview-image').load(function() {
            $('meta[property="og:image"]').attr('content', 'http://eventconnectbd.com/design/' + $('.preview-image').attr('src'));
            $('#fb').attr('href', 'https://www.facebook.com/sharer/sharer.php?s=100&p[url]=http://eventconnectbd.com/design/&p[title]=Click %26 See %7C Akij Ceramics Ltd.&p[images][0]=http://eventconnectbd.com/design/' + $('.preview-image').attr('src') + '&p[summary]=Akij Group is one of the pioneers of the manufacturing industry in Bangladesh.');
            $('#save').attr('href', 'http://eventconnectbd.com/design/' + $('.preview-image').attr('src'));            
            $('meta[name=og\\:image]').attr('content', $('.preview-image').attr('src'));
            $('.loading').hide();  
        });
    }
    else
    {
        $('.preview-image').attr('alt', 'Sorry! There is no room in this category.');
        $('#save').attr('href', '#' + $('.preview-image').attr('src'));
        $('.loading').hide();  
    }
}

function numOfVisibleElement(element) 
{
    var numOfVisibleRows = $(element).filter(function() {
          return $(this).css('display') !== 'none';
    }).length;

    return numOfVisibleRows;
}