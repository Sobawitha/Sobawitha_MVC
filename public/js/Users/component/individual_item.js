// toggle comment Q&A section
// alert();

if(document.querySelector(".hidden").textContent){

     
   
    popUpOpen("Product added to the Cart");
   
}





function reset_sections(){
    var related_item = document.getElementById("toggle_section_1");
    var comment = document.getElementById("toggle_section_2");
    var qna = document.getElementById("toggle_section_3");
    var indicator = document.getElementById("indicator");
    qna.style.transform = "translateX(0px)";
    comment.style.transform = "translateX(0px)";
    related_item.style.transform = "translateX(0px)";
    indicator.style.transform = "translateX(-161px)";
   
}

function comment_section(){
    var related_item = document.getElementById("toggle_section_1");
    var comment = document.getElementById("toggle_section_2");
    var qna = document.getElementById("toggle_section_3");
    var indicator = document.getElementById("indicator");
    qna.style.transform = "translateX(-650px)";
    comment.style.transform = "translateX(-650px)";
    related_item.style.transform = "translateX(-650px)";
    indicator.style.transform = "translateX(-5px)";
}

function qna_section(){
    var related_item = document.getElementById("toggle_section_1");
    var comment = document.getElementById("toggle_section_2");
    var qna = document.getElementById("toggle_section_3");
    var indicator = document.getElementById("indicator");
    qna.style.transform = "translateX(-1150px)";
    comment.style.transform = "translateX(-1150px)";
    related_item.style.transform = "translateX(-1150px)";
    indicator.style.transform = "translateX(130px)";
}


/*comment section */
//for comment section
function open_save_cancel_btn(){
    document.querySelector(".btn").style.display='block';
}

function clear_comment(){
    document.querySelector(".comment-body").value='';
    document.querySelector(".btn").style.display='none';
}

function save_comment(){
    document.querySelector(".btn").style.display='none';
}

//for reply-section
function open_save_cancel_btns(id){
    document.getElementById(`btn-${id}`).style.display='block';
}

function open_replyform(id){
    document.getElementById(`reply_form-${id}`).style.display='block';
}

function clear_reply(id){
    document.getElementById(`reply-body-${id}`).value='';
    document.getElementById(`btn-${id}`).style.display='block';
}

function save_reply(id){
    document.getElementById(`btn-${id}`).style.display='none';
    
}

function display_reply(id){
    if(document.getElementById(`display_reply_all-${id}`).style.display=='none'){
        document.getElementById(`display_reply_all-${id}`).style.display='block';
        document.getElementById(`display_reply_btn_icon-${id}`).innerHTML=document.getElementById(`arrow_down-${id}`).innerHTML;

    }
    else{
        document.getElementById(`display_reply_all-${id}`).style.display='none';
        document.getElementById(`display_reply_btn_icon-${id}`).innerHTML=document.getElementById(`arrow_up-${id}`).innerHTML;
    }
}


/*QnA section */
//for questions
function open_save_cancel_btn(){
    document.querySelector(".btn_sec").style.display='block';
}

function clear_question(){
    document.querySelector(".comment-body").value='';
    document.querySelector(".btn_sec").style.display='none';
}

function save_question(){
    document.querySelector(".btn_sec").style.display='none';
}

//for reply-section
function open_save_cancel_btns(id){
    document.getElementById(`ans_btn_sec-${id}`).style.display='block';
}

function open_replyform(id){
    document.getElementById(`answer_form-${id}`).style.display='block';
}

function clear_reply(id){
    document.getElementById(`reply-body-${id}`).value='';
    document.getElementById(`ans_btn_sec-${id}`).style.display='block';
}

function save_reply(id){
    document.getElementById(`ans_btn_sec-${id}`).style.display='none';
    
}

function display_answers(id){
    if(document.getElementById(`display_all_answers-${id}`).style.display=='none'){
        document.getElementById(`display_all_answers-${id}`).style.display='block';
        document.getElementById(`display_answer_btn_icon-${id}`).innerHTML=document.getElementById(`arrow_down-${id}`).innerHTML;

    }
    else{
        document.getElementById(`display_all_answers-${id}`).style.display='none';
        document.getElementById(`display_answer_btn_icon-${id}`).innerHTML=document.getElementById(`arrow_up-${id}`).innerHTML;
    }
}





function editWishlist(){

  let heart_icon = document.getElementById('add_wishlist_heart');
  let productID =  heart_icon.dataset.productId;
  if(heart_icon.classList.contains('fa-solid')){
    heart_icon.classList.remove('fa-solid');
    heart_icon.classList.add('fa-regular');
 // Get the product ID from the data attribute of the heart icon


// Send an AJAX request to delete the product from the wishlist
var xhr = new XMLHttpRequest();
xhr.open('DELETE', `http://localhost/Sobawitha/wishlist/delete/${productID}`);
xhr.onload = function() {
  if (xhr.status === 200) {
    // Reload the page or update the UI to reflect the removed product
    let stmt = "Product removed from the wishlist"
    popUpOpen(stmt);

    // Close the dialog box when the close button is clicked
   
}else {
    // Handle errors
    console.log((xhr.status).toString())

  }
};
xhr.send();

}

else{
    heart_icon.classList.remove('fa-regular');
    heart_icon.classList.add('fa-solid');
    // Send an AJAX request to add the product to the wishlist
var xhr = new XMLHttpRequest();
xhr.open('POST', `http://localhost/Sobawitha/wishlist/addToWishlist/${productID}`);
xhr.onload = function() {
    if (xhr.status === 200) {
        // Reload the page or update the UI to reflect the added product
        let stmt = "Product added to the wishlist"
        popUpOpen(stmt);
        
        // Close the dialog box when the close button is <clicked>  </clicked>



}
else{
    // Handle errors
    console.log((xhr.status).toString());

}

}

xhr.send();



}



}





function  popUpOpen(stmt){
    
    const dialogBtn = document.querySelector('#my-dialog');

    dialogBtn.showModal();

    document.querySelector('#my-dialog p').innerHTML = stmt;
     const dialogCloseButton = document.querySelector('#dialog-close-button');
     dialogCloseButton.addEventListener('click', () => {
     dialogBtn.close();
        
    
});
}



// (document.querySelector("#add_to_cart_btn")).addEventListener('click',(e)=>{

//     let product_id = e.target.dataset.productId;
//     let quantity = document.querySelector("#existing_quantity_value").innerText;
//     quantity == 0 ? (quantity = 1 ): (quantity = int(quantity));
//     let xhr =  new XMLHttpRequest();
//     xhr.open('UPDATE',`http://localhost/Sobawitha/cart/update/${product_id}/${quantity}`);
//     xhr.onload = function(){
//         if(xhr.status == 200){
//             let stmt = "Product added to the cart Successfully";
//             popUpOpen(stmt);
//         }
//         else{
//             console.log((xhr.status).toString());
//         }
//     }



//     xhr.send();

// }
// )