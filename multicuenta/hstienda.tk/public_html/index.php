<!DOCTYPE html>
<html>
<head>
    <title>HOME | <?php echo $_SERVER['HTTP_HOST']; ?></title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,700&display=swap');
        body {
            overflow: hidden;
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            padding: 0;
        }
        canvas {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }
        .jumbotron-content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #fff;
            text-align: center;
            text-transform: uppercase;
        }
        .jumbotron-content h1 {
            font-size: 6rem;
            font-weight: bold;
            margin-bottom: 2rem;
            text-shadow: 4px 4px 8px rgba(0, 0, 0, 0.6);
            text-transform: uppercase;
        }
        .jumbotron-content p {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
    <canvas id="lavaCanvas"></canvas>

    <div class="jumbotron-content">
        <h1>¡BIENVENIDO A <?php echo $_SERVER['HTTP_HOST']; ?>!</h1>
        <p>Navegador: <?php echo $_SERVER['HTTP_USER_AGENT']; ?></p>
        <p>IP: <?php echo $_SERVER['REMOTE_ADDR']; ?></p>
    </div>
<script>
    const canvas = document.getElementById('lavaCanvas');
    const context = canvas.getContext('2d');

    let width = window.innerWidth;
    let height = window.innerHeight;

    canvas.width = width;
    canvas.height = height;

    const particles = [];
    const particleCount = 500;

    function createParticles() {
        for (let i = 0; i < particleCount; i++) {
            const x = Math.random() * width;
            const y = Math.random() * height;

            const size = Math.random() * 3 + 1;
            const weight = Math.random() * 2 - 0.5;
            const directionX = Math.random() * 2 - 1;
            const directionY = Math.random() * 2 - 1;

            particles.push({ x, y, size, weight, directionX, directionY });
        }
    }

    function drawParticles() {
        context.clearRect(0, 0, width, height);

        context.fillStyle = '#9400D3';

        for (let i = 0; i < particles.length; i++) {
            const particle = particles[i];

            context.beginPath();
            context.arc(particle.x, particle.y, particle.size, 0, Math.PI * 2);
            context.closePath();
            context.fill();

            particle.x += particle.directionX;
            particle.y += particle.directionY;

            if (particle.size <= 10) {
                particle.size = Math.random() * 100 + 10;
            }

            if (particle.x + particle.size > width || particle.x - particle.size < 0) {
                particle.directionX = -particle.directionX;
            }

            if (particle.y + particle.size > height || particle.y - particle.size < 0) {
                particle.directionY = -particle.directionY;
            }

            if (particle.y > height) {
                particle.y = 0;
                particle.directionY = Math.random() * 20 - 1;
            }
        }
    }

    function animateParticles() {
        drawParticles();
        requestAnimationFrame(animateParticles);
    }

    createParticles();
    animateParticles();

    window.addEventListener('resize', function () {
        width = window.innerWidth;
        height = window.innerHeight;

        canvas.width = width;
        canvas.height = height;

        createParticles();
    });
</script>
</body>
</html>
