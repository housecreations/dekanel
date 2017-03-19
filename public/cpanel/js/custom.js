/**
 * Created by h-sx on 12/03/2017.
 */

$(document).ready(function(){

    $('#preloader').fadeOut('slow');
    $('body').css({'overflow':'visible'});


    $(".edit_carousel").on("click", function(ev){

        var image_id = $(this).attr('data-image');

        $('#edit_image_id').val(image_id);

    });

    $(".delete_carousel").on("click", function(ev){

        var image_id = $(this).attr('data-image');

        $('#delete_image_id').val(image_id);

    });


    $(".add_description").on("click", function(ev){

        var workshop_id = $(this).attr('data-workshop');

       $('#workshop_id').val(workshop_id);

        $.ajax({
            url: '/admin/products/workshops/description/' + workshop_id,
            method: 'GET',
            success: function(data){

                $('#properties').html('');

                if(data.workshopDescriptions.length === 0){

                    $('#properties').append("<div class='form-group'><div class='input-group'><input class='form-control' required='required' placeholder='Agregue una descripción para el taller' name='option_1' type='text' aria-describedby = 'delete-form'>" +
                        "<span class='input-group-addon' id='delete-form'><a href='#' class='removeForm'><span class='glyphicon glyphicon-remove-sign' aria-hidden='true'></span></a></span></div></div>");
                }else{


                    data.workshopDescriptions.forEach(function (description) {


                       $('#properties').append("<div class='form-group'><div class='input-group'><input value='"+description.title+"' class='form-control' required='required' placeholder='Agregue una descripción para el taller' name='option_"+description.id+"' type='text' aria-describedby = 'delete-form'>" +
                            "<span class='input-group-addon' id='delete-form'><a href='#' class='removeForm'><span class='glyphicon glyphicon-remove-sign' aria-hidden='true'></span></a></span></div></div>");


                    });

                }


            },
            error: function(err){
                console.log(err);

            }
        });

    });


    $(".edit_configuration").on("click", function(ev){

        var configuration_id = $(this).attr('data-configuration');

        $('#edit_configuration_id').val(configuration_id);

        $.ajax({
            url: '/admin/configuration/' + configuration_id,
            method: 'GET',
            success: function(data){

                $("#editConfiguration [name='edit_value']").val(data.configuration.value);

            },
            error: function(err){
                console.log(err);

            }
        });

    });



    $('.remove_workshop').on('click', function(e){
        var workshop_id = $(this).attr('data-workshop');
        $('#workshop_id_field').val(workshop_id);
    });

    $(".show_workshop").on("click", function(ev){

        var workshop_id = $(this).attr('data-workshop');

        $.ajax({
            url: '/admin/products/workshops/show/' + workshop_id,
            method: 'GET',
            success: function(data){

                $('#workshop-name').html(data.workshop.name);
                $('#workshop-img').attr('src', '/images/workshops/'+data.workshop.image_url);
            },
            error: function(err){
                console.log(err);

            }
        });

    });

    $(".edit_workshop").on("click", function(ev){

        var workshop_id = $(this).attr('data-workshop');

        $('#edit_workshop_id').val(workshop_id);

        $.ajax({
            url: '/admin/products/workshops/show/' + workshop_id,
            method: 'GET',
            success: function(data){

                $("#editWorkshop [name='edit_name']").val(data.workshop.name);

            },
            error: function(err){
                console.log(err);

            }
        });

    });





    $('.remove_product').on('click', function(e){
        var product_id = $(this).attr('data-product');
        $('#product_id_field').val(product_id);
    });

    $(".show_product").on("click", function(ev){

        var product_id = $(this).attr('data-product');

        $.ajax({
            url: '/admin/products/' + product_id,
            method: 'GET',
            success: function(data){

                $('#product-name').html(data.product.name);
                $('#product-description').html(data.product.description);
                $('#product-img').attr('src', '/images/products/'+data.product.image_url);
                $('#product-consultant-img').attr('src', '/images/products/consultants/'+data.product.consultant_image_url);
                $('#product-beside-img').attr('src', '/images/products/beside/'+data.product.beside_image_url);
            },
            error: function(err){
                console.log(err);

            }
        });

    });

    $(".edit_product").on("click", function(ev){

        var product_id = $(this).attr('data-product');

        $('#edit_product_id').val(product_id);

        $.ajax({
            url: '/admin/products/' + product_id,
            method: 'GET',
            success: function(data){

                $("#editProduct [name='edit_name']").val(data.product.name);
                $("#editProduct [name='edit_description']").val(data.product.description);


            },
            error: function(err){
                console.log(err);

            }
        });

    });





    $('.remove_client').on('click', function(e){
        var client_id = $(this).attr('data-client');
        $('#client_id_field').val(client_id);
    });

    $(".show_client").on("click", function(ev){

        var client_id = $(this).attr('data-client');

        $.ajax({
            url: '/admin/clients/' + client_id,
            method: 'GET',
            success: function(data){

                $('#client-description').html(data.client.description);
                $('#client-img').attr('src', '/images/clients/'+data.client.logo_url);
            },
            error: function(err){
                console.log(err);

            }
        });

    });

    $(".edit_client").on("click", function(ev){

        var client_id = $(this).attr('data-client');

        $('#edit_client_id').val(client_id);

        $.ajax({
            url: '/admin/clients/' + client_id,
            method: 'GET',
            success: function(data){

                $("#editClient [name='edit_description']").val(data.client.description);

            },
            error: function(err){
                console.log(err);

            }
        });

    });


    $('.remove_consultant').on('click', function(e){
        var consultant_id = $(this).attr('data-consultant');
        $('#consultant_id_field').val(consultant_id);
    });

    $(".show_consultant").on("click", function(ev){


        var consultant_id = $(this).attr('data-consultant');

        $.ajax({
            url: '/admin/consultants/' + consultant_id,
            method: 'GET',
            success: function(data){

             $('#consultant-name').html(data.consultant.name);
             $('#consultant-last-name').html(data.consultant.last_name);
             $('#consultant-description').html(data.consultant.description);

             $('#consultant-img').attr('src', '/images/consultants/'+data.consultant.profile_image_url);

            },
            error: function(err){
                console.log(err);

            }
        });

    });


    $(".edit_consultant").on("click", function(ev){

        var consultant_id = $(this).attr('data-consultant');

        $('#edit_consultant_id').val(consultant_id);

        $.ajax({
            url: '/admin/consultants/' + consultant_id,
            method: 'GET',
            success: function(data){

                $("#editConsultant [name='edit_name']").val(data.consultant.name);
                $("#editConsultant [name='edit_last_name']").val(data.consultant.last_name);
                $("#editConsultant [name='edit_description']").val(data.consultant.description);
                $("#editConsultant [name='edit_speciality']").val(data.consultant.speciality);

            },
            error: function(err){
                console.log(err);

            }
        });

    });



    $('#addPropertyLink').on('click', function (e) {
        e.preventDefault();

        $name_value = $('#properties').children(':last-child').find('input').attr('name');

        if($name_value){
        $id = parseInt($name_value.slice(-1)) + 1;
        }else{
          $id = 1;
        }

        $('#properties').append("<div class='form-group' id='toFadeIn"+$id+"' style='display: none;'><div class='input-group'><input class='form-control' required='required' placeholder='Agregue una descripción para el taller' name='option_"+$id+"' type='text' aria-describedby = 'delete-form'>" +
            "<span class='input-group-addon' id='delete-form'><a href='#' class='removeForm'><span class='glyphicon glyphicon-remove-sign' aria-hidden='true'></span></a></span></div></div>");
        $('#toFadeIn'+$id).fadeIn();

    });

    $('.removeForm').live('click', function (e) {
        e.preventDefault();

       $(this).closest('.form-group').fadeOut( "slow", function() {
          $(this).remove();
       });
       /* remove();*/



    });



});


