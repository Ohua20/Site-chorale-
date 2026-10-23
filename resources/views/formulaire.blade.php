<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inscription | Chorale Immaculée Conception</title>

    <meta name="description"
          content="Formulaire d'inscription à la Chorale Immaculée Conception de la paroisse Saint Joseph Artisan de Koumassi Nord-Est.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inria+Serif:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">

    <style>
        :root {
            --bleu: #073568;
            --bleu-fonce: #04264b;
            --bleu-clair: #eaf4ff;
            --bleu-action: #0b6fd6;
            --or: #ffcc43;
            --blanc: #ffffff;
            --texte: #183454;
            --bordure: #c9ddf3;
            --erreur: #d62839;
            --whatsapp: #25a244;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            color: var(--texte);
            background: #f3f8fe;
            line-height: 1.6;
        }

        a {
            text-decoration: none;
        }

        button, a {
            -webkit-tap-highlight-color: transparent;
        }

        .container {
            width: min(1160px, 92%);
            margin: auto;
        }

        /* EN-TETE */

        .header {
            background: var(--bleu-fonce);
            color: var(--blanc);
            border-bottom: 2px solid var(--or);
        }

        .navbar {
            min-height: 88px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 24px;
            padding-top: 12px;
            padding-bottom: 12px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            color: var(--blanc);
            min-width: 0;
        }

        .brand img {
            width: 80px;
            height: 80px;
            object-fit: contain;
            flex-shrink: 0;
        }

        .brand h1 {
            font-family: 'Inria Serif', serif;
            font-size: 21px;
            line-height: 1.3;
        }

        .brand p {
            font-size: 12px;
            color: #e0eaff;
        }

        /* BANDEAU */

        .page-hero {
            position: relative;
            overflow: hidden;
            color: var(--blanc);
            background:
                linear-gradient(90deg,
                    rgba(3, 35, 70, .98) 0%,
                    rgba(3, 45, 88, .9) 50%,
                    rgba(3, 45, 88, .55) 100%),
                url('{{ asset('assets/images/chorale 1.jpeg') }}') center / cover no-repeat;
            padding: 34px 0 90px;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--blanc);
            font-size: 13px;
            margin-bottom: 40px;
            opacity: .9;
        }

        .back-link:hover {
            color: var(--or);
            opacity: 1;
        }

        .hero-grid {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            gap: 30px;
        }

        .hero-eyebrow {
            font-family: 'Inria Serif', serif;
            font-size: 16px;
            margin-bottom: 4px;
        }

        .page-hero h2 {
            font-family: 'Inria Serif', serif;
            font-size: clamp(34px, 5vw, 52px);
            line-height: 1.15;
            margin-bottom: 14px;
        }

        .page-hero h2 span {
            color: var(--or);
        }

        .hero-text {
            max-width: 480px;
            color: #eef5ff;
            font-size: 15px;
        }

        .hero-quote {
            font-family: 'Inria Serif', serif;
            font-style: italic;
            font-size: 22px;
            line-height: 1.4;
            color: var(--blanc);
            text-align: center;
            max-width: 260px;
            padding-bottom: 6px;
        }

        /* FORMULAIRE */

        .form-card {
            position: relative;
            z-index: 2;
            width: min(820px, 92%);
            margin: -50px auto 60px;
            padding: 36px 38px 40px;
            background: var(--blanc);
            border-radius: 20px;
            border: 1px solid #e0ecf8;
            box-shadow: 0 14px 40px rgba(5, 42, 81, .12);
        }

        .form-section-title {
            display: flex;
            align-items: center;
            gap: 12px;
            color: var(--bleu);
            font-family: 'Inria Serif', serif;
            font-size: 22px;
            margin-bottom: 22px;
        }

        .form-section-title + .form-grid {
            margin-bottom: 8px;
        }

        .title-icon {
            width: 38px;
            height: 38px;
            display: grid;
            place-items: center;
            flex-shrink: 0;
            border-radius: 50%;
            background: var(--bleu-clair);
            color: var(--bleu-action);
        }

        .title-icon svg {
            width: 20px;
            height: 20px;
            fill: currentColor;
        }

        .form-section + .form-section {
            margin-top: 34px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px 22px;
        }

        .field {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .field.full {
            grid-column: 1 / -1;
        }

        .field label,
        .field .label {
            color: var(--bleu);
            font-size: 13px;
            font-weight: bold;
        }

        .required {
            color: var(--erreur);
        }

        .field input[type="text"],
        .field input[type="tel"],
        .field select,
        .field textarea {
            width: 100%;
            padding: 13px 15px;
            font-family: inherit;
            font-size: 14px;
            color: var(--texte);
            background: var(--blanc);
            border: 1.5px solid var(--bordure);
            border-radius: 10px;
            outline: none;
            transition: border-color .2s, box-shadow .2s;
        }

        .field select {
            appearance: none;
            -webkit-appearance: none;
            cursor: pointer;
            padding-right: 40px;
            background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='14' height='14' viewBox='0 0 24 24' fill='none' stroke='%23073568' stroke-width='3' stroke-linecap='round' stroke-linejoin='round'><polyline points='6 9 12 15 18 9'/></svg>");
            background-repeat: no-repeat;
            background-position: right 15px center;
        }

        .field textarea {
            min-height: 120px;
            resize: vertical;
        }

        .field input::placeholder,
        .field textarea::placeholder {
            color: #8ea3bb;
        }

        .field input:focus,
        .field select:focus,
        .field textarea:focus {
            border-color: var(--bleu-action);
            box-shadow: 0 0 0 4px rgba(11, 111, 214, .12);
        }

        .field.has-error input,
        .field.has-error select,
        .field.has-error textarea {
            border-color: var(--erreur);
        }

        .error-message {
            display: none;
            color: var(--erreur);
            font-size: 12px;
        }

        .field.has-error .error-message {
            display: block;
        }

        .char-count {
            align-self: flex-end;
            color: #8ea3bb;
            font-size: 12px;
        }

        /* BOUTONS RADIO */

        .radio-group {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
        }

        .radio-option {
            position: relative;
        }

        .radio-option input {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        .radio-option span {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            min-width: 120px;
            padding: 12px 20px;
            color: var(--bleu);
            font-size: 14px;
            font-weight: bold;
            background: var(--blanc);
            border: 1.5px solid var(--bordure);
            border-radius: 10px;
            cursor: pointer;
            transition: border-color .2s, background .2s;
        }

        .radio-option span::before {
            content: "";
            width: 18px;
            height: 18px;
            flex-shrink: 0;
            border: 2px solid var(--bordure);
            border-radius: 50%;
            background: var(--blanc);
            transition: border-color .2s, box-shadow .2s, background .2s;
        }

        .radio-option input:checked + span {
            border-color: var(--bleu-action);
            background: var(--bleu-clair);
        }

        .radio-option input:checked + span::before {
            border-color: var(--bleu-action);
            background: var(--bleu-action);
            box-shadow: inset 0 0 0 3px var(--blanc);
        }

        .radio-option input:focus-visible + span {
            box-shadow: 0 0 0 4px rgba(11, 111, 214, .18);
        }

        .conditional {
            animation: apparition .3s ease;
        }

        .conditional[hidden] {
            display: none;
        }

        @keyframes apparition {
            from { opacity: 0; transform: translateY(-6px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* BOUTON ENVOYER */

        .submit-btn {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            margin-top: 34px;
            padding: 16px 24px;
            border: none;
            border-radius: 12px;
            background: var(--bleu-action);
            color: var(--blanc);
            font-family: inherit;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: transform .2s, background .2s;
        }

        .submit-btn:hover {
            background: #095cb3;
            transform: translateY(-2px);
        }

        .submit-btn:disabled {
            opacity: .7;
            cursor: wait;
            transform: none;
        }

        .form-alert {
            margin-bottom: 22px;
            padding: 12px 14px;
            border-radius: 10px;
            background: #fdecee;
            color: var(--erreur);
            font-size: 14px;
        }

        /* BOITE DE DIALOGUE */

        .modal-overlay {
            position: fixed;
            inset: 0;
            z-index: 100;
            display: none;
            justify-content: center;
            align-items: center;
            padding: 20px;
            background: rgba(4, 38, 75, .65);
            backdrop-filter: blur(3px);
        }

        .modal-overlay.open {
            display: flex;
        }

        .modal {
            width: min(420px, 100%);
            padding: 38px 30px 32px;
            text-align: center;
            background: var(--blanc);
            border-radius: 20px;
            border-bottom: 5px solid var(--or);
            box-shadow: 0 20px 50px rgba(0, 0, 0, .3);
            animation: modalIn .35s ease;
        }

        @keyframes modalIn {
            from { opacity: 0; transform: translateY(20px) scale(.96); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }

        .modal-icon {
            width: 74px;
            height: 74px;
            display: grid;
            place-items: center;
            margin: 0 auto 18px;
            border-radius: 50%;
            background: #e4f6ea;
            color: var(--whatsapp);
        }

        .modal-icon svg {
            width: 38px;
            height: 38px;
            fill: none;
            stroke: currentColor;
            stroke-width: 3;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .modal h3 {
            color: var(--bleu);
            font-family: 'Inria Serif', serif;
            font-size: 26px;
            margin-bottom: 8px;
        }

        .modal p {
            color: #5b7190;
            font-size: 15px;
            margin-bottom: 24px;
        }

        .modal-btn {
            padding: 13px 34px;
            border: none;
            border-radius: 30px;
            background: var(--or);
            color: var(--bleu-fonce);
            font-family: inherit;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            transition: transform .2s, background .2s;
        }

        .modal-btn:hover {
            background: #ffdc76;
            transform: translateY(-2px);
        }

        /* PIED DE PAGE */

        .footer {
            background: var(--bleu-fonce);
            color: white;
            padding: 28px 0;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .footer strong {
            font-family: 'Inria Serif', serif;
        }

        .footer p {
            font-size: 12px;
            color: #dce8f7;
        }

        /* MOBILE */

        @media (max-width: 767px) {
            .hero-grid {
                flex-direction: column;
                align-items: flex-start;
            }

            .hero-quote {
                text-align: left;
                font-size: 19px;
            }

            .form-card {
                padding: 28px 20px 32px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 600px) {
            .navbar {
                justify-content: center;
                text-align: center;
                gap: 14px;
            }

            .brand {
                width: 100%;
                justify-content: center;
                text-align: left;
            }

            .brand img {
                width: 49px;
                height: 49px;
            }

            .brand h1 {
                font-size: 16px;
            }

            .brand p {
                font-size: 10px;
            }

            .page-hero {
                padding: 26px 0 80px;
            }

            .back-link {
                margin-bottom: 28px;
            }

            .radio-option span {
                min-width: 100px;
                padding: 11px 16px;
            }

            .footer-content {
                flex-direction: column;
                text-align: center;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                scroll-behavior: auto !important;
                transition: none !important;
                animation: none !important;
            }
        }
    </style>
</head>

<body>

    <!-- EN-TETE -->
    <header class="header">
        <div class="container navbar">

            <a href="{{ url('/') }}" class="brand">
                <img
                    src="{{ asset('assets/images/logo.png') }}"
                    alt="Logo de la Chorale Immaculée Conception"
                >

                <div>
                    <h1>Chorale Immaculée Conception</h1>
                    <p>Paroisse Saint Joseph Artisan de Koumassi Nord-Est</p>
                </div>
            </a>

        </div>
    </header>

    <main>

        <!-- BANDEAU -->
        <section class="page-hero">
            <div class="container">

                <a href="{{ url('/') }}" class="back-link">
                    &larr; Retour à l'accueil
                </a>

                <div class="hero-grid">
                    <div>
                        <p class="hero-eyebrow">Rejoignez la Chorale Immaculée Conception</p>

                        <h2>Formulaire <span>d'inscription</span></h2>

                        <p class="hero-text">
                            Remplissez ce formulaire pour faire partie de la chorale.
                            Vos informations nous aideront à mieux vous connaître
                            et à vous intégrer dans notre groupe.
                        </p>
                    </div>

                    <p class="hero-quote">
                        « Chanter, c'est prier<br>deux fois »
                    </p>
                </div>

            </div>
        </section>

        <!-- FORMULAIRE -->
        <section class="form-card">

            <form id="inscription-form" action="{{ route('inscription.store') }}" method="POST" novalidate>
                @csrf

                <p class="form-alert" id="form-alert" hidden role="alert"></p>

                <!-- INFORMATIONS PERSONNELLES -->
                <div class="form-section">

                    <h3 class="form-section-title">
                        <span class="title-icon">
                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M9 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm0 2c-3.3 0-7 1.7-7 4v2h14v-2c0-2.3-3.7-4-7-4zm8-2a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm.5 2c-.4 0-.8 0-1.2.1 1.2.9 1.7 2 1.7 3.4v2.5h5v-2c0-1.9-3-4-5.5-4z"/>
                            </svg>
                        </span>
                        Vos informations personnelles
                    </h3>

                    <div class="form-grid">

                        <div class="field">
                            <label for="nom">Nom <span class="required">*</span></label>
                            <input type="text" id="nom" name="nom" placeholder="Votre nom" autocomplete="family-name">
                            <span class="error-message">Veuillez saisir votre nom.</span>
                        </div>

                        <div class="field">
                            <label for="prenoms">Prénoms <span class="required">*</span></label>
                            <input type="text" id="prenoms" name="prenoms" placeholder="Vos prénoms" autocomplete="given-name">
                            <span class="error-message">Veuillez saisir vos prénoms.</span>
                        </div>

                        <div class="field">
                            <label for="telephone">Téléphone <span class="required">*</span></label>
                            <input type="tel" id="telephone" name="telephone" placeholder="+225 07 07 07 07 07" autocomplete="tel">
                            <span class="error-message">Veuillez saisir un numéro de téléphone valide.</span>
                        </div>

                        <div class="field">
                            <label for="whatsapp">Numéro WhatsApp</label>
                            <input type="tel" id="whatsapp" name="whatsapp" placeholder="+225 07 07 07 07 07">
                            <span class="error-message">Veuillez saisir un numéro WhatsApp valide.</span>
                        </div>

                    </div>
                </div>

                <!-- INFORMATIONS COMPLEMENTAIRES -->
                <div class="form-section">

                    <h3 class="form-section-title">
                        <span class="title-icon">
                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M12 2a5 5 0 1 0 0 10 5 5 0 0 0 0-10zm0 12c-4.4 0-8 2.2-8 5v3h16v-3c0-2.8-3.6-5-8-5z"/>
                            </svg>
                        </span>
                        Informations complémentaires
                    </h3>

                    <div class="form-grid">

                        <div class="field full">
                            <label for="quartier">Quartier / Résidence <span class="required">*</span></label>
                            <input type="text" id="quartier" name="quartier" placeholder="Votre quartier ou résidence">
                            <span class="error-message">Veuillez saisir votre quartier ou résidence.</span>
                        </div>

                        <!-- QUESTION OUI / NON -->
                        <div class="field full" id="field-chorale">
                            <span class="label">
                                Avez-vous déjà appartenu à une chorale ? <span class="required">*</span>
                            </span>

                            <div class="radio-group">
                                <label class="radio-option">
                                    <input type="radio" name="deja_chorale" value="oui">
                                    <span>Oui</span>
                                </label>

                                <label class="radio-option">
                                    <input type="radio" name="deja_chorale" value="non">
                                    <span>Non</span>
                                </label>
                            </div>

                            <span class="error-message">Veuillez répondre à cette question.</span>
                        </div>

                        <!-- LISTE DES VOIX (APPARAIT SI OUI) -->
                        <div class="field full conditional" id="field-voix" hidden>
                            <label for="voix">Votre voix <span class="required">*</span></label>
                            <select id="voix" name="voix">
                                <option value="">Sélectionnez votre voix</option>
                                <option value="soprano">Soprano</option>
                                <option value="alto">Alto</option>
                                <option value="tenor">Ténor</option>
                                <option value="basse">Basse</option>
                            </select>
                            <span class="error-message">Veuillez sélectionner votre voix.</span>
                        </div>

                        <!-- EXPERIENCE (NON OBLIGATOIRE) -->
                        <div class="field full">
                            <label for="experience">Expérience en chorale</label>
                            <select id="experience" name="experience">
                                <option value="">Sélectionnez votre expérience</option>
                                <option value="aucune">Aucune expérience</option>
                                <option value="moins-1-an">Moins d'un an</option>
                                <option value="1-3-ans">1 à 3 ans</option>
                                <option value="3-5-ans">3 à 5 ans</option>
                                <option value="plus-5-ans">Plus de 5 ans</option>
                            </select>
                        </div>

                        <!-- MOTIVATION (OPTIONNEL) -->
                        <div class="field full">
                            <label for="motivation">Motivation (optionnel)</label>
                            <textarea id="motivation" name="motivation" maxlength="300"
                                      placeholder="Pourquoi souhaitez-vous rejoindre la chorale ?"></textarea>
                            <span class="char-count" id="char-count">0/300</span>
                        </div>

                    </div>
                </div>

                <button type="submit" class="submit-btn">S'inscrire</button>

            </form>

        </section>

    </main>

    <!-- PIED DE PAGE -->
    <footer class="footer">
        <div class="container footer-content">

            <div>
                <strong>Immaculée Conception</strong>
                <p>Paroisse Saint Joseph Artisan de Koumassi Nord-Est</p>
            </div>

            <div>
                <p>Koumassi Nord-Est, Abidjan</p>
                <p>Chanter, c'est prier deux fois.</p>
            </div>

            <div>
                <p>
                    &copy; {{ date('Y') }} Chorale Immaculée Conception
                </p>
                <p>Tous droits réservés.</p>
            </div>

        </div>
    </footer>

    <!-- BOITE DE DIALOGUE : INSCRIPTION REUSSIE -->
    <div class="modal-overlay" id="modal" role="dialog" aria-modal="true" aria-labelledby="modal-title">
        <div class="modal">
            <div class="modal-icon">
                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <polyline points="5 13 10 18 19 7"/>
                </svg>
            </div>

            <h3 id="modal-title">Inscription réussie</h3>

            <p>
                Merci de votre intérêt pour la Chorale Immaculée Conception.
                Votre demande a bien été enregistrée.
            </p>

            <button type="button" class="modal-btn" id="modal-close">Fermer</button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const form = document.getElementById('inscription-form');
            const modal = document.getElementById('modal');
            const modalClose = document.getElementById('modal-close');

            const fieldVoix = document.getElementById('field-voix');
            const selectVoix = document.getElementById('voix');
            const radios = document.querySelectorAll('input[name="deja_chorale"]');

            const motivation = document.getElementById('motivation');
            const charCount = document.getElementById('char-count');

            /* Affiche la liste des voix uniquement si la réponse est "Oui" */
            radios.forEach(function (radio) {
                radio.addEventListener('change', function () {
                    const oui = radio.value === 'oui' && radio.checked;

                    fieldVoix.hidden = !oui;

                    if (!oui) {
                        selectVoix.value = '';
                        fieldVoix.classList.remove('has-error');
                    }

                    document.getElementById('field-chorale').classList.remove('has-error');
                });
            });

            /* Compteur de caractères */
            motivation.addEventListener('input', function () {
                charCount.textContent = motivation.value.length + '/300';
            });

            /* Validation */
            function setError(input, hasError) {
                const field = input.closest('.field');
                if (field) field.classList.toggle('has-error', hasError);
                return !hasError;
            }

            function phoneValide(valeur) {
                const chiffres = valeur.replace(/\D/g, '');
                return /^[+\d\s().-]+$/.test(valeur) && chiffres.length >= 8 && chiffres.length <= 15;
            }

            function valider() {
                let ok = true;
                let premiereErreur = null;

                function verifier(input, condition) {
                    const valide = setError(input, !condition);
                    if (!valide) {
                        ok = false;
                        if (!premiereErreur) premiereErreur = input;
                    }
                }

                verifier(form.nom, form.nom.value.trim() !== '');
                verifier(form.prenoms, form.prenoms.value.trim() !== '');
                verifier(form.telephone, phoneValide(form.telephone.value.trim()));
                verifier(form.quartier, form.quartier.value.trim() !== '');

                /* Le numéro WhatsApp est facultatif : on le vérifie seulement s'il est rempli */
                const wa = form.whatsapp.value.trim();
                verifier(form.whatsapp, wa === '' || phoneValide(wa));

                /* Question oui / non */
                const reponse = form.querySelector('input[name="deja_chorale"]:checked');
                const champChorale = document.getElementById('field-chorale');
                champChorale.classList.toggle('has-error', !reponse);
                if (!reponse) {
                    ok = false;
                    if (!premiereErreur) premiereErreur = champChorale;
                }

                /* Voix : obligatoire seulement si la réponse est "Oui" */
                if (reponse && reponse.value === 'oui') {
                    verifier(selectVoix, selectVoix.value !== '');
                }

                if (premiereErreur) {
                    premiereErreur.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }

                return ok;
            }

            /* Retire l'erreur dès que l'utilisateur corrige */
            form.querySelectorAll('input, select, textarea').forEach(function (element) {
                element.addEventListener('input', function () {
                    const field = element.closest('.field');
                    if (field) field.classList.remove('has-error');
                });
            });

            const formAlert = document.getElementById('form-alert');
            const submitBtn = form.querySelector('.submit-btn');

            function afficherAlerte(message) {
                formAlert.hidden = false;
                formAlert.textContent = message;
            }

            function masquerAlerte() {
                formAlert.hidden = true;
                formAlert.textContent = '';
            }

            /* Envoi vers la table inscriptions */
            form.addEventListener('submit', function (event) {
                event.preventDefault();
                masquerAlerte();

                if (!valider()) return;

                submitBtn.disabled = true;

                fetch('{{ route('inscription.store') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: new FormData(form)
                })
                    .then(async function (response) {
                        if (response.ok) {
                            ouvrirModal();
                            return;
                        }

                        const data = await response.json().catch(function () {
                            return {};
                        });

                        if (response.status === 422 && data.errors) {
                            const premierMessage = Object.values(data.errors)[0][0];
                            afficherAlerte(premierMessage);
                            return;
                        }

                        afficherAlerte(data.message || "L'inscription n'a pas pu être enregistrée. Réessayez.");
                    })
                    .catch(function () {
                        afficherAlerte("Impossible de contacter le serveur. Vérifiez votre connexion.");
                    })
                    .finally(function () {
                        submitBtn.disabled = false;
                    });
            });

            function ouvrirModal() {
                modal.classList.add('open');
                modalClose.focus();
            }

            function fermerModal() {
                modal.classList.remove('open');
                form.reset();
                fieldVoix.hidden = true;
                charCount.textContent = '0/300';
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }

            modalClose.addEventListener('click', fermerModal);

            modal.addEventListener('click', function (event) {
                if (event.target === modal) fermerModal();
            });

            document.addEventListener('keydown', function (event) {
                if (event.key === 'Escape' && modal.classList.contains('open')) fermerModal();
            });

        });
    </script>

</body>
</html>
