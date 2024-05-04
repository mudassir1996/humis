$(function() {
  'use strict';

  // $.validator.setDefaults({
  //   submitHandler: function() {
  //     alert("submitted!");
  //   }
  // });
  $(function() {
    // validate signup form on keyup and submit
    $("#signupForm").validate({
      rules: {
        name: {
          required: true,
          minlength: 3
        },
        password: {
          required: true,
          minlength: 5
        },
        confirm_password: {
          required: true,
          minlength: 5,
          equalTo: "#password"
        },
        email: {
          required: true,
          email: true
        },
        topic: {
          required: "#newsletter:checked",
          minlength: 2
        },
        agree: "required"
      },
      messages: {
        name: {
          required: "Please enter a name",
          minlength: "Name must consist of at least 3 characters"
        },
        password: {
          required: "Please provide a password",
          minlength: "Your password must be at least 5 characters long"
        },
        confirm_password: {
          required: "Please provide a password",
          minlength: "Your password must be at least 5 characters long",
          equalTo: "Please enter the same password as above"
        },
        email: "Please enter a valid email address",
      },
      errorPlacement: function(label, element) {
        label.addClass('mt-2 text-danger');
        label.insertAfter(element);
      },
      highlight: function(element, errorClass) {
        $(element).parent().addClass('has-danger')
        $(element).addClass('form-control-danger')
      }
    });
    $("#bookingStep1").validate({
      rules: {
        company_id: {
          required: true,
        },
        booking_office_id: {
          required: true,
        },
        client_country: {
          required: true,
        },
        booking_nature: {
          required: true,
        },
        agent_name:{
          required:true,
        },
        agent_commission:{
          required:true,
        },
        num_of_hujjaj:{
          required:true,
        },
        companion:{
          required:true,
        },
        contact_name:{
          required:true,
        },
        contact_surname:{
          required:true,
        },
        contact_mobile:{
          required:true,
        },
      },
      errorPlacement: function (label, element) {
        // console.log(element);
        label.addClass('mt-2 text-danger');
        if (element.hasClass('select2-single') && element.next('.select2-container').length) {
          label.insertAfter(element.next('.select2-container'));
        } else {
          label.insertAfter(element);
        }
      },
      highlight: function (element, errorClass) {
        $(element).parent().addClass('has-danger')
        $(element).addClass('form-control-danger')
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).parent().removeClass('has-danger')
        $(element).removeClass('form-control-danger')
      },
    });
    $("#bookingStep2").validate({
      rules: {
        package_type: {
          required: true,
        },
        currency: {
          required: true,
        },
        package_id: {
          required: true,
        },
        // cost_per_person: {
        //   required: true,
        // },
        maktab_category_id:{
          required:true,
        },
        duration_of_stay:{
          required:true,
        },
        nature:{
          required:true,
        },
        aziziya_accommodation_id:{
          required:true,
        },
        makkah_accommodation_id:{
          required:true,
        },
        makkah_room_sharing:{
          required:true,
        },
        madinah_accommodation_id:{
          required:true,
        },
        madinah_room_sharing:{
          required:true,
        },
        food_type_id:{
          required:true,
        },
        ticket_id:{
          required:true,
        },
       
      },
      errorPlacement: function (label, element) {
        // console.log(element);
        label.addClass('mt-2 text-danger');
        if (element.hasClass('select2-single') && element.next('.select2-container').length) {
          label.insertAfter(element.next('.select2-container'));
        } else {
          label.insertAfter(element);
        }
      },
      highlight: function (element, errorClass) {
        $(element).parent().addClass('has-danger')
        $(element).addClass('form-control-danger')
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).parent().removeClass('has-danger')
        $(element).removeClass('form-control-danger')
      }
    });
    $("#bookingStep3").validate({
      rules: {
        given_name: {
          required: true,
        },
        surname: {
          required: true,
        },
        father_husband_name: {
          required: true,
        },
       
        passport:{
          required:true,
        },
       
        cnic:{
          required:true,
        },
        blood_group:{
          required:true,
        },
        gender:{
          required:true,
        },
        mobile_number:{
          required:true,
        },
        departure_airport_pk_id:{
          required:true,
        },
        arrival_airport_ksa_id:{
          required:true,
        },
        arrival_date_ksa:{
          required:true,
        },
        departure_airport_ksa_id:{
          required:true,
        },
        arrival_airport_pk_id:{
          required:true,
        },
        departure_date_ksa:{
          required:true,
        },
       
      },
      errorPlacement: function (label, element) {
        // console.log(element);
        label.addClass('mt-2 text-danger');
        if (element.hasClass('select2-single') && element.next('.select2-container').length) {
          label.insertAfter(element.next('.select2-container'));
        } else {
          label.insertAfter(element);
        }
      },
      highlight: function (element, errorClass) {
        $(element).parent().addClass('has-danger')
        $(element).addClass('form-control-danger')
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).parent().removeClass('has-danger')
        $(element).removeClass('form-control-danger')
      }
    });

    $("#airport-form").validate({
      rules: {
        airport_name:{
          required:true
        },
        airport_country_code:{
          required:true
        }
      },
      errorPlacement: function (label, element) {
        // console.log(element);
        label.addClass('mt-2 text-danger');
        if (element.hasClass('select2-single') && element.next('.select2-container').length) {
          label.insertAfter(element.next('.select2-container'));
        }else{
          label.insertAfter(element);
        }
      },
      highlight: function (element, errorClass) {
        $(element).parent().addClass('has-danger')
        $(element).addClass('form-control-danger')
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).parent().removeClass('has-danger')
        $(element).removeClass('form-control-danger')
      }
    });
    $("#profile-form").validate({
      rules: {
        name: {
          required: true,
        },
        password: {
          minlength: 6,
        },
        password_confirmation: {
          minlength: 6,
          equalTo: "#password"
        }
      },
      messages:{
        password_confirmation:"Please re-enter the new password"
      },
      
      highlight: function (element, errorClass) {
        console.log(errorClass);
        $(element).parent().addClass('has-danger')
        $(element).addClass('form-control-danger')
      },
      unhighlight: function (element, errorClass, validClass){
        $(element).parent().removeClass('has-danger')
        $(element).removeClass('form-control-danger')
      }
    });
    $("#company-form").validate({
      rules: {
        company_name: {
          required: true,
        },
        company_contact: {
          required: true,
        },
        login_email: {
          required: true,
        },
        login_password: {
          required: true,
        },
        password: {
          minlength: 6,
        },
        password_confirmation: {
          minlength: 6,
          equalTo: "#password"
        }
      },
      messages:{
        password_confirmation:"Please re-enter the new password"
      },
      
      highlight: function (element, errorClass) {
        console.log(errorClass);
        $(element).parent().addClass('has-danger')
        $(element).addClass('form-control-danger')
      },
      unhighlight: function (element, errorClass, validClass){
        $(element).parent().removeClass('has-danger')
        $(element).removeClass('form-control-danger')
      }
    });
  });
});