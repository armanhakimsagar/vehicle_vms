@extends('layouts.monitor.v2.master')

@section('content')

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">


    <!-- begin:: Content -->
    <div class="kt-container custom-kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

        <!--Begin::Dashboard 1-->

        <!--Begin::Row-->
        <div class="row">
            <div class="kt-portlet mirgin-buttom-none custom-container">
                <div class="kt-portlet__body custom-portlet-body resizable-top-section">
                    <div class="kt-section--first">
                        <div class="kt-section__body text-dark">
                            <div class="kt-widget15">
                                <div class="kt-widget15__map">
                                    <div id="kt_chart_latest_trends_map" class="g-map"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body toggleSection resizable-buttom-section" id="resizable">
                    <span class="sectionHide" title="Minimize"> <i class="fas fa-times"></i></span>
                    <div class="kt-section--first">
                        <div class="kt-section__body text-dark">
                            <ul class="nav nav-tabs custom-nav-tabs">
                                <li class="nav-item"><a data-toggle="tab" href="#data" class="active nav-link">Data</a></li>
                                <li class="nav-item"><a data-toggle="tab" href="#graph" class="nav-link">Graph</a></li>
                                <li class="nav-item"><a data-toggle="tab" href="#messages" class="nav-link">Messages</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="data" role="tabpanel">
                                    <div class="dataListSection">
                                        <div class="dataListItem">
                                            <span class="dataItemIcon"><i class="fab fa-safari"></i></span>
                                            <span class="dataItemName">Odometer</span>
                                            <span class="dataItemValue">21015442</span>
                                        </div>
                                        <div class="dataListItem">
                                            <span class="dataItemIcon"><i class="fas fa-sim-card"></i></span>
                                            <span class="dataItemName">SIM card number</span>
                                            <span class="dataItemValue">21015442</span>
                                        </div>
                                        <div class="dataListItem">
                                            <span class="dataItemIcon"><i class="fas fa-toggle-on"></i></span>
                                            <span class="dataItemName">Status</span>
                                            <span class="dataItemValue">21015442</span>
                                        </div>
                                        <div class="dataListItem">
                                            <span class="dataItemIcon"><i class="fab fa-acquisitions-incorporated"></i></span>
                                            <span class="dataItemName">Altitute</span>
                                            <span class="dataItemValue">21015442</span>
                                        </div>
                                        <div class="dataListItem">
                                            <span class="dataItemIcon"><i class="fas fa-toggle-on"></i></span>
                                            <span class="dataItemName">Angle</span>
                                            <span class="dataItemValue">21015442</span>
                                        </div>
                                        <div class="dataListItem">
                                            <span class="dataItemIcon"><i class="fas fa-map-marker-alt"></i></span>
                                            <span class="dataItemName">Position</span>
                                            <span class="dataItemValue">21015442</span>
                                        </div>
                                        <div class="dataListItem">
                                            <span class="dataItemIcon"><i class="fas fa-map-marker-alt"></i></span>
                                            <span class="dataItemName">Speed</span>
                                            <span class="dataItemValue">21015442</span>
                                        </div>
                                        <div class="dataListItem">
                                            <span class="dataItemIcon"><i class="fas fa-battery-three-quarters"></i></span>
                                            <span class="dataItemName">Battery Level</span>
                                            <span class="dataItemValue">21015442</span>
                                        </div>
                                        <div class="dataListItem">
                                            <span class="dataItemIcon"><i class="fas fa-bolt"></i></span>
                                            <span class="dataItemName">Charging Status</span>
                                            <span class="dataItemValue">21015442</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="graph" role="tabpanel">
                                    mr
                                </div>
                                <div class="tab-pane" id="messages" role="tabpanel">
                                    world
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="sectionShow" title="Maximize"> <i class="fas fa-expand-arrows-alt"></i></span>
            </div>
        </div>
        <!--End::Row-->

        <!--End::Dashboard 1-->
    </div>

<!-- end:: Content -->

</div>

<script>
    // $(".resizable-top-section").resizable({
    // handleSelector: ".splitter-section",
    // resizeWidth: false
    // });

    $('.sectionHide').click(function (e) {         
        e.preventDefault();
        $('.toggleSection').css('display', 'none');
        $('.sectionShow').css('display', 'block');
        $('.g-map').css('height', '93vh');
    });
    $('.sectionShow').click(function (e) {         
        e.preventDefault();
        $('.toggleSection').css('display', 'block');
        $('.sectionShow').css('display', 'none');
        $('.g-map').css('height', '65vh');
    });

</script>
@endsection