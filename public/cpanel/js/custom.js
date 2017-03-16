/**
 * Created by h-sx on 12/03/2017.
 */

$(document).ready(function(){


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
             $('#consultant-speciality').html(data.consultant.speciality);
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

        $('#properties').append("<div class='form-group'><div class='input-group'><input class='form-control' required='required' placeholder='Agregue una propiedad como talla, color, entre otras' name='option_"+$id+"' type='text' aria-describedby = 'delete-form'>" +
            "<span class='input-group-addon' id='delete-form'><a href='#' class='removeForm'><span class='glyphicon glyphicon-remove-sign' aria-hidden='true'></span></a></span></div></div>");

    });

    $('.removeForm').live('click', function (e) {
        e.preventDefault();

       $(this).closest('.form-group').remove();



    });



});


