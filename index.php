<?php
require_once 'db.php';
include 'header.php';
?>

<!-- HERO -->
<section id="home" class="hero-section">

    <div class="container">

        <div class="row align-items-center min-vh-75">

            <div class="col-lg-7">

                <span class="hero-label">
                    CONTRACT • PROCUREMENT • SALES • SUPPLY
                </span>

                <h1 class="hero-title">
                    Reliable Solutions.
                    <span>Professional Delivery.</span>
                </h1>

                <p class="hero-text">
                    TAMBELS 4 REAL NIG. LTD provides dependable contract,
                    procurement, sales and supply services to organisations
                    across diverse sectors.
                </p>

                <div class="d-flex gap-3 mt-4">

                    <a href="#projects" class="btn btn-brand btn-lg">
                        Our Projects
                    </a>

                    <a href="#contact" class="btn btn-outline-brand btn-lg">
                        Contact Us
                    </a>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- ABOUT -->
<section id="about" class="section-padding">

    <div class="container">

        <div class="section-heading">

            <span>ABOUT US</span>

            <h2>
                A trusted partner for
                professional solutions.
            </h2>

        </div>

        <div class="row">

            <div class="col-lg-8">

                <p class="lead">
                    TAMBELS 4 REAL NIG. LTD is committed to providing
                    quality products and dependable services through
                    professionalism, efficiency and customer-focused
                    delivery.
                </p>

                <p>
                    Our operations cover contract services, procurement,
                    sales and supply of stationery, horticultural products
                    and other related services.
                </p>

            </div>

        </div>

    </div>

</section>


<!-- PROJECTS -->
<section id="projects" class="projects-section section-padding">

    <div class="container">

        <div class="section-heading text-center">

            <span>OUR PROJECTS</span>

            <h2>
                Selected projects and engagements
            </h2>

            <p>
                Explore some of the projects delivered by Tambels.
            </p>

        </div>


        <div class="row g-4">

            <!-- PHP will generate these cards from PostgreSQL -->

            <div class="col-md-6 col-lg-4">

                <article class="project-card">

                    <img
                        src="https://images.unsplash.com/photo-1497366811353-6870744d04b2?auto=format&fit=crop&w=900&q=80"
                        alt="Project"
                        class="project-image">

                    <div class="project-body">

                        <span class="project-category">
                            PROCUREMENT
                        </span>

                        <h3>
                            Project Name
                        </h3>

                        <p>
                            Project description will be retrieved
                            from the database.
                        </p>

                    </div>

                </article>

            </div>


            <div class="col-md-6 col-lg-4">

                <article class="project-card">

                    <img
                        src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&w=900&q=80"
                        alt="Project"
                        class="project-image">

                    <div class="project-body">

                        <span class="project-category">
                            CONTRACT
                        </span>

                        <h3>
                            Project Name
                        </h3>

                        <p>
                            Project description will be retrieved
                            from the database.
                        </p>

                    </div>

                </article>

            </div>


            <div class="col-md-6 col-lg-4">

                <article class="project-card">

                    <img
                        src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?auto=format&fit=crop&w=900&q=80"
                        alt="Project"
                        class="project-image">

                    <div class="project-body">

                        <span class="project-category">
                            SUPPLY
                        </span>

                        <h3>
                            Project Name
                        </h3>

                        <p>
                            Project description will be retrieved
                            from the database.
                        </p>

                    </div>

                </article>

            </div>

        </div>

    </div>

</section>


<!-- CONTACT -->
<section id="contact" class="contact-section section-padding">

    <div class="container">

        <div class="row g-5">

            <div class="col-lg-5">

                <div class="section-heading">

                    <span>CONTACT US</span>

                    <h2>
                        Let's work together.
                    </h2>

                </div>

                <p>
                    Contact us for enquiries, procurement requirements,
                    contract opportunities and supply services.
                </p>

                <div class="contact-details">

                    <div>
                        <i class="bi bi-telephone"></i>
                        <span>Phone number</span>
                    </div>

                    <div>
                        <i class="bi bi-envelope"></i>
                        <span>Email address</span>
                    </div>

                    <div>
                        <i class="bi bi-geo-alt"></i>
                        <span>Port Harcourt, Rivers State</span>
                    </div>

                </div>

            </div>


            <div class="col-lg-7">

                <div class="contact-card">

                    <form method="POST">

                        <div class="row g-3">

                            <div class="col-md-6">

                                <label class="form-label">
                                    Your Name
                                </label>

                                <input
                                    type="text"
                                    name="name"
                                    class="form-control"
                                    required>

                            </div>


                            <div class="col-md-6">

                                <label class="form-label">
                                    Email Address
                                </label>

                                <input
                                    type="email"
                                    name="email"
                                    class="form-control"
                                    required>

                            </div>


                            <div class="col-12">

                                <label class="form-label">
                                    Message
                                </label>

                                <textarea
                                    name="message"
                                    rows="6"
                                    class="form-control"
                                    required></textarea>

                            </div>


                            <div class="col-12">

                                <button class="btn btn-brand btn-lg">
                                    Send Message
                                </button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</section>


<?php include 'footer.php'; ?>