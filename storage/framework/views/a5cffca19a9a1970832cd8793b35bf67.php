<?php $__env->startSection('title', 'Khiane Aquino - IT Student Portfolio'); ?>
<?php $__env->startSection('description', 'Personal portfolio of an IT student showcasing projects, skills, and achievements'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Home Section -->
    <section id="home" class="hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1 class="hero-title">
                        Hi, I'm <span class="highlight">Khiane Jethron Aquino</span>
                    </h1>
                    <h2 class="hero-subtitle">IT Student & Aspiring Developer</h2>
                    <p class="hero-description">
                        Passionate about technology and software development. Currently pursuing my degree in Information Technology 
                        while building innovative projects and expanding my skills in web development, programming, and system design.
                    </p>
                    <div class="hero-buttons">
                        <a href="#projects" class="btn btn-primary">View My Work</a>
                        <a href="#contact" class="btn btn-secondary">Get In Touch</a>
                    </div>
                </div>
                <div class="hero-image">
                    <div class="profile-card">
                        <div class="profile-image">
                            <img src="<?php echo e(asset('assets/profile.jpeg')); ?>" alt="Profile Picture" id="profile-img">
                        </div>
                        <div class="profile-bg"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="scroll-indicator">
            <div class="scroll-arrow"></div>
        </div>
    </section>

    <?php echo $__env->make('sections.projects', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('sections.certificates', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('sections.skills', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('sections.resume', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('sections.contact', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\My-Portfolio-Aquino\resources\views/home.blade.php ENDPATH**/ ?>