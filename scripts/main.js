(function (root) {

  Dropzone.options.fileDropzone = {
    init: function() {
      this.on("success", function(file, responseText) {
        window.location = responseText;
      });
    }
  };

} (this));
