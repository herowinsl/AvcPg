<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Avancement Programme</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script>
        // Check and apply theme immediately to prevent flashing
        const savedTheme = localStorage.getItem('theme') || 'dark';
        document.documentElement.setAttribute('data-theme', savedTheme);
        
        function updateThemeIcon(theme) {
            const darkIcon = document.getElementById('theme-icon-dark');
            const lightIcon = document.getElementById('theme-icon-light');
            if (darkIcon && lightIcon) {
                if (theme === 'light') {
                    darkIcon.style.display = 'block';
                    lightIcon.style.display = 'none';
                } else {
                    lightIcon.style.display = 'block';
                    darkIcon.style.display = 'none';
                }
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            updateThemeIcon(savedTheme);
        });

        function toggleTheme() {
            const currentTheme = document.documentElement.getAttribute('data-theme');
            const newTheme = currentTheme === 'light' ? 'dark' : 'light';
            document.documentElement.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);
            updateThemeIcon(newTheme);
        }
    </script>
    <style>
        :root {
            --bg-color: #030712; 
            --surface: rgba(30, 41, 59, 0.4); 
            --border: rgba(255, 255, 255, 0.08);
            --text-main: #F8FAFC;
            --text-muted: #94A3B8;
            --primary-gradient: linear-gradient(135deg, #6366F1 0%, #A855F7 100%);
        }
        
        [data-theme="light"] {
            --bg-color: #F8FAFC; 
            --surface: rgba(255, 255, 255, 0.6); 
            --border: rgba(0, 0, 0, 0.1);
            --text-main: #0F172A;
            --text-muted: #475569;
        }

        body { 
            font-family: 'Outfit', sans-serif; 
            background-color: var(--bg-color); 
            color: var(--text-main); 
            background-image: radial-gradient(circle at 15% 50%, rgba(99, 102, 241, 0.12), transparent 25%), radial-gradient(circle at 85% 30%, rgba(168, 85, 247, 0.12), transparent 25%); 
            background-attachment: fixed; 
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        
        [data-theme="light"] body {
            background-image: 
                radial-gradient(circle at 15% 50%, rgba(99, 102, 241, 0.05), transparent 25%),
                radial-gradient(circle at 85% 30%, rgba(168, 85, 247, 0.05), transparent 25%);
        }
        
        /* Toggle Button */
        .theme-toggle-btn {
            position: absolute;
            top: 2rem;
            right: 2rem;
            background: transparent;
            border: 1px solid var(--border);
            color: var(--text-muted);
            padding: 0.5rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 44px;
            height: 44px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .theme-toggle-btn:hover {
            background: rgba(255, 255, 255, 0.05);
            color: var(--text-main);
            border-color: var(--text-muted);
        }
        [data-theme="light"] .theme-toggle-btn:hover {
            background: rgba(0, 0, 0, 0.05);
        }
        .hero-container {
            text-align: center;
            padding: 3rem;
            background: var(--surface);
            backdrop-filter: blur(16px);
            border: 1px solid var(--border);
            border-radius: 1.5rem;
            box-shadow: 0 20px 40px -10px rgba(0,0,0,0.5);
            max-width: 900px;
            width: 90%;
        }
        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            margin-top: 0;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .hero-subtitle {
            font-size: 1.2rem;
            color: var(--text-muted);
            margin-bottom: 3rem;
            line-height: 1.6;
        }
        .features {
            display: flex;
            gap: 1.5rem;
            justify-content: center;
            margin-bottom: 3.5rem;
            text-align: left;
            flex-wrap: wrap;
        }
        .feature-card {
            background: rgba(15, 23, 42, 0.4);
            padding: 1.5rem;
            border-radius: 1rem;
            border: 1px solid var(--border);
            flex: 1;
            min-width: 200px;
        }
        .feature-title {
            font-weight: 600;
            color: var(--text-main);
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
        }
        .feature-desc {
            font-size: 0.9rem;
            color: var(--text-muted);
            margin: 0;
            line-height: 1.5;
        }
        .cta-btn {
            display: inline-block;
            background: var(--primary-gradient);
            color: white;
            padding: 1rem 2.5rem;
            border-radius: 2rem;
            font-size: 1.1rem;
            font-weight: 600;
            text-decoration: none;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .cta-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(99, 102, 241, 0.5);
        }
        
        @media (max-width: 768px) {
            .hero-title { font-size: 2.5rem; }
            .features { flex-direction: column; }
        }
    </style>
</head>
<body>
    <button type="button" onclick="toggleTheme()" class="theme-toggle-btn" title="Changer le thème">
        <svg id="theme-icon-dark" style="width: 1.5rem; height: 1.5rem; display: none;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
        <svg id="theme-icon-light" style="width: 1.5rem; height: 1.5rem; display: none;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
    </button>
    <div class="hero-container">
        <h1 class="hero-title">Avancement Programme</h1>
        <p class="hero-subtitle">
            La plateforme centralisée pour suivre, analyser et optimiser l'avancement des modules de formation au sein de votre établissement.
        </p>
        
        <div class="features">
            <div class="feature-card">
                <div class="feature-title">📊 Suivi en Temps Réel</div>
                <p class="feature-desc">Visualisez l'état d'avancement de chaque groupe et identifiez instantanément les retards critiques à l'aide de nos badges dynamiques.</p>
            </div>
            <div class="feature-card">
                <div class="feature-title">⚡ Import Excel Rapide</div>
                <p class="feature-desc">Mettez à jour vos données en un clic grâce à notre moteur d'importation hautement optimisé et normalisé.</p>
            </div>
            <div class="feature-card">
                <div class="feature-title">🎯 Analyse Intelligente</div>
                <p class="feature-desc">Filtrez instantanément vos données par formateur, groupe ou module pour des prises de décision rapides et ciblées.</p>
            </div>
        </div>

        @if (Route::has('login'))
            @auth
                <a href="{{ route('avancement.index') }}" class="cta-btn">Accéder au Dashboard →</a>
            @else
                <a href="{{ route('login') }}" class="cta-btn">Se Connecter pour Commencer</a>
            @endauth
        @endif
    </div>
</body>
</html>
