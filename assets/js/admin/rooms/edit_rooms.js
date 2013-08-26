
      $(document).ready(function(){

      	$('.dropdown-rooms-type li a').click(function(){
      	  	$('.btn-rooms-type').text($(this).text());
      	  	$('#rooms_type').val($('.btn-rooms-type').text());
      	});

        $('.rooms-support-floor-buttons button').click(function(){
            $('#rooms_support_floor').val(this.id);
        });

        $('.rooms-support-wall-buttons button').click(function(){
            $('#rooms_support_wall').val(this.id);
        });


            $(function () {
                'use strict';
                // Change this to the location of your server-side upload handler:

                var url = '../../../uploads/server/';
                $('#fileupload').fileupload({
                    url: url,
                    dataType: 'json',
                    acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
                    done: function (e, data) {
                        $.each(data.result.files, function (index, file) {
                            $('#files').html('');
                            $('#files').html('<p><img src="../../../uploads/files/rooms_thumb/' + file.name + '" /></p>');
                            $('#rooms_code').val(file.name.substring(0, file.name.length - 4));
                        });
                    },
                    progressall: function (e, data) {
                        var progress = parseInt(data.loaded / data.total * 100, 10);
                        $('#progress .bar').css(
                            'width',
                            progress + '%'
                        );
                    }
                }).prop('disabled', !$.support.fileInput)
                    .parent().addClass($.support.fileInput ? undefined : 'disabled');
            });

      }); 