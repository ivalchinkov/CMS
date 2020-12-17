/**
 * Created by ivaylo on 09-Dec-20.
 */

$(document).ready(function () {
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
        console.error( error );
    });
    $('#select_all_boxes').click(function(event){
        if(this.checked){
            $('.check_boxes').each(function(){
                this.checked = true;
            });
        } else {
            $('#select_all_boxes').click(function(event){
            if(this.checked){
                $('.check_boxes').each(function(){
                    this.checked = false;

                });
            }
            });
        }
    });
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);

    var div_box = "<div id = 'load-screen'><div id = 'loading'></div></div>";
    $("body").prepend(div_box);
    $('#load-screen').delay(400).fadeOut(500, function(){
        $(this).remove();
    });



    function validate_password(e){
        e.preventDefault();
        var a = $("#password").val();
        var b = $("#confirm_password").val();
        if (a !== b) {
            alert("Passwords do no match");
            return false;
        }
    }

    // your form
    var form = document.getElementById("login_form");

    // attach event listener
    form.addEventListener("submit", validate_password, true);
});

function load_users_online(){
    $.get("functions_admin.php?users_online=result", function(data){
     $(".users_online").text(data);
    });
}//load_users_online

load_users_online();

setInterval(function(){
    load_users_online();
},60000);
