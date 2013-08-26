
      $(document).ready(function(){

      	$('.dropdown-tiles-type li a').click(function(){
      	  	$('.btn-tiles-type').text($(this).text());
      	  	$('#tiles_type').val($('.btn-tiles-type').text());
      	});

      	$('.dropdown-tiles-size li a').click(function(){
                  $('.btn-tiles-size').text($(this).text());
                  $('#tiles_size').val($('.btn-tiles-size').text());
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
                            $('#files').html('<p><img src="../../../uploads/files/tiles_thumb/' + file.name + '" /></p>');
                            $('#tiles_code').val(file.name.substring(0, file.name.length - 4));
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