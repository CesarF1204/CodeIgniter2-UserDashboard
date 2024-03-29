<!-- Home Section -->
<!-- Welcome Modal -->
<?php if($this->session->userdata('is_logged_in')) { ?>
    <div class="modal fade text-dark" id="welcomeUser">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contactModalTitle">Welcome Message</h5>
                    <button class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3>Welcome <?= $this->session->userdata['user_fullname']?>!</h3>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
    <header id="home">
        <div class="dark-overlay">
            <div class="home-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 d-none d-lg-block">
                            <h1 class="display-4">Our villagers, Our family</h1>
                            <div class="p-2 align-self-end">
                                <p class="lead">Village 88's vision is to incubate and launch businesses that bring positive impact to the world. Since 2011, Village 88 has incubated Coding Dojo, Data Compass, Focus Tracker, and helped start numerous start-ups including Alumnify, SpotTrender, MatrixDS, and others.</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card bg-primary text-center card-form">
                                <div class="card-body">
                                    <h3>Contact Us</h3>
                                    <p>Please leave a message to us. Thankyou!</p>
                                    <form>
                                    <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
                                        <div class="form-group">
                                            <input type="text" id="fullname" class="form-control" placeholder="Full Name">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" id="email" class="form-control" placeholder="Email Address">
                                        </div>
                                        <div class="form-group">
                                            <textarea id="message" class="form-control" placeholder="Type your message here..."></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-outline-light btn-block">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- About Us -->
    <section id="about_us">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="py-5">
                        <h2 class="display-4">About Us</h2>
                        <p class="lead">Join Village 88 Philippines’ FREE online training to boost your career as a web developer</p>
                        <p class="lead">Village 88 Inc., a US-based company, is recruiting top CS/IT talents in the Philippines. No work experience required!</p>
                        <a href="#" class="btn btn-outline-secondary find-out-more"> Find Out More </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Us Body -->
    <section id="about_us_body" class="text-muted py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="user_guide/_images/our_program.jpg" alt="Explore Section">
                </div>

                <div class="col-md-6">
                    <h3>About Our Company</h3>
                    <div class="d-flex flex-row">
                        <div class="py-4 align-self-start">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="p-4 align-self-end">
                            <p>Village 88, Inc. is a US-based company that provides IT consultancy services and incubates tech start-up companies. In 2011, Michael Choi, an entrepreneur in Silicon Valley, started the company and started training a few young Filipinos remotely to be Software Engineers. Within a few months of training, these individuals were able to learn multiple web development technologies and were able to develop industry-level applications.</p>
                        </div>
                    </div>
                    <div class="d-flex flex-row">
                        <div class="align-self-start">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="px-4 align-self-end">
                            <p>In 2012, using the training program Michael built, we launched Coding Dojo, one of the first coding schools in the United States. This has grown to now training 1,000 students every year in over 10 locations in the U.S. The graduates from this training program currently work in many of the Fortune 100 companies including Google, Facebook, Apple, Ebay, PayPal, Microsoft, Expedia, Disney, JP Morgan and Chase, and a lot more.</p>
                        </div>
                    </div>
                    <div class="d-flex flex-row">
                        <div class="p-4 align-self-end">
                            <iframe width="480" height="360" src="https://www.youtube.com/embed/C1nVzOzEE-c" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Us -->
    <section id="contact_us">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="py-5">
                        <h2 class="display-4">Contact Us</h2>
                        <p class="lead">Ready to take on the training?</p>
                        <p class="lead">If you’re interested in applying and joining Village88’s online training program, please click the button below and kindly fill-up the form and send it to us.</p>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#contactModal">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Modal -->
    <div class="modal fade text-dark" id="contactModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contactModalTitle">Contact Us</h5>
                    <button class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" class="form-control" placeholder="Full Name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="text" id="email" class="form-control" placeholder="Email Address">
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea id="message" class="form-control" placeholder="Type your message here..."></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
