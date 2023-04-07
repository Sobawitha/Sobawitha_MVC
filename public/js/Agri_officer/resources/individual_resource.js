

//user-image
setTimeout(()=>{

    var symboles,colors;
    symboles="0123456789ABCDEF";
    color='#';
    for(var i=0;i<6;i++){
        color=color+symboles[Math.floor(Math.random()*16)]
    }

    var rand=Math.random()*100;
    document.getElementById('user-,rand').style.background=color;
},100);

function count_like_dislike(){

    let heart_btn=document.getElementById("heart_icon");
    let click=false;

    heart_btn.addEventListener("click",()=>{
        var current_like_count=document.getElementById("like_count").innerHTML;
        if(!click){
            click=true;
            document.getElementById("heart_icon").innerHTML=`<i class="fa fa-heart" aria-hidden="true" id="afterlikehearticon" ></i>`;
        }
        else if(current_like_count>0){
           click=false;
            document.getElementById("heart_icon").innerHTML=`<i class="fa-regular fa-heart" id="hearticon"></i>`;
        }
    })
}

const backbtn=document.getElementById('back');
const hiddenstring = document.getElementById('to_resources');

backbtn.addEventListener('mouseover',function handleMouseOver(){
    hiddenstring.style.display='block';
});

backbtn.addEventListener('mouseout',function handleMouseOut(){
    hiddenstring.style.display='none';
});


setTimeout(()=> {
    document.querySelector(".popup").style.display='none';
    document.getElementById("overlap1").style.display='none';
}, 2000)


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


//delete reply
function delete_comment(id) {
    const deletePopup = document.getElementById('deletePopup')
    document.getElementById('cancelbtn').addEventListener('click',() => deletePopup.close());
    deletePopup.showModal();
    document.getElementById('delete').value=id;
    
  }
  
  
  function delete_reply(id) {
    const deletePopup = document.getElementById('deletereplyPopup')
    document.getElementById('canceldeletereplybtn').addEventListener('click',() => deletePopup.close());
    deletePopup.showModal();
    document.getElementById('deletereplybtn').value=id;
    
  }