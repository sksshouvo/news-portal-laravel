<?php
foreach( $site_traffic_data as $sd){
$mon_name[] =  $sd->month_name;
$count[] = $sd->all_visitors;
}
$name = json_encode($mon_name);
$all_count = json_encode($count);
$route_name = explode('.',Route::currentRouteName());
$page_name = ucfirst(str_replace('_', ' ', $route_name[0]));
?>
<?php $__env->startSection('page_name', $page_name); ?>
<?php $__env->startSection('dashboard_header'); ?>
<div class="panel panel-container">
    <div class="row">
        <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
            <div class="panel panel-teal panel-widget border-right">
                <div class="row no-padding"><em class="fa fa-xl fa-copy color-blue"></em>
                    <div class="large"><?php echo e($all_news); ?></div>
                    <div class="text-muted">All Post</div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
            <div class="panel panel-blue panel-widget border-right">
                <div class="row no-padding"><em class="fa fa-xl fa-clipboard color-orange"></em>
                    <div class="large"><?php echo e($draft_news); ?></div>
                    <div class="text-muted">Draft Post</div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
            <div class="panel panel-orange panel-widget border-right">
                <div class="row no-padding"><em class="fa fa-xl fa-copy color-teal"></em>
                    <div class="large"><?php echo e($published_news); ?></div>
                    <div class="text-muted">Published News</div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
            <div class="panel panel-red panel-widget ">
                <div class="row no-padding"><em class="fa fa-xl fa-user color-red"></em>
                    <div class="large"><?php echo e($users); ?></div>
                    <div class="text-muted">Total User</div>
                </div>
            </div>
        </div>       
    </div><!--/.row-->
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('traffic_section'); ?>
<div class="panel panel-default">
    <div class="panel-heading">
        Site Traffic Overview
        <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
    <div class="panel-body">
        <div class="canvas-wrapper">
            <canvas class="main-chart" id="line-chart" height="200" width="600"></canvas>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pie_chart'); ?>
<!--<div class="col-xs-6 col-md-3">-->
<!--    <div class="panel panel-default">-->
<!--        <div class="panel-body easypiechart-panel">-->
<!--            <h4>New Orders</h4>-->
<!--            <div class="easypiechart" id="easypiechart-blue" data-percent="92" ><span class="percent">92%</span></div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--<div class="col-xs-6 col-md-3">-->
<!--    <div class="panel panel-default">-->
<!--        <div class="panel-body easypiechart-panel">-->
<!--            <h4>Comments</h4>-->
<!--            <div class="easypiechart" id="easypiechart-orange" data-percent="65" ><span class="percent">65%</span></div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--<div class="col-xs-6 col-md-3">-->
<!--    <div class="panel panel-default">-->
<!--        <div class="panel-body easypiechart-panel">-->
<!--            <h4>New Users</h4>-->
<!--            <div class="easypiechart" id="easypiechart-teal" data-percent="56" ><span class="percent">56%</span></div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--<div class="col-xs-6 col-md-3">-->
<!--    <div class="panel panel-default">-->
<!--        <div class="panel-body easypiechart-panel">-->
<!--            <h4>Visitors</h4>-->
<!--            <div class="easypiechart" id="easypiechart-red" data-percent="27" ><span class="percent">27%</span></div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('others_section'); ?>

<div class="container">
   
    <div class="row">
    
        <div class="col-sm-11">
           <div style="height:800px;overflow:auto;">

                <table class="table table-striped table-responsive">
                        <thead class="thead-dark">
        
                                <tr>
                                        <th>News</th>
                                        <th>Ip Address</th>
                                        <th>Country</th>
                                        <th>Visit Count</th>
                                    </tr>
                        </thead>
                       
                       <?php $__currentLoopData = $all_visiotr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$av): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <tr>
                        <td><a href="./news_details/<?php echo e($av->post_url_bng); ?>" target="_blank"><?php echo e($av->post_title_bng); ?></a></td>
                        <td><p <?=(Request::ip()==$av->ip_address)?'class="text-danger"':''?>><?php echo e($av->ip_address); ?> (<?=(Request::ip()==$av->ip_address)?'OWN IP ADDRESS':''?>)</p></td>
                        <td><button type="button" id="see_country_<?php echo e($key); ?>" class="btn btn-md btn-primary" onclick="see_country('<?php echo e($av->ip_address); ?>', '<?php echo e($key); ?>')">See Country</button></td>
                        <td><?php echo e($av->visit_count); ?></td>
                    </tr>
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       <tr><td colspan="4"><?php echo e($all_visiotr->links()); ?></td></tr>
                    </table>
           </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('add_js'); ?>
  <script>
        var randomScalingFactor = function(){ return Math.round(Math.random()*1000)};
        var dt = new Date();
        
            var lineChartData = {
                labels : <?=$name?>,
                datasets:[{
                        label: "My First dataset",
                        fillColor : "rgba(0,122,204,0.2)",
                        strokeColor : "rgba(0,122,204,1)",
                        pointColor : "rgba(0,122,204,1)",
                        pointStrokeColor : "#fff",
                        pointHighlightFill : "#fff",
                        pointHighlightStroke : "rgba(0,122,204,1)",
                        data : <?=$all_count?>
                    }
                ]
        
            }
         
        
            var pieData = [
                    {
                        value: 300,
                        color:"#30a5ff",
                        highlight: "#62b9fb",
                        label: "Blue"
                    },
                    {
                        value: 50,
                        color: "#ffb53e",
                        highlight: "#fac878",
                        label: "Orange"
                    },
                    {
                        value: 100,
                        color: "#1ebfae",
                        highlight: "#3cdfce",
                        label: "Teal"
                    },
                    {
                        value: 120,
                        color: "#f9243f",
                        highlight: "#f6495f",
                        label: "Red"
                    }
        
                ];
                    
            var doughnutData = [
                        {
                            value: 300,
                            color:"#30a5ff",
                            highlight: "#62b9fb",
                            label: "Blue"
                        },
                        {
                            value: 50,
                            color: "#ffb53e",
                            highlight: "#fac878",
                            label: "Orange"
                        },
                        {
                            value: 100,
                            color: "#1ebfae",
                            highlight: "#3cdfce",
                            label: "Teal"
                        },
                        {
                            value: 120,
                            color: "#f9243f",
                            highlight: "#f6495f",
                            label: "Red"
                        }
        
                    ];
                    
            var radarData = {
                labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
                datasets: [
                    {
                        label: "My First dataset",
                        fillColor: "rgba(220,220,220,0.2)",
                        strokeColor: "rgba(220,220,220,1)",
                        pointColor: "rgba(220,220,220,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(220,220,220,1)",
                        data: [65, 59, 90, 81, 56, 55, 40]
                    },
                    {
                        label: "My Second dataset",
                        fillColor : "rgba(48, 164, 255, 0.2)",
                        strokeColor : "rgba(48, 164, 255, 0.8)",
                        pointColor : "rgba(48, 164, 255, 1)",
                        pointStrokeColor : "#fff",
                        pointHighlightFill : "#fff",
                        pointHighlightStroke : "rgba(48, 164, 255, 1)",
                        data: [28, 48, 40, 19, 96, 27, 100]
                    }
                ]
            };
            
            var polarData = [
                    {
                        value: 300,
                        color: "#1ebfae",
                        highlight: "#38cabe",
                        label: "Teal"
                    },
                    {
                        value: 140,
                        color: "#ffb53e",
                        highlight: "#fac878",
                        label: "Orange"
                    },
                    {
                        value: 220,
                        color:"#30a5ff",
                        highlight: "#62b9fb",
                        label: "Blue"
                    },
                    {
                        value: 250,
                        color: "#f9243f",
                        highlight: "#f6495f",
                        label: "Red"
                    }
                
            ];
        
         



function see_country(ip_address, key){
    $("#see_country_"+key).html("Loading......!");   
    // set endpoint and your access key
var ip = ip_address;
var access_key = '43401e358caaf1b48dd7622e0bbf8a5d';

// get the API result via jQuery.ajax
$.ajax({
    url: 'http://api.ipstack.com/' + ip + '?access_key=' + access_key,   
    dataType: 'jsonp',
    success: function(json) {
//console.log(json);
$("#see_country_"+key).html(json.city+", "+json.country_name);
        // output the "capital" object inside "location"
    //    alert(json.location.capital);
        
    }
});

}
$("#see_option").change(function(){
var see_option = $(this).val();
if(see_option==1){
    $("#month_wise").show();
    $("#date_range_wise").hide();
}else if(see_option==2){
    $("#date_range_wise").show();
    $("#month_wise").hide();
}
});
</script>  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard/includes/main_app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>