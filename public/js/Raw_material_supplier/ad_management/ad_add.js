const addImageBtn1 = document.getElementById("addImagebtn1");
const removeImageBtn1 = document.getElementById("removeImagebtn1");
const imagePlaceholder1 = document.getElementById("image_placeholder1");
const addImageBtn2 = document.getElementById("addImagebtn2");
const removeImageBtn2 = document.getElementById("removeImagebtn2");
const imagePlaceholder2 = document.getElementById("image_placeholder2");
const addImageBtn3 = document.getElementById("addImagebtn3");
const removeImageBtn3 = document.getElementById("removeImagebtn3");
const imagePlaceholder3 = document.getElementById("image_placeholder3");

const intRemArea = document.getElementById('intentially_removed');

let inputPath1 = document.querySelector("#image1");
let inputPath2 = document.querySelector("#image2");
let inputPath3 = document.querySelector("#image3");

let file1;
let file2;
let file3;


// for 1
function toggleBrowse1() {
    inputPath1.click();
}

function removeImage1() {
    addImageBtn1.style.display = "block";
    removeImageBtn1.style.display = "none";
    imagePlaceholder1.style.display = "none";

    imagePlaceholder1.setAttribute('src', '');

    inputPath1.value = null;

    //intentially removed at edit posts
    intRemArea.value = 'removed';
}

inputPath1.addEventListener("change", function() {
    file1 = this.files[0];

    addImageBtn1.style.display = "none";
    removeImageBtn1.style.display = "block";
    imagePlaceholder1.style.display = "block";

    showImage1();

    intRemArea.value = '';
    
});

function showImage1() {
    let fileType = file1.type;

    let validExtensions = ["image/jpeg", "image/jpg", "image/png"];

    if(validExtensions.includes(fileType)) {
        let fileReader = new FileReader();

        fileReader.onload = () => {
            let fileURL = fileReader.result;

            imagePlaceholder1.setAttribute('src', fileURL);
        }

        fileReader.readAsDataURL(file1);
    }
    else {
        alert('This is not an image file');

        removeImage1();
    }
}

// for 2
function toggleBrowse2() {
    inputPath2.click();
}

function removeImage2() {
    addImageBtn2.style.display = "block";
    removeImageBtn2.style.display = "none";
    imagePlaceholder2.style.display = "none";

    imagePlaceholder2.setAttribute('src', '');

    inputPath2.value = null;

    //intentially removed at edit posts
    intRemArea.value = 'removed';
}

inputPath2.addEventListener("change", function() {
    file2 = this.files[0];

    addImageBtn2.style.display = "none";
    removeImageBtn2.style.display = "block";
    imagePlaceholder2.style.display = "block";

    showImage2();

    intRemArea.value = '';
    
});

function showImage2() {
    let fileType = file2.type;

    let validExtensions = ["image/jpeg", "image/jpg", "image/png"];

    if(validExtensions.includes(fileType)) {
        let fileReader = new FileReader();

        fileReader.onload = () => {
            let fileURL = fileReader.result;

            imagePlaceholder2.setAttribute('src', fileURL);
        }

        fileReader.readAsDataURL(file2);
    }
    else {
        alert('This is not an image file');

        removeImage2();
    }
}


// for 3
function toggleBrowse3() {
    inputPath3.click();
}

function removeImage3() {
    addImageBtn3.style.display = "block";
    removeImageBtn3.style.display = "none";
    imagePlaceholder3.style.display = "none";

    imagePlaceholder3.setAttribute('src', '');

    inputPath3.value = null;

    //intentially removed at edit posts
    intRemArea.value = 'removed';
}

inputPath3.addEventListener("change", function() {
    file3 = this.files[0];

    addImageBtn3.style.display = "none";
    removeImageBtn3.style.display = "block";
    imagePlaceholder3.style.display = "block";

    showImage3();

    intRemArea.value = '';
    
});

function showImage3() {
    let fileType = file3.type;

    let validExtensions = ["image/jpeg", "image/jpg", "image/png"];

    if(validExtensions.includes(fileType)) {
        let fileReader = new FileReader();

        fileReader.onload = () => {
            let fileURL = fileReader.result;

            imagePlaceholder3.setAttribute('src', fileURL);
        }

        fileReader.readAsDataURL(file3);
    }
    else {
        alert('This is not an image file');

        removeImage3();
    }
}
