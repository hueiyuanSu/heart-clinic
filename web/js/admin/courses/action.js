$(document).ready(function(){
    // mak cropper instance, assign modal form and target view
    var avatar = new avatarUpload($('#avatar-upload-form'), $('#avater-wrapper'));
    var bgImage = new avatarUpload($('#bg-image-upload-form'), $('#bg-image-wrapper'));

});
