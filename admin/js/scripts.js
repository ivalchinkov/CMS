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
            };
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

});
