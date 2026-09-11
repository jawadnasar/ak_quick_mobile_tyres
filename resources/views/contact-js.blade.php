
<script>
    $(document).ready(function() {
    
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#contact_form').on('submit', function(e) {
          
            e.preventDefault();

            var formData = new FormData(this);
            $("#loading").show();

            $.ajax({
                type: "POST",
                url: "{{ route('contact.add') }}",
                dataType: 'json',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    $("#loading").hide();

                    if (data.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: data.msg,
                            allowOutsideClick: false,
                            confirmButtonText: 'OK'
                        }).then(function() {
                            window.location.href = "{{ route('home') }}";
                        });
                    } else {
                        toastr.error(data.msg);
                    }
                },
                error: function(request, status, error) {
                    $("#loading").hide();

                    if(request.status === 422) {
                        var errors = request.responseJSON.errors;
                        console.log(errors); // Debugging: log errors to console
                        $.each(errors, function(key, value) {
                            toastr.error(value[0]); // Display the first validation message
                            $('#' + key).focus();
                            return false; // Focus on the first error field and break the loop
                        });
                    } else {
                        toastr.error(request.responseText);
                    }
                }
            });
        });
    });
</script>
