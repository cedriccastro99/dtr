$(document).ready(function(){
    function priviewImage(){
        const img = document.getElementById("imageUpload").files;
        $("#profileImg").remove();
        for(let i = 0 ; i < img.length; i ++){
            $('#image-preview').append(`<img id="profileImg" src="${URL.createObjectURL(event.target.files[0])}" alt="" />`)
        }   
    }

    $('#imageUpload').change(function(){
        priviewImage();
    })

    $('#UploadProfile').on('hidden.bs.modal',function(){
        $('#imageUpload').val('');
        $("#profileImg").remove();
    })
})