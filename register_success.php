<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Awesome</title>
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.16.26/dist/css/uikit.min.css" />

    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
    <style>
    

        /* Mobile first */
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        /* Styling */
        html {
            background-color: gray;
        }

        body {
            padding: 1rem 0.5rem;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            text-rendering: optimizeLegibility;
            font-family: 'Raleway', sans-serif;
        }

        /* Flexbox container */
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-content: center;
            padding: 6%;
            margin: 0;
        }

        /* Popup UI */
        .popup {
            display: flex;
            align-content: center;
            justify-content: center;
            background-color: white;
            border-radius: border-rounded;
            padding: 3rem 2rem;
            box-shadow: 0 10px 40px -14px rgba(0, 0, 0, 0.25);
            text-align: center;
        }

        /* Popup Texts & button */
        .popup-content {
            display: flex;
            flex-wrap: wrap;
            flex-direction: column;
        }

        .popup-title {
            color: blue;
            font-size: 1.8em;
            line-height: 1.5em;
            font-weight: 900;
            margin-top: 0;
        }

        .popup-body {
            font-size: 1.1em;
            line-height: 1.6em;
            color: dark-gray;
            font-weight: 500;
            margin-bottom: 2.1em;
        }

        /* Button Link */
        .popup-button {
            display: block;
            text-align: center;
            text-decoration: none;
            font-weight: 800;
            font-size: 1em;
            text-transform: uppercase;
            color: white;

            /* Button shape & animation */
            border-radius: border-rounded;
            margin: 10px;
            padding: 1em 3em;
            background-size: 200% auto;
            color: white;
            box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);
            background-image: linear-gradient(to right, #895cf2 0%, #ffabf4 50%, #895cf2 100%);
            transition: 0.5s;
        }

        .popup-button:hover {
            background-position: right center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="popup">
            <div class="popup-content">
                <h2 class="popup-title">Awesome!</h2>
                <p class="popup-body">Registeration successfull<br> Now, let's start learning!</p>
                <a href="./login.html" class="popup-button">Login</a>
            </div>
        </div>
    </div>
</body>
</html>
