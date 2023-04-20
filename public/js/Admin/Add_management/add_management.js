// alert();
// function open_cancel_btn(){
//     document.getElementById("cancel").style.display='block';
  
//   }

// function rejectedAd() {
//   var reason = document.getElementById("rejected-reason").value;
//   if (reason == "") {
//     alert("Please provide a reason for rejection.");
//     return false;
//   } else {
//     var rejectBtn = document.getElementById("reject-btn");
//     rejectBtn.disabled = true;
//     rejectBtn.innerHTML = "Rejecting...";
//     return true;
//   }
// }

function popUpOpenAdReview(product_name, img_one, quantity, manufac, price, desc, category, registr, date, location) {
  document.getElementById('product-name').value = product_name;
  document.getElementById('product-quantity').value = quantity;
  document.getElementById('manufacturer-name').value = manufac;
  document.getElementById('product-price').value = price;
  document.getElementById('product-description').value = desc;
  document.getElementById('product-category').value = category;
  document.getElementById('regsitration-no').value = registr;
  document.getElementById('product-date').value = date;
  document.getElementById('product-location').value = location;

  // Set the src attribute of the image tag to display the image if the element exists and has a valid src
  const imgOne = document.getElementById('image_one');

  if (imgOne && img_one !== '') {
    imgOne.src = `${window.location.origin}/Sobawitha_MVC/public/upload/listing_images/${img_one}`;
   
  }
  
  document.getElementById('ad-details').showModal();
}

function popUpOpenViewMore(product_name, img_one, quantity, manufac, price, desc, category, registr, date, location) {
  document.getElementById('product-name').value = product_name;
  document.getElementById('product-quantity').value = quantity;
  document.getElementById('manufacturer-name').value = manufac;
  document.getElementById('product-price').value = price;
  document.getElementById('product-description').value = desc;
  document.getElementById('product-category').value = category;
  document.getElementById('regsitration-no').value = registr;
  document.getElementById('product-date').value = date;
  document.getElementById('product-location').value = location;

  // Set the src attribute of the image tag to display the image if the element exists and has a valid src
  const imgOne = document.getElementById('image_one');

  if (imgOne && img_one !== '') {
    imgOne.src = `${window.location.origin}/Sobawitha_MVC/public/upload/listing_images/${img_one}`;
  }
  
  document.getElementById('ad-details').showModal();
}



  function clear_search_bar(){
    document.getElementById("searchBar").value = "";
    document.getElementById("cancel").style.display='none';
  }

  function open_cancel_btn() {
    if (document.getElementById("searchBar").value !== "") {
        document.getElementById("cancel").style.display = "inline-block";
    }
    else {
        document.getElementById("cancel").style.display = "inline-block";
    }
  }