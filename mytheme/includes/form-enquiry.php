<form>
    
    <h3 class="mb-5 mt-2">Send An Enquiry About <?php the_title()?></h3>
    <div class="form-group row mb-4">

        <div class="col-lg-6">
            <input type="text" name="fname" placeholder="First Name" class="form-control" required>
        </div>
        <div class="col-lg-6">
            <input type="text" name="lname" placeholder="Last Name" class="form-control" required>
        </div>
    </div>

    <div class="form-group row mb-4">
        <div class="col-lg-6">
            <input type="text" name="email" placeholder="Email Address" class="form-control" required>
        </div>
        <div class="col-lg-6">
            <input type="tel" name="phone" placeholder="Phone Number" class="form-control" required>
        </div>
    </div>

    <div class="form-group mb-4">
        <textarea name="enquiry" class="form-control" placeholder="Your Enquiry"></textarea>
    </div>
    <div class="form-group d-grid gap-2">
        <button type="submit" class="btn btn-dark">
            Send Your enquiry!
        </button>
    </div>

</form>

<script>
    //Function for form.
    (function($){

        $('#enquiry').submit( function(event){
            event.preventDefault();
            var endpoint = '<?php echo admin_url('admin-ajax.php');?>';
            var form = $('#enquiry').serialize();

            var formdata = new FormData;

            formdata.append('action', 'enquiry');
            formdata.append('enquiry', form);

            $.ajax(endpoint, {

                type: 'POST',
                data: formdata,
                processData: false,
                contentType: false,

                success: function(res){
                    alert(res.data);
                },

                error: function(err){

                }
            })
        })
    })(jQuery)



</script>