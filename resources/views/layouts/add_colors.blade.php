<script type="text/javascript">
    $(document).ready(function(){

        var count = 1;

        dynamic_field(count);

        function dynamic_field(number)
        {
            var html = '<div>';
            html += '<input type="text" name="color_code[]" class="my-2 form-control form-control-sm" placeholder="#000FFF" />';
            if(number > 1)
            {
                html += '<button type="button" name="remove" id="" class="mb-2 btn btn-danger float-start remove">Remove</button></div>';
                $('.color-body').append(html);
            }
            else
            {
                html += '<button type="button" name="add" id="add" class="mb-2 float-end btn btn-success">Add More</button></div>';
                $('.color-body').html(html);
            }
        }

        $(document).on('click', '#add', function(){
            count++;
            dynamic_field(count);
        });

        $(document).on('click', '.remove', function(){
            count--;
            $(this).closest("div").remove();
        });
    });
</script>
