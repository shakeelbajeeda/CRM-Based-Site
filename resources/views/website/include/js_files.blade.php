<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#testimonial-slider").owlCarousel({
            items: 3,
            itemsDesktop: [1000, 2],
            itemsDesktopSmall: [979, 2],
            itemsTablet: [768, 1],
            pagination: false,
            navigation: true,
            navigationText: ["", ""],
            autoPlay: true
        });
    });
</script>
<script src="{{asset('website/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('website/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('website/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('website/vendor/select2/select2.min.js')}}"></script>
	<script src="{{asset('website/vendor/tilt/tilt.jquery.min.js')}}"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<script src="js/main.js"></script>
	<script>
		 var toastMixin = Swal.mixin({
    toast: true,
    icon: 'success',
    title: 'General Title',
    animation: false,
    position: 'top-right',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  });

		function validate_form() {

			let email = document.getElementById('email').value;
			console.log('Email = ' + email)
			let password = document.getElementById('password').value;
			console.log('Password = ' + password)
			if (email == '') {
				toastMixin.fire({
			    title: 'Email is required',
			    icon: 'error'
			  });
				return false;
			}
			 if (password == '') {
				toastMixin.fire({
			    title: 'Password is required',
			    icon: 'error'
			  });
				return false
			}
			if(email !='' && password !='' && checkEmail(email) && validate_password(password)) {
				toastMixin.fire({
			    animation: true,
			    title: 'Form Validated Successfully'
			  });
		     return false;
			} else {
		     return false;
			}
		}

		function checkEmail(email) {
	    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	    if (!filter.test(email)) {
	    	toastMixin.fire({
			    title: 'Please enter a valid email address',
			    icon: 'error'
			  });
	        return false;
		 } else {
		 	return true
		 }
		}
		function validate_password(password){
			if (password.length >= 6 && password.length  <= 12) {
				return true;
			}
			else{
					toastMixin.fire({
			    title: 'paasword must be between  6 to 12 characters',
			    icon: 'error'
			  });
					return false;

			}
		}
	</script>
    <script>
         function add_to_cart(id, operation = 'add'){
        let route = "{{ route('add_to_cart')}}";
        let token = "{{ csrf_token()}}";
        $.ajax({
                url: route,
                type: 'POST',
                data: {
                    _token:token,
                    id:id,
                    operation:operation


                },
                success: function(response) {
                    // console.log(response.count);
                    $('#cart_counts').text(response.count)
                    console.log(response.message)
                    $('#card_data').html(response.cart_section)

                },
                error: function(error) {
                    console.log(error)

                }
        });
    }
    function view_cart(){
        window.location.href = "{{route('view_cart')}}",true;
    }
    </script>
