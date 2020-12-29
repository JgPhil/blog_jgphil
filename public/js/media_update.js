let updateMediaLinks = document.querySelectorAll("[data-update]");


for (updateLink of updateMediaLinks) {

    let postId = updateLink.parentElement.children[2].textContent;

    updateLink.addEventListener("click", function (e) {
        e.preventDefault();
        e.stopPropagation();
        let form_data = new FormData;
        let init = null;

        init = {
            method: "POST",
            body: form_data,
            contentType: false,
            processData: false
        };


        let url = "/picture-update"; // + postId;
        let file = this.parentElement.firstElementChild.files[0];

        if (this.parentElement.children[1].textContent != "") {
            let oldPictureId = this.parentElement.children[1].textContent;
            let oldPictureOrder = this.parentElement.children[3].textContent;

            form_data.append('oldPictureId', oldPictureId);
            form_data.append('oldPictureOrder', oldPictureOrder);
            // url += "/oldPictureId/" + oldPictureId + "/oldPictureSortOrder/" + oldPictureOrder;

        } else {
            // url += "/oldPicture/" + null + "/oldPictureSortOrder/" + null;
        }

        form_data.append("file", file);
        fetch(url, init).then(
            response => response.json()
        ).then(data => {
            pictureUpdate(data, this);
            document.getElementById("alert").innerHTML = data.message;
        })

    })
}

const pictureUpdate = function (data, updateLink) {

    if (updateLink.previousElementSibling.textContent == 1) { //jumbotron default picture
        updateLink.parentElement.parentElement.parentElement.style["backgroundImage"] =
            "url('/uploads/pictures/" + data.newPictureFilename;
    } else {
        updateLink.parentElement.parentElement.children[0].src =
            "/uploads/pictures/" + data.newPictureFilename;
    }


}

const videoUpdate = function (data, updateLink) {
    updateLink.parentElement.previousElementSibling.children[0].src = data.newVideoUrl;
}


const checkVideoUrl = function (newVideoUrl) {
    // Decompose Url and check
    let splitUrl = newVideoUrl.split('/')
    let videoServiceProvider = splitUrl[2];
    let videoId = null;

    if (videoServiceProvider === "www.youtube.com") {
        videoId = newVideoUrl.split('=').pop();
        newVideoUrl = "https://www.youtube.com/embed/" + videoId;
    } else if (videoServiceProvider === "www.dailymotion.com") {
        videoId = splitUrl.pop();
        newVideoUrl = "https://www.dailymotion.com/embed/video/" + videoId;
    } else {
        newVideoUrl = null;
    }
    return newVideoUrl;
}





let newPictureFieldBtn = document.getElementsByClassName('add-another-picture-widget')[0];

newPictureFieldBtn.addEventListener('click', function (e) {
    setTimeout(fileInputText, 500);
})

const fileInputText = function () {
    $('.custom-file-input').change(function (e) {
        let files = [];
        for (var i = 0; i < $(this)[0].files.length; i++) {
            files.push($(this)[0].files[i].name);
        }
        $(this).next('.custom-file-label').html(files.join(', '));
    });
}