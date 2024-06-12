window.addEventListener('load', function() {
    jQuery.prototype.init.prototype = jQuery.prototype;
 var options ={
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
      };
CKEDITOR.config.height=200;
CKEDITOR.config.widht='auto';
CKEDITOR.replace('body',options);

})
