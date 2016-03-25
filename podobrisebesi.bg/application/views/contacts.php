<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="contacts">
    <div class="container">
        <div id="map-container" style="height:300px;"></div>
        <div class="row">
            <div class="col-lg-8 col-md-7 col-sm-6">
                <div class="well well-sm">
                    <form class="form-horizontal contact-form" method="post">
                        <fieldset>
                            <legend class="text-center header">Изпратете ни съобщение</legend>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="fname" name="name" type="text" placeholder="Име" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="lname" name="name" type="text" placeholder="Фамилия" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="email" name="email" type="text" placeholder="Имейл адрес" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="phone" name="phone" type="text" placeholder="Телефон" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                                <div class="col-md-8">
                                    <textarea class="form-control" id="message" name="message" placeholder="Напишете вашето съобщение" rows="7"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary btn-lg">Изпрати</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-md-5 col-sm-6">
                <div id="fb-root"></div>
                <script>(function (d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id))
                            return;
                        js = d.createElement(s);
                        js.id = id;
                        js.src = "//connect.facebook.net/bg_BG/sdk.js#xfbml=1&version=v2.5";
                        fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>
                <div class="fb-page pull-right" data-href="https://www.facebook.com/ПОДОБРИ-СЕБЕ-СИ-167249273305020" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"></div>
            </div>
        </div>
    </div>
</div>

<style>
    .header {
        color: #36A0FF;
        font-size: 27px;
        padding: 10px;
    }

    .bigicon {
        font-size: 35px;
        color: #36A0FF;
    }
</style>

<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script>

                    function init_map() {
                        var var_location = new google.maps.LatLng(42.674433, 23.312955);

                        var var_mapoptions = {
                            center: var_location,
                            zoom: 14
                        };

                        var var_marker = new google.maps.Marker({
                            position: var_location,
                            map: var_map,
                            title: "Venice"});

                        var var_map = new google.maps.Map(document.getElementById("map-container"),
                                var_mapoptions);

                        var_marker.setMap(var_map);

                    }

                    google.maps.event.addDomListener(window, 'load', init_map);

</script>