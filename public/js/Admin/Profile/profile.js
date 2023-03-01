// alert();
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


