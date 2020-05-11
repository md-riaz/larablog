<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
<script async src="{{ asset('js/toastr.min.js') }}"></script>
<script async src="{{ asset('js/sweetalert2.js') }}"></script>
<script async src="{{ asset('js/app.js') }}"></script>

<!-- copy url from share method -->
<script>


    // jquery toastr message -->
    $(document).ready(function () {
        // Toastr Notification
            @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}";
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;

            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;

            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;

            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
        @endif
    });


    <!-- Native Lazyload -->
    if ('loading' in HTMLImageElement.prototype) {
        const images = document.querySelectorAll('img[loading="lazy"]');
        images.forEach(img => {
            img.src = img.dataset.src;
        });
    } else {
        // Dynamically import the LazySizes library
        // const script = document.createElement('script');
        // script.src =
        //     'https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.1.2/lazysizes.min.js';
        // document.body.appendChild(script);
    }
    <!-- Native Lazyload End -->

    // Remove 000webhost branding -->
    window.onload = () => {
        let bannerNode = document.querySelector('[alt="www.000webhost.com"]').parentNode.parentNode;
        bannerNode.parentNode.removeChild(bannerNode);
    }
</script>
