i need to create dash board                                                                                                                                                                      for that purpose i create the model function as public function get_all_forum_posts($id,$start_from,$num_per_page){
        $this->db->query("SELECT discussion_id, subject, date, type,count(reply_id) as no_of_reply from view_discussion_and_reply where created_by=:id group by(discussion_id) limit :start_from, :num_per_page ");
        $this->db->bind(":id", $id);
        $this->db->bind(":start_from", $start_from);
        $this->db->bind(":num_per_page", $num_per_page);
        return $this->db->resultSet();
    } controller as public function category_donut_chart(){
        $post_category_detail = $this->dashboard_model->get_category_detail();
        echo json_encode($post_category_detail);
    } and view as <div class="chart" id="doughnut-chart">
                    <h2>Blog post type</h2><br>
                    <div>
                        <canvas id="doughnut"></canvas>
                    </div>
                </div>
  and js function for that purpose as 
<script>
fetch('<?php echo URLROOT ?>/dashboard/category_donut_chart')
    .then(response => response.json())
    .then(result => {
        if (result.success) {
            categories = result.data.map(item => item.category);
            count = result.data.map(item => item.num_category);

            // create chart after fetching data
            console.log(categories);
            var ctx2 = document.getElementById('doughnut').getContext('2d');
            var myChart2 = new Chart(ctx2, {
                type: 'doughnut',
                data: {
                    labels: categories,
                    datasets: [{
                        label: 'Users',
                        data: count,
                        backgroundColor: [
                            '#deeaee',
                            '#9bf4d5',
                            '#346357',
                            '#c94c4c'
                        ],
                        borderColor: [
                            '#deeaee',
                            '#9bf4d5',
                            '#346357',
                            '#c94c4c'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true
                }
            });

            // resize chart on window resize
            $(window).resize(function() {
                var width = $('#doughnut').width();
                var height = $('#doughnut').height();
                myChart2.canvas.width = width;
                myChart2.canvas.height = height;
                myChart2.resize();
            });

            // print after fetch completes
            console.log("come here");
        }
    }); please give e 

</script> but i cannot find error that function not pass to the value  for control pease give me code for  