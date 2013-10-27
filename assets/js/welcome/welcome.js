$(document).ready(function() { 

    $('#complex-model').hide();
    $('#info-complex-model').hide();
    
    $("body").queryLoader2({
        barColor: "#92D050",
        backgroundColor: "#181717",
        percentage: true,
        barHeight: 30,
        completeAnimation: "fade"
    });

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

    $('#qLoverlay').hide();

    var roomType = 'liv';
    var room = 'LIV23';
    var floor = 0;
    var wall = 0;

    var default_room_img = 'LIV23';
    var default_floor_img = 'LIV23';
    var default_wall_img = 'BAT7';

    var tiles_w = 30;
    var tiles_h = 30;

    var tcat = 'Ceramics';
    var tsize = '30cm x 30cm';
    var tmodel = '302-GR';
    var tprice = 39;
    var ttophalf = '';
    var tdecor = '';
    var tborder = '';
    var tbothalf = '';

    var big = 0;

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
            $('.tiles-info-bar #size').html($(this).attr('data-size'));
            var ar = $(this).attr('data-model').split("_");
            if(ar.length > 1)
            {
                big = 1;
                $('.tiles-info-bar #ctophalf').html(ar[1]);
                $('.tiles-info-bar #cdecor').html(ar[2]);
                $('.tiles-info-bar #cborder').html(ar[3]);
                $('.tiles-info-bar #cbothalf').html(ar[4]);
                $('#info-complex-model').show();
                $('#info-simple-model').hide();
                $('#complex-model').show();
                $('#simple-model').hide();
                ttophalf = ar[1];
                tdecor = ar[2];
                tborder = ar[3];
                tbothalf = ar[4];                
                $('#mtophalf').html(ttophalf);
                $('#mdecor').html(tdecor);
                $('#mborder').html(tborder);
                $('#mbothalf').html(tbothalf);
            }
            else
            {
                big = 0;
                $('.tiles-info-bar #model').html($(this).attr('data-model'));
                $('#info-complex-model').hide();
                $('#info-simple-model').show();
                $('#complex-model').hide();
                $('#simple-model').show();
                tmodel = $(this).attr('data-model');
                $('#mmodel').html(tmodel);
            }
            $('.tiles-info-bar #price').html($(this).attr('data-price') + ' Tk.');

            tcat = $(this).attr('data-cat');
            tsize = $(this).attr('data-size');
            tprice = $(this).attr('data-price');
            var numbers = [];
            $(this).attr('data-size').replace(/(\d[\d\.]*)/g, function( x ) { var n = Number(x); if (x == n) { numbers.push(x); }  })

            tiles_w = numbers[0];
            tiles_h = numbers[1];

            $('#mcat').html(tcat);
            $('#msize').html(tsize);
            $('#mprice').html(tprice + ' Tk.');
            $('#mimage').attr('src', 'uploads/files/tiles_thumb/' + $(this).attr('data-model') + '.jpg');

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
            $('.tiles-info-bar #size').html($(this).attr('data-size'));
            var ar = $(this).attr('data-model').split("_");
            if(ar.length > 1)
            {
                big = 1;
                $('.tiles-info-bar #ctophalf').html(ar[1]);
                $('.tiles-info-bar #cdecor').html(ar[2]);
                $('.tiles-info-bar #cborder').html(ar[3]);
                $('.tiles-info-bar #cbothalf').html(ar[4]);
                $('#info-complex-model').show();
                $('#info-simple-model').hide();
                $('#complex-model').show();
                $('#simple-model').hide();
                ttophalf = ar[1];
                tdecor = ar[2];
                tborder = ar[3];
                tbothalf = ar[4];                
                $('#mtophalf').html(ttophalf);
                $('#mdecor').html(tdecor);
                $('#mborder').html(tborder);
                $('#mbothalf').html(tbothalf);
            }
            else
            {
                big = 0;
                $('.tiles-info-bar #model').html($(this).attr('data-model'));
                $('#info-complex-model').hide();
                $('#info-simple-model').show();
                $('#complex-model').hide();
                $('#simple-model').show();
                tmodel = $(this).attr('data-model');
                $('#mmodel').html(tmodel);
            }
            $('.tiles-info-bar #price').html($(this).attr('data-price') + ' Tk.');

            tcat = $(this).attr('data-cat');
            tsize = $(this).attr('data-size');
            tprice = $(this).attr('data-price');
            var numbers = [];
            $(this).attr('data-size').replace(/(\d[\d\.]*)/g, function( x ) { var n = Number(x); if (x == n) { numbers.push(x); }  })

            tiles_w = numbers[0];
            tiles_h = numbers[1];

            $('#mcat').html(tcat);
            $('#msize').html(tsize);
            $('#mprice').html(tprice + ' Tk.');
            $('#mimage').attr('src', 'uploads/files/tiles_thumb/' + $(this).attr('data-model') + '.jpg');

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
        $('#cat_tick').remove();
        $(this).append('<i id="cat_tick" class="icon-ok right"></i>');
        if(this.id != 'f-all')
        {
            $('.nav-floor ul li').hide();
            $('.nav-floor ul li.' + room + '-' + this.id).show();
        }
        else
            $('.nav-floor ul li.' + room).show();

    });

    $('.top-wall a').click(function() {
        if(this.id.substring(2, 8) == 'border')
        {
            $('#border_tiles').modal('show');
        }
        else
        {
            $('#cat_tick').remove();
            $(this).append('<i id="cat_tick" class="icon-ok right"></i>');
            if(this.id != 'w-all')
            {
                $('.nav-wall ul li').hide();
                $('.nav-wall ul li.' + room + '-' + this.id).show();
            }
            else
                $('.nav-wall ul li.' + room).show();
        }
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

    $('#mcat').html(tcat);
    $('#msize').html(tsize);
    $('#mmodel').html(tmodel);
    $('#mprice').html(tprice + ' Tk.');
    $('#mimage').attr('src', 'uploads/files/tiles_thumb/' + tmodel + '.jpg');

    // $('.dropdown-modal-type li a').click(function(){
    //     $('.btn-modal-type').text($(this).text());
    //     $('#modal_type').val($('.btn-modal-type').text());
    //     $('.tiles-price-modal #total_area_type').text($(this).text());
    //     calculate(tiles_w, tiles_h, tprice, big);
    // });

    $('#user_room_width, #user_room_height').keyup(function(){
        calculate(tiles_w, tiles_h, tprice, big);
    });

    $('#user_room_width, #user_room_height').click(function(){
        if($(this).val() == '0')
            $(this).val('');
    });

    $('#price_cal').on('hidden', function () {
        $('#user_room_width').val('0');
        $('#user_room_height').val('0');
        $('#modal_type').val('Feets');
        $('.btn-modal-type').text('Feets');
        $('.tiles-price-modal #total_area_type').text('Feets');
        $('.tiles-price-modal #total_area').text('0');
        $('.tiles-price-modal #total_piece').text('0.00');
        $('.tiles-price-modal #total_amount').text('0.00');
    })
    
    barActive();

    $('.carousel').carousel();

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
    barActive();
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

function calculate(tiles_w, tiles_h, price, big) 
{
        var width = 0;
        var height = 0;
        if($('#user_room_width').val() != '')
            width = $('#user_room_width').val();
        if($('#user_room_height').val() != '')
            height = $('#user_room_height').val();

        var tw = width;
        var th = height;
        var tarea = width*height;

        var price_res = price*tarea;

        $('.tiles-price-modal #total_area').text(tarea);
        //$('.tiles-price-modal #total_piece').text(parseFloat(Math.round(tpcs * 100) / 100).toFixed(2));
        $('.tiles-price-modal #total_amount').text(parseFloat(Math.round((price_res) * 100) / 100).toFixed(2));

        if(big == 1) {
            $('#extra_charge').html('** Extra charges will be applicable if you add decore or border tiles.');
        }
        else
            $('#extra_charge').html('');
}

function barActive()
{
    var vf = numOfVisibleElement('.nav-floor-content ul li');
    var vw = numOfVisibleElement('.nav-wall-content ul li');

    if(vf == 0)
    {        
        $( "#bfloor" ).hide( "slide" );
        $( ".floor-bar" ).hide( "slide" );
        if(vw == 0)
        {
            $('#cat_tick').remove();
            $('#w-all').append('<i id="cat_tick" class="icon-ok right"></i>');
        }        
    }
    else
    {
        $( "#bfloor" ).show( "slide" );
        $( ".floor-bar" ).show( "slide" );
    }

    if(vw == 0)
    {
        $( "#bwall" ).hide( "slide" );
        $( ".wall-bar" ).hide( "slide" );
        $( "#bfloor" ).css( {"margin-right":"-10px"} );
        $( ".floor-bar" ).css( {"right":"10px"} );
        if(vf == 0)
        {
            $('#cat_tick').remove();
            $('#f-all').append('<i id="cat_tick" class="icon-ok right"></i>');
        }
    }
    else
    {
        $( "#bwall" ).show( "slide" );
        $( ".wall-bar" ).show( "slide" );
        $( "#bfloor" ).css( {"margin-right":"0px"} );
        $( ".floor-bar" ).css( {"right":"196px"} );
    }

    if((vf != 0) && (vw != 0))
    {
        $( ".preview-bar" ).css( {"width":"75%"} );
    }
    else
    {
        $( ".preview-bar" ).css( {"width":"85%"} );
    }
}