<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E - Parking</title>

    <style>
        /* Fontawesome */
        @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');

        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            display: flex;
            height: 100vh;
            align-items: stretch;
        }

        .left-section {
            background: url('https://img.freepik.com/premium-vector/man-freelancer-sits-table-cafe-working-laptop-remote-worker-drinking-beverage-coworking-space-workplace-cafeteria-restaurant_575670-1291.jpg?size=626&ext=jpg&ga=GA1.1.1546980028.1702771200&semt=ais') no-repeat center center;
            display: none;
            margin-left: 5%;
        }

        .right-section {
            flex-grow: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgb(10 75 90);
            width: 100%;
            max-width: 450px;
        }

        .login-form h2 {
            color: #ffb144;
            text-align: center;
            margin-bottom: 35px;
        }

        .login-title i {
            margin-right: 10px;
            color: #027186;
        }

        .form-control {
            position: relative;
            margin-bottom: 30px;
        }

        .form-control i {
            position: absolute;
            left: 15px;
            top: 14px;
            color: #32495e;
        }

        .form-control input {
            width: 100%;
            max-width: 95%;
            padding: 12px 0 12px 37px;
            border: 2px solid #00569f1c;
            background-color: rgb(232, 232, 232);
            color: rgb(50, 73, 94);
            border-radius: 6px;
            transition: all 0.3s ease-in-out 0s;
        }

        .form-control input:focus {
            outline: none;
            border: 2px solid #ffd8a1;
        }

        .form-control input:invalid:not(:focus):not(:placeholder-shown) {
            border: 2px solid #ff3860;
        }

        .remember-me {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .remember-me .checkbox-custom {
            width: 20px;
            height: 20px;
            margin-right: 10px;
            display: inline-block;
            vertical-align: middle;
            position: relative;
            border: 2px solid #027186;
            border-radius: 3px;
            cursor: pointer;
            background-color: #f7f7f7;
            transition: background-color 0.3s, border-color 0.3s;
            background-color: #f7f7f7;
            transition: background-color 0.3s, border-color 0.3s;
            pointer-events: none;
        }

        .remember-me .checkbox-custom::after {
            content: '';
            position: absolute;
            left: 5px;
            top: 1px;
            width: 6px;
            height: 11px;
            border: solid #027186;
            border-width: 0 3px 3px 0;
            transform: rotate(45deg);
            border: solid white;
            border-width: 0 2px 2px 0;
            display: none;
        }

        .remember-me label {
            color: #333;
            font-size: 0.95em;
            cursor: pointer;
        }

        .remember-me input[type="checkbox"] {
            display: none;
        }

        .remember-me input[type="checkbox"]:checked+.checkbox-custom::after {
            display: block;
        }

        .remember-me input[type="checkbox"]:checked+.checkbox-custom {
            background-color: #027186;
            border-color: #027186;
        }

        button {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 12px;
            background-color: #ffaa33;
            color: white;
            font-size: 17px;
            cursor: pointer;
            transition: background-color 0.3s;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        button:hover {
            background-color: #405d7d;
        }

        /*Responsive*/
        @media screen and (min-width: 768px) {
            .left-section {
                display: block;
                /* Show the left section on larger screens */
                flex: 1;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="left-section"></div>
        <div class="right-section">
            <div class="login-container">
                <form class="login-form">
                    <h2 class="login-title"><i class="fas fa-user-circle"></i> Register</h2>
                    <div class="form-control">
                        <i class="fas fa-user icon"></i>
                        <input type="text" placeholder="Username" id="username" required>
                    </div>
                    <div class="form-control">
                        <i class="fas fa-lock icon"></i>
                        <input type="password" placeholder="Password" id="password">
                    </div>
        

                  
                    <button type="submit">Register</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Wait for the DOM to load before running the script
        document.addEventListener('DOMContentLoaded', function () {

            // Get the remember-me container, checkbox, and custom checkbox from the DOM
            var rememberMeContainer = document.querySelector('.remember-me');
            var checkbox = rememberMeContainer.querySelector('input[type="checkbox"]');
            var checkboxCustom = rememberMeContainer.querySelector('.checkbox-custom');

            // Add a click event listener to the remember-me container
            rememberMeContainer.addEventListener('click', function (event) {
                // If the clicked element isn't the checkbox itself, toggle the checkbox
                if (event.target !== checkbox) {
                    checkbox.checked = !checkbox.checked;

                    // Manually trigger the change event on the checkbox
                    var changeEvent = new Event('change', {
                        'bubbles': true,
                        'cancelable': true
                    });
                    checkbox.dispatchEvent(changeEvent);
                }
            });

            // Add a change event listener to the checkbox
            checkbox.addEventListener('change', function () {
                // This function will be called any time the checkbox is checked or unchecked
                // You can add any additional functionality you need here
            });

            // Optional: If you have a form and want to perform a custom submit action
            var form = document.querySelector('.login-form');
            form.addEventListener('submit', function (event) {
                // Prevent the default form submit
                event.preventDefault();

                // You can add custom form submit functionality here
                // For example, you could use AJAX to submit the form data to your server
            });

            // Additional event listeners and functionality can be added below
        });

    </script>
</body>

</html>