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
            url: '{{ route('views') }}',
            method: 'POST',
            data: {
                template_type: '{{$post['post']->post_type}}',
                template_id: {{$post['post']->template_id}},
                post_id: {{$post['post']->id}},
                blogger_id: {{$post['post']->blogger_id}},
            },
            success: function(response) {
                console.log(response.success);
            }
        })
    }
</script>
