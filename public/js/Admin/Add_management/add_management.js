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

function popUpOpenAdReview(product_name, img_one, img_two, img_three, img_four,img_five, quantity, manufac, price, desc, category, registr, date, crop_type, type, full_name,rating, location) {
  document.getElementById('product-name').value = product_name ? product_name : 'None';
  document.getElementById('product-quantity').value = quantity ? quantity : 'None';
  document.getElementById('manufacturer-name').value = manufac ? manufac : 'None';
  document.getElementById('product-price').value = price ? price : 'None';
  document.getElementById('product-description').value = desc ? desc : 'None';
  document.getElementById('product-category').value = category ? category : 'None';
  document.getElementById('regsitration-no').value = registr ? registr : 'None';
  document.getElementById('product-date').value = date ? date : 'None';
  document.getElementById('crop_type').value = crop_type ? crop_type : 'None';
  document.getElementById('seller_name').value = full_name ? full_name : 'None';
  document.getElementById('rating').value = rating ? rating : 'None';
  document.getElementById('product-type').value = type ? type : 'None';
  document.getElementById('product-location').value = location ? location : 'None';
  
  // Set the src attribute of the image tag to display the image if the element exists and has a valid src
  const imgOne = document.getElementById('image_one');
  const imgTwo = document.getElementById('image_two');
  const imgThree = document.getElementById('image_three');
  const imgFour = document.getElementById('image_four');
  const imgFive = document.getElementById('image_five');

  if (imgOne && img_one !== '') {
    imgOne.src = `${window.location.origin}/Sobawitha/public/upload/fertilizer_images/${img_one}`;
  }

  if (imgTwo && img_two !== '') {
    imgTwo.src = `${window.location.origin}/Sobawitha/public/upload/fertilizer_images/${img_two}`;
  }

  if (imgThree && img_three !== '') {
    imgThree.src = `${window.location.origin}/Sobawitha/public/upload/fertilizer_images/${img_three}`;
  }

  if (imgFour && img_four !== '') {
    imgFour.src = `${window.location.origin}/Sobawitha/public/upload/fertilizer_images/${img_four}`;
  }

  if (imgFive && img_five !== '') {
    imgFive.src = `${window.location.origin}/Sobawitha/public/upload/fertilizer_images/${img_five}`;
  }
  
  document.getElementById('ad-details').showModal();
}

function popUpOpenViewMore(product_name, img_one, img_two, img_three, img_four,img_five ,quantity, manufac, price, desc, category, registr, date, crop_type, type, name, rating, location) {
  document.getElementById('product-name').value = product_name ? product_name : "None";
  document.getElementById('product-quantity').value = quantity ? quantity : "None";
  document.getElementById('manufacturer-name').value = manufac ? manufac : "None";
  document.getElementById('product-price').value = price ? price : "None";
  document.getElementById('product-description').value = desc ? desc : "None";
  document.getElementById('product-category').value = category ? category : "None";
  document.getElementById('regsitration-no').value = registr ? registr : "None";
  document.getElementById('product-date').value = date ? date : "None";
  document.getElementById('crop_type').value = crop_type ? crop_type : "None";
  document.getElementById('seller_name').value = name ? name : "None";
  document.getElementById('rating').value = rating ? rating : "None";
  document.getElementById('product-type').value = type ? type : "None";
  document.getElementById('product-location').value = location ? location : "None";
  

  // Set the src attribute of the image tag to display the image if the element exists and has a valid src
  const imgOne = document.getElementById('image_one');
  const imgTwo = document.getElementById('image_two');
  const imgThree = document.getElementById('image_three');
  const imgFour = document.getElementById('image_four');
  const imgFive = document.getElementById('image_five');

  if (imgOne && img_one !== '') {
    imgOne.src = `${window.location.origin}/Sobawitha/public/upload/fertilizer_images/${img_one}`;
  }

  if (imgTwo && img_two !== '') {
    imgTwo.src = `${window.location.origin}/Sobawitha/public/upload/fertilizer_images/${img_two}`;
  }

  if (imgThree && img_three !== '') {
    imgThree.src = `${window.location.origin}/Sobawitha/public/upload/fertilizer_images/${img_three}`;
  }

  if (imgFour && img_four !== '') {
    imgFour.src = `${window.location.origin}/Sobawitha/public/upload/fertilizer_images/${img_four}`;
  }

  if (imgFive && img_five !== '') {
    imgFive.src = `${window.location.origin}/Sobawitha/public/upload/fertilizer_images/${img_five}`;
  }
  
  document.getElementById('ad-details').showModal();
}


  function open_cancel_btn() {
    if (document.getElementById("searchBar").value !== "") {
        document.getElementById("cancel").style.display = "inline-block";
    }
    else {
        document.getElementById("cancel").style.display = "inline-block";
    }
  }