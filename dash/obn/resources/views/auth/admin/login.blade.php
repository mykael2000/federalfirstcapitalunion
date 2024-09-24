<!DOCTYPE html>
<html lang="en">
<head>
<title> Federal First Capital Union Bank - ACCOUNT - LOGIN</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="author" content="html.design">
<!-- description -->
<meta name="description" content="Wizard Form with Validation - Responsive">
<link rel="shortcut icon" href="{{asset('img/158974683872702247.png')}}">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{asset('dist/css/bootstrap.min.css')}}">
<!-- Fontawesome CSS -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css">
<!-- Fonts and icons -->
<link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700" rel="stylesheet"> 
<!-- Reset CSS -->
<link rel="stylesheet" href="{{asset('dist/css/reset.css')}}">
<!-- Style CSS -->
<link rel="stylesheet" href="{{asset('dist/css/style.css')}}">
<!-- Responsive  CSS -->
<link rel="stylesheet" href="{{asset('dist/css/responsive.css')}}">
</head>
<body>

<div class="wizard-main">
	<div id="particles-js"></div>
	<div class="container">
		
		<div class="row">
			<div class="col-lg-6 offset-lg-3 login-sec" style="border-radius:10px;margin-top:3rem;">
				<div class="login-sec-bg" >
					<h2 class="text-center text-dark">Federal First Capital Union Bank ADMIN LOGIN</h2>
					<p class="text-center text-dark mb-5">Welcome back! Login to access your dashboard</p>
                    @if ($errors->any())
                        <div class="mt-3 mb-3">
                            <div class="font-medium text-red-600 alert alert-danger">
                                {{ __('Whoops! Something went wrong.') }}
                            </div>

                            <ul class="mt-3 text-danger text-red-600">
                                @foreach ($errors->all() as $error)
                                    <li class="p-2">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" autocomplete="off" action="{{ route('admin.login') }}">
                    @csrf
                        <div class="form-group">

                            <label class="mb-3">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter your email">

                        </div>

                        <div class="form-group">

                            <label class="mb-3">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter your password">

                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                        
                    </form>
				</div>
			</div>			
		</div>
		
	</div>
</div>

<!-- jquery latest version -->
<script src="{{asset('dist/js/jquery.min.js')}}"></script>
<!-- popper.min.js -->
<script src="{{asset('dist/js/popper.min.js')}}"></script>    
<!-- bootstrap js -->
<script src="{{asset('dist/js/bootstrap.min.js')}}"></script>
<!-- jquery.steps js -->
<script src='https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js'></script>
<script src="{{asset('dist/js/jquery.steps.js')}}"></script>
<!-- particles js -->
<script src="{{asset('dist/js/particles.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function() {
		particlesJS("particles-js", 
			{
			  "particles": {
				"number": {
				  "value": 160,
				  "density": {
					"enable": true,
					"value_area": 800
				  }
				},
				"color": {
				  "value": "#ffffff"
				},
				"shape": {
				  "type": "circle",
				  "stroke": {
					"width": 0,
					"color": "#000000"
				  },
				  "polygon": {
					"nb_sides": 5
				  },
				  "image": {
					"src": "img/github.svg",
					"width": 100,
					"height": 100
				  }
				},
				"opacity": {
				  "value": 1,
				  "random": true,
				  "anim": {
					"enable": true,
					"speed": 1,
					"opacity_min": 0,
					"sync": false
				  }
				},
				"size": {
				  "value": 3,
				  "random": true,
				  "anim": {
					"enable": false,
					"speed": 4,
					"size_min": 0.3,
					"sync": false
				  }
				},
				"line_linked": {
				  "enable": false,
				  "distance": 150,
				  "color": "#ffffff",
				  "opacity": 0.4,
				  "width": 1
				},
				"move": {
				  "enable": true,
				  "speed": 1,
				  "direction": "none",
				  "random": true,
				  "straight": false,
				  "out_mode": "out",
				  "bounce": false,
				  "attract": {
					"enable": false,
					"rotateX": 600,
					"rotateY": 600
				  }
				}
			  },
			  "interactivity": {
				"detect_on": "canvas",
				"events": {
				  "onhover": {
					"enable": true,
					"mode": "bubble"
				  },
				  "onclick": {
					"enable": true,
					"mode": "repulse"
				  },
				  "resize": true
				},
				"modes": {
				  "grab": {
					"distance": 400,
					"line_linked": {
					  "opacity": 1
					}
				  },
				  "bubble": {
					"distance": 250,
					"size": 0,
					"duration": 2,
					"opacity": 0,
					"speed": 3
				  },
				  "repulse": {
					"distance": 400,
					"duration": 0.4
				  },
				  "push": {
					"particles_nb": 4
				  },
				  "remove": {
					"particles_nb": 2
				  }
				}
			  },
			  "retina_detect": true
			}
    	);
	});
</script>

</body>
</html>