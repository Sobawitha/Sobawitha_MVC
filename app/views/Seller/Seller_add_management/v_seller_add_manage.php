<?php require APPROOT.'/views/Users/component/Header.php'?>
<?php require APPROOT.'/views/Seller/Seller/seller_topnavbar.php'?>
<?php require APPROOT.'/views/Seller/Seller/seller_sidebar.php'?>
<link rel="stylesheet" href="../css/seller/seller_ad_management.css"></link>
<script src="../js/Seller/Ad_Manage/add_advertisment.js"></script>

<body >

<div class="body">
        <div class="section_1">
            
        </div>

        <div class="section_2">

        <h3>Advertisement Management</h3>
        <hr>

        
        <div class="button_section">
          <form class="searchForm" action="<?php echo URLROOT;?>/seller_ad_management/sellerSearchAd" method="GET">
          <div class="search_bar">
              <div class="search_content">
                  
                      <span class="search_cont" onclick="open_cancel_btn()"><input type="text" name="search" placeholder="<?php echo $data['search'] ?>" id="searchBar" require/></span>
                      <button type="submit" class="search_btn" onclick="clear_search_bar()" value=""><i class="fa-solid fa-xmark" id="cansel" ></i></button>
                      <button type="submit" class="search_btn" onclick="open_cancel_btn()"><i class="fa fa-search" aria-hidden="true" id="search"></i></button>
                  
              </div>
          </div>
          </form>

          <div class="add_new_user_btn">
            <a href="<?php echo URLROOT?>/seller_ad_management/add_listing" onclick ="addNew()" id="add_user_btn"><span class="add_add"><i class="fa-solid fa-plus"></i>&nbsp;Add New Advertisement</span></a>
          </div>
        </div>

        <?php if(empty($data['message'])){ ?>
                <?php if($data['search'] ==='Search by product title'): ?>
                <div class = "filter_section">
                <div class="radio-buttons"  id="radioButtons">
                <form method ="POST" action="<?php echo URLROOT?>/seller_ad_management/View_listing" id="filter_form">        
                                <label for="pending_ads" id="filter_label"> <input type="radio" id="pending_ads" name="ad_type" onclick="javascript:submit()" value="pending_ads" <?php if (isset($_POST['ad_type']) && $_POST['ad_type'] == 'pending_ads') echo ' checked="checked"';?> checked>Pending</label>
                                <label for="published_ads" id="filter_label"> <input type="radio" id="published_ads" name="ad_type" onclick="javascript:submit()" value="published_ads" <?php if (isset($_POST['ad_type']) && $_POST['ad_type'] == 'published_ads') echo ' checked="checked"';?>>Published</label>
                                <label for="rejected_ads" id="filter_label"> <input type="radio" id="rejected_ads" name="ad_type" onclick="javascript:submit()" value="rejected_ads" <?php if (isset($_POST['ad_type']) && $_POST['ad_type'] == 'rejected_ads') echo ' checked="checked"';?>>Rejected</label>
                                
                </div>
                </div>

                <?php endif?> 
                <span class="error_msg"><?php echo $data['emptydata'];?></span>

                        
                
                <div class="sm_view_list">
                <div class="views">

                <table class="sm_view_list_table">
                   <?php if(empty($data['emptydata'])){ ?>   
                        <tr class="table_head">
                                <td>Main Image</td>
                                <td>Title</td>
                                <td>Crop Type</td>
                                <td>Registration No</td>
                                <td>Manufacturer</td>
                                <td>Quantity</td>
                                <td>Unit Price</td>
                                <td>Options</td>
                                <td></td>
                        </tr>
                        <?php    }  ?> 
                        <?php
                                foreach($data['ads'] as $pending_fertilizer_advertisement):?>
                                
                                <tr class="sm_view">
                                <div class="sm_view_detail">
                                        <td><img src="./../public/upload/fertilizer_images/<?php echo $pending_fertilizer_advertisement->fertilizer_img?>" alt="fertilizer_image"  id="fertilizer_img"></td>
                                        <td><span class="title"><?php echo $pending_fertilizer_advertisement->product_name ?></span></td>
                                        <td><span class="croptype"><?php echo $pending_fertilizer_advertisement->crop_type?></span></td>
                                        <td><span class="certificate No<"><?php echo $pending_fertilizer_advertisement->registration_no ?></span></td>
                                        <td><span class="manufacture"><?php echo $pending_fertilizer_advertisement->manufacturer ?></span></td>                                        
                                        <td class="quantity"><span class="value"><?php echo $pending_fertilizer_advertisement->quantity ?></span></td>
                                        <td><span class="price">Rs. <?php echo $pending_fertilizer_advertisement->price ?></span></td>


                                        <td id="option">

                                        <a href="<?php echo URLROOT?>/seller_ad_management/Update_advertisment?fertilizer_id=<?php echo $pending_fertilizer_advertisement->Product_id ?>" class="edit"><i class="fa-solid fa-pen-to-square" ></i></a>
                                                
                                                
                                                <span id="delete"><i class="fa-solid fa-trash-can" onclick="popUpOpen(<?php echo $pending_fertilizer_advertisement->Product_id ?>)"></i></span>

                                                <dialog id="deletePopup">
                                                        <div class="deletePopup">
                                                                <div class="delete_dialog_heading">
                                                                <i class="fa-regular fa-circle-xmark"></i>
                                                                <h2>Are you sure</h2>
                                                                <p>You will not be able to recover this image</p>
                                                                </div>

                                                                <div class="dialog_content">
                                                                <form method="POST" action="<?php echo URLROOT?>/seller_ad_management/delete_advertisment">
                                                                <button id="deletebtn" type="submit" value="" name="deleteadvertisment">Delete
                                                                </button>
                                                                <button id="cancelbtn" type="button">Cancel
                                                                </button>
                                                                </form>
                                                                </div>
                                                        </div>
                                                </dialog>
                                                
                                        </td>
                                </div>

                        </tr>

                        <?php endforeach;?>

                        <?php }else{ ?>
                    <span class="error_msg"><?php echo $data['message'];?></span>
                    <?php    }  ?>
                                
                </table>

                </div>
                </div>
        </div>

        <div class="section_3">
                <!-- add forum -->
                
                
        </div>
</div>
























