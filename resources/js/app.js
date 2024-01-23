import "./bootstrap";
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**", "../fonts/**"]);

//Image preview on create
const previewImage = document.getElementById("image");
if (previewImage) {
    previewImage.addEventListener("change", (event) => {
        var oFReader = new FileReader();
        // var image  =  previewImage.files[0];
        // console.log(image);
        oFReader.readAsDataURL(previewImage.files[0]);

        oFReader.onload = function (oFREvent) {
            //console.log(oFREvent);
            document.getElementById("uploadPreview").src =
                oFREvent.target.result;
        };
    });
}
