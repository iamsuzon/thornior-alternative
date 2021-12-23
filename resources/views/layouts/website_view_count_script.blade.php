<script>
    window.onload = function() {
        setTimeout(function(){
            view()
        },3000);
    };

    function view()
    {
        // event.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '{{ route('website.views') }}',
            method: 'POST',
            data: {},
            success: function(response) {
                console.log(response.success);
            }
        })
    }
</script>
