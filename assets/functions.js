jQuery.noConflict();

jQuery(document).ready(function($){

  //select image
  var media_uploader = null;
  function avsm_open_media_uploader_image($clickedElement){
    media_uploader = wp.media({
        frame:    "post",
        state:    "insert",
        multiple: false
    });

    media_uploader.on("insert", function(){
        var json = media_uploader.state().get("selection").first().toJSON();
        var image_id = json.id;
        var image_url = json.url;
        var image_thumb = json.sizes.thumbnail;

        $clickedElementParent = $clickedElement.parent();
        $('input.avs-metabox-image-field',$clickedElementParent).val(image_id);
        $('.avs-metabox-image-preview',$clickedElementParent).html('<img src="'+image_thumb.url+'" width="'+image_thumb.width+'" height="'+image_thumb.height+'">');
    });

    media_uploader.open();
  }
  $( '.avs-metabox-cont .avs-metabox-image').on('click',function(){
    avsm_open_media_uploader_image($(this));
  });
  $( '.avs-metabox-cont .avs-metabox-image-remove').on('click',function(){
    var $imageField = $(this).parents('.avs-metabox-field').find('input.avs-metabox-image-field');
    var $imagePreview = $(this).parents('.avs-metabox-field').find('.avs-metabox-image-preview');
    $imageField.val('');
    $imagePreview.html('No image selected');
  });

  //select file
  var media_uploader = null;
  function avsm_open_media_uploader_file($clickedElement){
    media_uploader = wp.media({
        frame:    "post",
        state:    "insert",
        multiple: false
    });

    media_uploader.on("insert", function(){
        var json = media_uploader.state().get("selection").first().toJSON();
        var file_id = json.id;
        var file_url = json.url;
        var file_thumb = json.icon;
        var file_name = json.filename;

        $clickedElementParent = $clickedElement.parent();
        $('input.avs-metabox-file-field',$clickedElementParent).val(file_id);
        $('.avs-metabox-file-preview',$clickedElementParent).html('<img src="'+file_thumb+'"><p>'+file_name+'</p>');
    });

    media_uploader.open();
  }
  $( '.avs-metabox-cont .avs-metabox-file').on('click',function(){
    avsm_open_media_uploader_file($(this));
  });
  $( '.avs-metabox-cont .avs-metabox-file-remove').on('click',function(){
    var $fileField = $(this).parents('.avs-metabox-field').find('input.avs-metabox-file-field');
    var $filePreview = $(this).parents('.avs-metabox-field').find('.avs-metabox-file-preview');
    $fileField.val('');
    $filePreview.html('No file selected');
  });

  //color pickers
  $( '.avs-metabox-cont .avs-metabox-colorpicker' ).wpColorPicker();

  //simple date pickers
  $( '.avs-metabox-cont .avs-metabox-datepicker' ).each( function(){
    $(this).datepicker({
       dateFormat: $(this).data('format'),
       minDate: $(this).data('mindate')
    });
  } );

  //date range pickers
  $( ".avs-metabox-datepicker-range" ).each( function(){

    var dateFormat = "mm-dd-yy";
    var from = $( ".avs-metabox-datepicker-from", this ).datepicker({
      dateFormat: $( ".avs-metabox-datepicker-from", this ).data('format'),
      minDate: $( ".avs-metabox-datepicker-from", this ).data('mindate')
    });
    from.on( "change", function() {
      to.val('');
      to.datepicker( "option", "minDate", $(this).val() );
    });
    var to = $( ".avs-metabox-datepicker-to", this ).datepicker({
      dateFormat: $( ".avs-metabox-datepicker-to", this ).data('format'),
      minDate: $( ".avs-metabox-datepicker-to", this ).data('mindate')
    });
    to.on( "change", function() {
      from.datepicker( "option", "maxDate", $(this).val() );
    });

  });

});
