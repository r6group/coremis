<?php
use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\overlays\InfoWindow;
use dosamigos\google\maps\overlays\Marker;
use dosamigos\google\maps\Map;

/* @var $this yii\web\View */

$this->title = 'Map';
$this->params['breadcrumbs'][] = $this->title;

$coord = new LatLng(['lat' => 13.062202, 'lng' => 101.895571]);
$map = new Map(['center' => $coord, 'zoom' => 8, 'width' => '100%', 'height' => '600',]);

foreach($model as $c){
    $coords = new LatLng(['lat' => $c['h_latitude'], 'lng' => $c['h_longitude']]);
    $marker = new Marker(['position' => $coords]);


    $marker->icon = 'http://www.pstragarnia.pl/media/images/backend/icons/icon-map.png';

    $marker->attachInfoWindow(
        new InfoWindow([
            'content' => ' <h4>' . $c['hosname_long'] . ' ('.$c['stf_count'].')'
                . '</h4> <table class="table table-striped table-bordered table-hover"> <tr> <td>'
                . $c['stf_list']
                . '</td> </tr> </table> '
                . '<button class="btn btn-default btn-xs">รายละเอียด</button>'
        ])
    );

    $map->addOverlay($marker);
}



?>

<div>

    <h3 class="mb5"><?=$map_title?></h3>


    <div class="panel panel-map-sidebar">
        <div class="row">
            <div class="col-md-8 main">
                <?php echo $map->display(); ?>
            </div>
            <div class="col-md-4 map-sidebar">
                <div class="panel-body">
                    <h4 class="panel-title mb20">ขอเส้นทาง</h4>
                    <p>Type or click the map to enter your starting point and end point of your trip.</p>


                    <form class="form" action="#">
                        <div class="form-group">
                            <label class="control-label">จาก:</label>
                            <input type="text" class="form-control" placeholder="San Francisco, CA, USA">
                        </div>
                        <div class="form-group">
                            <label class="control-label">ถึง:</label>
                            <input type="text" class="form-control" placeholder="New York, NY, USA">
                        </div>

                        <div class="form-group">
                            <label class="control-label">พาหนะ:</label>
                            <div class="btn-group">
                                <button class="btn btn-default" type="button"><i class="fa fa-bicycle"></i></button>
                                <button class="btn btn-default" type="button"><i class="fa fa-train"></i></button>
                                <button class="btn btn-default" type="button"><i class="fa fa-bus"></i></button>
                                <button class="btn btn-default" type="button"><i class="fa fa-ship"></i></button>
                                <button class="btn btn-default" type="button"><i class="fa fa-plane"></i></button>
                            </div>
                        </div>

                        <hr>

                        <button class="btn btn-success btn-block">Get Directions</button>

                    </form>
                </div>
            </div>
        </div>
    </div><!-- panel -->

</div><!-- col-md-4 -->

