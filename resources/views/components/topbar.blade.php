<style>
    @media (max-width: 576px) {
       .topbar {
        height: 4.2rem !important;
       }

       .topbar .font_btn {
            font-size: 0.75rem;
        }
        .topbar .fw-bold {
            font-size: 1rem; /* Adjust font size on smaller screens */
        }
    }
</style>

<div class="topbar d-md-block">
    <div class="container">
        <div class="row justify-content-center align-items-center py-0 text-center text-md-start">
            <div class="col-sm-6 fw-bold" style="text-transform: uppercase;">Government of Assam</div>
            <div class="col-sm-6 d-flex justify-content-center justify-content-md-end">
                <div class="d-flex border-end pe-2">
                    <a class="btn font_btn" onclick="decreaseFontSize()">{{ trans('messages.A-') }}</a>
                    <a class="btn font_btn" onclick="resetFontSize()">{{ trans('messages.A') }}</a>
                    <a class="btn font_btn" onclick="increaseFontSize()">{{ trans('messages.A+') }}</a>
                </div>
                <div class="px-2"><a href="#maincontent" class="btn font_btn">{{ trans('messages.SKIP TO MAIN CONTENT') }}</a></div>
            </div>
        </div>
    </div>
</div>
