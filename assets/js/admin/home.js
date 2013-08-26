
      $(document).ready(function(){

            $(function () {
                'use strict';
                // Change this to the location of your server-side upload handler:

                var url = '../uploads/server/';
                $('#fileupload').fileupload({
                    url: url,
                    dataType: 'json',
                    acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
                    done: function (e, data) {
                        $.each(data.result.files, function (index, file) {
                            $('<p/>').html('<img src="../uploads/files/tiles_thumb/' + file.name + '" />').appendTo('#files');
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