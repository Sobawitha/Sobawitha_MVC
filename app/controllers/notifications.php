<?php

class notifications extends Controller {
    public function __construct(){
        $this-> notifications_model =$this->model('M_notifications');
    }

    public function count_no_of_notifications(){
        $no_of_notifications = $this->notifications_model->find_notification_count()->count_notification;

        
    }

    public function delete_notification(){
        echo "come";
        die();
        $notification_id = $_GET['notification_id'];
        $this->notification_model->delete_nootification($notification_id);
        redirect('AgriOfficer/profile');
    }

}

?>