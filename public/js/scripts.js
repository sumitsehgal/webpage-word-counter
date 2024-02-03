/*!
* Start Bootstrap - Modern Business v5.0.7 (https://startbootstrap.com/template-overviews/modern-business)
* Copyright 2013-2023 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-modern-business/blob/master/LICENSE)
*/
// This file is intentionally blank
// Use this file to add JavaScript to your project

function showPassword() {
  var x = document.getElementById("exampleInputPassword1");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}


$(document).ready(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#url-search").on("click", function() {

        let url = $("#url").val()
        if(url == "") {
            alert("Please enter url")
            return false
        }

        $.ajax({
            url: '/webrecord/search',
            type: "post",
            data: {
                url: url
            },
            success: function(response) {
                console.log(response)
                if(response.id) {
                    $("#url-title").html("Waiting...")
                    $("#word-count").html("Waiting...")
                    let myInterval = setInterval(function() {

                        $.ajax({
                            url: '/webrecord/'+response.id,
                            type: "get",
                            success: function(response) {
                                if(response.title) {
                                    $("#url-title").html(response.title)
                                }
                                if(response.word_count) {
                                    $("#word-count").html(response.word_count)
                                    clearInterval(myInterval)
                                }

                            }
                        })
                    }, 2000)


                }

            },
            complete: function() {

            }
        })

        return false
    })


})
