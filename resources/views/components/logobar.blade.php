<!-- <div class="container  header_bar">
    <div class="d-flex justify-content-between align-items-center">
    
        <img src="{{ asset('images/ashok_chakra.png') }}" alt="title-bar" class="img-fluid" width="90" height="100">
        <div class="text-left" style="flex-grow: 1; padding-left: 20px;">
            <p class="m-0">
                <span class="header_name" style="font-size: 22px;text-transform:uppercase;">Assam Urban Infrastructure Development and Finance Corporation</span><br>
                <span class="text_details" style="font-size: 16px; color: #00245c;text-transform:uppercase;">DOHUA, Government of Assam</span><br>
            </p>
        </div>
        <div class="d-flex">
            <img src="{{ asset('images/amrit-mahotsav.png')}}" alt="title-bar" class=" mx-2" width="150" height="100">
        </div>
    </div>
</div> -->


<style>
    /* .header_bar {
        background-color: #f8f9fa;
        padding: 10px 0;
    }

    .header_bar img {
        max-width: 100%;
        height: auto;
    }

    .header_name {
        font-size: 22px;
        text-transform: uppercase;
    }

    .text_details {
        font-size: 16px;
        color: #00245c;
        text-transform: uppercase;
    } */

    a {
        color: rgba(var(--bs-link-color-rgb), var(--bs-link-opacity, 1));
        text-decoration: none !important;
    }

    @media (max-width: 576px) {
        /* Reduce logo size for smaller screens */
       
        .header_bar img {
            width: 50px;
            height: auto;
        }

        /* Adjust font sizes for smaller screens */
        /* .header_name {
            font-size: 16px;
        } */

        .text_details {
            font-size: 12px;
        }

        /* Align items in a row but with smaller padding */
        .header_bar .text-left {
            padding-left: 10px;
        }

        /* Keep everything in a single line */
        .header_bar .d-flex {
            flex-direction: row;
            align-items: center;
        }
        .header_name {
            font-size: 11px !important;
        }

        a {
            font-size: 10px !important;
        }
    }
</style>

<div class="container header_bar">
    <div class="d-flex justify-content-between align-items-center">
        <!-- Left logo -->
        <div>
            <img src="{{ asset('images/ashok_chakra.png') }}" alt="title-bar" class="img-fluid" width="90" height="90">
        </div>

        <!-- Center text (left-aligned but adjusted for mobile) -->
        <div class="text-left" style="flex-grow: 1; padding-left: 20px;">
            <p class="m-0">
                <span class="header_name">Assam Urban Infrastructure Development and Finance Corporation</span><br>
                <span class="text_details" style="font-size: 16px;"><a href="https://dohua.assam.gov.in/" onclick="return confirm('You will be redirected to an external website.')" target="_blank" style="color: #00245c;">Department of Housing & Urban Affairs</a></span><br>
                <span class="text_details"><a href="https://assam.gov.in/" onclick="return confirm('You will be redirected to an external website.')" target="_blank" style="color: #c50909;">Government of Assam</a></span><br>
            </p>
        </div>

        <!-- Right logos -->
        <div>
            <img src="{{ asset('images/amrit-mahotsav.png') }}" alt="title-bar" class="mx-2" width="150" height="100">
        </div>
    </div>
</div>

