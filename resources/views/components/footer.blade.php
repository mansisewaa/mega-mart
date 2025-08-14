<style>
    .container a {
        font-size: 15px;
        margin-top: .4rem;
    }

    .map {
        width: 100%;
        height: 220px;
        border: none;
        border-radius: 8px;
        overflow: hidden;
    }

    .footer {
        color: white;
        position: relative;
    }

    .footer-title {
        font-size: 18px;
        margin-bottom: 1rem;
    }

    @media (max-width: 576px) {
        .footer-title {
            font-size: 16px;
        }

        .container a {
            font-size: 14px;
        }

        .map {
            width: 85%;
            height: 150px;
            /* Adjust height for smaller screens */
        }

        .footer .col-md-4 {
            margin-bottom: 1rem;
        }

        .footer .nav-link {
            text-align: center;
            /* Center links for mobile */
        }

        .footer .col-md-4 {
            margin-bottom: 1rem;
            width: 50%;
        }
    }
</style>

<div class="footer" style="color: white; position: relative;">
    <div class="container" style="background-image: url('{{ asset('images/ban-10.png') }}'); background-size: 110% auto; background-position: center;">
        <div class="row py-4">
            <div class="col-lg-4 col-md-4 col-sm-3 mb-3">
                <div class="footer-title h4 fw-bold">
                    Quick Links
                </div>
                <a href="#" class="nav-link"> About Us </a>
                <a href="/career" class="nav-link"> Career </a>
                <a href="#" class="nav-link"> Services </a>
                <a href="#" class="nav-link"> Tenders </a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-3 mb-3">
                <div class="footer-title h4 fw-bold">
                    Follow Us
                </div>
                <a href="#" class="nav-link">Facebook </a>
                <a href="#" class="nav-link">Instagram </a>
                <a href="#" class="nav-link">X </a>
                <a href="#" class="nav-link">Youtube </a>
            </div>
            @php
            $latestUpdate = DB::table(DB::raw('(SELECT updated_at AS latest_date FROM contents UNION SELECT updated_at AS latest_date FROM notifications) AS combined_dates'))
            ->max('latest_date');
            @endphp

            <div class="col-lg-4 col-md-6 col-sm-12">
                <div>
                    <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14325.679612737002!2d91.7842008!3d26.1504509!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x375a58e2ffffffff%3A0x8d6366c1fad34caf!2sAssam%20Urban%20Infrastructure%20Investment%20Program!5e0!3m2!1sen!2sin!4v1724830953229!5m2!1sen!2sin" allowfullscreen="" loading="lazy"></iframe>
                    <div class="mt-1" style="font-size: 16px;">Last Updated Date: @if($latestUpdate) {{ date('d-m-Y', strtotime($latestUpdate)) }} @else @endif </br> Visitor Count: {{$count}}</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div style="background: #04182f; color: white;">
    <div class="container" style="padding: 1rem;">
        <div class="row">
            <a href="#" class="nav-link" style="text-align: center;">Designed and Developed by Indigi Consulting & Solutions Pvt. Ltd</a>
        </div>
    </div>
</div>



<!-- Your existing JavaScript libraries and scripts -->
<!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>
<script src="{{asset('frontend/lightbox2/dist/js/lightbox-plus-jquery.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>



<script>
    function changeLanguage(lang) {
        // Implement logic to switch content based on the selected language
        const pageTitleElement = document.getElementById('pageTitle');
        const pageContentElement = document.getElementById('pageContent');

        if (lang === 'en') {
            translate('en', pageTitleElement);
            translate('en', pageContentElement);
        } else if (lang === 'as') {
            translate('as', pageTitleElement);
            translate('as', pageContentElement);
        }
    }

    function translate(targetLang, element) {
        const sourceText = element.textContent;

        // Use Google Translate API or any other translation service
        const apiKey = 'YOUR_GOOGLE_TRANSLATE_API_KEY';
        const apiUrl = `https://translation.googleapis.com/language/translate/v2?key=${apiKey}&source=en&target=${targetLang}&q=${sourceText}`;

        $.ajax({
            url: apiUrl,
            method: 'GET',
            success: function(response) {
                const translatedText = response.data.translations[0].translatedText;
                element.textContent = translatedText;
            },
            error: function(error) {
                console.error('Translation error:', error);
            }
        });
    }

    // // JavaScript functions to toggle font size
    // function decreaseFontSize() {
    //     changeFontSize('decrease');
    // }

    // function resetFontSize() {
    //     changeFontSize('reset');
    // }

    // function increaseFontSize() {
    //     changeFontSize('increase');
    // }

    // function changeFontSize(action) {
    //     const body = document.body;
    //     const currentSize = parseInt(window.getComputedStyle(body).fontSize);

    //     switch (action) {
    //         case 'decrease':
    //             body.style.fontSize = Math.max(12, currentSize - 2) + 'px';
    //             break;
    //         case 'reset':
    //             body.style.fontSize = '16px'; // Default font size
    //             break;
    //         case 'increase':
    //             body.style.fontSize = Math.min(24, currentSize + 2) + 'px';
    //             break;
    //         default:
    //             break;
    //     }
    // }

    let currentFontSize = 16;

    function updateFontSize() {
        const elements = document.querySelectorAll('li, a, p,h2,h3,h4');
        elements.forEach((element) => {
            element.style.fontSize = currentFontSize + 'px';
        });
    }

    function increaseFontSize() {
        currentFontSize += 1;
        updateFontSize();
    }

    function decreaseFontSize() {
        if (currentFontSize > 10) {
            currentFontSize -= 1;
            updateFontSize();
        }
    }

    function resetFontSize() {
        currentFontSize = 16;
        updateFontSize();
    }
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
</script>
<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en',
            includedLanguages: 'en,as', // Include English (en) and Assamese (as)
        }, 'google_translate_element');
    }
</script>

</body>

</html>