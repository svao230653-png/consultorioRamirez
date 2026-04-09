<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultorio Dentista Ramírez</title>
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: #f4f8f8;
            color: #1f2937;
        }

        a {
            text-decoration: none;
        }

        .navbar {
            background: #0f766e;
            color: white;
            padding: 18px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .logo {
            font-size: 30px;
            font-weight: 800;
        }

        .logo span {
            color: #ccfbf1;
        }

        .nav-buttons {
            display: flex;
            gap: 12px;
        }

        .btn {
            padding: 12px 18px;
            border-radius: 12px;
            font-weight: 600;
            display: inline-block;
            transition: 0.3s ease;
        }

        .btn-light {
            background: white;
            color: #0f766e;
        }

        .btn-light:hover {
            background: #ecfeff;
        }

        .btn-outline {
            border: 2px solid white;
            color: white;
        }

        .btn-outline:hover {
            background: rgba(255,255,255,0.12);
        }

        .container {
            max-width: 1250px;
            margin: 0 auto;
            padding: 30px 20px 60px;
        }

        .hero {
            display: grid;
            grid-template-columns: 1.4fr 0.9fr;
            gap: 28px;
            align-items: stretch;
        }

        .hero-left,
        .hero-right {
            background: white;
            border-radius: 24px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        }

        .hero-left {
            overflow: hidden;
        }

        .hero-banner {
            background: linear-gradient(135deg, #ccfbf1, #ffffff);
            padding: 32px;
            min-height: 290px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
        }

        .hero-text {
            flex: 1;
            min-width: 260px;
        }

        .hero-text h1 {
            font-size: 42px;
            margin-bottom: 12px;
            color: #0f766e;
            line-height: 1.1;
        }

        .hero-text p {
            font-size: 18px;
            color: #4b5563;
            margin-bottom: 22px;
            line-height: 1.6;
        }

        .hero-actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn-primary {
            background: #0f766e;
            color: white;
        }

        .btn-primary:hover {
            background: #115e59;
        }

        .btn-secondary {
            background: #e6fffb;
            color: #0f766e;
        }

        .btn-secondary:hover {
            background: #ccfbf1;
        }

        .doctor-visual {
            width: 280px;
            min-height: 230px;
            border-radius: 24px;
            background: linear-gradient(135deg, #14b8a6, #0f766e);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 90px;
            font-weight: bold;
        }

        .doctor-info {
            padding: 25px 32px 30px;
        }

        .doctor-row {
            display: flex;
            align-items: center;
            gap: 18px;
            flex-wrap: wrap;
        }

        .doctor-photo {
            width: 88px;
            height: 88px;
            border-radius: 50%;
            background: #ccfbf1;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #0f766e;
            font-size: 30px;
            font-weight: bold;
        }

        .doctor-meta h2 {
            font-size: 28px;
            margin-bottom: 5px;
        }

        .doctor-meta p {
            color: #4b5563;
            margin-bottom: 5px;
            font-size: 17px;
        }

        .badges {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-top: 16px;
        }

        .badge {
            background: #ecfeff;
            color: #0f766e;
            padding: 8px 14px;
            border-radius: 999px;
            font-size: 14px;
            font-weight: 600;
        }

        .hero-right {
            overflow: hidden;
        }

        .card-title {
            background: #0f766e;
            color: white;
            padding: 22px 28px;
            font-size: 28px;
            font-weight: 700;
        }

        .appointment-card {
            padding: 28px;
        }

        .step {
            margin-bottom: 24px;
            padding-bottom: 18px;
            border-bottom: 1px solid #e5e7eb;
        }

        .step:last-child {
            border-bottom: none;
            margin-bottom: 0;
        }

        .step h3 {
            font-size: 18px;
            color: #111827;
            margin-bottom: 10px;
        }

        .step p, .step li {
            color: #4b5563;
            line-height: 1.6;
        }

        .service-box {
            width: 100%;
            padding: 14px;
            border: 1px solid #d1d5db;
            border-radius: 12px;
            background: #fafafa;
            font-size: 16px;
        }

        .schedule {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 12px;
            margin-top: 16px;
        }

        .day {
            background: #f9fafb;
            border-radius: 16px;
            padding: 14px 10px;
            text-align: center;
            border: 1px solid #e5e7eb;
        }

        .day strong {
            display: block;
            margin-bottom: 10px;
            color: #111827;
        }

        .hour {
            display: inline-block;
            background: #ccfbf1;
            color: #0f766e;
            padding: 8px 12px;
            border-radius: 999px;
            font-weight: 700;
            margin-top: 8px;
        }

        .section {
            margin-top: 34px;
        }

        .section-title {
            font-size: 30px;
            margin-bottom: 18px;
            color: #0f766e;
        }

        .cards-3 {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .info-card {
            background: white;
            border-radius: 20px;
            padding: 24px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.06);
        }

        .info-card h3 {
            margin-bottom: 12px;
            color: #111827;
        }

        .info-card p {
            color: #4b5563;
            line-height: 1.7;
        }

        .services-list {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
        }

        .service-item {
            background: white;
            padding: 22px;
            border-radius: 18px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.06);
            border-left: 6px solid #14b8a6;
        }

        .service-item h4 {
            margin-bottom: 8px;
            color: #0f766e;
            font-size: 20px;
        }

        .service-item p {
            color: #4b5563;
            line-height: 1.6;
        }

        .location-box {
            background: white;
            border-radius: 24px;
            padding: 28px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.06);
        }

        .map-placeholder {
            margin-top: 18px;
            background: linear-gradient(135deg, #d1fae5, #ecfeff);
            border-radius: 20px;
            min-height: 230px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 25px;
            color: #0f766e;
            font-size: 22px;
            font-weight: 700;
        }

        footer {
            margin-top: 40px;
            background: #0f766e;
            color: white;
            padding: 30px 20px;
        }

        .footer-content {
            max-width: 1250px;
            margin: auto;
            display: flex;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
        }

        .footer-content p {
            line-height: 1.8;
        }
       


        @media (max-width: 1024px) {
            .hero,
            .cards-3,
            .services-list {
                grid-template-columns: 1fr;
            }

            .schedule {
                grid-template-columns: repeat(2, 1fr);
            }

            .hero-text h1 {
                font-size: 34px;
            }
        }

        @media (max-width: 640px) {
            .navbar {
                padding: 18px 20px;
            }

            .hero-banner,
            .doctor-info,
            .appointment-card {
                padding: 22px;
            }

            .hero-text h1 {
                font-size: 28px;
            }

            .schedule {
                grid-template-columns: 1fr;
            }

            .doctor-visual {
                width: 100%;
            }
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="logo">Dentista <span>Ramírez</span></div>

        <div class="nav-buttons">
            <a href="#agendar" class="btn btn-outline">Agendar cita</a>
            <a href="{{ route('login') }}" class="btn btn-light">Iniciar sesión</a>
        </div>
    </nav>

    <div class="container">
        <section class="hero">
            <div class="hero-left">
                <div class="hero-banner">
                    <div class="hero-text">
                        <h1>Consultorio Dentista Ramírez</h1>
                        <p>
                            Atención dental profesional, moderna y confiable para niños, jóvenes y adultos.
                            Cuidamos tu sonrisa con un servicio humano, limpio y de calidad.
                        </p>

                        <div class="hero-actions">
                            <a href="#agendar" class="btn btn-primary">Reservar cita</a>
                            <a href="#servicios" class="btn btn-secondary">Ver servicios</a>
                        </div>
                    </div>

                    <div class="doctor-visual">
                        
                    </div>
                </div>

                <div class="doctor-info">
                    <div class="doctor-row">
                        <div class="doctor-photo">DR</div>

                        <div class="doctor-meta">
                            <h2>Dr. Ramírez</h2>
                            <p>Odontología General y Estética Dental</p>
                            <p>Cuernavaca, Morelos</p>
                            <p>Consultorio moderno · Atención personalizada</p>
                        </div>
                    </div>

                    <div class="badges">
                        <span class="badge">Limpieza dental</span>
                        <span class="badge">Resinas</span>
                        <span class="badge">Extracciones</span>
                        <span class="badge">Blanqueamiento</span>
                        <span class="badge">Ortodoncia</span>
                    </div>
                </div>
            </div>

            <div class="hero-right" id="agendar">
                <div class="card-title">Agendar cita</div>

                <div class="appointment-card">
                    <div class="step">
                        <h3>Dirección</h3>
                        <p>{{ $direccion }}</p>
                    </div>

                    <div class="step">
                        <h3>Servicio</h3>
                        <select class="service-box">
                            <option>Primera valoración</option>
                            <option>Limpieza dental</option>
                            <option>Resinas dentales</option>
                            <option>Extracción dental</option>
                            <option>Blanqueamiento dental</option>
                            <option>Revisión general</option>
                        </select>
                    </div>

                    <div class="step">
                        <h3>Atención</h3>
                        <p>No se requiere aseguradora. Atención particular y personalizada.</p>
                    </div>

                    <div class="step">
                        <h3>Horarios disponibles</h3>

                        <div class="schedule">
                            <div class="day">
                                <strong>Hoy</strong>
                                <span class="hour">11:00</span>
                            </div>

                            <div class="day">
                                <strong>Mañana</strong>
                                <span class="hour">17:00</span>
                            </div>

                            <div class="day">
                                <strong>Miércoles</strong>
                                <span class="hour">10:00</span>
                            </div>

                            <div class="day">
                                <strong>Jueves</strong>
                                <span class="hour">12:00</span>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('login') }}" class="btn btn-primary" style="width:100%; text-align:center; margin-top:10px;">
                        Entrar al sistema
                    </a>
                </div>
            </div>
        </section>

        <section class="section" id="servicios">
            <h2 class="section-title">Nuestros servicios</h2>

            <div class="services-list">
                <div class="service-item">
                    <h4>Limpieza dental</h4>
                    <p>Eliminación de sarro y placa para mantener tus dientes sanos y limpios.</p>
                </div>

                <div class="service-item">
                    <h4>Resinas dentales</h4>
                    <p>Restauraciones estéticas para devolver forma y función a tus dientes.</p>
                </div>

                <div class="service-item">
                    <h4>Blanqueamiento</h4>
                    <p>Tratamiento estético para mejorar el color de tu sonrisa de forma segura.</p>
                </div>

                <div class="service-item">
                    <h4>Extracciones</h4>
                    <p>Procedimientos dentales realizados con cuidado, higiene y atención profesional.</p>
                </div>

                <div class="service-item">
                    <h4>Ortodoncia</h4>
                    <p>Corrección de la posición dental para una sonrisa más armónica y funcional.</p>
                </div>

                <div class="service-item">
                    <h4>Valoración general</h4>
                    <p>Revisión completa para detectar problemas y recomendar el mejor tratamiento.</p>
                </div>
            </div>
        </section>

        <section class="section">
            <h2 class="section-title">¿Por qué elegirnos?</h2>

            <div class="cards-3">
                <div class="info-card">
                    <h3>Atención profesional</h3>
                    <p>Brindamos un servicio responsable, amable y enfocado en la salud bucal de cada paciente.</p>
                </div>

                <div class="info-card">
                    <h3>Instalaciones limpias</h3>
                    <p>Contamos con un espacio cómodo, higiénico y adecuado para una atención confiable.</p>
                </div>

                <div class="info-card">
                    <h3>Tratamientos personalizados</h3>
                    <p>Cada paciente recibe una valoración para ofrecerle la solución más adecuada.</p>
                </div>
            </div>
        </section>

            <section class="section">
                <h2 class="section-title">Ubicación</h2>

                <div class="location-box">
                    <p><strong>Consultorio Dentista Ramírez</strong></p>
                    <p style="margin-top:8px; color:#4b5563;">{{ $direccion }}</p>

                    <div id="map" style="height: 350px; width: 100%; border-radius: 20px; margin-top: 18px;"></div>
                </div>
            </section>
    </div>

    <footer>
        <div class="footer-content">
            <div>
                <h3>Consultorio Dentista Ramírez</h3>
                <p>Odontología general y estética dental</p>
            </div>

            <div>
                <p><strong>Dirección:</strong> {{ $direccion }}</p>
                <p><strong>Horario:</strong> Lunes a sábado</p>
            </div>

            <div>
                <p><strong>Contacto:</strong> 777 123 4567</p>
                <p><strong>Correo:</strong> admin@ramirez.com</p>
            </div>
        </div>
    </footer>
    <div id="map" style="height: 400px; width: 100%; border-radius: 10px;"></div>
    <script>
        function initMap() {
            const ubicacion = { lat: {{ $latitud }}, lng: {{ $longitud }} };

            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 15,
                center: ubicacion,
            });

            const marker = new google.maps.Marker({
                position: ubicacion,
                map: map,
                title: "Consultorio Dentista Ramírez"
            });

            const infoWindow = new google.maps.InfoWindow({
                content: "<strong>Consultorio Dentista Ramírez</strong>"
            });

            marker.addListener("click", () => {
                infoWindow.open(map, marker);
            });

            infoWindow.open(map, marker);
        }
    </script>
    <script async
        src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap">
    </script>
</body>
</html>
 