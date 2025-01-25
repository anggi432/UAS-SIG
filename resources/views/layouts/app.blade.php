<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIG Provinsi Sulawesi</title>
    <!-- CSS Dependencies -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />
    <!-- Custom Styles -->
    <style>

        ::-webkit-scrollbar {
            width: 15px;
            border-radius: 25px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #ccc;
            border-radius: 30px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #bbb;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }

        .map-container {
            height: 80vh;
            min-height: 600px;
            position: relative;
        }

        #map {
            z-index: 1;
        }


        .hero-gradient {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.7));
        }

        .stat-card {
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .province-card {
            background: linear-gradient(145deg, #ffffff, #f3f4f6);
            border: 1px solid rgba(0, 0, 0, 0.05);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .province-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transform: translateX(-100%);
            transition: 0.5s;
        }

        .province-card:hover::after {
            transform: translateX(100%);
        }

        .province-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 20px 30px rgba(0, 0, 0, 0.1);
        }

        .province-image-container {
            position: relative;
            width: 120px;
            height: 120px;
            margin: 0 auto;
            border-radius: 50%;
            overflow: hidden;
            background: linear-gradient(145deg, #f3f4f6, #ffffff);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        .province-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .province-card:hover .province-image {
            transform: scale(1.1);
        }

        .custom-button {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            z-index: 1;
        }

        .custom-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 0;
            height: 100%;
            background: rgba(255, 255, 255, 0.1);
            transition: width 0.3s ease;
            z-index: -1;
        }

        .custom-button:hover::before {
            width: 100%;
        }

        .gradient-text {
            background: linear-gradient(45deg, #10B981, #3B82F6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .leaflet-popup-content-wrapper {
            border-radius: 1rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .leaflet-popup-content {
            margin: 0;
            padding: 1rem;
        }

        .leaflet-container {
            font: inherit;
        }

        .text-blk {
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 0px;
            margin-left: 0px;
            line-height: 25px;
        }

        .responsive-cell-block {
            min-height: 75px;
        }

        .responsive-container-block {
            min-height: 75px;
            height: fit-content;
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            margin-top: 0px;
            margin-right: auto;
            margin-bottom: 0px;
            margin-left: auto;
            justify-content: space-evenly;
        }

        .outer-container {
            padding-top: 10px;
            padding-right: 50px;
            padding-bottom: 10px;
            padding-left: 50px;
            background-color: rgb(244, 252, 255);
        }

        .inner-container {
            max-width: 1320px;
            flex-direction: column;
            align-items: center;
            margin-top: 50px;
            margin-right: auto;
            margin-bottom: 50px;
            margin-left: auto;
        }

        .section-head-text {
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 5px;
            margin-left: 0px;
            font-size: 35px;
            font-weight: 700;
            line-height: 48px;
            color: rgb(0, 135, 177);
            margin: 0 0 10px 0;
        }

        .section-subhead-text {
            font-size: 25px;
            color: rgb(153, 153, 153);
            line-height: 35px;
            max-width: 470px;
            text-align: center;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 60px;
            margin-left: 0px;
        }

        .img-wrapper {
            text-align: center;
            margin: 20px;
        }

        .team-card {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .social-media-links {
            width: 125px;
            display: flex;
            justify-content: space-between;
        }

        .name {
            font-size: 25px;
            font-weight: 700;
            color: rgb(102, 102, 102);
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 5px;
            margin-left: 0px;
            text-align: center;
        }

        .position {
            font-size: 25px;
            font-weight: 700;
            color: rgb(0, 135, 177);
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 50px;
            margin-left: 0px;
        }

        .team-img {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 50%;
        }

        .team-card-container {
            width: 280px;
            margin: 0 0 40px 0;
        }

        @media (max-width: 500px) {
            .outer-container {
                padding: 10px 20px 10px 20px;
            }

            .section-head-text {
                text-align: center;
            }
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800 font-sans">
    <!-- Navigation Menu yang Ditingkatkan -->
    <nav class="bg-white/90 backdrop-blur-md shadow-lg fixed w-full z-50 top-0">
        <div class="container mx-auto flex justify-between items-center py-4 px-6">
            <a href="/" class="text-2xl font-bold text-purple-600 flex items-center space-x-2">
                <span>SIG Sulawesi</span>
            </a>
            <div class="hidden lg:flex space-x-8">
                <a href="/" class="hover:text-purple-500 transition duration-300">Beranda</a>
                <a href="#about" class="hover:text-purple-500 transition duration-300">Tentang</a>
                <div class="dropdown relative">
                    <button onclick="toggleDropdown()" class="hover:text-purple-500 transition duration-300 flex items-center">
                        Peta Tematik
                        <i class="fas fa-chevron-down ml-1 text-sm"></i>
                    </button>
                    <div id="dropdownMenu" class="absolute hidden bg-white mt-2 py-2 w-56 rounded-lg shadow-xl">
                        <a href="{{ route('map') }}" class="px-4 py-2 hover:bg-purple-50 hover:text-purple-500">
                            Peta Sulawesi
                        </a>
                        <a href="{{ route('provinces') }}" class="block px-4 py-2 hover:bg-purple-50 hover:text-purple-500">
                            Data Provinsi
                        </a>
                        <a href="{{ route('thematic-maps.area') }}" class="block px-4 py-2 hover:bg-purple-50 hover:text-purple-500">
                            Peta Luas Wilayah
                        </a>
                        <a href="{{ route('thematic-maps.population') }}" class="block px-4 py-2 hover:bg-blue-50 hover:text-blue-500">
                            Peta Populasi
                        </a>
                        <a href="{{ route('thematic-maps.income') }}" class="block px-4 py-2 hover:bg-teal-50 hover:text-teal-500">
                            Peta Pendapatan
                        </a>
                        <a href="{{ route('thematic-maps.education') }}" class="block px-4 py-2 hover:bg-orange-50 hover:text-orange-500">
                            Peta Pendidikan
                        </a>
                        <a href="{{ route('thematic-maps.health') }}" class="block px-4 py-2 hover:bg-pink-50 hover:text-pink-500">
                            Peta Kesehatan
                        </a>
                    </div>
                </div>

                <a href="#statistics" class="hover:text-purple-500 transition duration-300">Statistik</a>
            </div>

            <a href="/admin/login"
                class="bg-purple-500 text-white px-6 py-2 rounded-full hover:bg-purple-600 transition duration-300 hidden lg:block">
                Login
            </a>

            <button class="text-gray-600 lg:hidden" id="menu-toggle">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>

        <div id="menu-mobile" class="lg:hidden hidden bg-white shadow-lg absolute w-full">
            <div class="px-4 py-3 space-y-3">
                <a href="/" class="block hover:text-purple-500">Beranda</a>
                <a href="#about" class="block hover:text-purple-500">Tentang</a>
                <div class="relative">
                    <button class="w-full text-left hover:text-purple-500 flex justify-between items-center"
                        onclick="toggleMobileDropdown()">
                        Peta Tematik
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div id="mobile-dropdown" class="hidden bg-gray-50 mt-2 py-2 px-4 rounded-lg">
                        <a href="/peta/demografi" class="block py-2 hover:text-purple-500">Peta Demografi</a>
                        <a href="/peta/pendidikan" class="block py-2 hover:text-purple-500">Peta Pendidikan</a>
                        <a href="/peta/kesehatan" class="block py-2 hover:text-purple-500">Peta Kesehatan</a>
                        <a href="/peta/ekonomi" class="block py-2 hover:text-purple-500">Peta Ekonomi</a>
                        <a href="/peta/infrastruktur" class="block py-2 hover:text-purple-500">Peta Infrastruktur</a>
                    </div>
                </div>
                <a href="#statistics" class="block hover:text-purple-500">Statistik</a>
                <button class="w-full bg-purple-500 text-white py-2 rounded-full hover:bg-purple-600">
                    Login
                </button>
            </div>
        </div>
    </nav>

    <main class="pt-16">
        @yield('content')
    </main>

    <!-- Footer yang Ditingkatkan -->
    <footer class="footer_section">
      <div class="container">
        <p>
          &copy; GIS 2025
        </p>
      </div>
    </footer>

    <script>
        function toggleDropdown() {
            const menu = document.getElementById('dropdownMenu');
            menu.classList.toggle('hidden'); 
        }
    
        document.addEventListener('click', function (event) {
            const dropdown = document.querySelector('.dropdown');
            const menu = document.getElementById('dropdownMenu');
        
            if (!dropdown.contains(event.target)) {
                menu.classList.add('hidden');
            }
        });
    </script>
    <!-- Scripts -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://unpkg.com/three@0.132.2/build/three.min.js"></script>
    <script src="https://unpkg.com/@turf/turf@6.5.0/turf.min.js"></script>
    <script src="js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.js"></script>
    <script src="js/custom.js"></script>

    @stack('scripts')

</body>

</html>
