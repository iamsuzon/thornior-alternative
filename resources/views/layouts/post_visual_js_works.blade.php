var featuredImage = function (event) {
        // featured image
        var image = document.getElementById('cover-image-file');
        image.src = URL.createObjectURL(event.target.files[0]);
        document.getElementById('cover-image-label').style.display = 'none';
        document.getElementById('remove-cover-image').style.display = 'block';

        var imageShow = document.getElementById('coverImage');
        imageShow.src = URL.createObjectURL(event.target.files[0]);
    };

    // remove image
    var removeFeaturedImage = function (event) {
        var imageInput = document.getElementById('cover-image-input');
        imageInput.value = "";
        var image = document.getElementById('cover-image-file');
        image.src = "{{asset('backend/assets/images/blog/placeholder.jpg')}}";

        var imageShow = document.getElementById('coverImage');
        imageShow.src = "{{asset('backend/assets/images/blog/placeholder.jpg')}}";


        document.getElementById('cover-image-label').style.display = 'block';
        document.getElementById('remove-cover-image').style.display = 'none';
    }

    // Product Image
    var productImage = function (event) {
        // Product image
        // document.getElementById('image-box').style.display = 'block';
        var pimage = document.getElementById('outputp');
        pimage.src = URL.createObjectURL(event.target.files[0]);
        document.getElementById('image-labelp').style.display = 'none';
        document.getElementById('remove-imagep').style.display = 'block';
    };

    var removeProductImage = function (event) {
        var pimageInput = document.getElementById('filep');
        pimageInput.value = "";
        var pimage = document.getElementById('outputp');
        pimage.src = "{{asset('backend/assets/images/blog/placeholder.jpg')}}";

        // document.getElementById('p-image-box').style.display = 'none';
        document.getElementById('image-labelp').style.display = 'block';
        document.getElementById('remove-imagep').style.display = 'none';
    }

    // All texts
    // Title
    $('#title').keyup(function () {
        $('#post-title').text($('#title').val());
    });

    // intro heading
    $('#first-headline').keyup(function () {
        $('#intro-heading').text($('#first-headline').val());
    });

    // outro heading
    $('#last_headline').keyup(function () {
        $('#outro-heading').text($('#last_headline').val());
    });

    // Intro description
    $('#first-description').keyup(function () {
        $('#intro-description').text($('#first-description').val());
    });

    // Outro description
    $('#last-description').keyup(function () {
        $('#outro-description').text($('#last-description').val());
    });

    //colors
    $('#color_code1').keyup(function () {
        var color_code = $('#color_code1').val();
        var code = color_code.toUpperCase();
        $('.color-box1').children('.box').css('background-color', color_code);
        if (code == '#FFF' || code == '#FFFFFF')
        {
            $('.color-box1').children('.box').css('border', '1px solid lightgrey');
        }
        $('.color-box1').children('p').text(code.substring(1));
    });

    $('#color_code2').keyup(function () {
        var color_code = $('#color_code2').val();
        var code = color_code.toUpperCase();
        $('.color-box2').children('.box').css('background-color', color_code);
        if (code == '#FFF' || code == '#FFFFFF')
        {
            $('.color-box2').children('.box').css('border', '1px solid lightgrey');
        }
        $('.color-box2').children('p').text(code.substring(1));
    });

    $('#color_code3').keyup(function () {
        var color_code = $('#color_code3').val();
        var code = color_code.toUpperCase();
        $('.color-box3').children('.box').css('background-color', color_code);
        if (code == '#FFF' || code == '#FFFFFF')
        {
            $('.color-box3').children('.box').css('border', '1px solid lightgrey');
        }
        $('.color-box3').children('p').text(code.substring(1));
    });

    $('#color_code4').keyup(function () {
        var color_code = $('#color_code4').val();
        var code = color_code.toUpperCase();
        $('.color-box4').children('.box').css('background-color', color_code);
        if (code == '#FFF' || code == '#FFFFFF')
        {
            $('.color-box4').children('.box').css('border', '1px solid lightgrey');
        }
        $('.color-box4').children('p').text(code.substring(1));
    });

    $('#color_code5').keyup(function () {
        var color_code = $('#color_code5').val();
        var code = color_code.toUpperCase();
        $('.color-box5').children('.box').css('background-color', color_code);
        if (code == '#FFF' || code == '#FFFFFF')
        {
            $('.color-box5').children('.box').css('border', '1px solid lightgrey');
        }
        $('.color-box5').children('p').text(code.substring(1));
    });
