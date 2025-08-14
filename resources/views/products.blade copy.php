@extends('layouts.app')
<style>
    .banner-section {
        background-color: #3f42a8cc;
        color: #fff;
        text-align: center;
        padding: 60px 30px;
    }

    .banner-section h1 {
        margin: 0;
        font-size: 2rem;
    }

    .banner-section p {
        font-size: 1.2rem;
        margin: 15px 0 0;
    }

    .content {
        margin: 2rem;
    }

    .product-content {
        border: 2px solid #dfe5e9;
        margin-bottom: 20px;
        background: #fff;
        padding: 10px 18px;
        -webkit-box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.37);
        box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.37);
        height: 18rem;
        display: flex;
        justify-content: center;
        /* Centers horizontally */
        align-items: center;
        border-radius: 2rem;

    }

    .product-image {
        padding-top: 10px;
    }

    .product-image  img {
        background-color: #fff;
        display: flex;
        justify-content: center;
        overflow: hidden;
        position: relative;
        /* width: 225px; */
        height: 193px;
        margin-left: 2rem;
        /* height: 225px; */
        align-items: center;
        width: 208px;
    }

    .img-responsive {
        max-height: 100%;
    }

    .product-detail {
        border-bottom: 1px solid #dfe5e9;
        padding: 16px;
        position: relative;
        background: #fff;
    }

    .product-detail h5 a {
        color: #2f383d;
        font-size: 20px;
        line-height: 19px;
        text-decoration: none;
    }

    .header {
        text-align: center;
        color: #3f42a8;
        font-weight:800;
        margin-bottom: 2rem;
        font-size: 18px;
    }

    .product-detail h5 a span {
        color: #3f42a8;
        display: block;
        font-size: 20px;
        margin-top: .5rem;
    }

    .product-image span {
        color: #3f42a8;
        text-align: center;
        color:#3f42a8;
        font-weight:800;
    }

    .product-info {
        padding: 11px 19px 10px 20px;
    }

    .btn-success {
        width: 100%;
    }

    .description ul {
        list-style-type: disc;
        /* Adds bullets */
        margin-left: 20px;
        /* Indents the list */
        line-height: 1.6;
        /* Increases spacing between items */
    }

    .description li {
        font-size: 16px;
        /* Adjust font size */
        color: #333;
        /* Change color if needed */
    }

    @media (min-width: 768px) {
        .col-md-6 {
            margin-top: 2rem;
            justify-content: center;
            align-items: center;
        }
        .col-md-4 {
        width: 31.333333%;
    }
    }



</style>

@section('content')
<section class="banner-section">
    <div class="container">
        <h1>Products & Services</h1>
    </div>
</section>
<section class="product-section">
    <div class="container content">
        <div class="row">
            <h3 class="header">Hospital Beds</h3>
        </div>
        <div class="row">
            <!-- Product 1 -->
            <div class="col-md-4">
                <div class="product-content product-wrap clearfix">
                    <div class="row">
                        <div class="product-image">
                            <img src="{{asset('images/product/vlst101.jpeg')}}" alt="194x228" class="img-responsive" >
                            <p style="text-align: center;"><span style="">VLST-101</span><br />Electric ICU Bed with ABS Side Railings <br />(3/4/5 Function) </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="product-content product-wrap clearfix">
                    <div class="row">
                        <div class="product-image">
                            <img src="{{asset('images/product/vlst102.jpeg')}}" alt="194x228" class="img-responsive" >
                            <p style="text-align: center;"><span>VLST-102</span> <br />Electric ICU Bed with Collapsible Side Railings <br />(3/4/5 Function)</p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-4">
                <div class="product-content product-wrap clearfix">
                    <div class="row">
                        <div class="product-image">
                            <img src="{{asset('images/product/vlst103.jpeg')}}" alt="194x228" class="img-responsive">
                            <p style="text-align: center;"><span>VLST-103</span><br />Electric Fowler Bed </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container content">
        <div class="row">
            <h3 class="header">Delivery Beds</h3>
        </div>
        <div class="row">
            <!-- Product 1 -->
            <div class="col-md-4">
                <div class="product-content product-wrap clearfix">
                    <div class="row">
                        <div class="product-image">
                            <img src="{{asset('images/product/vlst201.jpeg')}}" alt="194x228" class="img-responsive" >
                            <p style="text-align: center;"><span>VLST-201</span><br/> Obstetric Labour Table (Hydraulic)</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="product-content product-wrap clearfix">
                    <div class="row">
                        <div class="product-image">
                            <img src="{{asset('images/product/vlst202.jpeg')}}" alt="194x228" class="img-responsive" >
                            <p style="text-align: center;"><span>VLST-202</span> <br/> Obstetric Labour Table (Fixed Height)</p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-4">
                <div class="product-content product-wrap clearfix">
                    <div class="row">
                        <div class="product-image">
                            <img src="{{asset('images/product/vlst203.jpeg')}}" alt="194x228" class="img-responsive">
                            <p style="text-align: center;"><span>VLST-203</span><br /> Obstetric Labour Table (Mechanical) </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container content">
        <div class="row">
            <h3 class="header">Patient Transfer Trolleys</h3>
        </div>
        <div class="row">
            <!-- Product 1 -->
            <div class="col-md-4">
                <div class="product-content product-wrap clearfix">
                    <div class="row">
                        <div class="product-image">
                            <img src="{{asset('images/product/vlst301.jpeg')}}" alt="194x228" class="img-responsive" >
                            <p style="text-align: center;"><span>VLST-301</span><br/> Emergency and Recovery Trolley (Hydraulic)</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="product-content product-wrap clearfix">
                    <div class="row">
                        <div class="product-image">
                            <img src="{{asset('images/product/vlst302.jpeg')}}" alt="194x228" class="img-responsive" >
                            <p style="text-align: center;"><span>VLST-302</span> <br/> Trolley (Fixed Height)</p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-4">
                <div class="product-content product-wrap clearfix">
                    <div class="row">
                        <div class="product-image">
                            <img src="{{asset('images/product/vlst303.jpeg')}}" alt="194x228" class="img-responsive">
                            <p style="text-align: center;"><span>VLST-303</span><br /> Trolley (Mechanical) </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container content">
        <div class="row">
            <h3 class="header">Others</h3>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="product-content product-wrap clearfix">
                    <div class="row">
                        <div class="product-image">
                            <img src="{{asset('images/product/new/couch.png')}}" alt="couch" class="img-responsive">
                            <p style="text-align: center;"><span>Couch</span><br /> Couch </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="product-content product-wrap clearfix">
                    <div class="row">
                        <div class="product-image">
                            <img src="{{asset('images/product/new/crash-medication.png')}}" alt="Crash Medication" class="img-responsive">
                            <p style="text-align: center;"><span>Crash Medication</span><br /> Crash Medication </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="product-content product-wrap clearfix">
                    <div class="row">
                        <div class="product-image">
                            <img src="{{asset('images/product/new/curtains.png')}}" alt="curtains" class="img-responsive">
                            <p style="text-align: center;"><span>Curtains</span><br /> Curtains </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="product-content product-wrap clearfix">
                    <div class="row">
                        <div class="product-image">
                            <img src="{{asset('images/product/new/flambe-trolly.png')}}" alt="flambe-trolly" class="img-responsive">
                            <p style="text-align: center;"><span>Flambe Trolley</span><br /> Flambe Trolley </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="product-content product-wrap clearfix">
                    <div class="row">
                        <div class="product-image">
                            <img src="{{asset('images/product/new/hospital-bad.png')}}" alt="hospital-bed" class="img-responsive">
                            <p style="text-align: center;"><span>Hospital Bed</span><br /> Hospital Bed </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="product-content product-wrap clearfix">
                    <div class="row">
                        <div class="product-image">
                            <img src="{{asset('images/product/new/medicine-trolly.png')}}" alt="medicine-trolly" class="img-responsive">
                            <p style="text-align: center;"><span>Medicine Trolley</span><br /> Medicine Trolley </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="product-content product-wrap clearfix">
                    <div class="row">
                        <div class="product-image">
                            <img src="{{asset('images/product/new/monitor-trolly.png')}}" alt="monitor-trolly" class="img-responsive">
                            <p style="text-align: center;"><span>Monitor Trolley</span><br /> Monitor Trolley </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="product-content product-wrap clearfix">
                    <div class="row">
                        <div class="product-image">
                            <img src="{{asset('images/product/new/multipurpose-trolly.png')}}" alt="multipurpose-trolly" class="img-responsive">
                            <p style="text-align: center;"><span>Multipurpose Trolley</span><br /> Multipurpose Trolley </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="product-content product-wrap clearfix">
                    <div class="row">
                        <div class="product-image">
                            <img src="{{asset('images/product/new/patient-examination-couch.png')}}" alt="patient-examination-couch" class="img-responsive">
                            <p style="text-align: center;"><span>Patient Examination Couch</span><br /> Patient Examination Couch </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="product-content product-wrap clearfix">
                    <div class="row">
                        <div class="product-image">
                            <img src="{{asset('images/product/new/pediatric-cot.png')}}" alt="pediatric-cot" class="img-responsive">
                            <p style="text-align: center;"><span>Pediatric Cot</span><br /> Pediatric Cot </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="product-content product-wrap clearfix">
                    <div class="row">
                        <div class="product-image">
                            <img src="{{asset('images/product/new/silver-monitor-trolly.png')}}" alt="silver-monitor-trolly" class="img-responsive">
                            <p style="text-align: center;"><span>Silver Monitor Trolley</span><br /> Silver Monitor Trolley </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="product-content product-wrap clearfix">
                    <div class="row">
                        <div class="product-image">
                            <img src="{{asset('images/product/new/soiled-linen-trolly.png')}}" alt="soiled-linen-trolly" class="img-responsive">
                            <p style="text-align: center;"><span>Soiled Linen Trolley</span><br /> Soiled Linen Trolley </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="product-content product-wrap clearfix">
                    <div class="row">
                        <div class="product-image">
                            <img src="{{asset('images/product/new/storage-bins.png')}}" alt="storage-bins" class="img-responsive">
                            <p style="text-align: center;"><span>Storage Bins</span><br /> Storage Bins </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
