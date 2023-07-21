@extends('layout')
    @section('content')
    <style>
        .card{background-color: purple;}
        .alert{background-color: #fff;}
    </style>

</head>
    <main>
        <div class="container my-4">
            <h2 class="my-3">{{ __('project.contact_us') }}</h2>
            <div class="row g-2">               
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="alert">
                            {{ __('project.forms') }}
                            </div>
                            <form class="row g-3 text-white">
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="name" class="form-label">{{ __('project.name_surname') }}</label>
                                    <input type="text" name="name" id="name" class="form-control" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="name" class="form-label">{{ __('project.phone') }}</label>
                                    <input type="text" name="phone" id="phone" class="form-control" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="subject" class="form-label">{{ __('project.subject') }}</label>
                                    <input type="text" name="subject" id="subject" class="form-control" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="message" class="form-label">{{ __('project.message') }}</label>
                                    <textarea name="message" id="message" class="form-control"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-outline-warning" style="width: 100%">{{ __('project.sent') }}</button>
                                </div>
                                
                            </form>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d23954.837916022036!2d36.20584800000001!3d41.36637695!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40887eea809d251d%3A0x484f135bd48c5222!2sK%C3%B6rfez%2C%20Atakum%2FSamsun!5e0!3m2!1str!2str!4v1688558242720!5m2!1str!2str" width="600" height="510" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="sma">
                    <h2>{{ __('project.social_media') }}</h2>
                    <ul class="socialnet ">
                    <li><a href="https://www.linkedin.com/in/abdullaherenkan%C4%B1k/" target="_blank"><i class="fab fa-linkedin"></i> linkedin</a></li>
                    <li><a href="https://www.instagram.com/a.erenkanik/" target="_blank"><i class="fab fa-instagram"></i> instagram</a></li>
                    <li><a href="https://twitter.com/pos_lik" target="_blank"><i class="fab fa-twitter"></i> twitter</a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                    
            </div>
        </div>
    </main>
        @endsection
 

