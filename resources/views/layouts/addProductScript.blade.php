<script>
    $(document).ready(function () {
        getProducts();

        function getProducts() {
            $.ajax({
                type: 'GET',
                url: '{{route('blogger.blog.post.image.products')}}',
                dataType: 'JSON',
                success: function (response) {
                    // console.log(response.products);
                    $('.product').remove();
                    $.each(response.products, function (key, item) {
                        $('#add_products_section').append(
                            '<div class="product" id="product-' + item.id + '">\
                                <img class="d-inline-block" src="{{asset('upload/blogger_product')}}/' + item.image + '" alt="" width="50px" height="50px">\
                                    <div class="product_texts d-inline-block">\
                                        <h5>' + item.product_name + '</h5>\
                                        <a href="' + item.link + '">Link</a>\
                                    </div>\
                                    <div class="cross">\
                                        <a target="_blank" href="javascript:void(0)" id="productId' + item.id + '">\
                                            <i class="fas fa-times"></i>\
                                        </a>\
                                    </div>\
                            </div>'
                        );
                        document.getElementById('productId' + item.id).onclick = function () {
                            productDelete(item.id)
                            $("#product-" + item.id).remove();
                        };
                    });
                }
            });
        }

        function productDelete(id) {
            $.ajax({
                url: '{{url('blogger/blog/product/delete')}}' + '/' + id,
                type: 'get',
                data: {
                    _token: $("input[name=_token]").val()
                },
                success: function (response) {

                }
            });
        }

        $('#bloggerProductForm').on('submit', function (event) {
            event.preventDefault();

            $.ajax({
                url: '{{ route("blogger.blog.product.store") }}',
                method: 'post',
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    if (data.error) {
                        var error_html = '';
                        for (var count = 0; count < data.error.length; count++) {
                            error_html += '<p>' + data.error[count] + '</p>';
                        }
                        toastr.error(error_html);
                    } else {
                        $("#modal_close").click();
                        toastr.success(data.success);

                        document.getElementById("bloggerProductForm").reset();

                        document.getElementById('image-labelp').style.display = 'block';
                        document.getElementById('remove-imagep').style.display = 'none';

                        var pimageInput = document.getElementById('filep');
                        pimageInput.value = "";
                        var pimage = document.getElementById('outputp');
                        pimage.src = "{{asset('backend/assets/images/blog/placeholder.jpg')}}";

                        getProducts();
                    }
                }
            })
        });
    });
</script>
