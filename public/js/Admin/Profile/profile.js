
function popUpOpenDelete() {
    const deactivateUserPopup = document.getElementById('deactivateUserPopup')
      document.getElementById('delete').addEventListener('click',() => deactivateUserPopup.showModal());
      document.getElementById('closebtntwo').addEventListener('click',() => deactivateUserPopup.close());
  }

  function popUpOpenDeletePic() {
    const deactivateUserPopup = document.getElementById('deactivateUserPopup')
      document.getElementById('delete_img').addEventListener('click',() => deactivateUserPopup.showModal());
      document.getElementById('closebtntwo').addEventListener('click',() => deactivateUserPopup.close());
  }

  function popUpOpenChangePic() {
    const confirmingChangePicPopup = document.getElementById('confirmingChangePicPopup')
      document.getElementById('change_img').addEventListener('click',() => confirmingChangePicPopup.showModal());
      document.getElementById('closebtnthree').addEventListener('click',() => confirmingChangePicPopup.close());
  }

  function showButton() {
    var button = document.getElementById("change_img");
    var label =document.getElementById("labelpic");
    var file = document.getElementById("propic");
    if (button) {
        button.style.display = "block";
        label.style.display = " none";
        file.style.display = "none";
    }
}