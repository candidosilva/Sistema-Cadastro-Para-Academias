let input = document.getElementById('input-file');
let fileName = document.getElementById('file-name');

input.addEventListener('change', function() {
    fileName.innerText = this.value;
});
function PreviewImage() {
    let oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("input-file").files[0]);

    oFReader.onload = function(oFREvent) {
        document.getElementById("uploadPreview").src = oFREvent.target.result;
        document.querySelector('.foto-text').style.display = "none"; 
    };
};
