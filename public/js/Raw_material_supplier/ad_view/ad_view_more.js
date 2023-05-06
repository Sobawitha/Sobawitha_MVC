// first script
/*pay popup */
function pay_popup(price) {
    const existingQuantity = document.getElementById("existing_quantity_value").textContent;
    const quantity = parseInt(quantityInput.value);

    if(quantity>existingQuantity){
        errorMsg.style.display = "block";
        quantity.style.color="red";
        $_SESSION['order_count_error'] = "invalid_order";
    }
    else{
        const total_count = quantity * price;
        console.log(total_count);
        const total_price = document.querySelector(".total_value");
        total_price.textContent = `Rs. ${total_count.toFixed(2)}`;
        const paypopup = document.getElementById('buy_now_dialog_box');
        document.getElementById('close_buy_dialog').addEventListener('click', () => paypopup.close());
        paypopup.showModal();
    }
}

function checkout() {
    const userInput = document.getElementById("quantity_input").value;
    const agreementCheckbox = document.querySelector('#terms-checkbox');

    if (agreementCheckbox.checked) {
        // Checkbox is checked, continue with checkout process
        window.location.href = '<?php echo URLROOT ?>/fertilizer_product/complete_order?product_id=<?php echo $_GET['product_id'] ?>';
    } else {
        // Checkbox is not checked, show an error message
        //alert('Please agree to the terms and conditions before proceeding to checkout.');
        document.getElementById("terms_and_condition_check").style.display="block";
    }
}




// second script
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
function open_save_cancel_btns_in_answer(id){
    document.getElementById(`ans_btn_sec-${id}`).style.display='block';
}

function open_answerform(id){
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

function thanku_popup_close(){
  document.getElementById('thank_you_dialog_box').close();
}

function checkout() {
  const userInput = document.getElementById("quantity_input").value;
  const agreementCheckbox = document.querySelector('#terms-checkbox');
  
  if (agreementCheckbox.checked) {
    // Checkbox is checked, continue with checkout process
    window.location.href = '<?php echo URLROOT ?>/fertilizer_product/complete_order?product_id=<?php echo $_GET['product_id'] ?>';
  } else {
    // Checkbox is not checked, show an error message
    //alert('Please agree to the terms and conditions before proceeding to checkout.');
    document.getElementById("terms_and_condition_check").style.display="block";
  }
}



// third script

function switchImages(){
    image = document.getElementById("main-image").src
    openModal(image)
}

function changeImage(newImage) {
    document.getElementById("main-image").src = newImage;
}
 
function openModal(imageSrc) {
    var modal = document.getElementById("myModal");
    var modalImg = document.getElementById("modal-image");
    modal.style.display = "block";
    modalImg.src = imageSrc;
}


function closeModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "none";
}
