jQuery.noConflict();

jQuery(document).ready(function($){

  //select image
  var media_uploader = null;
  function open_media_uploader_image($clickedElement){
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
    open_media_uploader_image($(this));
  });
  $( '.avs-metabox-cont .avs-metabox-image-remove').on('click',function(){
    var $imageField = $(this).parents('.avs-metabox-field').find('input.avs-metabox-image-field');
    var $imagePreview = $(this).parents('.avs-metabox-field').find('.avs-metabox-image-preview');
    $imageField.val('');
    $imagePreview.html('No image selected');
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

    var dateFormat = "mm/dd/yy";
    var from = $( ".avs-metabox-datepicker-from", this ).datepicker();
    from.on( "change", function() {
      to.datepicker( "option", "minDate", getDate( this ) );
    });
    var to = $( ".avs-metabox-datepicker-to", this ).datepicker();
    to.on( "change", function() {
      from.datepicker( "option", "maxDate", getDate( this ) );
    });

    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }

      return date;
    }

  } );



});
