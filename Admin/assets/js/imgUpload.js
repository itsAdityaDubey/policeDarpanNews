const sortList = [];
$(document).ready(function () {
    document.getElementById('pro-image').addEventListener('change', readImage, true);

    $(".preview-images-zone").sortable({
        update: function (event, ui) {
            sortList.length = 0;
            let i = 1;
            $(".preview-images-zone").children().each(function () {
                let imgId = $(this).find('.image-zone img').prop('id');
                $(this).find('.number').html(i);
                sortList.push(imgId);
                setImagesVal();
                i++;
            });
        }
    });
});

function clearImages() {
    $("#pro-image").val('');
    $(".preview-images-zone").empty();
}
function setImagesVal() {
    let sortListVal='';
    for (let index = 0; index < sortList.length; index++) {
        const element = sortList[index];
        sortListVal+=' '+element;
    }
    $('#sortList').val(sortListVal);
}
function setImagesValInt(x) {
    let sortListVal='';
    for (let index = 1; index <= x; index++) {
        sortListVal+=' '+index.toString();
    }
    $('#sortList').val(sortListVal);
}
function readImage() {
    var num = 1;
    if (window.File && window.FileList && window.FileReader) {
        var files = event.target.files; //FileList object
        var output = $(".preview-images-zone");
        output.empty();

        if (files.length > 5) {
            alert('Max 5 images allowed');
        } else {
            setImagesValInt(files.length);
            $('.preview-images-zone').sortable( "enable" );
            for (let i = 0; i < files.length; i++) {
                var file = files[i];
                if (!file.type.match('image')) continue;
                if (file.size>6000000){ alert(" Size of image no "+(i+1)+" is more than 6 MB"); continue;}

                var picReader = new FileReader();

                picReader.addEventListener('load', function (event) {
                    var picFile = event.target;
                    var html = '<div class="preview-image preview-show-' + num + '">' +
                        '<div class="number">' + num + '</div>' +
                        '<input type="hidden" id="img-cap-' + num + '">' +
                        '<div class="image-zone"><img id="' + num + '" imgId="' + num + '" src="' + picFile.result + '"></div>' +
                        '<div class="tools-edit-image"><a href="javascript:void(0)" data-no="' + num + '" class="btn btn-light btn-sm btn-edit-image">edit</a></div>' +
                        '</div>';

                    output.append(html);
                    num = num + 1;
                });

                picReader.readAsDataURL(file);
            }
        }
    } else {
        console.log('Browser not support');
    }
}

