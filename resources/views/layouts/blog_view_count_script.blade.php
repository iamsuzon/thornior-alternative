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
            url: '{{ route('blog.views') }}',
            method: 'POST',
            data: {
                blogger_id: {{$blog->blogger->id}},
                blog_id: {{$blog->id}}
            },
            success: function(response) {
                console.log(response.success);
            }
        })
    }
</script>
