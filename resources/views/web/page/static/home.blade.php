@extends('web.template.web')

@section('content')
<!-- hero area starts -->
    @include('web.partial.hero-slider')
<!-- about area starts -->

    @include('web.partial.about')

    {{-- @include('web.partial.summary') --}}

    @include('web.partial.type')

    @include('web.partial.service2')

    @include('web.partial.client')

    @include('web.partial.testimonial')

    {!! $partial_recent_blog !!}

    @include('web.partial.cta')
    
@endsection

@section('script')
    <script>
        $('#contactFormSubmit').on('click', function(e) {
            e.preventDefault();
            $('.form-message').text('Mengirim...');
            var form = $('#contactForm');
            var formData = form.serialize();

            $.ajax({
                url: '{{ route('web.contact-form.store') }}',
                type: 'POST',
                data: formData,
                success: function(response) {
                    console.log(response);
                    if (response.status === 'success') {
                        form[0].reset();
                    }
                    $('.form-message').text(response.message);
                },
                error: function(xhr) {
                    var errors = xhr.responseJSON.errors;
                    var errorMessage = '';
                    for (var key in errors) {
                        errorMessage += errors[key][0] + '\n';
                    }
                    $('.form-message').text(errorMessage);
                }
            });
        });
    </script>
@endsection